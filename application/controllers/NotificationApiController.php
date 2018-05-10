<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationApiController extends CI_Controller {
    /**
     * @author Joziel O. Santos  - 26-04-2018 - recebe pre-parceiro.
     */
    public function postPrePartner(){
        $data = $this->input->post();
        if($this->validacao($data)){
            $this->NotificationModel->create($data);
            $msg['msg'] = '{success:"Sua mensagem foi enviada com sucesso!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
        }else{
            $msg['msg'] = '{error: "name_partner,name_contact, phone and email is required!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
        }
    }
    public function validacao($data){
        if(($data['name_partner'] != "") &&($data['name_contact'] != "") &&($data['phone'] != "") &&($data['email'] != "") &&($data['message'] != "")){ 
            return true;
        }else{
            return false;
        }

    }
}
