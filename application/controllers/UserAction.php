<?php

defined("BASEPATH") Or ("No Direct Script Access Allowed");
class UserAction extends CI_Controller{

    
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->library('session'); // Load session library
        $this->load->model('UserModel');

	}

    public function update_userprofile(){

        

       $data=  $this->input->post();

       print_r($data);
    }
}