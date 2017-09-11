<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CollectionModel extends CI_Model {

  var $table = "collection";

  public function getAllByAssociateId($associateId, $limit=null, $offset=null) {
    return $this->db
    ->order_by('duo_date_collection', 'ASC')
    ->get_where($this->table, ['id_associate'=>$associateId], $limit, $offset)
    ->result();
  }

  public function getById($collectionId) {
    return $this->db
      ->get_where($this->table, ['id_collection'=>$collectionId])
      ->row();
  }

  public function totalCountByAssociateId($associateId) {
    return $this->db
      ->where('id_associate', $associateId)
      ->count_all_results($this->table);
  }

  public function getAllByAssociateIdBetweenDate($associateId, $startDate, $endDate, $limit=null, $offset=null) {
    $this->db->where('duo_date_collection', $startDate);
    $this->db->where('duo_date_collection', $endDate);
    return $this->db->get_where($this->table, array('associate_id'=>$associateId), $limit, $offset)->result_array();
  }

  public function getLastCollectionByAssociateId($associateId, $limit=null, $offset=null) {
    $this->db->limit(1);
    $r = $this->db
      ->order_by('duo_date_collection', 'DESC')
      ->get_where($this->table, ['id_associate'=>$associateId], $limit, $offset)
      ->result();
    return isset($r[0]) ? $r[0] : null;
  }

  /**
   * @author Gabriel Dewes, 29 nov, 2016
   * Cria um array de cobranças para o associado determinado pela quantia de parcelas.
   * @param (object) associate, requere que possua os campos:
   * @param associate->id_associate
   * @param associate->id_frequency
   * @param associate->value_frequency
   * @param associate->duo_date
   * @return insert_batch result
   * Modificado em 16-04-2017, refatorado para aceitar renovação - Leonardo Machado
   */
  /*public function createCollections($associate) {
    $countFrequency = $this->FrequencyModel->getCountFrequencyByFrequencyId($associate->id_frequency);
    if ($countFrequency != null && $countFrequency != 0) {
      $collections = array();
      for ($i=0;$i<$countFrequency;$i++) {
        $duoDate = date('Y-m-d', strtotime($i ." months", strtotime($associate->duo_date)));
        $collection = (object) [
          'value_collection' => $associate->value_frequency,
          'duo_date_collection' => $duoDate,
          'id_associate' => $associate->id_associate,
          'num_collection' => $i+1
        ];
        array_push($collections, $collection);
      }
      $this->CollectionModel->saveBatch($collections);
    }
  }*/
  public function createCollections($associate) {
    $countFrequency = $this->FrequencyModel->getCountFrequencyByFrequencyId($associate->id_frequency);
    $lastCollection = $this->getLastCollectionByAssociateId($associate->id_associate);
    @$monthCollectionInicialize = date('Y-m-d',strtotime($lastCollection->duo_date_collection));
    if ($lastCollection == null) {
      $monthCollectionInicialize = $associate->duo_date;
      @$lastCollection->num_collection = 0;
    }

    if ($countFrequency != null && $countFrequency != 0) {
      $collections = array();
      $currentUserUsername = $this->ion_auth->user()->row()->username;
  		$currDate = gmdate('Y-m-d h:i:s', time());
      for ($i=0;$i<$countFrequency;$i++) {
        $duoDate = date('Y-m-d', strtotime($i ." months", strtotime($associate->duo_date)));

        if (!isset($lastCollection->duo_date_collection)) {
          $duoDate = date('Y-m-d', strtotime($i ." months", strtotime($monthCollectionInicialize)));
        }else{
          $duoDate = date('Y-m-d', strtotime($i + 1 ." months", strtotime($monthCollectionInicialize)));
        }

         $collection = (object) [
          'value_collection' => $associate->value_frequency,
          'duo_date_collection' => $duoDate,
          'id_associate' => $associate->id_associate,
          'num_collection' => $i + 1,
          'createdBy' => $currentUserUsername,
          'createdDate' => $currDate,
          'lastModifiedBy' => $currentUserUsername,
          'lastModifiedDate' => $currDate
        ];
        array_push($collections, $collection);
      }
      $this->CollectionModel->saveBatch($collections);
    }
  }

  public function saveBatch($collections) {
    return $this->db->insert_batch($this->table, $collections);
  }

  public function save($collection) {
    $currentUserUsername = $this->ion_auth->user()->row()->username;
    $currDate = gmdate('Y-m-d h:i:s', time());
    $collection->createdBy = $currentUserUsername;
    $collection->createdDate = $currDate;
    $collection->lastModifiedBy = $currentUserUsername;
    $collection->lastModifiedDate = $currDate;
    $this->db->insert($this->table, $collection);
    return $this->db->insert_id();
  }

  public function update($collection) {
    $collection->lastModifiedBy = $this->ion_auth->user()->row()->username;
    $collection->lastModifiedDate = gmdate('Y-m-d h:i:s', time());
    $this->db->where('id_collection', $collection->id_collection);
    $this->db->update($this->table, $collection);
    return $collection->id_collection;
  }

  public function delete($collectionId) {
    $this->db->where('id_collection', $collectionId);
    return $this->db->delete($this->table);
  }

  public function deleteByAssociateId($associateId) {
    $this->db->where('id_associate', $associateId);
    return $this->db->delete($this->table);
  }

}
