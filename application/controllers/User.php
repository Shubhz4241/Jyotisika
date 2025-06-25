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


		$api_url = base_url("User_Api_Controller/getproduct");
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$getproduct = curl_exec($ch);
		$curl_error_ch = curl_error($ch);
		curl_close($ch);

		if ($getproduct === false) {
			show_error("cURL Error: " . $curl_error_ch, 500);
			return;
		}

		$getproduct_data = json_decode($getproduct, associative: true);



		$data["product_data"] = "";
		if ($getproduct_data["status"] == "success") {
			$data["product_data"] = $getproduct_data["data"];
		}





		$this->load->view('User/JyotisikaMall', $data);
	}


	public function ProductDetails($product_id)
	{

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

	public function HoroscopeReadmore($sign) // Default to Taurus if no sign is provided
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


		$data['horoscope'] = json_decode($response, true);

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
		$this->load->view('User/AstrologyServices');
	}

	public function Following()
	{

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



		$this->load->view('User/PoojaInfo', $data);
	}



	public function OfflinePoojaris()
	{
		$this->load->view('User/OfflinePoojaris');
	}




	public function PoojarViewMore($pujari_id, $puja_id)
	{


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

		// print_r($data["showpujari"] );


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
		$this->load->view('User/Notification');
	}



	public function CustomerSupport()
	{
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
}
