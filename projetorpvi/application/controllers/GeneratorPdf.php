<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class GeneratorPdf extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }
    public function index(){
        $this->load->view('');
    }

    public function toPdf($amostra_id){
        $this->load->library('Pdf');
        $this->load->model('Amostra_model');
        $this->load->model('Exame_model');
        
		$query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['exames'] = $this->Exame_model->getAll($amostra_id);
        // $dados = ['amostra' => $query,'exame' => $exames];
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Laudo Virológico');
	    $pdf->SetHeaderMargin(10);
	    $pdf->SetTopMargin(20);
	    $pdf->setFooterMargin(20);
	    $pdf->SetAutoPageBreak(true);
	    $pdf->SetAuthor('Author');
	    $pdf->SetDisplayMode('real', 'default');
	    $pdf->Write(5, 'SCA');
        $this->load->view('pdf/laudo', $query);
		
	    // $pdf->writeHTML($html);
        // $pdf->Output('TituloPdf.pdf','I');
	    

    }
}