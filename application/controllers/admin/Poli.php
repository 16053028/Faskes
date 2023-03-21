<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Poli_model');
	}

	public function index()
	{
		$data['title'] = 'Data Poli';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['poli_list'] = $this->Poli_model->getAllPoli();

		$this->load->view('admin/data_poli/index', $data);		
	}

	public function create()
	{
		$data['title'] = 'Data Poli';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));

		$this->form_validation->set_rules('poli', 'Poli', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/data_poli/add', $data);
		} else {
			$data = [
				'nama_poli'			=> $this->input->post('poli', true),
				'keterangan_poli'	=> $this->input->post('keterangan', true),
				
			];
			
			$this->Poli_model->create($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/poli');
		}

	}

	public function update($id)
	{
		$data['title'] = 'Data Poli';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['poli_data'] = $this->Poli_model->getPoli($id);						

		$this->form_validation->set_rules('poli', 'Poli', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/data_poli/edit', $data);
		} else {
			$data = [
				'nama_poli'			=> $this->input->post('poli', true),
				'keterangan_poli'	=> $this->input->post('keterangan', true),
				
			];
			$this->Poli_model->update($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
			redirect('admin/poli');
		}

	}

	public function delete($id)
	{
		$data = $this->Poli_model->getPoli($id);
		if (empty($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak Ada</div>');
			redirect('admin/poli');
		}

		$this->Poli_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus</div>');
		redirect('admin/poli');
	}

}

/* End of file Poli.php */
/* Location: ./application/controllers/admin/Poli.php */