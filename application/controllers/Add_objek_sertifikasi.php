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
    $data['media']="";
    $data['field']=["",""];
    $data['deskripsi']="";
    $data['nama_objek']="";
    $data['id_sto']="";
    $data['sto'] = $html;
    $data['action'] = "add";
    $data['id_objek'] = '';
		$this->load->view('common/v_header');
		$this->load->view('v_add_objek_sertifikasi',$data);
		$this->load->view('common/v_footer');
	}

  public function edit_objek($id_objek){
    $sto = $this->Add_objek_sertifikasi_model->getSTO();
    $html ="<option value=''>STO</option>";
    foreach ($sto as $row) {
     $html .= "<option value='$row->id_sto'>$row->nama_sto</option>" ;
    }
    $objek = $this->Add_objek_sertifikasi_model->getObjekSertifikasi($id_objek);
    $data['media']=$this->table_media($id_objek);
    $data['field']=$this->table_field($id_objek);
    $data['deskripsi']=$objek->deskripsi;
    $data['nama_objek']=$objek->nama_objek_sertifikasi;
    $data['id_sto']=$objek->id_sto;
    $data['sto'] = $html;
    $data['action'] = "edit";
    $data['id_objek'] = $id_objek;
    $this->load->view('common/v_header');
    $this->load->view('v_add_objek_sertifikasi',$data);
    $this->load->view('common/v_footer');
  }

  function table_media($id_objek){
    $data = $this->Add_objek_sertifikasi_model->getMedia($id_objek);
    $string = '<table id="table_media" class="table table-bordered"><tr><td align="center"><b>#</b></td><td align="center"><b>Deskripsi</b></td><td align="center"><b>Tipe</b></td><td align="center"><b>Action</b></td></tr>';
    $i=1;
    foreach ($data as $row) {
      if($row->tipe_media=="PHOTO"){
        $string .= '<tr><td align="center">'.$i.'</td><td align="center">'.$row->deskripsi_media.'</td><td align="center">'.$row->tipe_media.'</td><td align="center"><a class="btn btn-primary btn-xs" href="'.base_url('assets/photo_upload/'.$row->url).'" target="_blank"> <i class="fa fa-fw fa-eye"> </i> </a> <a class="btn btn-danger btn-xs" onclick="delete_media('.$row->id_media.','.$row->id_objek.')"><i class="fa fa-fw fa-trash"> </i> </a></td></tr>';  
      }else{
        $string .= '<tr><td align="center">'.$i.'</td><td align="center">'.$row->deskripsi_media.'</td><td align="center">'.$row->tipe_media.'</td><td align="center"><a class="btn btn-primary btn-xs"href="'.base_url('assets/video_upload/'.$row->url).'" target="_blank"> <i class="fa fa-fw fa-eye"> </i> </a> <a class="btn btn-danger btn-xs" onclick="delete_media('.$row->id_media.','.$row->id_objek.')"><i class="fa fa-fw fa-trash"> </i> </a> </td></tr>';
      }
      
      $i++;

    }

    $string .= '</table>';
    
    return $string;
  }

  function table_field($id_objek){
    $data = $this->Add_objek_sertifikasi_model->getField($id_objek);
    $i=1;
    $counter=0;
    $string='';
    
    foreach ($data as $row) {
      $string.='<div class="col-md-6"><div class="form-group"><label>Nama Field</label><input type="text" class="form-control" name="form_nama_field_'.$i.'" id="form_nama_field_'.$i.'" value="'.$row->nama_field.'" required></div></div><div class="col-md-6"><div class="form-group"><label>Isi Field</label><input type="text" class="form-control" name="form_isi_field_'.$i.'" id="form_isi_field_'.$i.'" value="'.$row->isi_field.'"  required></div></div>';
      
      $i++;
      $counter++;

    }

    return array($string,$counter);
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
          $this->upload($result['name'],'add');  
        }
        return ($result);
    }

    public function updateObjekSertifikasi(){
        $sto = $this->input->post('form_sto');
        $nama_objek = $this->input->post('form_nama_objek');        
        $deskripsi_objek = $this->input->post('form_deskripsi_objek');               
        $nama_fields = $this->input->post('nama_fields');               
        $isi_fields = $this->input->post('isi_fields');    
        $deskripsi_media = $this->input->post('deskripsi_media');    
        $id_objek = $this->input->post('id_objek');    

        /*$deskripsi_media = [];
        for ($i=1; $i <= $jumlah_media ; $i++) { 
             array_push($deskripsi_media,$this->input->post('form_deskripsi_media_'.$i));
         } */
              
        $result = $this->Add_objek_sertifikasi_model->updateObjekSertifikasi($sto,$nama_objek,$deskripsi_objek,$nama_fields,$isi_fields,$deskripsi_media,$id_objek);
        if($result['status']=='OK'){
          $this->upload($result['name'],'edit');  
        }
        return ($result);
    }

    public function upload($name,$action){
        $i = 1;
        foreach ($name as $key) {
            if($action=="add"){
              $result['message'] = 'Objek Sertifikasi Berhasil Ditambahkan';  
            }else{
              $result['message'] = 'Objek Sertifikasi Berhasil Diupdate';  
            }
            $result['status'] = 'OK';
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
                            if($action=="add"){
                              $result['message'] = 'Objek Sertifikasi Berhasil Ditambahkan';  
                            }else{
                              $result['message'] = 'Objek Sertifikasi Berhasil Diupdate';  
                            }
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
                        if($action=="add"){
                          $result['message'] = 'Objek Sertifikasi Berhasil Ditambahkan';  
                        }else{
                          $result['message'] = 'Objek Sertifikasi Berhasil Diupdate';  
                        }
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
              }

            $i++;
        }

        echo json_encode($result);
    }

    public function deleteMedia(){
      $id_media = $this->input->post('id_media');
      $id_objek = $this->input->post('id_objek');
      $result = $this->Add_objek_sertifikasi_model->deleteMedia($id_media);
      $result['media']=$this->table_media($id_objek);
      echo json_encode($result);
    }
}
