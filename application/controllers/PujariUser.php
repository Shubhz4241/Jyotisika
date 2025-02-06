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
	public function List(){
		$this->load->view('Pujari/List');
	}
	public function PujaForm(){
		$this->load->view('Pujari/PujaForm');
	}
	public function AnalyticsandEarning(){
		$this->load->view('Pujari/AnalyticsandEarning');
	}
	public function OnlinePuja(){
		$this->load->view('Pujari/OnlinePuja');
	}
	public function OfflinePuja(){
		$this->load->view('Pujari/OfflinePuja');
	}
	public function ProfileForm(){
		$this->load->view('Pujari/ProfileForm');
	}
	public function AnalyticsAndEarning2(){
		$this->load->view('Pujari/AnalyticsAndEarning2');
	}
	public function EarningsBreakdown(){
		$this->load->view('Pujari/EarningsBreakdown');
	}
}
