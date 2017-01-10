<?php

class MY_Form_validation extends CI_Form_validation {
    /**
     * edit_unique validation
     * Validação de campo unico para edição de entidades.
     * EX: set_rules("name", "Nome" "edit_unique[entity.name.id_entity.'. $id .']");
     */
     public function edit_unique($str, $field) {
         sscanf($field, '%[^.].%[^.].%[^.].%[^.]', $table, $field, $idColumn, $id);
         return isset($this->CI->db)
             ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, $idColumn .' !=' => $id))->num_rows() === 0)
             : FALSE;
     }
}
