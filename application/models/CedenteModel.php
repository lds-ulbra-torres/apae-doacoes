<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CedenteModel extends CI_Model
{
    private $table = "cedentes";

    public function getAll($limit=null, $offset=null)
    {
        $this->db->select('id_cedente, name_city, razao_social');
        $this->db->join('city', 'city.id_city = cedentes.id_cidade', 'left');
        return $this->db->get($this->table, $limit, $offset)->result_array();
    }

    public function totalCount() {
	    return $this->db->count_all($this->table);
  	}

    public function getAllByCidades()
    {
        $this->db->select('id_cedente, name_city, razao_social');
        $this->db->from($this->table);
        $this->db->join('city', 'city.id_city = cedentes.id_cidade', 'left');
        return $this->db->get()->result_array();
    }

    public function getOne($idCedente)
    {

        $this->db->select('id_cedente, razao_social, id_bank,
            cod_cedente, num_agencia, num_operacao, num_conta_corrente, cnpj, name_city, id_cidade');
        $this->db->join('city', 'city.id_city = cedentes.id_cidade', 'left');
        return $this->db->get_where($this->table, array('id_cedente' => $idCedente))->result_array();
    }

    public function getCities()
    {
        return $this->db->get('city')->result_array();
    }

    public function create($cedente)
    {
        $this->db->insert($this->table, $cedente);
        return $this->db->insert_id();
    }

    public function update($cedente)
    {
        $this->db->where('id_cedente', $cedente['id_cedente']);
        if ($this->db->update($this->table, $cedente)) {
          return $cedente['id_cedente'];
        }
        else return 0;
    }

    public function delete($idCedente)
    {
        $this->db->where('id_cedente', $idCedente);
         if ($this->db->delete($this->table)) {
           return $idCedente;
         } else return 0;
    }


}

/* End of file CedenteModel.php */
/* Location: ./application/models/CedenteModel.php */
