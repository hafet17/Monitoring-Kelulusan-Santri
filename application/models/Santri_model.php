<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model{
	
	public function total($ket, $keyword = null, $filter = null){
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->where('tb_nilai.keterangan', $ket);
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		if($keyword){
			$this->db->like('tb_santri.nama_lengkap', $keyword);
		}
		if($filter){
			$this->db->where('tb_nilai.triwulan', $filter);
		}
		
		$res = $this->db->get()->num_rows();
		return $res;
	}
	
	public function get_santri($ket, $limit, $start, $keyword = null, $filter = null){
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->where('tb_nilai.keterangan', $ket);
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		if($keyword){
			$this->db->like('tb_santri.nama_lengkap', $keyword);
		}
		if($filter){
			$this->db->where('tb_nilai.triwulan', $filter);
		}
		
		$res = $this->db->get(null, $limit, $start)->result_array();
		return $res;
	}
}
?>