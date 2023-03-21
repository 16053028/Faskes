<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getUserWithUsername($username)
	{
		return $this->db->get_where('user', ['username' => $username])->row_array();
	}

	public function getAllUser()
	{
		$this->db->select('user.*, detail_role.*, role.*, GROUP_CONCAT(role.role) as rolename');
		$this->db->from('user');
		$this->db->join('detail_role', 'detail_role.id_user = user.id_user');
		$this->db->join('role', 'role.id_role = detail_role.id_role', 'FIND_IN_SET(role.id_role, user.rolename)');
		$this->db->group_by('user.id_user');
		return $this->db->get()->result_array();
	}

	public function getUser($id)
	{
		return $this->db->get_where('user', ['id_user' => $id])->row_array();
	}

	public function create($data)
	{
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */