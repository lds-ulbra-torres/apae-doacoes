<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryApiController extends CI_Controller {
	/**
     * @author Joziel O. Santos  - 13-04-2018 - pega categorias.
     * @return - retorna as categorias;
     */
	public function getCategories(){
		$data['category'] = $this->CategoryModel->getAll();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

}
