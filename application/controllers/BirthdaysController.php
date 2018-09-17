<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BirthdaysController extends CI_Controller {

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

/* GET /associated *birthdays* */
  public function index($searchText=NULL) {
    $this->load->model('BirthdaysModel');
    $baseUrl = base_url('birthdays');
    $totalRows = $this->BirthdaysModel->totalCount();
    $getPage = (int) $this->input->get("page");
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $dateTime = new DateTime();
    $dateTime = $dateTime->format('m');
      if($dateTime[0] == 0){
        $data['mesAtual'] = substr($dateTime, 1);
      } else{
        $data['mesAtual'] = $dateTime;
      }
    $data['months'] = $this->BirthdaysModel->getAllMonths();
    $data['birthdays'] = $this->BirthdaysModel->getBirthdaysMonths($data);    
    $this->template->load('template', 'birthdays/listBirthdays', $data);
  }

/* GET /birthdays?month={queryString} */
  public function search() {
    $this->load->model('BirthdaysModel');
    $data['months'] = $this->BirthdaysModel->getAllMonths();// dropdown list
    $searchText = $this->input->get('month');
    $data['mesAtual'] = $searchText;
    $getPage = (int) $this->input->get("page");
    $data['search'] = $searchText;
    $baseUrl = base_url('birthdays?month='. urlencode($searchText));
    $totalRows = $this->BirthdaysModel->searchTotalCount($searchText);
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $data['birthdays'] = $this->BirthdaysModel->getBirthdaysMonths(self::PER_PAGE, $page, $searchText);
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $this->template->load('template', 'birthdays/listBirthdays', $data);
  }

  
}
