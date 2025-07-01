<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PujariController extends CI_Controller
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
        // Set CORS headers
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        $this->load->model('PujariModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function sendOtp()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $mobile_number = $this->input->post("mobile_number");

            if (!$mobile_number) {
                $this->output->set_status_header(400);
                $response = array("status" => "error", "message" => "Mobile number is required");
            } else {

                $user_status = $this->PujariModel->checkUserStatus($mobile_number);

                if (!$user_status) {
                    $this->output->set_status_header(404);
                    $response = array("status" => "error", "message" => "User not found");
                } else if ($user_status['status'] !== 'approved') {
                    $this->output->set_status_header(403);
                    $response = array("status" => "pending", "message" => "Your application is under review");
                } else {

                    $otp = $this->PujariModel->generateOtp();
                    $otpExpiry = time() + (10 * 60);

                    $this->PujariModel->saveOtp($mobile_number, $otp, $otpExpiry);

                    $smsResult = $this->Send_otp_latest($otp, $mobile_number);

                    $this->output->set_status_header(200);
                    $response = array(
                        "status" => "success",
                        "message" => "OTP sent successfully to " . $mobile_number,
                        "smsResponse" => $smsResult
                    );
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = array("status" => "error", "message" => "Method Not Allowed");
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }

    public function resendOtp()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $mobile_number = $this->input->post("mobile_number");

            if (!$mobile_number) {
                $this->output->set_status_header(400);
                $response = array("status" => "error", "message" => "Mobile number is required");
            } else {

                $user_status = $this->PujariModel->checkUserStatus($mobile_number);

                if (!$user_status) {
                    $this->output->set_status_header(404);
                    $response = array("status" => "error", "message" => "User not found");
                } else if ($user_status['status'] !== 'Approved') {
                    $this->output->set_status_header(403);
                    $response = array("status" => "pending", "message" => "Your application is under review");
                } else {

                    $otp = $this->PujariModel->generateOtp();
                    $otpExpiry = time() + (10 * 60);

                    $this->PujariModel->saveOtp($mobile_number, $otp, $otpExpiry);

                    $smsResult = $this->Send_otp_latest($otp, $mobile_number);

                    $this->output->set_status_header(200);
                    $response = array(
                        "status" => "success",
                        "message" => "OTP resent successfully to " . $mobile_number,
                        "smsResponse" => $smsResult
                    );
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = array("status" => "error", "message" => "Method Not Allowed");
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
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
DO NOT SHARE ANYBODY NewAstro
    
    MOBDIG",
            'route'       => $this->route_name,
            'TemplateID'  => $this->template_id,
        ];

        $response = $this->Send_request($data);

        if ($response && isset($response['status']) && $response['status'] == 'success') {
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

    public function verifyOtp()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $mobile_number = $this->input->post("mobile_number");
            $otp = $this->input->post("otp");

            if (!$mobile_number || !$otp) {
                $this->output->set_status_header(400);
                $response = array("status" => "error", "message" => "Mobile number and OTP are required");
            } else {
                $currentTime = time();
                $isValid = $this->PujariModel->verifyOtp($mobile_number, $otp, $currentTime);

                if ($isValid) {

                    $pujariData = $this->PujariModel->getPujariByMobile($mobile_number);

                    if ($pujariData) {

                        $this->session->set_userdata([
                            'mobile_number' => $mobile_number,
                            'pujari_id' => $pujariData['id'],
                            'role' => 'pujari',
                            'logged_in' => TRUE
                        ]);

                        $this->output->set_status_header(200);
                        $response = array(
                            "status" => "success",
                            "message" => "Login successful",
                            "mobile_number" => $mobile_number,
                            "pujari_id" => $pujariData['id'],
                            "role" => 'Pujari',
                        );
                    } else {
                        $this->output->set_status_header(404);
                        $response = array("status" => "error", "message" => "Pujari details not found");
                    }
                } else {
                    $this->output->set_status_header(401);
                    $response = array("status" => "error", "message" => "Invalid OTP or OTP expired");
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = array("status" => "error", "message" => "Method Not Allowed");
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }

    public function registerPujari()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $mobile_number = $this->input->post('contact');
        $email = $this->input->post('email');

        $existing_pujari = $this->PujariModel->getPujariByMobileNumber($mobile_number);
        if ($existing_pujari) {
            echo json_encode(['status' => false, 'message' => 'Mobile number already registered']);
            return;
        }

        // Check for existing email
        $existing_pujari_email = $this->PujariModel->getPujariByEmail($email);
        if ($existing_pujari_email) {
            echo json_encode(['status' => false, 'message' => 'Email already registered']);
            return;
        }

        $languagesJson = $this->input->post('languages');
        $languagesArray = json_decode($languagesJson, true);
        $languages = $languagesArray ? implode(',', $languagesArray) : '';

        // $user_data = [
        //     'name' => $this->input->post('name'),
        //     'email' => $this->input->post('email'),
        //     'phone_number' => $this->input->post('contact'),
        //     'address' => $this->input->post('address'),
        //     'role' => 'pujari',
        //     'status' => 'active'
        // ];

        $specialtiesJson = $this->input->post('specialties');
        $specialtiesArray = json_decode($specialtiesJson, true);

        $aadhaar_path = 'uploads/pujari/aadharcard/';
        $certificates_path = 'uploads/pujari/certificates/';
        $profile_path = 'uploads/pujari/profile/';

        foreach ([$aadhaar_path, $certificates_path, $profile_path] as $dir) {
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
        }

        $aadhaar_card = $this->_upload_file('aadharcard', $aadhaar_path);

        if (!$aadhaar_card['status']) {
            echo json_encode(['status' => false, 'message' => $aadhaar_card['error']]);
            return;
        }

        $profile_image = $this->_upload_file('profileImage', $profile_path);

        if (!$profile_image['status']) {
            echo json_encode(['status' => false, 'message' => $profile_image['error']]);
            return;
        }

        // $user_data['profile_image'] = $profile_image['file_name'];

        // $this->db->trans_start();
        // $this->PujariModel->registerUser($user_data);
        // $user_id = $this->db->insert_id();

        // if (!$user_id) {
        //     $this->db->trans_rollback();
        //     echo json_encode(['status' => false, 'message' => 'Failed to register user']);
        //     return;
        // }

        $pujari_data = [

            'name' => $this->input->post('name'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'languages' => $languages,
            'experience' => $this->input->post('experience'),
            'aadharcard' => $aadhaar_card['file_name'],
            'profile_pic' => $profile_image['file_name'],
            'certificates' => ''
        ];

        if (isset($_FILES['certificates']) && !empty($_FILES['certificates']['name'][0])) {
            $certificates = $this->_upload_multiple_files('certificates', $certificates_path);
            if (!$certificates['status']) {
                $this->db->trans_rollback();
                echo json_encode(['status' => false, 'message' => $certificates['error']]);
                return;
            }
            $pujari_data['certificates'] = implode(',', $certificates['file_names']);
        }

        $this->db->trans_start();

        $pujari_insert = $this->PujariModel->registerPujari($pujari_data);
        if (!$pujari_insert) {
            $this->db->trans_rollback();
            echo json_encode(['status' => false, 'message' => 'Failed to register pujari']);
            return;
        }
        $pujari_id = $this->db->insert_id();

        if ($specialtiesArray && is_array($specialtiesArray)) {
            foreach ($specialtiesArray as $specialty) {
                $service_data = [
                    'pujari_id' => $pujari_id,
                    'service_id' => $specialty['id'],
                    'specialties' => $specialty['name'],
                    'status' => 'Pending',
                    'available_day' => 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
                    'start_time' => '9:30 AM',
                    'end_time' => '9:30 PM',
                    'puja_charges' => isset($specialty['price']) ? $specialty['price'] : 0
                ];
                $service_insert = $this->PujariModel->addPendingService($service_data);
                if (!$service_insert) {
                    $this->db->trans_rollback();
                    echo json_encode(['status' => false, 'message' => 'Failed to add service: ' . $specialty['name']]);
                    return;
                }
            }
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            echo json_encode(['status' => false, 'message' => 'Database error occurred']);
            return;
        }

        echo json_encode(['status' => true, 'message' => 'Application submitted successfully!']);
    }


    private function _upload_file($field, $upload_path)
    {
        if (!isset($_FILES[$field]['name']) || empty($_FILES[$field]['name'])) {
            return ['status' => false, 'error' => 'File is required.'];
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size'] = 5120;
        $config['file_name'] = time() . '_' . preg_replace('/\s+/', '_', $_FILES[$field]['name']);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field)) {
            return ['status' => false, 'error' => $this->upload->display_errors('', '')];
        }

        return ['status' => true, 'file_name' => $this->upload->data('file_name')];
    }

    private function _upload_multiple_files($field, $upload_path)
    {
        $file_names = [];

        if (!isset($_FILES[$field]) || empty($_FILES[$field]['name'])) {
            return ['status' => true, 'file_names' => [], 'error' => null];
        }

        if (!is_array($_FILES[$field]['name'])) {
            return ['status' => false, 'file_names' => [], 'error' => 'Invalid file input format'];
        }

        foreach ($_FILES[$field]['name'] as $index => $file_name) {
            if (empty($file_name)) {
                continue;
            }

            $_FILES['file_temp'] = [
                'name' => $_FILES[$field]['name'][$index],
                'type' => $_FILES[$field]['type'][$index],
                'tmp_name' => $_FILES[$field]['tmp_name'][$index],
                'error' => $_FILES[$field]['error'][$index],
                'size' => $_FILES[$field]['size'][$index]
            ];

            if ($_FILES['file_temp']['error'] != 0) {
                continue;
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = 2048;
            $config['file_name'] = time() . '_' . $index . '_' . preg_replace('/\s+/', '_', $_FILES['file_temp']['name']);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_temp')) {
                return ['status' => false, 'file_names' => [], 'error' => $this->upload->display_errors('', '')];
            }

            $file_names[] = $this->upload->data('file_name');
        }

        return ['status' => true, 'file_names' => $file_names, 'error' => null];
    }


    public function getAllRequest($pujari_id)
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $requests = $this->PujariModel->getAllRequest($pujari_id);

        if ($requests) {
            echo json_encode(['status' => true, 'data' => $requests]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No requests found']);
        }
    }

    public function getLatestRequest($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $request = $this->PujariModel->getLatestRequestByPujari($pujari_id);

        if ($request) {
            echo json_encode(['status' => true, 'data' => $request]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No requests found']);
        }
    }

    public function acceptRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        if (!isset($data['id']) || empty($data['id'])) {
            echo json_encode(['status' => false, 'message' => 'Request ID is required']);
            return;
        }

        // Extract the meeting link from the request
        $id = $data['id'];
        $meeting_link = isset($data['meeting_link']) ? $data['meeting_link'] : '';

        $request_details = $this->PujariModel->getRequestDetails($id);

        if (!$request_details) {
            echo json_encode(['status' => false, 'message' => 'Request details not found']);
            return;
        }

        $update = $this->PujariModel->acceptRequest($id);

        if ($update) {
            $user_email = $request_details->user_email;
            $user_name = $request_details->user_name;
            $puja_name = $request_details->name;
            $puja_date = $request_details->puja_date;
            $puja_time = $request_details->puja_time;

            // Send email with meeting link
            $email_sent = $this->sendMeetingLinkEmail($user_email, $user_name, $puja_name, $puja_date, $puja_time, $meeting_link);

            if ($email_sent) {
                echo json_encode(['status' => true, 'message' => 'Request accepted and meeting link sent successfully!']);
            } else {
                echo json_encode(['status' => true, 'message' => 'Request accepted but there was an issue sending the email.']);
            }
        } else {
            echo json_encode(['status' => false, 'message' => 'Database error, please try again.']);
        }
    }


    private function sendMeetingLinkEmail($email, $name, $puja_name, $puja_date, $puja_time, $meeting_link)
    {
        $this->load->library('email');

        $subject = "Your Puja Request Has Been Approved";

        $puja_name = (!empty($puja_name)) ? $puja_name : "Requested Puja Service";

        $message = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; color: #333333; }
                .header { background-color: #ff9900; color: white; padding: 10px; text-align: center; }
                .content { padding: 20px; border: 1px solid #ddd; color: #333333; }
                .content p, .content ul, .content li { color: #333333; }
                .button { background-color: #ff9900; color: white !important; padding: 10px 15px; text-decoration: none; display: inline-block; border-radius: 5px; }
                .footer { margin-top: 20px; font-size: 12px; color: #777777; text-align: center; }
                .important-note { background-color: #fff3cd; padding: 10px; border-left: 4px solid #ff9900; margin: 15px 0; }
                .important-note p { color: #333333; }
                a { color: #0066cc; }
                a.button { color: white !important; }
            </style>
        </head>
        <body style=\"color: #333333;\">
            <div class='container'>
                <div class='header'>
                    <h2 style=\"color: white;\">Puja Request Approved</h2>
                </div>
                <div class='content'>
                    <p style=\"color: #333333;\">Dear {$name},</p>
                    <p style=\"color: #333333;\">We are pleased to inform you that your request for <strong style=\"color: #333333;\">{$puja_name}</strong> has been approved.</p>
                    <p style=\"color: #333333;\"><strong style=\"color: #333333;\">Details:</strong></p>
                    <ul style=\"color: #333333;\">
                        <li style=\"color: #333333;\">Puja: {$puja_name}</li>
                        <li style=\"color: #333333;\">Date: {$puja_date}</li>
                        <li style=\"color: #333333;\">Time: {$puja_time}</li>
                    </ul>
                    
                    <div class='important-note'>
                        <p style=\"color: #333333;\"><strong style=\"color: #333333;\">Important:</strong> Please complete the payment for your puja service at least 4 hours before the scheduled start time. Failure to complete payment may result in cancellation of your session.</p>
                    </div>
                    
                    <p style=\"color: #333333;\">Please use the following link to join the online puja session:</p>
                    <p><a href='{$meeting_link}' class='button' style=\"color: white !important;\">Join Puja Session</a></p>
                    <p style=\"color: #333333;\">If the button above doesn't work, copy and paste this link into your browser:</p>
                    <p style=\"color: #333333;\">{$meeting_link}</p>
                    <p style=\"color: #333333;\">Thank you for using our service. If you have any questions, please don't hesitate to contact us.</p>
                    <p style=\"color: #333333;\">Warm regards,<br>Puja Services Team</p>
                </div>
                <div class='footer'>
                    <p style=\"color: #777777;\">This is an automated email. Please do not reply to this message.</p>
                </div>
            </div>
        </body>
        </html>
        ";

        $this->email->from('ganeshgodse1902@gmail.com', 'Puja Services');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        return $this->email->send();
    }

    public function rejectRequest()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true);

        if (!isset($data['id']) || empty($data['id'])) {
            echo json_encode(['status' => false, 'message' => 'Request ID is required']);
            return;
        }

        $id = $data['id'];
        $update = $this->PujariModel->rejectRequest($id);

        if ($update) {
            echo json_encode(['status' => true, 'message' => 'Request rejected successfully!']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Database error, please try again.']);
        }
    }

    public function feedback($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }
        header('Content-Type: application/json');

        $feedback = $this->PujariModel->getAllFeedback($pujari_id);
        if ($feedback) {
            echo json_encode(['status' => true, 'data' => $feedback]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No feedback found']);
        }
    }


    public function deleteFeedback($id)
    {
        $this->db->where('id', $id);
        $exists = $this->db->get('pujari_reviews')->num_rows() > 0;

        if (!$exists) {
            echo json_encode(['success' => false, 'message' => 'Feedback not found']);
            return;
        }

        if ($this->PujariModel->deleteFeedback($id)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete feedback']);
        }
    }

    public function addMobPuja()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $data = [

            'name' => $this->input->post('pooja_name'),
            'date' => $this->input->post('date'),
            'service_id' => $this->input->post('service_id'),
            'totalAttendee' => $this->input->post('totalAttendee'),
            'original_price' => $this->input->post('originalPrice'),
            'discount_price' => $this->input->post('discountPrice'),
            'time' => $this->input->post('time'),
            'duration' => $this->input->post('duration'),
            'pujari_id' => $this->input->post('pujari_id')
        ];


        if ($this->PujariModel->addMobPuja($data)) {
            echo json_encode(['status' => true, 'message' => 'Mob Pooja added successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Failed to add mob puja']);
        }
    }

    public function todaySchedule($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $schedule = $this->PujariModel->todaySchedule($pujari_id);

        if ($schedule) {
            echo json_encode(['status' => true, 'data' => $schedule]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No schedule found']);
        }
    }

    public function getPujariDetails($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $pujari_details = $this->PujariModel->getPujariDetailsById($pujari_id);

        if ($pujari_details) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'user_details' => $pujari_details]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Details not found.']);
        }
    }

    public function updatePujariDetails($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['name']) || !isset($data['contact']) || !isset($data['email']) || !isset($data['gender']) || !isset($data['address']) || !isset($data['languages']) || !isset($data['experience'])) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
            return;
        }

        $update_data = [
            'name' => $data['name'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'languages' => $data['languages'],
            'experience' => $data['experience']
        ];

        $update_result = $this->PujariModel->updatePujariDetailsById($pujari_id, $update_data);

        if ($update_result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Details updated successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update details.']);
        }
    }

    public function getPujariServices()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $services = $this->PujariModel->getServicesByType('pujari');

        if ($services) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'services' => $services]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No services found.']);
        }
    }

    public function addPujariServiceRequest($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        $specialties = $input['specialties'] ?? null;
        $availability_days = $input['availability_days'] ?? '';
        $start_time = $input['start_time'] ?? '';
        $end_time = $input['end_time'] ?? '';

        if (!$specialties || !$availability_days || !$start_time || !$end_time) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'All fields (specialties, availability_days, start_time, end_time) are required.']);
            return;
        }


        $service = $this->PujariModel->getServiceByName($specialties);

        if (!$service) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Service not found.']);
            return;
        }

        $puja_charges = $service['price'];
        $service_id = $service['id'];

        $data = [
            'pujari_id' => $pujari_id,
            'specialties' => $specialties,
            'available_day' => $availability_days,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'puja_charges' => $puja_charges,
            'service_id' => $service_id
        ];

        $result = $this->PujariModel->addPendingService($data);

        if ($result) {
            http_response_code(201);
            echo json_encode(['status' => 'success', 'message' => 'Service request submitted successfully and is pending approval.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to submit service request.']);
        }
    }


    public function getLoggedInPujariServices($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $pujari_services = $this->PujariModel->getLoggedInPujariServices($pujari_id);

        if ($pujari_services) {
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                //'data' => $pujari_services['services'], // List of services for dropdown
                'pujari_services' => $pujari_services['pujari_services'] // Full details for fields
            ]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No services found for this Pujari.']);
        }
    }

    public function updateLoggedInPujariService($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        $pujari_service_id = $input['service_id'] ?? null; // This is actually the pujari_services.id
        $day = $input['availability_days'] ?? '';
        $start_time = $input['start_time'] ?? '';
        $end_time = $input['end_time'] ?? '';


        if (!$pujari_service_id || !$day || !$start_time || !$end_time) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'All fields (service_id, availability_days, start_time, end_time) are required.']);
            return;
        }

        // Validate if the pujari_services.id really belongs to this pujari
        $this->db->where('id', $pujari_service_id);
        $this->db->where('pujari_id', $pujari_id);
        $exists = $this->db->get('pujari_services')->row();

        if (!$exists) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Pujari service not found for this user.']);
            return;
        }

        $data = [
            'available_day' => $day,
            'start_time' => $start_time,
            'end_time' => $end_time,

        ];

        $this->db->where('id', $pujari_service_id);
        $this->db->update('pujari_services', $data);

        if ($this->db->affected_rows() > 0) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Service updated successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update service or no changes detected.']);
        }
    }


    public function updatePujariServicePrice($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method. Only POST is allowed.']);
            return;
        }

        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        if (json_last_error() !== JSON_ERROR_NONE || !isset($input['name']) || !isset($input['price'])) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input. Name and price are required.']);
            return;
        }

        $service_name = $input['name'];
        $price = $input['price'];

        if (!is_numeric($price) || $price < 1) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Price must be a positive number.']);
            return;
        }

        $result = $this->PujariModel->updateServicePrice($pujari_id, $service_name, $price);

        if ($result) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Puja price updated successfully']);
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update price. Service not found or no changes made.']);
        }
    }

    public function getPujaSchedules($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            http_response_code(405);
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $today = date('Y-m-d');

        // Fetch Online Puja schedules
        $online_today = $this->PujariModel->getOnlinePujaSchedules($pujari_id, $today, 'today');
        $online_upcoming = $this->PujariModel->getOnlinePujaSchedules($pujari_id, $today, 'upcoming');

        // Fetch Mob Puja schedules
        $mob_today = $this->PujariModel->getMobPujaSchedules($pujari_id, $today, 'today');
        $mob_upcoming = $this->PujariModel->getMobPujaSchedules($pujari_id, $today, 'upcoming');

        $response = [
            'status' => true,
            'data' => [
                'online' => [
                    'today' => $online_today,
                    'upcoming' => $online_upcoming
                ],
                'mob' => [
                    'today' => $mob_today,
                    'upcoming' => $mob_upcoming
                ]
            ]
        ];

        http_response_code(200);
        echo json_encode($response);
    }

    public function setReminder($pujari_id)
    {
        $puja_id = $this->input->post('puja_id');
        $puja_name = $this->input->post('puja_name');
        $puja_date = $this->input->post('puja_date');
        $puja_time = $this->input->post('puja_time');
        $puja_type = $this->input->post('puja_type');

        $data = [
            'puja_id' => $puja_id,
            'puja_name' => $puja_name,
            'puja_date' => $puja_date,
            'puja_time' => $puja_time,
            'puja_type' => $puja_type,
            'pujari_id' => $pujari_id,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($puja_type === 'online') {
            $data['user_name'] = $this->input->post('user_name');
        } else if ($puja_type === 'mob') {
            $data['discount_price'] = $this->input->post('discount_price');
            $data['total_attendee'] = $this->input->post('total_attendee');
            $data['original_price'] = $this->input->post('original_price');
            $data['attendee'] = $this->input->post('attendee') ?: 0;
        }

        $this->db->insert('reminders', $data);

        echo json_encode([
            'status' => true,
            'message' => 'Reminder set successfully'
        ]);
    }

    public function getLatestReminder($pujari_id)
    {
        $this->db->where('pujari_id', $pujari_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('reminders');
        $reminder = $query->row_array();

        if ($reminder) {
            if (isset($reminder['puja_type']) && $reminder['puja_type'] === 'mob') {
                // Fetch the latest attendee count from mob_puja table
                $this->db->select('attendee,duration');
                $this->db->where('id', $reminder['puja_id']);
                $puja = $this->db->get('mob_puja')->row_array();

                if ($puja && isset($puja['attendee'])) {
                    $reminder['attendee'] = $puja['attendee'];
                }
                $reminder['duration'] = $puja['duration'];
            }

            $response = [
                'status' => true,
                'data' => $reminder
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'No reminders found for this pujari'
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function updatePujariProfileImage($pujari_id)
    {

        $upload_path = FCPATH . 'uploads/pujari/profile';

        if (!is_writable($upload_path)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Upload directory is not writable.'
            ]);
            return;
        }

        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => 'jpg|jpeg|png',
            'max_size'      => 5120,
            'file_name'     => uniqid() . '.jpg',
            'overwrite'     => TRUE,
        ];

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('profile_image')) {
            echo json_encode([
                'status' => 'error',
                'message' => $this->upload->display_errors('', '')
            ]);
            return;
        }

        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        $this->db->where('id', $pujari_id);
        $update = $this->db->update('pujari_registration', ['profile_pic' => $file_name]);

        if ($update) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Profile image updated successfully',
                'profile_image_url' => base_url('uploads/pujari/profile/' . $file_name)
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update profile image in database.'
            ]);
        }
    }

    public function countPuja($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $data = $this->PujariModel->countPuja($pujari_id);

        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No poojas found']);
        }
    }

    public function countMobPuja($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $data = $this->PujariModel->countMobPuja($pujari_id);

        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No poojas found']);
        }
    }

    public function earningsBreakdownTotalMonthly($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $earnings = $this->PujariModel->earningsBreakdownTotalMonthly($pujari_id);
        if ($earnings) {
            echo json_encode(['status' => true, 'data' => $earnings]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No earnings found']);
        }
    }

    public function earningsBreakdownOnline($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $earnings = $this->PujariModel->earningsBreakdownOnline($pujari_id);

        if ($earnings) {
            echo json_encode(['status' => true, 'data' => $earnings]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No earnings found']);
        }
    }

    public function earningsBreakdownMob($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $earnings = $this->PujariModel->earningsBreakdownMob($pujari_id);

        if ($earnings) {
            echo json_encode(['status' => true, 'data' => $earnings]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No earnings found']);
        }
    }

    public function earningsBreakdownMonthlyOnline($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $earnings = $this->PujariModel->earningsBreakdownMonthlyOnline($pujari_id);
        if ($earnings) {
            echo json_encode(['status' => true, 'data' => $earnings]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No earnings found']);
        }
    }

    public function earningsBreakdownMonthlyMob($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $earnings = $this->PujariModel->earningsBreakdownMonthlyMob($pujari_id);
        if ($earnings) {
            echo json_encode(['status' => true, 'data' => $earnings]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No earnings found']);
        }
    }

    public function getTotalEarnings($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $earnings = $this->PujariModel->getTotalEarnings($pujari_id);

        if ($earnings) {
            echo json_encode(['status' => true, 'data' => $earnings]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No earnings found']);
        }
    }

    public function getPujas($pujari_id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        header('Content-Type: application/json');

        $data = $this->PujariModel->getOnlinePujas($pujari_id);

        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No poojas found']);
        }
    }
}
