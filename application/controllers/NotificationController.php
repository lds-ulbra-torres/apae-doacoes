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

	public function index($searchText=NULL)
	{
		$baseUrl = base_url('notification');
		$totalRows = $this->NotificationModel->totalCountPartner();
		$getPage = (int) $this->input->get("page");
		$page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
		$data['partners'] = $this->NotificationModel->getPrePartner(self::PER_PAGE, $page);
		$config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->template->load('template', 'notification/listPrePartner', $data);
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 confirma became-partner
     */
	public function becamePartner($id){
		$this->NotificationModel->becamePartner($id);
		redirect('notification');
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 confirma refused-partner
     */
	public function refusedPartner($id){
		$this->NotificationModel->refusedPartner($id);
		redirect('notification');
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 mostra detalhes da mensagem
     */
	public function detailPartner($id){
		$data['partner'] = $this->NotificationModel->getPartnerById($id);
		$this->template->load('template', 'notification/detailedPrePartner', $data);
	}

}
