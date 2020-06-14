<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json_model extends CI_Model{
	public function curl($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}
}
?>