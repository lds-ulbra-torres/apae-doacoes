<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BanksModel extends CI_Model {

	private $table = "banks";

	/**
	* @author Antoni/Nicholas - 27-09-2016 - Create
	* @param $bank - dados do formulário para criar um novo banco
	* Função que faz inserção no bd de um novo banco.
	*/
	public function Create($bank){
		return $this->db->insert($this->table,$bank);
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - GetAll
	* @return - retorna um array de registros da tabela bancos, caso não haja registro o retono é null.
	* Função que faz um select na tabela bancos e retorna um array com todos os registros.
	*/
	public function GetAll(){
		return $this->db->get($this->table)->result_array();
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - Delete
	* @param $id_bank - id do banco a ser deletado
	* @return - retorna true caso seja deletado, false caso não
	* Função que recebe o id do banco e faz um delete deste registro no bd.
	*/
	public function Delete($id_bank){
		$this->db->where('id_bank',$id_bank);
		return $this->db->delete($this->table);
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - GetOne
	* @param $id_bank - id do banco a ser pesquisado
	* @return - retorna os dados da consulta.
	* Função que recebe o id do banco e faz uma consulta no bd e retorna esses dados.
	*/

	public function GetOne($id_bank){
		$this->db->where('id_bank', $id_bank);
		$bank = $this->db->get($this->table)->result_array();
		return empty($bank)? FALSE : $bank;
	}

	/**
	* @author Antoni/Nicholas - 27-09-2016 - Update
	* @param $bank - dados do formulario de edição do banco
	* @return - retorna true caso a operação seja bem sucedida, caso contrario retorna false.
	* Função que faz a atualização dos dados de um banco no bd e retorna true caso dê certo, false caso não.
	*/
	public function Update($bank){
		$this->db->where('id_bank',$bank['id_bank']);
		if($this->db->update($this->table,$bank)){
			return TRUE;
		}else{
			return FALSE;
		}

	}

}
