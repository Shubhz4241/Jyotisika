
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Astrologer_api_controller extends CI_Controller {


    private $api_url = 'http://login.mobteldigital.com/sms-panel/api/http/index.php';
    private $username = 'MANASVI';
    private $api_key = '0D66D-FD1F1';
    private $sender_id = 'MOBDIG';
    private $route_name = 'OTP';
    private $template_id = '1607100000000315926';

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Astrologer_model');
    }


    
    public function Send_otp_latest($otp,$phone) {
        
        

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
        
        if ($response && $response['status'] == 'success') {
            return true;
        } else {
           return false;
        }
    }


    private function Send_request($data) {
        $url = $this->api_url . '?' . http_build_query($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true);
    }

    public function Register_post() {


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['status' => false, 'message' => 'Invalid request method']);
            return;
        }

        
    $contact = $this->input->post('contact');

    // Check if contact already exists
    if ($this->Astrologer_model->is_contact_exists($contact)) {
        echo json_encode(['status' => "error", 'message' => 'Contact number already registered']);
        return;
    }
        // Get POST data
        $name        = $this->input->post('name');
        //$contact     = $this->input->post('contact');
        $email       = $this->input->post('email');
        $gender      = $this->input->post('gender');
        $address     = $this->input->post('address');
        $experience  = $this->input->post('experience');
        $languages   = $this->input->post('languages');     // array
        $specialties = $this->input->post('specialties');   // array

        // Aadhaar card upload
        $aadhaar_file = '';
        if (!empty($_FILES['aadhaar_card']['name'])) {
            $config['upload_path']   = './uploads/astrologer/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']      = 5120;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('aadhaar_card')) {
                echo json_encode(['status' => false, 'message' => $this->upload->display_errors()]);
                return;
            } else {
                $aadhaar_file = $this->upload->data('file_name');
            }
        }

        // Certificates upload
        $certificate_files = [];
        if (!empty($_FILES['certificates']['name'][0])) {
            $count = count($_FILES['certificates']['name']);
            for ($i = 0; $i < $count; $i++) {
                $_FILES['file']['name']     = $_FILES['certificates']['name'][$i];
                $_FILES['file']['type']     = $_FILES['certificates']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['certificates']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['certificates']['error'][$i];
                $_FILES['file']['size']     = $_FILES['certificates']['size'][$i];

                $config['upload_path']   = './uploads/astrologer/';
                $config['allowed_types'] = 'pdf|jpg|jpeg|png';
                $config['max_size']      = 5120;
                $config['file_name']     = time() . '_' . $_FILES['file']['name'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $certificate_files[] = $this->upload->data('file_name');
                }
            }
        }

        // Data array
        $data = [
            'name'         => $name,
            'contact'      => $contact,
            'email'        => $email,
            'gender'       => $gender,
            'address'      => $address,
            'experience'   => $experience,
            'languages'    => implode(',', $languages),
            'specialties'  => implode(',', $specialties),
            'aadharcard' => $aadhaar_file,
            'certificates' => implode(',', $certificate_files),
            'price_per_minute' =>100,
            'status'    => "approved",
        ];

        // Insert into DB
        $insert = $this->Astrologer_model->insert_astrologer($data);

        if ($insert) {
            echo json_encode(['status' => "success", 'message' => 'Astrologer registered successfully']);
        } else {
            echo json_encode(['status' => "error", 'message' => 'Failed to register astrologer']);
        }
    }


    // login otp

    

    public function Send_Otp_Login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $mobile = $this->input->post('phone');

        if (empty($mobile)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Phone number is required.']);
            return;
        }

        if (!$this->Astrologer_model->user_check($mobile)) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User not found.']);
            return;
        }
        $user = $this->Astrologer_model->get_user_by_mobile($mobile);

        $astrologerDetails = $this->Astrologer_model->get_astrologer_details_by_user_id($user['id']);

        if ($astrologerDetails) {
            if ($astrologerDetails['status'] !== 'approved') {
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

        $this->Astrologer_model->insert_otp($mobile, $otp, $expiry);
        $message = "Your OTP is: $otp";
        $try = $this->Send_otp_latest($otp, $mobile);

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

        if (empty($mobile) || empty($otp)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Phone number and OTP are required.']);
            return;
        }

        $otpData = $this->Astrologer_model->get_otp($mobile, $otp);

        if (!$otpData || time() > $otpData->expiry) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP.']);
            return;
        }

        $user = $this->Astrologer_model->get_user_by_mobile($mobile);

        if ($user) {
            $this->session->set_userdata([
                'id'         => $user['id'],
                'is_logged_in' => true,
                'name'       => $user['name'],
                'role'       => 'astrologer',
                'contact'    => $user['contact'],
                'status'     => $user['status']
            ]);
            

            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Login successful.', 'user' => $user]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'User not found or role mismatch.']);
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
    
        $user_data = $this->Astrologer_model->getOtpDataByPhone($phone);
    
        if ($user_data) {
            $otp = rand(1000, 9999);
            $expiry = time() + 120;
            
            // Insert OTP with expiry in the database
            $this->Astrologer_model->insert_otp($phone, $otp, $expiry);
    
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

        $astrologer_id = $this->session->userdata('id');
        $status = $this->input->post('status');

        if (empty($status)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Status is required.']);
            return;
        }

        $this->Astrologer_model->setAstrologerStatus($astrologer_id, $status);

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

        $astrologer_id = $this->session->userdata('id');

        if (empty($astrologer_id)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Astrologer ID not found.']);
            return;
        }

        $status = $this->Astrologer_model->getAstrologerStatus($astrologer_id);
    
        if ($status) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'data' => $status]);
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No status found.']);
        }
    }
    

}
