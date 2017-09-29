<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TestesController extends CI_Controller {

  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
      redirect('/auth', 'refresh');
    }
    // $this->load->library('unit_test');
	}

  public function index() {
    $this->doAllTests();
  }

  private function doAllTests() {
    $this->associatedTests();
  }

  private function associatedTests() {
    require_once(APPPATH . 'tests/AssociatedIntTest.php');
    $a = new AssociatedIntTest();
    $a->doAllTests();
  }

}
