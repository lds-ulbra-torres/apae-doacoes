<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssociatedController extends CI_Controller {

  const PER_PAGE = 10;

  public function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
  }

  private function loadFormDependencies($data=NULL) {
    $data['cidades'] = $this->CitiesModel->GetAllCities();
    $data['contact_types'] = $this->AssociatedModel->getAllContactTypes();
    $data['payment_types'] = $this->AssociatedModel->getAllPaymentTypes();
    $data['frequencias'] = $this->FrequencyModel->getAll();
    $data['banks'] = $this->BanksModel->getAll();
    return $data;
  }

  private function loadFormRules() {
    $this->form_validation->set_rules('uuid_associate', 'UUID', 'required|is_unique[associated.uuid_associate]');
    $this->form_validation->set_rules('name_associate', 'Nome', 'required');
    $this->form_validation->set_rules('rg', 'RG', 'required|is_unique[associated.rg]');
    $this->form_validation->set_rules('cpf', 'CPF', 'required|is_unique[associated.cpf]');
    $this->form_validation->set_rules('birth_date', 'Data de Nascimento', 'required');
    $this->form_validation->set_rules('duo_date', 'Data de Vencimento', 'required');
    $this->form_validation->set_rules('value_frequency', 'Valor de Contribuição', 'required');
    $this->form_validation->set_rules('id_payment_type', 'Tipo de Pagamento', 'required');
  }

/* GET /associated */
  public function index($searchText=NULL) {
    $baseUrl = base_url('associated');
    $totalRows = $this->AssociatedModel->totalCount();
    $getPage = (int) $this->input->get("page");
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $data['associated'] = $this->AssociatedModel->getAll(self::PER_PAGE, $page);
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $this->template->load('template', 'associated/listAssociated', $data);
  }

/* GET /associated?q={queryString} */
  public function search() {
    $searchText = $this->input->get('q');
    $getPage = (int) $this->input->get("page");
    $data['search'] = $searchText;
    $baseUrl = base_url('associated/search?q='. urlencode($searchText));
    $totalRows = $this->AssociatedModel->searchTotalCount($searchText);
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $data['associated'] = $this->AssociatedModel->searchAll(self::PER_PAGE, $page, $searchText);
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $this->template->load('template', 'associated/listAssociated', $data);
  }

/* GET /associated/new */
  public function newAssociate() {
    $data = $this->loadFormDependencies();
    $this->template->load('template', 'associated/createAssociated', $data);
  }

/* POST /associated/create */
  public function createAssociate() {
    $this->loadFormRules();

    if ($this->form_validation->run()) {

      $associate = $this->input->post();
      $id = $this->AssociatedModel->create($associate);
      if($id !== 0){
        $associate['id_associate'] = $id;
        $this->CollectionModel->createCollections((object) $associate);
        $this->session->set_flashdata('alert', CreateEntityAlert("Associado", $id));
        redirect('associated/'. $id .'/collections','refresh');
      }else{
        $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados. Não foi possível salvar."));
        redirect('associated','refresh');
      }
    }else{
      $data = $this->loadFormDependencies();
      $this->template->load('template', 'associated/createAssociated', $data);
    }
  }

/* GET /associated-detail/{associatedId} */
  public function detailedAssociate() {
    $id = $this->uri->segment(2);
    $data['associate'] = $this->AssociatedModel->getByIdEager($id)[0];
    $data['contacts'] = $this->AssociatedModel->getUserContacts($id);
    $this->template->load('template', 'associated/detailedAssociated', $data);
  }

/* GET /associated/edit/{associatedId} */
  public function editAssociate() {
    $id = $this->uri->segment(3);
    $data['user_contacts'] = $this->AssociatedModel->getUserContacts($id);
    $data['associate'] = $this->AssociatedModel->getByIdLazy($id)[0];
    $data = $this->loadFormDependencies($data);
    $this->template->load('template', 'associated/updateAssociated', $data);
  }

/* POST /associated/update */
  public function updateAssociate() {
    $this->loadFormRules();
    $associate = $this->input->post();
    $contacts = $this->input->post('contact');
    $id = $associate['id_associate'];
    $this->form_validation->set_rules('uuid_associate', 'UUID', 'required|edit_unique[associated.uuid_associate.id_associate.'. $id .']');
    $this->form_validation->set_rules('rg', 'RG', 'required|edit_unique[associated.rg.id_associate.'. $id .']');
    $this->form_validation->set_rules('cpf', 'CPF', 'required|edit_unique[associated.cpf.id_associate.'. $id .']');

    if ($this->form_validation->run()) {
      if ($this->AssociatedModel->update($associate, $contacts)) {
        $this->session->set_flashdata('alert', UpdateEntityAlert("Associado", $associate['id_associate']));
        redirect('associated');
      }else{
        $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados. Não foi possível alterar"));
        redirect('associated','refresh');
      }
    }
    else {
      $data['associate'] = (object) $associate;
      $data['user_contacts'] = $this->AssociatedModel->getUserContacts($this->input->post('id_associate'));
      $data = $this->loadFormDependencies($data);
      $this->template->load('template', 'associated/updateAssociated', $data);
    }
  }

/* GET /associated/delete/{associatedId} */
  public function deleteAssociate() {
    $id = $this->uri->segment(3);
    //$this->CollectionModel->deleteByAssociateId($id);
    if ($this->AssociatedModel->delete($id)) {
      $this->session->set_flashdata('alert', DeleteEntityAlert("Associado", $id));
      redirect('associated','refresh');
    }
    else {
      $this->session->set_flashdata('alert', CreateErrorAlert("Violação de Integridade de Dados"));
      redirect('associated-detail/'. $id);
    }
  }

/* GET /associated/inactive/{associatedId} */
  public function inactiveAssociate() {
    $id = $this->uri->segment(3);
    $this->AssociatedModel->inactive($id);
    $this->session->set_flashdata('alert', UpdateEntityAlert("Associado", $id));
    redirect('associated-detail/'. $id, 'refresh');
  }

/* GET /associated/active/{associatedId} */
  public function activeAssociate() {
    $id = $this->uri->segment(3);
    $this->AssociatedModel->active($id);
    $this->session->set_flashdata('alert', UpdateEntityAlert("Associado", $id));
    redirect('associated-detail/'. $id, 'refresh');
  }

}
