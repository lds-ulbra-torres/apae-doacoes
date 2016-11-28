<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssociatedModel extends CI_Model {

	var $table = "associated";

	public function getAll($limit=null, $offset=null) {
	    return $this->db->get($this->table, $limit, $offset)->result_array();
  	}

  	public function totalCount() {
	    return $this->db->count_all($this->table);
  	}

	public function create($associate) {
		$this->db->trans_begin();

		if(isset($associate['contact'])){
			$contacts = $associate['contact'];
			unset($associate['contact']);
		}

		$this->db->insert($this->table, $associate);
		$id = $this->db->insert_id();

		if(isset($contacts)){
			foreach($contacts as $contact){
				$idContact = substr($contact, 0, strpos($contact, '/'));
				$valueContact = substr($contact, strpos($contact, '/') + 1, strlen($contact));

				$this->db->insert('contact', array('id_contact_type' => $idContact,'id_associate' => $id, 'description_contact' => $valueContact));
			}
		}


		if ($this->db->trans_status() === FALSE)
		{

			$this->db->trans_rollback();
			$error = $this->db->error();

			if ($error['code'] == 1062){
				return 0;
			}
			return 0;
		}
		else
		{
			$this->db->trans_commit();
			return $id;
		}

		return $this->db->trans_status() === FALSE ? 0 : $id;
	}

	public function getById($id) {
		return $this->db->get_where($this->table, array('id_associate' => $id))->result();
	}

	public function update($associate,$contacts) {
		$this->db->trans_begin();
		$this->db->where('id_associate', $associate['id_associate']);
		$this->db->update($this->table, $associate);

		$this->db->where('id_associate',$associate['id_associate']);
		$this->db->delete('contact');
		if(isset($contacts)){
			foreach($contacts as $contact){
				$idContact = substr($contact, 0, strpos($contact, '/'));
				$valueContact = substr($contact, strpos($contact, '/') + 1, strlen($contact));

				$this->db->insert('contact', array('id_contact_type' => $idContact,'id_associate' => $associate['id_associate'], 'description_contact' => $valueContact));
			}
		}

		if($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();

			$error = $this->db->error();
			if ($error['code'] == 1062){
				return 0;
			}
			return 0;
		}else{
			$this->db->trans_commit();
			return $associate['id_associate'];
		}
	}

	public function delete($id) {
		$this->db->trans_begin();

		$this->db->where('id_associate', $id);
		$this->db->delete('contact');

		$this->db->delete($this->table, array('id_associate' => $id));

		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
		}else{
			$this->db->trans_commit();
		}
	}

	public function inactive($id) {
		$this->db->where('id_associate', $id);
		return $this->db->update($this->table, array('disable' => 1));
	}

	public function active($id) {
		$this->db->where('id_associate', $id);
		return $this->db->update($this->table, array('disable' => 0));
	}

	public function getUserContacts($id) {
		return $this->db->query("SELECT c.id_contact_type,description_contact,description_contact_type
			FROM contact c
			INNER JOIN contact_type ct
			ON c.id_contact_type = ct.id_contact_type
			WHERE c.id_associate = $id")->result_array();
	}

	public function getAllContactTypes() {
		return $this->db->get('contact_type')->result_array();
	}

	public function getAllPaymentTypes() {
		return $this->db->get('payment_type')->result_array();
	}

}
