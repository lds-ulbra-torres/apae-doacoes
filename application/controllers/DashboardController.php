<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller{

  public function __construct() {
    parent::__construct();
  }

  function index() {
    $data['associated'] = $this->AssociatedModel->getAll();
    $this->template->load('template', 'dashboard/dashboard', $data);
  }

  function filter() {
    $filter = (object) $this->input->post();
    foreach ($filter as $i => $v) {
      if (empty($v)) $i = NULL;
    }
    $data['associated'] = $this->AssociatedModel->getAll();
    $data['results'] = $this->DashboardModel->getFilteredResults($filter);
    $data['sum'] = $this->DashboardModel->getSum($filter);
    $this->template->load('template', 'dashboard/dashboard', $data);
  }

}
