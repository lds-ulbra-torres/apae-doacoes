<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarteiraModel extends CI_Model{

	public function getCarteira(){
		$query = $this->db->get('carteiras_cobranca');
		return $query->result();
	}

	public function addCarteira($dados=NULL){

		if ($dados != NULL):
			$this->db->insert('carteiras_cobranca', $dados);
		endif;
	}

	public function getCarteiraById($id){
			$this->db->where('id_carteira', $id);
			return $this->db->get('carteiras_cobranca')->result_array();

	}

	public function attCarteira($dados=NULL, $id=NULL){
		if($dados != NULL && $id != NULL):
			$this->db->update('carteiras_cobranca', $dados, array('id_carteira'=>$id));
		endif;
	}

	 public function apagarCarteira($id=NULL){

        if ($id != NULL):
            $this->db->delete('carteiras_cobranca', array('id_carteira'=>$id));
        endif;
    }
}
