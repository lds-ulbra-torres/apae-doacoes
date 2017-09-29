<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TestsController extends CI_Controller {

  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
      redirect('/auth');
    }
	}

  public function index() {
    $this->template->render('tests');
  }

}
