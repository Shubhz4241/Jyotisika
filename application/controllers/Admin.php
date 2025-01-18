<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function AdminDash(){
		
		$this->load->view('Admin/AdminDash');
	}
	public function AstrologerReqList(){
		
		$this->load->view('Admin/AstrologerReqList');
	}
    
}
