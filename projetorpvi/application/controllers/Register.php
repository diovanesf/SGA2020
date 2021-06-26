<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Register extends CI_Controller
{
    public function addUser()
    {
        $user['name']           = $this->input->post('name');
        $user['email']          = $this->input->post('email');
        $user['password']       = $this->input->post('password');
        $user['institution']       = $this->input->post('institution');
        $user['role']           = $this->input->post('role');
        $this->load->model('user_register');
        $this->user_register->insert_user($user);

            redirect(site_url(), 'refresh');
    }
    
    public function c_recover_password(){

        $user['email'] = $this->input->post('email');
        $this->load->model('user_register');
        $this->user_register->model_recover_password($user);
        
        //var_dump($user['email']);
    }

    public function show_Edit_User($project_id = null)
    {
        //$this->db->select('*');
        $datauser['user'] = $this->db->get_where('user', array(
            'user_id' => $this->session->userdata('user_id')
        ))->result();
        $this->db->where('user_id', $project_id);
        $this->load->view('frame/header_view'); 
		 $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('frame/footer_view');
        $this->load->view('edit_user', $datauser);
    }
    public function updateUser($project_id = null)
    {
        $this->db->where('user_id', $project_id);
        $datauser['user'] = $this->db->get('user')->result();
        $this->load->view('frame/header_view'); 
		 $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('edit_user', $datauser);
    }
    public function saveUpdateUser()
    {
        $postData['name'] = $this->input->post('name');
        $postData['user_id'] = $this->input->post('user_id');
        $_SESSION['name'] = $postData['name'];
        $this->db->where('user_id', $postData['user_id']);
        if ($this->db->update('user', $postData)) {
            $this->session->set_flashdata('success', 'Usuario atualizado com sucesso!');            
        }
        redirect("amostras");
    }
    public function saveSenha()
    {
        $postData['user_id'] = $this->input->post('user_id');
        $postData['password'] = md5($this->input->post('password'));
        $this->db->where('user_id', $postData['user_id']);
        if ($this->db->update('user', $postData)) {
            $this->session->set_flashdata('success', 'Senha do Usuario atualizada com sucesso!');
        }
        redirect("amostras");
    }
}
