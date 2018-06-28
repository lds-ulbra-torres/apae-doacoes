<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryApiController extends CI_Controller {
	public function __construct(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET");
		parent::__construct();
	}
	/**
     * @author Joziel O. Santos  - 13-04-2018 - pega categorias.
     * @return - retorna as categorias;
     */
	public function getCategories(){
		$data['category'] = $this->CategoryModel->getCategoryInPartners();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

}
