<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_ahp_model extends CI_Model {

	public function create($data)
	{
		$this->db->insert('hasil_ahp', $data);
	}

	public function getHasilAhpUser($idUser)
	{
		$this->db->select('*');
		$this->db->from('cluster');
		$this->db->join('hasil_ahp', 'hasil_ahp.id_cluster = cluster.id_cluster');
		$this->db->join('faskes', 'faskes.id_faskes = hasil_ahp.id_faskes');
		$this->db->where('cluster.id_user', $idUser);
		$this->db->order_by('hasil_ahp.nilai_hasil', 'desc');
		return $this->db->get()->result_array();
	}

	public function deleteHasilAhpCluster($id_cluster)
	{
		$this->db->where('id_cluster', $id_cluster);
		$this->db->delete('hasil_ahp');
	}

}

/* End of file Hasil_ahp.php */
/* Location: ./application/models/Hasil_ahp.php */