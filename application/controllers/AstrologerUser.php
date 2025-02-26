<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AstrologerUser extends CI_Controller {

	public function AstrologerDashboard(){
		$this->load->view('Astrologer/AstrologerDashboard');
	}
	public function AstrologerNav(){
		$this->load->view('Astrologer/AstrologerNav');
	}
	public function AstrologerFooter(){
		$this->load->view('Astrologer/AstrologerFooter');
	}
	public function RegisterForm(){
		$this->load->view('Astrologer/RegisterForm');
	}
	public function AnalyticsandEarning1(){
		$this->load->view('Astrologer/AnalyticsandEarning1');
	}
	public function AnalyticsAndEarning2(){
		$this->load->view('Astrologer/AnalyticsAndEarning2');
	}
	public function EarningsBreakdown(){
		$this->load->view('Astrologer/EarningsBreakdown');
	}
	public function List(){
		$this->load->view('Astrologer/List');
	}
	public function Loaderpage(){
		$this->load->view('Astrologer/Loaderpage');
	}
	public function MobileNumberAndOTPForm(){
		$this->load->view('Astrologer/MobileNumberAndOTPForm');
	}
	public function MonthlyEarningsBreakdown(){
		$this->load->view('Astrologer/MonthlyEarningsBreakdown');
	}
	public function AstrologerReg(){
		$this->load->view('Astrologer/AstrologerReg');
	}
	public function AstrologerRecentRequest(){
		$this->load->view('Astrologer/AstrologerRecentRequest');
	}
	public function RegistrationForm(){
		$this->load->view('Astrologer/RegistrationForm');
	}
	public function AstrologyAndSpiritualServices1(){
		$this->load->view('Astrologer/AstrologyAndSpiritualServices1');
	}
	public function AstrologyAndSpiritualServices2(){
		$this->load->view('Astrologer/AstrologyAndSpiritualServices2');
	}
	public function AudioAndVideoCall(){
		$this->load->view('Astrologer/AudioAndVideoCall');
	}
	public function AstrologerProfileForm(){
		$this->load->view('Astrologer/AstrologerProfileForm');
	}
	
}