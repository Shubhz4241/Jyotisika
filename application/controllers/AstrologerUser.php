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
	public function AstrologerAnalyticsandEarning1(){
		$this->load->view('Astrologer/AstrologerAnalyticsandEarning1');
	}
	public function AstrologerAnalyticsAndEarning2(){
		$this->load->view('Astrologer/AstrologerAnalyticsAndEarning2');
	}
	public function AstrologerEarningsBreakdown(){
		$this->load->view('Astrologer/AstrologerEarningsBreakdown');
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
	public function AstrologerMonthlyEarningsBreakdown(){
		$this->load->view('Astrologer/AstrologerMonthlyEarningsBreakdown');
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
	public function AstrologerChatUI(){
		$this->load->view('Astrologer/AstrologerChatUI');
	}
	
	
}