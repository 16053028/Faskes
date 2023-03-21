<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function totalUser()
	{
		return $this->db->count_all('user'); 
	}

	public function totalKriteria()
	{
		return $this->db->count_all('kriteria'); 
	}

	public function totalFaskes()
	{
		return $this->db->count_all('faskes'); 
	}

	public function totalNilaiTerisi()
	{	
		$query = "SELECT COUNT(faskes.id_faskes) as terisi_lengkap FROM faskes JOIN nilai ON faskes.id_faskes = nilai.id_faskes GROUP BY faskes.id_faskes HAVING COUNT(nilai.id_nilai) = (SELECT COUNT(id_kriteria) FROM kriteria)";

		return $this->db->query($query)->row_array();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */