<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load the necessary helpers, libraries, or models here
        $this->load->helper('url');  // For URL helper (if you need it)
        $this->load->library('session');

        if (!$this->session->userdata('admin_id') || !$this->session->userdata('role')) {
            // Redirect to login page if not logged in
            redirect('SuperAdminLogin'); // Adjust to your login route
        }
    }

    public function Login()
    {

        $this->load->view('Admin/SuperAdminLogin');
    }

    public function staff()
    {

        $this->load->view('Admin/Staff');
    }


    public function AdminDash()
    {
        $this->load->model('Admin_Api_Model');

        // --- Model-based counts ---
        $modelUserCount = $this->Admin_Api_Model->getUserCount();
        $modelAstroCount = $this->Admin_Api_Model->getAstrologerCount();
        $modelPujariCount = $this->Admin_Api_Model->getPujariCount();
        $modelReinterviewCount = $this->Admin_Api_Model->getReinterviewCount();

        // --- Astro API ---
        $apiUrlAstro = base_url('Admin_API/getallAstro');
        $ch = curl_init($apiUrlAstro);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $responseAstro = curl_exec($ch);
        curl_close($ch);
        $astroDecoded = json_decode($responseAstro, true);
        $Astro = isset($astroDecoded['Astro']) ? $astroDecoded['Astro'] : [];

        // --- Pujari API ---
        $apiUrlPujari = base_url('Admin_API/getallPujari');
        $ch = curl_init($apiUrlPujari);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $responsePujari = curl_exec($ch);
        curl_close($ch);
        $pujariDecoded = json_decode($responsePujari, true);
        $Pujari = isset($pujariDecoded['Pujari']) ? $pujariDecoded['Pujari'] : [];

        // --- User API ---
        $apiUrlUsers = base_url('api/getallusers');
        $ch = curl_init($apiUrlUsers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $responseUsers = curl_exec($ch);
        curl_close($ch);
        $usersDecoded = json_decode($responseUsers, true);
        $Users = isset($usersDecoded['users']) ? $usersDecoded['users'] : [];

        // --- Final counts ---
        $userCount = count($Users) ?: $modelUserCount;
        $astroCount = count($Astro) ?: $modelAstroCount;
        $pujariCount = count($Pujari) ?: $modelPujariCount;
        $reinterviewCount = $modelReinterviewCount;

        // --- Load view with all data ---
        $this->load->view('Admin/AdminDash', [
            'Astro' => $Astro,
            'Pujari' => $Pujari,
            'userCount' => $userCount,
            'astrologerCount' => $astroCount,
            'pujariCount' => $pujariCount,
            'reinterviewCount' => $reinterviewCount
        ]);
    }


    //  $apiUrl = 'http://localhost:8080/Jyotisika/Admin_API/getFestival';
    // $ch = curl_init($apiUrl);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
    // $response = curl_exec($ch);
    // curl_close($ch);
    // $data = json_decode($response, true);
    // $festival = isset($data['festival']) ? $data['festival'] : [];
    // // $this->load->view('Admin/AstrologersList',['Astro'=>$Astro]);
    // public function Festivals(){


    // 	$url = base_url('Admin_API/getFestival');

    // 	$ch = curl_init($url);
    // 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // 	$result = curl_exec($ch);

    // 	if (curl_errno($ch)) {
    // 		log_message('error', 'cURL error: ' . curl_error($ch));
    // 		$data['festival'] = []; // Empty data on error
    // 	} else {
    // 		$response = json_decode($result, true);

    // 		// Check if API response has data
    // 		$data['festival'] = !empty($response['data']) ? $response['data'] : [];

    // 	}


    // 	$this->load->view('Admin/Festivals',$data);
    // }
    public function Festivals()
    {
        $url = base_url('Admin_API/getFestival');

        // Initialize cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            log_message('error', 'cURL error: ' . curl_error($ch));
            $data['festival'] = [];
        } else {
            // Decode the JSON response
            $response = json_decode($result, true);
            // Optional debug: Check if JSON decode failed
            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'JSON decode error: ' . json_last_error_msg());
                $data['festival'] = [];
            } else {


                // Load data from API response
                $data['festival'] = isset($response['Festival']) ? $response['Festival'] : [];
            }
        }

        curl_close($ch);


        $this->load->view('Admin/Festivals', $data);
    }


    public function BookPooja()
    {
        $apiUrl = site_url('Admin_API/getPoojas');

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        if ($response === false) {
            die('cURL Error: ' . curl_error($ch));
        }

        curl_close($ch);

        $data = json_decode($response, true);
        $Pooja = isset($data['poojas']) ? $data['poojas'] : [];

        $this->load->view('Admin/BookPooja', ['Pooja' => $Pooja]);
    }

    public function JyotisikaStore()
    {
        $apiUrl = site_url('Admin_API/getProducts');

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        if ($response === false) {
            die('cURL Error: ' . curl_error($ch));
        }


        curl_close($ch);

        $data = json_decode($response, true);
        // $products = isset($data['products']) ? $data['products'] : [];
        // print_r($data);die;
        $this->load->view('Admin/JyotisikaStore', $data);
    }

    public function Profile()
    {

        $this->load->view('Admin/Profile');
    }
    public function AnyliticsandReports()
    {

        $this->load->view('Admin/AnyliticsandReports');
    }
    public function RescheduleInterview()
    {
        $apiUrl = base_url('Admin_API/GetAllService');


        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        // print_r($response);die;
        curl_close($ch);
        $data = json_decode($response, true);
        $services = isset($data['services']) ? $data['services'] : [];

        $this->load->view('Admin/RescheduleInterview', ['services' => $services]);
    }

    // [--------------------Fetch Astrologer Data By Id ------------------------]

    public function ViewAstrologer($id)
    {
        // $apiUrl = 'http://localhost/Jyotisika/Admin_API/getAstroById/' . $id;
        // $apiUrl = base_url('Admin_API/getAstroById'.$id);
        $apiUrl = base_url('Admin_API/getAstroById/' . $id);


        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        // print_r($response);die;
        curl_close($ch);
        $data = json_decode($response, true);
        $Astro = isset($data['Astro']) ? $data['Astro'] : [];
        // print_r($Astro);die;
        $this->load->view('Admin/ViewAstrologer', ['Astro' => $Astro]);
    }

    // [--------------------Fetch Pujari Data By Id ------------------------]
    public function ViewPujari($id)
    {
        // $apiUrl = 'http://localhost/Jyotisika/Admin_API/getallPujariById/' . $id;
        $apiUrl = base_url('Admin_API/getPujariById/' . $id);


        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        $Pujari = isset($data['Pujari']) ? $data['Pujari'] : [];
        // print_r($Pujari);die;
        $this->load->view('Admin/ViewPujari', ['Pujari' => $Pujari]);
    }
    public function AstrologersList()
    {
        // $apiUrl = 'http://localhost/Jyotisika/Admin_API/getallAstro';
        $apiUrl = base_url('Admin_API/getallAstro_Aprove');
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        $Astro = isset($data['Astro']) ? $data['Astro'] : [];
        $this->load->view('Admin/AstrologersList', ['Astro' => $Astro]);
    }

    public function AstrologerReview($id)
    {
        // $apiUrl = 'http://localhost:8080/Jyotisika/Admin_API/getAstroById/' . $id;
        $apiUrl = base_url('Admin_API/getAstroById/' . $id);




        $ch = curl_init($apiUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        // print_r($response);die;
        curl_close($ch);
        $data = json_decode($response, true);
        $Astro = isset($data['Astro']) ? $data['Astro'] : [];
        $this->load->view('Admin/AstrologerReview', ['Astro' => $Astro]);
    }

    public function AstrologerReview2()
    {

        $this->load->view('Admin/AstrologerReview');
    }
    public function PujariList()
    {
        //  $apiUrl = 'http://localhost/Jyotisika/Admin_API/getallPujari';
        $apiUrl = base_url('Admin_API/getallPujari_Aprove');
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        $Pujari = isset($data['Pujari']) ? $data['Pujari'] : [];
        $this->load->view('Admin/PujariList', ['Pujari' => $Pujari]);
    }
    public function PujariReview($id)
    {
        // $apiUrl = 'http://localhost:8080/Jyotisika/Admin_API/getallPujariById/' . $id;
        $apiUrl = base_url() . '/Admin_API/getallPujariById/' . $id;

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);

        curl_close($ch);
        $data = json_decode($response, true);
        // print_r($data);die;
        $Pujari = isset($data['Pujari']) ? $data['Pujari'] : [];
        // print_r($Pujari);die;
        $this->load->view('Admin/PujariReview', ['Pujari' => $Pujari]);
    }
    public function AdminOrders()
    {
        // API URL to fetch all orders
        $apiUrl = base_url() . '/Admin_API/getAllOrders';

        // Initialize cURL session
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Turn off SSL verification for localhost

        // Execute cURL and decode response
        $response = curl_exec($ch);
        // print_r($response);die;
        curl_close($ch);



        $data = json_decode($response, true);
        // print_r($data);die;

        // Extract orders data from the response
        $orders = isset($data['orders']) ? $data['orders'] : [];

        // Load view with data
        $this->load->view('Admin/AdminOrders', ['orders' => $orders]);
    }


    public function TrackandShip()
    {

        $this->load->view('Admin/TrackandShip');
    }
    public function Track_Order_Details($id)
    {
        $apiUrl = base_url('Admin_API/getAllOrder/' . $id);


        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        // print_r($response);die;
        curl_close($ch);
        $data = json_decode($response, true);
        $orders = isset($data['orders']) ? $data['orders'] : [];

        $this->load->view('Admin/Track_Order_Details', ['orders' => $orders]);
    }





    // [--------------Fetch Astrologer Data-----------------------]

    public function AstrologerReqList()
    {
        // $apiUrl = 'http://localhost/Jyotisika/Admin_API/getallAstro';
        $apiUrl = base_url('Admin_API/getallAstro');

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        $Astro = isset($data['Astro']) ? $data['Astro'] : [];
        // print_r($Astro);die;
        $this->load->view('Admin/AstrologerReqList', ['Astro' => $Astro]);
    }

    // [--------------Fetch Pujari Data-----------------------]

    public function PujariReqList()
    {

        // $apiUrl = 'http://localhost/Jyotisika/Admin_API/getallPujari';
        $apiUrl = base_url('Admin_API/getallPujari');
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        curl_close($ch);
        // print_r($response);die;
        $data = json_decode($response, true);
        // print_r($data);die;
        $Pujari = isset($data['Pujari']) ? $data['Pujari'] : [];
        $this->load->view('Admin/PujariReqList', ['Pujari' => $Pujari]);
    }

    // [--------------Fetch User Data-----------------------]
    public function UserManagement()
    {
        // $apiUrl = 'http://localhost/Jyotisika/api/getallusers';
        $apiUrl = base_url('Admin_API/getallusers');
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Localhost pe SSL verify off
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        $users = isset($data['users']) ? $data['users'] : [];
        $this->load->view('Admin/UserManagement', ['users' => $users]);
    }

    // [--------------Delete User Data-----------------------]

    public function delete_user()
    {
        $user_id = $this->input->post('user_id');
        if (!$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'User ID is missing']);
            return;
        }
        // $apiUrl = 'http://localhost/Jyotisika/Admin_API/delete_user';
        $apiUrl = base_url('Admin_API/delete_user');

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['user_id' => $user_id]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }



    // [---------------------Shedule Astrologer interview------------------]
    public function updateAstrologerData()
    {
        $id = $this->input->post('astroId');

        if (empty($id)) {
            log_message('error', 'Astrologer ID is missing: ' . print_r($_POST, true));
            $this->session->set_flashdata('error', 'Astrologer ID is required.');
            redirect('astrologerrequests');
        }

        // Collect optional fields
        $data = ['id' => $id]; // 'id' is required

        $mode = $this->input->post('mode');
        if (!empty($mode)) {
            $data['mode'] = $mode;
        }

        $date = $this->input->post('date');
        if (!empty($date)) {
            $data['date'] = $date;
        }

        $time = $this->input->post('time');
        if (!empty($time)) {
            $data['time'] = $time;
        }

        $status = $this->input->post('status');
        if (!empty($status)) {
            $data['status'] = $status;
        }

        $meeting_link = $this->input->post('meeting-link');
        if (!empty($meeting_link)) {
            $data['meeting-link'] = $meeting_link;
        }
        $price_per_minute = $this->input->post('price_per_minute');
        if (!empty($price_per_minute)) {
            $data['price_per_minute'] = $price_per_minute;
        }

        log_message('debug', 'Data sent to API: ' . print_r($data, true));

        // $api_url = 'http://localhost/Jyotisika/Admin_API/updateAstrologerData';
        $apiUrl = base_url('Admin_API/updateAstrologerData');

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
        ));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            log_message('error', 'cURL Error: ' . curl_error($ch));
            $this->session->set_flashdata('error', 'Failed to connect to the API. Please try again.');
            redirect('astrologerrequests');
        }

        curl_close($ch);
        $response_data = json_decode($response, true);
        log_message('debug', 'API Response: ' . print_r($response_data, true));

        if (isset($response_data['status']) && $response_data['status'] === 'success') {
            $this->session->set_flashdata('success', 'Your changes applied successfully!');
        } else {
            $error_message = isset($response_data['message']) ? $response_data['message'] : 'There was an issue scheduling the interview. Please try again.';
            $this->session->set_flashdata('error', $error_message);
        }

        redirect('astrologerrequests');
    }


    public function updatePujariData()
    {
        $id = $this->input->post('pujariId');
        $mode = $this->input->post('mode');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $venue = $this->input->post('venue');
        if (empty($id) || empty($mode) || empty($date) || empty($time) || empty($venue)) {
            log_message('error', 'Missing form fields: ' . print_r($_POST, true));
            $this->session->set_flashdata('error', 'All fields are required. Please fill out the form completely.');
            redirect('pujarirequests');
        }
        $data = array(
            'id' => $id,
            'mode' => $mode,
            'date' => $date,
            'time' => $time,
            'venue' => $venue
        );

        log_message('debug', 'Data sent to API: ' . print_r($data, true));
        // $api_url = 'http://localhost/Jyotisika/Admin_API/updatePujariData';
        $apiurl = base_url('Admin_API/updatePujariData');

        $ch = curl_init($apiurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
        ));
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            log_message('error', 'cURL Error: ' . curl_error($ch));
            $this->session->set_flashdata('error', 'Failed to connect to the API. Please try again.');
            redirect('pujarirequests');
        }
        curl_close($ch);
        $response_data = json_decode($response, true);
        log_message('debug', 'API Response: ' . print_r($response_data, true));
        if (isset($response_data['status']) && $response_data['status'] === 'success') {
            $this->session->set_flashdata('success', 'Your interview has been scheduled successfully!');
            redirect('pujarirequests');
        } else {
            $error_message = isset($response_data['message']) ? $response_data['message'] : 'There was an issue scheduling the interview. Please try again.';
            $this->session->set_flashdata('error', $error_message);
            redirect('pujarirequests');
        }
    }


    // [------------------Add Festival Handler ----------------------]
    public function addFestival()
    {
        // Check if form is submitted
        if ($this->input->post()) {
            $apiUrl = base_url('Admin_API/addFestivalAPI');

            // Prepare POST data
            $postData = [
                'festivals_title' => $this->input->post('festivals_title'),
                'festivals_description' => $this->input->post('festivals_description')
            ];



            // Handle file upload
            if (!empty($_FILES['festivals_image']['name'])) {
                $postData['festivals_image'] = new CURLFile(

                    $_FILES['festivals_image']['tmp_name'],
                    $_FILES['festivals_image']['type'],
                    $_FILES['festivals_image']['name']

                );
            }
            // print_r($postData);die; 
            // Initialize cURL
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data']);

            $response = curl_exec($ch);
            //  print_r($response);die;
            // print_r($response);die;

            if (curl_errno($ch)) {
                log_message('error', 'cURL Error: ' . curl_error($ch));
                $this->session->set_flashdata('error', 'Failed to connect to API');
            } else {
                $response_data = json_decode($response, true);

                if (!empty($response_data['status'])) {
                    $this->session->set_flashdata('success', $response_data['message']);
                } else {
                    $this->session->set_flashdata('error', $response_data['message'] ?? 'Failed to add festival');
                }
            }

            curl_close($ch);
            redirect('Admin/Festivals');
        } else {
            redirect('Admin/Festivals');
        }
    }

   
    //interview
    public function ScheduleInterview()
    {
        $postData = [
            'id' => $this->input->post('id'),
            'mode' => $this->input->post('mode'),
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'meeting_link' => $this->input->post('meeting_link'),
            'status' => 'scheduled'
        ];
        // print_r($postData);die;

        $url = base_url('Admin_API/updateAstrologerData');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        // print_r($response);die;
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'success') {
            $this->session->set_flashdata('success', 'Interview scheduled successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to schedule.');
        }

        redirect('viewastrologere/' . $postData['id']); // or wherever you want to go after submit
    }

    public function ScheduleInterviewPujari()
    {
        $postData = [
            'id' => $this->input->post('id'),
            'mode' => $this->input->post('mode'),
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'meeting_link' => $this->input->post('meeting_link'),
            'status' => 'scheduled'
        ];
        // print_r($postData);die;

        $url = base_url('Admin_API/SchedulePujariInterview');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        // print_r($response);die;
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'success') {
            $this->session->set_flashdata('success', 'Interview scheduled successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to schedule.');
        }

        redirect('viewpujaridata/' . $postData['id']); // or wherever you want to go after submit
    }


    public function approveRejectAstrologer()
    {
        $postData = [
            'id' => $this->input->post('id'),
            'status' => $this->input->post('status')
        ];

        $url = base_url('Admin_API/changeAstrologerStatus');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'success') {
            $action = ($postData['status'] == 'approved') ? 'approved' : 'rejected';
            $this->session->set_flashdata('success', 'Astrologer ' . $action . ' successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to update status.');
        }

        redirect('viewastrologere/' . $postData['id']);
    }

    public function ScheduleInterview2()
    {
        $postData = [
            'id' => $this->input->post('id'),
            'mode' => $this->input->post('mode') ?? 'Online',
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'meeting-link' => $this->input->post('meeting-link'),
            'status' => $this->input->post('status') ?? 'scheduled'
        ];

        // Validate required fields
        if (empty($postData['id']) || empty($postData['date']) || empty($postData['time']) || empty($postData['meeting-link'])) {
            $this->session->set_flashdata('error', 'All fields are required.');
            redirect('viewastrologere/' . $postData['id']);
            return;
        }

        $url = base_url('Admin_API/updateAstrologerData');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'success') {
            $this->session->set_flashdata('success', 'Interview scheduled/updated successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to schedule/update interview.');
        }

        redirect('viewastrologere/' . $postData['id']);
    }
    public function assignCharges()
    {
        $postData = [
            'id' => $this->input->post('id'),
            'price_per_minute' => $this->input->post('charges_per_minute'),
            // 'status' => 'charges_assigned'
        ];


        // print_r($postData);die;

        // Validate charges
        if (empty($postData['price_per_minute']) || $postData['price_per_minute'] < 1 || $postData['price_per_minute'] > 100) {
            $this->session->set_flashdata('error', 'Charges must be between 1 and 100 INR.');
            redirect('viewastrologere/' . $postData['id']);
            return;
        }

        $url = base_url('Admin_API/updateAstrologerData');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'success') {
            $this->session->set_flashdata('success', 'Charges assigned successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to assign charges.');
        }

        redirect('viewastrologere/' . $postData['id']);
    }



    public function addProductViaCurl()
    {
        // Validate form fields
        if (empty($_POST['product_name']) || empty($_POST['product_description']) || empty($_POST['product_price'])) {
            $this->session->set_flashdata('error', 'All fields are required.');
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        // Prepare CURL post data
        $postData = [
            'product_name'        => $_POST['product_name'],
            'product_description' => $_POST['product_description'],
            'product_price'       => $_POST['product_price'],
        ];

        // Handle image file (if uploaded)
        if (!empty($_FILES['product_image']['name'])) {
            $imageTmpPath = $_FILES['product_image']['tmp_name'];
            $imageName = $_FILES['product_image']['name'];

            $cfile = new CURLFile($imageTmpPath, $_FILES['product_image']['type'], $imageName);
            $postData['product_image'] = $cfile;
        }

        $url = base_url('Admin_Api/addProductAPI'); // API endpoint you built earlier

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if (!empty($responseData['status']) && $responseData['status'] === true) {
            $this->session->set_flashdata('success', 'Product added successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to add product.');
        }

        redirect($_SERVER['HTTP_REFERER']); // go back to the form page
    }



    public function updateProductViaCurl()
    {
        // Check if form was submitted
        if (!$this->input->post()) {
            redirect('Admin/JyotisikaStore'); // Redirect if no POST data
            return;
        }

        // Get form data
        $productData = [
            'product_id' => $this->input->post('product_id'),
            'product_name' => $this->input->post('product_name'),
            'product_price' => $this->input->post('product_price'),
            'product_description' => $this->input->post('product_description')
        ];

        // Debug: Remove this after testing
        // print_r($productData); die;

        $apiUrl = site_url('Admin_API/updateProduct');

        // Handle file upload if present
        $postData = $productData;

        if (!empty($_FILES['product_image']['name'])) {
            // If file is uploaded, use multipart form data
            $postData['product_image'] = new CURLFile(
                $_FILES['product_image']['tmp_name'],
                $_FILES['product_image']['type'],
                $_FILES['product_image']['name']
            );
            $isMultipart = true;
        } else {
            $isMultipart = false;
        }

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        if ($isMultipart) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); // Multipart for file upload
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData)); // Regular form data
        }

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if ($response === false) {
            $this->session->set_flashdata('error', 'cURL Error: ' . curl_error($ch));
        } else {
            $result = json_decode($response, true);
            if ($result && $result['status']) {
                $this->session->set_flashdata('success', $result['message']);
            } else {
                $this->session->set_flashdata('error', $result['message'] ?? 'Update failed');
            }
        }

        curl_close($ch);

        // Redirect back to products page
        redirect('Admin/JyotisikaStore');
    }


    public function addPoojaViaCurl()
    {
        // Validate form fields
        if (empty($_POST['pooja_name']) || empty($_POST['pooja_description']) || empty($_POST['pooja_mode'])) {
            $this->session->set_flashdata('error', 'All fields are required.');
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }



        // Prepare CURL post data
        $postData = [
            'pooja_name'        => $_POST['pooja_name'],
            'pooja_description' => $_POST['pooja_description'],
            'pooja_mode'        => $_POST['pooja_mode'],
        ];

        // Handle image file (if uploaded)
        if (!empty($_FILES['pooja_image']['name'])) {
            $imageTmpPath = $_FILES['pooja_image']['tmp_name'];
            $imageName = $_FILES['pooja_image']['name'];
            $cfile = new CURLFile($imageTmpPath, $_FILES['pooja_image']['type'], $imageName);
            $postData['pooja_image'] = $cfile;
        }

        $url = base_url('Admin_Api/addPoojaAPI');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        curl_close($ch);

        $responseData = json_decode($response, true);

        if (!empty($responseData['status']) && $responseData['status'] === true) {
            $this->session->set_flashdata('success', 'Pooja added successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to add pooja.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updatePoojaViaCurl()
    {
        // Validate form inputs
        if (empty($_POST['id']) || empty($_POST['pooja_name']) || empty($_POST['pooja_description']) || empty($_POST['pooja_mode'])) {
            $this->session->set_flashdata('error', 'All fields are required.');
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }

        // Prepare CURL post data
        $postData = [
            'puja_id'           => $_POST['id'],
            'pooja_name'        => $_POST['pooja_name'],
            'pooja_description' => $_POST['pooja_description'],
            'pooja_mode'        => $_POST['pooja_mode'],
        ];

        // Handle image file if provided
        if (!empty($_FILES['pooja_image']['name'])) {
            $imageTmpPath = $_FILES['pooja_image']['tmp_name'];
            $imageName = $_FILES['pooja_image']['name'];
            $cfile = new CURLFile($imageTmpPath, $_FILES['pooja_image']['type'], $imageName);
            $postData['pooja_image'] = $cfile;
        }

        $url = base_url('Admin_Api/updatePoojaAPI');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        if ($response === false) {
            log_message('error', 'cURL Error: ' . curl_error($ch));
            $this->session->set_flashdata('error', 'Failed to connect to update API.');
            curl_close($ch);
            redirect($_SERVER['HTTP_REFERER']);
            return;
        }
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData && !empty($responseData['status']) && $responseData['status'] === true) {
            $this->session->set_flashdata('success', 'Pooja updated successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to update pooja.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deletePoojaViaCurl()
    {
        // Validate input
        if (empty($_POST['id'])) {
            $response = ['status' => false, 'message' => 'Pooja ID is required.'];
            echo json_encode($response);
            return;
        }

        // Prepare CURL post data
        $postData = ['puja_id' => $_POST['id']];
        $url = base_url('Admin_Api/deletePoojaAPI');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        if ($response === false) {
            log_message('error', 'cURL Error: ' . curl_error($ch));
            $response = ['status' => false, 'message' => 'Failed to connect to delete API.'];
            curl_close($ch);
            echo json_encode($response);
            return;
        }
        curl_close($ch);

        echo $response; // Return API response for AJAX
    }



    public function approveRejectPujari()
    {
        $postData = [
            'id' => $this->input->post('id'),
            'status' => $this->input->post('status')
        ];

        $url = base_url('Admin_API/approveRejectPujari');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'success') {
            $action = ($postData['status'] == 'approved') ? 'approved' : 'rejected';
            $this->session->set_flashdata('success', 'Astrologer ' . $action . ' successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to update status.');
        }

        redirect('viewpujaridata/' . $postData['id']);
    }


    public function assignChargesPujari()
    {
        $postData = [
            'id' => $this->input->post('id'),
            'price_per_minute' => $this->input->post('price_per_minute'),
            // 'status' => 'charges_assigned'
        ];


        // print_r($postData);die;

        // Validate charges
        if (empty($postData['price_per_minute']) || $postData['price_per_minute'] < 1 || $postData['price_per_minute'] > 100) {
            $this->session->set_flashdata('error', 'Charges must be between 1 and 100 INR.');
            redirect('viewastrologere/' . $postData['id']);
            return;
        }

        $url = base_url('Admin_API/assignPujariCharges');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($responseData['status'] === 'success') {
            $this->session->set_flashdata('success', 'Charges assigned successfully.');
        } else {
            $this->session->set_flashdata('error', $responseData['message'] ?? 'Failed to assign charges.');
        }

        redirect('viewpujaridata/' . $postData['id']);
    }
}
