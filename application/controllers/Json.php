<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Json_model', 'json');
        $this->load->library('datatable');
	}
	
	public function pengguna(){
		echo $this->datatable->process('tb_user');
	}
	
	public function santri(){
		echo $this->datatable->process('tb_santri');
	}
	
	public function materi(){
		echo $this->datatable->process('tb_materi');
	}
	
	public function jurusan(){
		$id = $this->input->post('fakultas_id');
		$jurusan = $this->db->get_where('tb_jurusan', ['fakultas_id' => $id])->result_array();
		
		$data = [];
		foreach($jurusan as $js){
			$data[] = [
				'id' => $js['id'],
				'nama' => $js['nama_jurusan']
			];
		}
		
		echo json_encode($data);
	}

	public function jurusantri(){
		$id = $this->input->post('lembaga_id');
		$jurusan = $this->db->get_where('tb_jurusan_santri', ['lembaga_id' => $id])->result_array();
		
		$data = [];
		foreach($jurusan as $js){
			$data[] = [
				'id' => $js['id'],
				'nama' => $js['nama_jurusan']
			];
		}
		
		echo json_encode($data);
	}

	public function nilaisantri(){
		$this->datatable->select('id, nama_lengkap, kamar, lembaga');
		echo $this->datatable->process('tb_santri');
	}
	
	public function kamar(){
		$id = $this->input->post('daerah_id');
		$kamar = $this->db->get_where('tb_kamar', ['daerah_id' => $id])->result_array();
		
		$data = [];
		foreach($kamar as $km){
			$data[] = [
				'id' => $km['id'],
				'nama' => $km['nama_kamar']
			];
		}
		
		echo json_encode($data);
	}
	
	public function editusr(){
		$id = $this->input->post('id');
		$user = $this->db->get_where('tb_user', ['id' => $id])->row_array();
		$fakultas = $this->db->get('tb_fakultas')->result_array();
		$daerah = $this->db->get('tb_daerah')->result_array();
		$role = $this->db->get('tb_level')->result_array();
		
		$mfakultas = [];
		foreach($fakultas as $ft){
			$mfakultas[] = [
				'id' => $ft['id'], 'nama' => $ft['nama_fakultas']
			];
		}
		
		$mdaerah = [];
		foreach($daerah as $dr){
			$mdaerah[] = [
				'id' => $dr['id'], 'nama' => $dr['nama_daerah']
			];
		}
		
		$mrole = [];
		foreach($role as $rl){
			$mrole[] = [
				'id' => $rl['id'], 'nama' => $rl['role']
			];
		}
		
		$data = [
			'id' => $user['id'],
			'nama' => $user['nama'],
			'lembaga' => $user['lembaga'],
			'fakultas' => $user['fakultas'],
			'jurusan' => $user['jurusan'],
			'semester' => $user['semester'],
			'daerah' => $user['daerah'],
			'kamar' => $user['kamar'],
			'username' => $user['username'],
			'gambar' => $user['gambar'],
			'role_id' => $user['role_id'],
			'is_active' => $user['is_active'],
			'mfakultas' => $mfakultas,
			'mdaerah' => $mdaerah,
			'mrole' => $mrole
		];
		
		echo json_encode($data);
	}
	
	public function provinsi(){
		$url = "http://dev.farizdotid.com/api/daerahindonesia/provinsi";
		$result = $this->json->curl($url);
		
		echo $result;
	}
	
	public function kabupaten(){
		$id = $this->input->post('prov_id', true);
		$url = "http://dev.farizdotid.com/api/daerahindonesia/provinsi/$id/kabupaten";
		echo $this->json->curl($url);
	}
	
	public function kecamatan(){
		$id = $this->input->post('kab_id', true);
		$url = "http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/$id/kecamatan";
		echo $this->json->curl($url);
	}
	
	public function desa(){
		$id = $this->input->post('kec_id', true);
		$url = "http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/kecamatan/$id/desa";
		echo $this->json->curl($url);
	}
}
?>