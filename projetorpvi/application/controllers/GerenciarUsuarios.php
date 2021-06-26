<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class GerenciarUsuarios extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();

        //$this->lang->load('btn', 'english');
        //$this->lang->load('btn','portuguese-brazilian');
        //$this->lang->load('communication-item_lang', 'english');
        //$this->lang->load('communication-item','portuguese-brazilian');

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if ($_SESSION['role'] == 1) {
            $this->session->set_flashdata('danger', 'Voce não tem permissao para acessar esta funcionalidade!');
            redirect('amostras');
        }

        $this->load->model('Admin_model');
        $this->load->model("authentication_model");
        $this->load->model("User_Model");
    }

    public function list()
    {
        $query['usuario'] = $this->User_Model->getAll();

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('usuario/list', $query);
    }

    public function new()
    {
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('usuario/new');
    }

    public function edit($user_id)
    {
        $query['usuario'] = $this->User_Model->get($user_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('usuario/edit', $query);
    }

    public function insert()
    {
        // var_dump($this->input->post('name'));exit;die;
        $usuario['name'] = $this->input->post('name');
        $usuario['email'] = $this->input->post('email');
        $usuario['role'] = $this->input->post('role');

        // mandar email de criação de conta
        // $update = $this->admin_model->reset_user_password($email);
        if ($this->User_Model->getUserByEmail($usuario['email']) != null) {
            $this->session->set_flashdata('danger', 'Já existe um usuário com este email!');
            redirect('usuarios/criar');
        }

        $query = $this->User_Model->insert($usuario);
        $query2 = $this->Admin_model->notificationCreateAccount($usuario['email']);

        $this->session->set_flashdata('success', 'Usuário Cadastrado com Sucesso!');
        redirect('usuarios');
    }

    public function update($user_id)
    {
        $usuario['name'] = $this->input->post('name');
        $usuario['email'] = $this->input->post('email');
        $usuario['role'] = $this->input->post('role');


        // Caso o professor mude o email do aluno
        $emailoriginal = $this->User_Model->getEmailById($user_id);

        if (strcmp($usuario['email'], $emailoriginal) != 0) {
            if ($this->User_Model->getUserByEmail($usuario['email']) != null) {
                $this->session->set_flashdata('danger', 'Já existe um usuário com este email!');
                redirect('usuarios/editar/' . $user_id);
            } 
        }
        $query = $this->User_Model->update($usuario, $user_id);
        if (strcmp($usuario['email'], $emailoriginal) != 0) {
            $this->Admin_model->notificationCreateAccount($usuario['email']);
        }
      
        $this->session->set_flashdata('update', 'Usuário Atualizado com Sucesso!');
        redirect('usuarios');
    }

    public function delete($user_id)
    {
        $query = $this->User_Model->delete($user_id);
        redirect('usuarios');
    }
}
