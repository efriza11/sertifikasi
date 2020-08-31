<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/Singapore");
        $this->load->Model('Auth_model');
    }
	
	public function index(){
		if ($this->session->isLogin == true) {
            redirect(base_url());
        }else{
			$this->load->view('v_login');
		}
	}
	
	public function do_login(){
		$username = addslashes($this->input->post('username'));
		$password = addslashes($this->input->post('password'));
		
		$data = $this->Auth_model->cekLoginUser($username,$password);
		
		echo json_encode($data);
	}
	
	public function do_logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
	
}
