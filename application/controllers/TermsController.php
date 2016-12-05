<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermsController extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function banrisul($id){
    $data['associated'] = $this->AssociatedModel->getById($id)[0];
    $data['frequency'] = $this->FrequencyModel->getOne($data['associated']->id_frequency)[0];
    $this->load->view('associated/bankTerms/banrisul',$data);
  }

  function bancoBrasil($id){
    $data['associated'] = $this->AssociatedModel->getById($id)[0];
    $this->load->view('associated/bankTerms/bancoBrasil',$data);
  }

}
