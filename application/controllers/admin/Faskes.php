<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faskes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Faskes_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['title'] = 'Data Faskes';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['faskes_list'] = $this->Faskes_model->getAllFaskes();

		$this->load->view('admin/faskes/index', $data);		
	}

	public function create()
	{
		$data['title'] = 'Data Faskes';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));

		$this->form_validation->set_rules('nama_faskes', 'Nama Faskes', 'trim|required');
		$this->form_validation->set_rules('nama_kepala_faskes', 'Nama Kepala Faskes', 'trim|required');
		$this->form_validation->set_rules('alamat_faskes', 'Alamat Faskes', 'trim|required');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|decimal');
		$this->form_validation->set_rules('longtitude', 'Longtitude', 'trim|required|decimal');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/faskes/add', $data);
		} else {
			$data = [
				'nama_faskes'			=> $this->input->post('nama_faskes', true),
				'nama_kepala_faskes'	=> $this->input->post('nama_kepala_faskes', true),
				'alamat_faskes'		=> $this->input->post('alamat_faskes', true),
				'no_telepon'			=> $this->input->post('nomor_telepon', true),
				'latitude'				=> $this->input->post('latitude', true),
				'longtitude'			=> $this->input->post('longtitude', true),
			];
			
			$this->Faskes_model->create($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/faskes');
		}

	}

	public function update($id)
	{
		$data['title'] = 'Data Faskes';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['faskes_data'] = $this->Faskes_model->getFaskes($id);						

		$this->form_validation->set_rules('nama_faskes', 'Nama Faskes', 'trim|required');
		$this->form_validation->set_rules('nama_kepala_faskes', 'Nama Kepala Faskes', 'trim|required');
		$this->form_validation->set_rules('alamat_faskes', 'Alamat Faskes', 'trim|required');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required|decimal');
		$this->form_validation->set_rules('longtitude', 'Longtitude', 'trim|required|decimal');


		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/faskes/edit', $data);
		} else {
			$data = [
				'nama_faskes'			=> $this->input->post('nama_faskes', true),
				'nama_kepala_faskes'	=> $this->input->post('nama_kepala_faskes', true),
				'alamat_faskes'		=> $this->input->post('alamat_faskes', true),
				'no_telepon'			=> $this->input->post('nomor_telepon', true),
				'latitude'				=> $this->input->post('latitude', true),
				'longtitude'			=> $this->input->post('longtitude', true),
			];
			$this->Faskes_model->update($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
			redirect('admin/faskes');
		}

	}

	public function delete($id)
	{
		$data = $this->Faskes_model->getFaskes($id);
		if (empty($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak Ada</div>');
			redirect('admin/faskes');
		}

		$this->Faskes_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus</div>');
		redirect('admin/faskes');
	}


}

/* End of file Faskes.php */
/* Location: ./application/controllers/admin/Faskes.php */