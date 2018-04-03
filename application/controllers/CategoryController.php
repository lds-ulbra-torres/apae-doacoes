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
    public function index()
    {
        $data['categories'] = $this->CategoryModel->getAll();
        $this->template->load('template', 'category/categoryView', $data);
    }

    /**
     * @author Joziel O. Santos - 03-04-2038 - chama view para adicionar a categoria
     */
    public function add()
    {
        $this->template->load('template', 'category/categoryCreateView');
    }

    /**
     * @author Joziel O. Santos - 03-04-2018 - chama a função que ira persistir a categoria no banco
     * @return - retorna se persistiu ou não a categoria no banco.
     */
    public function create()
    {
        $this->form_validation->set_rules('category[name_category]', 'name_category', 'trim|required');
        if ($this->form_validation->run()) {
          $id = $this->CategoryModel->insert($this->input->post('category'));
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
    public function edit($pId)
    {
        $data['category'] = $this->CategoryModel->getOne($pId);
        $this->template->load('template', 'category/categoryUpdateView', $data);
    }

    /**
     * @author Joziel O. Santos - 03-04-2018 - chama a função que ira atualizar a categoria no banco
     * @return - se atualizou ou não a categoria
     */
    public function update()
    {
        $this->form_validation->set_rules('category[name_category]', 'name_category', 'trim|required');
        if ($this->form_validation->run()) {
            $id = $this->CategoryModel->update($this->input->post('category'));
            if ($id !== 0) {
                $this->session->set_flashdata('alert', UpdateEntityAlert("Categoria", $id));
                redirect(site_url('category'), 'refresh');
            } else {
                $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
            }
        } else {
          $this->template->load('template', 'category/categoryUpdateView');
        }
    }

    /**
     * @author Joziel O. Santos - 03-04-2018 - chama a função que ira deletar a categoria do banco
     * @param pId - id do usuario a ser deletado
     * @return - se deletar, retorna pra lista, se não chama a view de error
     */
    public function delete($pId)
    {
        if ($this->CategoryModel->delete($pId)) {
            //redireciona pra rota default
            $this->session->set_flashdata('alert', DeleteEntityAlert("Categoria", $pId));
        }
        else {
          $this->session->set_flashdata('alert', CreateErrorAlert("Violação de Integridade de Dados"));
        }
        redirect('category');
    }
}
