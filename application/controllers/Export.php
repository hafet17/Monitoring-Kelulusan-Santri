<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller{
	public function __construct(){
		parent::__construct();
		check_login();
		$this->load->model('Export_model', 'export');
	}
	
	public function pengguna_pdf(){
		$data['title'] = "Data Pengguna";
		$data['users'] = $this->export->get_users()->result_array();
		
		$html = $this->load->view('templates_user/header', $data, true);
		$html .= $this->load->view('export/pengguna_pdf', $data, true);
		$html .= $this->load->view('templates_user/footer', [], true);
		
		$this->export->pdf('Data Pengguna', $html);
	}
	
	public function santri_pdf(){
		$data['title'] = "Santri";
		$data['santri'] = $this->export->get_data_santri()->result_array();
		
		$html = $this->load->view('templates_user/header', $data, true);
		$html .= $this->load->view('export/santri_pdf', $data, true);
		$html .= $this->load->view('templates_user/footer', [], true);
		
		$this->export->pdf('Data Santri', $html);
	}
	
	public function santri_lulus_pdf(){
		$data['title'] = "Santri Lulus";
		$data['santri'] = $this->export->get_santri('Lulus')->result_array();
		
		$html = $this->load->view('templates_user/header', $data, true);
		$html .= $this->load->view('export/santri_lulus_pdf', $data, true);
		$html .= $this->load->view('templates_user/footer', [], true);
		$this->export->pdf('Data santri lulus', $html);
	}
	
	public function santri_tidak_lulus_pdf(){
		$data['title'] = "Santri Tidak Lulus";
		$data['santri'] = $this->export->get_santri('Tidak Lulus')->result_array();
		
		$html = $this->load->view('templates_user/header', $data, true);
		$html .= $this->load->view('export/santri_tidak_lulus_pdf', $data, true);
		$html .= $this->load->view('templates_user/footer', [], true);
		
		$this->export->pdf('Data santri tidak lulus', $html);
	}
	
	public function laporan_pdf(){
		
		$data['title'] = 'Laporan';
		$data['santri'] = $this->export->get_laporan()->result_array();
		
		$html = $this->load->view('templates_user/header', $data, true);
		$html .= $this->load->view('export/laporan_pdf', $data, true);
		$html .= $this->load->view('templates_user/footer', [], true);
		
		$this->export->pdf("Laporan", $html);
	}
	
	public function pengguna_excel(){
		$pengguna = $this->export->get_users()->result();
		$this->export->pengguna_excel('Data Pengguna', 'Pengguna', 'Daftar Pengguna aplikasi monitoring', 'Pengguna', $pengguna);
	}
	
	public function santri_all_excel(){
		$santri = $this->export->get_all_santri()->result();
		
		$this->export->santri_all_excel('Data Santri', 'Daftar Santri', 'Data Santri I\'dadiyah Nurul Jadid '.date('Y'), 'Santri', $santri);
	}
	
	public function santri_lulus_excel(){
		$santri = $this->export->get_santri('Lulus')->result();
		
		$this->export->santri_excel('Data Santri Lulus', 'Santri Lulus', 'Santri Lulus I\'dadiyah Nurul Jadid '. date('Y'), 'Lulus', $santri);
	}
	
	public function santri_tidak_lulus_excel(){
		$santri = $this->export->get_santri('Tidak Lulus')->result();
		
		$this->export->santri_excel('Data Santri Tidak Lulus', 'Santri Tidak Lulus', 'Santri Tidak Lulus I\'dadiyah Nurul Jadid '. date('Y'), 'Tidak Lulus', $santri);
	}
	
	public function hasil_nilai_excel(){
		$hasil = [];
		
		$nilai = $this->export->get_hasil_nilai();
		foreach($nilai as $nl){
		for($i = 1; $i <= 4; $i++){
				$hasil[] = [
					'nama_lengkap' => $nl['nama_lengkap'],
					'lembaga' => $nl['lembaga'],
					'kamar' => $nl['kamar'],
					'triwulan' => "Triwulan $i",
					'akidah' => $nl['nilai_aqidah'.$i],
					'akhlak' => $nl['nilai_akhlak'.$i],
					'fiqih' => $nl['nilai_fiqih'.$i],
					'quran' => $nl['nilai_quran'.$i],
					'jumlah' => $nl['jumlah'.$i],
					'rata_rata' => $nl['rata_rata'.$i],
					'keterangan' => $nl['keterangan']
				];
			}
		}
		
		$this->export->hasil_nilai_excel('Hasil Nilai Santri', 'Hasil Nilai', 'Data Hasil Nilai Santri I\'dadiyah '.date('Y'), 'Hasil Nilai', $hasil);
	}
	
	public function laporan_excel(){
		$filter = $this->session->userdata('filter');
		$santri = $this->export->get_laporan($filter)->result();
		
		$this->export->laporan_excel('Laporan Data Santri', 'Data Nilai Santri', 'Laporan Nilai Santri I\'dadiyah Nurul Jadid '. date('Y'), 'Nilai', $santri);
	}
}
?>