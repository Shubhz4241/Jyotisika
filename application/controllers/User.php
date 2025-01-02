<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function Home()
	{
		$this->load->view('User/Home');
	}

	public function Demo(){
		$this->load->view('User/Demo');
	}
	public function FreeKundli(){
		$this->load->view('User/FreeKundli');
	}

	public function BookPooja(){
		$this->load->view('User/BookPooja');
	}

	public function KundliMatching(){
		$this->load->view('User/KundliMatching');
	}

	public function Festival(){
		$this->load->view('User/Festival');
	}
}
