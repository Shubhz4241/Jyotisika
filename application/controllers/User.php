<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function Home()
	{
		$this->load->view('User/Home');
	}

	public function Demo()
	{
		$this->load->view('User/Demo');
	}
	public function FreeKundli()
	{
		$this->load->view('User/FreeKundli');
	}

	public function BookPooja()
	{
		$this->load->view('User/BookPooja');
	}

	public function KundliMatching()
	{
		$this->load->view('User/KundliMatching');
	}

	public function Festival()
	{
		$this->load->view('User/Festival');
	}

	public function Panchang()
	{
		$this->load->view('User/Panchang');
	}

	public function JyotisikaMall()
	{
		$this->load->view('User/JyotisikaMall');
	}

	public function TodayHoroscope()
	{
		$this->load->view('User/TodayHoroscope');
	}

	public function HoroscopeReadmore()
	{
		$this->load->view('User/HoroscopeReadmore');

	}

	public function KP()
	{
		$this->load->view('User/KP');
	}

	public function Astrologers(){
		$this->load->view('User/Astrologers');
	}

	public function ViewAstrologer(){
		$this->load->view('User/ViewAstrologer');
	}

	public function BookPoojaViewMore(){
		$this->load->view('User/BookPoojaViewMore');
	}

	public function Poojaris(){
		$this->load->view('User/Poojaris');
	}
}
