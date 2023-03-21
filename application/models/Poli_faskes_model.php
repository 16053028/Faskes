<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_faskes_model extends CI_Model {

	// public function getAllNilai()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_poli_faskes');
	// 	$this->db->join('faskes', 'faskes.id_faskes = tbl_poli_faskes.id_faskes');
	// 	return $this->db->get()->result_array();
	// }

	public function getPoli($id)
	{
		return $this->db->get_where('tbl_poli_faskes', ['id_poli_detail' => $id])->row_array();
	}

	public function getPoliFaskes($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_poli_detail');	
		$this->db->join('tbl_poli_faskes', 'tbl_poli_detail.id_poli_detail = tbl_poli_faskes.id_poli_detail');
		$this->db->where('tbl_poli_faskes.id_faskes', $id);
		return $this->db->get()->result_array();
	}

	public function getPoliDoesntHave($id_faskes)
	{
		$query = "SELECT * FROM tbl_poli_detail tpd WHERE NOT EXISTS (SELECT * FROM tbl_poli_faskes tpf WHERE tpf.id_poli_detail = tpd.id_poli_detail AND tpf.id_faskes = ".$this->db->escape($id_faskes).")";

		return $this->db->query($query)->result_array();		
	}

	public function create($data)
	{
		$this->db->insert('tbl_poli_faskes', $data);
	}

	// public function update($id, $data)
	// {
	// 	$this->db->where('id_nilai', $id);
	// 	$this->db->update('nilai', $data);
	// }

	public function delete($id)
	{
		$this->db->where('id_poli_detail', $id);
		$this->db->delete('tbl_poli_faskes');
	}

}

/* End of file Poli_faskes_model.php */
/* Location: ./application/models/Poli_faskes_model.php */