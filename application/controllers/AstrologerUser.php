<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AstrologerUser extends CI_Controller {

	public function AstrologerDashboard(){
		$this->load->view('Astrologer/AstrologerDashboard');
	}
}