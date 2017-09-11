<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartnerApiController extends CI_Controller {

	public function getPartnersAPI(){
		$data['partners'] = $this->PartnerModel->getPartners();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function getPartnersByIdAPI($id){
		$data['partners'] = $this->PartnerModel->getPartnerById($id);
		if($data['partners'] != null){
			header('Content-Type: application/json');
			echo json_encode($data);
		}else{
			$data['error'] = '{error: "Não há parceiros com à id fornecida!"}';
			header('Content-Type: application/json');
			echo json_encode($data);
		}
	}

}

/* End of file PartnerApiController.php */
/* Location: ./application/controllers/PartnerApiController.php */