<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{

  public function __construct(){
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
  }

  function index() {
    $data['associated'] = $this->AssociatedModel->getAll();
    $data['pagination'] = NULL;
    $this->template->load('template', 'dashboard/dashboard', $data);
  }

  function filter() {
    $filter = (object) $this->input->post();
    foreach ($filter as $i => $v) {
      if (empty($v)) $i = NULL;
    }
    if ($filter == new stdClass() && $this->session->filter != NULL) {
      $filter = $this->session->filter;
    }
    else {
      $this->session->set_userdata('filter', $filter);
    }
    $baseUrl = base_url('donations/filter');
    $totalRows = $this->DashboardModel->totalCount($filter);
    $perPage = 5;
    $getPage = (int) $this->input->get("page");
    $page = $getPage == 0 ? $getPage : ($getPage-1)*$perPage;
    $config = PaginationHelper($baseUrl, $totalRows, $perPage);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

    $data['filter'] = $filter;
    $data['associated'] = $this->AssociatedModel->getAll();
    $data['results'] = $this->DashboardModel->getFilteredResults($filter, $perPage, $page);
    $data['sum'] = $this->DashboardModel->getSum($filter);
    $this->template->load('template', 'dashboard/dashboard', $data);
  }

  public function editCollection($collectionId) {
    $data['collection'] = $this->CollectionModel->getById($collectionId);
    $data['returnUrl'] = base_url('donations/filter');
    $this->template->load('template', 'associated/collections/updateCollection', $data);
  }

}
