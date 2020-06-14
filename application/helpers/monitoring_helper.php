<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_login()
{
	$ci = get_instance();
	$role_id = $ci->session->userdata('role_id');
	if(!is_null($role_id)){
		$url = $ci->uri->segment(1);
		if($url == "admin"){
			if($role_id != 1) redirect('user');
		}else if($url == "user"){
			if($role_id != 2) redirect('admin');
		}
	}else{
		$ci->session->set_flashdata('message', [
			'type' => 'error',
			'text' => 'Login Terlebih Dahulu!'
		]);
		redirect('auth');
	}
}
?>