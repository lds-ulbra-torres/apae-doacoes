<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
class Carteiras_Controller extends CI_Controller {

	public function index(){
		$data['carteira'] = $this->CarteiraModel->getCarteira();

		$this->template->load('template', 'listar_carteiras', $data);

	}

	public function add(){
		$this->template->load('template', 'add_carteira');
	}

	public function visualiza($id=NULL){


		if($id == NULL) {
			redirect('/');
		}

		$query = $this->CarteiraModel->getCarteiraById($id);
		if($query == NULL) {
			redirect('/');
		}else{
			$dados['carteiras'] = $query;
			$this->template->load('template', 'visualiza_carteira', $dados);
		}
	}

	public function save(){


		if ($this->input->post('nome') == NULL) {
			$this->template->load('template', 'falha_cadastro');
		} else{

			$dados['nome_carteira'] = $this->input->post('nome');
			$dados['nume_carteira'] = $this->input->post('num_carteira');
			$dados['nume_contrato'] = $this->input->post('num_contrato');
			$dados['nume_convenio'] = $this->input->post('num_convenio');
			$dados['nosso_numero'] = $this->input->post('nosso_num');
			$novo_id = $this->input->post('id');


			if ($this->input->post('id') != NULL) {
				$this->carteiras->attCarteira($dados, $novo_id);
			} else {
				$this->carteiras->addCarteira($dados);
			}


			redirect("/");
		}
	}

	public function update($id){

		$this->form_validation->set_rules('nome', 'nome', 'required');
		$this->form_validation->set_rules('num_carteira', 'num_carteira', 'required');
		$this->form_validation->set_rules('num_contrato', 'num_contrato', 'required');
		$this->form_validation->set_rules('num_convenio', 'num_convenio', 'required');
		$this->form_validation->set_rules('nosso_num', 'nosso_num', 'required');

		if($this->form_validation->run()){

		$data = array(
				'nome_carteira' => $this->input->post('nome'),
				'nume_carteira' => $this->input->post('num_carteira'),
				'nume_contrato' => $this->input->post('num_contrato'),
				'nume_convenio' => $this->input->post('num_convenio'),
				'nosso_numero'  => $this->input->post('nosso_num')
				);

		$this->CarteiraModel->attCarteira($data,$id);
		redirect('','refresh');

		}else{
			$data['carteiras'] = $this->CarteiraModel->getCarteiraById($id);
			$this->template->load('template','editar_carteira',$data);
		}
	}

	public function delete($id)
	{

		if($id == NULL) {
			redirect('/');
		}


		$query = $this->CarteiraModel->getCarteiraById($id);


		if($query != NULL) {

			$this->CarteiraModel->apagarCarteira($id);
			redirect('/');

		} else {
			redirect('/');
		}
	}
}

?>
