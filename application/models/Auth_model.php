<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	public function cekLoginUser($username,$password){
		$result['status'] = 'OK';
		$result['message'] = 'OK';
		$select = "select * from user";
		//$select = "select * from petugas p, unit u where p.id_unit = u.id_unit and p.username = '$username' and p.password='$password'";
		$query = $this->db->query($select);
		
		if($query->num_rows()==1){
			$data = $query->row();
			
			if($data->password == $password){
					$result['status'] = 'OK';
					$this->session->isLogin = true;
				}else{
					$result['status'] = 'ERROR';
					$result['message'] = 'User dan Password tidak sesuai';
				}
		}else{
			$result['status'] = 'ERROR';
			$result['message'] = 'User dan Password tidak sesuai';
		}
		return $result;
	}
	
	
}
