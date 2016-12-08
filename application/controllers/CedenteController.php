<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CedenteController extends CI_Controller
{
  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
	}

    public function index()
    {
        $baseUrl = base_url('cedentes');
        $totalRows = $this->CedenteModel->totalCount();
        $perPage = 5;

        $getPage = (int) $this->input->get("page");
        $page = $getPage == 0 ? $getPage : ($getPage-1)*$perPage;

        $data['cedentes'] = $this->CedenteModel->getAll($perPage, $page);
        $config = PaginationHelper($baseUrl, $totalRows, $perPage);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->template->load('template', 'Cedente/Index', $data);
    }

    public function show($id_cedente)
    {
        $data['cedente'] = $this->CedenteModel->getOne($id_cedente)[0];
        $this->template->load('template', 'Cedente/Show', $data);
    }

    public function add()
    {
        $data['bancos'] = $this->BanksModel->GetAll();
        $data['cidades'] = $this->CitiesModel->GetAllCities();
        $this->template->load('template', 'Cedente/Add', $data);
    }

    public function create()
    {
        $id = $this->CedenteModel->create($this->input->post('cedente'));
        if ($id !== 0) {
            $this->session->set_flashdata("alert", CreateEntityAlert("Cedente", $id));
            redirect('cedentes');
        } else {
          $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
          redirect('cedente');
        }
    }

    public function edit($idCedente)
    {
        $data['bancos'] = $this->BanksModel->GetAll();
        $data['cidades'] = $this->CedenteModel->getCities();
        $data['cedente'] = $this->CedenteModel->getOne($idCedente);
        $this->template->load('template', 'Cedente/Edit', $data);
    }

    public function update()
    {
      $id = $this->CedenteModel->update($this->input->post('cedente'));
        if ($id !== 0) {
          $this->session->set_flashdata("alert", UpdateEntityAlert("Cedente", $id));
          redirect('cedentes');
        } else {
          $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados."));
          redirect('cedentes');
        }
    }

    public function delete($idCliente)
    {
      $id = $this->CedenteModel->delete($idCliente);
        if ($id !== 0) {
          $this->session->set_flashdata("alert", DeleteEntityAlert("Cedente", $id));
          redirect('cedentes');
        } else {
          $this->session->set_flashdata('alert', CreateErrorAlert("Violação de Integridade de Dados."));
          redirect('cedentes');
        }

    }

}

/* End of file CedenteController.php */
/* Location: ./application/controllers/CedenteController.php */
