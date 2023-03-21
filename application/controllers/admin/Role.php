<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Role_model');
	}

	public function index()
	{
		$data['title'] = 'Data Role';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['role_list'] = $this->Role_model->getAllRole();

		$this->load->view('admin/role/index', $data);		
	}

	public function create()
	{
		$data['title'] = 'Data Role';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));

		$this->form_validation->set_rules('role', 'Role', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/role/add', $data);
		} else {
			$data = [
				'role'			=> $this->input->post('role', true),
			];
			
			$this->Role_model->create($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/role');
		}

	}

	public function update($id)
	{
		$data['title'] = 'Data Role';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['role_data'] = $this->Role_model->getRole($id);						

		$this->form_validation->set_rules('role', 'Role', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/role/edit', $data);
		} else {
			$data = [
				'role'			=> $this->input->post('role', true),
			];
			$this->Role_model->update($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
			redirect('admin/role');
		}

	}

	public function delete($id)
	{
		$data = $this->Role_model->getRole($id);
		if (empty($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak Ada</div>');
			redirect('admin/role');
		}

		$this->Role_model->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus</div>');
		redirect('admin/role');
	}

}

/* End of file Role.php */
/* Location: ./application/controllers/admin/Role.php */