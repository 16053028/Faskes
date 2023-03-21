<?php

function is_logged_in($value='')
{
	$CI =& get_instance();
	if (!$CI->session->userdata('username')) {
		redirect('auth');
	}else{
		$role = $CI->session->userdata('id_role');
		$ctrl = 'admin/'.$CI->uri->segment(2);

		$menu = $CI->db->get_where('menu', ['link' => $ctrl])->row_array();

		$accessMenu = $CI->db->get_where('detail_menu', ['id_role' => $role, 'id_menu' => $menu['id_menu']]);
		
		if ($accessMenu->num_rows() < 1) {
			redirect('auth/blocked','refresh');
		}
	}
}