<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Singapore");
		
		if ($this->session->isLogin == false) {
			redirect(base_url('auth'));
        }
		
        $this->load->Model('Home_model');		
    }
	
	public function index(){
		$this->load->view('common/v_header');
		$this->load->view('v_home');
		$this->load->view('common/v_footer');
	}


	public function getDataObjekSertifikasi(){
		$draw = $this->input->post("draw");
		$start = $this->input->post("start");
		$length = $this->input->post("length");
		$search = trim(addslashes($this->input->post("search")['value']));

		$data = $this->Home_model->getDataObjekSertifikasi($length,$start,$search);
		$i=1;
		foreach($data as $row){
			$row->no = $start + $i;
			$row->action = '<a class="btn btn-primary btn-xs" onclick="open_certificate(\''.$row->id_objek.'\')">Lihat Sertifikasi</a> 
				<a class="btn btn-danger btn-xs" onclick="delete_objek(\''.$row->id_objek.'\')"><i class="fa fa-fw fa-trash"> </i> </a>
				<a class="btn btn-warning btn-xs" onclick="edit_objek(\''.$row->id_objek.'\')"> <i class="fa fa-fw fa-edit"> </i> </a> ';
			$i++;
		}
		
		$result["data"] = $data;
		$result["draw"] = $draw;
		$result["recordsFiltered"] = $this->Home_model->getCountDataObjekSertifikasi($search);
		$result["recordsTotal"] = $this->Home_model->getCountDataObjekSertifikasi();
		
		echo json_encode($result);
	}

	public function getDataJenisSertifikasi(){
		$id_objek = $this->input->post("id_objek");

		$query = $this->Home_model->getDataJenisSertifikasi($id_objek); 
		$data = $query->result();
		$i=1;
		foreach($data as $row){
			$row->no = $i;
			$row->action = '<a class="btn btn-primary btn-xs" onclick="show_qr(\''.$row->kode_qr.'\',\''.$row->nama_sertifikasi.'\')">Show QR</a> <a class="btn btn-primary btn-xs" onclick="cetak_sertifikat(\''.$row->kode_qr.'\')">Cetak Sertifikat</a>';
			$row->delete = '<a class="btn btn-danger btn-xs" onclick="delete_jenis(\''.$row->kode_qr.'\')"><i class="fa fa-fw fa-trash"></i></a>';
			$i++;
		}
		$result["data"] = $data;
		$result["recordsFiltered"] = $query->num_rows();
		$result["recordsTotal"] = $query->num_rows();
		
		echo json_encode($result);
	}

	public function submitJenisSertifikasi(){
		$id_objek = $this->input->post('form_id_objek');
		$nama_sertifikasi =$this->input->post('form_nama_sertifikasi');
		$nama_certifier = $this->input->post('form_nama_certifier');
		$jabatan_certifier = $this->input->post('form_jabatan_certifier');
		$nik_certifier = $this->input->post('form_nik_certifier');
		$tgl_sertifikasi = $this->input->post('form_tgl_sertifikasi');
		$valid_until = $this->input->post('form_valid_until');

		$result = $this->Home_model->submitJenisSertifikasi($id_objek,$nama_sertifikasi,$nama_certifier,$jabatan_certifier,$nik_certifier,$tgl_sertifikasi,$valid_until);
		echo json_encode($result);
	}

	public function deleteJenisSertifikasi(){
		$kode_qr = $this->input->post('kode_qr');
		$result = $this->Home_model->deleteJenisSertifikasi($kode_qr);
		echo json_encode($result);
	}

	public function deleteObjekSertifikasi(){
		$id_objek = $this->input->post('id_objek');
		$result = $this->Home_model->deleteObjekSertifikasi($id_objek);
		echo json_encode($result);
	}
	
	
}
