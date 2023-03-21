<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_faskes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Faskes_model');
		$this->load->model('Kriteria_model');
		$this->load->model('User_model');
		$this->load->model('Poli_faskes_model');
	}

	public function index()
	{
		$data['title'] = 'Data Nilai';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['kriteria_total'] = $this->Kriteria_model->totalKriteria();
		$data['faskes_list'] = $this->Faskes_model->getAllPoliFaskesCount();

		$this->load->view('admin/poli_faskes/index', $data);		
	}

	public function list($id)
	{
		$data['title'] = 'Data Nilai';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['faskes_data'] = $this->Faskes_model->getFaskes($id);
		$data['poli_list'] = $this->Poli_faskes_model->getPoliFaskes($id);
		$data['cek_poli'] = count($this->Poli_faskes_model->getPoliDoesntHave($id));

		$this->load->view('admin/poli_faskes/list', $data);
	}

	public function create($id_faskes)
	{
		$data['title'] = 'Daftar Poli Faskes';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['faskes_data'] = $this->Faskes_model->getFaskes($id_faskes);
		$data['poli_list'] = $this->Poli_faskes_model->getPoliDoesntHave($id_faskes);

		$this->form_validation->set_rules('id_poli', 'Poli', 'trim|required|numeric');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/poli_faskes/add', $data);
		} else {
			$data = [
				'id_faskes'	=> html_escape($id_faskes),
				'id_poli_detail'	=> $this->input->post('id_poli', true),
			];
			
			$this->Poli_faskes_model->create($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/poli_faskes/list/'.$id_faskes);
		}

	}


	public function delete($id, $id_faskes)
	{
		$data = $this->Poli_faskes_model->getPoli($id);
		if (empty($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak Ada</div>');
			redirect('admin/poli_faskes');
		}

		$this->Poli_faskes_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus</div>');
		redirect('admin/poli_faskes/list/'.$id_faskes);
	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/admin/Nilai.php */