<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {
	
	
	public function Dashboard(){
		
		$this->load->view('Sales/Dashboard');
	}
	public function AllAstrologer(){
		
		$this->load->view('Sales/AllAstrologer');
	}
	public function ViewAstrologerProfile(){
		
		$this->load->view('Sales/ViewAstrologerProfile');
	}
	public function Allpoojaris(){
		
		$this->load->view('Sales/Allpoojaris');
	}
	public function ViewPoojariProfile(){
		
		$this->load->view('Sales/ViewPoojariProfile');
	}
	public function Products(){
		
		$this->load->view('Sales/Products');
	}
	public function Profile(){
		
		$this->load->view('Sales/Profile');
	}
	public function Orders(){
		
		$this->load->view('Sales/Orders');
	}
	public function OrdersDetails(){
		
		$this->load->view('Sales/OrdersDetails');
	}
    
}



