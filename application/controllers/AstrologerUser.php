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
}