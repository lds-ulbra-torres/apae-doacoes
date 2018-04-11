<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartnerModel extends CI_Model {

	private $table = 'partners';

	public function create($partner){

		$this->db->insert('partners', $partner);
		return $this->db->insert_id();
	}

	public function update($partner){
		$this->db->where('id_partner', $partner['id_partner']);
		var_dump($partner);
		$this->db->set($partner);
		return $this->db->update('partners');
	}

	public function searchAll($limit=NULL, $offset=NULL, $search=NULL) {
		$this->db
			->group_start()
				->like('partners.owner_name_partner', $search)
				->or_group_start()
					->like('partners.cnpj_cpf_partner', $search)
				->group_end()
				->or_group_start()
					->like('partners.rg_inscription_partner', $search)
				->group_end()
				->or_group_start()
					->like('partners.fantasy_name_partner', $search)
				->group_end()
			->group_end();
    return $this->db->get($this->table, $limit, $offset)->result();
	}

	public function totalCount() {
    	return $this->db->count_all($this->table);
	}

	public function getPartners(){
		$this->db->join('city', 'partners.id_city = city.id_city');
		$this->db->join('state', 'city.id_state = state.id_state');
		return $this->db->get('partners')->result_array();
	}

	public function getAll($limit=NULL, $offset=NULL) {
    	return $this->db->get($this->table, $limit, $offset)->result();
	}

	public function getPartnerById($id){
		$this->db->where('id_partner', $id);
		$this->db->join('city', 'partners.id_city = city.id_city');
		$this->db->join('state', 'city.id_state = state.id_state');
		$this->db->join('category', 'partners.category_id_category = category.id_category');
		return $this->db->get('partners')->result_array()[0];
	}

	public function delete($id){
		$this->db->where('id_partner', $id);
		return $this->db->delete('partners');
	}
}

/* End of file PartnerModel.php */
/* Location: ./application/models/PartnerModel.php */
