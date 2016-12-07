<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  public function getFilteredResults($filter, $limit=NULL, $offset=NULL) {
    $this->buildFilter($filter);
    $this->db->limit($limit, $offset);
    return $this->db->get()->result();
  }

  public function getSum($filter) {
    $this->db->select('SUM(collection.value_collection) as sum');
    $this->buildFilter($filter);
    $result = $this->db->get()->row()->sum;
    return $result;
  }

  public function totalCount($filter) {
    $this->buildFilter($filter);
    return $this->db->count_all_results();
  }

  private function buildFilter($filter) {
    $this->db->from('collection')
    ->join('associated', 'collection.id_associate = associated.id_associate', 'inner')
    ->where('collection.duo_date_collection >=', $filter->from_date)
    ->where('collection.duo_date_collection <=', $filter->to_date);

    if ($filter->id_associate != NULL && $filter->id_associate != 0) {
      $this->db->where('associated.id_associate', $filter->id_associate);
    }

    if ($filter->status == 1) {
      //em aberto
      $this->db->where('collection.payday_collection =', NULL);
    }
    else if ($filter->status == 2) {
      //recebido
      $this->db->where('collection.payday_collection !=', NULL);
    }
    else if ($filter->status == 3) {
      //vencido
      $this->db->where(
      ['collection.payday_collection =' => NULL,
       'collection.duo_date_collection <='    => date('Y-m-d')]);
    }
    else if ($filter->status == 4) {
      //pago vencido
      $this->db->where(
      ['collection.payday_collection !=' => NULL,
       'collection.payday_collection >=' => 'collection.duo_date_collection']);
    }
  }

}
