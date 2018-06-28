<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartnerApiController extends CI_Controller {
	public function __construct(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET");
		parent::__construct();
	}	
	/**
     * @author Joziel O. Santos  - 13-04-2018 - pega paceiros da categoria.
     * @param id - id da categoria de paceiros
     * @return - retorna os paceiros por categoria;
     */
	public function getPartnersByCategoryAPI($id){
		$data['partnersByCategory'] = $this->PartnerModel->getPartnerByCategory($id);
		if($data['partnersByCategory'] != null){
			header('Content-Type: application/json');
			echo json_encode($data);
		}else{
			$msg['error'] = '{error: "Não há parceiros com à categoria fornecida!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
		}
	}
	// Version 2
	public function getPartnersByCategoryAPI_V2($id){
		$data['partnersByCategory'] = $this->PartnerModel->getPartnerByCategory_V2($id);
		if($data['partnersByCategory'] != null){
			header('Content-Type: application/json');
			echo json_encode($data);
		}else{
			$msg['error'] = '{error: "Não há parceiros com à categoria fornecida!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
		}
	}
	/**
     * @author Joziel O. Santos  - 19-04-2018 - pega paceiros.
     * @param id - id do parceiro
     * @return - retorna paceiros;
     */
	public function getPartnersByIdAPI($id){
		$data['partners'] = $this->PartnerModel->getPartnerByIdAPI($id);
		if($data['partners'] != null){
			header('Content-Type: application/json');
			echo json_encode($data);
		}else{
			$msg['error'] = '{error: "Não há parceiros com à id fornecida!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
		}
	}
	//Version 2
	public function getPartnersByIdAPI_V2($id){
		$data['partners'] = $this->PartnerModel->getPartnerByIdAPI_V2($id);
		if($data['partners'] != null){
			header('Content-Type: application/json');
			echo json_encode($data);
		}else{
			$msg['error'] = '{error: "Não há parceiros com à id fornecida!"}';
			header('Content-Type: application/json');
			echo json_encode($msg);
		}
	}

}

/* End of file PartnerApiController.php */
/* Location: ./application/controllers/PartnerApiController.php */