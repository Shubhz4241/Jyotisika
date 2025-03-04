<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLoginSignup extends CI_Controller {
	
	public function Signup(){
		$this->load->view('UserLoginSignup/Signup');
	}

	public function Login(){
		$this->load->view('UserLoginSignup/Login');
	}
    
}
