<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailConfigModel extends CI_Model {
	private $from = "teste@teste.com";

	public function getFrom(){
		return $this->from;
	}
}