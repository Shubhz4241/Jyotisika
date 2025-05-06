<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	
	
	public function Dashboard(){
		
		$this->load->view('Inventory/Dashboard');
	}
	public function Profile(){
		
		$this->load->view('Inventory/Profile');
	}

    
}



