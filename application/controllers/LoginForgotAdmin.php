<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginForgotAdmin extends CI_Controller {
	
	public function LoginAdmin(){
		$this->load->view('LoginForgotAdmin/LoginAdmin');
	}
    
}
