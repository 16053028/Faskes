<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faskes_model extends CI_Model {

	public function getAllFaskes()
	{
		return $this->db->get('faskes')->result_array();
	}

	public function getAllFaskesDetail()
	{
		$this->db->select('*, tbl_poli_faskes.id_poli_detail');
		$this->db->from('tbl_poli_faskes');
		$this->db->join('faskes', 'faskes.id_faskes = tbl_poli_faskes.id_faskes', 'left');
		$this->db->join('tbl_poli_detail', 'tbl_poli_detail.id_poli_detail = tbl_poli_faskes.id_poli_detail', 'left');
		return $this->db->get()->result_array();
	}



	public function getAllFaskesCountNilai()
	{	
		$this->db->select('*, faskes.id_faskes as id_faskes, COUNT(nilai.id_faskes) as nilai_terisi');
		$this->db->from('faskes');
		$this->db->join('nilai', 'nilai.id_faskes = faskes.id_faskes', 'left');
		$this->db->group_by('faskes.id_faskes');
		return $this->db->get()->result_array();
	}

	public function getAllPoliFaskesCount()
	{	
		$this->db->select('*, faskes.id_faskes as id_faskes, COUNT(tbl_poli_faskes.id_faskes) as banyak_poli');
		$this->db->from('faskes');
		$this->db->join('tbl_poli_faskes', 'tbl_poli_faskes.id_faskes = faskes.id_faskes', 'left');
		$this->db->group_by('faskes.id_faskes');
		return $this->db->get()->result_array();
	}

	public function getFaskes($id)
	{
		return $this->db->get_where('faskes', ['id_faskes' => $id])->row_array();
	}

	public function create($data)
	{
		$this->db->insert('faskes', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_faskes', $id);
		$this->db->update('faskes', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_faskes', $id);
		$this->db->delete('faskes');
	}

}

/* End of file Faskes_model.php */
/* Location: ./application/models/Faskes_model.php */