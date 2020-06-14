<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Santri_model', 'santri');
		$this->load->library('pagination');
	}
	

	public function Lulus()
	{
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		if($this->input->post('filter')){
			$data['filter'] = $this->input->post('triwulan', true);
			$this->session->set_userdata('filter', $data['filter']);
		}else{
			$data['filter'] = $this->session->userdata('filter');
		}

		//Config
		$config['base_url'] = base_url('santri/Lulus');
		$config['total_rows'] = $this->santri->total('Lulus', $data['keyword'], $data['filter']);
		$config['per_page'] = 6;

		//Initialize
		$this->pagination->initialize($config);

		$data['title'] = 'Halaman Santri Lulus';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['start'] = $this->uri->segment(3);
		$data['santrilulus'] = $this->santri->get_santri('Lulus', $config['per_page'], $data['start'], $data['keyword'], $data['filter']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
		$this->load->view('santri/lulus', $data);
		$this->load->view('templates_user/footer');
	}

	public function Admin_Lulus()
	{
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		if($this->input->post('filter')){
			$data['filter'] = $this->input->post('triwulan', true);
			$this->session->set_userdata('filter', $data['filter']);
		}else{
			$data['filter'] = $this->session->userdata('filter');
		}

		//Config
		$config['base_url'] = base_url('santri/Admin_Lulus');
		$config['total_rows'] = $this->santri->total('Lulus', $data['keyword'], $data['filter']);
		$config['per_page'] = 6;

		//Initialize
		$this->pagination->initialize($config);

		$data['title'] = 'Halaman Santri Lulus';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['start'] = $this->uri->segment(3);
		$data['santrilulus'] = $this->santri->get_santri('Lulus', $config['per_page'], $data['start'], $data['keyword'], $data['filter']);

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
		$this->load->view('santri/lulus', $data);
		$this->load->view('templates_admin/footer');
    }

    public function Tidak_Lulus()
	{
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		if($this->input->post('filter')){
			$data['filter'] = $this->input->post('triwulan', true);
			$this->session->set_userdata('filter', $data['filter']);
		}else{
			$data['filter'] = $this->session->userdata('filter');
		}

		//Config
		$config['base_url'] = base_url('santri/Tidak_Lulus');
		$config['total_rows'] = $this->santri->total('Tidak Lulus', $data['keyword'], $data['filter']);
		$config['per_page'] = 6;

		//Initialize
		$this->pagination->initialize($config);

		$data['title'] = 'Halaman Santri Tidak Lulus';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['start'] = $this->uri->segment(3);
		$data['santriNLulus'] = $this->santri->get_santri('Tidak Lulus', $config['per_page'], $data['start'], $data['keyword'], $data['filter']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
		$this->load->view('santri/tidak_lulus', $data);
		$this->load->view('templates_user/footer');
	}
    public function Admin_Tidak_Lulus()
	{
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		}else{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		if($this->input->post('filter')){
			$data['filter'] = $this->input->post('triwulan', true);
			$this->session->set_userdata('filter', $data['filter']);
		}else{
			$data['filter'] = $this->session->userdata('filter');
		}

		//Config
		$config['base_url'] = base_url('santri/Admin_Tidak_Lulus');
		$config['total_rows'] = $this->santri->total('Tidak Lulus', $data['keyword'], $data['filter']);
		$config['per_page'] = 6;

		//Initialize
		$this->pagination->initialize($config);

		$data['title'] = 'Halaman Santri Tidak Lulus';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['start'] = $this->uri->segment(3);
		$data['santriNLulus'] = $this->santri->get_santri('Tidak Lulus', $config['per_page'], $data['start'], $data['keyword'], $data['filter']);

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
		$this->load->view('santri/tidak_lulus', $data);
		$this->load->view('templates_admin/footer');
	}



}