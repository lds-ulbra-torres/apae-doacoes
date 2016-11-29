<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CedenteController extends CI_Controller
{

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
        if ($this->CedenteModel->create($this->input->post('cedente'))) {
            redirect(site_url('cedentes'));
        } else {
            $data['error'] = "Erro ao inserir.";
            $this->template->load('template', 'Cedente/Create', $data);
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
        if ($this->CedenteModel->update($this->input->post('cedente'))) {
            redirect('cedentes');
        } else {
            echo "Erro ao atualizar";
        }
    }

    public function delete($idCliente)
    {
        if ($this->CedenteModel->delete($idCliente)) {
            redirect('');
        } else {
            redirect('');
        }

    }

}

/* End of file CedenteController.php */
/* Location: ./application/controllers/CedenteController.php */
