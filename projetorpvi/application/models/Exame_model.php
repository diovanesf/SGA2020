<?php
class Exame_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllTecnica()
	{
		$query = $this->db->get('tecnica');
		return $query->result();
	}

	public function getTecnica_Tratamento($tecnica_tratamento_id)
	{
		$query = $this->db->get_where('tecnica_tratamento', array('tecnica_tratamento_id' => $tecnica_tratamento_id));
		return $query->row_array();
	} 

	public function getTratamento($tratamento_id)
	{
		$query = $this->db->get_where('tratamento', array('tratamento_id' => $tratamento_id));
		return $query->row_array();
	}
	public function getTecnica($tecnica_id)
	{
		$query = $this->db->get_where('tecnica', array('tecnica_id' => $tecnica_id));
		return $query->row_array();
	}

	public function getAllTecnicaTratamento()
	{
		$query = $this->db->get('tecnica_tratamento');
		return $query->result();
	}

	public function update($exame, $exame_id){
		$this->db->where('exame.exame_id', $exame_id);
		return $this->db->update('exame', $exame);
	}

	public function get($exame_id)
	{
		$query = $this->db->get_where('exame', array('exame_id' => $exame_id));
		return $query->row_array();
	}


	public function getAll($amostra_id)
	{
		$query = $this->db->get_where('exame', array('amostra_id' => $amostra_id));
		return $query->result();
	}

	public function insert($exame)
	{
		return $this->db->insert('exame', $exame);
	}

	public function delete($exame_id)
	{
		$this->db->where('exame.exame_id', $exame_id);
		return $this->db->delete('exame');
	}

	
}
