<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrequencyController extends CI_Controller
{
    /**
     * @author Leonardo - 11-10-2016 - chama index com a lista de frequncias cadastradas
     */
    public function index()
    {
        $data['frequencies'] = $this->FrequencyModel->getAll();
        $this->template->load('template', 'frequency/frequencyView', $data);
    }

    /**
     * @author Leonardo - 11-10-2016 - chama view para adicionar a frequencia
     */
    public function add()
    {
        $this->template->load('template', 'frequency/frequencyCreateView');
    }

    /**
     * @author Leonardo - 11-10-2016 - chama a função que ira persistir a frequencia no banco
     * @return - retorna se persistiu ou não a frequencia no banco.
     */
    public function create()
    {
        $this->form_validation->set_rules('frequency[frequency_description]', 'frequency_description', 'trim|required');

        if ($this->form_validation->run()) {
            if ($this->FrequencyModel->insert($this->input->post('frequency'))) {
                redirect(site_url('frequency'), 'refresh');
            } else {
                //redirect(site_url('add'), 'refresh');
                //echo "<script>alert('Não inserido.')</script>";
                //chamar view de erro.
                $data['heading'] = "Erro ao Inserir -";
                $data['message'] = "Erro ao deletar a frequencia, tente novamente.";
                //$this->template->load('template', 'errors/cli/error_db', $data);
                $this->load->view('errors/html/error_db', $data);
            }
        } else {
            $data['heading'] = "Erro ao Inserir -";
            $data['message'] = "Erro ao inserir a frequencia, tente novamente.";
            $this->template->load('template', 'errors/html/error_db', $data);
        }
    }

    /**
     * @author Leonardo - 11-10-2016 - chama view para atualizar a frequencia
     * @param pId - id da frequencia a editar.
     */
    public function edit($pId)
    {
        $data['frequency'] = $this->FrequencyModel->getOne($pId);
        $this->template->load('template', 'frequency/frequencyUpdateView', $data);
    }

    /**
     * @author Leonardo - 11-10-2016 - chama a função que ira atualizar a frequencia no banco
     * @return - se atualizou ou não a frequencia
     */
    public function update()
    {
        $this->form_validation->set_rules('frequency[frequency_description]', 'frequency_description', 'trim|required');

        if ($this->form_validation->run()) {
            if ($this->FrequencyModel->update($this->input->post('frequency'))) {
                redirect(site_url('frequency'), 'refresh');
            } else {
                $data['heading'] = "Erro ao atualizar -";
                $data['message'] = "Erro ao atualizar a frequencia, tente novamente.";
                $this->template->load('template', 'errors/html/error_db', $data);
            }
        } else {
            $data['heading'] = "Erro ao atualizar -";
            $data['message'] = "Erro ao atualizar a frequencia, tente novamente.";
            $this->template->load('template', 'errors/html/error_db', $data);
        }
    }

    /**
     * @author Leonardo - 11-10-2016 - chama a função que ira deletar a frequencia do banco
     * @param pId - id do usuario a ser deletado
     * @return - se deletar, retorna pra lista, se não chama a view de error
     */
    public function delete($pId)
    {
        if ($this->FrequencyModel->delete($pId)) {
            //redireciona pra rota default
            echo  'Cadastro Excluido!';
        } else {
            $data['heading'] = "Erro ao deletar -";
            $data['message'] = "Erro ao deletar a frequencia, tente novamente.";
            $this->template->load('template', 'errors/html/error_db', $data);
        }
    }
}
