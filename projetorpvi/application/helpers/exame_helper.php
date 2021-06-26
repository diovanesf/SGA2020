<?php

function statusAmostra($amostra_id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');
	$query =  $obj->Exame_model->getAll($amostra_id);
	foreach($query as $q){
		if($q->resultado == null){
			return "Em processamento";
		}
	}
	return "Finalizado";
}


function getTratamentoById($id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1 = $obj->Exame_model->getTecnica_Tratamento($id); // id dele, id da tecnica. id tratamento
	$data2 = $obj->Exame_model->getTratamento($data1["tratamento_id"]); // nome do tratamento e id dele
	return $data2["nome"];
}

function getPropietario($id)
{
	$obj = &get_instance();
	$obj->load->model('Proprietario_model');

	return $obj->Proprietario_model->get($id);
}

function getTecnicaById($id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1 = $obj->Exame_model->getTecnica_Tratamento($id);
	$data2 = $obj->Exame_model->getTecnica($data1["tecnica_id"]);
	return $data2["nome"];
}

function getIdTratamento($id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1 = $obj->Exame_model->getTecnica_Tratamento($id); // id dele, id da tecnica. id tratamento
	//$data2 = $obj->Exame_model->getTratamento($data1["tratamento_id"]); // nome do tratamento e id dele
	return $data1["tratamento_id"];
}

function getIdTecnica($id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1 = $obj->Exame_model->getTecnica_Tratamento($id); // id dele, id da tecnica. id tratamento
	//$data2 = $obj->Exame_model->getTratamento($data1["tratamento_id"]); // nome do tratamento e id dele
	return $data1["tecnica_id"];
}

function formatEspecie($especie = '')
{
	switch ($especie) {
		case 0:
			return 'Bovina';
		case 1:
			return 'Equina';
		case 2:
			return 'Ovina';
		case 3:
			return 'Suína';
		case 4:
			return 'Canina';
		case 5:
			return 'Felina';
		case 6:
			return	'Selvagens';
		case 7:
			return 	'Morcegos';
		case 8:
			return 'Outro';
	}
}
function formatMaterial($material)
{
	switch ($material) {
		case 0:
			return 'Sangue Total';
		case 1:
			return 'Soro';
		case 2:
			return 'Crostas';
		case 3:
			return 'Neoplasias';
		case 4:
			return 'Tecidos';
		case 5:
			return 'Swab Nasal';
		case 6:
			return	'Swab Ocular';
		case 7:
			return 	'Swab de Vesículas/Lesões';
		case 8:
			return 'Outro';
	}
}

function formatMaterialCondicao($condicaomaterial)
{
	switch ($condicaomaterial) {
		case 0:
			return 'Bem';
		case 1:
			return 'Hemolisado';
		case 2:
			return 'Coagulado';
		case 3:
			return 'Putrefação';
		case 4:
			return 'Swab Seco';
		case 5:
			return 'Descongelado';
		case 6:
			return 'Outro';
	}
}
function formatarData($data)
{
	return date("d/m/Y", strtotime($data));
}
function formatEnvio($formaenvio)
{
	switch ($formaenvio) {
		case 0:
			return 'Correios';
		case 1:
			return 'Rodoviária';
		case 2:
			return 'Tranposrtadora';
		case 3:
			return 'Entrega Laboratório';
	}
}
function email_exists($email)
{
	$obj = &get_instance();
	$obj->load->model('Admin_model');

	$data2 = $obj->Exame_model->getUserByEmail($email);
	if ($data2 != null) {
		return true;
	}
	return false;
}


function getAllTecnicas($id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1["tecnicas"] = $obj->Exame_model->getAll($id);
	$query = "";
	foreach ($data1 as $data) {
		foreach ($data as $d) {
			#var_dump(getTecnicaById($d->tecnica_tratamento_id)); exit;

			#extract($d);
			if (strcmp($query, getTecnicaById((intval($d->tecnica_tratamento_id)))) < 0) {
				$query = $query . getTecnicaById(intval($d->tecnica_tratamento_id)) . ", ";
			}
		}
	}

	return $query;
}
