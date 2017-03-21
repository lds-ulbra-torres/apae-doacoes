<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{

  const PER_PAGE = 10;

  public function __construct() {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
  }

  private function loadFormDependencies($data, $filter) {
    /*$data['associated']    = $this->AssociatedModel->getAll();*/
    $data['payment_types'] = $this->AssociatedModel->getAllPaymentTypes();
    $data['frequencies']   = $this->FrequencyModel->getAll();
    $data['filter']        = $filter;
    return $data;
  }

/* GET /donations */
  function index() {
    $filter = (object) [
      'from_date'       => date('Y-m-01'),
      'to_date'         => date('Y-m-t'),
      /*'id_associate'    => NULL,*/
      'status'          => NULL,
      'id_frequency'    => NULL,
      'id_payment_type' => NULL,
      'search'          => NULL];
    $this->session->set_userdata('filter', $filter);
    $baseUrl = base_url('donations/filter');
    $totalRows = $this->DashboardModel->totalCount($filter);
    $getPage = (int) $this->input->get("page");
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['results'] = $this->DashboardModel->getFilteredResults($filter, self::PER_PAGE, $page);
    $data['sum'] = $this->DashboardModel->getSum($filter);

    $data = $this->loadFormDependencies($data, $filter);
    $this->template->load('template', 'dashboard/dashboard', $data);
  }

/* POST /donations/filter */
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
    $getPage = (int) $this->input->get("page");
    $page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
    $config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();

    $data['results'] = $this->DashboardModel->getFilteredResults($filter, self::PER_PAGE, $page);
    $data['sum'] = $this->DashboardModel->getSum($filter);

    $data = $this->loadFormDependencies($data, $filter);
    $this->template->load('template', 'dashboard/dashboard', $data);
  }

/* POST /donations/edit-collection/{collectionId} */
  public function editCollection($collectionId) {
    $data['collection'] = $this->CollectionModel->getById($collectionId);
    $data['returnUrl'] = base_url('donations/filter');
    $this->template->load('template', 'associated/collections/updateCollection', $data);
  }

}
