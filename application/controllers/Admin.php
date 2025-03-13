<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function AdminDash(){
		
		$this->load->view('Admin/AdminDash');
	}
	public function AstrologerReqList(){
		
		$this->load->view('Admin/AstrologerReqList');
	}
	public function PujariReqList(){
		
		$this->load->view('Admin/PujariReqList');
	}
	public function UserManagement(){
		
		$this->load->view('Admin/UserManagement');
	}
	public function Festivals(){
		
		$this->load->view('Admin/Festivals');
	}
	public function BookPooja(){
		
		$this->load->view('Admin/BookPooja');
	}
	public function JyotisikaStore(){
		
		$this->load->view('Admin/JyotisikaStore');
	}
	public function Profile(){
		
		$this->load->view('Admin/Profile');
	}
	public function AnyliticsandReports(){
		
		$this->load->view('Admin/AnyliticsandReports');
	}
	public function RescheduleInterview(){
		
		$this->load->view('Admin/RescheduleInterview');
	}
	public function ViewAstrologer(){
		
		$this->load->view('Admin/ViewAstrologer');
	}
	public function ViewPujari(){
		
		$this->load->view('Admin/ViewPujari');
	}
	public function AstrologersList(){
		
		$this->load->view('Admin/AstrologersList');
	}
	public function AstrologerReview(){
		
		$this->load->view('Admin/AstrologerReview');
	}
	public function PujariList(){
		
		$this->load->view('Admin/PujariList');
	}
	public function PujariReview(){
		
		$this->load->view('Admin/PujariReview');
	}
    
}
