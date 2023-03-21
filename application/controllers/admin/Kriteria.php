<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Kriteria_model');
	}

	public function index()
	{
		$data['title'] = 'Data Kriteria';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['kriteria_list'] = $this->Kriteria_model->getAllKriteria();

		$this->load->view('admin/kriteria/index', $data);		
	}

	public function create()
	{
		$data['title'] = 'Data Kriteria';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));

		$this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/kriteria/add', $data);
		} else {
			$data = [
				'nama_kriteria'			=> $this->input->post('kriteria', true),
			];
			
			$this->Kriteria_model->create($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/kriteria');
		}

	}

	public function update($id)
	{
		$data['title'] = 'Data Kriteria';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['kriteria_data'] = $this->Kriteria_model->getKriteria($id);						

		$this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/kriteria/edit', $data);
		} else {
			$data = [
				'nama_kriteria'			=> $this->input->post('kriteria', true),
			];
			$this->Kriteria_model->update($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
			redirect('admin/kriteria');
		}

	}

	public function delete($id)
	{
		$data = $this->Kriteria_model->getKriteria($id);
		if (empty($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak Ada</div>');
			redirect('admin/kriteria');
		}

		$this->Kriteria_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus</div>');
		redirect('admin/kriteria');
	}

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/admin/Kriteria.php */