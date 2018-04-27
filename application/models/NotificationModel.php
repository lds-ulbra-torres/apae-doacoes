<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationModel extends CI_Model {

	private $table = 'pre_partners';
	
	/**
     * @author Joziel O. Santos  - 26-04-2018 - insere pre-parceiro.
     * @param partner - array com os dados do pre-parceiro que será inserida..
     */
	public function create($partner){
		$this->db->insert($this->table, $partner);	
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018
     * @return - retorna os pre-parceiros;
     */
	public function getPrePartner($limit=NULL, $offset=NULL) {
		$this->db->where('became_partner', 0);
		$this->db->where('refused_partner', 0);
    	return $this->db->get($this->table, $limit, $offset)->result();
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018
     * @return - retorna pre-paceiros por id;
    */
	public function getPartnerById($id){
		$this->db->where('id_pre_partner', $id);
		return $this->db->get($this->table)->result_array()[0];
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 coloca true na coluna become-partner
     */
	public function totalCountPartner() {
		$this->db->where('became_partner', 0);
		$this->db->where('refused_partner', 0);
		return count($this->db->get($this->table)->result());
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 coloca true na coluna become-partner
     */
	public function becamePartner($id){
		$this->db->where('id_pre_partner', $id);
		$this->db->set('became_partner', 1);
		$this->db->update($this->table);
	}
	/**
     * @author Joziel O. Santos  - 26-04-2018 coloca true na coluna refused-partner
     */
	public function refusedPartner($id){
		$this->db->where('id_pre_partner', $id);
		$this->db->set('refused_partner', 1);
		$this->db->update($this->table);
	}
}

