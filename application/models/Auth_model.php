<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function checkLogin($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('detail_role', 'detail_role.id_user = user.id_user');
		$this->db->join('role', 'role.id_role = detail_role.id_role');
		$this->db->where('user.username', $username);
		return $this->db->get()->result_array();
	}	

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */