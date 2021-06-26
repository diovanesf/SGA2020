<?php

$this->load->library('Pdf');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//                require_once(dirname(__FILE__).'/lang/eng.php');
//                $pdf->setLanguageArray($l);
// }
// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

		

extract($amostra);
extract($exames);
extract(getPropietario($proprietario_id));
$especie = formatEspecie($especie);
$material = formatMaterial($material);
$data = formatarData($data);
$forma_envio = formatEnvio($forma_envio);
$condicao = formatMaterialCondicao($condicao);
$protocolo = 'LV' . $amostra_id . date("/y\ ", strtotime($data));
$exame = "";

foreach($exames as $a){
$tecnica = getTecnicaById($a->tecnica_tratamento_id);
$tratamento = getTratamentoById($a->tecnica_tratamento_id);
$resultado = $a->resultado == 0 ? "Sem resultado" : $a->resultado;
$exame = $exame . <<<EOD

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#93a1a1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#002b36;background-color:#fdf6e3;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#fdf6e3;background-color:#657b83;}
.tg .tg-cly1{text-align:left;vertical-align:middle}
.tg .tg-alz1{background-color:#eee8d5;text-align:left;vertical-align:top}
</style>

<br/><font align="left" size="10">Tecnica: $tecnica</font>
<font align="left" size="10">Suspeita: $tratamento </font>
<font align="left" size="10">Resultado: $resultado</font>

EOD;

}
$html =
<<<EOD

<h6 align="center">LABORATÓRIO DE VIROLOGIA</h6>
        <font align="center" size="10">Curso de Medicina Veterinária</font>
        <br/><font align="center" size="10">Casa 4, Campus Uruguaiana, UNIPAMPA</font>
        <br/><font align="center" size="10">BR 472, km 592, CEP 97.500-008. Uruguaiana, RS</font>
        <br/><font align="center" size="10">e-mail para contato: <link href='#'>mario.brum@unipampa.edu.br</link></font>
</br>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#93a1a1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#002b36;background-color:#fdf6e3;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#fdf6e3;background-color:#657b83;}
.tg .tg-cly1{text-align:left;vertical-align:middle}
.tg .tg-alz1{background-color:#eee8d5;text-align:left;vertical-align:top}
</style>
<h6 align="center" >Dados-$protocolo</h6>    
<h6><i>Dados do Proprietário</i></h6>
<br/><font align="left" size="10">Nome: $nome </font>
<br/><font align="left" size="10">Endereço: $endereco </font>
<br/><font align="left" size="10">Cidade: $cidade</font>
<br/><font align="left" size="10">Fone: $telefone </font>
<br/><font align="left" size="10">email: $email</font> 

<h6><i>Identificação da amostra</i> </h6>
<br/><font align="left" size="10">Condição do Material : $condicao </font>
<br/><font align="left" size="10">Data: $data</font>
<br/><font align="left" size="10">Material: $material</font> 
<br/><font align="left" size="10">Espécie: $especie</font> 
<br/><font align="left" size="10">Recebimento: $data</font> 
<br/><font align="left" size="10">Observações: $observacoes </font>

<h6><i>Resultados Exames</i> </h6>   



EOD;

$footer=<<<EOD
<br/><br/>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#93a1a1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#002b36;background-color:#fdf6e3;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#93a1a1;color:#fdf6e3;background-color:#657b83;}
.tg .tg-cly1{text-align:left;vertical-align:middle}
.tg .tg-alz1{background-color:#eee8d5;text-align:left;vertical-align:top}
</style>
<font align="center" size="10">Mário Celso Sperotto Brum</font>
<br/><font align="center" size="10">Laboratório de Virologia</font>
<br/><font align="center" size="10">CRMV-RS 7331</font>
<br/><font align="center" size="10">Campus Uruguaiana - UNIPAMPA</font>
EOD;

// Print text using writeHTMLCell()
$pdf->SetTitle("Laudo Virológico");
$pdf->writeHTMLCell(0, 0, '', '', $html.$exame.$footer, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('LaudoVirológico.pdf', 'I');
