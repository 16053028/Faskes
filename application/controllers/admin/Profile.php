<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Detail_role_model');
	}

	public function index()
	{
		$data['title'] = 'Profile Saya';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));	
		$data['detail_role'] = $this->Detail_role_model->getDetailRoleUser($data['user']['id_user']);
		$this->load->view('admin/profile/index', $data);	
	}

	public function username_check()
    {
    	$query = $this->db->select('id_user','username')->where('username', $this->input->post('username', true))->where_not_in('id_user', $this->input->post('id_user', true))->count_all_results('user');
        if ($query > 0){
            $this->form_validation->set_message('username_check', '{field} Tidak tersedia');
            return FALSE;
        }else{
            return TRUE;
        }
    }

	public function update($id)
	{
		$data['title'] = 'Profile Saya';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));					

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/profile/edit', $data);
		} else {
			$upload_image = $_FILES['foto']['name'];
			if ($upload_image) {
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$old_image = $data['user']['foto'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$data = [
						'nama'			=> $this->input->post('nama', true),
						'username'		=> $this->input->post('username', true),
						'foto'			=> $this->upload->data('file_name'),
					];
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', $error);
					redirect('admin/profile/update/'.$id);
				}
				
			}else{
				$data = [
					'nama'			=> $this->input->post('nama', true),
					'username'		=> $this->input->post('username', true),
				];
			}
			$this->User_model->update($this->input->post('id_user', true), $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Update</div>');
			redirect('admin/profile');
		}

	}

	public function password_check()
    {
    	$data_user = $this->User_model->getUserWithUsername($this->session->userdata('username'));
    	$password = $this->input->post('password_lama', true);

        if (password_verify($password, $data_user['password'])){
            return TRUE;
        }else{
            $this->form_validation->set_message('password_check', '{field} Tidak Sama');
            return FALSE;
        }
    }

	public function changepassword()
	{
		$data['title'] = 'Ganti Password';
		$data['user'] = $this->User_model->getUserWithUsername($this->session->userdata('username'));
		$id_user = $data['user']['id_user'];	

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim|callback_password_check');
		$this->form_validation->set_rules('password_baru', 'Password', 'required|trim|min_length[6]|matches[konfirmasi_password]', [
			'matches'		=> 'Password not match',
			'min_length'	=> 'Password min 6 char'
		]);
		$this->form_validation->set_rules('konfirmasi_password', 'Password', 'required|trim|matches[password_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/ganti_password/index', $data);
		} else {
			$data = [
				'password'		=> password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
			];
			$this->User_model->update($id_user, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil Di Ubah</div>');
			redirect('admin/profile/changepassword');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/Profile.php */