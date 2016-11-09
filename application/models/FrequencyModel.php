<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrequencyModel extends CI_Model
{
    //Nome da tabela que ira modifcar.
    public $table = "frequency";

    /**
     * @author Leonardo S - 11-10-2016 - Busca todas as frequencias
     * @return - se for vazio, retorna nulo, senão, retorna a busca do banco.
     */
    public function getAll()
    {
      //  $this->db->order_by('frequency_description','asc');
        $this->db->from($this->table);
        $query = $this->db->get()->result_array();
        return empty($query) ? null : $query;
    }

    /**
     * @author Leonardo S - 11-10-2016 - Busca especifica de frequencia.
     * @param pIdFrequency - id da frequencia que será buscado.
     * @return - retorna a frequncia.
     */
    public function getOne($pIdFrequency)
    {
        $this->db->where('idFrequency', $pIdFrequency);
        return $this->db->get($this->table)->result_array();
    }

    /**
     * @author Leonardo S - 11-10-2016 - insere frequencia.
     * @param pFrequency - array com os dados da frequncia que será inserida..
     * @return - retorna, se a frequncia foi inserida, true, senão retorna false;
     */
    public function insert($pFrequency)
    {
        return $this->db->insert($this->table, $pFrequency) > 0 ? TRUE : FALSE;
    }

    /**
     * @author Leonardo S - 11-10-2016 - insere frequencia.
     * @param pFrequency - array com os dados da frequncia que será atualizada..
     * @return - retorna, se a frequncia foi atualizada, true, senão retorna false;
     */
    public function update($pFrequency)
    {
        $this->db->where('idFrequency', $pFrequency['idFrequency']);
        return $this->db->update($this->table, $pFrequency) > 0 ? TRUE : FALSE;
    }

    /**
     * @author Leonardo S - 11-10-2016 - deleta frequencia.
     * @param pId - id da frequencia a ser apagada
     * @return - retorna, se a frequncia foi apagada, true, senão retorna false;
     */
    public function delete($pId)
    {
        $this->db->where('idFrequency', $pId);
        return $this->db->delete($this->table) > 0 ? TRUE : FALSE;
    }

}
