<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CollectionModel extends CI_Model {

  var $table = "collection";

  public function getAllByAssociateId($associateId, $limit=null, $offset=null) {
    return $this->db->get_where($this->table, array('associate_id'=>$associateId), $limit, $offset)->result_array();
  }

  public function getAllByAssociateIdBetweenDate($associateId, $startDate, $endDate, $limit=null, $offset=null) {
    $this->db->where('duo_date_collection', $startDate);
    $this->db->where('duo_date_collection', $endDate);
    return $this->db->get_where($this->table, array('associate_id'=>$associateId), $limit, $offset)->result_array();
  }

  public function create($collection) {
    return $this->db->insert($this->table, $collection);
  }

  public function saveBatch($collections) {
    return $this->db->insert_batch($this->table, $collections);
  }

  public function update($collection) {
    $this->db->where('id_collection', $collection['id_collection']);
    return $this->db->update($this->table, $collection);
  }

  public function delete($collectionId) {
    $this->db->where('id_collection', $collectionId);
    return $this->db->delete($this->table);
  }

}
