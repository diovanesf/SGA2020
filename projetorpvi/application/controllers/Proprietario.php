<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Proprietario extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $this->load->model('Proprietario_model');
    }

    public function list()
    {
        $query['proprietario'] = $this->Proprietario_model->getAll();

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('proprietario/list', $query);
    }


    public function new()
    {
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('proprietario/new');
    }

    public function edit($proprietario_id)
    {
        $query['proprietario'] = $this->Proprietario_model->get($proprietario_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('proprietario/edit', $query);
    }

    public function view($proprietario_id){
        $query['proprietario'] = $this->Proprietario_model->get($proprietario_id);
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('proprietario/view', $query);
    }


    public function insert()
    {
        // $this->input->post('nome'), esse nome é pego de <input name="nome">
        $proprietario['nome'] = $this->input->post('nome');
        $proprietario['email'] = $this->input->post('email');
        $proprietario['endereco'] = $this->input->post('endereco');
        $proprietario['cidade'] = $this->input->post('cidade');
        $proprietario['estado'] = $this->input->post('estado');
        $proprietario['cep'] = $this->input->post('cep');
        $proprietario['telefone'] = $this->input->post('telefone');
        $proprietario['gps'] = $this->input->post('gps');

        // Use esse codigo abaixo alterando o valor entre parentes para rastrear erros, jogue qualquer variavel ali e vai retornar oq ela ta armazenando
        // var_dump($this->input->post('identificador'));exit;die;
        $query = $this->Proprietario_model->insert($proprietario);

        $this->session->set_flashdata('success', 'Proprietario Cadastrado com sucesso!');
        redirect('proprietarios');
    }

    public function update($proprietario_id)
    {

        $proprietario['nome'] = $this->input->post('nome');
        $proprietario['email'] = $this->input->post('email');
        $proprietario['endereco'] = $this->input->post('endereco');
        $proprietario['cidade'] = $this->input->post('cidade');
        $proprietario['estado'] = $this->input->post('estado');
        $proprietario['cep'] = $this->input->post('cep');
        $proprietario['telefone'] = $this->input->post('telefone');
        $proprietario['gps'] = $this->input->post('gps');

        $query = $this->Proprietario_model->update($proprietario, $proprietario_id);
        $this->session->set_flashdata('error', 'Proprietario Atualizado com sucesso!');
        redirect('proprietarios');
    }

    public function delete($proprietario_id)
    {
        $query = $this->Proprietario_model->delete($proprietario_id);
        if ($query) {
            redirect('proprietarios');
        }
    }
}
