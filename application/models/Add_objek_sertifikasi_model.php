<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Add_objek_sertifikasi_model extends CI_Model {

public function submitObjekSertifikasi($sto,$nama_objek,$deskripsi_objek,$nama_fields,$isi_fields,$deskripsi_media){
		$result['status'] = 'OK';
		$result['message'] = 'OK';
			//ADD DATA
		$insert['id_sto']=$sto;
		$insert['nama_objek_sertifikasi']=$nama_objek;
		$insert['deskripsi']=$deskripsi_objek;
		//$insert['kode_qr']=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil(5/strlen($x)) )),1,5);

		$this->db->insert('objek_sertifikasi', $insert);
				
		$id_objek = $this->db->insert_id();
		for ($i=0; $i < count($isi_fields) ; $i++) { 
			$insert = array();
			$insert['id_objek']=$id_objek;
			$insert['nama_field']=$nama_fields[$i];
			$insert['isi_field']=$isi_fields[$i];
			$this->db->insert('field_objek_sertifikasi', $insert);
		}

		$media_name=[];
		for ($i=0; $i < count($deskripsi_media) ; $i++) { 
			$insert = array();
			$insert['id_objek']=$id_objek;
			$insert['deskripsi_media']=$deskripsi_media[$i];
			$this->db->insert('media', $insert);
			array_push($media_name,$this->db->insert_id());
		}
		//$this->upload_photo();

				
		$result['message'] = 'Objek Sertifikasi berhasil di tambahkan.';
		$result['name'] = $media_name;
		
		return $result;
	}


   	public function addMediaURL($name,$ext,$type){
   		$url = $name.'.'.$ext;
   		$this->db->query("UPDATE media 
			SET 
			    tipe_media = '$type',
			    url = '$url'
			WHERE
			    id_media = $name;");	
	}

}
