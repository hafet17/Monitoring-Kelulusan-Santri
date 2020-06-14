<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['title'] = 'Dashboard User';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['totalSantri'] = $this->db->get('tb_santri')->num_rows();
		$data['santriLulus'] = $this->user->get_percents('Lulus');
		$data['santriNLulus'] = $this->user->get_percents('Tidak Lulus');


		$this->load->view('templates_user/header', $data);
		$this->load->view('templates_user/sidebar', $data);
		$this->load->view('templates_user/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates_user/footer');
	}

	public function data_santri()
	{
		$data['title'] = 'Data Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$this->load->view('templates_user/header', $data);
		$this->load->view('templates_user/sidebar', $data);
		$this->load->view('templates_user/topbar', $data);
		$this->load->view('user/data_santri', $data);
		$this->load->view('templates_user/footer');
	}

	public function nilai_santri()
	{
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword', true);
			$this->session->set_userdata('keyword', $data['keyword']);
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->load->library('pagination');
		$config['base_url'] = base_url('user/nilai_santri');
		$config['total_rows'] = $this->user->total_nilai($data['keyword']);
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['nilai'] = $this->user->get_nilai($config['per_page'], $data['start'], $data['keyword']);

		$data['title'] = 'Nilai Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates_user/header', $data);
		$this->load->view('templates_user/sidebar', $data);
		$this->load->view('templates_user/topbar', $data);
		$this->load->view('user/nilai_santri', $data);
		$this->load->view('templates_user/footer');
	}

	public function Santri_Lulus()
	{
		$data['title'] = 'Halaman Santri Lulus';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
		$this->load->view('santri/lulus', $data);
		$this->load->view('templates_user/footer');
    }

    public function Santri_Tidak_Lulus()
	{
		$data['title'] = 'Halaman Santri Tidak Lulus';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
		$this->load->view('santri/tidak_lulus', $data);
		$this->load->view('templates_user/footer');
	}

	public function Profile()
	{
		$data['title'] = "Halaman Profile";
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata['username']])->row_array();

		$this->load->view('templates_user/header', $data);
		$this->load->view('templates_user/sidebar', $data);
		$this->load->view('templates_user/topbar', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('templates_user/footer');
	}

	public function change_password()
	{
		$data['title'] = 'Halaman Change Password';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_user/header', $data);
			$this->load->view('templates_user/sidebar', $data);
			$this->load->view('templates_user/topbar', $data);
			$this->load->view('user/change_password', $data);
			$this->load->view('templates_user/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', [
					'type' => 'warning',
					'text' => 'Password awal salah !'
				]);
				redirect('user/change_password');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', [
						'type' => 'warning',
						'text' => 'Password baru sama dengan password lama!'
					]);
					redirect('user/change_password');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('tb_user');
					$this->session->set_flashdata('message', [
						'type' => 'success',
						'text' => 'Password berhasil diupdate!'
					]);
					redirect('user/change_password');
				}
			}
		}
	}

}
