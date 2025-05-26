<?php
defined('BASEPATH') or exit('No direct script access allowed');

//use Twilio\Rest\Client;

class Astrologer_Api_Controller extends CI_Controller
{
    private $api_url = 'http://login.mobteldigital.com/sms-panel/api/http/index.php';
    private $username = 'MANASVI';
    private $api_key = '0D66D-FD1F1';
    private $sender_id = 'MOBDIG';
    private $route_name = 'OTP';
    private $template_id = '1607100000000315926';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Astrologer_Api_Model');
        // $this->load->config('env_config');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
    }

    private function SendSms($message, $toNumber)
    {
        $api_url = "https://www.fast2sms.com/dev/bulkV2";
        $params = [
            'authorization' => 'pNcPXzF5mljfJhAD7kibCHusonSdZO9V1UWvTB0xGaEILtgerqm76dnrsAIqCYDohkwyiXjcZKfFB24G', //API key
            'route' => 'q',
            'message' => $message,
            'flash' => '0',
            'numbers' => $toNumber
        ];

        $query_string = http_build_query($params);
        $full_url = $api_url . '?' . $query_string;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $full_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded'
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);
            return false;
        } else {
            $decoded_response = json_decode($response, true);
            curl_close($ch);

            return  $response; //isset($decoded_response['status']) && $decoded_response['status'] === 'success';

            // if (isset($decoded_response['status']) && $decoded_response['status'] === 'success') {
            //     return true;
            // } else {
            //     return false;
            // }
        }
    }



    public function Register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $data = $this->input->post();
        // var_dump($data);die;

        // Validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('experience', 'Experience', 'required|less_than[50]');


        if ($this->form_validation->run() == FALSE) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // ✅ Clean contact number at the very beginning
        $data['contact'] = preg_replace('/^\+91/', '', $data['contact']); // Remove +91
        $data['contact'] = preg_replace('/\D/', '', $data['contact']);    // Remove non-digits

        // ✅ Validate length early
        if (strlen($data['contact']) != 10) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid Mobile Number (Must be 10 Digit Mobile Number)']);
            return;
        }

        $user_exist = $this->Astrologer_Api_Model->user_check($data['contact'], $data['email']);


        if ($user_exist) {
            http_response_code(409);
            echo json_encode(['status' => 'error', 'message' => 'User already exists']);
            return;
        }

        $this->Astrologer_Api_Model->delete_existing_user($data['contact']);


        // Handle file uploads
        if (!empty($_FILES['aadhaar_card']['name'])) {
            $fileName = time() . '_' . $_FILES['aadhaar_card']['name'];
            $uploadPath = './uploads/Astologer/' . $fileName;

            if (!move_uploaded_file($_FILES['aadhaar_card']['tmp_name'], $uploadPath)) {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload Aadhaar card.']);
                return;
            }

            $data['aadhaar_card'] = $uploadPath;
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Aadhaar card is required.']);
            return;
        }

        // Handle Profile Image uploads
        // if (!empty($_FILES['profile_image']['name'])) {
        //     $fileName = time() . '_' . $_FILES['profile_image']['name'];
        //     $uploadPath = './uploads/Astologer/' . $fileName;

        //     if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadPath)) {
        //         http_response_code(500);
        //         echo json_encode(['status' => 'error', 'message' => 'Failed to upload Aadhaar card.']);
        //         return;
        //     }

        //     $data['profile_image'] = $uploadPath;
        // } else {
        //     http_response_code(400);
        //     echo json_encode(['status' => 'error', 'message' => 'Profile Image is required.']);
        //     return;
        // }

        // Handle multiple certificates
        if (!empty($_FILES['certificates']['name'][0])) {
            $certificatePaths = [];
            foreach ($_FILES['certificates']['name'] as $key => $name) {
                $fileType = pathinfo($name, PATHINFO_EXTENSION);
                $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];

                if (!in_array($fileType, $allowedTypes)) {
                    http_response_code(400);
                    echo json_encode(['status' => 'error', 'message' => 'Certificates must be valid file types (jpg, jpeg, png, pdf).']);
                    return;
                }

                $fileName = time() . '_' . $name;
                $uploadPath =  'uploads/Astologer/' . $fileName;

                if (!move_uploaded_file($_FILES['certificates']['tmp_name'][$key], $uploadPath)) {
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'message' => 'Failed to upload ' . $name]);
                    return;
                }

                $certificatePaths[] = $fileName;
            }

            $data['certificates'] = implode(',', $certificatePaths);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Certificates are required.']);
            return;
        }

        // Handle multiple languages
        $languages = $this->input->post('languages');
        if (!empty($languages) && is_array($languages)) {
            $data['languages'] = implode(',', $languages);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Languages are required.']);
            return;
        }

        // Handle multiple specialties
        $specialties = $this->input->post('specialties');
        if (!empty($specialties) && is_array($specialties)) {
            $data['specialties'] = json_encode($specialties);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Specialties are required.']);
            return;
        }

        // Generate OTP
        $otp = rand(1000, 9999);
        $data['otp'] = $otp;

        $user_exist = $this->Astrologer_Api_Model->user_check($data['contact'], $data['email']);
        if ($user_exist) {
            http_response_code(409);
            echo json_encode(['status' => 'error', 'message' => 'User already exists']);
            return;
        }

        $data['created_at'] = date('Y-m-d H:i:s');

        // Store data in temp table
        $this->Astrologer_Api_Model->insertTempData($data);
        $try = $this->Send_otp_latest($otp, $data['contact']);
        if ($try) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.', 'try' => $try]);
        } else {

            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.', 'try' => $try]);
        }
    }

    public function Send_otp_latest($otp, $phone)
    {

        $data = [
            'username'    => $this->username,
            'apikey'      => $this->api_key,
            'apirequest'  => 'Text',
            'sender'      => $this->sender_id,
            'mobile'      => $phone,
            'message'     => "Dear User, Your App. Login Secret OTP is {$otp} Valid for 20 Minutes 
                DO NOT SHARE ANYBODY Joytisika

                MOBDIG",
            'route'       => $this->route_name,
            'TemplateID'  => $this->template_id,

        ];

        $response = $this->Send_request($data);


        if ($response && $response['status'] == 'success') {
            return true;
        } else {
            return false;
        }
    }

    private function Send_request($data)
    {
        $url = $this->api_url . '?' . http_build_query($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    // Verify OTP and Shift Data
    public function Verify_otp()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $otp = $this->input->post('otp');
        $phone = $this->input->post('phone');


        if (empty($otp) || empty($phone)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'OTP and phone number are required.']);
            return;
        }

        $user_data = $this->Astrologer_Api_Model->getTempDataByPhone($phone);

        if ($user_data) {
            $created_at = strtotime($user_data['created_at']);
            $current_time = time();

            if (($current_time - $created_at) > (20 * 60)) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'OTP expired.']);
                return;
            }

            if ($user_data['otp'] == $otp) {
                $this->Astrologer_Api_Model->registerUser($user_data);
                $this->Astrologer_Api_Model->deleteTempData($phone);

                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => 'Registration successful.']);
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
            }
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User data not found.', 'phone' => $phone, 'otp' => $otp]);
        }
    }

    public function Resend_Otp()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $phone = $this->input->post('phone');

        if (empty($phone)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Phone number is required.']);
            return;
        }

        $user_data = $this->Astrologer_Api_Model->getTempDataByPhone($phone);

        if ($user_data) {
            $otp = rand(1000, 9999);
            $this->Astrologer_Api_Model->updateTempData($phone, $otp);

            $try = $this->Send_otp_latest($otp, $phone);
            if ($try) {
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.', 'try' => $try]);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.', 'try' => $try]);
            }
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User data not found.']);
        }
    }

    public function Resend_Otp_Login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $phone = $this->input->post('phone');

        if (empty($phone)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Phone number is required.']);
            return;
        }

        $user_data = $this->Astrologer_Api_Model->getOtpDataByPhone($phone);

        if ($user_data) {
            $otp = rand(1000, 9999);
            $expiry = time() + 120;

            // Insert OTP with expiry in the database
            $this->Astrologer_Api_Model->insert_otp($phone, $otp, $expiry);

            $try = $this->Send_otp_latest($otp, $phone);

            if ($try) {
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.', 'try' => $try]);
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.', 'try' => $try]);
            }
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User data not found.']);
        }
    }






    public function Send_Otp_Login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $mobile = $this->input->post('phone');

        // Normalize the mobile number to 10 digits without +91 prefix
        $mobile = preg_replace('/^(\+91|91)/', '', $mobile);
        $mobile = preg_replace('/\D/', '', $mobile);


        if (strlen($mobile) !== 10) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid phone number format.']);
            return;
        }

        if (empty($mobile)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Phone number is required.']);
            return;
        }

        if (!$this->Astrologer_Api_Model->user_check($mobile)) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User not found.']);
            return;
        }
        $user = $this->Astrologer_Api_Model->get_user_by_mobile($mobile);

        $astrologerDetails = $this->Astrologer_Api_Model->get_astrologer_details_by_user_id($user['id']);

        if ($astrologerDetails) {
            if ($astrologerDetails['status'] !== 'Approved') {
                http_response_code(401);
                echo json_encode(['status' => 'error', 'message' => 'user not approved yet.']);
                return;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'User not found.']);
            return;
        }


        $otp = rand(1000, 9999);
        $expiry = time() + 120;

        $this->Astrologer_Api_Model->insert_otp($mobile, $otp, $expiry);
        $message = "Your OTP is: $otp";
        $try = $this->Send_otp_latest($otp, $mobile);
        // $try = true;

        if ($try) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.', 'try' => $try, 'astro' => $astrologerDetails['status']]);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.', 'try' => $try]);
        }
    }

    public function Verify_otp_Login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $mobile = $this->input->post('phone');
        $otp = $this->input->post('otp');


        // Normalize the mobile number to 10 digits without +91 prefix
        $mobile = preg_replace('/^(\+91|91)/', '', $mobile);
        $mobile = preg_replace('/\D/', '', $mobile);

      
        if (empty($mobile) || empty($otp)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Phone number and OTP are required.']);
            return;
        }

        $otpData = $this->Astrologer_Api_Model->get_otp($mobile, $otp);
        


        if (!$otpData || time() > $otpData->expiry) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP.']);
            return;
        }

        $user = $this->Astrologer_Api_Model->getAstrologerByPhone($mobile);

        if ($user) {

            $this->session->set_userdata([
                'astrologer_id' => $user->id,
                'is_logged_in' => true,
                'name' => $user->name,
                'contact' => $user->contact,  // Fixed from phone_number
                'status' => $user->status,
                'role' => 'Astrologer',

            ]);

            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Login successful.', 'user' => $user]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User not found or role mismatch.']);
        }
    }


    public function GetUserDataOfLoggedUser()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }
       
        if ($this->session->userdata('is_logged_in')) {
            $user_data = [
                'astrologer_id' => $this->session->userdata('astrologer_id'),
                'is_logged_in' => true,
                // 'id' => $this->session->userdata('id'),
                'name' => $this->session->userdata('name'),
                'role' => $this->session->userdata('role'),
                'contact' => $this->session->userdata('contact'),
                'status' => $this->session->userdata('status')
            ];
           

            http_response_code(200);
            echo json_encode(['status' => 'success', 'user_data' => $user_data]);
        } else {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
        }
    }


    //get the services of the astrologer
    public function GetAstrologerServices()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $services = $this->Astrologer_Api_Model->getServicesByType('astrologer');

        if ($services) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'services' => $services]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No services found.']);
        }
    }

    public function GetAstrologerDetails()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        if (!$this->session->userdata('is_logged_in')) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $user_id = $this->session->userdata('astrologer_id') ?? $this->input->get("astrologer_id");
        $user_details = $this->Astrologer_Api_Model->getAstrologerDetailsById($user_id);

        if ($user_details) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'user_details' => $user_details]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Details not found.']);
        }
    }
    public function GetVerifiedservices()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        if (!$this->session->userdata('is_logged_in')) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $user_id = $this->session->userdata('astrologer_id') ?? $this->input->get("astrologer_id");
        $user_details = $this->Astrologer_Api_Model->getAstrologerDetailsById($user_id);

        if ($user_details) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'user_details' => $user_details]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Details not found.']);
        }
    }

    public function StorePendingServices()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        if (!$this->session->userdata('is_logged_in')) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $input_data = json_decode(file_get_contents('php://input'), true);

        $astrologer_id = $this->session->userdata('astrologer_id');
        $service_ids = $input_data['service_ids'] ?? [];
        $availability_days = $input_data['availability_days'] ?? [];
        $start_time = $input_data['start_time'] ?? null;
        $end_time = $input_data['end_time'] ?? null;

        if (!is_array($service_ids) || empty($service_ids)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Service IDs are required.']);
            return;
        }

        $existing_approved_services = $this->Astrologer_Api_Model->getApprovedServices($astrologer_id);
        $existing_pending_services = $this->Astrologer_Api_Model->getPendingServices($astrologer_id);

        $approved_service_ids = array_column($existing_approved_services, 'service_id');
        $pending_service_ids = array_column($existing_pending_services, 'service_id');

        $filtered_services = array_diff($service_ids, $approved_service_ids);
        $new_pending_services = array_diff($filtered_services, $pending_service_ids);

        if (!empty($new_pending_services)) {
            foreach ($new_pending_services as $service_id) {
                $days = implode(',', $availability_days); // Combine days into a string
                $this->Astrologer_Api_Model->insertPendingService([
                    'astrologer_id' => (int)$astrologer_id,
                    'service_id' => (int)$service_id,
                    'day' => $days, // Store days as comma-separated values
                    'start_time' => $start_time,
                    'end_time' => $end_time
                ]);
            }

            http_response_code(201);
            echo json_encode(['status' => 'success', 'message' => 'New pending services added successfully.']);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'info', 'message' => 'All services are either approved or already pending.']);
        }
    }




    public function GetAstrologerServicesofLoggedinAstologer()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        if (!$this->session->userdata('is_logged_in')) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $astrologer_id = $this->session->userdata('astrologer_id');

        if (empty($astrologer_id)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Astrologer ID is required.']);
            return;
        }

        $astrologer_services = $this->Astrologer_Api_Model->getAstrologerServices($astrologer_id);

        if (empty($astrologer_services)) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No services found for this astrologer.']);
            return;
        }

        $service_ids = array_column($astrologer_services, 'service_id');
        $services_data = $this->Astrologer_Api_Model->getServicesData($service_ids);

        if (!empty($services_data)) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'data' => $services_data, 'astrologer_services' => $astrologer_services]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No matching services found.']);
        }
    }




    //api to get the feedback from the user  to the astrologer
    public function GetAstrologerFeedback()
    {
        if (!$this->session->userdata('is_logged_in')) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $astrologer_id = $this->session->userdata('astrologer_id');

        if (empty($astrologer_id)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Astrologer ID not found.']);
            return;
        }

        $feedbacks = $this->Astrologer_Api_Model->getAstrologerFeedback($astrologer_id);

        if (empty($feedbacks)) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No feedback found.']);
            return;
        }

        http_response_code(200);
        echo json_encode(['status' => 'success', 'data' => $feedbacks]);
    }

    //delete a feedback if want 
    public function DeleteFeedback()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $feedback_id = $this->input->post('feedback_id');

        if (empty($feedback_id)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Feedback ID is required.']);
            return;
        }

        $feedback = $this->Astrologer_Api_Model->getFeedbackById($feedback_id);

        if (empty($feedback)) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Feedback not found.']);
            return;
        }

        $this->Astrologer_Api_Model->deleteFeedback($feedback_id);

        http_response_code(200);
        echo json_encode(['status' => 'success', 'message' => 'Feedback deleted successfully.']);
    }


    //set astologer online or offline

    public function SetAstrologerStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        if (!$this->session->userdata('is_logged_in')) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $astrologer_id = $this->session->userdata('astrologer_id');
        $status = $this->input->post('status');

        if (empty($status)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Status is required.']);
            return;
        }

        $this->Astrologer_Api_Model->setAstrologerStatus($astrologer_id, $status);

        http_response_code(200);
        echo json_encode(['status' => 'success', 'message' => 'Status updated successfully.']);
    }

    public function Check_online()
    {


        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        if (!$this->session->userdata('is_logged_in')) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
            return;
        }

        $astrologer_id = $this->session->userdata('astrologer_id');

        if (empty($astrologer_id)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Astrologer ID not found.']);
            return;
        }

        $status = $this->Astrologer_Api_Model->getAstrologerStatus($astrologer_id);

        if ($status) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'data' => $status]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No status found.']);
        }
    }

    // here we will update the profile of the user
    public function UpdateProfile()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
        }

        $user_id = $this->session->userdata('astrologer_id') ?? $this->input->post("astrologer_id");
        $astrologer_id = $this->session->userdata('astrologer_id');

        if (!$user_id || !$astrologer_id) {
            return $this->output
                ->set_status_header(401)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Session expired or invalid']));
        }

        $data = json_decode(file_get_contents('php://input'), true);
        $_POST = $data;

        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[5]|max_length[200]');
        $this->form_validation->set_rules('languages[]', 'Languages', 'required');

        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('experience', 'Experience', 'required|integer|greater_than_equal_to[0]|less_than_equal_to[100]');

        if ($this->form_validation->run() === FALSE) {
            return $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => validation_errors()]));
        }

        $saveData = [
            'name'      => $data['name'],
            'email'     => $data['email'],
            'address'   => $data['address'],
            'languages' => implode(',', $data['languages']),

            'gender'    => $data['gender'],
            'experience' => $data['experience']
        ];

        if ($this->Astrologer_Api_Model->save_data($user_id, $astrologer_id, $saveData)) {
            return $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'success', 'message' => 'Data saved successfully']));
        } else {
            return $this->output
                ->set_status_header(500)
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Failed to save data']));
        }
    }



    // update the services for the astrologer 

    public function Save_availability()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(405)
                ->set_output(json_encode(['status' => 'error', 'message' => 'Method Not Allowed']));
            return;
        }



        $astrologer_id = $this->session->userdata('astrologer_id');
        $service_id = $this->input->post('service_id');
        $available_days = $this->input->post('available_days');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');

        if (!$service_id || !$available_days || !$start_time || !$end_time) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode(['status' => 'error', 'message' => 'All fields are required']));
            return;
        }

        $data = [
            'day' => $available_days,
            'start_time' => $start_time,
            'end_time' => $end_time
        ];

        $result = $this->Astrologer_Api_Model->update_availability($astrologer_id, $service_id, $data);

        if ($result) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(['status' => 'success', 'message' => 'Availability updated successfully']));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(['status' => 'error', 'message' => 'Failed to update availability']));
        }
    }




    // api for the react native without verification


    public function Register_Api()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $data = $this->input->post();
        // var_dump($data);die;

        // Validation rules
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('experience', 'Experience', 'required|less_than[50]');


        if ($this->form_validation->run() == FALSE) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        $user_exist = $this->Astrologer_Api_Model->user_check($data['contact'], $data['email']);
        if ($user_exist) {
            http_response_code(409);
            echo json_encode(['status' => 'error', 'message' => 'User already exists']);
            return;
        }

        $this->Astrologer_Api_Model->delete_existing_user($data['contact']);

        // Handle file uploads
        if (!empty($_FILES['aadhaar_card']['name'])) {
            $fileName = time() . '_' . $_FILES['aadhaar_card']['name'];
            $uploadPath = './uploads/Astologer/' . $fileName;

            if (!move_uploaded_file($_FILES['aadhaar_card']['tmp_name'], $uploadPath)) {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload Aadhaar card.']);
                return;
            }

            $data['aadhaar_card'] = $uploadPath;
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Aadhaar card is required.']);
            return;
        }

        // Handle Profile Image uploads
        if (!empty($_FILES['profile_image']['name'])) {
            $fileName = time() . '_' . $_FILES['profile_image']['name'];
            $uploadPath = './uploads/Astologer/' . $fileName;

            if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadPath)) {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload Aadhaar card.']);
                return;
            }

            $data['profile_image'] = $uploadPath;
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Profile Image is required.']);
            return;
        }

        // Handle multiple certificates
        if (!empty($_FILES['certificates']['name'][0])) {
            $certificatePaths = [];
            foreach ($_FILES['certificates']['name'] as $key => $name) {
                $fileType = pathinfo($name, PATHINFO_EXTENSION);
                $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];

                if (!in_array($fileType, $allowedTypes)) {
                    http_response_code(400);
                    echo json_encode(['status' => 'error', 'message' => 'Certificates must be valid file types (jpg, jpeg, png, pdf).']);
                    return;
                }

                $fileName = time() . '_' . $name;
                $uploadPath =  'uploads/Astologer/' . $fileName;

                if (!move_uploaded_file($_FILES['certificates']['tmp_name'][$key], $uploadPath)) {
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'message' => 'Failed to upload ' . $name]);
                    return;
                }

                $certificatePaths[] = $fileName;
            }

            $data['certificates'] = implode(',', $certificatePaths);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Certificates are required.']);
            return;
        }

        // Handle multiple languages
        $languages = $this->input->post('languages');
        if (!empty($languages) && is_array($languages)) {
            $data['languages'] = implode(',', $languages);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Languages are required.']);
            return;
        }

        // Handle multiple specialties
        $specialties = $this->input->post('specialties');
        if (!empty($specialties) && is_array($specialties)) {
            $data['specialties'] = json_encode($specialties);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Specialties are required.']);
            return;
        }

        // Generate OTP


        $user_exist = $this->Astrologer_Api_Model->user_check($data['contact'], $data['email']);
        if ($user_exist) {
            http_response_code(409);
            echo json_encode(['status' => 'error', 'message' => 'User already exists']);
            return;
        }

        $data['created_at'] = date('Y-m-d H:i:s');

        // Store data in temp table
        $this->Astrologer_Api_Model->insertTempData($data);

        // Send OTP via Twilio

        // if( $this->sendSms($message, $data['contact'])){
        //     http_response_code(200);
        //     echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.']);
        // } else {
        //     http_response_code(500);
        //     echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.']);
        // }
        // $this->Send_otp($data['contact'],$otp);

        $user_data = $this->Astrologer_Api_Model->getTempDataByPhone($data['contact']);
        $this->Astrologer_Api_Model->registerUser($user_data);
        $this->Astrologer_Api_Model->deleteTempData($data['contact']);
        http_response_code(200);
        echo json_encode(['status' => 'success', 'message' => 'Astrologer registration succeessful sent successfully.']);
    }


    //update the profile image of the astorloger 
    public function Update_profile_image()
    {

        

        $user_id = $this->session->userdata('astrologer_id') ?? $this->input->post("astrologer_id");
        if (!$user_id) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(401)
                ->set_output(json_encode(['success' => false, 'message' => 'User not logged in']));
        }

        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            $config['upload_path']   = './uploads/Astologer/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = 'profile_' . $user_id . '_' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profile_image')) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(['success' => false, 'message' => $this->upload->display_errors()]));
            }

            $uploadData = $this->upload->data();
            $imagePath = 'uploads/Astologer/' . $uploadData['file_name'];

            if ($this->Astrologer_Api_Model->update_profile_image($user_id, $imagePath)) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode([
                        'success' => true,
                        'message' => 'Profile image updated successfully',
                        'image_url' => base_url($imagePath)
                    ]));
            } else {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(500)
                    ->set_output(json_encode(['success' => false, 'message' => 'Failed to update profile image']));
            }
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode(['success' => false, 'message' => 'No image uploaded']));
        }
    }

    public function Logout()
    {
        // Destroy the session

        $astrologer_id = $this->session->userdata('astrologer_id');
        $status = "offline";
        $this->Astrologer_Api_Model->setAstrologerStatus($astrologer_id, $status);
        $this->session->sess_destroy();

        // Redirect to the login form
        redirect(base_url('AstrologerMobileNumberAndOTPForm'));
    }


    //cron job for the status of the astologer 
    public function Check_offline_users()
    {
        $timeout_minutes = 2; // Offline if inactive for 2+ minutes
        $timeout_time = date('Y-m-d H:i:s', strtotime("-$timeout_minutes minutes"));

        // Update astrologers who haven't been active
        $this->db->where('last_active <', $timeout_time)
            ->where('status !=', 'offline')
            ->update('astrologer_details', ['status' => 0]);

        echo "Offline users updated.";
    }


    //<------------- Anyalitcs ----------------->
    // char for the yearly data 
    public function Chart_data_yearly()
    {
        $astrologer_id = $this->session->userdata('astrologer_id') ?? $this->input->get('astrologer_id', TRUE);

        if (!$astrologer_id) {
            echo json_encode([
                'status' => false,
                'message' => 'Astrologer not logged in',
                'data' => []
            ]);
            return;
        }

        $result = $this->Astrologer_Api_Model->get_earnings_grouped_by_year_status($astrologer_id);

        $years = ['2027', '2026', '2025'];
        $statuses = ['paid', 'pending'];
        $formatted = [];

        foreach ($years as $year) {
            $row = ['year' => $year, 'paid' => 0, 'pending' => 0];
            foreach ($result as $r) {
                if ($r->year == $year) {
                    $row[$r->status] = (float)$r->total_income;
                }
            }
            $formatted[] = $row;
        }

        echo json_encode([
            'status' => true,
            'message' => 'Earnings fetched successfully',
            'data' => $formatted
        ]);
    }


    // get the data by the months

    public function Chart_data_monthly()
    {
        $astrologer_id = $this->session->userdata('astrologer_id') ?? $this->input->get('astrologer_id', TRUE);
        $result = $this->Astrologer_Api_Model->get_monthly_income_grouped_by_status($astrologer_id);

        $months = range(1, 12);
        $statuses = ['paid', 'pending'];
        $formatted = [];

        foreach ($months as $month) {
            $row = ['month' => date('M', mktime(0, 0, 0, $month, 10)), 'paid' => 0, 'pending' => 0];
            foreach ($result as $r) {
                if ((int)$r->month === $month) {
                    $row[$r->status] = (float)$r->total_income;
                }
            }
            $formatted[] = $row;
        }

        echo json_encode([
            'status' => true,
            'data' => $formatted
        ]);
    }

    // get the income statewise

    public function Chart_data_pending_paid()
    {
        $astrologer_id = $this->session->userdata('astrologer_id') ?? $this->input->get('astrologer_id', TRUE);

        if (empty($astrologer_id)) {
            echo json_encode([
                'status' => false,
                'message' => 'Astrologer ID is required'
            ]);
            return;
        }

        $result = $this->Astrologer_Api_Model->get_total_income_statuswise($astrologer_id);

        $data = ['paid' => 0, 'pending' => 0];

        foreach ($result as $row) {
            $data[$row->status] = (float)$row->total_income;
        }

        echo json_encode([
            'status' => true,
            'data' => $data
        ]);
    }




    public function Get_total_stats()
    {
        header('Content-Type: application/json');

        // Allow only GET method
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405); // Method Not Allowed
            echo json_encode([
                'status' => "error",
                'message' => 'Method not allowed. Please use GET.'
            ]);
            return;
        }

        // Get astrologer ID from session
        $astrologer_id = $this->session->userdata('astrologer_id') ?? $this->input->get('astrologer_id', TRUE);
        if (!$astrologer_id) {
            http_response_code(401); // Unauthorized
            echo json_encode([
                'status' => "error",
                'message' => 'Unauthorized. Astrologer not logged in.'
            ]);
            return;
        }

        // Load model and fetch data

        $data = $this->Astrologer_Api_Model->get_all_bookings($astrologer_id);

        if (!empty($data)) {
            http_response_code(200); // OK
            echo json_encode([
                'status' => "success",
                'message' => 'Bookings fetched successfully.',
                'data' => $data
            ]);
        } else {
            http_response_code(204); // No Content
            echo json_encode([
                'status' => "error",
                'message' => 'No bookings found.',
                'data' => []
            ]);
        }
    }

    // get total stats for month
    public function Get_offline_bookings_monthly()
    {
        // Allow only GET request
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405); // Method Not Allowed
            echo json_encode(['status' => false, 'message' => 'Method Not Allowed']);
            return;
        }

        // Set headers
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");

        // Check session for astrologer ID
        $astrologer_id = $this->session->userdata('astrologer_id') ?? $this->input->get('astrologer_id', TRUE);
        if (!$astrologer_id) {
            http_response_code(401); // Unauthorized
            echo json_encode(['status' => "success", 'message' => 'Unauthorized']);
            return;
        }
        // var_dump($astrologer_id);

        // Load model and fetch data
        $this->load->model('Astrologer_Api_Model');
        $data = $this->Astrologer_Api_Model->get_monthly_bookings($astrologer_id);
        // var_dump($data);die;

        // Return result
        if (!empty($data)) {
            http_response_code(200); // OK
            echo json_encode(['status' => "success", 'message' => 'Data fetched successfully', 'data' => $data]);
        } else {
            http_response_code(204); // No Content
            echo json_encode(['status' => "error", 'message' => 'No data found']);
        }
    }

    //<------------- Anyalitcs Ends Here ----------------->








}
