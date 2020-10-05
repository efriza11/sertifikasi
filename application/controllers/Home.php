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
	
}
