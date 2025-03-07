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

	public function Astrologers()
	{
		$this->load->view('User/Astrologers');
	}

	public function ViewAstrologer()
	{
		$this->load->view('User/ViewAstrologer');
	}

	public function PoojarViewMore()
	{
		$this->load->view('User/PoojarViewMore');
	}

	public function OfflinePoojaris()
	{
		$this->load->view('User/OfflinePoojaris');
	}

	public function FestivalReadmore()
	{
		$this->load->view('User/FestivalReadmore');
	}

	public function WhyUs()
	{
		$this->load->view('User/WhyUs');
	}

	public function OnlinePoojaris()
	{
		$this->load->view("user/OnlinePoojaris");
	}

	public function Recharge()
	{
		$this->load->view('User/Recharge');
	}

	public function ServiceDetails()
	{
		$this->load->view('User/ServiceDetails');
	}

	public function Poojaris()
	{
		$this->load->view('User/Poojaris');
	}

	public function UserProfile(){
		$this->load->view('User/UserProfile');
	}
	public function Orders(){
		$this->load->view('User/Orders');
	}

	public function AstrologyServices(){
		$this->load->view('User/AstrologyServices');
	}

	public function ProductDetails (){
		$this->load->view('User/ProductDetails');
	}

	public function ProductPayment(){
		$this->load->view('User/ProductPayment');
	}	

	public function Notification()
	{
		$this->load->view('User/Notification');
	}

	public function CustomerSupport(){
		$this->load->view('User/CustomerSupport');
	}

	public function PoojaInfo(){
		$this->load->view('User/PoojaInfo');
	}

	public function getdata(){
		
	}
}
