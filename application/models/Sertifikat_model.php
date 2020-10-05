<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat_model extends CI_Model {
	
	public function cekKodeQR($kode_qr){
		$jml_row = $this->db->query("SELECT * FROM jenis_sertifikasi WHERE kode_qr ='$kode_qr'")->num_rows();
		return $jml_row;
	}

	public function getObjekTitle($kode_qr){
		$select = "SELECT os.*,js.*, DATE_FORMAT(js.tgl_sertifikasi, '%d %M %Y') as tanggal FROM objek_sertifikasi os, jenis_sertifikasi js 
			WHERE os.id_objek=js.id_objek_sertifikasi and js.kode_qr = '$kode_qr' ORDER BY js.tgl_sertifikasi desc";
		$query = $this->db->query($select);
		return $query->row();
	}

	public function getObjekCetak($kode_qr){
		$select = "SELECT os.*,js.*, (case 
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 01 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Januari ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 02 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Februari ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 03 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Maret ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 04 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' April ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 05 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Mei ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 06 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Juni ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 07 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Juli ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 08 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Agustus ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 09 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' September ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 10 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Oktober ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 11 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' November ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
							when DATE_FORMAT(js.tgl_sertifikasi, '%m') = 12 then CONCAT('Banjarmasin, ',DATE_FORMAT(js.tgl_sertifikasi, '%d'),' Desember ',DATE_FORMAT(js.tgl_sertifikasi, '%Y'))
						end) tanggal_indo
						FROM objek_sertifikasi os, jenis_sertifikasi js 
						WHERE os.id_objek=js.id_objek_sertifikasi and js.kode_qr = '$kode_qr' ORDER BY js.tgl_sertifikasi desc";
		$query = $this->db->query($select);
		return $query->row();
	}
	
	public function getObjekMedia($kode_qr){
		$select = "SELECT * FROM media WHERE id_objek = (SELECT id_objek_sertifikasi FROM jenis_sertifikasi WHERE kode_qr = '$kode_qr')";
		$query = $this->db->query($select);
		return $query->result();
	}

	public function CountObjekMedia($kode_qr){
		$select = "SELECT * FROM media WHERE id_objek = (SELECT id_objek_sertifikasi FROM jenis_sertifikasi WHERE kode_qr = '$kode_qr')";
		$query = $this->db->query($select);
		return $query->num_rows();
	}

	public function getObjekFields($kode_qr){
		$select = "SELECT * FROM field_objek_sertifikasi WHERE id_objek = (SELECT id_objek_sertifikasi FROM jenis_sertifikasi WHERE kode_qr = '$kode_qr')";
		$query = $this->db->query($select);
		return $query->result();
	}
}