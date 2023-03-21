<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
		$this->load->model('User_model');
		$this->load->model('Detail_role_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';		
			$this->load->view('auth/login', $data);			
		} else {
			$username = htmlspecialchars($this->input->post('username', true));
			$password = $this->input->post('password', true);

			// $user = $this->db->get_where('user', ['username' => $username])->row_array();
			$user = $this->Auth_model->checkLogin($username);
			if ($user) {
				if (password_verify($password, $user[0]['password'])) {
					if (count($user) > 1) {
						$this->session->set_userdata($data);$data = [
							'username'	=> $user[0]['username'],
						];
						$this->session->set_userdata($data);
						redirect('pilihrole');
					}else{
						$data = [
							'username'	=> $user[0]['username'],
							'id_role'	=> $user[0]['id_role'],
						];
						$this->session->set_userdata($data);
						if ($user[0]['id_role'] == 1) {
							redirect('/admin/dashboard');
						} else {
							redirect('/admin/rekomendasi_faskes');
						}
					}	
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');	
					redirect('auth');
				}
				
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar</div>');	
				redirect('auth');
			}
			
		}
	}

	public function register()
	{	
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches'		=> 'Password not match',
			'min_length'	=> 'Password min 6 char'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Register';		
			$this->load->view('auth/register', $data);						
		} else {
			$data = [
				'nama'			=> htmlspecialchars($this->input->post('nama', true)),
				'username'		=> htmlspecialchars($this->input->post('username', true)),
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'foto'			=> 'default.jpg',
			];

			$id_user_insert = $this->User_model->create($data);
			$role = $this->input->post('role', true);
			$data_detail = [
				'id_user' => $id_user_insert,
				'id_role' => 2,
			];
			$this->Detail_role_model->create($data_detail);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mendaftar. Silahkan login</div>');
			redirect('auth');
		}	
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = "Blocked";	
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));

		$this->load->view('auth/blocked', $data);
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */