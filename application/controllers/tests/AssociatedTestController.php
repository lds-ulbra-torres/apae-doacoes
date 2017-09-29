<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "tests/AssociatedIntTest.php";

class AssociatedTestController extends CI_Controller {

  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
      redirect('/auth');
    }
	}

  public function index() {
    $this->associatedTests();
  }

  private function associatedTests() {
    $associatedIntTest = new AssociatedIntTest();
    $associatedIntTest->doAllTests();
  }

}
