<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller
{

  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
        }
	}
    /**
     * @author Joziel O. Santos - 03-04-2018 - chama index com a lista de categorias cadastradas
     */
    public function index(){
        $data['categories'] = $this->CategoryModel->getAll();
        $this->template->load('template', 'category/categoryView', $data);
    }

    /**
     * @author Joziel O. Santos - 03-04-2038 - chama view para adicionar a categoria
     */
    public function add()    {
        $this->template->load('template', 'category/categoryCreateView');
    }

    /**
     * @author Joziel O. Santos - 03-04-2018 - chama a função que ira persistir a categoria no banco
     * @return - retorna se persistiu ou não a categoria no banco.
     */
    public function create(){
        $route = null;
		if (isset($_FILES)) {
			$tmp = $_FILES['photo_category']['tmp_name'];
			$name = $_FILES['photo_category']['name'];
			$type = substr($name, -4, 4);
			$new_name = md5($name.microtime());
			$dir = './uploads/';
			$route = $dir . $new_name . $type;
			if (!file_exists($dir)) {
	    	mkdir($dir, 0777, true);
			}
			move_uploaded_file($tmp, $route);
		}
        $this->form_validation->set_rules('name_category', 'name_category', 'trim|required');
        if ($this->form_validation->run()) {
          	$category = $this->input->post();
            $category['photo_category'] = substr($route, 1);
            $id = $this->CategoryModel->insert($category);
            if ($id !== 0) {
              $this->session->set_flashdata('alert', CreateEntityAlert("Categoria", $id));
              redirect('category');
            }
            else {
              $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
              redirect('category');
            }
        }
        else {
          $this->template->load('template', 'category/categoryCreateView');
        }
    }

    /**
     * @author Joziel O. Santos - 03-04-2018 - chama view para atualizar a categoria
     * @param pId - id da categoria a editar.
     */
    public function edit($pId){
        $data['category'] = $this->CategoryModel->getOne($pId);
        $this->template->load('template', 'category/categoryUpdateView', $data);
    }

    /**
     * @author Joziel O. Santos - 03-04-2018 - chama a função que ira atualizar a categoria no banco
     * @return - se atualizou ou não a categoria
     */
    public function update(){
        $route = null;
		if (!empty($_FILES['photo_category']['size'])) {
			$tmp = $_FILES['photo_category']['tmp_name'];
			$name = $_FILES['photo_category']['name'];
			$type = substr($name, -4, 4);
			$new_name = md5($name.microtime());
			$dir = './uploads/';
            $route = $dir . $new_name . $type;
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
			move_uploaded_file($tmp, $route);
        }    
        
        $category = $this->input->post();
        
        if(!empty($_FILES['photo_category']['size'])){
            $category['photo_category'] = substr($route, 1);
        }

        $this->form_validation->set_rules('id_category', 'id_category', 'trim');
        
        if ($this->form_validation->run()) {
            if ($this->CategoryModel->update($category)) {
                $this->session->set_flashdata('alert', UpdateEntityAlert("Categoria", $category['id_category']));
                redirect(site_url('category'), 'refresh');
            } else {
                $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
                $this->template->load('template', 'category/categoryUpdateView',$category);
            }
        } else {
            $data['category'] = $this->CategoryModel->getOne($category['id_category']);
            $this->template->load('template', 'category/categoryUpdateView', $data);    
        }
    }

    /**
     * @author Joziel O. Santos - 13-04-2018 - chama a função que ira deletar a categoria do banco
     * @param pId - id do usuario a ser deletado
     * @return - se deletar, retorna pra lista, se não chama a view de error
     */
    public function delete($pId){
        
        if (sizeof($this->PartnerModel->getPartnerByCategory($pId)) == 0) {
            if($this->CategoryModel->delete($pId)){
                $this->session->set_flashdata('alert', DeleteEntityAlert("Categoria", $pId));
            }
        }
        else {
            $this->session->set_flashdata('alert', CreateErrorAlert("Violação de Integridade de Dados",$pId));
        }

        redirect('category',$dataa);
        
    }
}
