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
		$this->form_validation->set_rules('rg_inscription_partner', 'RG/Inscrição estadual', 'required');
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
		$data['category'] = $this->CategoryModel->getAllCategoryName();
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
				$message = [
					"title" => "Novo parceiro da APAE Torres",
					"message" => $partner['fantasy_name_partner'] . " é o novo parceiro da APAE Torres! Confira os benefícios."
				];
				$this->notifyFcm($message);

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

	private function notifyFcm($message) {
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
				'to' => '/topics/new-partner',
				'data' => $message
		);

		$headers = array('Content-Type: application/json',
				'Authorization:key=AAAA2MHj0hc:APA91bFeklIhDriYGY_ETK3MNfOJShYFbxk4LIsUP5XgaNy3DSvLBzJNeyYg6FQNYo65MuDlnUrC_F6wf3PQrBXJota-9-ReojTGs418f6DokvGNkSTshgtdG0QWaR7ctFz2VDG4q2sq'
		);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		if ($result == FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
	}
}

/* End of file PartnerController.php */
/* Location: ./application/controllers/PartnerController.php */
