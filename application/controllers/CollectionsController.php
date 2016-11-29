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
}
