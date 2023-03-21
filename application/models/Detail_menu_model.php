<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_menu_model extends CI_Model {

	public function getAksesMenu($id)
	{
		$this->db->select('menu.*, detail_menu.*, role.*');
		$this->db->from('detail_menu');
		$this->db->join('menu', 'menu.id_menu = detail_menu.id_menu');
		$this->db->join('role', 'role.id_role = detail_menu.id_role');
		$this->db->where('detail_menu.id_role', $id);
		return $this->db->get()->result_array();
	}	

	public function getDetailMenuRole($id)
	{
		$this->db->select('*, role.id_role as tbl_role_id, detail_menu.id_role as tbl_detail_menu_id_role');
		$this->db->from('role');
		$this->db->join('detail_menu', 'detail_menu.id_role = role.id_role', 'left');
		$this->db->where('role.id_role', $id);
		return $this->db->get()->result_array();
	}

	public function create($data)
	{
		$this->db->insert('detail_menu', $data);
	}

	public function delete_role_menu($id)
	{
		$this->db->where('id_role', $id);
		$this->db->delete('detail_menu');
	}

}

/* End of file Detail_menu_model.php */
/* Location: ./application/models/Detail_menu_model.php */