<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi_faskes_model extends CI_Model {

	public function getClusterUser($idUser)
	{
		return $this->db->get_where('cluster', ['id_user' => $idUser])->result_array();
	}

	public function getDetailClusterUser($idUser)
	{
		$this->db->select('*');
		$this->db->from('cluster');
		$this->db->join('detail_cluster', 'detail_cluster.id_cluster = cluster.id_cluster');
		$this->db->join('faskes', 'faskes.id_faskes = detail_cluster.id_faskes');
		$this->db->where('cluster.id_user', $idUser);
		return $this->db->get()->result_array();
	}

	public function getPerDetailClusterUser($idUser, $id_cluster)
	{
		$this->db->select('*');
		$this->db->from('cluster');
		$this->db->join('detail_cluster', 'detail_cluster.id_cluster = cluster.id_cluster');
		$this->db->join('faskes', 'faskes.id_faskes = detail_cluster.id_faskes');
		$this->db->where('cluster.id_user', $idUser);
		$this->db->where('cluster.id_cluster', $id_cluster);
		return $this->db->get()->result_array();
	}

	public function createCluster($data)
	{
		$this->db->insert('cluster', $data);
		return $this->db->insert_id();
	}	

	public function createDetailCluster($data)
	{
		$this->db->insert('detail_cluster', $data);
	}

	public function deleteClusterUser($idUser)
	{
		$this->db->where('id_user', $idUser);
		$this->db->delete('cluster');
	}

}

/* End of file Rekomendasi_faskes_model.php */
/* Location: ./application/models/Rekomendasi_faskes_model.php */