<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserLoginSignup extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->library('session'); // Load session library


	}

	public function Signup()
	{
		$this->load->view('UserLoginSignup/Signup');
	}

	public function Login()
	{
		$this->load->view('UserLoginSignup/Login');
	}

	public function userdata()
	{

		$api_url = "http://localhost/jyotisika_api/User/User_Auth/Register_User";
		$formdata = $this->input->post();

		if (empty($formdata)) {
			redirect("UserLoginSignup/Signup");
			exit();
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formdata));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);


		$responsedata = json_decode($response, true);
		if (($responsedata["status"] == "error")) {

			echo "Failed to retrieve data.";
			redirect("UserLoginSignup/Signup");
		} else if (($responsedata["status"] == "success")) {

			$userdata = $responsedata["data"];

			// $data['userdata'] =$responsedata["data"];

			if ($responsedata["data"]) {
				// Login successful, set session
				$user_session_data = [
					'user_id' => $userdata["user_id"],
					'user_name' => $userdata["user_name"],
					'user_mobilenumber' => $userdata["user_mobilenumber"],
					'logged_in_user' => TRUE,
					'role' => 'user'
				];
				$this->session->set_userdata($user_session_data);

				redirect('User/home');


			}
		}

	}

	public function login_user()
	{

		$api_url = "http://localhost/jyotisika_api/User/User_Auth/Login_user";

		$formdata = $this->input->post();

		if (empty($formdata)) {
			$this->session->set_flashdata('error', 'Pls enter all the fileds');
			redirect("UserLoginSignup/Login");


		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formdata));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);


		$responsedata = json_decode($response, true);
		if (($responsedata["status"] == "error") && isset($responsedata["data"])) {



			$this->session->set_flashdata('error', $responsedata["message"]);

			redirect("UserLoginSignup/Login");
		} else if (($responsedata["status"] == "success") && isset($responsedata["data"])) {

			if ($responsedata["data"]) {
				$userdata = $responsedata["data"];
				$user_session_data = [
					'user_id' => $userdata["user_id"],
					'user_name' => $userdata["user_name"],
					'user_mobilenumber' => $userdata["user_mobilenumber"],
					'logged_in_user' => TRUE,
					'role' => 'user'
				];
				$this->session->set_userdata($user_session_data);

				$this->session->set_flashdata('success', $responsedata["message"]);
				redirect('User/home');


			}
		} else if (($responsedata["status"] == "usernotexit")) {

			$this->session->set_flashdata('usernotexit', $responsedata["message"]);

			redirect("UserLoginSignup/Login");
		} else if (($responsedata["status"] == "otp_failed")) {

			$this->session->set_flashdata('otp_failed', $responsedata["message"]);

			redirect("UserLoginSignup/Login");
		} else {
			$this->session->set_flashdata('error', "something went wrong");
			redirect("UserLoginSignup/Login");
		}


	}


	public function Logout()
	{
		$this->session->sess_destroy();
		redirect("UserLoginSignup/Login");
		exit();
	}










}
