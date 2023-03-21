<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_role_model extends CI_Model {

	public function getAllDetailRole()
	{
		return $this->db->get('detail_role')->result_array();
	}

	public function getDetailRole($id)
	{
		return $this->db->get_where('detail_role', ['id_detail_role' => $id])->row_array();
	}

	public function getDetailRoleUser($id)
	{
		$this->db->select('*');
		$this->db->from('detail_role');
		$this->db->join('role', 'role.id_role = detail_role.id_role');
		$this->db->where('detail_role.id_user', $id);
		return $this->db->get()->result_array();
	}

	public function create($data)
	{
		$this->db->insert('detail_role', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_detail_role', $id);
		$this->db->update('detail_role', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_detail_role', $id);
		$this->db->delete('detail_role');
	}

	public function deleteRoleUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('detail_role');	
	}


}

/* End of file Detail_role_model.php */
/* Location: ./application/models/Detail_role_model.php */