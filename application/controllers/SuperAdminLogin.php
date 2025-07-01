<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdminLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Login_Model');
        $this->load->library('session');
        $this->load->database();
    }

    public function AdminLogin() {
        header('Content-Type: application/json');

        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->output->set_status_header(405)->set_output(json_encode(['error' => 'Method Not Allowed']));
            return;
        }

        $mobile_number = $this->input->post('mobile_number');
        $password = $this->input->post('password');

        if (!$mobile_number || !$password) {
            $this->output->set_status_header(400)->set_output(json_encode(['error' => 'Invalid input']));
            return;
        }

        // Fetch user details based on mobile number
        $user = $this->Admin_Login_Model->get_user_by_mobile($mobile_number);

        if (!$user || !password_verify($password, $user->password)) {
            $this->output->set_status_header(401)->set_output(json_encode(['error' => 'Invalid credentials']));
            return;
        }

        // Map the role to a single value
        $role_mapping = [
            'superadmin' => 'superadmin',
            'astrologer' => 'admin_astrologer',
            'pujari' => 'admin_pujari'
        ];

        // Check if the user role exists in the mapping
        if (!array_key_exists($user->role, $role_mapping)) {
            $this->output->set_status_header(403)->set_output(json_encode(['error' => 'Unauthorized role']));
            return;
        }

        // Store session data
        $session_data = [
            'admin_id' => $user->id,
            'mobile_number' => $user->mobile_number,
            'role' => $role_mapping[$user->role]
        ];

        $this->session->set_userdata($session_data);

        // Return success response
        $this->output->set_status_header(200)->set_output(json_encode([
            'message' => 'Login successful',
            'status' => 'success',
            'role' => $session_data['role'],
            'admin_id' => $user->id
        ]));
    }

    // Add a method to render the login view
    public function index() {
        // Load the login view
        $this->load->view('Admin/SuperAdminLogin');
    }

      public function logout() {
        header('Content-Type: application/json');
        
        // Destroy the session
        $this->session->sess_destroy();
        
        // Return JSON response
        $this->output->set_status_header(200)->set_output(json_encode([
            'status' => 'success',
            'message' => 'Logged out successfully'
        ]));
    }


        public function updateAccountInfo()
    {
        header('Content-Type: application/json');

        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->output->set_status_header(405)->set_output(json_encode(['error' => 'Method Not Allowed']));
            return;
        }

        $admin_id = $this->session->userdata('admin_id');
        $role = $this->session->userdata('role');

        if (!$admin_id || $role !== 'superadmin') {
            $this->output->set_status_header(403)->set_output(json_encode(['error' => 'Unauthorized access']));
            return;
        }

        // ✅ Retrieve FormData (POST)
        $email = $this->input->post('email');
        $contact_no = $this->input->post('contact_no');

        if (!$email || !$contact_no) {
            $this->output->set_status_header(400)->set_output(json_encode(['error' => 'Invalid input']));
            return;
        }

        $update_data = ['email' => $email, 'mobile_number' => $contact_no];

        if ($this->Admin_Login_Model->update_account_info($admin_id, $update_data)) {
            $this->output->set_status_header(200)->set_output(json_encode(['message' => 'Account info updated successfully', 'status' => 'success']));
        } else {
            $this->output->set_status_header(500)->set_output(json_encode(['error' => 'Failed to update account info']));
        }
    }

    
    public function GetSuperAdminData()
    {
        header('Content-Type: application/json');

        // Check for role in session (web)
        $role = $this->session->userdata('role');

        // If not found in session, check in POST (mobile app)
        if (!$role) {
            $role = $this->input->post('role');
        }

        // Reject if role is not superadmin
        if ($role !== 'superadmin') {
            echo json_encode(["status" => "error", "message" => "Unauthorized access"]);
            return;
        }

        // Fetch admin data
        $admin_data = $this->Admin_Login_Model->get_user_by_role($role);

        if ($admin_data) {
            echo json_encode([
                "status" => "success",
                "email" => $admin_data->email,
                "contact_no" => $admin_data->mobile_number
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Admin data not found"]);
        }
    }




    // public function updateAccountInfo()
    // {
    //     header('Content-Type: application/json');

    //     if ($this->input->server('REQUEST_METHOD') !== 'POST') {
    //         $this->output->set_status_header(405)->set_output(json_encode(['error' => 'Method Not Allowed']));
    //         return;
    //     }

    //     $admin_id = $this->session->userdata('admin_id');
    //     $role = $this->session->userdata('role');

    //     if (!$admin_id || $role !== 'superadmin') {
    //         $this->output->set_status_header(403)->set_output(json_encode(['error' => 'Unauthorized access']));
    //         return;
    //     }

    //     // ✅ Retrieve FormData (POST)
    //     $email = $this->input->post('email');
    //     $contact_no = $this->input->post('contact_no');

    //     if (!$email || !$contact_no) {
    //         $this->output->set_status_header(400)->set_output(json_encode(['error' => 'Invalid input']));
    //         return;
    //     }

    //     $update_data = ['email' => $email, 'mobile_number' => $contact_no];

    //     if ($this->Admin_Login_Model->update_account_info($admin_id, $update_data)) {
    //         $this->output->set_status_header(200)->set_output(json_encode(['message' => 'Account info updated successfully', 'status' => 'success']));
    //     } else {
    //         $this->output->set_status_header(500)->set_output(json_encode(['error' => 'Failed to update account info']));
    //     }
    // }



    public function AdminLogout()
    {
        // Destroy session
        $role = $this->session->userdata['role'];
        $this->session->unset_userdata(['admin_id', 'mobile_number', 'role']);
        $this->session->sess_destroy();


        redirect('admin/loginPage');
    }

    public function UpdatePassword()
    {
        header('Content-Type: application/json');

        // Allow only POST requests
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->output->set_status_header(405)->set_output(json_encode(['error' => 'Method Not Allowed']));
            return;
        }

        $admin_id = $this->session->userdata('admin_id') ?? $this->input->post("admin_id");
        $role = $this->session->userdata('role') ?? $this->input->post("role");;



        // Ensure admin is logged in and is a superadmin
        if (!$admin_id || $role !== 'superadmin') {
            $this->output->set_status_header(403)->set_output(json_encode(['error' => 'Unauthorized access']));
            return;
        }

        // Get form data
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // Validate input
        if (!$old_password || !$new_password || !$confirm_password) {
            $this->output->set_status_header(400)->set_output(json_encode(['error' => 'All fields are required']));
            return;
        }

        if ($new_password !== $confirm_password) {
            $this->output->set_status_header(400)->set_output(json_encode(['error' => 'New password and confirm password do not match']));
            return;
        }

        if (strlen($new_password) < 6) {
            $this->output->set_status_header(400)->set_output(json_encode(['error' => 'Password must be at least 6 characters']));
            return;
        }

        // Verify old password
        $admin = $this->Admin_Login_Model->get_user_by_id($admin_id);

        if (!$admin || !password_verify($old_password, $admin->password)) {
            $this->output->set_status_header(401)->set_output(json_encode(['error' => 'Incorrect old password']));
            return;
        }

        // Update password
        if ($this->Admin_Login_Model->update_password($admin_id, $new_password)) {
            $this->output->set_status_header(200)->set_output(json_encode(['message' => 'Password updated successfully', 'status' => 'success']));
        } else {
            $this->output->set_status_header(500)->set_output(json_encode(['error' => 'Failed to update password']));
        }
    }



    public function VerifyOldPassword()
    {
        $admin_id = $this->session->userdata('admin_id') ?? $this->input->post("admin_id");
        $old_password = $this->input->post('old_password');

        if (!$admin_id || !$old_password) {
            echo json_encode(["status" => "error", "message" => "Invalid request"]);
            return;
        }

        $is_correct = $this->Admin_Login_Model->check_old_password($admin_id, $old_password);

        if ($is_correct) {
            echo json_encode(["status" => "success", "message" => "Old password is correct"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Old password is incorrect"]);
        }
    }


    public function CheckMobileExists()
    {
        header('Content-Type: application/json');

        $mobile_number = $this->input->post('mobile_number');

        if (empty($mobile_number)) {
            echo json_encode(['status' => 'error', 'message' => 'Mobile number is required.']);
            return;
        }

        $user = $this->Admin_Login_Model->get_user_by_mobile($mobile_number);

        if ($user) {
            echo json_encode(['status' => 'exists', 'message' => 'This mobile number is already registered.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Mobile number is available.']);
        }
    }

    public function CheckEmailExists()
    {
        header('Content-Type: application/json');

        $email = $this->input->post('email');

        if (empty($email)) {
            echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
            return;
        }

        $user = $this->Admin_Login_Model->get_user_by_email($email);

        if ($user) {
            echo json_encode(['status' => 'exists', 'message' => 'This email is already registered.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Email is available.']);
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

    private function Send_request($data)
    {
        $url = $this->api_url . '?' . http_build_query($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }



    public function SendAdminForgotPasswordOTP()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $phone = $this->input->post('mobile_number');
        if (empty($phone)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Mobile number is required.']);
            return;
        }

        $admin = $this->Admin_Login_Model->get_user_by_mobile($phone);
        if (!$admin) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Admin with this mobile number not found.']);
            return;
        }

        // 🔒 Check rate limit: Allow OTP only if last was sent > 60 seconds ago
        $existing_otp_data = $this->Admin_Login_Model->get_otp_temp_by_mobile($phone);
        if ($existing_otp_data) {
            $last_sent = strtotime($existing_otp_data['created_at']);
            $current_time = time();
            $seconds_since_last = $current_time - $last_sent;

            if ($seconds_since_last < 60) { // 60-second cooldown
                http_response_code(429); // Too Many Requests
                echo json_encode(['status' => 'error', 'message' => 'Please wait at least 60 seconds before requesting a new OTP.']);
                return;
            }
        }

        $otp = rand(1000, 9999);
        $otp_data = [
            'mobile_number' => $phone,
            'otp' => $otp,
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Save or update OTP
        $this->Admin_Login_Model->save_otp_temp($otp_data);

        $sent = $this->Send_otp_latest($otp, $phone);
        if ($sent) {
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.']);
        }
    }


    public function VerifyAdminOTP()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $otp = $this->input->post('otp');
        $phone = $this->input->post('mobile_number');

        if (empty($otp) || empty($phone)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'OTP and mobile number are required.']);
            return;
        }

        $data = $this->Admin_Login_Model->get_otp_temp_by_mobile($phone);
        if ($data) {
            if ((time() - strtotime($data['created_at'])) > 1200) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'OTP expired.']);
                return;
            }

            if ($data['otp'] == $otp) {
                $token = bin2hex(random_bytes(16));
                $this->Admin_Login_Model->store_verified_token($phone, $token);

                http_response_code(200);
                echo json_encode([
                    'status' => 'success',
                    'message' => 'OTP verified.',
                    'token' => $token
                ]);
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
            }
        } else {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'No OTP found for this number.']);
        }
    }

    public function UpdateAdminPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
            return;
        }

        $token = $this->input->post('token');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        if (empty($token)) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Missing token.']);
            return;
        }

        $token_data = $this->Admin_Login_Model->get_mobile_by_token($token);
        if (!$token_data) {
            http_response_code(401);
            echo json_encode(['status' => 'error', 'message' => 'Invalid or expired token.']);
            return;
        }

        if (empty($new_password) || empty($confirm_password)) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Both password fields are required.']);
            return;
        }

        if ($new_password !== $confirm_password) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
            return;
        }

        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $updated = $this->Admin_Login_Model->update_password_by_mobile($token_data['mobile_number'], $hashed_password);

        if ($updated) {
            $this->Admin_Login_Model->delete_token($token);
            http_response_code(200);
            echo json_encode(['status' => 'success', 'message' => 'Password updated successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
        }
    }

}