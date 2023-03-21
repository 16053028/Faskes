<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model {

	public function getAllRole()
	{
		return $this->db->get('role')->result_array();
	}

	public function getRole($id)
	{
		return $this->db->get_where('role', ['id_role' => $id])->row_array();
	}

	public function create($data)
	{
		$this->db->insert('role', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_role', $id);
		$this->db->update('role', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_role', $id);
		$this->db->delete('role');
	}

}

/* End of file Role_model.php */
/* Location: ./application/models/Role_model.php */