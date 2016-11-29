<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CollectionsController extends CI_Controller {

  public function index($associateId) {
    $baseUrl = base_url('associated/'. $associateId .'/collections');
    $totalRows = $this->CollectionModel->totalCountByAssociateId($associateId);
    $perPage = 5;
    $getPage = (int) $this->input->get("page");
    $page = $getPage == 0 ? $getPage : ($getPage-1)*$perPage;
    $config = PaginationHelper($baseUrl, $totalRows, $perPage);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

    $data['collections'] = $this->CollectionModel->getAllByAssociateId($associateId, $perPage, $page);
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

    if ($this->form_validation->run()) {
      $collection = (object) $this->input->post();
      if (empty($collection->payday_collection)) $collection->payday_collection = null;
      $id = $this->CollectionModel->save($collection);
      if ($id)
        redirect('associated/'. $collection->id_associate .'/collections'.'/'. $id, 'refresh');
      redirect('associated/'. $collection->id_associate .'/collections');
    }
    else {
      $data['collection'] = (object) null;
      $this->template->load('template', 'associated/collections/createCollection', $data);
    }
  }

  public function updateCollection() {
    $collection = (object) $this->input->post();
    if (empty($collection->payday_collection)) $collection->payday_collection = null;
    $id = $this->CollectionModel->update($collection);
    if ($id)
      redirect('associated/'. $collection->id_associate .'/collections'.'/'. $id, 'refresh');
    redirect('associated/'. $collection->id_associate .'/collections');
  }

  public function deleteCollection($collectionId) {
    $this->CollectionModel->delete($collectionId);
  }
}
