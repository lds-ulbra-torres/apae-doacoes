<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationApiController extends CI_Controller {
    public function __construct(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET");
		parent::__construct();
	}
    /**
     * @author Joziel O. Santos  - 11-05-2018 - recebe pre-parceiro.
     */
    public function postPrePartner(){
        $data = $this->input->post();
        if($this->validacaoPartner($data)){
            $this->NotificationModel->create($data,1);
            $msg['msg'] = '{success:"Sua mensagem foi enviada com sucesso!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
        }else{
            $msg['msg'] = '{error: "name_partner,name_contact, phone and email is required!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
        }
    }
    /**
     * @author Joziel O. Santos  - 11-05-2018 - recebe pre-associado.
     */
    public function postPreAssociated(){
        $data = $this->input->post();
        if($this->validacaoAssociated($data)){
            $this->NotificationModel->create($data,2);
            $msg['msg'] = '{success:"Sua mensagem foi enviada com sucesso!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
        }else{
            $msg['msg'] = '{error: "name_partner,name_contact, phone and email is required!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
        }
    }
    public function validacaoPartner($data){
        if(($data['name_partner'] != "") &&($data['name_contact'] != "") &&($data['phone'] != "") &&($data['email'] != "") &&($data['message'] != "")){ 
            return true;
        }else{
            return false;
        }

    }
    public function validacaoAssociated($data){
        if(($data['name_associated'] != "") && ($data['phone_cel'] != "") &&($data['email'] != "")){ 
            return true;
        }else{
            return false;
        }

    }
}
