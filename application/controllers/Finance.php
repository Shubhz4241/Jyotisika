<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {
	
	
	public function FinanceAstrologer(){
		
		$this->load->view('Finance/FinanceAstrologer');
	}
	public function FinancePoojari(){
		
		$this->load->view('Finance/FinancePoojari');
	}
	public function FinanceProfile(){
		
		$this->load->view('Finance/FinanceProfile');
	}
	
}


