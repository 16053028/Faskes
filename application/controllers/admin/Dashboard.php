<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('User_model');
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data['title'] = "Dashboard";	
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['user_total'] = $this->Dashboard_model->totalUser();
		$data['kriteria_total'] = $this->Dashboard_model->totalKriteria();
		$data['faskes_total'] = $this->Dashboard_model->totalFaskes();
		$data['nilai_terisi'] = $this->Dashboard_model->totalNilaiTerisi()['terisi_lengkap']/$data['faskes_total']*100;

		$this->load->view('admin/dashboard/index', $data);	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */