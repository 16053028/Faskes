<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function getAllNilai()
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('faskes', 'faskes.id_faskes = nilai.id_faskes');
		return $this->db->get()->result_array();
	}

	public function getNilai($id)
	{
		return $this->db->get_where('nilai', ['id_nilai' => $id])->row_array();
	}

	public function getNilaiFaskes($id)
	{
		$this->db->select('*');
		$this->db->from('kriteria');	
		$this->db->join('nilai', 'kriteria.id_kriteria = nilai.id_kriteria');
		$this->db->where('nilai.id_faskes', $id);
		return $this->db->get()->result_array();
	}

	public function create($data)
	{
		$this->db->insert('nilai', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_nilai', $id);
		$this->db->update('nilai', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_nilai', $id);
		$this->db->delete('nilai');
	}

}

/* End of file Nilai_model.php */
/* Location: ./application/models/Nilai_model.php */