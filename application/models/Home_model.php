<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	 public function getDataObjekSertifikasi($limit,$offset,$search='') {
		$string_search = "";
		if($search!=""){
			$string_search = " WHERE o.nama_objek_sertifikasi like '%$search%'";
		}
		
        $select = "SELECT o.*, (SELECT GROUP_CONCAT(js.nama_sertifikasi) 
				FROM  jenis_sertifikasi js WHERE 
				o.id_objek = js.id_objek_sertifikasi AND valid_until >= CURDATE()) AS jenis
				FROM objek_sertifikasi o
				$string_search 
				ORDER BY 1 desc 
				LIMIT $limit OFFSET $offset ";
							//
        
        $query = $this->db->query($select)->result();
        return $query;
    }

    public function getCountDataObjekSertifikasi($search='') {
		$string_search = "";
		if($search!=""){
			$string_search = " WHERE o.nama_objek_sertifikasi like '%$search%'";
		}
		
        $select = "select count(*) as jumlah FROM objek_sertifikasi o
					$string_search";
					
        $query = $this->db->query($select)->row()->jumlah;
        return $query;
    }

    public function getDataJenisSertifikasi($id_objek) {
        $select = "SELECT * FROM jenis_sertifikasi WHERE id_objek_sertifikasi = '$id_objek'";
							//
        
        $query = $this->db->query($select);
        return $query;
    }

    public function deleteJenisSertifikasi($kode_qr){
		$sql = "DELETE FROM jenis_sertifikasi WHERE kode_qr = '$kode_qr'";
		$this->db->query($sql);
		$result['status'] = 'OK';
		$result['message'] = 'Berhasil Dihapus';
		return $result;
	}

	 public function deleteObjekSertifikasi($id_objek){
	 	$query = "SELECT * FROM jenis_sertifikasi js WHERE js.id_objek_sertifikasi='$id_objek'";
	 	if($this->db->query($query)->num_rows()==0){
			$sql = "DELETE FROM objek_sertifikasi WHERE id_objek = '$id_objek'";
			$this->db->query($sql);
			$sql = "DELETE FROM media WHERE id_objek = '$id_objek'";
			$this->db->query($sql);
			$sql = "DELETE FROM field_objek_sertifikasi WHERE id_objek = '$id_objek'";
			$this->db->query($sql);
			$result['status'] = 'OK';
			$result['message'] = 'Berhasil Dihapus';	
		}else{
			$result['status'] = 'error';
			$result['message'] = 'Masih Terdapat Sertifikasi';	
		}
		
		return $result;
	}
    
    public function submitJenisSertifikasi($id_objek,$nama_sertifikasi,$nama_certifier,$jabatan_certifier,$nik_certifier,$tgl_sertifikasi,$valid_until){
		$result['status'] = 'OK';
		$result['message'] = 'OK';
		
		$kode_qr = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil(5/strlen($x)) )),1,5);
		$query = $this->db->query("SELECT * FROM jenis_sertifikasi WHERE kode_qr = '$kode_qr'");
		$duplicate = $query->num_rows();

		while($duplicate != 0) {
		  $kode_qr = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil(5/strlen($x)) )),1,5);
		  $duplicate = $this->db->query("SELECT * FROM jenis_sertifikasi WHERE kode_qr = '$kode_qr'")->num_rows();
		}

		$this->saveQR($kode_qr);
		
	
		$sql = "INSERT INTO `jenis_sertifikasi` (`id_objek_sertifikasi`, `nama_sertifikasi`, `nama_certifier`, `jabatan_certifier`, `nik_certifier`, `tgl_sertifikasi`, `valid_until`,`kode_qr`) VALUES
		('$id_objek',  '$nama_sertifikasi', '$nama_certifier', '$jabatan_certifier', '$nik_certifier', '$tgl_sertifikasi', '$valid_until','$kode_qr')";	

		$this->db->query($sql);
		$result['message'] = 'Sertifikasi Berhasil Ditambahkan.';
		return $result;
	}
	
	public function saveQR($kode_qr){
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qr_code/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name= $kode_qr.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = base_url().'sertifikat/objek/'.$kode_qr; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
}
