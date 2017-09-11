<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermsController extends CI_Controller{

  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
	}

  function banrisul($id){
    $data['associated'] = $this->AssociatedModel->getByIdLazy($id)[0];
    $data['frequency'] = $this->FrequencyModel->getOne($data['associated']->id_frequency)[0];
    $this->load->view('associated/bankTerms/banrisul',$data);
  }

  function bancoBrasil($id){
    $data['associated'] = $this->AssociatedModel->getByIdLazy($id)[0];
    $this->load->view('associated/bankTerms/bancoBrasil',$data);
  }

}
