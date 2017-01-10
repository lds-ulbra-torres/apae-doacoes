<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CitiesModel extends CI_Model {

  public function GetAllCities() {
    $this->db->order_by('name_city', 'ASC');
      return $this->db->get('city')->result();
  }
}
