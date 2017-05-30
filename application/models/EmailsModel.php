<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailsModel extends CI_Model {

	private $table = "emails";
	private $tableEmailTo = "email_to_contact";

	public function getAll(){
		return $this->db->query("
			SELECT id_email, subject_email, body_email, DATE_FORMAT(datetime_email, '%d/%m/%Y') as datetime_email
			FROM ". $this->table."
			ORDER BY datetime_email DESC;
		")->result_array();
	}


	public function getOne($id_email){
		$this->db->where('id_email', $id_email);
		$email = $this->db->get($this->table)->result_array();
		return empty($email) ? FALSE : $email;
	}

	public function create($email, $idList){

	}

	public function delete($id_bank){
		$this->db->where('id_bank', $id_bank);
		return $this->db->delete($this->table);
	}

}