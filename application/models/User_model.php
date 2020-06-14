<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model{
	public function get_percents($ket){
		$total = $this->db->get('tb_nilai')->num_rows();
		$res = $this->db->get_where('tb_nilai', ['keterangan' => $ket])->num_rows();
		$percent =  ($res *100) / $total;
		return (is_int($percent)) ? $percent : number_format(($percent), '2', '.', '');
	}
	
	public function total_nilai($keyword = null){
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		if($keyword) $this->db->like('tb_santri.nama_lengkap', $keyword);
		$res = $this->db->get()->num_rows();
		return $res;
	}
	
	public function get_nilai($limit, $start, $keyword = null){
		$this->db->select('tb_santri.nama_lengkap, lembaga, kamar, tb_nilai.*');
		$this->db->from('tb_santri');
		$this->db->join('tb_nilai', 'tb_santri.id = tb_nilai.id_santri');
		$this->db->order_by('tb_santri.nama_lengkap', 'ASC');
		if($keyword) $this->db->like('tb_santri.nama_lengkap', $keyword);
		$res = $this->db->get(null, $limit, $start)->result_array();
		return $res;
	}
}
?>