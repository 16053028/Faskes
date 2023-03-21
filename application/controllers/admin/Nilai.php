<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Faskes_model');
		$this->load->model('Kriteria_model');
		$this->load->model('User_model');
		$this->load->model('Nilai_model');
	}

	public function index()
	{
		$data['title'] = 'Data Nilai';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['kriteria_total'] = $this->Kriteria_model->totalKriteria();
		$data['faskes_list'] = $this->Faskes_model->getAllFaskesCountNilai();

		$this->load->view('admin/nilai/index', $data);		
	}

	public function list($id)
	{
		$data['title'] = 'Data Nilai';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['faskes_data'] = $this->Faskes_model->getFaskes($id);
		$data['nilai_list'] = $this->Nilai_model->getNilaiFaskes($id);
		$data['cek_nilai'] = count($this->Kriteria_model->getKriteriaDoesntHave($id));

		$this->load->view('admin/nilai/list', $data);
	}

	public function create($id_faskes)
	{
		$data['title'] = 'Data Nilai';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['faskes_data'] = $this->Faskes_model->getFaskes($id_faskes);
		$data['kriteria_list'] = $this->Kriteria_model->getKriteriaDoesntHave($id_faskes);

		$this->form_validation->set_rules('id_kriteria', 'Kriteria', 'trim|required|numeric');
		$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required|numeric');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/nilai/add', $data);
		} else {
			$data = [
				'id_faskes'	=> html_escape($id_faskes),
				'id_kriteria'	=> $this->input->post('id_kriteria', true),
				'nilai'			=> $this->input->post('nilai', true),
			];
			
			$this->Nilai_model->create($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/nilai/list/'.$id_faskes);
		}

	}

	public function update($id, $id_faskes)
	{
		$data['title'] = 'Data Nilai';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['faskes_data'] = $this->Faskes_model->getFaskes($id_faskes);
		$data['nilai_data'] = $this->Nilai_model->getNilai($id);						

		$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required|numeric');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/nilai/edit', $data);
		} else {
			$data = [
				'nilai'			=> $this->input->post('nilai', true),
			];
			$this->Nilai_model->update($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
			redirect('admin/nilai/list/'.$id_faskes);
		}

	}

	public function delete($id, $id_faskes)
	{
		$data = $this->Nilai_model->getNilai($id);
		if (empty($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak Ada</div>');
			redirect('admin/nilai');
		}

		$this->Nilai_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus</div>');
		redirect('admin/nilai/list/'.$id_faskes);
	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/admin/Nilai.php */