<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CollectionsController extends CI_Controller {

  const PER_PAGE = 10;

  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
	}

  public function index($associateId) {
    $baseUrl = base_url('associated/'. $associateId .'/collections');
    $totalRows = $this->CollectionModel->totalCountByAssociateId($associateId);
    $perPage = 5;
    $getPage = (int) $this->input->get("page");
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['name_associate'] = $this->AssociatedModel->getAssociateNameById($associateId);
    $data['collections'] = $this->CollectionModel->getAllByAssociateId($associateId, self::PER_PAGE, $page);
    $this->template->load('template', 'associated/collections/listCollections', $data);
  }

  public function newCollection() {
    $data['collection'] = (object) null;
    $this->template->load('template', 'associated/collections/createCollection', $data);
  }

  public function editCollection($collectionId) {
    $data['collection'] = $this->CollectionModel->getById($collectionId);
    $this->template->load('template', 'associated/collections/updateCollection', $data);
  }

  public function detailCollection($collectionId) {
    $data['collection'] = $this->CollectionModel->getById($collectionId);
    $this->template->load('template', 'associated/collections/detailCollection', $data);
  }

  public function createCollection() {
    $this->form_validation->set_rules('duo_date_collection', 'Data de Vencimento', 'required');
    $this->form_validation->set_rules('value_collection', 'Valor de Contribuição', 'required');
    $this->form_validation->set_rules('num_collection', 'Número de Parcela', 'required');

    if ($this->form_validation->run()) {
      $collection = (object) $this->input->post();
      if (empty($collection->payday_collection)) $collection->payday_collection = null;
      $id = $this->CollectionModel->save($collection);
      if ($id) {
        $this->session->set_flashdata('alert', CreateEntityAlert("Cobrança", $id));
        redirect('associated/'. $collection->id_associate .'/collections'.'/'. $id, 'refresh');
      } else {
        $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
        redirect('associated/'. $collection->id_associate .'/collections');
      }
    }
    else {
      $data['collection'] = (object) null;
      $this->template->load('template', 'associated/collections/createCollection', $data);
    }
  }

  public function updateCollection() {
    $collection = (object) $this->input->post();
    if (empty($collection->payday_collection)) $collection->payday_collection = null;
    if (isset($collection->returnUrl)) {
      $returnUrl = $collection->returnUrl;
      unset($collection->returnUrl);
    }
    $id = $this->CollectionModel->update($collection);
    if ($id) {
      $this->session->set_flashdata('alert', UpdateEntityAlert("Cobrança", $id));
      if (isset($returnUrl) && $returnUrl != NULL) redirect($returnUrl);
      redirect('associated/'. $collection->id_associate .'/collections', 'refresh');
    }
    else {
      $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
      redirect('associated/'. $collection->id_associate .'/collections');
    }
  }

  public function deleteCollection($collectionId) {
    $this->CollectionModel->delete($collectionId);
  }

  public function renewCollection($id_associated){
      $associate = $this->AssociatedModel->getByIdLazy($id_associated);
      $this->CollectionModel->createCollections($associate[0]);
      redirect('associated/'.$id_associated.'/collections','refresh');
  }
}
