<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssociatedModel extends CI_Model {

	var $table = "associated";

	public function getAll($limit=NULL, $offset=NULL) {
    return $this->db->get($this->table, $limit, $offset)->result();
	}

	public function searchAll($limit=NULL, $offset=NULL, $search=NULL) {
		$this->db
			->group_start()
				->like('associated.name_associate', $search)
				->or_group_start()
					->like('associated.uuid_associate', $search)
				->group_end()
				->or_group_start()
					->like('associated.obs', $search)
				->group_end()
				->or_group_start()
					->like('associated.rg', $search)
				->group_end()
				->or_group_start()
					->like('associated.cpf', $search)
				->group_end()
			->group_end();
    return $this->db->get($this->table, $limit, $offset)->result();
	}

	public function getAllEager($limit=null, $offset=null) {
		$this->db->join('frequency', 'associated.id_frequency = frequency.id_frequency', 'inner');
		$this->db->join('payment_type', 'associated.id_payment_type = payment_type.id_payment_type', 'inner');
		$this->db->join('city', 'associated.id_city = city.id_city', 'inner');
		$this->db->join('state', 'city.id_state = state.id_state', 'inner');
    return $this->db->get($this->table, $limit, $offset)->result();
	}

	public function totalCount() {
    return $this->db->count_all($this->table);
	}

	public function searchTotalCount($search) {
		return $this->db
			->group_start()
				->like('associated.name_associate', $search)
				->or_group_start()
					->like('associated.uuid_associate', $search)
				->group_end()
				->or_group_start()
					->like('associated.obs', $search)
				->group_end()
				->or_group_start()
					->like('associated.rg', $search)
				->group_end()
				->or_group_start()
					->like('associated.cpf', $search)
				->group_end()
			->group_end()
			->count_all_results($this->table);
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

	public function getByIdLazy($id) {
		return $this->db->get_where($this->table, array($this->table.'.id_associate' => $id))->result();
	}

	public function getByIdEager($id) {
		$this->db->join('frequency', 'associated.id_frequency = frequency.id_frequency', 'inner');
		$this->db->join('payment_type', 'associated.id_payment_type = payment_type.id_payment_type', 'inner');
		$this->db->join('city', 'associated.id_city = city.id_city', 'inner');
		$this->db->join('state', 'city.id_state = state.id_state', 'inner');
		return $this->db->get_where($this->table, array($this->table.'.id_associate' => $id))->result();
	}


	public function getAssociateNameById($associateId) {
		$this->db->select('name_associate');
		return $this->db
			->get_where($this->table, array('id_associate' => $associateId))
			->row()
			->name_associate;
	}

	public function update($associate,$contacts) {
		if(isset($associate['contact'])){
			$contacts = $associate['contact'];
			unset($associate['contact']);
		}

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
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
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
		return $this->db->get('payment_type')->result();
	}

}
