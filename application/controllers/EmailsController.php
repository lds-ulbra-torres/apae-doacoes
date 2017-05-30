<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailsController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
		    redirect('/auth', 'refresh');
		}
	}

	private function loadFormDependencies() {
		$data['emailsContact'] = $this->AssociatedModel->getAllEmails();
		return $data;
	}

	public function index() {
        $data['emails'] = $this->EmailsModel->getAll();
        $this->template->load('template', 'emails/listEmails', $data);
    }

    /*Get */
    public function add() {
        $this->template->load('template', 'emails/createEmail');
    }

    /*Post */
    public function create() {
    	$data['email'] = $this->EmailsModel->create($this->input->post('email'));
        $this->template->load('template', 'emails/editEmail', $data);
    }

    /*Get */
    public function edit($id) {
        $data['teste'] = $this->load->view('emails/listEmails', '', TRUE);
        $this->template->load('template', 'emails/editEmail', $data);
    }

    /*Post */
    public function update($email) {
    	
    }

    public function detail($id) {
        $data['teste'] = $this->load->view('emails/listEmails', '', TRUE);
        $this->template->load('template', 'emails/detailEmail', $data);
    }

    /*Post */
    public function delete() {         
        $data['teste'] = $this->load->view('emails/listEmails', '', TRUE);
        $this->template->load('template', 'emails/createEmail', $data);     
    }
}
