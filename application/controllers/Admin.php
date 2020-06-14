<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		$data['title'] = 'Dashboard Admin';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['totalUser'] = $this->db->get('tb_user')->num_rows();
		$data['totalSantri'] = $this->db->get('tb_santri')->num_rows();
		$data['santriLulus'] = $this->admin->get_percents('Lulus');
		$data['santriNLulus'] = $this->admin->get_percents('Tidak Lulus');
		$data['santri'] = $this->admin->get_nilai_santri();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates_admin/footer');
	}

	public function Profile()
	{
		$data['title'] = "Halaman Profile";
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata['username']])->row_array();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates_admin/footer');
	}

	public function pengguna()
	{
		$data['title'] = 'Data Pengguna';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['fakultas'] = $this->db->get('tb_fakultas')->result_array();
		$data['daerah'] = $this->db->get('tb_daerah')->result_array();
		$data['role'] = $this->db->get('tb_level')->result_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('lembaga', 'Lembaga', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
		$this->form_validation->set_rules('daerah', 'Daerah', 'required');
		$this->form_validation->set_rules('kamar', 'Kamar', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required|numeric');
		$this->form_validation->set_rules('role', 'Role', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('templates_admin/topbar', $data);
			$this->load->view('admin/pengguna', $data);
			$this->load->view('templates_admin/footer');
		} else {
			if (isset($this->input->post()['add'])) {
				$image = 'default.jpg';
				if ($_FILES['gambar']['name'] != '') {
					$image = $this->admin->upGambar('gambar');
				}

				$res = $this->admin->simpanUser($image);
				if ($res > 0) {
					$this->session->set_flashdata('message', [
						'type' => 'success',
						'text' => 'Data pengguna berhasil ditambahkan!'
					]);
				} else {
					$this->session->set_flashdata('message', [
						'type' => 'error',
						'text' => 'Data pengguna gagal ditambahkan!'
					]);
				}
				redirect('admin/pengguna');
			} else {
				$user = $this->db->get_where('tb_user', ['id' => $this->input->post('id')])->row_array();
				$image = $user['gambar'];
				if ($_FILES['gambar']['name'] != '') {
					$image = $this->admin->upGambar('gambar');
				}

				$res = $this->admin->editUser($image, $user['id']);
				if ($res > 0) {
					$this->session->set_flashdata('message', [
						'type' => 'success',
						'text' => 'Data pengguna berhasil diubah!'
					]);
				} else {
					$this->session->set_flashdata('message', [
						'type' => 'error',
						'text' => 'Data pengguna gagal diubah!'
					]);
				}
				redirect('admin/pengguna');
			}
		}
	}

	public function data_santri()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('bln_lahir', 'Bulan Lahir', 'required');
		$this->form_validation->set_rules('thn_lahir', 'Tahun Lahir', 'required');
		$this->form_validation->set_rules('lembaga', 'Lembaga', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('daerah', 'Daerah', 'required');
		$this->form_validation->set_rules('kamar', 'Kamar', 'required');
		$this->form_validation->set_rules('nama_ayah', 'Password', 'required');
		$this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required');
		$this->form_validation->set_rules('telp', 'No Telp', 'required|numeric');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('desa', 'Desa', 'required');

		$data['title'] = 'Data Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$data['daerah'] = $this->db->get('tb_daerah')->result_array();
		$data['lembaga'] = $this->db->get('tb_lembaga')->result_array();
		$data['provinsi'] = $this->admin->getprov()['semuaprovinsi'];

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('templates_admin/topbar', $data);
			$this->load->view('admin/data_santri', $data);
			$this->load->view('templates_admin/footer');
		} else {
			if (isset($this->input->post()['add'])) {
				$res = $this->admin->simpanSantri();
				if ($res > 0) {
					$this->session->set_flashdata('message', [
						'type' => 'success',
						'text' => 'Data santri berhasil ditambahkan!'
					]);
				} else {
					$this->session->set_flashdata('message', [
						'type' => 'error',
						'text' => 'Data santri gagal ditambahkan!'
					]);
				}
				redirect('admin/data_santri');
			} else {
				$res = $this->admin->editSantri();
				if ($res > 0) {
					$this->session->set_flashdata('message', [
						'type' => 'success',
						'text' => 'Data santri berhasil diubah!'
					]);
				} else {
					$this->session->set_flashdata('message', [
						'type' => 'error',
						'text' => 'Data santri gagal diubah!'
					]);
				}
				redirect('admin/data_santri');
			}
		}
	}

	public function editsantri($id = null)
	{
		if ($id == null) redirect('admin/data_santri');
		$data['santri'] = $this->db->get_where('tb_santri', ['id' => $id])->row_array();
		if ($data['santri'] == null) redirect('admin/data_santri');

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('bln_lahir', 'Bulan Lahir', 'required');
		$this->form_validation->set_rules('thn_lahir', 'Tahun Lahir', 'required');
		$this->form_validation->set_rules('lembaga', 'Lembaga', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('daerah', 'Daerah', 'required');
		$this->form_validation->set_rules('kamar', 'Kamar', 'required');
		$this->form_validation->set_rules('nama_ayah', 'Password', 'required');
		$this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required');
		$this->form_validation->set_rules('telp', 'No Telp', 'required|numeric');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('desa', 'Desa', 'required');

		$data['title'] = 'Edit Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		$data['daerah'] = $this->db->get('tb_daerah')->result_array();
		$data['lembaga'] = $this->db->get('tb_lembaga')->result_array();
		$data['provinsi'] = $this->admin->getprov()['semuaprovinsi'];
		$data['pekerjaan'] = ['Wiraswasta', 'Pedagang', 'Nelayan', 'Wirausaha', 'Buruh', 'Petani', 'Karyawan Swasta', 'Progammer/Hacker', 'PNS/TNI/POLRI', 'Pensiun', 'Lain-lain'];

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('templates_admin/topbar', $data);
			$this->load->view('admin/edit_santri', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$res = $this->admin->editSantri($id);
			if ($res > 0) {
				$this->session->set_flashdata('message', [
					'type' => 'success',
					'text' => 'Data santri berhasil diubah!'
				]);
			} else {
				$this->session->set_flashdata('message', [
					'type' => 'error',
					'text' => 'Data santri gagal diubah'
				]);
			}
			redirect('admin/data_santri');
		}
	}
	public function input_nilai()
	{
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword');
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/input_nilai');
		$config['total_rows'] = $this->admin->total_nilai($data['keyword']);
		$config['per_page'] = 6;

		$this->pagination->initialize($config);

		$data['title'] = 'Input Nilai';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['start'] = $this->uri->segment(3);
		$data['santri'] = $this->admin->get_nilai($data['start'], $config['per_page'], $data['keyword']);

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/input_nilai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_nilai($id = null)
	{
		if (is_null($id)) redirect('admin/input_nilai');
		$data['santri'] = $this->db->get_where('tb_santri', ['id' => $id])->row_array();
		if (is_null($data['santri'])) redirect('admin/input_nilai');
		$nilai = $this->db->get_where('tb_nilai', ['id_santri' => $id])->row_array();
		if (!is_null($nilai)) {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'text' => 'Data nilai sudah tersedia'
			]);
			redirect('admin/input_nilai');
		}

		$data['title'] = 'Input Nilai Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('akidah1', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak1', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih1', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran1', 'Nilai Al - Qur\'an', 'required|numeric');
		$this->form_validation->set_rules('akidah2', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak2', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih2', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran2', 'Nilai Al - Qur\'an', 'required|numeric');
		$this->form_validation->set_rules('akidah3', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak3', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih3', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran3', 'Nilai Al - Qur\'an', 'required|numeric');
		$this->form_validation->set_rules('akidah4', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak4', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih4', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran4', 'Nilai Al - Qur\'an', 'required|numeric');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('templates_admin/topbar', $data);
			$this->load->view('admin/tambah_nilai', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$res = $this->admin->simpanNilai($id);
			if ($res > 0) {
				$this->session->set_flashdata('message', [
					'type' => 'success',
					'text' => 'Berhasil menambah data nilai'
				]);
			} else {
				$this->session->set_flashdata('message', [
					'type' => 'error',
					'text' => 'Gagal menambah data nilai'
				]);
			}
			redirect('admin/input_nilai');
		}
	}

	public function edit_nilai($id = null)
	{
		if (is_null($id)) redirect('admin/input_nilai');
		$data['santri'] = $this->db->get_where('tb_santri', ['id' => $id])->row_array();
		if (is_null($data['santri'])) redirect('admin/input_nilai');
		$data['nilai'] = $this->db->get_where('tb_nilai', ['id_santri' => $id])->row_array();
		if (is_null($data['nilai'])) {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'text' => 'Data nilai belum tersedia'
			]);
			redirect('admin/input_nilai');
		}

		$data['title'] = 'Input Nilai Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('akidah1', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak1', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih1', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran1', 'Nilai Al - Qur\'an', 'required|numeric');
		$this->form_validation->set_rules('akidah2', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak2', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih2', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran2', 'Nilai Al - Qur\'an', 'required|numeric');
		$this->form_validation->set_rules('akidah3', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak3', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih3', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran3', 'Nilai Al - Qur\'an', 'required|numeric');
		$this->form_validation->set_rules('akidah4', 'Nilai Akidah', 'required|numeric');
		$this->form_validation->set_rules('akhlak4', 'Nilai Akhlak', 'required|numeric');
		$this->form_validation->set_rules('fiqih4', 'Nilai Fiqih', 'required|numeric');
		$this->form_validation->set_rules('quran4', 'Nilai Al - Qur\'an', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('templates_admin/topbar', $data);
			$this->load->view('admin/edit_nilai', $data);
			$this->load->view('templates_admin/footer');
		} else {
			$res = $this->admin->editNilai($id);
			if ($res > 0) {
				$this->session->set_flashdata('message', [
					'type' => 'success',
					'text' => 'Berhasil mengubah data nilai'
				]);
			} else {
				$this->session->set_flashdata('message', [
					'type' => 'error',
					'text' => 'Gagal mengubah data nilai'
				]);
			}
			redirect('admin/input_nilai');
		}
	}

	public function hasil_nilai()
	{
		$data['hasil'] = [];

		$nilai = $this->admin->get_hasil_nilai();

		foreach ($nilai as $nl) {
			for ($i = 1; $i <= 4; $i++) {
				$data['hasil'][] = [
					'nama' => $nl['nama_lengkap'],
					'lembaga' => $nl['lembaga'],
					'kamar' => $nl['kamar'],
					'triwulan' => "Triwulan $i",
					'aqidah' => $nl['nilai_aqidah' . $i],
					'akhlak' => $nl['nilai_akhlak' . $i],
					'fiqih' => $nl['nilai_fiqih' . $i],
					'quran' => $nl['nilai_quran' . $i],
					'jumlah' => $nl['jumlah' . $i],
					'rata_rata' => $nl['rata_rata' . $i],
					'ket' => $nl['keterangan']
				];
			}
		}

		$data['title'] = 'Hasil Nilai Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/hasil_nilai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function laporan()
	{
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword', true);
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/laporan');
		$config['total_rows'] = $this->admin->total_laporan($data['keyword']);
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['title'] = 'Laporan Santri';
		$data['user'] = $this->db->get_where('tb_user', ['username' =>
		$this->session->userdata('username')])->row_array();
		$data['start'] = $this->uri->segment(3);
		$data['nilai'] = $this->admin->get_laporan($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('templates_admin/topbar', $data);
		$this->load->view('admin/laporan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function delusr($id = null)
	{
		if (!is_null($id)) {
			$user = $this->db->get_where('tb_user', ['id' => $id])->row_array();
			if (is_null($user)) show_404();
			if ($user['gambar'] != "default.jpg") @unlink(FCPATH . 'assets/images/users/' . $user['gambar']);
			$this->db->delete('tb_user', ['id' => $id]);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', [
					'type' => 'success',
					'text' => 'Data pengguna berhasil dihapus'
				]);
			} else {
				$this->session->set_flashdata('message', [
					'type' => 'error',
					'text' => 'Data pengguna gagal dihapus'
				]);
			}
			redirect('admin/pengguna');
		}
	}

	public function delsantri($id = null)
	{
		if (is_null($id)) redirect('admin/data_user');
		$this->db->delete('tb_nilai', ['id_santri' => $id]);
		$this->db->delete('tb_santri', ['id' => $id]);
		$res = $this->db->affected_rows();
		if ($res > 0) {
			$this->session->set_flashdata('message', [
				'type' => 'success',
				'text' => 'Data santri berhasil dihapus!'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'text' => 'Data santri gagal dihapus!'
			]);
		}
		redirect('admin/data_santri');
	}

	public function delnilai($id = null)
	{
		if (is_null($id)) redirect('admin/data_user');
		$this->db->delete('tb_nilai', ['id_santri' => $id]);
		$res = $this->db->affected_rows();
		if ($res > 0) {
			$this->session->set_flashdata('message', [
				'type' => 'success',
				'text' => 'Berhasil menghapus data nilai'
			]);
		} else {
			$this->session->set_flashdata('message', [
				'type' => 'error',
				'text' => 'Gagal menghapus data nilai'
			]);
		}
		redirect('admin/input_nilai');
	}


	public function export_santri()
	{
		$data = $this->admin->export_csv('tb_santri', 'Data Santri');
	}
}
