<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  public function getFilteredResults($filter) {
    $this->buildFilter($filter);
    return $this->db->get()->result();
  }

  public function getSum($filter) {
    $this->db->select('SUM(collection.value_collection) as sum');
    $this->buildFilter($filter);
    $result = $this->db->get()->row()->sum;
    return $result;
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
      $this->db->where('collection.payday_collection =', NULL);
    }
    else if ($filter->status == 2) {
      $this->db->where('collection.payday_collection !=', NULL);
    }
    else if ($filter->status == 3) {
      $this->db->where(
      ['collection.payday_collection =' => NULL,
       'collection.duo_date_collection <='    => date('Y-m-d')]);
    }
    else if ($filter->status == 4) {
      $this->db->where(
      ['collection.payday_collection !=' => NULL,
       'collection.payday_collection >=' => 'collection.duo_date_collection']);
    }
  }

}
