<?php

defined('BASEPATH') or exit('No direct script access allowed');



class User_Model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	private $User = 'user';

	public function update($usuario, $usuario_id){
		$this->db->where('user.user_id', $usuario_id);
		return $this->db->update('user', $usuario);
	}

	public function insert($usuario)
	{
		// manda email informando que usuario foi adicionado
		return $this->db->insert('user', $usuario);
	}

	public function delete($user_id)
	{
		$this->db->where('user.user_id', $user_id);
		return $this->db->delete('user');
	}

	public function getAll()
	{
		$query = $this->db->get('user');
		return $query->result();
	}

	public function get($user_id)
	{
		$query = $this->db->get_where('user', array('user_id' => $user_id));
		return $query->row_array();
	}

		public function GetName($project_id)

	{

		$this->db->select('name');

		$this->db->from($this->User);

		$this->db->where("user_id", $project_id);

		$this->db->limit(1);

		$query = $this->db->get();

		$res = $query->row_array();

		return $res['name'];
	}

	public function GetUsersByProject($project_id)
	{
		
		$query = $this->db->get_where('project_user', array('project_user.project_id'=>$project_id));
		return $query->result();


	}

	public function getUserByEmail($email)

	{
		$query = $this->db->get_where('user', array('email' => $email));
		return $query->row_array();
		
	}

	public function getEmailById($user_id)

	{
		$this->db->select('email');

		$this->db->from($this->User);

		$this->db->where("user_id", $user_id);

		$this->db->limit(1);

		$query = $this->db->get();

		$res = $query->row_array();

		return $res['email'];
	}



	public function GetUserAddress($project_id)

	{

		$this->db->select('id,email,mobile_no,address,address_2,city,state,pincode,language');

		$this->db->from($this->User);

		$this->db->where("id", $project_id);

		$this->db->limit(1);

		$query = $this->db->get();

		$res = $query->row_array();

		return $res;
	}









	public function UpdateProfileImageByID($data)

	{

		$res = $this->db->update($this->User, $data, ['id' => $this->session->userdata['Admin']['id']]);

		if ($res == 1)

			return true;

		else

			return false;
	}



	public function UpdateCustomerProfileImageByID($data)

	{

		$res = $this->db->update($this->User, $data, ['id' => $this->session->userdata['User']['id']]);

		if ($res == 1)

			return true;

		else

			return false;
	}


	public function GetMemberNameById($project_id)

	{

		$this->db->select('id,name');

		$this->db->from($this->User);

		$this->db->where("id", $project_id);

		$this->db->limit(1);

		$query = $this->db->get();

		$u = $query->row_array();

		return $u['name'];
	}



	public function AddMember($data)

	{

		$res = $this->db->insert($this->User, $data);

		if ($res == 1)

			return $this->db->insert_id();

		else

			return false;
	}







	public function StatusUpdateByID($user_id, $status)

	{



		$res = $this->db->update($this->User, ['status' => $status], ['id' => $user_id]);

		if ($res == 1)

			return true;

		else

			return false;
	}





	public function TrashByID($user_id)

	{



		$res = $this->db->delete($this->User, ['id' => $user_id]);

		if ($res == 1)

			return true;

		else

			return false;
	}

	



	public function AllRoleTypes($role)

	{

		$this->db->select('id,name');

		$this->db->from($this->User);

		$this->db->where("role", $role);

		$query = $this->db->get();

		$u = $query->num_rows();

		return $u;
	}



	public function VendorsList()

	{


		$query = $this->db->get('view');
		return $query->result_array();


		// $this->db->select('id,name,picture_url');

		// $this->db->from($this->User);

		// $this->db->where("role","Vendor");

		// $this->db->where("status","1");

		// $query = $this->db->get();

		// $r=$query->result_array();

		// return $r;

	}

	public function ClientsListCs()

	{

		$this->db->select('id,name,picture_url');

		$this->db->from($this->User);

		$this->db->where("role", "Client_cs");

		$this->db->where("status", "1");

		$query = $this->db->get();

		$r = $query->result_array();

		return $r;
	}
}
