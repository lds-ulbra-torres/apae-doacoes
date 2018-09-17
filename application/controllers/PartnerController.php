<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartnerController extends CI_Controller {

	const PER_PAGE = 10;

	public function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('/auth', 'refresh');
		}
	}

	private function loadFormDependencies($data=NULL) {
		$data['cidades'] = $this->CitiesModel->GetAllCities();
		$data['categories'] = $this->CategoryModel->getAllCategoryName();
		return $data;
	}

	private function loadFormRules() {
		$this->form_validation->set_rules('fantasy_name_partner', 'Nome da empresa', 'required');
		$this->form_validation->set_rules('owner_name_partner', 'Nome do proprietário', 'required');
		$this->form_validation->set_rules('cnpj_cpf_partner', 'CPF/CNPJ', 'required');
		$this->form_validation->set_rules('id_city', 'Cidade', 'required');
		$this->form_validation->set_rules('category_id_category', 'Categoria', 'required');
	}

	public function index($searchText=NULL)
	{
		$baseUrl = base_url('partner');
		$totalRows = $this->PartnerModel->totalCount();
		$getPage = (int) $this->input->get("page");
		$page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
		$data['partners'] = $this->PartnerModel->getPartners(self::PER_PAGE, $page);
		$config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->template->load('template', 'partner/listPartner', $data);
	}

	public function search() {
		$searchText = $this->input->get('q');
		$getPage = (int) $this->input->get("page");
		$data['search'] = $searchText;
		$baseUrl = base_url('partner/search?q='. urlencode($searchText));
		$totalRows = $this->AssociatedModel->searchTotalCount($searchText);
		$page = $getPage == 0 ? $getPage : ($getPage-1) * self::PER_PAGE;
		$data['partners'] = $this->PartnerModel->searchAll(self::PER_PAGE, $page, $searchText);
		$config = PaginationHelper($baseUrl, $totalRows, self::PER_PAGE);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->template->load('template', 'partner/listPartner', $data);
	}

	public function newPartner(){
		$data = $this->loadFormDependencies();
		$this->template->load('template', 'partner/createPartner', $data);
	}

	public function createPartner(){

		$this->loadFormRules();

		$route = null;
		if (isset($_FILES)) {
			$tmp = $_FILES['photo_partner']['tmp_name'];
			$name = $_FILES['photo_partner']['name'];
			$type = substr($name, -4, 4);
			$new_name = md5($name.microtime());
			$dir = './uploads/';
			$route = $dir . $new_name . $type;
			if (!file_exists($dir)) {
	    	mkdir($dir, 0777, true);
			}
			move_uploaded_file($tmp, $route);
		}

		if ($this->form_validation->run()) {
			$partner = $this->input->post();
			$partner['photo_partner'] = substr($route, 1);

			$id = $this->PartnerModel->create($partner);
			if($id !== 0) {
				$message =  $partner['fantasy_name_partner'] . " é o novo parceiro da APAE Torres! Confira os benefícios.";
			// Notification FireBase	
			//	$this->notifyFcm($message);

				redirect('partner/partner-detail/' . $id,'refresh');
			} else {
				unlink($route);
				$this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados. Não foi possível salvar."));
				redirect('partner','refresh');
			}
		} else {
			$data = $this->loadFormDependencies();
			$this->template->load('template', 'partner/createPartner', $data);
		}
	}

	public function editPartner($id){
		$data = $this->loadFormDependencies();
		$data['partner'] = $this->PartnerModel->getPartnerById($id);
		$this->template->load('template', 'partner/updatePartner', $data);
	}

	public function updatePartner(){
		$this->loadFormRules();

		$route = null;
		if(isset($_FILES)){
			$tmp = $_FILES['photo_partner']['tmp_name'];
			$name = $_FILES['photo_partner']['name'];
			$type = substr($name, -4, 4);
			$new_name = md5($name.microtime());
			$route ='./uploads/' . $new_name . $type;
			move_uploaded_file($tmp, $route);
		}

		$partner = $this->input->post();

		if(!empty($_FILES['photo_partner']['size'])){
			$partner['photo_partner'] = substr($route, 1);
		}

		if($this->form_validation->run()){
			if ($this->PartnerModel->update($partner)){
				$this->session->set_flashdata('alert', UpdateEntityAlert("Parceiro", $partner['id_partner']));
				redirect('partner');
			}else{
				$this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados. Não foi possível alterar"));
				redirect('associated','refresh');
			}
		}else{
			$data['partner'] = $partner;
			$data = $this->loadFormDependencies();
			$this->template->load('template', 'partner/updatePartner', $data);
		}
	}

	public function detailPartner($id){
		$data['partner'] = $this->PartnerModel->getPartnerById($id);
		$this->template->load('template', 'partner/detailedPartner', $data);
	}

	public function deletePartner($id){
		if ($this->PartnerModel->delete($id)) {
			$this->session->set_flashdata('alert', DeleteEntityAlert("Parceiro", $id));
			redirect('partner','refresh');
		}
		else {
			$this->session->set_flashdata('alert', CreateErrorAlert("Violação de Integridade de Dados"));
			redirect('partner/partner-detail/'. $id);
		}
	}

	private function notifyFcm($msg) {

		$argumentsInvalid = ['error' => 'Wrong number of arguments'];
        if($msg != "") {
			$msg = array("body" => $msg, "sound" => "default");
			$notify = new NotificationFirebaseModel();
			$notify->topic = 'global_ios';
			$notify->message = $msg;
			$response = $notify->sendNotification();
			$notify->topic = 'global_android';
			$response1 = $notify->sendNotification();
			if($response){
				if($response1){
					return json_encode(array('success' => $response ." e ". $response1), 200);
				}else{
					return json_encode(array('eror' => 'Erro notify'), 500);
				}
			}else{
				return json_encode(array('eror' => 'Erro notify'), 500);
			}
        }else{
            return json_encode($argumentsInvalid, 406);
        }
	}

}

/* End of file PartnerController.php */
/* Location: ./application/controllers/PartnerController.php */
