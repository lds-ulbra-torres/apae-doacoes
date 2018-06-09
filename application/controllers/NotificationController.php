<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationController extends CI_Controller {

	const PER_PAGE = 10;

	public function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth', 'refresh');
		}
	}

	public function newPartners($searchText=NULL){
		$baseUrl = base_url('newPartners');
		$totalRows = $this->NotificationModel->totalCount(1);
		$getPage = (int) $this->input->get("page");
		$page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
		$data['partners'] = $this->NotificationModel->get(self::PER_PAGE, $page,1);
		$config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->template->load('template', 'newPartner/listPrePartner', $data);
	}
	public function newAssociateds($searchText=NULL){
		$baseUrl = base_url('newAssociateds');
		$totalRows = $this->NotificationModel->totalCount(2);
		$getPage = (int) $this->input->get("page");
		$page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
		$data['associateds'] = $this->NotificationModel->get(self::PER_PAGE, $page,2);
		$config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->template->load('template', 'newAssociated/listPreAssociated', $data);
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 confirma became
     */
	public function becamePartner($id){
		$this->NotificationModel->became($id,1);
		redirect('newPartners');
	}
	public function becameAssociated($id){
		$this->NotificationModel->became($id,2);
		redirect('newAssociateds');
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 confirma refused
     */
	public function refusedPartner($id){
		$this->NotificationModel->refused($id,1);
		redirect('newPartners');
	}
	public function refusedAssociated($id){
		$this->NotificationModel->refused($id,2);
		redirect('newAssociateds');
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 mostra detalhes
     */
	public function detailPartner($id){
		$data['partner'] = $this->NotificationModel->getById($id,1);
		$this->template->load('template', 'newPartner/detailedPrePartner', $data);
	}

	public function detailAssociated($id){
		$data['associated'] = $this->NotificationModel->getById($id,2);
		$this->template->load('template', 'newAssociated/detailedPreAssociated', $data);
	}
}
