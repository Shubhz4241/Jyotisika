<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->library('session');
	}


	//-------------------------CHANGE LANGUAVAGE ---------------------------------------------------------------------

	public function change_language($lang = "english")
	{

		$this->session->set_userdata('site_language', $lang);
		redirect($_SERVER['HTTP_REFERER']); // Redirect back to the previous page
	}


	//-----------------------------------GET USER DATA ----------------------------------------------------------------


	public function get_userdata($user_id)
	{

		if (!$user_id) {
			show_error("User is not logged in", 401);
			return null;
		}

		// $api_url = "http://localhost/Astrology/User_Api_Controller/getuser_info";
		$api_url = base_url("User_Api_Controller/getuser_info");


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["session_id" => $user_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_error = curl_error($ch);
		curl_close($ch);




		$data['userdata'] = json_decode($response, true);

		if ($data['userdata']['status'] == "success") {
			$data["userinfo"] = $data['userdata']['data'];
			return $data["userinfo"];
		} else if ($data['userdata']['status'] == "usernotfound") {
			$data["userinfo"] = "usernotfound";
			return $data["userinfo"];
		} else {
			return null;
		}
	}





	// public function get_userinfo()
	// {

	// 	$this->load->library('session');


	// 	$user_id = $this->session->userdata('user_id');

	// 	if (!$user_id) {
	// 		echo json_encode(["error" => "User not logged in"]);
	// 		return;
	// 	}


	// 	$user_data = $this->get_userdata($user_id);

	// 	if ($user_data) {
	// 		echo json_encode(["success" => true, "data" => $user_data]);
	// 	} else {
	// 		echo json_encode(["error" => "Failed to retrieve user data"]);
	// 	}
	// }




	//------------------------------------------- USER  SELF PAGES---------------------------------------------------------------------


	function Get_top_products()
	{

		// $api_urlsBLOG = "http://localhost/Astrology/User_Api_Controller/Get_top_products";
		$api_url = base_url("User_Api_Controller/Get_top_products");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_data = json_decode($response, true);
		if (isset($response_data["status"]) && $response_data["status"] == "success") {
			$data = $response_data;
		} else {
			$data = null;
		}
		return $data;
	}






	public function Home()
	{
		$user_id = $this->session->userdata('user_id');
		// print_r($user_id);
		$data = [];

		$getastrologer_url = base_url("User_Api_Controller/show_top_astrologer");

		$chastro = curl_init();
		curl_setopt($chastro, CURLOPT_URL, $getastrologer_url);
		curl_setopt($chastro, CURLOPT_RETURNTRANSFER, true);
		$astroresponse = curl_exec($chastro);
		$curl_error_astroresponse = curl_error($chastro);
		curl_close($chastro);

		if ($astroresponse === false) {
			show_error("cURL Error: " . $curl_error_astroresponse, 500);
			return;
		}

		$astrologer_data = json_decode($astroresponse, associative: true);



		$data["astrologer_data"] = "";
		if ($astrologer_data["status"] == "success") {
			$data["astrologer_data"] = $astrologer_data["data"];
		}




		if ($user_id) {
			$getdata["userinfo"] = $this->get_userdata($user_id);
			$data["userinfo_data"] = "";

			if (!$getdata["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "usernotfound") {
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "userfound") {
				redirect("UserLoginSignup/Logout");
			}

			$data["userinfo_data"] = $getdata["userinfo"];
		}


		$language = $this->session->userdata('site_language') ?? 'english';

		// $data['astrologersdata'] = $this->Astrologer();

		$ch_url = base_url("User_Api_Controller/showservices_limited");

		$ch_service = curl_init();
		curl_setopt($ch_service, CURLOPT_URL, $ch_url);
		curl_setopt($ch_service, CURLOPT_RETURNTRANSFER, true);
		$service_response = curl_exec($ch_service);
		$curl_error_service = curl_error($ch_service);
		curl_close($ch_service);

		if ($service_response === false) {
			show_error("cURL Error: " . $curl_error_service, 500);
			return;
		}

		$service_data = json_decode($service_response, associative: true);


		$data["service_data"] = "";
		if ($service_data["status"] == "success") {
			$data["service_data"] = $service_data["data"];
		}


		//Static page


		$ch_url_data = base_url("User_Api_Controller/show_home_astrologer_service");

		$ch_service_data = curl_init();
		curl_setopt($ch_service_data, CURLOPT_URL, $ch_url_data);
		curl_setopt($ch_service_data, CURLOPT_RETURNTRANSFER, true);
		$service_response_data = curl_exec($ch_service_data);
		$curl_error_service_data = curl_error($ch_service_data);
		curl_close($ch_service_data);

		if ($service_response_data === false) {
			show_error("cURL Error: " . $curl_error_service_data, 500);
			return;
		}

		$home_service_data = json_decode($service_response_data, associative: true);


		$data["home_service_data"] = "";
		if ($home_service_data["status"] == "success") {
			$data["home_service_data"] = $home_service_data["data"];
		}




		//Blogs section 

		$ch_url_blogs = base_url("User_Api_Controller/show_blogs");

		$ch_data_blogs = curl_init();
		curl_setopt($ch_data_blogs, CURLOPT_URL, $ch_url_blogs);
		curl_setopt($ch_data_blogs, CURLOPT_RETURNTRANSFER, true);
		$blog_response_data = curl_exec($ch_data_blogs);
		$curl_error_blog_data = curl_error($ch_data_blogs);
		curl_close($ch_data_blogs);

		if ($blog_response_data === false) {
			show_error("cURL Error: " . $curl_error_blog_data, 500);
			return;
		}

		$blog_data = json_decode($blog_response_data, associative: true);


		$data["blogdata"] = "";
		if ($blog_data["status"] == "success") {
			$data["blogdata"] = $blog_data["data"];
		}




		//product section 

		$ch_url_product = base_url("User_Api_Controller/Get_top_products");

		$ch_data_product = curl_init();
		curl_setopt($ch_data_product, CURLOPT_URL, $ch_url_product);
		curl_setopt($ch_data_product, CURLOPT_RETURNTRANSFER, true);
		$ch_data_product_response = curl_exec($ch_data_product);
		$ch_data_product_error = curl_error($ch_data_product);
		curl_close($ch_data_product);

		if ($ch_data_product_response === false) {
			show_error("cURL Error: " . $ch_data_product_error, 500);
			return;
		}



		$product_data = json_decode($ch_data_product_response, associative: true);



		$data["productdata"] = "";
		if ($product_data["status"] == "success") {
			$data["productdata"] = $product_data["data"];
		}

		// print_r($data["productdata"]);








		// print_r($data["blogdata"]);

		//   print_r($data["service_data"]);
		$this->lang->load('message', $language);
		$this->load->view('User/Home', $data);
	}





	public function UserProfile()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$user_id = $this->session->userdata('user_id');

		if (!$user_id) {

			$this->load->view("UserLoginSignup/Login");
		} else {
			$data["userinfo"] = $this->get_userdata($user_id);

			if (!$data["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				redirect("UserLoginSignup/Logout");
			} else if ($data["userinfo"] == "usernotfound") {
				redirect("UserLoginSignup/Logout");
			}


			$this->load->view("User/UserProfile", $data);
		}
	}












	// ------------------------------------------USER API PAGES -------------------------------------------------------------
	public function FreeKundli()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);



		$this->load->view('User/FreeKundli');
	}

	public function showkundlidatas()
	{

		if (!$this->input->post('boy_name') || !$this->input->post('boy_day') || !$this->input->post('boy_month')) {
			redirect('User/FreeKundli');
		}

		$access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
		$api_key = "b49e81e874acc04f1141569767b24b79";


		$formdata = [
			'api_key' => $api_key,
			'full_name' => $this->input->post('boy_name'),
			'day' => (int) $this->input->post('boy_day'),
			'month' => (int) $this->input->post('boy_month'),
			'year' => (int) $this->input->post('boy_year'),
			'hour' => (int) $this->input->post('boy_hour'),
			'min' => (int) $this->input->post('boy_minute'),
			'sec' => (int) $this->input->post('boy_second'),
			'gender' => $this->input->post('boy_gender'),
			'place' => $this->input->post('boy_birthPlace'),
			'lat' => $this->input->post('boy_lat'),
			'lon' => $this->input->post('boy_lon'),
			'tzone' => 5.5,
			'lan' => $this->input->post('lan') ?? 'ma', // fallback if not provided
			'chart_type' => 'south',
			// 'show_planet_degree' => 1,
			'show_planet_retro' => 1,
			'dasha_type' => 'maha-dasha',
			'accesss_token' => $access_token
		];

		$data["formdata"] = $formdata;


		//Dasha




		// print_r($data["yogini_dasha_data"]);





		//Free Report 


		//Assedance Report


		$url_ascendant = 'https://astroapi-3.divineapi.com/indian-api/v2/ascendant-report';

		$ch_ascendant = curl_init($url_ascendant);
		curl_setopt($ch_ascendant, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_ascendant, CURLOPT_POST, true);
		curl_setopt($ch_ascendant, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_ascendant, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_ascendant = curl_exec($ch_ascendant);
		$error = curl_error($ch_ascendant);
		curl_close($ch_ascendant);
		$response_ascendant_data = json_decode($response_ascendant, associative: true);


		$data["ascendant_data"] = $response_ascendant_data;


		// print_r($data["ascendant_data"]);


		//Planetary Positions


		$url_planetary = 'https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions';

		$ch_planetary = curl_init($url_planetary);
		curl_setopt($ch_planetary, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_planetary, CURLOPT_POST, true);
		curl_setopt($ch_planetary, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_planetary, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_planetary = curl_exec($ch_planetary);
		$error = curl_error($ch_planetary);
		curl_close($ch_planetary);
		$response_planetary_data = json_decode($response_planetary, associative: true);


		$data["planetary_data"] = $response_planetary_data;




		$url_vimshottari = 'https://astroapi-3.divineapi.com/indian-api/v1/vimshottari-dasha';

		$ch_vimshottari = curl_init($url_vimshottari);
		curl_setopt($ch_vimshottari, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_vimshottari, CURLOPT_POST, true);
		curl_setopt($ch_vimshottari, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_vimshottari, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_vimshottari = curl_exec($ch_vimshottari);
		$error = curl_error($ch_vimshottari);
		curl_close($ch_vimshottari);
		$respons_vimshottari_data = json_decode($response_vimshottari, associative: true);


		$data["vimshottari_data"] = $respons_vimshottari_data;





		$url_shadbala = 'https://astroapi-3.divineapi.com/indian-api/v1/shadbala';

		$ch_shadbala = curl_init($url_shadbala);
		curl_setopt($ch_shadbala, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_shadbala, CURLOPT_POST, true);
		curl_setopt($ch_shadbala, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_shadbala, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_shadbala = curl_exec($ch_shadbala);
		$error = curl_error($ch_shadbala);
		curl_close($ch_shadbala);
		$respons_shadbala_data = json_decode($response_shadbala, associative: true);
		$data["shadbala_data"] = $respons_shadbala_data;


		// print_r($data["shadbala_data"]);




		$url_manglik = 'https://astroapi-3.divineapi.com/indian-api/v2/manglik-dosha';

		$ch_manglik = curl_init($url_manglik);
		curl_setopt($ch_manglik, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_manglik, CURLOPT_POST, true);
		curl_setopt($ch_manglik, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_manglik, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_manglik = curl_exec($ch_manglik);
		$error = curl_error($ch_manglik);
		curl_close($ch_manglik);
		$respons_manglik_data = json_decode($response_manglik, associative: true);
		$data["manglik_data"] = $respons_manglik_data;


		// print_r($data["manglik_data"]);




		$url_kal_sarpa = 'https://astroapi-3.divineapi.com/indian-api/v1/kaal-sarpa-yoga';

		$ch_kal_sarpa = curl_init($url_kal_sarpa);
		curl_setopt($ch_kal_sarpa, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_kal_sarpa, CURLOPT_POST, true);
		curl_setopt($ch_kal_sarpa, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_kal_sarpa, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_kal_sarpa = curl_exec($ch_kal_sarpa);
		$error = curl_error($ch_kal_sarpa);
		curl_close($ch_kal_sarpa);
		$respons_kal_sarpa_data = json_decode($response_kal_sarpa, associative: true);
		$data["kal_sarpa_data"] = $respons_kal_sarpa_data;


		// print_r($data["kal_sarpa_data"]);


		$url_sadhe_sati = 'https://astroapi-3.divineapi.com/indian-api/v2/sadhe-sati';

		$ch_url_sadhe_sati = curl_init($url_sadhe_sati);
		curl_setopt($ch_url_sadhe_sati, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_sadhe_sati, CURLOPT_POST, true);
		curl_setopt($ch_url_sadhe_sati, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_sadhe_sati, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_sadhe_sati = curl_exec($ch_url_sadhe_sati);
		$error = curl_error($ch_url_sadhe_sati);
		curl_close($ch_url_sadhe_sati);
		$response_sadhe_sati_data = json_decode($response_sadhe_sati, associative: true);
		$data["sadhe_sati_data"] = $response_sadhe_sati_data;





		$url_gemstone = 'https://astroapi-3.divineapi.com/indian-api/v2/gemstone-suggestion';

		$ch_url_gemstone = curl_init($url_gemstone);
		curl_setopt($ch_url_gemstone, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_gemstone, CURLOPT_POST, true);
		curl_setopt($ch_url_gemstone, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_gemstone, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_gemstone = curl_exec($ch_url_gemstone);
		$error = curl_error($ch_url_gemstone);
		curl_close($ch_url_gemstone);
		$response_gemstone_data = json_decode($response_gemstone, associative: true);
		$data["gemstone_data"] = $response_gemstone_data;





		$url_compositefriendship = 'https://astroapi-3.divineapi.com/indian-api/v1/composite-friendship';

		$ch_url_compositefriendship = curl_init($url_compositefriendship);
		curl_setopt($ch_url_compositefriendship, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_compositefriendship, CURLOPT_POST, true);
		curl_setopt($ch_url_compositefriendship, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_compositefriendship, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_compositefriendship = curl_exec($ch_url_compositefriendship);
		$error = curl_error($ch_url_compositefriendship);
		curl_close($ch_url_compositefriendship);
		$response_compositefriendship_data = json_decode($response_compositefriendship, associative: true);
		$data["compositefriendship_data"] = $response_compositefriendship_data;






		$url_yogini_dasha = 'https://astroapi-3.divineapi.com/indian-api/v2/yogini-dasha';

		$ch_url_yogini_dasha = curl_init($url_yogini_dasha);
		curl_setopt($ch_url_yogini_dasha, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_yogini_dasha, CURLOPT_POST, true);
		curl_setopt($ch_url_yogini_dasha, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_yogini_dasha, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_yogini_dasha = curl_exec($ch_url_yogini_dasha);
		$error = curl_error($ch_url_yogini_dasha);
		curl_close($ch_url_yogini_dasha);
		$response_yogini_dasha_data = json_decode($response_yogini_dasha, associative: true);
		$data["yogini_dasha_data"] = $response_yogini_dasha_data;






		$this->load->view('User/Show_dataof_kundli', $data);

	}

	public function showkundlidatas1()
	{

		if (!$this->input->post('boy_name') || !$this->input->post('boy_day') || !$this->input->post('boy_month')) {
			redirect('User/FreeKundli');
		}

		$access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
		$api_key = "b49e81e874acc04f1141569767b24b79";


		$formdata = [
			'api_key' => $api_key,
			'full_name' => $this->input->post('boy_name'),
			'day' => (int) $this->input->post('boy_day'),
			'month' => (int) $this->input->post('boy_month'),
			'year' => (int) $this->input->post('boy_year'),
			'hour' => (int) $this->input->post('boy_hour'),
			'min' => (int) $this->input->post('boy_minute'),
			'sec' => (int) $this->input->post('boy_second'),
			'gender' => $this->input->post('boy_gender'),
			'place' => $this->input->post('boy_birthPlace'),
			'lat' => $this->input->post('boy_lat'),
			'lon' => $this->input->post('boy_lon'),
			'tzone' => 5.5,
			'lan' => $this->input->post('lan') ?? 'ma', // fallback if not provided
			'chart_type' => 'south',
			// 'show_planet_degree' => 1,
			'show_planet_retro' => 1,
			'dasha_type' => 'maha-dasha'
		];

		$data["formdata"] = $formdata;


		$datanorth = [
			'api_key' => $api_key,
			'full_name' => $this->input->post('boy_name'),
			'day' => (int) $this->input->post('boy_day'),
			'month' => (int) $this->input->post('boy_month'),
			'year' => (int) $this->input->post('boy_year'),
			'hour' => (int) $this->input->post('boy_hour'),
			'min' => (int) $this->input->post('boy_minute'),
			'sec' => (int) $this->input->post('boy_second'),
			'gender' => $this->input->post('boy_gender'),
			'place' => $this->input->post('boy_birthPlace'),
			'lat' => $this->input->post('boy_lat'),
			'lon' => $this->input->post('boy_lon'),
			'tzone' => 5.5,
			'lan' => $this->input->post('lan') ?? 'ma',
			'chart_type' => 'north',
			// 'show_planet_degree' => 1,
			'show_planet_retro' => 1
		];



		//Basic Astrology details first tab

		$url_basic_astrologydetails = 'https://astroapi-3.divineapi.com/indian-api/v2/basic-astro-details';
		$ch_basic_astrology = curl_init($url_basic_astrologydetails);
		curl_setopt($ch_basic_astrology, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_basic_astrology, CURLOPT_POST, true);
		curl_setopt($ch_basic_astrology, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_basic_astrology, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_basic_astrology_detail = curl_exec($ch_basic_astrology);
		$error = curl_error($ch_basic_astrology);
		curl_close($ch_basic_astrology);


		$responsedata_basic_astrology_detail = json_decode($response_basic_astrology_detail, associative: true);

		$data["basicastrology"] = $responsedata_basic_astrology_detail;








		//North


		$url_birth_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D1';

		$ch_birth_north = curl_init($url_birth_horoscope_north);
		curl_setopt($ch_birth_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_birth_north, CURLOPT_POST, true);
		curl_setopt($ch_birth_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_birth_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_birth_north = curl_exec($ch_birth_north);
		$error = curl_error($ch_birth_north);
		curl_close($ch_birth_north);




		$responsehoroscopebirthdata_north = json_decode($responsehoro_scope_birth_north, associative: true);


		$data["birthchart_north"] = $responsehoroscopebirthdata_north;



		// print_r($data["birthchartnorth"]);
		// print_r($data["birthchart"]["data"]["base64_image"]);




		$url_navamsha_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D9';

		$ch_navamasha_north = curl_init($url_navamsha_north);
		curl_setopt($ch_navamasha_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_navamasha_north, CURLOPT_POST, true);
		curl_setopt($ch_navamasha_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_navamasha_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);
		$responsenavamshachatnorth = curl_exec($ch_navamasha_north);
		$error = curl_error($ch_navamasha_north);
		curl_close($ch_navamasha_north);
		$response_navamshachat_data_north = json_decode($responsenavamshachatnorth, associative: true);
		$data["Navamsha_north"] = $response_navamshachat_data_north;




		//Horoscope Data Birth Chat And Navamasa Chat Second Tab  South Data

		$url_horoscope_birth_chart_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D1';
		$ch_south_birth_chart = curl_init($url_horoscope_birth_chart_south);
		curl_setopt($ch_south_birth_chart, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_south_birth_chart, CURLOPT_POST, true);
		curl_setopt($ch_south_birth_chart, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_south_birth_chart, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_south_birth_chart = curl_exec($ch_south_birth_chart);
		$error = curl_error($ch_south_birth_chart);
		curl_close($ch_south_birth_chart);
		$response_south_birth_chart_data = json_decode($response_south_birth_chart, associative: true);
		$data["birthchart_south"] = $response_south_birth_chart_data;



		//South Namavasa Chart South
		$horoscope_namavasha_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D9';

		$ch_namavsha_south = curl_init($horoscope_namavasha_south);
		curl_setopt($ch_namavsha_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_namavsha_south, CURLOPT_POST, true);
		curl_setopt($ch_namavsha_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_namavsha_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_namvasa_chat_south = curl_exec($ch_namavsha_south);
		$error = curl_error($ch_namavsha_south);
		curl_close($ch_namavsha_south);

		$responsenavamshachatdata_south = json_decode($response_namvasa_chat_south, associative: true);


		$data["Navamsha_south"] = $responsenavamshachatdata_south;










		//North  Side data show


		$url_chalit_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/chalit';

		$ch_chalit_north = curl_init($url_chalit_horoscope_north);
		curl_setopt($ch_chalit_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_chalit_north, CURLOPT_POST, true);
		curl_setopt($ch_chalit_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_chalit_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_chalit_north = curl_exec($ch_chalit_north);
		$error = curl_error($ch_chalit_north);
		curl_close($ch_chalit_north);
		$responsehoro_scope_chalit_north_data = json_decode($responsehoro_scope_chalit_north, associative: true);


		$data["chalit_north"] = $responsehoro_scope_chalit_north_data;


		// print_r($data["chalit_north"] );


		// print_r($data["birthchartnorth"]);
		// print_r($data["birthchart"]["data"]["base64_image"]);


		$url_sun_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/SUN';

		$ch_sun_north = curl_init($url_sun_horoscope_north);
		curl_setopt($ch_sun_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_sun_north, CURLOPT_POST, true);
		curl_setopt($ch_sun_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_sun_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_sun_north = curl_exec($ch_sun_north);
		$error = curl_error($ch_sun_north);
		curl_close($ch_sun_north);
		$responsehoro_scope_sun_north_data = json_decode($responsehoro_scope_sun_north, associative: true);


		$data["sun_north"] = $responsehoro_scope_sun_north_data;






		$url_moon_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/MOON';

		$ch_moon_north = curl_init($url_moon_horoscope_north);
		curl_setopt($ch_moon_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_moon_north, CURLOPT_POST, true);
		curl_setopt($ch_moon_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_moon_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_moon_north = curl_exec($ch_moon_north);
		$error = curl_error($ch_moon_north);
		curl_close($ch_moon_north);
		$responsehoro_scope_moon_north_data = json_decode($responsehoro_scope_moon_north, associative: true);


		$data["moon_north"] = $responsehoro_scope_moon_north_data;






		$url_hora_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D2';

		$ch_hora_north = curl_init($url_hora_horoscope_north);
		curl_setopt($ch_hora_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_hora_north, CURLOPT_POST, true);
		curl_setopt($ch_hora_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_hora_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_hora_north = curl_exec($ch_hora_north);
		$error = curl_error($ch_hora_north);
		curl_close($ch_hora_north);
		$responsehoro_scope_hora_north_data = json_decode($responsehoro_scope_hora_north, associative: true);


		$data["hora_north"] = $responsehoro_scope_hora_north_data;







		$url_Dreshkan_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D3';

		$ch_dreshkan_north = curl_init($url_Dreshkan_horoscope_north);
		curl_setopt($ch_dreshkan_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_dreshkan_north, CURLOPT_POST, true);
		curl_setopt($ch_dreshkan_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_dreshkan_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_dreshkan_north = curl_exec($ch_dreshkan_north);
		$error = curl_error($ch_dreshkan_north);
		curl_close($ch_dreshkan_north);
		$responsehoro_scope_dreshkan_north_data = json_decode($responsehoro_scope_dreshkan_north, associative: true);


		$data["dreshkan_north"] = $responsehoro_scope_dreshkan_north_data;










		$url_Chathurthamasha_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D4';
		$ch_Chathurthamasha_north = curl_init($url_Chathurthamasha_horoscope_north);
		curl_setopt($ch_Chathurthamasha_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Chathurthamasha_north, CURLOPT_POST, true);
		curl_setopt($ch_Chathurthamasha_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_Chathurthamasha_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_Chathurthamasha_north = curl_exec($ch_Chathurthamasha_north);
		$error = curl_error($ch_Chathurthamasha_north);
		curl_close($ch_Chathurthamasha_north);
		$responsehoro_scope_Chathurthamasha_north_data = json_decode($responsehoro_scope_Chathurthamasha_north, associative: true);


		$data["Chathurthamasha_north"] = $responsehoro_scope_Chathurthamasha_north_data;






		$url_Saptamansha_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D7';

		$ch_Saptamansha_north = curl_init($url_Saptamansha_horoscope_north);
		curl_setopt($ch_Saptamansha_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Saptamansha_north, CURLOPT_POST, true);
		curl_setopt($ch_Saptamansha_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_Saptamansha_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_Saptamansha_north = curl_exec($ch_Saptamansha_north);
		$error = curl_error($ch_Saptamansha_north);
		curl_close($ch_Saptamansha_north);
		$responsehoro_scope_Saptamansha_north_data = json_decode($responsehoro_scope_Saptamansha_north, associative: true);


		$data["Saptamansha_north"] = $responsehoro_scope_Saptamansha_north_data;






		$url_cuspal_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/cuspal';

		$ch_cuspal_north = curl_init($url_cuspal_horoscope_north);
		curl_setopt($ch_cuspal_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_cuspal_north, CURLOPT_POST, true);
		curl_setopt($ch_cuspal_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_cuspal_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_cuspal_north = curl_exec($ch_cuspal_north);
		$error = curl_error($ch_cuspal_north);
		curl_close($ch_cuspal_north);
		$responsehoro_scope_cuspal_north_data = json_decode($responsehoro_scope_cuspal_north, associative: true);


		$data["cuspal_north"] = $responsehoro_scope_cuspal_north_data;





		$url_Bhamsha_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D27';

		$ch_Bhamsha_north = curl_init($url_Bhamsha_horoscope_north);
		curl_setopt($ch_Bhamsha_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Bhamsha_north, CURLOPT_POST, true);
		curl_setopt($ch_Bhamsha_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_Bhamsha_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_bhamsha_north = curl_exec($ch_Bhamsha_north);
		$error = curl_error($ch_Bhamsha_north);
		curl_close($ch_Bhamsha_north);
		$responsehoro_scope_bhamsha_north_data = json_decode($responsehoro_scope_bhamsha_north, associative: true);


		$data["bhamsha_north"] = $responsehoro_scope_bhamsha_north_data;




		$url_Shodashamsha_horoscope_north = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D16';

		$ch_Shodashamsha_north = curl_init($url_Shodashamsha_horoscope_north);
		curl_setopt($ch_Shodashamsha_north, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Shodashamsha_north, CURLOPT_POST, true);
		curl_setopt($ch_Shodashamsha_north, CURLOPT_POSTFIELDS, json_encode($datanorth));
		curl_setopt($ch_Shodashamsha_north, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_Shodashamsha_north = curl_exec($ch_Shodashamsha_north);
		$error = curl_error($ch_Shodashamsha_north);
		curl_close($ch_Shodashamsha_north);
		$responsehoro_scope_shodashamsha_north_data = json_decode($responsehoro_scope_Shodashamsha_north, associative: true);


		$data["shodashamsha_north"] = $responsehoro_scope_shodashamsha_north_data;








		//South  Side data show


		$url_chalit_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/chalit';

		$ch_chalit_south = curl_init($url_chalit_horoscope_south);
		curl_setopt($ch_chalit_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_chalit_south, CURLOPT_POST, true);
		curl_setopt($ch_chalit_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_chalit_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_chalit_south = curl_exec($ch_chalit_south);
		$error = curl_error($ch_chalit_south);
		curl_close($ch_chalit_south);
		$responsehoro_scope_chalit_south_data = json_decode($responsehoro_scope_chalit_south, associative: true);


		$data["chalit_south"] = $responsehoro_scope_chalit_south_data;


		// print_r($data["chalit_north"] );


		// print_r($data["birthchartnorth"]);
		// print_r($data["birthchart"]["data"]["base64_image"]);


		$url_sun_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/SUN';

		$ch_sun_south = curl_init($url_sun_horoscope_south);
		curl_setopt($ch_sun_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_sun_south, CURLOPT_POST, true);
		curl_setopt($ch_sun_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_sun_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_sun_south = curl_exec($ch_sun_south);
		$error = curl_error($ch_sun_south);
		curl_close($ch_sun_south);
		$responsehoro_scope_sun_south_data = json_decode($responsehoro_scope_sun_south, associative: true);


		$data["sun_south"] = $responsehoro_scope_sun_south_data;





		$url_moon_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/MOON';

		$ch_moon_south = curl_init($url_moon_horoscope_south);
		curl_setopt($ch_moon_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_moon_south, CURLOPT_POST, true);
		curl_setopt($ch_moon_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_moon_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_moon_south = curl_exec($ch_moon_south);
		$error = curl_error($ch_moon_south);
		curl_close($ch_moon_south);
		$responsehoro_scope_moon_south_data = json_decode($responsehoro_scope_moon_south, associative: true);


		$data["moon_south"] = $responsehoro_scope_moon_south_data;






		$url_hora_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D2';

		$ch_hora_south = curl_init($url_hora_horoscope_south);
		curl_setopt($ch_hora_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_hora_south, CURLOPT_POST, true);
		curl_setopt($ch_hora_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_hora_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_hora_south = curl_exec($ch_hora_south);
		$error = curl_error($ch_hora_south);
		curl_close($ch_hora_south);
		$responsehoro_scope_hora_south_data = json_decode($responsehoro_scope_hora_south, associative: true);


		$data["hora_south"] = $responsehoro_scope_hora_south_data;





		$url_Dreshkan_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D3';

		$ch_dreshkan_south = curl_init($url_Dreshkan_horoscope_south);
		curl_setopt($ch_dreshkan_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_dreshkan_south, CURLOPT_POST, true);
		curl_setopt($ch_dreshkan_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_dreshkan_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_dreshkan_south = curl_exec($ch_dreshkan_south);
		$error = curl_error($ch_dreshkan_south);
		curl_close($ch_dreshkan_south);
		$responsehoro_scope_dreshkan_south_data = json_decode($responsehoro_scope_dreshkan_south, associative: true);


		$data["dreshkan_south"] = $responsehoro_scope_dreshkan_south_data;










		$url_Chathurthamasha_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D4';
		$ch_Chathurthamasha_south = curl_init($url_Chathurthamasha_horoscope_south);
		curl_setopt($ch_Chathurthamasha_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Chathurthamasha_south, CURLOPT_POST, true);
		curl_setopt($ch_Chathurthamasha_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_Chathurthamasha_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_Chathurthamasha_south = curl_exec($ch_Chathurthamasha_south);
		$error = curl_error($ch_Chathurthamasha_south);
		curl_close($ch_Chathurthamasha_south);
		$responsehoro_scope_Chathurthamasha_south_data = json_decode($responsehoro_scope_Chathurthamasha_south, associative: true);


		$data["Chathurthamasha_south"] = $responsehoro_scope_Chathurthamasha_south_data;






		$url_Saptamansha_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D7';

		$ch_Saptamansha_south = curl_init($url_Saptamansha_horoscope_south);
		curl_setopt($ch_Saptamansha_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Saptamansha_south, CURLOPT_POST, true);
		curl_setopt($ch_Saptamansha_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_Saptamansha_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_Saptamansha_south = curl_exec($ch_Saptamansha_south);
		$error = curl_error($ch_Saptamansha_south);
		curl_close($ch_Saptamansha_south);
		$responsehoro_scope_Saptamansha_south_data = json_decode($responsehoro_scope_Saptamansha_south, associative: true);


		$data["Saptamansha_south"] = $responsehoro_scope_Saptamansha_south_data;






		$url_cuspal_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/cuspal';

		$ch_cuspal_south = curl_init($url_cuspal_horoscope_south);
		curl_setopt($ch_cuspal_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_cuspal_south, CURLOPT_POST, true);
		curl_setopt($ch_cuspal_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_cuspal_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_cuspal_south = curl_exec($ch_cuspal_south);
		$error = curl_error($ch_cuspal_south);
		curl_close($ch_cuspal_south);
		$responsehoro_scope_cuspal_south_data = json_decode($responsehoro_scope_cuspal_south, associative: true);


		$data["cuspal_south"] = $responsehoro_scope_cuspal_south_data;





		$url_Bhamsha_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D27';

		$ch_Bhamsha_south = curl_init($url_Bhamsha_horoscope_south);
		curl_setopt($ch_Bhamsha_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Bhamsha_south, CURLOPT_POST, true);
		curl_setopt($ch_Bhamsha_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_Bhamsha_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_bhamsha_south = curl_exec($ch_Bhamsha_south);
		$error = curl_error($ch_Bhamsha_south);
		curl_close($ch_Bhamsha_south);
		$responsehoro_scope_bhamsha_south_data = json_decode($responsehoro_scope_bhamsha_south, associative: true);


		$data["bhamsha_south"] = $responsehoro_scope_bhamsha_south_data;




		$url_Shodashamsha_horoscope_south = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D16';

		$ch_Shodashamsha_south = curl_init($url_Shodashamsha_horoscope_south);
		curl_setopt($ch_Shodashamsha_south, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_Shodashamsha_south, CURLOPT_POST, true);
		curl_setopt($ch_Shodashamsha_south, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_Shodashamsha_south, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$responsehoro_scope_Shodashamsha_south = curl_exec($ch_Shodashamsha_south);
		$error = curl_error($ch_Shodashamsha_south);
		curl_close($ch_Shodashamsha_south);
		$responsehoro_scope_shodashamsha_south_data = json_decode($responsehoro_scope_Shodashamsha_south, associative: true);


		$data["shodashamsha_south"] = $responsehoro_scope_shodashamsha_south_data;





		//Free Report 


		//Assedance Report


		$url_ascendant = 'https://astroapi-3.divineapi.com/indian-api/v2/ascendant-report';

		$ch_ascendant = curl_init($url_ascendant);
		curl_setopt($ch_ascendant, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_ascendant, CURLOPT_POST, true);
		curl_setopt($ch_ascendant, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_ascendant, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_ascendant = curl_exec($ch_ascendant);
		$error = curl_error($ch_ascendant);
		curl_close($ch_ascendant);
		$response_ascendant_data = json_decode($response_ascendant, associative: true);


		$data["ascendant_data"] = $response_ascendant_data;


		// print_r($data["ascendant_data"]);


		//Planetary Positions


		$url_planetary = 'https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions';

		$ch_planetary = curl_init($url_planetary);
		curl_setopt($ch_planetary, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_planetary, CURLOPT_POST, true);
		curl_setopt($ch_planetary, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_planetary, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_planetary = curl_exec($ch_planetary);
		$error = curl_error($ch_planetary);
		curl_close($ch_planetary);
		$response_planetary_data = json_decode($response_planetary, associative: true);


		$data["planetary_data"] = $response_planetary_data;




		$url_vimshottari = 'https://astroapi-3.divineapi.com/indian-api/v1/vimshottari-dasha';

		$ch_vimshottari = curl_init($url_vimshottari);
		curl_setopt($ch_vimshottari, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_vimshottari, CURLOPT_POST, true);
		curl_setopt($ch_vimshottari, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_vimshottari, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_vimshottari = curl_exec($ch_vimshottari);
		$error = curl_error($ch_vimshottari);
		curl_close($ch_vimshottari);
		$respons_vimshottari_data = json_decode($response_vimshottari, associative: true);


		$data["vimshottari_data"] = $respons_vimshottari_data;





		$url_shadbala = 'https://astroapi-3.divineapi.com/indian-api/v1/shadbala';

		$ch_shadbala = curl_init($url_shadbala);
		curl_setopt($ch_shadbala, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_shadbala, CURLOPT_POST, true);
		curl_setopt($ch_shadbala, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_shadbala, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_shadbala = curl_exec($ch_shadbala);
		$error = curl_error($ch_shadbala);
		curl_close($ch_shadbala);
		$respons_shadbala_data = json_decode($response_shadbala, associative: true);
		$data["shadbala_data"] = $respons_shadbala_data;




		$url_manglik = 'https://astroapi-3.divineapi.com/indian-api/v2/manglik-dosha';

		$ch_manglik = curl_init($url_manglik);
		curl_setopt($ch_manglik, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_manglik, CURLOPT_POST, true);
		curl_setopt($ch_manglik, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_manglik, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_manglik = curl_exec($ch_manglik);
		$error = curl_error($ch_manglik);
		curl_close($ch_manglik);
		$respons_manglik_data = json_decode($response_manglik, associative: true);
		$data["manglik_data"] = $respons_manglik_data;


		// print_r($data["manglik_data"]);




		$url_kal_sarpa = 'https://astroapi-3.divineapi.com/indian-api/v1/kaal-sarpa-yoga';

		$ch_kal_sarpa = curl_init($url_kal_sarpa);
		curl_setopt($ch_kal_sarpa, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_kal_sarpa, CURLOPT_POST, true);
		curl_setopt($ch_kal_sarpa, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_kal_sarpa, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_kal_sarpa = curl_exec($ch_kal_sarpa);
		$error = curl_error($ch_kal_sarpa);
		curl_close($ch_kal_sarpa);
		$respons_kal_sarpa_data = json_decode($response_kal_sarpa, associative: true);
		$data["kal_sarpa_data"] = $respons_kal_sarpa_data;


		// print_r($data["kal_sarpa_data"]);


		$url_sadhe_sati = 'https://astroapi-3.divineapi.com/indian-api/v2/sadhe-sati';

		$ch_url_sadhe_sati = curl_init($url_sadhe_sati);
		curl_setopt($ch_url_sadhe_sati, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_sadhe_sati, CURLOPT_POST, true);
		curl_setopt($ch_url_sadhe_sati, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_sadhe_sati, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_sadhe_sati = curl_exec($ch_url_sadhe_sati);
		$error = curl_error($ch_url_sadhe_sati);
		curl_close($ch_url_sadhe_sati);
		$response_sadhe_sati_data = json_decode($response_sadhe_sati, associative: true);
		$data["sadhe_sati_data"] = $response_sadhe_sati_data;





		$url_gemstone = 'https://astroapi-3.divineapi.com/indian-api/v2/gemstone-suggestion';

		$ch_url_gemstone = curl_init($url_gemstone);
		curl_setopt($ch_url_gemstone, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_gemstone, CURLOPT_POST, true);
		curl_setopt($ch_url_gemstone, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_gemstone, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_gemstone = curl_exec($ch_url_gemstone);
		$error = curl_error($ch_url_gemstone);
		curl_close($ch_url_gemstone);
		$response_gemstone_data = json_decode($response_gemstone, associative: true);
		$data["gemstone_data"] = $response_gemstone_data;





		$url_compositefriendship = 'https://astroapi-3.divineapi.com/indian-api/v1/composite-friendship';

		$ch_url_compositefriendship = curl_init($url_compositefriendship);
		curl_setopt($ch_url_compositefriendship, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_compositefriendship, CURLOPT_POST, true);
		curl_setopt($ch_url_compositefriendship, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_compositefriendship, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_compositefriendship = curl_exec($ch_url_compositefriendship);
		$error = curl_error($ch_url_compositefriendship);
		curl_close($ch_url_compositefriendship);
		$response_compositefriendship_data = json_decode($response_compositefriendship, associative: true);
		$data["compositefriendship_data"] = $response_compositefriendship_data;






		//Dasha


		$url_yogini_dasha = 'https://astroapi-3.divineapi.com/indian-api/v2/yogini-dasha';

		$ch_url_yogini_dasha = curl_init($url_yogini_dasha);
		curl_setopt($ch_url_yogini_dasha, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_yogini_dasha, CURLOPT_POST, true);
		curl_setopt($ch_url_yogini_dasha, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_yogini_dasha, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_yogini_dasha = curl_exec($ch_url_yogini_dasha);
		$error = curl_error($ch_url_yogini_dasha);
		curl_close($ch_url_yogini_dasha);
		$response_yogini_dasha_data = json_decode($response_yogini_dasha, associative: true);
		$data["yogini_dasha_data"] = $response_yogini_dasha_data;


		// print_r($data["yogini_dasha_data"]);





		//KP


		$url_kp = 'https://astroapi-3.divineapi.com/indian-api/v2/kp/cuspal';

		$ch_url_kp = curl_init($url_kp);
		curl_setopt($ch_url_kp, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_kp, CURLOPT_POST, true);
		curl_setopt($ch_url_kp, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_kp, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_kp = curl_exec($ch_url_kp);
		$error = curl_error($ch_url_kp);
		curl_close($ch_url_kp);
		$response_kp_data = json_decode($response_kp, associative: true);
		$data["kp_data"] = $response_kp_data;






		$this->load->view('User/Show_dataof_kundli', $data);
	}




	public function showkundlidata()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);



		if (!$this->input->post('boy_name') || !$this->input->post('boy_day') || !$this->input->post('boy_month') || !$this->input->post('boy_minute') || !$this->input->post('boy_second') || !$this->input->post('boy_birthPlace') || !$this->input->post('boy_lat') || !$this->input->post('boy_lon')) {
			redirect('User/FreeKundli');
		}

		$access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
		$api_key = "b49e81e874acc04f1141569767b24b79";


		$formdata = [
			'api_key' => $api_key,
			'full_name' => $this->input->post('boy_name'),
			'day' => (int) $this->input->post('boy_day'),
			'month' => (int) $this->input->post('boy_month'),
			'year' => (int) $this->input->post('boy_year'),
			'hour' => (int) $this->input->post('boy_hour'),
			'min' => (int) $this->input->post('boy_minute'),
			'sec' => (int) $this->input->post('boy_second'),
			'gender' => $this->input->post('boy_gender'),
			'place' => $this->input->post('boy_birthPlace'),
			'lat' => $this->input->post('boy_lat'),
			'lon' => $this->input->post('boy_lon'),
			'tzone' => 5.5,
			'lan' => $this->input->post('lan') ?? 'en', // fallback if not provided
			'chart_type' => 'south',
			// 'show_planet_degree' => 1,
			'show_planet_retro' => 1,
			'dasha_type' => 'maha-dasha'
		];

		$data["formdata"] = $formdata;




		$url_basic_astrologydetails = 'https://astroapi-3.divineapi.com/indian-api/v2/basic-astro-details';
		$ch_basic_astrology = curl_init($url_basic_astrologydetails);
		curl_setopt($ch_basic_astrology, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_basic_astrology, CURLOPT_POST, true);
		curl_setopt($ch_basic_astrology, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_basic_astrology, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_basic_astrology_detail = curl_exec($ch_basic_astrology);
		$error = curl_error($ch_basic_astrology);
		curl_close($ch_basic_astrology);


		$responsedata_basic_astrology_detail = json_decode($response_basic_astrology_detail, associative: true);

		$data["basicastrology"] = $responsedata_basic_astrology_detail;


         if ($data["basicastrology"]["success"] != 1 || empty($data["basicastrology"])) {

			$this->session->set_flashdata('serverwarning', 'Server is busy');
			redirect('User/FreeKundli');
			return;
		}


		$url_gemstone = 'https://astroapi-3.divineapi.com/indian-api/v2/gemstone-suggestion';

		$ch_url_gemstone = curl_init($url_gemstone);
		curl_setopt($ch_url_gemstone, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_url_gemstone, CURLOPT_POST, true);
		curl_setopt($ch_url_gemstone, CURLOPT_POSTFIELDS, json_encode($formdata));
		curl_setopt($ch_url_gemstone, CURLOPT_HTTPHEADER, [
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json'
		]);

		$response_gemstone = curl_exec($ch_url_gemstone);
		$error = curl_error($ch_url_gemstone);
		curl_close($ch_url_gemstone);
		$response_gemstone_data = json_decode($response_gemstone, associative: true);
		$data["gemstone_data"] = $response_gemstone_data;



		if ($data["gemstone_data"]["success"] != 1 || empty($data["gemstone_data"])) {

			$this->session->set_flashdata('serverwarning', 'Server is busy');
			redirect('User/FreeKundli');
			return;
		}


		$this->load->view('User/Data_Of_kundli_View', $data);
	}



	public function KundliMatching()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/KundliMatching');
	}
	public function Panchang()
	{
		// Load language settings
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);



		// Get today's date
		$year = date('Y');
		$month = date('m');
		$date = date('d');
		$hours = date('H');
		$minutes = date('i');
		$seconds = date('s');

		// Example default location (Hyderabad, India)
		$latitude = 17.3850;
		$longitude = 78.4867;
		$timezone = 5.5; // Adjust based on user location if available

		// Prepare the request payload
		$postData = json_encode([
			"year" => (int) $year,
			"month" => (int) $month,
			"date" => (int) $date,
			"hours" => (int) $hours,
			"minutes" => (int) $minutes,
			"seconds" => (int) $seconds,
			"latitude" => $latitude,
			"longitude" => $longitude,
			"timezone" => $timezone,
			"config" => [
				"observation_point" => "topocentric",
				"ayanamsha" => "lahiri"
			]
		]);

		// Initialize cURL
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => 'https://json.freeastrologyapi.com/tithi-durations',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $postData,
			CURLOPT_HTTPHEADER => [
				'Content-Type: application/json',
				'x-api-key: HqMEQxu52q4NMzuNyvfk69of6uDPCGQK3rlqaY5V'
			],
		]);


		$response = curl_exec($curl);
		curl_close($curl);

		// Decode JSON response into an array
		$titiData = json_decode($response, true);

		// Pass data to the view



		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => 'https://json.freeastrologyapi.com/nakshatra-durations',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $postData,
			CURLOPT_HTTPHEADER => [
				'Content-Type: application/json',
				'x-api-key: HqMEQxu52q4NMzuNyvfk69of6uDPCGQK3rlqaY5V'
			],
		]);
		$response = curl_exec($curl);

		curl_close($curl);



		$nakshatraData = json_decode($response, true);


		$data = [
			'titiData' => $titiData,
			'nakshatraData' => $nakshatraData
		];


		$this->load->view('User/Panchang', $data);
	}

	public function KP()
	{



		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$this->load->view('User/KP');
	}




	//------------------------------------------USER FESTIVAL PAGES---------------------------------------------------------

	public function Festival()
	{


		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);




		$ch_url_fest = base_url("User_Api_Controller/show_today_festivals");

		$ch_fest = curl_init();
		curl_setopt($ch_fest, CURLOPT_URL, $ch_url_fest);
		curl_setopt($ch_fest, CURLOPT_RETURNTRANSFER, true);
		$today_festivals_response = curl_exec($ch_fest);
		$curl_error_today_festivals = curl_error($ch_fest);
		curl_close($ch_fest);

		if ($today_festivals_response === false) {
			show_error("cURL Error: " . $curl_error_today_festivals, 500);
			return;
		}

		$festivals_data = json_decode($today_festivals_response, associative: true);


		$data["today_festivals_response"] = "";
		if ($festivals_data["status"] == "success") {
			$data["today_festivals_response"] = $festivals_data["data"];
		}



		$ch_url = base_url("User_Api_Controller/show_festivals");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ch_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$festivals_response = curl_exec($ch);
		$curl_error_festivals = curl_error($ch);
		curl_close($ch);

		if ($festivals_response === false) {
			show_error("cURL Error: " . $curl_error_festivals, 500);
			return;
		}

		$festivals_data = json_decode($festivals_response, associative: true);


		$data["festivals_data"] = "";
		if ($festivals_data["status"] == "success") {
			$data["festivals_data"] = $festivals_data["data"];
		}



		$this->load->view('User/Festival', $data);
	}


	public function FestivalReadmore($festival_id)
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		if (!$festival_id) {
			show_error("User ID is required", 400);
			return;
		}

		$ch_url = base_url("User_Api_Controller/show_specific_festival");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ch_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["festival_id" => $festival_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$festivals_response = curl_exec($ch);
		$curl_error_festivals = curl_error($ch);
		curl_close($ch);

		if ($festivals_response === false) {
			show_error("cURL Error: " . $curl_error_festivals, 500);
			return;
		}

		$festivals_data = json_decode($festivals_response, associative: true);


		$data["festivals_data"] = "";
		if ($festivals_data["status"] == "success") {
			$data["festivals_data"] = $festivals_data["data"];
		}



		$this->load->view('User/FestivalReadmore', $data);
	}





	//------------------------------------------JYOTISIKA MALL---------------------------------------------------------------------------
	public function JyotisikaMall()
	{


		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);


		$api_url = base_url("User_Api_Controller/show_category");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$getcategory = curl_exec($ch);
		$curl_error_ch = curl_error($ch);
		curl_close($ch);

		if ($getcategory === false) {
			show_error("cURL Error: " . $curl_error_ch, 500);
			return;
		}

		$getcategory_data = json_decode($getcategory, associative: true);



		$data["getcategory_data"] = "";
		if ($getcategory_data["status"] == "success") {
			$data["getcategory_data"] = $getcategory_data["data"];
		}


		// print_r($data["getcategory_data"]);

		$api_url_rudraksh = base_url("User_Api_Controller/show_rudraksh");
		$ch_rudraksh_data = curl_init();
		curl_setopt($ch_rudraksh_data, CURLOPT_URL, $api_url_rudraksh);
		curl_setopt($ch_rudraksh_data, CURLOPT_RETURNTRANSFER, true);
		$rudraksh_data_data = curl_exec($ch_rudraksh_data);
		$curl_error_rudraksh_data = curl_error($ch_rudraksh_data);
		curl_close($ch_rudraksh_data);

		if ($rudraksh_data_data === false) {
			show_error("cURL Error: " . $curl_error_rudraksh_data, 500);
			return;
		}

		$rudraksh_data_ = json_decode($rudraksh_data_data, associative: true);



		$data["rudraksh_data_"] = "";
		if ($rudraksh_data_["status"] == "success") {
			$data["rudraksh_data_"] = $rudraksh_data_["data"];
		}









		$api_url_energy_stone = base_url("User_Api_Controller/show_energy_stones");
		$ch_energy_stone = curl_init();
		curl_setopt($ch_energy_stone, CURLOPT_URL, $api_url_energy_stone);
		curl_setopt($ch_energy_stone, CURLOPT_RETURNTRANSFER, true);
		$energy_stone_data = curl_exec($ch_energy_stone);
		$curl_error_energy_stone = curl_error($ch_energy_stone);
		curl_close($ch_energy_stone);

		if ($energy_stone_data === false) {
			show_error("cURL Error: " . $curl_error_energy_stone, 500);
			return;
		}

		$energy_stone_product_data = json_decode($energy_stone_data, associative: true);



		$data["energy_stone"] = "";
		if ($energy_stone_product_data["status"] == "success") {
			$data["energy_stone"] = $energy_stone_product_data["data"];
		}


		$ch_url_feedback = base_url("User_Api_Controller/show_product_feedback_data");

		$ch_feedback = curl_init();
		curl_setopt($ch_feedback, CURLOPT_URL, $ch_url_feedback);
		curl_setopt($ch_feedback, CURLOPT_RETURNTRANSFER, true);
		$feedback_response = curl_exec($ch_feedback);
		$feedback_error = curl_error($ch_feedback);
		curl_close($ch_feedback);

		if ($feedback_response === false) {
			show_error("cURL Error: " . $feedback_error, 500);
			return;
		}

		$feedback_data = json_decode($feedback_response, associative: true);


		$data["product_feedback"] = "";
		if ($feedback_data["status"] == "success") {
			$data["product_feedback"] = $feedback_data["data"];
		}

		// print_r($data["product_feedback"]);




		// print_r($data["energy_stone"]);


		$ch_url_product = base_url("User_Api_Controller/Get_top_products");

		$ch_data_product = curl_init();
		curl_setopt($ch_data_product, CURLOPT_URL, $ch_url_product);
		curl_setopt($ch_data_product, CURLOPT_RETURNTRANSFER, true);
		$ch_data_product_response = curl_exec($ch_data_product);
		$ch_data_product_error = curl_error($ch_data_product);
		curl_close($ch_data_product);

		if ($ch_data_product_response === false) {
			show_error("cURL Error: " . $ch_data_product_error, 500);
			return;
		}



		$product_data = json_decode($ch_data_product_response, associative: true);



		$data["productdata"] = "";
		if ($product_data["status"] == "success") {
			$data["productdata"] = $product_data["data"];
			if ($data["productdata"][0]["product_id"] == "") {
				$data["productdata"] = "";
			}
		}

		// print_r($data["productdata"]);




		$this->load->view('User/JyotisikaMall', $data);
	}


	public function ProductDetails($product_id)
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$api_url = base_url("User_Api_Controller/get_specific_product");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["product_id" => $product_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$product_response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_error = curl_error($ch);
		curl_close($ch);


		if ($product_response === false) {
			show_error("cURL Error: " . $curl_error, 500);
			return;
		}

		$productdetails = json_decode($product_response, true);

		$data["product_data"] = "";
		if ($productdetails["status"] == "success") {

			$data["product_data"] = $productdetails["data"];
		}



		// $api_url = "http://localhost/Astrology/User_Api_Controller/VerifyProductInTheCart";

		$api_urll = base_url("User_Api_Controller/VerifyProductInTheCart");


		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => $api_urll,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => http_build_query(["product_id" => $product_id, "session_id" => $this->session->userdata("user_id")]),
			CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"]
		]);

		$responsesve = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$curlError = curl_error($curl);

		curl_close($curl);

		$data["productverify"] = [];

		if ($curlError) {
			log_message('error', "cURL error: " . $curlError);
		} else {
			$decodedResponsev = json_decode($responsesve, true);

			if ($httpCode === 200 && isset($decodedResponsev["data"])) {
				$data["productverify"] = $decodedResponsev["data"];
			} else {

				log_message('error', "Failed to fetch product: " . $responsesve);
			}
		}


		//Product feedback
		$api_url_product = base_url("User_Api_Controller/show_product_feedback");

		$ch_product_feedback = curl_init();
		curl_setopt($ch_product_feedback, CURLOPT_URL, $api_url_product);
		curl_setopt($ch_product_feedback, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch_product_feedback, CURLOPT_POST, 1);
		curl_setopt($ch_product_feedback, CURLOPT_POSTFIELDS, http_build_query(["product_id" => $product_id]));
		curl_setopt($ch_product_feedback, CURLOPT_TIMEOUT, 10);

		$product_feedback_response = curl_exec($ch_product_feedback);
		$http_feedback_code = curl_getinfo($ch_product_feedback, CURLINFO_HTTP_CODE);
		$curl_feedback_error = curl_error($ch_product_feedback);
		curl_close($ch_product_feedback);


		if ($product_feedback_response === false) {
			show_error("cURL Error: " . $curl_feedback_error, 500);
			return;
		}

		$product_feedback_details = json_decode($product_feedback_response, true);

		$data["product_feedback_data"] = "";
		if ($product_feedback_details["status"] == "success") {

			$data["product_feedback_data"] = $product_feedback_details["data"];
		}


		// avg Product rating
		$api_url_product_rating = base_url("User_Api_Controller/get_avg_rating_of_product");

		$ch_product_avg_rating = curl_init();
		curl_setopt($ch_product_avg_rating, CURLOPT_URL, $api_url_product_rating);
		curl_setopt($ch_product_avg_rating, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch_product_avg_rating, CURLOPT_POST, 1);
		curl_setopt($ch_product_avg_rating, CURLOPT_POSTFIELDS, http_build_query(["product_id" => $product_id]));
		curl_setopt($ch_product_avg_rating, CURLOPT_TIMEOUT, 10);

		$ch_product_avg_rating_response = curl_exec($ch_product_avg_rating);
		$http_product_avg_code = curl_getinfo($ch_product_avg_rating, CURLINFO_HTTP_CODE);
		$curl_product_avg_error = curl_error($ch_product_avg_rating);
		curl_close($ch_product_avg_rating);


		if ($ch_product_avg_rating_response === false) {
			show_error("cURL Error: " . $curl_product_avg_error, 500);
			return;
		}

		$ch_product_avg_rating_response_data = json_decode($ch_product_avg_rating_response, true);

		$data["product_rating_data"] = "";
		if ($ch_product_avg_rating_response_data["status"] == "success") {

			$data["product_rating_data"] = $ch_product_avg_rating_response_data["data"];
		}






		$this->load->view('User/ProductDetails', $data);
	}

	public function Cart()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		if (!$this->session->userdata("user_id")) {
			redirect('home');
		}
		// $api_url = "http://localhost/Astrology/User_Api_Controller/GetCartData";

		$api_url = base_url("User_Api_Controller/GetCartData");


		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => $api_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => http_build_query(["session_id" => $this->session->userdata("user_id")]),
			CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"]
		]);

		$responsesve = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$curlError = curl_error($curl);

		curl_close($curl);

		$data["productdata"] = [];

		if ($curlError) {
			log_message('error', "cURL error: " . $curlError);
		} else {
			$decoded = json_decode($responsesve, true);

			if ($httpCode === 200 && isset($decoded["data"])) {
				$data["productdata"] = $decoded["data"];
			} else {

				log_message('error', "Failed to fetch product: " . $responsesve);
			}
		}

		// print_r($data["productdata"] );


		$this->load->view("User/Cart", $data);
	}
	public function ProductPayment()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		if (!$this->session->userdata("user_id")) {
			redirect('home');
		}

		$api_url = base_url("User_Api_Controller/get_delivery_address");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["session_id" => $this->session->userdata("user_id")]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$product_response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_error = curl_error($ch);
		curl_close($ch);


		if ($product_response === false) {
			show_error("cURL Error: " . $curl_error, 500);
			return;
		}

		$productdetails = json_decode($product_response, true);

		$data["userdeliveryaddress"] = "";
		if ($productdetails["status"] == "success") {
			$data["userdeliveryaddress"] = $productdetails["data"];
		}


		// $api_url = "http://localhost/Astrology/User_Api_Controller/GetCartData";

		$api_url = base_url("User_Api_Controller/GetCartData");


		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => $api_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => http_build_query(["session_id" => $this->session->userdata("user_id")]),
			CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"]
		]);

		$responsesve = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$curlError = curl_error($curl);

		curl_close($curl);

		$data["productdata"] = [];

		if ($curlError) {
			log_message('error', "cURL error: " . $curlError);
		} else {
			$decoded = json_decode($responsesve, true);

			if ($httpCode === 200 && isset($decoded["data"])) {
				$data["productdata"] = $decoded["data"];
			} else {

				log_message('error', "Failed to fetch product: " . $responsesve);
			}
		}


		$this->load->view('User/ProductPayment', $data);
	}


	public function save_address()
	{

		$formdata = [
			"user_fullname" => $this->input->post("user_fullname"),
			"user_phonenumber" => $this->input->post("user_phonenumber"),
			"user_email" => $this->input->post("user_email"),
			"user_Address" => $this->input->post("user_Address"),
			"user_city" => $this->input->post("user_city"),
			"user_state" => $this->input->post("user_state"),
			"user_pincode" => $this->input->post("user_pincode"),
			"session_id" => $this->input->post("session_id") // Ensure it's an integer
		];

		$api_url = base_url("User_Api_Controller/save_delivery_address");
		// $api_url = "http://localhost/Astrology/User_Api_Controller/save_delivery_address";




		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formdata));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'Content-Type: application/x-www-form-urlencoded'
		]);


		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			echo json_encode(["status" => "error", "message" => "cURL Error: " . curl_error($ch)]);
		} else {

			$result = json_decode($response, true);


			echo json_encode($result);
		}


		curl_close($ch);

		redirect(base_url("ProductPayment"));
	}









	//-------------------------------- HOROSCOPE PAGES ------------------------------------------------------------------
	public function TodayHoroscope()
	{



		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);




		$this->load->view('User/TodayHoroscope');
	}

	public function getrashidatatime()
	{
		header('Content-Type: application/json');

		// Get the JSON request body
		$input = json_decode(file_get_contents('php://input'), true);

		if (!isset($input['sign']) || !isset($input['type'])) {
			echo json_encode(["status" => 400, "success" => false, "message" => "Invalid request"]);
			return;
		}

		$sign = $input['sign'];
		$type = $input['type'];

		// Set API URL based on type
		if ($type === "today") {
			$apiUrl = "https://horoscope-app-api.vercel.app/api/v1/get-horoscope/daily?sign={$sign}&day=TODAY";
		} else {
			$apiUrl = "https://horoscope-app-api.vercel.app/api/v1/get-horoscope/{$type}?sign={$sign}";
		}

		// Fetch data from the external API
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $apiUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);

		// Send the response back to the frontend
		echo $response;
		exit();
	}


	public function getrashidata()
	{
		$signs = [
			"Aries",
			"Taurus",
			"Gemini",
			"Cancer",
			"Leo",
			"Virgo",
			"Libra",
			"Scorpio",
			"Sagittarius",
			"Capricorn",
			"Aquarius",
			"Pisces"
		];

		$results = [];

		foreach ($signs as $sign) {
			$api_url = "https://horoscope-app-api.vercel.app/api/v1/get-horoscope/daily?sign=" . urlencode($sign) . "&day=TODAY";

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $api_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($ch);

			if ($response !== false) {
				$results[$sign] = json_decode($response, true);
			} else {
				$results[$sign] = ["error" => "Failed to fetch data"];
			}

			curl_close($ch);
		}


		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode(["success" => true, "status" => 200, "data" => $results]));
	}

	// 	public function HoroscopeReadmore()
	// {
	//     // API URL
	//     $api_url = "https://horoscope-app-api.vercel.app/api/v1/get-horoscope/daily?sign=Taurus&day=TODAY";

	//     // Initialize cURL session
	//     $ch = curl_init();

	//     // Set cURL options
	//     curl_setopt($ch, CURLOPT_URL, $api_url);
	//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	//     // Execute cURL session and store response
	//     $response = curl_exec($ch);

	//     // Close cURL session
	//     curl_close($ch);

	//     // Decode JSON response
	//     $data['horoscope'] = json_decode($response, true);

	//     // Load view and pass API response data
	//     $this->load->view('User/HoroscopeReadmore', $data);
	// }

	// Default to Taurus if no sign is provided
	// public function HoroscopeReadmore($sign)
	// {

	// 	$language = $this->session->userdata('site_language') ?? 'english';


	// 	$this->lang->load('message', $language);

	// 	$api_url = "https://horoscope-app-api.vercel.app/api/v1/get-horoscope/daily?sign=$sign&day=TODAY";


	// 	$ch = curl_init();


	// 	curl_setopt($ch, CURLOPT_URL, $api_url);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


	// 	$response = curl_exec($ch);

	// 	curl_close($ch);


	// 	$decoded_response = json_decode($response, true);


	// 	$data['horoscope'] = json_decode($response, true);

	// 	$data["sign"] = $sign;

	// 	$this->load->view('User/HoroscopeReadmore', $data);
	// }


	public function HoroscopeReadmore($sign)
	{

		$language = $this->session->userdata('site_language') ?? 'english';


		$this->lang->load('message', $language);

		$api_url = base_url("User_Api_Controller/horoscopereadmoredata");


		$ch = curl_init();


		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


		$response = curl_exec($ch);

		curl_close($ch);


		$decoded_response = json_decode($response, true);


		// $data['horoscope'] = json_decode($response, true);

		$data["sign"] = $sign;

		$this->load->view('User/HoroscopeReadmore', $data);
	}




	public function HoroscopeReadmores($sign = "Taurus")
	{

		$language = $this->session->userdata('site_language') ?? 'english';


		$this->lang->load('message', $language);
		$api_url = "https://horoscope-app-api.vercel.app/api/v1/get-horoscope/daily?sign=$sign&day=TODAY";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		$decoded_response = json_decode($response, true);


		header('Content-Type: application/json');
		echo json_encode($decoded_response);
	}






	//----------------------------------ASTROLOGERS PAGES ---------------------------------------------------------


	public function Astrologers()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);


		$api_url = base_url("User_Api_Controller/getastrologer");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		$curl_error = curl_error($ch);
		curl_close($ch);

		if ($response === false) {
			show_error("cURL Error: " . $curl_error, 500);
			return;
		}

		$astrologer_data = json_decode($response, associative: true);
		$data["astrologerdata"] = "";

		if ($astrologer_data["status"] == "success") {

			$data["astrologerdata"] = $astrologer_data["data"];
		} else {
			$data["astrologerdata"] = "";
		}

		$user_id = $this->session->userdata('user_id');
		if ($user_id) {
			$getdata["userinfo"] = $this->get_userdata($user_id);
			$data["userinfo_data"] = "";

			if (!$getdata["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "usernotfound") {
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "userfound") {
				redirect("UserLoginSignup/Logout");
			}

			$data["userinfo_data"] = $getdata["userinfo"];
		}





		$this->load->view('User/Astrologers', $data);
	}


	public function ViewAstrologer($astrologer_id)
	{
		$language = $this->session->userdata('site_language') ?? 'english';


		$this->lang->load('message', $language);



		if (!$astrologer_id) {
			show_error("User ID is required", 400);
			return;
		}

		//Get astrolger by id
		$api_url = base_url("User_Api_Controller/get_astrologer_by_id");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["astrologer_id" => $astrologer_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error = curl_error($ch);
		$response = curl_exec($ch);

		curl_close($ch);

		if ($response === false) {
			show_error("cURL Error: " . $curl_error, 500);
			return;
		}




		$data["followstatus"] = "unfollowed";
		if ($this->session->userdata("user_id")) {


			//Api for to check follow status
			$api_url_follow = base_url("User_Api_Controller/checkfollow_status");

			$checkfollow = curl_init();
			curl_setopt($checkfollow, CURLOPT_URL, $api_url_follow);
			curl_setopt($checkfollow, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($checkfollow, CURLOPT_POST, 1);
			curl_setopt($checkfollow, CURLOPT_POSTFIELDS, http_build_query(["astrologer_id" => $astrologer_id, "session_id" => $this->session->userdata("user_id")]));
			curl_setopt($checkfollow, CURLOPT_TIMEOUT, 10);
			$curl_error_follow = curl_error($checkfollow);
			$checkfollowstatus = curl_exec($checkfollow);

			curl_close($checkfollow);

			if ($checkfollowstatus === false) {
				show_error("cURL Error: " . $curl_error_follow, 500);
				return;
			}



			$checkfollowstatusresponse = json_decode($checkfollowstatus, associative: true);

			if ($checkfollowstatusresponse["status"] == "success") {
				$data["followstatus"] = $checkfollowstatusresponse["value"];
			}
		}



		//Api to  fetch feedback and 


		$api_url_rating = base_url("User_Api_Controller/getastrologerfeedback");

		$rating = curl_init();
		curl_setopt($rating, CURLOPT_URL, $api_url_rating);
		curl_setopt($rating, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($rating, CURLOPT_POST, 1);
		curl_setopt($rating, CURLOPT_POSTFIELDS, http_build_query(["astrologer_id" => $astrologer_id]));
		curl_setopt($rating, CURLOPT_TIMEOUT, 10);
		$rating_error = curl_error($rating);
		$rating_response = curl_exec($rating);


		$rating_response_data = json_decode($rating_response, associative: true);



		$data["feedback"] = "";
		// print_r($rating_response_data);
		if ($rating_response_data["status"] == "success") {
			$data["feedback"] = $rating_response_data["data"];
		} else {
			$data["feedback"] = "";
		}

		// print_r($data["feedback"]);


		//Api To get avg rating of atrologer

		$api_url_avgrating = base_url("User_Api_Controller/get_avg_rating");
		$avgrating = curl_init();
		curl_setopt($avgrating, CURLOPT_URL, $api_url_avgrating);
		curl_setopt($avgrating, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($avgrating, CURLOPT_POST, 1);
		curl_setopt($avgrating, CURLOPT_POSTFIELDS, http_build_query(["astrologer_id" => $astrologer_id]));
		curl_setopt($avgrating, CURLOPT_TIMEOUT, 10);
		$avgrating_error = curl_error($avgrating);
		$rating_response = curl_exec($avgrating);


		$rating_response_data = json_decode($rating_response, associative: true);


		$data["rating"] = "";
		// print_r($rating_response_data);
		if ($rating_response_data["status"] == "success") {
			$data["rating"] = $rating_response_data["data"];
		} else {
			$data["rating"] = "";
		}

		// print_r($data["rating"]);


		$astrologer_data = json_decode($response, associative: true);
		$data["astrologerdata"] = "";

		if ($astrologer_data["status"] == "success") {

			$data["astrologerdata"] = $astrologer_data["data"];
		} else {
			$data["astrologerdata"] = "";
		}

		// print_r($data["astrologerdata"]);

		if ($data["astrologerdata"][0]['id'] == '') {
			redirect('home');
		}


		$user_id = $this->session->userdata('user_id');
		if ($user_id) {
			$getdata["userinfo"] = $this->get_userdata($user_id);
			$data["userinfo_data"] = "";

			if (!$getdata["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "usernotfound") {
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "userfound") {
				redirect("UserLoginSignup/Logout");
			}

			$data["userinfo_data"] = $getdata["userinfo"];
		}







		$this->load->view('User/ViewAstrologer', $data);
	}

	public function AstrologyServices()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);


		$ch_url = base_url("User_Api_Controller/showallservices");

		$ch_service = curl_init();
		curl_setopt($ch_service, CURLOPT_URL, $ch_url);
		curl_setopt($ch_service, CURLOPT_RETURNTRANSFER, true);
		$service_response = curl_exec($ch_service);
		$curl_error_service = curl_error($ch_service);
		curl_close($ch_service);

		if ($service_response === false) {
			show_error("cURL Error: " . $curl_error_service, 500);
			return;
		}

		$service_data = json_decode($service_response, associative: true);


		$data["service_data"] = "";
		if ($service_data["status"] == "success") {
			$data["service_data"] = $service_data["data"];
		}



		$this->load->view('User/AstrologyServices', $data);
	}

	public function Following()
	{

		$user_id = $this->session->userdata('user_id');

		if ($user_id == '') {
			redirect('home');
		}


		$api_url = base_url("User_Api_Controller/getfollowed_astrologer_by_user");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["session_id" => $this->session->userdata("user_id")]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error_follow = curl_error($ch);
		$astrologers = curl_exec($ch);

		curl_close($ch);

		if ($astrologers === false) {
			show_error("cURL Error: " . $curl_error_follow, 500);
			return;
		}

		$astrologer_data = json_decode($astrologers, associative: true);

		$data["astrologer_data"] = "";
		if ($astrologer_data["status"] == "success") {

			$data["astrologer_data"] = $astrologer_data["data"];
		}

		$this->load->view('User/Following', $data);
	}




	//---------------------------------------Book PUJA AND PUJARI SECTION ---------------------------------------------------


	public function BookPooja()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$api_url = base_url("User_Api_Controller/show_puja");

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error_follow = curl_error($ch);
		$showpuja = curl_exec($ch);

		curl_close($ch);

		if ($showpuja === false) {
			show_error("cURL Error: " . $curl_error_follow, 500);
			return;
		}

		$puja_data = json_decode($showpuja, associative: true);

		$data["puja_data"] = "";
		if ($puja_data["status"] == "success") {

			$data["puja_data"] = $puja_data["data"];
		}



		$this->load->view('User/BookPooja', $data);
	}

	public function PoojaInfo($puja_id)
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$api_url = base_url("User_Api_Controller/show_puja_info");


		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["puja_id" => $puja_id]));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error_follow = curl_error($ch);
		$showpuja = curl_exec($ch);

		curl_close($ch);

		if ($showpuja === false) {
			show_error("cURL Error: " . $curl_error_follow, 500);
			return;
		}

		$puja_data = json_decode($showpuja, associative: true);

		$data["puja_data"] = "";
		if ($puja_data["status"] == "success") {

			$data["puja_data"] = $puja_data["data"];
		}


		if ($data["puja_data"] == "") {
			redirect('home');
		}



		$this->load->view('User/PoojaInfo', $data);
	}



	public function OfflinePoojaris()
	{
		$this->load->view('User/OfflinePoojaris');
	}




	public function PoojarViewMore($pujari_id, $puja_id)
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$formdata = [
			"pujari_id" => $pujari_id,
			"puja_id" => $puja_id
		];
		$api_url = base_url("User_Api_Controller/pujari_view_more");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $formdata);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error_follow = curl_error($ch);
		$showpujari = curl_exec($ch);

		curl_close($ch);


		if ($showpujari === false) {
			show_error("cURL Error: " . $curl_error_follow, 500);
			return;
		}



		$showpujariresponse = json_decode($showpujari, associative: true);


		$data["showpujari"] = "";

		if ($showpujariresponse["status"] == "success") {
			$data["showpujari"] = $showpujariresponse["data"];
		}



		if ($data["showpujari"] == '') {
			redirect('home');
		}




		$api_url_get_feedback = base_url("User_Api_Controller/getpujarifeedback");
		$ch_feedback = curl_init();
		curl_setopt($ch_feedback, CURLOPT_URL, $api_url_get_feedback);
		curl_setopt($ch_feedback, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_feedback, CURLOPT_POST, 1);
		curl_setopt($ch_feedback, CURLOPT_POSTFIELDS, ["pujari_id" => $pujari_id]);
		curl_setopt($ch_feedback, CURLOPT_TIMEOUT, 10);
		$curl_error_feedback = curl_error($ch_feedback);
		$showfeedback = curl_exec($ch_feedback);

		curl_close($ch_feedback);


		if ($showfeedback === false) {
			show_error("cURL Error: " . $curl_error_feedback, 500);
			return;
		}



		$showfeedbackresponse = json_decode($showfeedback, associative: true);


		$data["showfeedback"] = "";

		if ($showfeedbackresponse["status"] == "success") {
			$data["showfeedback"] = $showfeedbackresponse["data"];
		}

		// print_r($data["showfeedback"]);

		// print_r($data["showfeedback"] );

		$api_pujari_rating = base_url("User_Api_Controller/get_avg_rating_pujari");
		$ch_rating = curl_init();
		curl_setopt($ch_rating, CURLOPT_URL, $api_pujari_rating);
		curl_setopt($ch_rating, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_rating, CURLOPT_POST, 1);
		curl_setopt($ch_rating, CURLOPT_POSTFIELDS, ["pujari_id" => $pujari_id]);
		curl_setopt($ch_rating, CURLOPT_TIMEOUT, 10);
		$ch_rating_error_ = curl_error($ch_rating);
		$showrating = curl_exec($ch_rating);

		curl_close($ch_rating);


		if ($showrating === false) {
			show_error("cURL Error: " . $ch_rating_error_, 500);
			return;
		}



		$showrating_response = json_decode($showrating, associative: true);


		$data["showrating"] = "";

		if ($showrating_response["status"] == "success") {
			$data["showrating"] = $showrating_response["data"];
		}


		// print_r($data["showrating"]);


		$api_pujari_no_of_complted = base_url("User_Api_Controller/get_no_of_completed_puja");
		$ch_compelted_puja = curl_init();
		curl_setopt($ch_compelted_puja, CURLOPT_URL, $api_pujari_no_of_complted);
		curl_setopt($ch_compelted_puja, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_compelted_puja, CURLOPT_POST, 1);
		curl_setopt($ch_compelted_puja, CURLOPT_POSTFIELDS, ["pujari_id" => $pujari_id]);
		curl_setopt($ch_compelted_puja, CURLOPT_TIMEOUT, 10);
		$ch_no_of_completed_puja_error_ = curl_error($ch_compelted_puja);
		$no_of_complted_puja_response = curl_exec($ch_compelted_puja);

		curl_close($ch_compelted_puja);


		if ($no_of_complted_puja_response === false) {
			show_error("cURL Error: " . $ch_no_of_completed_puja_error_, 500);
			return;
		}



		$no_of_complted_puja_response_data = json_decode($no_of_complted_puja_response, associative: true);


		$data["showcompltedpuja"] = "";

		if ($no_of_complted_puja_response_data["status"] == "success") {
			$data["showcompltedpuja"] = $no_of_complted_puja_response_data["data"];
		}





		$this->load->view('User/PoojarViewMore', $data);
	}


	public function OnlinePoojaris($puja_id)
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		//Pooja data



		$api_url = base_url("User_Api_Controller/get_pujari_of_puja");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["puja_id" => $puja_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error_follow = curl_error($ch);
		$showpujari = curl_exec($ch);

		curl_close($ch);


		if ($showpujari === false) {
			show_error("cURL Error: " . $curl_error_follow, 500);
			return;
		}



		$showpujariresponse = json_decode($showpujari, associative: true);


		$data["showpujari"] = "";

		if ($showpujariresponse["status"] == "success") {
			$data["showpujari"] = $showpujariresponse["data"];
		}



		$api_url_pooja_info = base_url("User_Api_Controller/show_pooja_info");
		$ch_pooja = curl_init();
		curl_setopt($ch_pooja, CURLOPT_URL, $api_url_pooja_info);
		curl_setopt($ch_pooja, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_pooja, CURLOPT_POST, 1);
		curl_setopt($ch_pooja, CURLOPT_POSTFIELDS, http_build_query(["puja_id" => $puja_id]));
		curl_setopt($ch_pooja, CURLOPT_TIMEOUT, 10);
		$curl_error_pooja = curl_error($ch_pooja);
		$showpuja_info = curl_exec($ch_pooja);

		curl_close($ch_pooja);


		if ($showpuja_info === false) {
			show_error("cURL Error: " . $curl_error_pooja, 500);
			return;
		}



		$showpuja_info_response = json_decode($showpuja_info, associative: true);


		$data["showpuja_info_response"] = "";

		if ($showpuja_info_response["status"] == "success") {
			$data["showpuja_info_response"] = $showpuja_info_response["data"];
		}

		// print_r($data["showpuja_info_response"]);









		$this->load->view("User/OnlinePoojaris", $data);
	}









	public function Poojaris()
	{
		$this->load->view('User/Poojaris');
	}









	//---------------------------------------USER NOTIFICATION SECTION  -----------------------------------------------
	public function ServiceDetails()
	{
		$this->load->view('User/ServiceDetails');
	}




	public function Orders()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);


		$user_id = $this->session->userdata('user_id');

		if ($user_id == '') {
			redirect('home');
		}


		$api_url_ = base_url("User_Api_Controller/auto_cancel_puja");

		$curl_ = curl_init();

		curl_setopt($curl_, CURLOPT_URL, $api_url_);
		curl_setopt($curl_, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_, CURLOPT_TIMEOUT, 10);

		$response = curl_exec($curl_);
		$http_code = curl_getinfo($curl_, CURLINFO_HTTP_CODE);
		$curl_error = curl_error($curl_);

		curl_close($curl_);



		$api_url = base_url("User_Api_Controller/get_astrologer_chat_with_user");

		$getastrologer = curl_init();
		curl_setopt($getastrologer, CURLOPT_URL, $api_url);
		curl_setopt($getastrologer, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($getastrologer, CURLOPT_POST, 1);
		curl_setopt($getastrologer, CURLOPT_POSTFIELDS, http_build_query(["session_id" => $this->session->userdata("user_id")]));
		$astroresponse = curl_exec($getastrologer);
		$curl_error_astroresponse = curl_error($getastrologer);
		curl_close($getastrologer);

		if ($astroresponse === false) {
			show_error("cURL Error: " . $curl_error_astroresponse, 500);
			return;
		}

		$astrologer_data = json_decode($astroresponse, associative: true);


		$data["astrologer_data"] = "";
		if ($astrologer_data["status"] == "success") {
			$data["astrologer_data"] = $astrologer_data["data"];
		}




		$api_url_showproduct = base_url("User_Api_Controller/showorderedproducts");
		$ch_ = curl_init();
		curl_setopt($ch_, CURLOPT_URL, $api_url_showproduct);
		curl_setopt($ch_, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_, CURLOPT_POST, 1);
		curl_setopt($ch_, CURLOPT_POSTFIELDS, http_build_query(["user_id" => $this->session->userdata("user_id")]));
		curl_setopt($ch_, CURLOPT_TIMEOUT, 10);
		$curl_error_follow = curl_error($ch_);
		$orderedproduct = curl_exec($ch_);

		curl_close($ch_);

		if ($orderedproduct === false) {
			show_error("cURL Error: " . $curl_error_follow, 500);
			return;
		}



		$orderedproductresponse = json_decode($orderedproduct, associative: true);


		$data["showorderedproduct"] = "";

		if ($orderedproductresponse["status"] == "success") {
			$data["showorderedproduct"] = $orderedproductresponse["data"];
		}


		$api_url_showproduct_shipped = base_url("User_Api_Controller/showorderedproducts_shipped");
		$ch_s = curl_init();
		curl_setopt($ch_s, CURLOPT_URL, $api_url_showproduct_shipped);
		curl_setopt($ch_s, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_s, CURLOPT_POST, 1);
		curl_setopt($ch_s, CURLOPT_POSTFIELDS, http_build_query(["user_id" => $this->session->userdata("user_id")]));
		curl_setopt($ch_s, CURLOPT_TIMEOUT, 10);
		$curl_error_shipped = curl_error($ch_s);
		$orderedproduct_shipped = curl_exec($ch_s);

		curl_close($ch_s);

		if ($orderedproduct_shipped === false) {
			show_error("cURL Error: " . $curl_error_shipped, 500);
			return;
		}



		$orderedproduct_shippedresponse = json_decode($orderedproduct_shipped, associative: true);


		$data["showorderedproduct_shipped"] = "";

		if ($orderedproduct_shippedresponse["status"] == "success") {
			$data["showorderedproduct_shipped"] = $orderedproduct_shippedresponse["data"];
		}

		// print_r($data["showorderedproduct_shipped"]);


		// Get Puja data


		$api_url_showbookedpuja = base_url("User_Api_Controller/get_booked_puja");
		$ch_bookedpuja = curl_init();
		curl_setopt($ch_bookedpuja, CURLOPT_URL, $api_url_showbookedpuja);
		curl_setopt($ch_bookedpuja, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_bookedpuja, CURLOPT_POST, 1);
		curl_setopt($ch_bookedpuja, CURLOPT_POSTFIELDS, http_build_query(["session_id" => $this->session->userdata("user_id")]));
		curl_setopt($ch_bookedpuja, CURLOPT_TIMEOUT, 10);
		$curl_error_bookedpuja = curl_error($ch_bookedpuja);
		$showbookedpuja = curl_exec($ch_bookedpuja);

		curl_close($ch_bookedpuja);

		if ($showbookedpuja === false) {
			show_error("cURL Error: " . $curl_error_bookedpuja, 500);
			return;
		}



		$showbookedpuja_response = json_decode($showbookedpuja, associative: true);



		$data["showbookedpuja_"] = "";

		if ($showbookedpuja_response["status"] == "success") {
			$data["showbookedpuja_"] = $showbookedpuja_response["data"];
		}



		//Get Completed puja 


		$api_url_showbookedpuja_completed = base_url("User_Api_Controller/get_completed_puja");
		$ch_bookedpuja_completed = curl_init();
		curl_setopt($ch_bookedpuja_completed, CURLOPT_URL, $api_url_showbookedpuja_completed);
		curl_setopt($ch_bookedpuja_completed, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_bookedpuja_completed, CURLOPT_POST, 1);
		curl_setopt($ch_bookedpuja_completed, CURLOPT_POSTFIELDS, http_build_query(["session_id" => $this->session->userdata("user_id")]));
		curl_setopt($ch_bookedpuja_completed, CURLOPT_TIMEOUT, 10);
		$curl_error_bookedpuja = curl_error($ch_bookedpuja_completed);
		$showbookedpuja_completed = curl_exec($ch_bookedpuja_completed);

		curl_close($ch_bookedpuja_completed);

		if ($showbookedpuja_completed === false) {
			show_error("cURL Error: " . $curl_error_bookedpuja, 500);
			return;
		}





		$showbookedpuja_completed_response = json_decode($showbookedpuja_completed, associative: true);


		$data["show_completed_puja"] = "";

		if ($showbookedpuja_completed_response["status"] == "success") {
			$data["show_completed_puja"] = $showbookedpuja_completed_response["data"];
		}






		$this->load->view('User/Orders', $data);
	}


	public function Notification()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$user_id = $this->session->userdata('user_id');

		if ($user_id == '') {
			redirect('home');
		}




		$show_notification = base_url("User_Api_Controller/show_notification");
		$show_notification_url = curl_init();
		curl_setopt($show_notification_url, CURLOPT_URL, $show_notification);
		curl_setopt($show_notification_url, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($show_notification_url, CURLOPT_POST, 1);
		curl_setopt($show_notification_url, CURLOPT_POSTFIELDS, http_build_query(["user_id" => $this->session->userdata("user_id")]));
		curl_setopt($show_notification_url, CURLOPT_TIMEOUT, 10);
		$show_notification_error = curl_error($show_notification_url);
		$show_notification_data = curl_exec($show_notification_url);

		curl_close($show_notification_url);

		if ($show_notification_data === false) {
			show_error("cURL Error: " . $show_notification_error, 500);
			return;
		}






		$show_notification_data_response = json_decode($show_notification_data, associative: true);


		$data["show_notification_data_response"] = "";

		if ($show_notification_data_response["status"] == "success") {
			$data["show_notification_data_response"] = $show_notification_data_response["data"];
		}


		// print_r($data["show_notification_data_response"] );






		$this->load->view('User/Notification', $data);
	}



	public function CustomerSupport()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);


		$this->load->view('User/CustomerSupport');
	}


	//----------------------------------------USER MOB PUJA --------------------------------------------------


	public function MobPooja()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$api_url = base_url("User_Api_Controller/show_mob_puja");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);

		$dataval = curl_exec($ch);

		if ($dataval === false) {
			$curl_error = curl_error($ch);
			curl_close($ch);
			show_error("cURL Error: " . $curl_error, 500);
			return;
		}

		curl_close($ch);

		$show_mob_puja = json_decode($dataval, true); // use true for associative array


		$data["showmobpuja"] = [];


		if (isset($show_mob_puja["status"]) && $show_mob_puja["status"] === "success") {
			$data["showmobpuja"] = $show_mob_puja["data"];
		}



		$this->load->view('User/MobPooja', $data);
	}






	//----------------------------------------------------SOME OTHER PAGES-------------------------------------

	public function WhyUs()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);




		$api_url = base_url("User_Api_Controller/show_top_astrologer");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($ch);

		// print_r($data);

		$datajson = json_decode($data);



		// print_r($datajson);


		$this->load->view('User/WhyUs');
	}



	//---------------------------------------------Chat--------------------------------------------------------------------

	public function Chat($astrologer_id)
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);


		if (!$astrologer_id) {
			show_error("User ID is required", 400);
			return;
		}

		//Get astrolger by id
		$api_url = base_url("User_Api_Controller/get_astrologer_by_id");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["astrologer_id" => $astrologer_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error = curl_error($ch);
		$response = curl_exec($ch);



		curl_close($ch);

		if ($response === false) {
			show_error("cURL Error: " . $curl_error, 500);
			return;
		}

		$astrologer_data = json_decode($response, associative: true);
		$data["astrologerdata"] = "";

		if ($astrologer_data["status"] == "success") {

			$data["astrologerdata"] = $astrologer_data["data"];
		} else {
			$data["astrologerdata"] = "";
		}

		// print_r($data["astrologerdata"]);

		if ($data["astrologerdata"][0]['id'] == '') {
			redirect('home');
		}


		$user_id = $this->session->userdata('user_id');

		if ($user_id) {
			$getdata["userinfo"] = $this->get_userdata($user_id);
			$data["userinfo_data"] = "";

			if (!$getdata["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "usernotfound") {
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "userfound") {
				redirect("UserLoginSignup/Logout");
			}

			$data["userinfo_data"] = $getdata["userinfo"];

		}






		$this->load->view('User/Chat', $data);
	}


	// ------------------------USER OTHER PARTS -------------------------------------------------------------
	public function ShowFreeKundli()
	{
		$this->load->view('User/ShowFreeKundli');
	}





	public function Recharge()
	{
		$this->load->view('User/Recharge');
	}

	public function getdata()
	{
	}

	public function Demo()
	{
		$this->load->view('User/Demo');
	}

	public function Wallet()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);


		$data = [];
		$session_id = $this->session->userdata("user_id");

		if (!empty($session_id)) {
			$getdata = $this->get_userdata($session_id);

			if ($getdata !== null) {
				$data["userinfo"] = $getdata;
			} else {
				$data["userinfo"] = [];
			}
		} else {
			$data["userinfo"] = [];
		}

		// print_r($data["userinfo"]);
		$this->load->view('User/Wallet', $data);
	}

	public function paymentFailure()
	{
		echo "Payment failed";
	}



	public function Privacypolicy()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/Privacypolicy');
	}

	public function Terms()
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view("User/Terms");
	}

	public function addtocart()
	{

		$this->load->view("User/AddToCart");
	}


	public function send_email()
	{
		$name = $this->input->post('contact_name');
		$email = $this->input->post('contact_email');
		$message = $this->input->post('contact_message');

		// Load email library
		$this->load->library('email');

		// Set email configuration
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',  // change if using different provider
			'smtp_port' => 587,
			'smtp_user' => 'saurv1220@gmail.com',     // your email address
			'smtp_pass' => 'bods rigu tscn nzqf',        // Gmail App password or actual SMTP password
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);

		$this->email->initialize($config);

		// Set email parameters
		$this->email->from($email, $name);
		$this->email->to('saurv1220@gmail.com'); // where you want to receive the email
		$this->email->subject('New Contact Form Submission');
		$this->email->message("
        <h3>Contact Form Submission</h3>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ");

		if ($this->email->send()) {
			$this->session->set_flashdata('success', 'Thank you! Your message has been sent.');
		} else {
			$this->session->set_flashdata('error', 'Sorry, there was a problem sending your message.');
			log_message('error', $this->email->print_debugger(['headers']));
			print_r($this->email->print_debugger(['headers']));
		}

		redirect(base_url('CustomerSupport')); // redirect to homepage or contact section
	}



	public function astrolgerservices($service_id)
	{


		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);



		$api_url_service = base_url("User_Api_Controller/show_service_info");
		$ch_serv = curl_init();
		curl_setopt($ch_serv, CURLOPT_URL, $api_url_service);
		curl_setopt($ch_serv, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_serv, CURLOPT_POST, 1);
		curl_setopt($ch_serv, CURLOPT_POSTFIELDS, http_build_query(["service_id" => $service_id]));
		curl_setopt($ch_serv, CURLOPT_TIMEOUT, 10);
		$curl_error_service = curl_error($ch_serv);
		$response_service = curl_exec($ch_serv);

		curl_close($ch_serv);

		if ($response_service === false) {
			show_error("cURL Error: " . $curl_error_service, 500);
			return;
		}

		$response_service_data = json_decode($response_service, associative: true);
		$data["service_data"] = "";

		if ($response_service_data["status"] == "success") {

			$data["service_data"] = $response_service_data["data"];
		} else {
			$data["service_data"] = "";
		}





		if (!$service_id) {
			show_error("Service id is required", 400);
			return;
		}

		//Get astrolger by id
		$api_url = base_url("User_Api_Controller/show_filtered_astrolger");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["service_id" => $service_id]));
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$curl_error = curl_error($ch);
		$response = curl_exec($ch);

		curl_close($ch);

		if ($response === false) {
			show_error("cURL Error: " . $curl_error, 500);
			return;
		}

		$astrologer_data = json_decode($response, associative: true);
		$data["astrologerdata"] = "";

		if ($astrologer_data["status"] == "success") {

			$data["astrologerdata"] = $astrologer_data["data"];
		} else {
			$data["astrologerdata"] = "";
		}




		// print_r($data["astrologerdata"]);


		// 	$language = $this->session->userdata('site_language') ?? 'english';
		// $this->lang->load('message', $language);


		// $api_url = base_url("User_Api_Controller/getastrologer");
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $api_url);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// $response = curl_exec($ch);
		// $curl_error = curl_error($ch);
		// curl_close($ch);

		// if ($response === false) {
		// 	show_error("cURL Error: " . $curl_error, 500);
		// 	return;
		// }

		// $astrologer_data = json_decode($response, associative: true);
		// $data["astrologerdata"] = "";

		// if ($astrologer_data["status"] == "success") {

		// 	$data["astrologerdata"] = $astrologer_data["data"];
		// } else {
		// 	$data["astrologerdata"] = "";
		// }

		$user_id = $this->session->userdata('user_id');
		if ($user_id) {
			$getdata["userinfo"] = $this->get_userdata($user_id);
			$data["userinfo_data"] = "";

			if (!$getdata["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "usernotfound") {
				redirect("UserLoginSignup/Logout");
			} else if ($getdata["userinfo"] == "userfound") {
				redirect("UserLoginSignup/Logout");
			}

			$data["userinfo_data"] = $getdata["userinfo"];
		}





		$this->load->view("User/Astrolgerservices", $data);


	}


	function getblogs()
	{

		// $api_urlsBLOG = "http://localhost/Astrology/User_Api_Controller/showblogs";
		$api_url = base_url("User_Api_Controller/showblogs");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_data = json_decode($response, true);
		if (isset($response_data["status"]) && $response_data["status"] == "success") {
			$data = $response_data["data"];
		} else {
			$data = null;
		}
		return $data;
	}


	public function Blog()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$ch_url_blogs = base_url("User_Api_Controller/show_blogs");

		$ch_data_blogs = curl_init();
		curl_setopt($ch_data_blogs, CURLOPT_URL, $ch_url_blogs);
		curl_setopt($ch_data_blogs, CURLOPT_RETURNTRANSFER, true);
		$blog_response_data = curl_exec($ch_data_blogs);
		$curl_error_blog_data = curl_error($ch_data_blogs);
		curl_close($ch_data_blogs);

		if ($blog_response_data === false) {
			show_error("cURL Error: " . $curl_error_blog_data, 500);
			return;
		}

		$blog_data = json_decode($blog_response_data, associative: true);


		$data["blogdata"] = "";
		if ($blog_data["status"] == "success") {
			$data["blogdata"] = $blog_data["data"];
		}



		$this->load->view('User/Blog', $data);
	}



	public function ViewBlogInfo($blog_id)
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		if (!$blog_id) {
			show_404();
			return;
		}

		// $api_url = "http://localhost/Astrology/User_Api_Controller/viewspecificblog";

		$api_url = base_url("User_Api_Controller/viewspecificblog");


		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => $api_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => http_build_query(["blog_id" => $blog_id]),
			CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"]
		]);

		$response = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$curlError = curl_error($curl);

		curl_close($curl);



		$response_data = json_decode($response, true);


		if (isset($response_data["status"]) && $response_data["status"] == "success") {
			$data = $response_data["data"];
		} else {
			$data = null;
		}

		$data["blogdata"] = $data;



		$this->load->view('User/ViewBlogInfo', $data);
	}





	// new controller by bhuvan
	public function CardCategoryFilter($category)
	{

		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);

		$decoded_category = urldecode($category);

		$api_url_product = base_url("User_Api_Controller/show_specific_category");
		$ch_product = curl_init();
		curl_setopt($ch_product, CURLOPT_URL, $api_url_product);
		curl_setopt($ch_product, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_product, CURLOPT_POST, 1);
		curl_setopt($ch_product, CURLOPT_POSTFIELDS, http_build_query(["category" => $decoded_category]));
		curl_setopt($ch_product, CURLOPT_TIMEOUT, 10);
		$curl_error_product = curl_error($ch_product);
		$ch_product_data = curl_exec($ch_product);
		curl_close($ch_product);

		if ($ch_product_data === false) {
			show_error("cURL Error: " . $curl_error_product, 500);
			return;
		}

		$product_data = json_decode($ch_product_data, true);
		$data["product_data"] = [];





		// if ($product_data["status"] === "success") {
		// 	foreach ($product_data["data"] as &$product) {



		// 		if (isset($product['purpose']) && is_string($product['purpose'])) {

		// 			$cleaned = str_replace(["[", "]", "'"], "", $product['purpose']);
		// 			$product['purposes'] = array_map('trim', explode(",", $cleaned));
		// 		} else {

		// 			$product['purposes'] = [];
		// 		}


		// 		unset($product['purpose']);
		// 	}
		// 	$data["product_data"] = $product_data["data"];

		// }

		if ($product_data["status"] === "success") {
			foreach ($product_data["data"] as &$product) {

				if (isset($product['purpose']) && is_string($product['purpose'])) {
					$cleaned = str_replace(["[", "]", "'"], "", $product['purpose']);
					$product['purposes'] = array_map(function ($item) {
						return strtolower(trim($item));
					}, explode(",", $cleaned));
				} else {
					$product['purposes'] = [];
				}

				unset($product['purpose']);
			}
			$data["product_data"] = $product_data["data"];
		}




		$api_url_product_count = base_url("User_Api_Controller/get_total_product_in_category");
		$ch_product_count = curl_init();
		curl_setopt($ch_product_count, CURLOPT_URL, $api_url_product_count);
		curl_setopt($ch_product_count, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_product_count, CURLOPT_POST, 1);
		curl_setopt($ch_product_count, CURLOPT_POSTFIELDS, http_build_query(["category" => $decoded_category]));
		curl_setopt($ch_product_count, CURLOPT_TIMEOUT, 10);
		$curl_error_product_count = curl_error($ch_product_count);
		$ch_product_data_count = curl_exec($ch_product_count);
		curl_close($ch_product_count);

		if ($ch_product_data_count === false) {
			show_error("cURL Error: " . $curl_error_product_count, 500);
			return;
		}

		$product_count_data = json_decode($ch_product_data_count, true);
		$data["product__count_data"] = [];


		if (isset($product_count_data["status"]) && $product_count_data["status"] == "success") {
			$data["product__count_data"] = $product_count_data["data"];
		} else {
			$data["product__count_data"] = 0;
		}





		$api_url_show_purpose = base_url("User_Api_Controller/show_purpose");
		$ch_product_purpose = curl_init();
		curl_setopt($ch_product_purpose, CURLOPT_URL, $api_url_show_purpose);
		curl_setopt($ch_product_purpose, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch_product_purpose, CURLOPT_POST, 1);
		curl_setopt($ch_product_purpose, CURLOPT_POSTFIELDS, http_build_query(["category" => $decoded_category]));
		curl_setopt($ch_product_purpose, CURLOPT_TIMEOUT, 10);
		$curl_error_product_purpose = curl_error($ch_product_purpose);
		$ch_product_data_purpose = curl_exec($ch_product_purpose);
		curl_close($ch_product_purpose);

		if ($ch_product_data_purpose === false) {
			show_error("cURL Error: " . $curl_error_product_purpose, 500);
			return;
		}

		$product_purpose = json_decode($ch_product_data_purpose, true);
		$data["product_purpose"] = [];


		if (isset($product_purpose["status"]) && $product_purpose["status"] == "success") {
			$data["product_purpose"] = $product_purpose["data"];
		} else {
			$data["product_purpose"] = "wealth";
		}










		// print_r($data["product__count_data"]);


		$this->load->view("User/CardCategoryFilter", $data);
	}

}
