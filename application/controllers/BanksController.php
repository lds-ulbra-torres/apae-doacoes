<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BanksController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('BanksModel');
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - index
	* Função que pega todos os registros da tabela bancos e lista numa view
	*/
	public function index(){
		$data = array();
		$data['banks'] = $this->BanksModel->GetAll();
		/*if($data['banks'] != FALSE){
			$this->load->view('banks/listBanks',$data);
		}else{
			$this->session->set_flashdata("danger", "Erro ao buscar informações da base de dados!");
		}*/

		$this->template->load("template", "banks/listBanks", $data);

	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - add
	* Função que carrega a view com formulario para inserir os dados de um novo banco
	*/
	public function add(){
		$this->load->view('banks/newBank');
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - create
	* Função que recebe os dados de um banco do formulário chama a função Create do Model, após a operação redireciona para a index.
	*/
	public function create(){
		if($this->BanksModel->Create($this->input->post('bank'))){
			$this->session->set_flashdata("success", "Banco criado com sucesso!");
		}else{
			$this->session->set_flashdata("danger", "Erro ao criar banco!");
		}
		redirect('banks','refresh');
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - delete
	* @param $id_bank - O id do banco a ser deletado
	* Função que recebe o id do banco e chama a função Delete do Model, após a operação redireciona para a index.
	*/

	public function delete($id_bank){
		if($this->BanksModel->Delete($id_bank)){
			$this->session->set_flashdata("success", "Banco removido com sucesso!");
		}else{
			$this->session->set_flashdata("danger", "Erro ao remover banco!");
		}
		redirect('banks','refresh');
	}

	/*
	* @author Antoni/Nicholas - 27-09-2016 - edit
	* @param $id_bank - O id do banco a ser atualizado
	* Função recebe o id do banco e chama a função getOne do Model que retorna os dados de um banco, após esta
	* operação ele carrega a view para alterar os dados do banco selecionado.
	*/

	public function edit($id_bank){
		$data['bank']= $this->BanksModel->getOne($id_bank);
		if($data['bank']!= FALSE){
			$this->load->view('banks/updateBank', $data);
		}else{
			$this->session->set_flashdata("danger", "Erro ao buscar registro na base de dados!");
			redirect('bank','refresh');
		}
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - update
	* Função que recebe os dados de um banco do formulário e chama a função Update do Model, após a operação redireciona para a index.
	*/
	public function update(){
		if ($this->BanksModel->Update($this->input->post('bank'))) {
			$this->session->set_flashdata("success", "Banco atualizado com sucesso!");
		}else{
			$this->session->set_flashdata("danger", "Erro ao atualizar banco!");
		}
		redirect('banks','refresh');
	}


}
