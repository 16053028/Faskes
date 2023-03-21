<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Role_model');
		$this->load->model('Menu_model');
		$this->load->model('Detail_menu_model');
	}

	public function index()
	{
		$data['title'] = 'Akses Menu';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['role_list'] = $this->Role_model->getAllRole();

		$this->load->view('admin/detail_menu/index', $data);		
	}

	public function akses($id)
	{
		$data['title'] = 'Akses Menu';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['menu_detail_akses'] = $this->Detail_menu_model->getDetailMenuRole($id);
		$data['menu_list'] = $this->Menu_model->getAllMenu();

		$this->form_validation->set_rules('menu[]', 'Menu', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/detail_menu/akses_menu', $data);	
		} else {
			$this->Detail_menu_model->delete_role_menu($id);
			$menu = $this->input->post('menu', true);
			foreach ($menu as $key) {
				$data = [
					'id_role' => $id,
					'id_menu' => $key,
				];
				$this->Detail_menu_model->create($data);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/detail_menu');
		}

	}
}

/* End of file Detail_menu.php */
/* Location: ./application/controllers/admin/Detail_menu.php */