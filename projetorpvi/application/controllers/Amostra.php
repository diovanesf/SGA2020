<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Amostra extends CI_Controller
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

        $this->load->model('Amostra_model');
        $this->load->model('Exame_model');
        $this->load->model('Proprietario_model');
    }

    public function insert()
    {
        // Use esse codigo abaixo alterando o valor entre parentes para rastrear erros, jogue qualquer variavel ali e vai retornar oq ela ta armazenando
        // var_dump($this->input->post('identificador'));exit;die;
        date_default_timezone_set('America/Sao_paulo');
        $amostra['data'] =  date('Y-m-d');
        $amostra['proprietario_id'] = $this->input->post('proprietario_id');
        $amostra['forma_envio'] = $this->input->post('forma_envio');
        $amostra['n_amostras'] = $this->input->post('n_amostras');
        $amostra['especie'] = $this->input->post('especie');
        $amostra['material'] = $this->input->post('material');
        $amostra['acondicionamento'] = $this->input->post('acondicionamento');
        $amostra['condicao'] = $this->input->post('condicao');
        $amostra['propriedade'] = $this->input->post('propriedade');
        $amostra['total_animais'] = $this->input->post('total_animais');
        $amostra['acometidos'] = $this->input->post('acometidos');
        $amostra['criacao'] = $this->input->post('criacao');
        $amostra['observacoes'] = $this->input->post('observacoes');
        $amostra['suspeitas'] = $this->input->post('suspeitas');
        $amostra['peso_material'] = $this->input->post('peso_material');
        $amostra['estimativa'] = $this->input->post('estimativa');
        $amostra['laboratorios'] = $this->input->post('laboratorios');


        $query = $this->Amostra_model->insert($amostra);
        

        $this->session->set_flashdata('success', 'Amostra Cadastrada com sucesso!');
        redirect('amostras');
    }
    public function update($amostra_id)
    {
     #   $amostra['data'] = $this->input->post('data');
        $amostra['proprietario_id'] = $this->input->post('proprietario_id');
        $amostra['forma_envio'] = $this->input->post('forma_envio');
        $amostra['n_amostras'] = $this->input->post('n_amostras');
        $amostra['especie'] = $this->input->post('especie');
        $amostra['material'] = $this->input->post('material');
        $amostra['acondicionamento'] = $this->input->post('acondicionamento');
        $amostra['condicao'] = $this->input->post('condicao');
        $amostra['status'] = $this->input->post('status');
        $amostra['propriedade'] = $this->input->post('propriedade');
        $amostra['total_animais'] = $this->input->post('total_animais');
        $amostra['acometidos'] = $this->input->post('acometidos');
        $amostra['criacao'] = $this->input->post('criacao');
        $amostra['observacoes'] = $this->input->post('observacoes');
        $amostra['suspeitas'] = $this->input->post('suspeitas');
        $amostra['peso_material'] = $this->input->post('peso_material');
        $amostra['estimativa'] = $this->input->post('estimativa');
        $amostra['laboratorios'] = $this->input->post('laboratorios');
        $query = $this->Amostra_model->update($amostra, $amostra_id);
        $this->session->set_flashdata('update', 'Amostra Atualizada com sucesso!');
        redirect('amostras');
    }

    public function list()
    {
        $query['amostra'] = $this->Amostra_model->getAll();
       

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('amostra/list', $query);
    }


    public function new()
    {
        $query['proprietario'] = $this->Proprietario_model->getAll();
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('amostra/new', $query);
    }

    public function editar_midias($amostra_id)
    {
        // $query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['amostra_id'] = $amostra_id;

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('amostra/midias', $query);
    }

    public function edit($amostra_id)
    {
        $query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['proprietario'] = $this->Proprietario_model->getAll();
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('amostra/edit', $query);
    }

    public function editExame($exame_id)
    {

        $query['tecnica'] = $this->Exame_model->getAlltecnica();
        $query['tecnica_tratamento'] = $this->Exame_model->getAllTecnicaTratamento();
        $query['exame'] = $this->Exame_model->get($exame_id);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('exame/edit', $query);
    }


    public function listExame($amostra_id)
    {
        $query['exame'] = $this->Exame_model->getAll($amostra_id);
        $query['amostra_id'] = $amostra_id;

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('exame/list', $query);
    }

    public function newExame($amostra_id)
    {
        $query['tecnica'] = $this->Exame_model->getAlltecnica();
        $query['tecnica_tratamento'] = $this->Exame_model->getAllTecnicaTratamento();
        $query['amostra_id'] = $amostra_id;

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('exame/new', $query);
    }

    public function insertExame($amostra_id)
    {
        $exame['tecnica_tratamento_id'] = $this->input->post('Concelho');
        $exame['amostra_id'] = intval($amostra_id);

        $amostra['status'] = "em processamento";
        $query = $this->Amostra_model->update($amostra, $amostra_id);

        $query = $this->Exame_model->insert($exame);

        $this->session->set_flashdata('success', 'Exame Cadastrado com sucesso!');
        redirect('exames/'.  $amostra_id);
    }
    public function updateExame($exame_id)
    {
        $exame['tecnica_tratamento_id'] = $this->input->post('Concelho');
        $exame['resultado'] = $this->input->post('resultado');

        $query = $this->Exame_model->update($exame,$exame_id);
        $this->session->set_flashdata('update', 'Exame Atualizado com sucesso!');
        redirect('exames/'.  $this->input->post('amostra_id'));
    }

    public function deleteExame($exame_id)
    {
        $query = $this->Amostra_model->deleteExame($exame_id);
    }

    // 
    public function delete($amostra_id)
    {
        $query = $this->Amostra_model->delete($amostra_id);
        $query2 = $this->Amostra_model->deleteAmostraQtd($amostra_id);

        // ta msotrando por pouco tempo o fedback de delete
        if ($query && $query2) {
            redirect('amostras');
        }
    }
    // public function insert()
    // {
    //     // $this->input->post('nome'), esse nome é pego de <input name="nome">
    //     $exame['soroneutralizacao'] = $this->input->post('soroneutralizacao');
    //     $exame['imunoabsorcao'] = $this->input->post('imunoabsorcao');
    //     $exame['polimerase'] = $this->input->post('polimerase');
    //     $exame['imunocromatografia'] = $this->input->post('imunocromatografia');
    //     $exame['imunofluorescencia'] = $this->input->post('imunofluorescencia');
    //     $exame['hemaglutinacao'] = $this->input->post('hemaglutinacao');
    //     $exame['isolamento'] = $this->input->post('isolamento');
    //     $exame['gel_agar'] = $this->input->post('gel_agar');
    //     $exame['microscopia'] = $this->input->post('microscopia');



    //     // Use esse codigo abaixo alterando o valor entre parentes para rastrear erros, jogue qualquer variavel ali e vai retornar oq ela ta armazenando
    //     // var_dump($this->input->post('identificador'));exit;die;

    //     $query = $this->Exame_model->insert($exame);

    //     $amostra['proprietario_id'] = $this->input->post('proprietario_id');
    //     $amostra['forma_envio'] = $this->input->post('forma_envio');
    //     $amostra['especie'] = $this->input->post('especie');
    //     $amostra['material'] = $this->input->post('material');
    //     $amostra['acondicionamento'] = $this->input->post('acondicionamento');
    //     $amostra['condicao'] = $this->input->post('condicao');
    //     $amostra['status'] = $this->input->post('status');
    //     $amostra['propriedade'] = $this->input->post('propriedade');
    //     $amostra['total_animais'] = $this->input->post('total_animais');
    //     $amostra['acometidos'] = $this->input->post('acometidos');
    //     $amostra['criacao'] = $this->input->post('criacao');
    //     $amostra['observacoes'] = $this->input->post('observacoes');
    //     $amostra['suspeitas'] = $this->input->post('suspeitas');
    //     $amostra['peso_material'] = $this->input->post('peso_material');
    //     $amostra['estimativa'] = $this->input->post('estimativa');
    //     $amostra['laboratorios'] = $this->input->post('laboratorios');


    //     $query = $this->Amostra_model->insert($amostra);
        

    //     $this->session->set_flashdata('success', 'Amostra Cadastrada com sucesso!');
    //     redirect('amostras');
    // }
    // public function update($amostra_id)
    // {
    //     $amostra['forma_envio'] = $this->input->post('forma_envio');
    //     $amostra['especie'] = $this->input->post('especie');
    //     $amostra['material'] = $this->input->post('material');
    //     $amostra['acondicionamento'] = $this->input->post('acondicionamento');
    //     $amostra['condicao'] = $this->input->post('condicao');
    //     $amostra['status'] = $this->input->post('status');
    //     $amostra['propriedade'] = $this->input->post('propriedade');
    //     $amostra['total_animais'] = $this->input->post('total_animais');
    //     $amostra['acometidos'] = $this->input->post('acometidos');
    //     $amostra['criacao'] = $this->input->post('criacao');
    //     $amostra['observacoes'] = $this->input->post('observacoes');
    //     $amostra['suspeitas'] = $this->input->post('suspeitas');
    //     $amostra['peso_material'] = $this->input->post('peso_material');
    //     $amostra['estimativa'] = $this->input->post('estimativa');
    //     $amostra['laboratorios'] = $this->input->post('laboratorios');
    //     $query = $this->Amostra_model->update($amostra, $amostra_id);
    //     $this->session->set_flashdata('update', 'Amostra Atualizada com sucesso!');
    //     redirect('amostras');
    // }
}
