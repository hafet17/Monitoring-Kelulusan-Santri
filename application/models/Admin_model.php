<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Json_model', 'json');
	}
	
	public function get_nilai_santri(){
		$this->db->select('tb_santri.id, nama_lengkap, lembaga, kamar, tb_nilai.id_santri, jumlah1, jumlah2, jumlah3, jumlah4, rata_rata, keterangan');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		$res = $this->db->get()->result_array();
		return $res;
	}
	
	public function get_percents($ket){
		$total = $this->db->get('tb_nilai')->num_rows();
		$res = $this->db->get_where('tb_nilai', ['keterangan' => $ket])->num_rows();
		$percent =  ($res *100) / $total;
		return (is_int($percent)) ? $percent : number_format(($percent), '2', '.', '');
	}

	public function simpanUser($gambar)
	{
		$nama = $this->input->post('nama', true);
		$lembaga = $this->input->post('lembaga', true);
		$fakultas = $this->input->post('fakultas', true);
		$jurusan = $this->input->post('jurusan', true);
		$semester = $this->input->post('semester', true);
		$daerah = $this->input->post('daerah', true);
		$kamar = $this->input->post('kamar', true);
		$username = $this->input->post('username', true);
		$password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
		$role = $this->input->post('role', true);
		$active = $this->input->post('status', true);

		$data = [
			'nama' => $nama, 'lembaga' => $lembaga, 'fakultas' => $fakultas, 'jurusan' => $jurusan, 'semester' => $semester, 'daerah' => $daerah, 'kamar' => $kamar, 'username' => $username, 'password' => $password, 'gambar' => $gambar, 'role_id' => $role, 'is_active' => $active
		];

		$this->db->insert('tb_user', $data);
		return $this->db->affected_rows();
	}

	public function editUser($gambar, $id)
	{
		$nama = $this->input->post('nama', true);
		$lembaga = $this->input->post('lembaga', true);
		$fakultas = $this->input->post('fakultas', true);
		$jurusan = $this->input->post('jurusan', true);
		$semester = $this->input->post('semester', true);
		$daerah = $this->input->post('daerah', true);
		$kamar = $this->input->post('kamar', true);
		$username = $this->input->post('username', true);
		$password = ($this->input->post('password', true) == "Password") ? null : password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
		$role = $this->input->post('role', true);
		$active = $this->input->post('status', true);

		if (!is_null($password)) {
			$data = [
				'nama' => $nama, 'lembaga' => $lembaga, 'fakultas' => $fakultas, 'jurusan' => $jurusan, 'semester' => $semester, 'daerah' => $daerah, 'kamar' => $kamar, 'username' => $username, 'password' => $password, 'gambar' => $gambar, 'role_id' => $role, 'is_active' => $active
			];
		} else {
			$data = [
				'nama' => $nama, 'lembaga' => $lembaga, 'fakultas' => $fakultas, 'jurusan' => $jurusan, 'semester' => $semester, 'daerah' => $daerah, 'kamar' => $kamar, 'username' => $username, 'gambar' => $gambar, 'role_id' => $role, 'is_active' => $active
			];
		}

		$this->db->update('tb_user', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}

	public function simpanSantri()
	{
		$nama = $this->input->post('nama_lengkap', true);
		$tempat = $this->input->post('tempat_lahir', true);
		$tgl = $this->input->post('tgl_lahir', true);
		$bln = $this->input->post('bln_lahir', true);
		$thn = $this->input->post('thn_lahir', true);
		$lembaga = $this->input->post('lembaga', true);
		$jurusan = $this->input->post('jurusan', true);
		$daerah = $this->input->post('daerah', true);
		$kamar = $this->input->post('kamar', true);
		$namaAyah = $this->input->post('nama_ayah', true);
		$kerjaAyah = $this->input->post('pekerjaan_ayah', true);
		$namaIbu = $this->input->post('nama_ibu', true);
		$kerjaIbu = $this->input->post('pekerjaan_ibu', true);
		$telp = $this->input->post('telp', true);
		$provinsi = $this->input->post('provinsi', true);
		$kabupaten = $this->input->post('kabupaten', true);
		$kecamatan = $this->input->post('kecamatan', true);
		$desa = $this->input->post('desa', true);
		$ttl = $tgl . '-' . $bln . '-' . $thn;

		$data = [
			'nama_lengkap' => $nama, 'tempat_lahir' => $tempat, 'tanggal_lahir' => $ttl, 'lembaga' => $lembaga, 'jurusan' => $jurusan, 'daerah' => $daerah, 'kamar' => $kamar, 'nama_ayah' => $namaAyah, 'pekerjaan_ayah' => $kerjaAyah, 'nama_ibu' => $namaIbu, 'pekerjaan_ibu' => $kerjaIbu, 'telp' => $telp, 'desa' => $desa, 'kecamatan' => $kecamatan, 'kabupaten' => $kabupaten, 'provinsi' => $provinsi, 'tgl_input' => date('d M Y H:i:s'), 'tgl_update' => '-'
		];

		$this->db->insert('tb_santri', $data);
		return $this->db->affected_rows();
	}


	public function editSantri($id)
	{
		$nama = $this->input->post('nama_lengkap', true);
		$tempat = $this->input->post('tempat_lahir', true);
		$tgl = $this->input->post('tgl_lahir', true);
		$bln = $this->input->post('bln_lahir', true);
		$thn = $this->input->post('thn_lahir', true);
		$lembaga = $this->input->post('lembaga', true);
		$jurusan = $this->input->post('jurusan', true);
		$daerah = $this->input->post('daerah', true);
		$kamar = $this->input->post('kamar', true);
		$namaAyah = $this->input->post('nama_ayah', true);
		$kerjaAyah = $this->input->post('pekerjaan_ayah', true);
		$namaIbu = $this->input->post('nama_ibu', true);
		$kerjaIbu = $this->input->post('pekerjaan_ibu', true);
		$telp = $this->input->post('telp', true);
		$provinsi = $this->input->post('provinsi', true);
		$kabupaten = $this->input->post('kabupaten', true);
		$kecamatan = $this->input->post('kecamatan', true);
		$desa = $this->input->post('desa', true);
		$ttl = $tgl . '-' . $bln . '-' . $thn;

		$data = [
			'nama_lengkap' => $nama, 'tempat_lahir' => $tempat, 'tanggal_lahir' => $ttl, 'lembaga' => $lembaga, 'jurusan' => $jurusan, 'daerah' => $daerah, 'kamar' => $kamar, 'nama_ayah' => $namaAyah, 'pekerjaan_ayah' => $kerjaAyah, 'nama_ibu' => $namaIbu, 'pekerjaan_ibu' => $kerjaIbu, 'telp' => $telp, 'desa' => $desa, 'kecamatan' => $kecamatan, 'kabupaten' => $kabupaten, 'provinsi' => $provinsi, 'tgl_update' => date('d M Y H:i:s')
		];

		$this->db->update('tb_santri', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
	
	public function total_nilai($keyword = null){
		$this->db->select('id, nama_lengkap, kamar, lembaga');
		$this->db->from('tb_santri');
		if($keyword) $this->db->like('nama_lengkap', $keyword);
		return $this->db->get()->num_rows();
	}
	
	public function get_nilai($start, $limit, $keyword = null){
		$this->db->select('id, nama_lengkap, kamar, lembaga');
		$this->db->from('tb_santri');
		if($keyword) $this->db->like('nama_lengkap', $keyword);
		return $this->db->get(null, $limit, $start)->result_array();
	}

	public function simpanNilai($id)
	{
		$akidah1 = $this->input->post('akidah1', true);
		$akhlak1 = $this->input->post('akhlak1', true);
		$fiqih1 = $this->input->post('fiqih1', true);
		$quran1 = $this->input->post('quran1', true);
		$akidah2 = $this->input->post('akidah2', true);
		$akhlak2 = $this->input->post('akhlak2', true);
		$fiqih2 = $this->input->post('fiqih2', true);
		$quran2 = $this->input->post('quran2', true);
		$akidah3 = $this->input->post('akidah3', true);
		$akhlak3 = $this->input->post('akhlak3', true);
		$fiqih3 = $this->input->post('fiqih3', true);
		$quran3 = $this->input->post('quran3', true);
		$akidah4 = $this->input->post('akidah4', true);
		$akhlak4 = $this->input->post('akhlak4', true);
		$fiqih4 = $this->input->post('fiqih4', true);
		$quran4 = $this->input->post('quran4', true);
		
		$jumlah1 = $akidah1 + $akhlak1 + $fiqih1 + $quran1;
		$jumlah2 = $akidah2 + $akhlak2 + $fiqih2 + $quran2;
		$jumlah3 = $akidah3 + $akhlak3 + $fiqih3 + $quran3;
		$jumlah4 = $akidah4 + $akhlak4 + $fiqih4 + $quran4;
		
		$rataRata1 = ($akidah1 + $akhlak1 + $fiqih1 + $quran1) / 4;
		$rataRata1 = (is_int($rataRata1)) ? $rataRata1 : number_format(($rataRata1), 2, '.', '');
		$rataRata2 = ($akidah2 + $akhlak2 + $fiqih2 + $quran2) / 4;
		$rataRata2 = (is_int($rataRata2)) ? $rataRata2 : number_format(($rataRata2), 2, '.', '');
		$rataRata3 = ($akidah3 + $akhlak3 + $fiqih3 + $quran3) / 4;
		$rataRata3 = (is_int($rataRata3)) ? $rataRata3 : number_format(($rataRata3), 2, '.', '');
		$rataRata4 = ($akidah4 + $akhlak4 + $fiqih4 + $quran4) / 4;
		$rataRata4 = (is_int($rataRata4)) ? $rataRata4 : number_format(($rataRata4), 2, '.', '');
		
		$rataRata = ($rataRata1 + $rataRata2 + $rataRata3 + $rataRata4) / 4;
		$rataRata = (is_int($rataRata)) ? $rataRata : number_format(($rataRata), 2, '.', '');
		$keterangan = ($rataRata > 75) ? 'Lulus' : 'Tidak Lulus';

		$data = ['id_santri' => $id, 'nilai_aqidah1' => $akidah1, 'nilai_akhlak1' => $akhlak1, 'nilai_fiqih1' => $fiqih1, 'nilai_quran1' => $quran1, 'jumlah1' => $jumlah1, 'nilai_aqidah2' => $akidah2, 'nilai_akhlak2' => $akhlak2, 'nilai_fiqih2' => $fiqih2, 'nilai_quran2' => $quran2, 'jumlah2' => $jumlah2, 'nilai_aqidah3' => $akidah3, 'nilai_akhlak3' => $akhlak3, 'nilai_fiqih3' => $fiqih3, 'nilai_quran3' => $quran3, 'jumlah3' => $jumlah3, 'nilai_aqidah4' => $akidah4, 'nilai_akhlak4' => $akhlak4, 'nilai_fiqih4' => $fiqih4, 'nilai_quran4' => $quran4, 'jumlah4' => $jumlah4, 'rata_rata1' => $rataRata1, 'rata_rata2' => $rataRata2, 'rata_rata3' => $rataRata3, 'rata_rata4' => $rataRata4, 'rata_rata' => $rataRata, 'keterangan' => $keterangan, 'tgl_input' => date('d M Y H:i:s'), 'tgl_update' => '-'];
		$this->db->insert('tb_nilai', $data);
		return $this->db->affected_rows();
	}

	public function editNilai($id)
	{
		$akidah1 = $this->input->post('akidah1', true);
		$akhlak1 = $this->input->post('akhlak1', true);
		$fiqih1 = $this->input->post('fiqih1', true);
		$quran1 = $this->input->post('quran1', true);
		$akidah2 = $this->input->post('akidah2', true);
		$akhlak2 = $this->input->post('akhlak2', true);
		$fiqih2 = $this->input->post('fiqih2', true);
		$quran2 = $this->input->post('quran2', true);
		$akidah3 = $this->input->post('akidah3', true);
		$akhlak3 = $this->input->post('akhlak3', true);
		$fiqih3 = $this->input->post('fiqih3', true);
		$quran3 = $this->input->post('quran3', true);
		$akidah4 = $this->input->post('akidah4', true);
		$akhlak4 = $this->input->post('akhlak4', true);
		$fiqih4 = $this->input->post('fiqih4', true);
		$quran4 = $this->input->post('quran4', true);
		
		$jumlah1 = $akidah1 + $akhlak1 + $fiqih1 + $quran1;
		$jumlah2 = $akidah2 + $akhlak2 + $fiqih2 + $quran2;
		$jumlah3 = $akidah3 + $akhlak3 + $fiqih3 + $quran3;
		$jumlah4 = $akidah4 + $akhlak4 + $fiqih4 + $quran4;
		
		$rataRata1 = ($akidah1 + $akhlak1 + $fiqih1 + $quran1) / 4;
		$rataRata1 = (is_int($rataRata1)) ? $rataRata1 : number_format(($rataRata1), 2, '.', '');
		$rataRata2 = ($akidah2 + $akhlak2 + $fiqih2 + $quran2) / 4;
		$rataRata2 = (is_int($rataRata2)) ? $rataRata2 : number_format(($rataRata2), 2, '.', '');
		$rataRata3 = ($akidah3 + $akhlak3 + $fiqih3 + $quran3) / 4;
		$rataRata3 = (is_int($rataRata3)) ? $rataRata3 : number_format(($rataRata3), 2, '.', '');
		$rataRata4 = ($akidah4 + $akhlak4 + $fiqih4 + $quran4) / 4;
		$rataRata4 = (is_int($rataRata4)) ? $rataRata4 : number_format(($rataRata4), 2, '.', '');
		
		$rataRata = ($rataRata1 + $rataRata2 + $rataRata3 + $rataRata4) / 4;
		$rataRata = (is_int($rataRata)) ? $rataRata : number_format(($rataRata), 2, '.', '');
		$keterangan = ($rataRata > 75) ? 'Lulus' : 'Tidak Lulus';

		$data = ['nilai_aqidah1' => $akidah1, 'nilai_akhlak1' => $akhlak1, 'nilai_fiqih1' => $fiqih1, 'nilai_quran1' => $quran1, 'jumlah1' => $jumlah1, 'nilai_aqidah2' => $akidah2, 'nilai_akhlak2' => $akhlak2, 'nilai_fiqih2' => $fiqih2, 'nilai_quran2' => $quran2, 'jumlah2' => $jumlah2, 'nilai_aqidah3' => $akidah3, 'nilai_akhlak3' => $akhlak3, 'nilai_fiqih3' => $fiqih3, 'nilai_quran3' => $quran3, 'jumlah3' => $jumlah3, 'nilai_aqidah4' => $akidah4, 'nilai_akhlak4' => $akhlak4, 'nilai_fiqih4' => $fiqih4, 'nilai_quran4' => $quran4, 'jumlah4' => $jumlah4, 'rata_rata1' => $rataRata1, 'rata_rata2' => $rataRata2, 'rata_rata3' => $rataRata3, 'rata_rata4' => $rataRata4, 'rata_rata' => $rataRata, 'keterangan' => $keterangan, 'tgl_update' => date('d M Y H:i:s')];
		$this->db->update('tb_nilai', $data, ['id_santri' => $id]);
		return $this->db->affected_rows();
	}

	public function upGambar($name)
	{
		$config['upload_path'] = './assets/images/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '10048';
		$newName = $this->session->userdata('username') . '_' . time();
		$config['file_name'] = $newName;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($name)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger mt-3 mb-3" role="alert">' . $error['error'] . '!</div>');
			redirect('admin/pengguna');
		} else {
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}


	public function getprov()
	{
		$url = "http://dev.farizdotid.com/api/daerahindonesia/provinsi";
		$result = $this->json->curl($url);
		return json_decode($result, true);
	}
	
	public function get_hasil_nilai(){
		$this->db->select('tb_santri.id, nama_lengkap, lembaga, kamar, tb_nilai.id_santri, nilai_aqidah1, nilai_aqidah2, nilai_aqidah3, nilai_aqidah4, nilai_akhlak1, nilai_akhlak2, nilai_akhlak3, nilai_akhlak4, nilai_fiqih1, nilai_fiqih2, nilai_fiqih3, nilai_fiqih4, nilai_quran1, nilai_quran2, nilai_quran3, nilai_quran4, jumlah1, jumlah2, jumlah3, rata_rata1, rata_rata2, rata_rata3, rata_rata4, jumlah4, rata_rata, keterangan');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		$res = $this->db->get()->result_array();
		return $res;
	}

	public function get_laporan($limit, $start, $keyword = null)
	{
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		if($keyword) $this->db->like('tb_santri.nama_lengkap', $keyword);
		$res = $this->db->get(null, $limit, $start)->result_array();
		return $res;
	}
	
	public function total_laporan($keyword = null){
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		if($keyword) $this->db->like('tb_santri.nama_lengkap', $keyword);
		$res = $this->db->get()->num_rows();
		return $res;
	}

	public function export_csv($db, $name)
	{
		$fields = $this->db->list_fields($db);
		$results = $this->db->get($db)->result_array();
		$csv = '';
		foreach ($fields as $field) {
			if ($field == "id") continue;
			$csv .= "$field,";
		}
		$csv .= "\n";
		foreach ($results as $result) {
			foreach ($fields as $field) {
				if ($field == "id") continue;
				$data = $result[$field];
				$csv .= "$data,";
			}
			$csv .= "\n";
		}
		header("Content-Type: text/x-csv");
		header("Content-Disposition: attachment; filename=" . $name . ".csv");
		echo $csv;
	}
}
