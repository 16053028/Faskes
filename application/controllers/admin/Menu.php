<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$data['title'] = 'Menu';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['menu_list'] = $this->Menu_model->getAllMenu();

		$this->load->view('admin/menu/index', $data);		
	}

	public function create()
	{
		$data['title'] = 'Menu';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['menu_parent'] = $this->Menu_model->getMenuParent();

		$this->form_validation->set_rules('menu', 'Menu', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/menu/add', $data);
		} else {
			$data = [
				'menu'			=> $this->input->post('menu', true),
				'icon'			=> $this->input->post('icon', true),
				'link'			=> $this->input->post('link', true),
			];

			if ($this->input->post('parent_menu', true)) {
				$data['id_parent'] = $this->input->post('parent_menu', true);
			}
			
			$this->Menu_model->create($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
			redirect('admin/menu');
		}

	}

	public function update($id)
	{
		$data['title'] = 'Menu';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$data['menu_data'] = $this->Menu_model->getMenu($id);	
		$data['menu_parent'] = $this->Menu_model->getMenuParent($data['menu_data']['id_menu']);					

		$this->form_validation->set_rules('menu', 'Menu', 'trim|required');

		if ($this->form_validation->run() == false) {						
			$this->load->view('admin/menu/edit', $data);
		} else {
			$data = [
				'menu'			=> $this->input->post('menu', true),
				'icon'			=> $this->input->post('icon', true),
				'link'			=> $this->input->post('link', true),
			];

			if ($this->input->post('parent_menu', true)) {
				$data['id_parent'] = $this->input->post('parent_menu', true);
			}

			$this->Menu_model->update($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
			redirect('admin/menu');
		}

	}

	public function delete($id)
	{
		$data = $this->Menu_model->getMenu($id);
		if (empty($data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak Ada</div>');
			redirect('admin/menu');
		}
		
			$data = $this->Menu_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data '.$data.' di Hapus</div>');
		
			redirect('admin/menu');
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/admin/Menu.php */