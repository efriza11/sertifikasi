<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_objek_sertifikasi extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		
		if ($this->session->isLogin == false) {
			redirect(base_url('auth'));
        }
		
        $this->load->Model('Add_objek_sertifikasi_model');
    }
	
	public function index(){
		show_404();
	}


	public function add_objek(){
    $sto = $this->Add_objek_sertifikasi_model->getSTO();
    $html ="<option value=''>STO</option>";
    foreach ($sto as $row) {
     $html .= "<option value='$row->id_sto'>$row->nama_sto</option>" ;
    }
    $data['sto'] = $html;
		$this->load->view('common/v_header');
		$this->load->view('v_add_objek_sertifikasi',$data);
		$this->load->view('common/v_footer');
	}


    public function submitObjekSertifikasi(){
        $sto = $this->input->post('form_sto');
        $nama_objek = $this->input->post('form_nama_objek');        
        $deskripsi_objek = $this->input->post('form_deskripsi_objek');               
        $nama_fields = $this->input->post('nama_fields');               
        $isi_fields = $this->input->post('isi_fields');    
        $deskripsi_media = $this->input->post('deskripsi_media');    

        /*$deskripsi_media = [];
        for ($i=1; $i <= $jumlah_media ; $i++) { 
             array_push($deskripsi_media,$this->input->post('form_deskripsi_media_'.$i));
         } */
                

        $result = $this->Add_objek_sertifikasi_model->submitObjekSertifikasi($sto,$nama_objek,$deskripsi_objek,$nama_fields,$isi_fields,$deskripsi_media);
        if($result['status']=='OK'){
          $this->upload($result['name']);  
        }
        return ($result);
    }

    public function upload($name){
        $i = 1;
        foreach ($name as $key) {
            $file = $_FILES['form_media_'.(string)$i];
            $filename = $key;
            $fileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
            if($file['error'] === UPLOAD_ERR_OK){
                if($file['tmp_name'] != ''){
                  if ($fileType == "mp4" || $fileType == "MP4") { //FILE FORMAT
                    if($file["size"] <= 104857600 ) { //100MB
                        $target_dir = "./assets/video_upload/";
                        $target_file = $target_dir . $filename.'.'.$fileType;
                        if(file_exists($target_file)){
                            unlink($target_file);
                        }
                        if (move_uploaded_file($file["tmp_name"], $target_file)) {
                            $this->Add_objek_sertifikasi_model->addMediaURL($filename,$fileType,'VIDEO');
                            $result['message'] = 'Objek Sertifikasi Berhasil Ditambahkan';
                            $result['status'] = 'OK';
                        } else {
                            $result['message'] = 'Sorry, there was an error uploading your file.';
                            $result['status'] = 'error';
                        }
                    }else{
                      $result['message'] = 'File is too large.';
                    }
                  }else if($fileType == "png" || $fileType == "PNG" || $fileType == "jpeg" || $fileType == "JPEG" || $fileType == "jpg" || $fileType == "JPG"){
                    if($file["size"] <= 10485760 ) { //10MB
                      $target_dir = "./assets/photo_upload/";
                      $target_file = $target_dir . $filename.'.'.$fileType;
                      if(file_exists($target_file)){
                        unlink($target_file);
                      }
                      if (move_uploaded_file($file["tmp_name"], $target_file)) {
                        $this->Add_objek_sertifikasi_model->addMediaURL($filename,$fileType,'PHOTO');
                        $result['message'] = 'Objek Sertifikasi Berhasil Ditambahkan';
                        $result['status'] = 'OK';
                      } else {
                        $result['message'] = 'Sorry, there was an error uploading your file.';
                        $result['status'] = 'error';
                      }
                    }else{
                      $result['message'] = 'File is too large.';
                      $result['status'] = 'error';
                    }
                  }
                }else{
                  $result['message'] = 'File empty.';
                  $result['status'] = 'error';
                }
              }else{
                if($file['error'] == UPLOAD_ERR_INI_SIZE){
                  $result['message'] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                  $result['status'] = 'error';
                }else if($file['error'] == UPLOAD_ERR_FORM_SIZE){
                  $result['message'] = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                  $result['status'] = 'error';
                }else if($file['error'] == UPLOAD_ERR_PARTIAL){
                  $result['message'] = 'The uploaded file was only partially uploaded';
                  $result['status'] = 'error';
                }else if($file['error'] == UPLOAD_ERR_NO_FILE){
                  $result['message'] = 'No file was uploaded';
                  $result['status'] = 'error';
                }else if($file['error'] == UPLOAD_ERR_NO_TMP_DIR){
                  $result['message'] = 'Missing a temporary folder';
                  $result['status'] = 'error';
                }else if($file['error'] == UPLOAD_ERR_CANT_WRITE){
                  $result['message'] = 'Failed to write file to disk';
                  $result['status'] = 'error';
                }else if($file['error'] == UPLOAD_ERR_EXTENSION){
                    $result['status'] = 'error';
                    $result['message'] = 'File upload stopped by extension';
                }else{
                  $result['status'] = 'error';
                  $result['message'] = 'Unknown upload error';
                }
              }

            $i++;
        }

        echo json_encode($result);
    }

}
