<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CedenteController extends CI_Controller
{

    public function index()
    {
        $data['cedentes'] = $this->CedenteModel->getAllByCidades();
        $this->template->load('template', 'Cedente/Index', $data);
    }

    public function show($id_cedente)
    {
        $data['cedente'] = $this->CedenteModel->getOne($id_cedente);
        $this->template->load('template', 'Cedente/Show', $data);
    }

    public function add()
    {
        $data['cidades'] = $this->CedenteModel->getCities();
        $this->template->load('template', 'Cedente/Add', $data);
    }

    public function create()
    {
        if ($this->CedenteModel->create($this->input->post('cedente'))) {
            redirect(site_url(''));
        } else {
            $data['error'] = "Erro ao inserir.";
            $this->template->load('template', 'Cedente/Create', $data);
        }
    }

    public function edit($idCedente)
    {
        $data['cidades'] = $this->CedenteModel->getCities();
        $data['cedente'] = $this->CedenteModel->getOne($idCedente);
        $this->template->load('template', 'Cedente/Edit', $data);
    }

    public function update()
    {
        if ($this->CedenteModel->update($this->input->post('cedente'))) {
            redirect('');
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