<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserLoginSignup extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->library('session');


	}

	public function Signup()
	{
		$this->load->view('UserLoginSignup/Signup');
	}

	public function Login()
	{
		$this->load->view('UserLoginSignup/Login');
	}


	public function register_user()
	{
		$api_url = "http://localhost/jyotisika_api/User/User_Auth/Register_User";
		$formdata = $this->input->post();

		if (empty($formdata)) {
			$this->session->set_flashdata('error', "All fields are required");
			redirect("UserLoginSignup/Signup");
		} else {
			// Check if cURL is available
			if (!function_exists('curl_init')) {
				$this->session->set_flashdata('error', "cURL is not enabled on this server.");
				redirect("UserLoginSignup/Signup");
				return;
			}

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $api_url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formdata));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($ch);

			// Check for cURL errors
			if ($response === false) {
				$error_msg = curl_error($ch);
				curl_close($ch);

				$this->session->set_flashdata('error', "cURL Error: " . $error_msg);
				redirect("UserLoginSignup/Signup");
				return;
			}

			curl_close($ch);

			$decoded = json_decode($response, true);

			if ($decoded === null) {
				$this->session->set_flashdata('error', "Invalid API response");
				redirect("UserLoginSignup/Signup");
			} else {
				$responsedata = $decoded;

				if ($responsedata["status"] == "error") {
					$this->session->set_flashdata('error', $responsedata["message"]);
				} elseif ($responsedata["status"] == "usermobilenumberexit") {
					$this->session->set_flashdata('usermobilenumberexit', $responsedata["message"]);
				} elseif ($responsedata["status"] == "dbqueryerror") {
					$this->session->set_flashdata('dbqueryerror', $responsedata["message"]);
				} elseif ($responsedata["status"] == "success") {
					$userdata = $responsedata["data"];

					if ($userdata) {
						$user_session_data = [
							'user_id' => $userdata["user_id"],
							'user_name' => $userdata["user_name"],
							'user_mobilenumber' => $userdata["user_mobilenumber"],
							'user_image' => $userdata["user_image"],
							'logged_in_user' => TRUE,
							'role' => 'user'
						];
						$this->session->set_userdata($user_session_data);
						redirect('User/home');
					} else {
						$this->session->set_flashdata('sessionnotset', "Session not set");
					}
				} else {
					$this->session->set_flashdata('error', "Something went wrong");
				}
				redirect("UserLoginSignup/Signup");
			}
		}
	}


	// public function register_user()
	// {

	// 	$api_url = "http://localhost/jyotisika_api/User/User_Auth/Register_User";
	// 	$formdata = $this->input->post();

	// 	if (empty($formdata)) {
	// 		$this->session->set_flashdata('error', "All fields are required");
	// 		redirect("UserLoginSignup/Signup");

	// 	} else {



	// 		$ch = curl_init();
	// 		curl_setopt($ch, CURLOPT_URL, $api_url);
	// 		curl_setopt($ch, CURLOPT_POST, true);
	// 		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formdata));
	// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 		$response = curl_exec($ch);
	// 		curl_close($ch);

	// 		$decoded = json_decode($response, true);

	// 		if ($decoded === null) {
	// 			$this->session->set_flashdata('error', "Wrong api response");

	// 			print_r($response);

	// 		} else {



	// 			$responsedata = json_decode($response, true);
	// 			if (($responsedata["status"] == "error")) {

	// 				$this->session->set_flashdata('error', $responsedata["message"]);
	// 				redirect("UserLoginSignup/Signup");

	// 			} else if (($responsedata["status"] == "usermobilenumberexit")) {

	// 				$this->session->set_flashdata('usermobilenumberexit', $responsedata["message"]);
	// 				redirect("UserLoginSignup/Signup");
	// 			} else if (($responsedata["status"] == "dbqueryerror")) {
	// 				$this->session->set_flashdata('dbqueryerror', $responsedata["message"]);
	// 				redirect("UserLoginSignup/Signup");
	// 			} else if (($responsedata["status"] == "success")) {

	// 				$userdata = $responsedata["data"];



	// 				if ($responsedata["data"]) {

	// 					$user_session_data = [
	// 						'user_id' => $userdata["user_id"],
	// 						'user_name' => $userdata["user_name"],
	// 						'user_mobilenumber' => $userdata["user_mobilenumber"],
	// 						'logged_in_user' => TRUE,
	// 						'role' => 'user'
	// 					];
	// 					$this->session->set_userdata($user_session_data);

	// 					redirect('User/home');


	// 				} else {

	// 					$this->session->set_flashdata('sessionnotset', "Session not set");
	// 					redirect("UserLoginSignup/Signup");
	// 				}
	// 			} else {
	// 				$this->session->set_flashdata('error', "Something went wrong");
	// 				redirect("UserLoginSignup/Signup");
	// 			}
	// 		}
	// 	}

	// }

	public function login_user()
	{
		$api_url = "http://localhost/jyotisika_api/User/User_Auth/Login_user";
		$formdata = $this->input->post();

		if (empty($formdata)) {
			$this->session->set_flashdata('error', 'Please enter all the fields');
			redirect("UserLoginSignup/Login");
			return;
		}

		// Check if cURL is available on the server
		if (!function_exists('curl_init')) {
			$this->session->set_flashdata('error', "cURL is not enabled on this server.");
			redirect("UserLoginSignup/Login");
			return;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formdata));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);

		// Check if cURL execution failed
		if ($response === false) {
			$error_msg = curl_error($ch);
			curl_close($ch);

			$this->session->set_flashdata('error', "cURL Error: " . $error_msg);
			redirect("UserLoginSignup/Login");
			return;
		}

		curl_close($ch);

		$decoded = json_decode($response, true);

		if ($decoded === null) {
			$this->session->set_flashdata('error', "Invalid API response");
			redirect("UserLoginSignup/Login");
			return;
		}

		$responsedata = $decoded;

		if ($responsedata["status"] == "error" && isset($responsedata["data"])) {
			$this->session->set_flashdata('error', $responsedata["message"]);
		} elseif ($responsedata["status"] == "success" && isset($responsedata["data"])) {
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
				return;
			}
		} elseif ($responsedata["status"] == "usernotexit") {
			$this->session->set_flashdata('usernotexit', $responsedata["message"]);
		} elseif ($responsedata["status"] == "otp_failed") {
			$this->session->set_flashdata('otp_failed', $responsedata["message"]);
		} elseif ($responsedata["status"] == "dberror") {
			$this->session->set_flashdata('dberror', $responsedata["message"]);
		} else {
			$this->session->set_flashdata('error', "Something went wrong");
		}

		redirect("UserLoginSignup/Login");
	}



	public function Logout()
	{
		$this->session->sess_destroy();
		$this->load->view('UserLoginSignup/Login');
		
	}










}
