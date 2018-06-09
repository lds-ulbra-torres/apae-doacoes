<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationModel extends CI_Model {

	private $table1 = 'pre_partners';
	private $table2 = 'pre_associated';
	
	/**
     * @author Joziel O. Santos  - 11-05-2018 - insere pre-parceiro ou pre-associado conforme o
	 *  que vendo especificado no paramentro table.
     * @param data - array com os dados do formulario que será inserida..
	 * @param table recebe uma referencia para qual table usar $table1 ou $table2
     */
	public function create($data, $table){
		if($table == 1){
			$table = $this->table1;
		}else if($table == 2){
			$table = $this->table2;
		}
		$this->db->insert($table, $data);
	}
	/**
     * @author Joziel O. Santos  - 11-05-2018
	 * @param table recebe uma referencia para qual table usar $table1 ou $table2
     * @return - retorna os pre-parceiros;
     */
	public function get($limit=NULL, $offset=NULL, $table) {
		if($table == 1){
			$table = $this->table1;
		}else if($table == 2){
			$table = $this->table2;
		}
		$this->db->where('became', 0);
		$this->db->where('refused', 0);
    	return $this->db->get($table, $limit, $offset)->result();
	}
	/**
     * @author Joziel O. Santos  - 11-05-2018
	 * @param id recebe um id
	 * @param table recebe uma referencia para qual table usar $table1 ou $table2
     * @return - retorna pre-paceiros por id;
    */
	public function getById($id, $table){
		if($table == 1){
			$table = $this->table1;
		}else if($table == 2){
			$table = $this->table2;
		}
		$this->db->where('id', $id);
		return $this->db->get($table)->result_array()[0];
	}
	/**
     * @author Joziel O. Santos  - 11-05-2018 buasca true na coluna become e refused
	 * @param table recebe uma referencia para qual table usar $table1 ou $table2
     */
	public function totalCount($table) {
		if($table == 1){
			$table = $this->table1;
		}else if($table == 2){
			$table = $this->table2;
		}
		$this->db->where('became', 0);
		$this->db->where('refused', 0);
		return count($this->db->get($table)->result());
	}
	/**
     * @author Joziel O. Santos  - 11-05-2018 coloca true na coluna become
	 * @param table recebe uma referencia para qual table usar $table1 ou $table2
	 */
	public function became($id, $table){
		if($table == 1){
			$table = $this->table1;
		}else if($table == 2){
			$table = $this->table2;
		}
		$this->db->where('id', $id);
		$this->db->set('became', 1);
		$this->db->update($table);
	}
	/**
     * @author Joziel O. Santos  - 11-05-2018 coloca true na coluna refused
	 * @param table recebe uma referencia para qual table usar $table1 ou $table2
	 */
	public function refused($id, $table){
		if($table == 1){
			$table = $this->table1;
		}else if($table == 2){
			$table = $this->table2;
		}
		$this->db->where('id', $id);
		$this->db->set('refused', 1);
		$this->db->update($table);
	}
}

