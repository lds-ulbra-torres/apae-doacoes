<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrequencyController extends CI_Controller
{

  public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
        redirect('/auth', 'refresh');
    }
	}
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
        $this->form_validation->set_rules('frequency[frequency_count]', 'frequency_count', 'required');

        if ($this->form_validation->run()) {
            if ($this->FrequencyModel->insert($this->input->post('frequency'))) {
              $this->session->set_flashdata('alert', CreateEntityAlert("Frequência", 0));
              redirect('frequency');
            }
            else {
              $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
              redirect('frequency');
            }
        }
        else {
          $this->template->load('template', 'frequency/frequencyCreateView');
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
                $this->session->set_flashdata('alert', UpdateEntityAlert("Frequência", 0));
                redirect(site_url('frequency'), 'refresh');
            } else {
                $this->session->set_flashdata('alert', CreateErrorAlert("Banco de Dados"));
            }
        } else {
          $this->template->load('template', 'frequency/frequencyUpdateView');
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
            $this->session->set_flashdata('alert', DeleteEntityAlert("Frequência", $pId));
        }
        else {
          $this->session->set_flashdata('alert', CreateErrorAlert("Violação de Integridade de Dados"));
        }
        redirect('frequency');
    }
}
