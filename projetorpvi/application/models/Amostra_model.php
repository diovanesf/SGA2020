<?php
class Amostra_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function update($amostra, $amostra_id){
		$this->db->where('amostra.amostra_id', $amostra_id);
		return $this->db->update('amostra', $amostra);
	}

	public function get($amostra_id)
	{
		$query = $this->db->get_where('amostra', array('amostra_id' => $amostra_id));
		return $query->row_array();
	}

	public function getAllQtd($amostra_id)
	{
		$query = $this->db->get_where('amostra_qtd', array('amostra_id' => $amostra_id));
		return $query->result();
	}


	public function getAll()
	{
		$query = $this->db->get('amostra');
		return $query->result();
	}

	public function getAllExames($amostra_id)
	{
		$query = $this->db->get_where('exame', array('amostra_id' => $amostra_id));
		return $query->result();
	}

	public function getAllTecnica()
	{
		$query = $this->db->get('tecnica');
		return $query->result();
	}

	public function getAllTecnicaTratamento()
	{
		$query = $this->db->get('tecnica_tratamento');
		return $query->result();
	}

	public function insert($amostra)
	{
		$this->db->insert('amostra', $amostra);
		return $this->db->insert_id(); // retorna id inserido
	}

	public function delete($amostra_id)
	{
		$this->db->where('amostra.amostra_id', $amostra_id);
		return $this->db->delete('amostra');
	}

	public function deleteExame($exame_id)
	{
		$this->db->where('exame.exame_id', $exame_id);
		
		return $this->db->delete('exame');
	}

	public function deleteAmostraQtd($amostra_id)
	{
		$this->db->where('amostra_qtd.amostra_id', $amostra_id);
		return $this->db->delete('amostra_qtd');
	}

	
	
}
