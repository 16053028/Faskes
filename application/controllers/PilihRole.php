<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PilihRole extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username') && $this->session->userdata('id_role') != 1) {
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('Detail_role_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['title'] = 'Admin | Sekolah';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['role_user'] = $this->Detail_role_model->getDetailRoleUser($data['user']['id_user']);

		$this->form_validation->set_rules('pilih_role', 'Role', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('pilih_role/index', $data);
		} else {
			$data = [
				'id_role'	=> $this->input->post('pilih_role', true),
			];	
			$this->session->set_userdata($data);
			if ($this->input->post('pilih_role', true) == 1) {
				redirect('/admin/dashboard');
			} else {
				redirect('/admin/rekomendasi_sekolah');
			}
		}
	}

}

/* End of file PilihRole.php */
/* Location: ./application/controllers/PilihRole.php */