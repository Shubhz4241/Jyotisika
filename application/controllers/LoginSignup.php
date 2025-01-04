<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginSignup extends CI_Controller {
	
	public function LoginSignup(){
		$this->load->view('LoginSignup/LoginSignup');
	}
    
}
