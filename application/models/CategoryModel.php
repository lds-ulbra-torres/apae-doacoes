<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {
    public $table = "category";

    public function getAll($limit=NULL, $offset=NULL) {
        return $this->db->get($this->table, $limit, $offset)->result();
    }

    /**
     * @author Joziel O. Santos  - 03-04-2018 - Busca especifica de categoria.
     * @param pIdCategory - id da categoria que será buscado.
     * @return - retorna a categoria.
     */
    public function getOne($pIdCategory)
    {
        $this->db->where('id_category', $pIdCategory);
        return $this->db->get($this->table)->result_array();
    }

    /**
     * @author Joziel O. Santos  - 03-04-2018 - insere categoria.
     * @param pcategory - array com os dados da categoria que será inserida..
     * @return - retorna, se a categoria foi inserida, true, senão retorna false;
     */
    public function insert($pCategory)
    {
        $this->db->insert($this->table, $pCategory);
        return $this->db->insert_id();
    }

    /**
     * @author Joziel O. Santos  - 03-04-2018 - insere categoria.
     * @param pCategory - array com os dados da categoria que será atualizada..
     * @return - retorna, se a categoria foi atualizada, true, senão retorna false;
     */
    public function update($pCategory)
    {
        $this->db->where('id_category', $pCategory['id_category']);
        if ($this->db->update($this->table, $pCategory)) {
          return $pCategory['id_category'];
        }
        else return 0;
    }

    /**
     * @author Joziel O. Santos  - 03-04-2018 - deleta categoria.
     * @param pId - id da categoria a ser apagada
     * @return - retorna, se a categoria foi apagada, true, senão retorna false;
     */
    public function delete($pId)
    {
        $this->db->where('id_category', $pId);
        return $this->db->delete($this->table) > 0 ? TRUE : FALSE;
    }

}
