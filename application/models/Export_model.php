<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_model extends CI_Model{
	public function get_users(){
		return $this->db->get('tb_user');
	}
	
	public function get_data_santri(){
		return $this->db->get('tb_santri');
	}
	
	public function get_santri($ket = null){
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->where('tb_nilai.keterangan', $ket);
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		
		$res = $this->db->get();
		return $res;
	}
	
	public function get_all_santri(){
		return $this->db->get('tb_santri');
	}
	
	public function get_laporan()
	{
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		$res = $this->db->get();
		return $res;
	}
	
	public function get_hasil_nilai(){
		$this->db->select('tb_santri.id, nama_lengkap, lembaga, kamar, tb_nilai.id_santri, nilai_aqidah1, nilai_aqidah2, nilai_aqidah3, nilai_aqidah4, nilai_akhlak1, nilai_akhlak2, nilai_akhlak3, nilai_akhlak4, nilai_fiqih1, nilai_fiqih2, nilai_fiqih3, nilai_fiqih4, nilai_quran1, nilai_quran2, nilai_quran3, nilai_quran4, jumlah1, jumlah2, jumlah3, rata_rata1, rata_rata2, rata_rata3, rata_rata4, jumlah4, rata_rata, keterangan');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		$res = $this->db->get()->result_array();
		return $res;
	}
	
	public function pdf($title, $html){
		$pdf = new \Dompdf\Dompdf;
		$pdf->set_paper('A4', 'landscape');
		$pdf->load_html($html);
		$pdf->render();
		$pdf->stream($title, ['Attachment' => false]);
	}
	
	public function pengguna_excel($title, $subject, $descript, $key, $pengguna){
		include APPPATH . 'third_party/PHPExcel.php';
		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('I\'dadiyah NJ')->setLastModifiedBy('I\'dadiyah NJ')->setTitle($title)->setSubject($subject)->setDescription($descript)->setKeywords($key);
		$style_col = [
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$style_row = [
			'alignment' => [
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$excel->setActiveSheetIndex(0)->setCellValue('A1', $descript);
		$excel->getActiveSheet()->mergeCells('A1:K1');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "LEMBAGA");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "FAKULTAS");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "JURUSAN");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "SEMESTER");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "DAERAH");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "KAMAR");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "USERNAME");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "ACTIVE");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "ROLE");
		
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		
		$no = 1;
		$numrow = 4;
		foreach($pengguna as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->lembaga);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->fakultas);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jurusan);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->semester);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->daerah);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kamar);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->username);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->is_active);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->role_id);
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$no++;
			$numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $subject . '.xls"');
		header('Cache-Control: max-age=0');
		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	public function santri_all_excel($title, $subject, $descript, $key, $santri){
		include APPPATH . 'third_party/PHPExcel.php';
		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('I\'dadiyah NJ')->setLastModifiedBy('I\'dadiyah NJ')->setTitle($title)->setSubject($subject)->setDescription($descript)->setKeywords($key);
		$style_col = [
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$style_row = [
			'alignment' => [
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$excel->setActiveSheetIndex(0)->setCellValue('A1', $descript);
		$excel->getActiveSheet()->mergeCells('A1:Q1');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "TEMPAT LAHIR");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "TGL LAHIR");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "LEMBAGA");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "JURUSAN");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "DAERAH");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "KAMAR");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "NAMA AYAH");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "PEKERJAAN");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "NAMA IBU");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "PEKERJAAN");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "NO TELP");
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "PROVINSI");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "KABUPATEN");
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "KECAMATAN");
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "DESA");
		
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		
		$no = 1;
		$numrow = 4;
		foreach($santri as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_lengkap);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->tempat_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tanggal_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->lembaga);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jurusan);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->daerah);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->kamar);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->nama_ayah);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->pekerjaan_ayah);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->nama_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->pekerjaan_ibu);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->telp);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->provinsi);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->kabupaten);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->kecamatan);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->desa);
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$no++;
			$numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(35);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $subject . '.xls"');
		header('Cache-Control: max-age=0');
		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	public function santri_excel($title, $subject, $descript, $key, $santri){
		include APPPATH . 'third_party/PHPExcel.php';
		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('I\'dadiyah NJ')->setLastModifiedBy('I\'dadiyah NJ')->setTitle($title)->setSubject($subject)->setDescription($descript)->setKeywords($key);
		$style_col = [
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$style_row = [
			'alignment' => [
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$excel->setActiveSheetIndex(0)->setCellValue('A1', $descript);
		$excel->getActiveSheet()->mergeCells('A1:K1');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "LEMBAGA");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "KAMAR");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TRIWULAN 2");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "TRIWULAN 3");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "TRIWULAN 4");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "TRIWULAN 5");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "TOTAL NILAI");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "RATA - RATA");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "KETERANGAN");
		
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		
		$no = 1;
		$numrow = 4;
		foreach($santri as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_lengkap);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->lembaga);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kamar);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jumlah1);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->jumlah2);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jumlah3);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->jumlah4);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->jumlah1 + $data->jumlah2 + $data->jumlah3 + $data->jumlah4);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->rata_rata);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->keterangan);
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$no++;
			$numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $subject . '.xls"');
		header('Cache-Control: max-age=0');
		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	public function hasil_nilai_excel($title, $subject, $descript, $key, $hasil){
		include APPPATH . 'third_party/PHPExcel.php';
		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('I\'dadiyah NJ')->setLastModifiedBy('I\'dadiyah NJ')->setTitle($title)->setSubject($subject)->setDescription($descript)->setKeywords($key);
		$style_col = [
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$style_row = [
			'alignment' => [
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$excel->setActiveSheetIndex(0)->setCellValue('A1', $descript);
		$excel->getActiveSheet()->mergeCells('A1:L1');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "KAMAR");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "LEMBAGA");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TRIWULAN");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "AKIDAH");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "AKHLAK");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "FIQIH");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "AL-QUR\'AN");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "JUMLAH");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "RATA - RATA");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "KETERANGAN");
		
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		
		$no = 1;
		$numrow = 4;
		foreach($hasil as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['nama_lengkap']);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['kamar']);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['lembaga']);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['triwulan']);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['akidah']);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['akhlak']);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['fiqih']);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['quran']);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['jumlah']);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['rata_rata']);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['keterangan']);
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$no++;
			$numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(17);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Hasil Nilai.xls"');
		header('Cache-Control: max-age=0');
		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	
	public function laporan_excel($title, $subject, $descript, $key, $santri){
		include APPPATH . 'third_party/PHPExcel.php';
		$excel = new PHPExcel();
		$excel->getProperties()->setCreator('I\'dadiyah NJ')->setLastModifiedBy('I\'dadiyah NJ')->setTitle($title)->setSubject($subject)->setDescription($descript)->setKeywords($key);
		$style_col = [
			'font' => ['bold' => true],
			'alignment' => [
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$style_row = [
			'alignment' => [
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'top' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'bottom' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'right' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
				'left' => ['style' => PHPExcel_Style_Border::BORDER_THIN],
			]
		];
		
		$excel->setActiveSheetIndex(0)->setCellValue('A1', $descript);
		$excel->getActiveSheet()->mergeCells('A1:G1');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "KAMAR");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "LEMBAGA");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TRIWULAN 1");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "TRIWULAN 2");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "TRIWULAN 3");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "TRIWULAN 4");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "JUMLAH");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "RATA - RATA");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "KETERANGAN");
		
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		
		$no = 1;
		$numrow = 4;
		foreach($santri as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_lengkap);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kamar);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->lembaga);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->rata_rata1);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->rata_rata2);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->rata_rata3);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->rata_rata4);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->jumlah1 + $data->jumlah2 + $data->jumlah3 + $data->jumlah4);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->rata_rata);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->keterangan);
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$no++;
			$numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(17);
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan.xls"');
		header('Cache-Control: max-age=0');
		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
?>