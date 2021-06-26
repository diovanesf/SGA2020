<?php
class Proprietario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($proprietario_id)
	{
		$query = $this->db->get_where('proprietario', array('proprietario_id' => $proprietario_id));
		return $query->row_array();
	}

	public function getAll()
	{
		$query = $this->db->get('proprietario');
		return $query->result();
	}

	public function insert($proprietario){
		$this->db->insert('proprietario', $proprietario);
		return $this->db->insert_id(); // retorna id inserido
	}

	public function update($proprietario, $proprietario_id){
		$this->db->where('proprietario.proprietario_id', $proprietario_id);
		return $this->db->update('proprietario', $proprietario);
        redirect('proprietarios');
	}

	public function delete($proprietario_id)
	{
		$this->db->where('proprietario.proprietario_id', $proprietario_id);
		return $this->db->delete('proprietario');
	}
}
