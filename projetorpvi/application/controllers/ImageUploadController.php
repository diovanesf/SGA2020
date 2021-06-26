<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ImageUploadController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');  
        $this->load->model('Amostra_model');
    }

    public function index()
    {
        $this->load->view('upload/index');
    }

    function do_upload()
    {
        $url = "../upload";
        $image = basename($_FILES['pic']['name']);
        $image = str_replace(' ', '|', $image);
        $type = explode(".", $image);
        $type = $type[count($type) - 1];
        if (in_array($type, array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'pdf', 'mp4', 'mkv'))) {
            $tmppath = "upload/" .  basename($_FILES['pic']['name']);
            if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {
                move_uploaded_file($_FILES['pic']['tmp_name'], $tmppath);
                return $tmppath;
            }
        } else {
            return false;
        }
    }

    function image_delete($id)
    {
        $idusuario = $_SESSION['user_id'];

        $this->db->where('id', $id);
        $this->db->delete('upload');

        // redirect('amostras/editar/midias/'.  $amostra_id);
    }

    function image_upload()
    {
        $image = basename($_FILES['pic']['name']);
        $image = str_replace(' ', '|', $image);
        $type = explode(".", $image);
        // $data['type'] = $type;
        $data['path'] = $this->do_upload();
        $data['amostra_id'] = $this->input->post('amostra_id');
        $data['alt'] = $this->input->post('alt');
        $this->db->insert('upload', $data);
        // $this->session->set_userdata('previous_url', current_url());
        // echo "<script>window.location.href='javascript:history.back(-1);'</script>";
        // echo json_encode($data);
        $this->session->set_flashdata('sucess', 'Amostra Atualizada com sucesso!');

        redirect('amostras/editar/midias/'.  $data['amostra_id']);

    }

    function images()
    {
        $this->load->view('images');
    }

    function not_img()
    {
        $this->load->view('not_img');
    }
}
