<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PujariUser extends CI_Controller {

	public function PujariReg(){
		$this->load->view('Pujari/PujariReg');
	}
	public function RegisterForm(){
		$this->load->view('Pujari/RegisterForm');
	}
	public function PujariDashboard(){
		$this->load->view('Pujari/PujariDashboard');
	}
	public function RecentRequest(){
		$this->load->view('Pujari/RecentRequest');
	}
	public function SetRate(){
		$this->load->view('Pujari/SetRate');
	}
	public function RateChart(){
		$this->load->view('Pujari/RateChart');
	}
}
