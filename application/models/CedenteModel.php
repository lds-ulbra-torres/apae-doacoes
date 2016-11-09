<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CedenteModel extends CI_Model
{
    private $table = "cedentes";

    public function getAllByCidades()
    {
        $this->db->select('id_cedente, name_city, razao_social');
        $this->db->from($this->table);
        $this->db->join('city', 'city.id_city = cedentes.id_cidade', 'inner');
        return $this->db->get()->result_array();
    }

    public function getOne($idCedente)
    {

        $this->db->select('id_cedente, razao_social,
            cod_cedente, num_agencia, num_operacao, num_conta_corrente, cnpj, name_city, id_cidade');
        $this->db->from($this->table);
        $this->db->join('city', 'city.id_city = cedentes.id_cidade', 'inner');
        $this->db->where('id_cedente', $idCedente);
        return $this->db->get()->result_array();
    }

    public function getCities()
    {
        return $this->db->get('city')->result_array();
    }

    public function create($cedente)
    {
        return $this->db->insert($this->table, $cedente);
    }

    public function update($cedente)
    {
        $this->db->where('id_cedente', $cedente['id_cedente']);
        return $this->db->update($this->table, $cedente);
    }

    public function delete($idCedente)
    {
        $this->db->where('id_cedente', $idCedente);
        return $this->db->delete($this->table);
    }


}

/* End of file CedenteModel.php */
/* Location: ./application/models/CedenteModel.php */
