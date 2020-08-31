<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Singapore");
		
        $this->load->Model('Home_model');		
        $this->load->Model('Sertifikat_model');
    }
	
	public function index(){
		redirect(base_url());
	}

	public function objek($kode_qr=""){
		$cek_kode_qr =  $this->Sertifikat_model->cekKodeQR($kode_qr);
		if($cek_kode_qr != 0 ){
		
			$data['kode_qr'] = $kode_qr;
		
		//$form_detil = $this->Ceklis_model->getFormCeklisDetailGroup($id_pelaksanaan_ceklis,$grup_ceklis);
			$data['title'] = $this->Sertifikat_model->getObjekTitle($kode_qr);
			$data['media'] = $this->Sertifikat_model->getObjekMedia($kode_qr);
			$data['fields'] = $this->Sertifikat_model->getObjekFields($kode_qr); 
			$data['count'] = $this->Sertifikat_model->CountObjekMedia($kode_qr);
			
			$this->load->view('common/v_header');
			$this->load->view('v_sertifikat',$data);
			$this->load->view('common/v_footer');
		}else{
			redirect(base_url());
		}

	}

	public function cetak($kode_qr=""){
		$cek_kode_qr =  $this->Sertifikat_model->cekKodeQR($kode_qr);
		if($cek_kode_qr != 0 ){
			$data['title'] = $this->Sertifikat_model->getObjekCetak($kode_qr);
			$data['kode_qr'] = $kode_qr;
			$this->load->view('common/v_header');
			$this->load->view('v_cetak_sertifikat',$data);
			$this->load->view('common/v_footer');
		}else{
			redirect(base_url());
		}

	}
								

	
}
