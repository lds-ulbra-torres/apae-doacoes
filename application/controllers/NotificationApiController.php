<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationApiController extends CI_Controller {
    /**
     * @author Joziel O. Santos  - 26-04-2018 - recebe pre-parceiro.
     */
    public function postPrePartner(){
        $data = $this->input->post();
        $this->NotificationModel->create($data);
    }
}
