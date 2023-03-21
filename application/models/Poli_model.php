<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_model extends CI_Model {

	public function getAllPoli()
	{
		return $this->db->get('tbl_poli_detail')->result_array();
	}

	public function getPoli($id)
	{
		return $this->db->get_where('tbl_poli_detail', ['id_poli_detail' => $id])->row_array();
	}

	public function create($data)
	{
		$this->db->insert('tbl_poli_detail', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_poli_detail', $id);
		$this->db->update('tbl_poli_detail', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_poli_detail', $id);
		$this->db->delete('tbl_poli_detail');
	}

	public function totalPoli()
	{
		return $this->db->count_all('tbl_poli_detail'); 
	}

}

/* End of file Poli_model.php */
/* Location: ./application/models/Poli_model.php */