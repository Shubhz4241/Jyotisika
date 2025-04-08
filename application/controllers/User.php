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

		$api_url = "http://localhost/jyotisika_api/User/User_Auth/getuser_info";


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


		if ($http_code !== 200) {
			show_error($response . $http_code, 500);
			return null;
		} else if ($http_code == 200) {

			$data['userdata'] = json_decode($response, true);

			if (!$data['userdata'] || !isset($data['userdata']['status']) || $data['userdata']['status'] !== "success") {
				show_error("Invalid user data received from API", 500);
				return null;
			} else if ($data['userdata']['status'] == "success") {
				$data["userinfo"] = $data['userdata']['data'];
				return $data["userinfo"];
			} else {
				return null;
			}

		}

	}


	public function get_userinfo()
	{

		$this->load->library('session');


		$user_id = $this->session->userdata('user_id');

		if (!$user_id) {
			echo json_encode(["error" => "User not logged in"]);
			return;
		}


		$user_data = $this->get_userdata($user_id);

		if ($user_data) {
			echo json_encode(["success" => true, "data" => $user_data]);
		} else {
			echo json_encode(["error" => "Failed to retrieve user data"]);
		}
	}




	//------------------------------------------- USER  SELF PAGES---------------------------------------------------------------------



	public function Home()
	{
		$user_id = $this->session->userdata('user_id');
		$data = [];

		if (!empty($user_id)) {
			$getdata = $this->get_userdata($user_id);

			if ($getdata != null) {
				$data["userinfo"] = $getdata;
			} else {
				redirect("UserLoginSignup/Login");
			}
		}


		$language = $this->session->userdata('site_language') ?? 'english';


		$this->lang->load('message', $language);
		$this->load->view('User/Home', $data);
	}



	public function UserProfile()
	{
		$user_id = $this->session->userdata('user_id');

		if (!$user_id) {

			$this->load->view("UserLoginSignup/Login");
		} else {
			$data["userinfo"] = $this->get_userdata($user_id);

			if (!$data["userinfo"]) {
				show_error("Failed to fetch user profile", 500);
				$this->load->view("User/Login");
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
		echo $response;


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
		$this->load->view('User/Festival');
	}


	public function FestivalReadmore()
	{
		$this->load->view('User/FestivalReadmore');
	}





	//------------------------------------------JYOTISIKA MALL---------------------------------------------------------------------------
	public function JyotisikaMall()
	{

		
		$api_url = "http://localhost/jyotisika_api/User/Jyotisika_mall/get_product";
		// // Use base_url() instead of hardcoded localhost URL

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, false); // Since it's a GET request
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_error = curl_error($ch);
		curl_close($ch);

		if ($http_code !== 200) {
			show_error("API Error: " . $curl_error, 500);
			return null;
		}

		$decoded_response = json_decode($response, true);

		if (!$decoded_response || !isset($decoded_response['status']) || $decoded_response['status'] !== "success") {
			show_error("Invalid API response", 500);
			return null;
		}


		$data["product"] = $decoded_response['data'];

		$this->load->view('User/JyotisikaMall', $data);
	}


	public function ProductDetails()
	{
		$this->load->view('User/ProductDetails');
	}

	public function ProductPayment()
	{
		$this->load->view('User/ProductPayment');
	}







	//-------------------------------- HOROSCOPE PAGES ------------------------------------------------------------------
	public function TodayHoroscope()
	{


		
		
      
         
		$this->load->view('User/TodayHoroscope');
	}

	public function getrashidatatime() {
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
        "Aries", "Taurus", "Gemini", "Cancer", "Leo", "Virgo",
        "Libra", "Scorpio", "Sagittarius", "Capricorn", "Aquarius", "Pisces"
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


		$api_url = "http://localhost/jyotisika_api/User/Astrologer_actions/get_astrologer";
		// // Use base_url() instead of hardcoded localhost URL

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, false); // Since it's a GET request
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curl_error = curl_error($ch);
		curl_close($ch);

		if ($http_code !== 200) {
			show_error("API Error: " . $curl_error, 500);
			return null;
		}

		$decoded_response = json_decode($response, true);

		if (!$decoded_response || !isset($decoded_response['status']) || $decoded_response['status'] !== "success") {
			show_error("Invalid API response", 500);
			return null;
		}


		$data["astroinfo"] = $decoded_response['data'];

		print_r($data["astroinfo"]);

		$this->load->view('User/Astrologers', $data); // Pass data to view
	}


	public function ViewAstrologer()
	{
		$this->load->view('User/ViewAstrologer');
	}

	public function AstrologyServices()
	{
		$this->load->view('User/AstrologyServices');
	}

	public function Following()
	{
		$this->load->view('User/Following');
	}




	//---------------------------------------Book PUJA AND PUJARI SECTION ---------------------------------------------------


	public function BookPooja()
	{
		$language = $this->session->userdata('site_language') ?? 'english';
		$this->lang->load('message', $language);
		$this->load->view('User/BookPooja');
	}

	public function PoojaInfo()
	{
		$this->load->view('User/PoojaInfo');
	}



	public function OfflinePoojaris()
	{
		$this->load->view('User/OfflinePoojaris');
	}




	public function PoojarViewMore()
	{
		$this->load->view('User/PoojarViewMore');
	}


	public function OnlinePoojaris()
	{
		$this->load->view("user/OnlinePoojaris");
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
		$this->load->view('User/Orders');
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
		$this->load->view('User/MobPooja');
	}





	//----------------------------------------------------SOME OTHER PAGES-------------------------------------

	public function WhyUs()
	{
		$this->load->view('User/WhyUs');
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
}
