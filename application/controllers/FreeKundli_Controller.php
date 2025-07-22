<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FreeKundli_Controller extends CI_Controller
{
public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        // Load any models if needed
    }
    public function BasicAstrology()
    {

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

		$ch_astrologer = curl_init();
		curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
		curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
		$astrologer_data = curl_exec($ch_astrologer);
		$curl_error_astrologer_data = curl_error($ch_astrologer);
		curl_close($ch_astrologer);

		if ($astrologer_data === false) {
			show_error("cURL Error: " . $curl_error_astrologer_data, 500);
			return;
		}

		$astrologer_data_response = json_decode($astrologer_data, associative: true);


		$data["astrologer_data"] = "";
		if ($astrologer_data_response["status"] == "success") {
			$data["astrologer_data"] = $astrologer_data_response["data"];
		}

        print_r($data["astrologer_data"]);


        
        $this->load->view('User/FreeKundli/BasicAstrology');
    }
     public function PlanetaryPosition()
    {
        $this->load->view('User/FreeKundli/PlanetaryPosition');
    }
    public function VimshottariDasha()
    {
        $this->load->view('User/FreeKundli/VimshottariDasha');
    }
    public function AscendantReport()
    {
        $this->load->view('User/FreeKundli/AscendantReport');
    }
    public function GemstoneRecommendation()
    {
        $this->load->view('User/FreeKundli/GemstoneRecommendation');
    }   
     public function CompositeFriendship()
    {
        $this->load->view('User/FreeKundli/CompositeFriendship');
    }   
    public function Shadbala(){
        $this->load->view('User/FreeKundli/Shadbala');
    }
    public function YoginiDasha(){
        $this->load->view('User/FreeKundli/YoginiDasha');
    }
    public function HoroscopeCharts()
    {
        $this->load->view('User/FreeKundli/HoroscopeCharts');
    }
    public function ManglikDosha()
    {
        $this->load->view('User/FreeKundli/ManglikDosha');
    }
    public function KaalSarpaDosha()
    {
        $this->load->view('User/FreeKundli/KaalSarpaDosha');
    }
    public function SadheSati()
    {
        $this->load->view('User/FreeKundli/SadheSati');
    }
    public function BhavaKundli()
    {
        $this->load->view('User/FreeKundli/BhavaKundli');
    }
}
?>