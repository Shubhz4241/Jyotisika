<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once APPPATH . 'third_party/razorpay/Razorpay.php';

use Razorpay\Api\Api;

class User_Api_Controller extends CI_Controller
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


        $this->load->library('session');
        $this->load->model('User_Api_Model');

        $this->load->library('Razorpay_lib');
        $this->load->helper(array('form', 'url'));


    }




    public function Send_otp_latest($otp, $phone)
    {



        $data = [
            'username' => $this->username,
            'apikey' => $this->api_key,
            'apirequest' => 'Text',
            'sender' => $this->sender_id,
            'mobile' => $phone,
            'message' => "Dear User, Your App. Login Secret OTP is {$otp} Valid for 20 Minutes 
                      DO NOT SHARE ANYBODY NewAstro
                 MOBDIG",
            'route' => $this->route_name,
            'TemplateID' => $this->template_id,

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




    public function sendOtpmobile()
    {

        $data = json_decode(file_get_contents("php://input"), true);


        if (!isset($data['mobile_number']) || !preg_match('/^\d{10}$/', $data['mobile_number'])) {
            echo json_encode(["status" => "error", "error" => "Invalid mobile number"]);
            return;
        }

        $otp = rand(1000, 9999);
        $mobile_number = $data['mobile_number'];

        $otpExpiry = time() + (10 * 60);
        if (isset($data['action']) && $data['action'] == "signin") {

            $this->User_Api_Model->saveOtp($mobile_number, $otp, $otpExpiry);


            if ($this->Send_otp_latest($otp, $mobile_number)) {
                echo json_encode(["status" => "success", "otp" => $otp]);
            } else {
                echo json_encode(["status" => "error", "error" => "Failed to send OTP"]);
            }
            return;
        }


        $checklogin = $this->User_Api_Model->checkuserisregistered($data['mobile_number']);

        if ($checklogin == 0) {

            echo json_encode(["status" => "notregistered", "massage" => "User not registered yet"]);
            return;
        }


        $this->User_Api_Model->saveOtp($mobile_number, $otp, $otpExpiry);


        if ($this->Send_otp_latest($otp, $mobile_number)) {
            echo json_encode(["status" => "success", "otp" => $otp]);
        } else {
            echo json_encode(["status" => "error", "error" => "Failed to send OTP"]);
        }
    }
    public function verifyOtp()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {



            $data = json_decode(file_get_contents("php://input"), true);
            $mobile_number = $data['mobile_number'] ?? $this->input->post("mobile_number");
            $otp = $data['otp'] ?? $this->input->post("otp");


            if (!$mobile_number || !$otp) {
                $this->output->set_status_header(400);
                $response = array("status" => "error", "message" => "Mobile number and OTP are required");
            } else {
                $currentTime = time();
                $isValid = $this->User_Api_Model->verifyOtp($mobile_number, $otp, $currentTime);

                if ($isValid) {


                    $UserData = $this->User_Api_Model->getUserByMobile($mobile_number);

                    // $checkdata = $this->User_Api_Model->checkrestrict($UserData['user_id']);

                    // if ($checkdata) {
                    //     $this->output->set_status_header(201);
                    //     $response = array("status" => "resticted", "message" => "user has been resticted to login");
                    //      $this->output->set_content_type("application/json")->set_output(json_encode($response));
                    //     return;
                    // }

                    if ($UserData) {

                        if ($UserData["isRestricted"] == 1) {
                            $this->output->set_status_header(201);
                            $response = array("status" => "userresticted", "message" => "user banned");
                        }else{

                             $this->session->set_userdata([
                            'mobile_number' => $mobile_number,
                            'user_id' => $UserData['user_id'],
                            'user_name' => $UserData["user_name"],
                            'user_image' => $UserData["user_image"],
                            'logged_in' => TRUE
                        ]);



                        $this->output->set_status_header(200);
                        $response = array(
                            "status" => "success",
                            "message" => "Login successful",
                            "mobile_number" => $mobile_number,
                            "user_id" => $UserData['user_id']

                        );

                        }
                       
                    } else {
                        $this->output->set_status_header(201);
                        $response = array("status" => "otpmatchreg", "message" => "user details not found");
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


    public function reg_user()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date('Y-m-d H:i:s', time());
            $data = json_decode(file_get_contents("php://input"), true) ?? [];


            $mobile_number = $data['mobile_number'] ?? $this->input->post("mobile_number") ?? null;
            $otp = $data['otp'] ?? $this->input->post("otp") ?? null;
            $user_name = $data['user_name'] ?? $this->input->post("user_name") ?? null;
            $user_gender = $data['user_gender'] ?? $this->input->post("user_gender") ?? null;
            $user_dob = $data['user_dob'] ?? $this->input->post("user_dob") ?? null;


            $user_data = [
                "user_name" => $user_name,
                "user_gender" => $user_gender,
                "user_dob" => $user_dob,
                "user_mobilenumber" => $mobile_number,
                "created_at" => $timestamp,
                "user_key" => uniqid(),
                "user_otp" => 1234
            ];

            $missing_fields = [];

            if (empty($user_name)) {
                $missing_fields[] = "user_name";
            }
            if (empty($user_gender)) {
                $missing_fields[] = "user_gender";
            }
            if (empty($user_dob)) {
                $missing_fields[] = "user_dob";
            }
            if (empty($mobile_number)) {
                $missing_fields[] = "mobile_number";
            }

            if (!empty($missing_fields)) {
                $this->output->set_status_header(400);
                $response = [
                    "status" => "error",
                    "message" => "The following fields are required: " . implode(", ", $missing_fields)
                ];

            } else {
                $result = $this->User_Api_Model->Register_User_model($user_data);

                if (isset($result['status']) && $result['status'] == 'success') {
                    $this->output->set_status_header(201);


                    $data = $result['data'] ?? null;
                    $this->session->set_userdata([
                        'mobile_number' => $data["user_mobilenumber"],
                        'user_id' => $data["user_id"],
                        'user_name' => $data["user_name"],
                        'user_image' => $data["user_image"],

                        'logged_in' => TRUE
                    ]);


                    $response = [
                        "status" => "success",
                        "message" => "User added successfully",
                        "data" => $data
                    ];
                } else if (isset($result['status']) && $result['status'] == 'usermobilenumberexit') {

                    $response = [
                        "status" => "success",
                        "message" => "User Already exist",

                    ];
                } else {
                    $this->output->set_status_header(500);
                    $response = ["status" => "error", "message" => "User registration failed"];
                }
            }

            // Return JSON response

        } else {
            $this->output->set_status_header(500);
            $response = ["status" => "error", "message" => "Method not allowed"];

        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));
    }



    public function getuser_info()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $response = array("status" => "error", "message" => "Invalid request method");
        } else {

            $session_id = $this->input->post("session_id");

            if (empty($session_id)) {
                $this->output->set_status_header(400);
                $response = array("status" => "error", "message" => "Session ID required");
            } else {
                $result = $this->User_Api_Model->getuser_info_model($session_id);

                if (!is_array($result)) {
                    $this->output->set_status_header(500);
                    $response = array("status" => "error", "message" => "Unexpected response from database");
                } elseif (isset($result["status"]) && $result["status"] === "sessionkeynotfound") {
                    $this->output->set_status_header(401);
                    $response = array(
                        "status" => "sessionkeynotfound",
                        "message" => "Session key not found"
                    );
                } elseif (isset($result["status"]) && $result["status"] === "dberror") {
                    $this->output->set_status_header(500);
                    $response = array(
                        "status" => "dberror",
                        "message" => $result["message"] ?? "Database error",
                        "error_code" => $result["error_code"] ?? null,
                        "error_message" => $result["error_message"] ?? null
                    );
                } elseif (isset($result["status"]) && $result["status"] === "success") {
                    $this->output->set_status_header(200);
                    $response = array("status" => "success", "message" => "User found", "data" => $result["data"]);
                } elseif (isset($result["status"]) && $result["status"] === "failed") {
                    $this->output->set_status_header(404);
                    $response = array("status" => "usernotfound", "message" => "User not found");
                } else {
                    $this->output->set_status_header(400);
                    $response = array("status" => "error", "message" => "User not found in our data");
                }
            }
        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));
    }




    public function update_userprofile()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }

        $session_id = $this->input->post("session_id");

        if (empty($session_id)) {
            $this->output->set_status_header(400);
            echo json_encode(["status" => "error", "message" => "Session ID missing"]);
            return;
        }


        $required_fields = ['user_name', 'user_gender', 'user_dob'];
        foreach ($required_fields as $field) {
            if (empty($this->input->post($field))) {
                $this->output->set_status_header(400);
                echo json_encode(["status" => "error", "message" => ucfirst($field) . " is required"]);
                return;
            }
        }


        if (!is_dir('./uploads/user_image/')) {
            mkdir('./uploads/user_image/', 0777, true);
        }


        $image_path = null;
        if (!empty($_FILES['user_image']['name'])) {
            $config['upload_path'] = './uploads/user_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = uniqid('img_');

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('user_image')) {
                $error_msg = strip_tags($this->upload->display_errors('', ''));
                $this->output->set_status_header(400);
                echo json_encode(["status" => "imguploaderror", "message" => "Image upload failed: " . $error_msg]);
                return;
            } else {
                $image_data = $this->upload->data();
                $image_path = 'uploads/user_image/' . $image_data['file_name'];
            }
        } else {
            $image_path = $this->input->post('current_image_name');
        }


        $userdata = [
            'user_name' => $this->input->post('user_name'),
            'user_gender' => $this->input->post('user_gender'),
            'user_dob' => $this->input->post('user_dob'),
            'user_TimeofBirth' => $this->input->post('user_TimeofBirth'),
            'user_PlaceofBirth' => $this->input->post('user_PlaceofBirth'),
            'user_CurrentAddress' => $this->input->post('user_CurrentAddress'),
            'user_City' => $this->input->post('user_City'),
            'user_Pincode' => $this->input->post('user_Pincode'),
            'user_image' => $image_path
        ];


        $result = $this->User_Api_Model->update_userprofile_model($userdata, $session_id);


        if (!is_array($result)) {
            log_message('error', 'Unexpected response from database: ' . json_encode($result));
            $this->output->set_status_header(500);
            $response = ["status" => "error", "message" => "Unexpected response from database"];
        } elseif ($result["status"] === "sessionerror") {
            $this->output->set_status_header(400);
            $response = ["status" => "error", "message" => "Session ID Missing"];
        } elseif ($result["status"] === "databaseerror") {
            $this->output->set_status_header(500);
            log_message('error', 'Database Error: ' . json_encode($result));
            $response = [
                "status" => "error",
                "message" => $result["message"] ?? "Database error",
                "error_code" => $result["error_code"] ?? null,
                "error_message" => $result["error_message"] ?? null
            ];



        } elseif ($result["status"] === "success") {
            $this->output->set_status_header(200);
            $data = $result["data"];
            $this->session->set_userdata([

                //   'mobile_number' => $data["user_mobilenumber"],
                'user_id' => $data["user_id"],
                'user_name' => $data["user_name"],
                'user_image' => $data["user_image"],
                'mobile_number' => $data["user_mobilenumber"],

                'logged_in' => TRUE


            ]);



            $response = ["status" => "success", "message" => "User updated successfully"];
        } elseif ($result["status"] === "warning") {
            $this->output->set_status_header(200);
            $response = ["status" => "warning", "message" => "No changes were made to the profile"];
        } else {
            log_message('error', 'Unexpected response from database: ' . json_encode($result));
            $this->output->set_status_header(500);
            $response = ["status" => "error", "message" => "Unexpected response from database"];
        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));
    }







    //Razerpay payment for wallet

    public function create_razorpay_order()
    {

        $json_input = file_get_contents("php://input");
        $data = json_decode($json_input, true);


        if (!$data || !isset($data['amount']) || !isset($data['user_id'])) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input"]);
            return;
        }


        $session_id = $data['user_id'];
        if (empty($session_id)) {
            echo json_encode(["status" => "error", "message" => "User not logged in"]);
            return;
        }


        $amount = $data['amount'];
        if (!is_numeric($amount) || $amount <= 0) {
            echo json_encode(["status" => "error", "message" => "Invalid payment amount"]);
            return;
        }

        try {
            $razorpay_order = $this->razorpay_lib->create_order($data['amount'], 'ORD_' . rand(1000, 9999));
            if (!$razorpay_order) {
                throw new Exception('Failed to create Razorpay order');
            }


            $this->session->set_userdata('razorpay_order_id', $razorpay_order['id']);


            echo json_encode([
                'status' => 'success',
                'order_id' => $razorpay_order['id'],
                'amount' => $data['amount'],
                // 'key' => 'rzp_test_cFYTpLVvrC4FFn',

                // 'key' => 'rzp_test_n9TyNiHflMp51H',

                // 'key' => 'rzp_live_aKnqCVUpRcVAoS',


                //Jyotisika test payment

                'key' => 'rzp_test_YcEtdZa9f7N8R6',


                //Jyotisika live payment

                // 'key' => 'rzp_live_OhYeV3XCMIFBH5',






                // 'name'           => $user->username,
                // 'email'          => $user->email,
                // 'payment_type'   => $payment_method,
                // 'is_direct'      => $is_direct_purchase ? 'yes' : 'no' // Identify purchase type in response
            ]);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    //Update wallet function

    public function processPayment()
    {


        $json_input = file_get_contents("php://input");
        $data = json_decode($json_input, true);


        if (!$data || !isset($data['amount']) || !isset($data['user_id'])) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input"]);
            return;
        }

        $payment_id = $data['payment_id'];
        $razorpay_signature = $data['razorpay_signature'];
        $order_id = $data['order_id'];

        $is_valid = $this->razorpay_lib->verify_payment($payment_id, $order_id, $razorpay_signature);
        if (!$is_valid) {
            echo json_encode(["status" => "error", "message" => "Wallet update failed: "]);
            return;
        }



        $session_id = $data['user_id'];
        if (empty($session_id)) {
            echo json_encode(["status" => "error", "message" => "User not logged in"]);
            return;
        }


        $amount = $data['amount'];
        if (!is_numeric($amount) || $amount <= 0) {
            echo json_encode(["status" => "error", "message" => "Invalid payment amount"]);
            return;
        }

        $query = $this->User_Api_Model->updatewallet_model($session_id, intval($amount));

        if ($query) {

            echo json_encode(["status" => "success", "message" => "Payment successful, wallet updated"]);

        } else {
            echo json_encode(["status" => "error", "message" => "Wallet update failed: "]);
        }

    }




    //Astrologer data


    public function getastrologer()
    {

        if ($_SERVER["REQUEST_METHOD"] != "GET") {

            $this->output->set_status_header(405);
            $response = [
                "status" => "error",
                "message" => "Request method not allowed"
            ];

            echo json_encode($response);
            return;
        } else {

            $query = $this->User_Api_Model->getastrologer_model();

            if ($query) {

                $this->output->set_status_header(200);
                $response = [
                    "status" => "success",
                    "message" => "The astrologer's which are online and approved by admin",
                    "data" => $query
                ];


            } else {
                $this->output->set_status_header(500);

                $response = [
                    "status" => "warning",
                    "message" => "There is no astrologer available which are online or approved by admin"
                ];

            }

        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));
    }

    public function get_astrologer_by_id()
    {

        $astrologer_id = $this->input->post("astrologer_id");

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Method not allowed"
            ];
            $this->output->set_status_header(405);

            echo json_encode($response);
            return;
        } else if (empty($astrologer_id)) {

            $response = [
                "status" => "error",
                "message" => "Astrologer id is missing"
            ];
            $this->output->set_status_header(405);

            echo json_encode($response);
            return;

        } else {

            $query = $this->User_Api_Model->get_astrologer_by_id_model($astrologer_id);


            if ($query) {
                $this->output->set_status_header(200);
                $response = [
                    "status" => "success",
                    "message" => "Astrolger data fetched successfully",
                    "data" => $query
                ];

            } else {

                $this->output->set_status_header(500);
                $response = [
                    "status" => "error",
                    "message" => "There is no astrologer available"
                ];

            }
            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));
        }

    }

    public function followastrologer()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];
            $this->output->set_status_header(405);

            echo json_encode($response);
            return;
        } else {

            $astrologer_id = $this->input->post("astrologer_id");
            $user_id = $this->input->post("session_id");

            if (empty($astrologer_id) || empty($user_id)) {

                $response = [
                    "status" => "error",
                    "message" => "astrolger id or user id is missing  "
                ];
                $this->output->set_status_header(405);

                echo json_encode($response);
                return;


            }

            $data = [
                "astrologer_id" => $astrologer_id,
                "user_id" => $user_id
            ];

            $query = $this->User_Api_Model->followastrologer_model($data);
            if ($query["status"] == "success") {

                $response = [
                    "status" => "success",
                    "message" => "succcessfully followed the astrologer",

                ];
                $this->output->set_status_header(200);


            } else if (($query["status"] == "exist")) {

                $response = [
                    "status" => "warning",
                    "message" => "you already  followed the astrologer",

                ];
                $this->output->set_status_header(200);

            } else {

                $this->output->set_status_header(405);

                $response = [
                    "status" => "error",
                    "messgae" => " there is error in sql query",
                ];
            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));

        }
    }



    public function checkfollow_status()
    {

        $astrologer_id = $this->input->post("astrologer_id");
        $session_id = $this->input->post("session_id");

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];

            $this->output->set_status_header(405);

            echo json_encode($response);
            return;
        } else {

            if ((!$astrologer_id) || (!($session_id))) {
                $response = [
                    "status" => "error",
                    "message" => "Astologer id missing"
                ];

                $this->output->set_status_header(405);
                echo json_encode($response);
                return;

            } else {

                $data = [
                    "session_id" => $session_id,
                    "astrologer_id" => $astrologer_id
                ];

                $query = $this->User_Api_Model->checkfollow_status_model($data);

                if (($query["status"] == "success") && ($query["value"] == "followed")) {

                    $response = [
                        "status" => "success",
                        "value" => "followed"
                    ];
                    $this->output->set_status_header(200);


                } else if (($query["status"] == "success") && ($query["value"] == "unfollowed")) {
                    $response = [
                        "status" => "success",
                        "value" => "unfollowed"
                    ];

                    $this->output->set_status_header(200);

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "there is error in sql query",
                    ];
                    $this->output->set_status_header(500);
                }

                $this->output->set_content_type("application/json");
                $this->output->set_output(json_encode($response));
            }
        }


    }


    public function show_top_astrologer()
    {

        if ($_SERVER["REQUEST_METHOD"] != "GET") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];

            $this->output->set_status_header(405);
            echo json_encode($response);
            return;
        } else {

            $query = $this->User_Api_Model->show_top_astrologer_model();

            if ($query) {

                $response = [
                    "status" => "success",
                    "data" => $query,
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "There is no data in table"
                ];

            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));
        }



    }


    public function getfollowed_astrologer_by_user()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];

            echo json_encode($response);
            return;
        } else {

            $session_id = $this->input->post("session_id");

            if (!$session_id) {

                $response = [
                    "status" => "error",
                    "message" => "User id is missing"
                ];

                echo json_encode($response);
                return;

            }

            $query = $this->User_Api_Model->getfollowed_astrologer_by_user_model($session_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "data" => $query,
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "There is no data in table"
                ];

            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));


        }

    }

    public function unfollowastrologer()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];

            echo json_encode($response);
            return;
        } else {

            $session_id = $this->input->post("session_id");

            $astrologer_id = $this->input->post("astrologer_id");

            if (empty($astrologer_id) && empty($session_id)) {

                $response = [
                    "status" => "error",
                    "message" => "User id is missing"
                ];

                echo json_encode($response);
                return;

            } else {

                $data = [
                    "astrologer_id" => $astrologer_id,
                    "session_id" => $session_id
                ];
                $query = $this->User_Api_Model->unfollowastrologer_model($data);

                if ($query["status"] == "success") {
                    $response = [
                        "status" => "success",
                        "message" => "astrologer unfollowed successfully"
                    ];


                } else if ($query["status"] == "notfound") {
                    $response = [
                        "status" => "notfound",
                        "message" => "astrologer not unfollwed"
                    ];

                } else {

                    $response = [
                        "status" => "error",
                        "message" => "there is error in sql query"
                    ];

                }

                $this->output->set_content_type("application/json");
                $this->output->set_output(json_encode($response));



            }



        }




    }


    public function get_astrologer_chat_with_user()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"

            ];

            echo json_encode($response);
            return;
        } else {
            $session_id = $this->input->post("session_id");

            if (empty($session_id)) {
                $response = [
                    "status" => "error",
                    "message" => "pls fill all the filleds"

                ];
                echo json_encode($response);
                return;

            }

            $query = $this->User_Api_Model->get_astrologer_chat_with_user_model($session_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "feedback  submitted",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "feedback not submitted",
                ];
            }


            echo json_encode($response);
            return;


        }


    }

    public function feedback()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"

            ];

            echo json_encode($response);
            return;
        } else {

            $astrologer_id = $this->input->post("astrologer_id");
            $feedback = $this->input->post("message");
            $user_id = $this->input->post("session_id");
            $ratings = $this->input->post("astologerrating");

            if (empty($astrologer_id) || empty($feedback) || empty($user_id) || empty($ratings)) {
                $response = [
                    "status" => "error",
                    "message" => "pls fill all the filleds"

                ];

                echo json_encode($response);
                return;
            } else {


                $data = [

                    "astrologer_id" => $astrologer_id,
                    "feedback" => $feedback,
                    "rating" => $ratings,
                    "user_id" => $user_id

                ];
                $query = $this->User_Api_Model->submitfeedback($data);

                if ($query) {

                    $response = [
                        "status" => "success",
                        "message" => "feedback  submitted",
                    ];
                } else {

                    $response = [
                        "status" => "error",
                        "message" => "feedback not submitted",
                    ];
                }


                echo json_encode($response);
                return;
            }
        }
    }


    public function getastrologerfeedback()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "errror",
                "message" => "Invalid request method"
            ];

            echo json_encode($response);
            return;
        } else {

            $astrologer_id = $this->input->post("astrologer_id");



            if (!$astrologer_id) {

                $response = [
                    "status" => "error",
                    "message" => "pls provide astrolger id",
                ];

                echo json_encode($response);
                return;

            }

            $query = $this->User_Api_Model->get_astrologer_feedback_model($astrologer_id);

            if ($query) {


                $response = [
                    "status" => "success",
                    "data" => $query,
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is error in sql query"
                ];
            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));

        }


    }



    public function get_avg_rating()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"

            ];

            echo json_encode($response);
            return;
        } else {

            $astrologer_id = $this->input->post("astrologer_id");

            if (!$astrologer_id) {

                $response = [
                    "status" => "error",
                    "message" => "pls provide astrolger id",
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->get_avg_rating_model($astrologer_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "data" => $query,
                ];

            } else {
                $response = [
                    "status" => "error",
                    "message" => "rating not fetched yet",
                ];


            }

            echo json_encode($response);

        }
    }


    //Get Products
    public function getproduct()
    {

        if ($_SERVER["REQUEST_METHOD"] != "GET") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"

            ];

            echo json_encode($response);
            return;
        } else {

            $query = $this->User_Api_Model->getproducts_model();

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "products fetched successfully",
                    "data" => $query,
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no data in table"
                ];

            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));

        }
    }

    public function get_specific_product()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"

            ];

            echo json_encode($response);

            return;
        } else {

            $product_id = $this->input->post("product_id");

            if (empty($product_id)) {
                $response = [
                    "status" => "error",
                    "message" => "product id is missing"

                ];

                echo json_encode($response);
                return;
            } else {

                $query = $this->User_Api_Model->get_specific_product_model($product_id);

                if ($query) {

                    $response = [
                        "status" => "success",
                        "message" => "product data fetched",
                        "data" => $query,

                    ];

                } else {

                    $response = [
                        "status" => "error",
                        "message" => "product not exist"

                    ];

                }
            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));


        }

    }

    public function save_delivery_address()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"

            ];

            echo json_encode($response);

            return;
        } else {




            $username = $this->input->post("user_fullname");
            $useremail = $this->input->post("user_email");
            $useraddress = $this->input->post("user_Address");
            $usercity = $this->input->post("user_city");
            $userstate = $this->input->post("user_state");
            $userpincode = $this->input->post("user_pincode");

            $userphonenumber = $this->input->post("user_phonenumber");

            $user_id = $this->input->post("session_id");

            if (empty($username) || empty($useremail) || empty($useraddress) || empty($usercity) || empty($userpincode) || empty($user_id) || empty($userstate)) {

                $response = [
                    "status" => "error",
                    "message" => "pls fill all the fileds"

                ];

                echo json_encode($response);
                return;
            }
            $data = [
                "user_name" => $username,
                "user_address" => $useraddress,
                "user_city" => $usercity,
                "user_pincode" => $userpincode,
                "user_phonenumber" => $userphonenumber,
                "user_state" => $userstate,
                "user_id" => $user_id,
                "user_email" => $useremail,

            ];

            $query = $this->User_Api_Model->save_user_address($data);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "address saved successfully"

                ];


            } else {

                $response = [
                    "status" => "error",
                    "message" => "address not saved"

                ];

            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));

        }
    }


    public function get_delivery_address()
    {


        if ($_SERVER["REQUEST_METHOD"] != "POST") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"

            ];

            echo json_encode($response);

            return;
        }


        $user_id = $this->input->post("session_id");
        if (!$user_id) {

            $response = [
                "status" => "error",
                "message" => "user id is missing"

            ];

            echo json_encode($response);

            return;

        } else {

            $query = $this->User_Api_Model->get_delivery_address_model($user_id);
            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "Address fetched successfully",
                    "data" => $query,

                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "There is no address availble with this id",


                ];


            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));


        }


    }







    //Ordered Products

    // public function show_products()
    // {

    //     if ($_SERVER["REQUEST_METHOD"] != "GET") {

    //         $response = [
    //             "status" => "error",
    //             "message" => "Invalid request method"
    //         ];

    //         echo json_encode($response);
    //         return;
    //     } else {




    //     }

    // }


    public function show_online_puja()
    {

        if ($_SERVER["REQUEST_METHOD"] != "GET") {

            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];

            echo json_encode($response);
            return;
        } else {

            $query = $this->User_Api_Model->show_online_puja_model();

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "Puja details fetched successfully",
                    "data" => $query
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "There is no puja availble right now"
                ];
            }

        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));


    }


    public function show_specific_puja()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];

            echo json_encode($response);
            return;
        } else {

            $puja_id = $this->input->post("puja_id");

            if (empty($puja_id)) {

                $response = [
                    "status" => "error",
                    "message" => "pls fill all the fileds"
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->show_specific_puja_model($puja_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "Puja fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "puja fetched successfully"
                ];

            }
            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));

        }



    }


    public function show_puja_info()
    {

        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            $response = [
                "status" => "error",
                "message" => "Invalid request method"
            ];

            echo json_encode($response);
            return;
        } else {

            $puja_id = $this->input->post("puja_id");

            if (empty($puja_id)) {

                $response = [
                    "status" => "error",
                    "message" => "pls fill all the fileds"
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->show_puja_info_model($puja_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "Puja fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "puja fetched successfully"
                ];

            }
            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));

        }
    }


    // public function show_online_pujari()
    // {

    //     if ($_SERVER["REQUEST_METHOD"] != "POST") {
    //         $response = [
    //             "status" => "error",
    //             "message" => "Invalid request method"
    //         ];

    //         echo json_encode($response);
    //         return;
    //     } else {

    //         $puja_id = $this->input->post("puja_id");

    //         if (empty($puja_id)) {

    //             $response = [
    //                 "status" => "error",
    //                 "message" => "Puja id is missing"
    //             ];

    //         } else {

    //             $query = $this->User_Api_Model->show_online_pujari_model();

    //             if ($query) {
    //                 $response = [
    //                     "status" => "success",
    //                     "message" => "Pujari fetched successfully",
    //                     "data" => $query
    //                 ];

    //             } else {
    //                 $response = [
    //                     "status" => "error",
    //                     "message" => "There is no pujari available"
    //                 ];
    //             }
    //         }

    //         $this->output->set_content_type("application/json");
    //         $this->output->set_output(json_encode($response));

    //     }
    // }


    public function AddToCart()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }


        $product_id = $this->input->post("product_id");

        $user_id = $this->input->post("session_id");
        $product_price = $this->input->post("product_price");
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d H:i:s', time());

        if (empty($user_id) || empty($product_id) || empty($product_price)) {
            $this->output->set_status_header(400);
            $this->output->set_content_type('application/json');
            echo json_encode([
                "status" => "error",
                "message" => "Missing required fields",
                "missing_fields" => [
                    "session_id" => empty($user_id) ? "Required" : "OK",
                    "product_id" => empty($product_id) ? "Required" : "OK",
                    "product_price" => empty($product_price) ? "Required" : "OK"
                ]
            ]);
            return;
        }

        $formdata = [
            "product_price" => $product_price,
            "product_id" => $product_id,
            "user_id" => $user_id,
            "created_at" => $timestamp,
        ];



        $response = $this->User_Api_Model->AddToCart_model($formdata);

        if ($response["status"] === "success") {
            $this->output->set_status_header(200);
            $response = [
                "status" => "success",
                "message" => "Product added in cart"

            ];
        } elseif ($response["status"] === "productalreadyexist") {
            $this->output->set_status_header(200);
            $response = [
                "status" => "productalreadyexist",
                "message" => "Product aleredy in cart"

            ];
        } else {
            $this->output->set_status_header(500);
            $response = [
                "status" => "error",
                "message" => "Failed to add"

            ];
        }


        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));

    }


    public function VerifyProductInTheCart()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }

        $user_id = $this->input->post("session_id");
        $product_id = $this->input->post("product_id");

        if (empty($user_id) || empty($product_id)) {
            $this->output->set_status_header(400);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "massage" => "some fields are missing", "product_id" => $product_id, "user_id" => $user_id]));
            return;
        }


        $result = $this->User_Api_Model->VerifyProductInTheCart_model($user_id, $product_id);


        if ($result['status'] === 'success') {
            $response = [

                "data" => "notexist",
                "message" => "No products  not found in cart"
            ];
            $this->output->set_status_header(200);
        } elseif ($result['status'] === 'productalreadyexist') {
            $response = [

                "data" => "exist",
                "message" => "products found in cart"
            ];
            $this->output->set_status_header(200); // Conflict status code
        } else {
            $this->output->set_status_header(500); // Internal Server Error
        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($response));
    }


    public function GetCartData()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        } else {

            $user_id = $this->input->post("session_id");

            if (empty($user_id)) {

                $response = [

                    "status" => "error",
                    "message" => "user id or product id is missing"
                ];

                echo json_encode($response);
                return;
            }




            $query = $this->User_Api_Model->GetCartData_model($user_id);

            if ($query) {

                $response = [

                    "status" => "success",
                    "message" => "products fetched successfully",
                    "data" => $query
                ];
            } else {


                $response = [

                    "status" => "error",
                    "message" => "user id or product id is missing"
                ];

            }

            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response));
        }

    }






    public function save_razorpay_order()
    {

        $json_input = file_get_contents("php://input");
        $data = json_decode($json_input, true);


        if (!$data || !isset($data['amount'])) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input amount"]);
            return;
        }

        $user_id = $data['user_id'];

        $getcartdata = $this->User_Api_Model->getcartdata_razerpay_model_($user_id);


        $subtotal = array_reduce($getcartdata, function ($sum, $item) {
            return $sum + ($item->product_price * $item->product_quantity);
        }, 0);

        $total_price = $subtotal + 40;

        // $session_id = $this->session->userdata('user_id');
        // if (empty($session_id)) {
        //     echo json_encode(["status" => "error", "message" => "User not logged in"]);
        //     return;
        // }


        $amount = $total_price;
        if (!is_numeric($amount) || $amount <= 0) {
            echo json_encode(["status" => "error", "message" => "Invalid payment amount"]);
            return;
        }

        try {
            $razorpay_order = $this->razorpay_lib->create_order($total_price, 'ORD_' . rand(1000, 9999));
            if (!$razorpay_order) {
                throw new Exception('Failed to create Razorpay order');
            }


            $this->session->set_userdata('razorpay_order_id', $razorpay_order['id']);


            echo json_encode([
                'status' => 'success',
                'order_id' => $razorpay_order['id'],
                'amount' => $total_price, // Convert to paisa



                // 'key' => 'rzp_test_cFYTpLVvrC4FFn',   rutuja mam dashboard

                // 'key' => 'rzp_test_n9TyNiHflMp51H',
                // jotishvitaran

                // 'key' => 'rzp_live_aKnqCVUpRcVAoS',


                'key' => 'rzp_test_YcEtdZa9f7N8R6',


                //Javascript live keys


                // 'key' => 'rzp_live_OhYeV3XCMIFBH5',


                // 'name'           => $user->username,
                // 'email'          => $user->email,
                // 'payment_type'   => $payment_method,
                // 'is_direct'      => $is_direct_purchase ? 'yes' : 'no' // Identify purchase type in response
            ]);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function saveorder()
    {

        $json_input = file_get_contents("php://input");
        $data = json_decode($json_input, true);

        // Validate JSON data
        if (!$data || !isset($data['addressid'])) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input"]);
            return;
        }

        $payment_id = $data['payment_id'];
        $razorpay_signature = $data['razorpay_signature'];
        $order_id = $data['order_id'];

        $is_valid = $this->razorpay_lib->verify_payment($payment_id, $order_id, $razorpay_signature);
        if (!$is_valid) {
            echo json_encode(["status" => "error", "message" => "order processing  failed: "]);
            return;
        }


        $addressid = $data['addressid'];

        $user_id = $data['user_id'];

        $getuserinfo = $this->User_Api_Model->getuserinfo_model($addressid);

        $getcartdata = $this->User_Api_Model->getcartdata_model_data($user_id);


        $subtotal = array_reduce($getcartdata, function ($sum, $item) {
            return $sum + ($item->product_price * $item->product_quantity);
        }, 0);


        $total_price = $subtotal + 40;

        $getuserdata = $getuserinfo[0];

        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d H:i:s', time());


        $order_data = [
            'user_id' => $user_id,
            'order_no' => 'ORD_' . date('YmdHis') . rand(1000, 9999),
            'user_fullname' => $getuserdata->user_name,
            'user_email' => $getuserdata->user_email,
            'user_phonenumber' => $getuserdata->user_phonenumber,
            'user_address' => $getuserdata->user_address,
            'user_state' => $getuserdata->user_state,
            'user_city' => $getuserdata->user_city,
            'user_pincode' => $getuserdata->user_pincode,
            'price' => $total_price,
            'status' => 'pending',
            'payment_status' => "paid",
            'order_subtotal' => $subtotal,
            'order_shipping_charges' => 40,
            'order_date' => $timestamp,
            'payment_id' => $payment_id,

        ];


        $order_id = $this->User_Api_Model->create_order($order_data);

        if (!$order_id) {
            $this->db->trans_rollback();
            echo json_encode(['status' => 'error', 'message' => 'Failed to place order']);
            return;
        }




        foreach ($getcartdata as $item) {
            $order_item_data = [
                'product_id' => $item->product_id,
                'quantity' => $item->product_quantity,
                'total_price' => $item->product_price * $item->product_quantity,
                'price_per_product' => $item->product_price,
                'order_id' => $order_id,

                'created_at' => $timestamp
            ];
            $this->User_Api_Model->add_order_item($order_item_data);


            // $this->User_Api_Model->decrese_stock($order_item_data);


        }


        $removeitems = $this->User_Api_Model->remove_cart_items($user_id);


        echo json_encode(['status' => 'success', 'message' => 'Order placed successfully']);




    }


    public function updateQuantity()
    {


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }

        $product_id = trim($this->input->post("product_id"));
        $session_id = $this->input->post('session_id');
        $quantity = (int) $this->input->post("quantity"); // Ensure it's an integer


        if (empty($product_id) || empty($session_id) || $quantity <= 0) {
            echo json_encode(["status" => "error", "message" => "Invalid input data"]);
            return;
        }

        $result = $this->User_Api_Model->updatequantity_model($product_id, $session_id, $quantity);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "Quantity updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update quantity"]);
        }

        // echo json_encode( $response);



    }


    public function deleteproductfromcart()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }


        $product_id = trim($this->input->post("product_id"));
        $session_id = $this->input->post('session_id');

        if (empty($product_id) || empty($session_id)) {
            echo json_encode(["status" => "error", "message" => "Invalid input data"]);
            return;
        }

        $result = $this->User_Api_Model->deleteproductfromcart_model($product_id, $session_id);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "Quantity updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update quantity"]);
        }

    }


    public function showorderedproducts()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        }

        $user_id = $this->input->post('user_id');
        if (empty($user_id)) {
            $this->output->set_status_header(400);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid input:User id not passed from function"]));
            return;
        }

        $query = $this->User_Api_Model->showorderedproducts_model($user_id);

        if ($query) {
            echo json_encode([
                "status" => "success",
                "message" => "Ordered data featched successfully",
                "data" => $query
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Ordered Data not featched successfully"
            ]);
        }

    }

    public function showorderedproducts_shipped()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        }

        $user_id = $this->input->post('user_id');
        if (empty($user_id)) {
            $this->output->set_status_header(400);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid input:User id not passed from function"]));
            return;
        }

        $query = $this->User_Api_Model->showorderedproducts_model_shipped($user_id);

        if ($query) {
            echo json_encode([
                "status" => "success",
                "message" => "Ordered data featched successfully",
                "data" => $query
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Ordered Data not featched successfully"
            ]);
        }

    }


    // public function productfeedback()
    // {

    //     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         $this->output->set_status_header(405);
    //         $this->output->set_content_type('application/json');
    //         $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
    //         return;
    //     }

    //     $session_id = $this->input->post("session_id");
    //     $message = $this->input->post("message");
    //     $product_id = $this->input->post("product_id");
    //     $productrating = $this->input->post("productrating");


    //     if (!$session_id || !$message || !$product_id || !$productrating) {

    //         $this->output->set_status_header(400);
    //         $this->output->set_content_type('application/json');
    //         $this->output->set_output(json_encode(["status" => "error", "message" => "id not found"]));
    //         return;
    //     }

    //     $formdata = [

    //         "session_id" => $session_id,
    //         "message" => $message,
    //         "product_id" => $product_id,
    //         "productrating" => $productrating,

    //     ];

    //     $query = $this->User_Api_Model->save_feedback($formdata);

    //     if ($query) {

    //         $response = [
    //             "status" => "success",
    //             "message" => "feedback saved successfully"
    //         ];
    //     } else {
    //         $response = [
    //             "status" => "error",
    //             "message" => "feedback not saved successfully"
    //         ];

    //     }

    //     echo json_encode($response);

    // }


    public function productfeedback()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        }

        $session_id = $this->input->post("session_id");
        $message = $this->input->post("message");
        $product_id = $this->input->post("product_id");
        $productrating = $this->input->post("productrating");

        if (!$session_id || !$message || !$product_id || !$productrating) {
            $this->output->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(["status" => "error", "message" => "Missing required fields"]));
            return;
        }

        $product_image_name = null;


        if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === 0) {
            $upload_path = './uploads/product_feedback_image/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true);
            }

            $extension = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
            $product_image_name = 'feedback_' . time() . '_' . rand(1000, 9999) . '.' . $extension;
            $destination = $upload_path . $product_image_name;

            if (!move_uploaded_file($_FILES['product_image']['tmp_name'], $destination)) {
                $this->output->set_status_header(500)
                    ->set_content_type('application/json')
                    ->set_output(json_encode(["status" => "error", "message" => "Failed to upload image"]));
                return;
            }
        }

        $formdata = [
            "session_id" => $session_id,
            "message" => $message,
            "product_id" => $product_id,
            "productrating" => $productrating,
            "product_feedback_image" => "uploads/product_feedback_image/" . $product_image_name // this should be a column in your DB
        ];

        $query = $this->User_Api_Model->save_feedback($formdata);

        if ($query) {
            $response = [
                "status" => "success",
                "message" => "Feedback saved successfully"
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "Feedback not saved"
            ];
        }

        echo json_encode($response);
    }




    public function show_product_feedback()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        }

        $product_id = $this->input->post("product_id");

        if (!$product_id) {
            $this->output->set_status_header(400);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "product id not found"]));
            return;
        } else {

            $query = $this->User_Api_Model->show_product_feedback_model($product_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "feedback  data fetched successfully",
                    "data" => $query
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "feedback data not fetched successfully"
                ];

            }

            echo json_encode($response);

        }



    }

    public function get_avg_rating_of_product()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        }
        $product_id = $this->input->post("product_id");

        if (!$product_id) {
            $this->output->set_status_header(400);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "product id not found"]));
            return;
        } else {
            $query = $this->User_Api_Model->get_avg_rating_of_product_model($product_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "feedback  data fetched successfully",
                    "data" => $query
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "feedback data not fetched successfully"
                ];

            }

            echo json_encode($response);

        }
    }





    public function show_puja()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $query = $this->User_Api_Model->show_puja_model();

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "puja feached successfully",
                    "data" => $query
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "There is error in fetching data"
                ];

            }

        }
        echo json_encode($response);
    }

    public function get_pujari_of_puja()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $puja_id = $this->input->post("puja_id");

            if (!$puja_id) {
                $response = [
                    "status" => "error",
                    "message" => "puja id missing in the table",


                ];
                echo json_encode($response);
                return;
            }

            $query = $this->User_Api_Model->get_pujari_of_puja_model($puja_id);

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query

                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "there is error"


                ];

            }

            echo json_encode($response);
        }

    }

    public function pujari_view_more()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {



            $pujari_id = $this->input->post("pujari_id");
            $puja_id = $this->input->post("puja_id");

            if (empty($pujari_id) || empty($puja_id)) {
                $response = [
                    "status" => "error",
                    "message" => "pujari id or puja id is missing"


                ];
                echo json_encode($response);

                return;
            } else {

                $query = $this->User_Api_Model->pujari_view_more_model($pujari_id, $puja_id);

                if ($query) {

                    $response = [
                        "status" => "success",
                        "message" => "data fetched successfully",
                        "data" => $query
                    ];
                } else {

                    $response = [
                        "status" => "error",
                        "message" => "no data found in the  table"
                    ];

                }

                echo json_encode($response);
            }
        }


    }



    public function send_request_to_pujari()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $pujari_id = $this->input->post("pujari_id");
            $service_id = $this->input->post("service_id");

            $user_id = $this->input->post("user_id");
            $pujari_charge = $this->input->post("pujari_charges");
            $pujadate = $this->input->post("pujadate");
            $user_email = $this->input->post("useremail");
            $puja_mode = $this->input->post("puja_mode");
            $pujatime = $this->input->post("pujatime");
            $mob_puja_id = $this->input->post("mob_puja_id");
            $puja_image = $this->input->post("puja_image");

            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date('Y-m-d H:i:s', time());

            // if (empty($pujari_id) || empty($user_id) || empty($pujari_charge) || empty($pujadate) || empty($user_email) || empty($puja_mode) || empty($pujatime)) {
            //     $response = [
            //         "status" => "error",
            //         "message" => "no data found in the  table"
            //     ];
            //     echo json_encode($response);
            //     return;
            // }

            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date('Y-m-d H:i:s');







            $puja_datetime = new DateTime("$pujadate $pujatime");
            $request_datetime = new DateTime($timestamp);
            if ($puja_datetime <= $request_datetime) {
                $total_hours = 0;
            } else {
                $interval = $request_datetime->diff($puja_datetime);
                $total_hours = ($interval->days * 24) + $interval->h + ($interval->i / 60) + ($interval->s / 3600);
            }

            if ($total_hours > 48) {
                $puja_urgency = 'normal';
            } elseif ($total_hours > 4) {
                $puja_urgency = 'urgent';
            } else {
                $puja_urgency = 'invalid';
            }


            // print_r($total_hours);

            // exit();


            if ($total_hours < 4 || $puja_urgency == 'invalid') {
                echo json_encode([
                    "status" => "pujawarning",
                    "message" => "the start time must be within 4 hours"
                ]);
                return;
            }





            $formdata = [
                "pujari_id" => $pujari_id,
                "jyotisika_user_id" => $user_id,
                "service_id" => $service_id,
                "user_email" => $user_email,
                "pujari_charge" => $pujari_charge,
                "puja_mode" => $puja_mode,
                "puja_date" => $pujadate,
                "mob_puja_id" => $mob_puja_id,
                "puja_time" => $pujatime,
                "request_created_at" => $timestamp,
                "puja_urgency" => $puja_urgency,
                "payment_status" => "Pending",
                "puja_image" => $puja_image,


            ];

            $query = $this->User_Api_Model->send_request_to_pujari_model($formdata);


            if ($query["status"] == "success") {

                $response = [
                    "status" => "success",
                    "message" => "data founded in server"
                ];
            } else if ($query["status"] == "pujarialreadybooked") {
                $response = [
                    "status" => "warning",
                    "message" => "pujari already booked "
                ];

            } else if ($query["status"] == "requestgetalready") {
                $response = [
                    "status" => "requestgetalready",
                    "message" => "you already send requested to book this mob puja"
                ];

            } else if ($query["status"] == "userfull") {
                $response = [
                    "status" => "userfull",
                    "message" => "user full "
                ];

            } else {
                $response = [
                    "status" => "error",
                    "message" => "data not inserted in the table"
                ];
            }



            echo json_encode($response);
            return;

        }
    }


    public function get_booked_puja()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $user_id = $this->input->post("session_id");

            if (!$user_id) {
                $response = [
                    "status" => "error",
                    "message" => "user id not found"
                ];

                echo json_encode($response);
                return;
            }

            $query = $this->User_Api_Model->get_booked_puja_model($user_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "data not fetched successfully"
                ];

            }

            echo json_encode($response);

        }

    }


    public function show_mob_puja()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
            return;
        }

        $query = $this->User_Api_Model->show_mob_puja_model();

        if ($query) {
            $response = [
                "status" => "success",
                "message" => "Mob puja fetched successfully",
                "data" => $query
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "No mob puja data found"
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function get_completed_puja()
    {


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $user_id = $this->input->post("session_id");

            if (!$user_id) {
                $response = [
                    "status" => "error",
                    "message" => "user id not found"
                ];

                echo json_encode($response);
                return;
            }

            $query = $this->User_Api_Model->get_completed_puja_model($user_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "data not fetched successfully"
                ];

            }

            echo json_encode($response);

        }
    }


    public function pujarifeedback()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $user_id = $this->input->post("session_id");
            $message = $this->input->post("message");
            $pujari_id = $this->input->post("pujari_id");
            $rating = $this->input->post("rating");

            if (!$user_id || !$message || !$pujari_id || !$rating) {
                $response = [
                    "status" => "error",
                    "message" => "some values are missing"
                ];

                echo json_encode($response);
                return;
            } else {

                $formdata = [

                    "user_id" => $user_id,
                    "message" => $message,
                    "pujari_id" => $pujari_id,
                    "rating" => $rating

                ];

                $query = $this->User_Api_Model->pujarifeedback_model($formdata);

                if ($query) {
                    $response = [
                        "status" => "success",
                        "message" => "feedback and ratings saved successfully"
                    ];
                } else {
                    $response = [
                        "status" => "error",
                        "message" => "feedback not saved successfully"
                    ];

                }

                echo json_encode($response);
            }
        }

    }

    public function get_avg_rating_pujari()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $pujari_id = $this->input->post("pujari_id");

            if (!$pujari_id) {

                $response = [
                    "status" => "error",
                    "message" => "pujari id not found"
                ];

                echo json_encode($response);
                return;

            } else {

                $query = $this->User_Api_Model->get_avg_rating_pujari_model($pujari_id);

                if ($query) {

                    $response = [
                        "status" => "success",
                        "message" => "data fetched successfully",
                        "data" => $query
                    ];

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "data not fetched successfully",

                    ];

                }
                echo json_encode($response);
            }

        }
    }

    public function get_no_of_completed_puja()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $pujari_id = $this->input->post("pujari_id");

            if (!$pujari_id) {

                $response = [
                    "status" => "error",
                    "message" => "pujari id not found"
                ];

                echo json_encode($response);
                return;

            } else {

                $query = $this->User_Api_Model->get_no_of_completed_puja_model($pujari_id);

                if ($query) {

                    $response = [
                        "status" => "success",
                        "message" => "data fetched successfully",
                        "data" => $query
                    ];

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "data not fetched successfully",

                    ];

                }
                echo json_encode($response);
            }


        }
    }



    public function getpujarifeedback()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $pujari_id = $this->input->post("pujari_id");

            if (!$pujari_id) {

                $response = [
                    "status" => "error",
                    "message" => "pujari id not found"
                ];

                echo json_encode($response);
                return;

            } else {

                $query = $this->User_Api_Model->getpujarifeedback_model($pujari_id);

                if ($query) {

                    $response = [
                        "status" => "success",
                        "message" => "data fetched successfully",
                        "data" => $query
                    ];

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "data not fetched successfully",

                    ];

                }
                echo json_encode($response);
            }

        }
    }


    public function save_book_puja_payment()
    {
        $json_input = file_get_contents("php://input");
        $data = json_decode($json_input, true);


        if (!$data || !isset($data['amount']) || !isset($data['getbookpujaid'])) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input"]);
            return;
        }

        try {
            $razorpay_order = $this->razorpay_lib->create_order($data['amount'], 'ORD_' . rand(1000, 9999));
            if (!$razorpay_order) {
                throw new Exception('Failed to create Razorpay order');
            }


            $this->session->set_userdata('razorpay_order_id', $razorpay_order['id']);


            echo json_encode([
                'status' => 'success',
                'order_id' => $razorpay_order['id'],
                'amount' => $data['amount'], // Convert to paisa
                'bookpujaid' => $data['getbookpujaid'],

                // 'key' => 'rzp_test_cFYTpLVvrC4FFn',

                // 'key' => 'rzp_test_n9TyNiHflMp51H',


                // 'key' => 'rzp_live_aKnqCVUpRcVAoS',


                //Jyotisika updated test keys
                'key' => 'rzp_test_YcEtdZa9f7N8R6',


                //Jyotisika live updated test keys
                // 'key' => 'rzp_live_OhYeV3XCMIFBH5',




                // 'name'           => $user->username,
                // 'email'          => $user->email,
                // 'payment_type'   => $payment_method,
                // 'is_direct'      => $is_direct_purchase ? 'yes' : 'no' // Identify purchase type in response
            ]);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update_book_puja_payment()
    {


        $json_input = file_get_contents("php://input");
        $data = json_decode($json_input, true);


        if (!$data || !isset($data['amount']) || !isset($data['getbookpujaidfunc'])) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input"]);
            return;
        }

        $payment_id = $data['payment_id'];
        $razorpay_signature = $data['razorpay_signature'];
        $order_id = $data['order_id'];

        $is_valid = $this->razorpay_lib->verify_payment($payment_id, $order_id, $razorpay_signature);
        if (!$is_valid) {
            echo json_encode(["status" => "error", "message" => "Wallet update failed: "]);
            return;
        }


        $book_puja_id = $data['getbookpujaidfunc'];
        $amount = $data['amount'];

        $update_payment_status = $this->User_Api_Model->update_payment_status_model($book_puja_id, $amount, $payment_id);



        if ($update_payment_status) {
            echo json_encode(['status' => 'success', 'message' => 'puja payment done successfully']);
            return;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to place order']);
            return;

        }

    }


    //Festivals

    public function show_today_festivals()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $query = $this->User_Api_Model->show_today_festivals_model();

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];


            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no festivals in the table"

                ];

            }

            echo json_encode($response);

            return;
        }


    }
    public function show_festivals()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $query = $this->User_Api_Model->show_festivals_model();

            if ($query) {

                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];


            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no festivals in the table"

                ];

            }

            echo json_encode($response);

            return;
        }

    }


    public function show_specific_festival()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $festival_id = $this->input->post("festival_id");

            $query = $this->User_Api_Model->show_specific_festival_model($festival_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no festivals in the table"

                ];
            }

            echo json_encode($response);

            return;
        }
    }


    public function showuser()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $query = $this->User_Api_Model->show_user_model();

            echo json_encode($query);



            return;
        }

    }

    public function showservices_limited()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {
            $query = $this->User_Api_Model->showservices_model();


            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no service available in the"

                ];
            }

            echo json_encode($response);
            return;
        }


    }



    public function showallservices()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {
            $query = $this->User_Api_Model->showallservices_model();


            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no service available in the"

                ];
            }

            echo json_encode($response);
            return;
        }


    }



    //Kudali api data


    public function search_city()
    {
        $query = $this->input->get('q');

        if (!$query) {
            echo json_encode([]);
            return;
        }

        $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($query) . "&format=json&limit=5&countrycodes=in";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: JyotishvitaranApp/1.0 (support@jyotishvitaran.com)' // required
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['error' => $error]);
        } else {
            echo $response;
        }
    }


    public function basicastrology()
    {

        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan']
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v2/basic-astro-details';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }
    }


    public function planetary_positions()
    {

        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan']
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/planetary-positions';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }


    }


    public function vimshottari_dasha()
    {

        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],
            'dasha_type' => 'maha-dasha'
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/vimshottari-dasha';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }


    public function ascendant_report()
    {


        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan']
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v2/ascendant-report';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }



    public function gemstone_suggestions()
    {


        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],

        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v2/gemstone-suggestion';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }



    public function composite_friendship()
    {


        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],

        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/composite-friendship';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }




    public function shadbala()
    {


        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],

        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v2/shadbala';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }

    public function yogini_dasha()
    {


        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],

        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v2/yogini-dasha';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }



    public function bhava_kundli()
    {


        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],

        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }


     public function bhava_kundli_data()
    {


        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";


          $chatid = $input['chartid'];
        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],

        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/'.$chatid ;



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }



    }

    








    public function getKaalSarpaDosha()
    {

        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan']
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/kaal-sarpa-yoga';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }

    }

    public function getSadheSati()
    {

        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan']
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v2/sadhe-sati';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }

    }


    public function getManglikDosha()
    {

        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan']
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v2/manglik-dosha';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }

    }


    public function getKundli()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D1';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }
    }



    public function horoscope_charts()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";
        $chatid = $input['chartid'];

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],

        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/'.$chatid;



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }
    }



    public function yogas(){

          $input = json_decode(file_get_contents("php://input"), true);

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $api_key = "b49e81e874acc04f1141569767b24b79";

        $data = [
            'api_key' => $api_key,
            'full_name' => $input['boy_name'],
            'day' => (int) $input['boy_day'],
            'month' => (int) $input['boy_month'],
            'year' => (int) $input['boy_year'],
            'hour' => (int) $input['boy_hour'],
            'min' => (int) $input['boy_minute'],
            'sec' => (int) $input['boy_second'],
            'gender' => $input['boy_gender'],
            'place' => $input['boy_birthPlace'],
            'lat' => $input['boy_lat'], // optional: replace using geolocation
            'lon' => $input['boy_lon'],
            'tzone' => 5.5,
            'lan' => $input['lan'],
            // 'analysis_planet'=>"moon"
        ];
        // https://astroapi-3.divineapi.com/indian-api/v1/bhava-kundli/1

        $url = 'https://astroapi-3.divineapi.com/indian-api/v1/jaimini-astrology/padas';



        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            echo json_encode(['success' => false, 'message' => $error]);
        } else {
            $result = json_decode($response, true);
            echo json_encode(['success' => true, 'data' => $result]);
        }

    }


    public function ManglikDoshakudalimatch()
    {

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $url = "https://astroapi-3.divineapi.com/indian-api/v2/matching/manglik-dosha";
        $api_key = "b49e81e874acc04f1141569767b24b79";
        $post = json_decode(file_get_contents("php://input"), true);
        $data = [
            "api_key" => $api_key,
            "p1_full_name" => $post['boy_name'],
            "p1_day" => (int) $post['boy_day'],
            "p1_month" => (int) $post['boy_month'],
            "p1_year" => (int) $post['boy_year'],
            "p1_hour" => (int) $post['boy_hour'],
            "p1_min" => (int) $post['boy_minute'],
            "p1_sec" => (int) $post['boy_second'],
            "p1_gender" => "male",
            "p1_place" => $post['boy_birthPlace'],
            "p1_lat" => $post['boy_lat'],
            "p1_lon" => $post['boy_lon'],
            "p1_tzone" => 5.5,

            "p2_full_name" => $post['girl_name'],
            "p2_day" => (int) $post['girl_day'],
            "p2_month" => (int) $post['girl_month'],
            "p2_year" => (int) $post['girl_year'],
            "p2_hour" => (int) $post['girl_hour'],
            "p2_min" => (int) $post['girl_minute'],
            "p2_sec" => (int) $post['girl_second'],
            "p2_gender" => "female",
            "p2_place" => $post['girl_birthPlace'],
            "p2_lat" => $post['girl_lat'],
            "p2_lon" => $post['girl_lon'],
            "p2_tzone" => 5.5,

            'lan' => "en"
        ];

        $headers = [
            "Authorization: Bearer $access_token",
            "Content-Type: application/x-www-form-urlencoded"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);


        echo json_encode(['success' => true, 'data' => $result]);


    }


    public function Dashakoot()
    {

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $url = "https://astroapi-3.divineapi.com/indian-api/v1/dashakoot-milan";
        $api_key = "b49e81e874acc04f1141569767b24b79";
        $post = json_decode(file_get_contents("php://input"), true);
        $data = [
            "api_key" => $api_key,
            "p1_full_name" => $post['boy_name'],
            "p1_day" => (int) $post['boy_day'],
            "p1_month" => (int) $post['boy_month'],
            "p1_year" => (int) $post['boy_year'],
            "p1_hour" => (int) $post['boy_hour'],
            "p1_min" => (int) $post['boy_minute'],
            "p1_sec" => (int) $post['boy_second'],
            "p1_gender" => "male",
            "p1_place" => $post['boy_birthPlace'],
            "p1_lat" => $post['boy_lat'],
            "p1_lon" => $post['boy_lon'],
            "p1_tzone" => 5.5,

            "p2_full_name" => $post['girl_name'],
            "p2_day" => (int) $post['girl_day'],
            "p2_month" => (int) $post['girl_month'],
            "p2_year" => (int) $post['girl_year'],
            "p2_hour" => (int) $post['girl_hour'],
            "p2_min" => (int) $post['girl_minute'],
            "p2_sec" => (int) $post['girl_second'],
            "p2_gender" => "female",
            "p2_place" => $post['girl_birthPlace'],
            "p2_lat" => $post['girl_lat'],
            "p2_lon" => $post['girl_lon'],
            "p2_tzone" => 5.5,

            'lan' => $post['lan']
        ];

        $headers = [
            "Authorization: Bearer $access_token",
            "Content-Type: application/x-www-form-urlencoded"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);


        echo json_encode(['success' => true, 'data' => $result]);


    }


    public function match_kundli()
    {
        $chart_id = "D1";
        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $url = "https://astroapi-3.divineapi.com/indian-api/v1/matching/horoscope-chart/$chart_id";
        $api_key = "b49e81e874acc04f1141569767b24b79";
        $post = json_decode(file_get_contents("php://input"), true);
        $data = [
            "api_key" => $api_key,
            "p1_full_name" => $post['boy_name'],
            "p1_day" => (int) $post['boy_day'],
            "p1_month" => (int) $post['boy_month'],
            "p1_year" => (int) $post['boy_year'],
            "p1_hour" => (int) $post['boy_hour'],
            "p1_min" => (int) $post['boy_minute'],
            "p1_sec" => (int) $post['boy_second'],
            "p1_gender" => "male",
            "p1_place" => $post['boy_birthPlace'],
            "p1_lat" => $post['boy_lat'],
            "p1_lon" => $post['boy_lon'],
            "p1_tzone" => 5.5,

            "p2_full_name" => $post['girl_name'],
            "p2_day" => (int) $post['girl_day'],
            "p2_month" => (int) $post['girl_month'],
            "p2_year" => (int) $post['girl_year'],
            "p2_hour" => (int) $post['girl_hour'],
            "p2_min" => (int) $post['girl_minute'],
            "p2_sec" => (int) $post['girl_second'],
            "p2_gender" => "female",
            "p2_place" => $post['girl_birthPlace'],
            "p2_lat" => $post['girl_lat'],
            "p2_lon" => $post['girl_lon'],
            "p2_tzone" => 5.5,

            'lan' => $post['lan']
        ];

        $headers = [
            "Authorization: Bearer $access_token",
            "Content-Type: application/x-www-form-urlencoded"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        // echo "<pre>";
        // print_r($result);
        // echo "</pre>"; // for debug

        echo "<h3>Birth chat of" . "   " . $post['boy_name'] . "&" . "  " . $post['girl_name'] . " </h3>";

        if (isset($result['data']['p1']['base64_image'])) {
            echo "<h2> Birth chart of " . $post['boy_name'];

            echo "<h4>{$result['data']['p1']['svg']}</h4>";
            // echo "<img src='{$result['data']['p1']['base64_image']}' alt='Boy Chart' />";
        }

        if (isset($result['data']['p2']['base64_image'])) {
            echo "<h2> Birth chart of " . $post['girl_name'];
            echo "<h4>{$result['data']['p2']['svg']}</h4>";
            // echo "<img src='{$result['data']['p2']['base64_image']}' alt='Girl Chart' />";
        }
    }

    public function ashtakoot()
    {

        $access_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g";
        $url = "https://astroapi-3.divineapi.com/indian-api/v2/ashtakoot-milan";
        $api_key = "b49e81e874acc04f1141569767b24b79";
        $post = json_decode(file_get_contents("php://input"), true);
        $data = [
            "api_key" => $api_key,
            "p1_full_name" => $post['boy_name'],
            "p1_day" => (int) $post['boy_day'],
            "p1_month" => (int) $post['boy_month'],
            "p1_year" => (int) $post['boy_year'],
            "p1_hour" => (int) $post['boy_hour'],
            "p1_min" => (int) $post['boy_minute'],
            "p1_sec" => (int) $post['boy_second'],
            "p1_gender" => "male",
            "p1_place" => $post['boy_birthPlace'],
            "p1_lat" => $post['boy_lat'],
            "p1_lon" => $post['boy_lon'],
            "p1_tzone" => 5.5,

            "p2_full_name" => $post['girl_name'],
            "p2_day" => (int) $post['girl_day'],
            "p2_month" => (int) $post['girl_month'],
            "p2_year" => (int) $post['girl_year'],
            "p2_hour" => (int) $post['girl_hour'],
            "p2_min" => (int) $post['girl_minute'],
            "p2_sec" => (int) $post['girl_second'],
            "p2_gender" => "female",
            "p2_place" => $post['girl_birthPlace'],
            "p2_lat" => $post['girl_lat'],
            "p2_lon" => $post['girl_lon'],
            "p2_tzone" => 5.5,

            'lan' => $post['lan']
        ];

        $headers = [
            "Authorization: Bearer $access_token",
            "Content-Type: application/x-www-form-urlencoded"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);


        echo json_encode(['success' => true, 'data' => $result]);


    }







    public function auto_cancel_puja()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $query = $this->User_Api_Model->auto_cancel_puja_model();


            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "success", "message" => "data updated successfully"]));


        }
    }



    public function show_home_astrologer_service()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $query = $this->User_Api_Model->show_home_astrologer_service_model();


            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "success", "message" => "data updated successfully", "data" => $query]));


        }
    }

    public function show_filtered_astrolger()
    {


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $service_id = $this->input->post("service_id");

            if (!$service_id) {

                $response = [
                    "status" => "error",
                    "message" => "service id not found"
                ];

                echo json_encode($response);
                return;

            }

            $query = $this->User_Api_Model->show_filtered_astrolger_model($service_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no astrolger found with this service"

                ];
            }

            echo json_encode($response);

            return;
        }
    }


    public function show_service_info()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        }
        $service_id = $this->input->post("service_id");

        if (!$service_id) {

            $response = [
                "status" => "error",
                "message" => "service id not found"
            ];

            echo json_encode($response);
            return;

        }

        $query = $this->User_Api_Model->show_service_info_model($service_id);

        if ($query) {
            $response = [
                "status" => "success",
                "message" => "data fetched successfully",
                "data" => $query
            ];
        } else {

            $response = [
                "status" => "error",
                "message" => "There is no astrolger found with this service"

            ];
        }

        echo json_encode($response);

        return;

    }




    public function show_notification()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $user_id = $this->input->post("user_id");

            if (!$user_id) {

                $response = [
                    "status" => "error",
                    "message" => "user id not found"
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->show_notification_model($user_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no new notification"

                ];
            }

            echo json_encode($response);

            return;



        }


    }



    public function show_notification_number()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {
            $user_id = $this->input->post("user_id");

            if (!$user_id) {

                $response = [
                    "status" => "error",
                    "message" => "user id not found"
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->show_notification_number_model($user_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no new notification"

                ];
            }

            echo json_encode($response);

            return;



        }

    }


    public function mark_as_read_notification()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $user_id = $this->input->post("user_id");

            if (!$user_id) {

                $response = [
                    "status" => "error",
                    "message" => "user id not found"
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->mark_as_read_notification($user_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data updated"
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no new notification"

                ];
            }

            echo json_encode($response);

            return;



        }


    }

    public function show_blogs()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {

            $query = $this->User_Api_Model->show_blogs_model();

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no new notification"

                ];
            }

            echo json_encode($response);

            return;

        }


    }


    public function viewspecificblog()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(["status" => "error", "message" => "Invalid request method"]));
            return;
        } else {



            $blog_id = $this->input->post("blog_id");

            if (!$blog_id) {

                $response = [
                    "status" => "error",
                    "message" => "blog id not found"
                ];

                echo json_encode($response);
                return;

            }

            $query = $this->User_Api_Model->show_specific_blogs_model($blog_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no new notification"

                ];
            }

            echo json_encode($response);

            return;

        }


    }

    public function Get_top_products()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        }

        $query = $this->User_Api_Model->get_top_ratedproduct();




        if ($query["status"] === "success") {
            $this->output->set_status_header(200);
            $response = $query;
        } elseif ($query["status"] === "notfound") {
            $this->output->set_status_header(404);
            $response = $query;
        } elseif ($query["status"] === "error") {
            $this->output->set_status_header(500);
            $response = $query;
        } else {
            $this->output->set_status_header(500);
            $response = [
                "status" => "error",
                "message" => "Unexpected error occurred"
            ];
        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));

    }


    public function show_pooja_info()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {



            $puja_id = $this->input->post("puja_id");

            if (!$puja_id) {

                $response = [
                    "status" => "error",
                    "message" => "blog id not found"
                ];

                echo json_encode($response);
                return;

            }

            $query = $this->User_Api_Model->show_pooja_info_model($puja_id);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no new notification"

                ];
            }

            echo json_encode($response);

        }

    }



    public function show_category()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {

            $query = $this->User_Api_Model->show_category_model();

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data fetched successfully",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no new notification"

                ];
            }

            echo json_encode($response);


        }


    }

    public function show_specific_category()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {

            $category = $this->input->post("category");

            if (!$category) {

                $response = [
                    "status" => "error",
                    "message" => "category not found"
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->show_specific_category_model($category);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data updated",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no product with this category"

                ];
            }

            echo json_encode($response);

            return;



        }
    }


    public function show_purpose()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        }

        $category = $this->input->post("category");

        if (!$category) {
            $response = [
                "status" => "error",
                "message" => "category not found"
            ];
            echo json_encode($response);
            return;
        }

        // Fetch raw purpose rows from DB
        $raw_data = $this->User_Api_Model->show_purpose_model($category);

        // Process data to count individual purposes
        $purpose_count = [];

        foreach ($raw_data as $row) {
            $purposes = explode(',', $row['purpose']); // split by comma
            foreach ($purposes as $p) {
                $p = trim($p); // trim spaces
                if (!empty($p)) {
                    if (isset($purpose_count[$p])) {
                        $purpose_count[$p]++;
                    } else {
                        $purpose_count[$p] = 1;
                    }
                }
            }
        }

        if (!empty($purpose_count)) {
            $response = [
                "status" => "success",
                "message" => "data updated",
                "data" => $purpose_count
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "There is no product with this category"
            ];
        }

        echo json_encode($response);
    }


    public function get_total_product_in_category()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {

            $category = $this->input->post("category");

            if (!$category) {

                $response = [
                    "status" => "error",
                    "message" => "category not found"
                ];

                echo json_encode($response);
                return;

            }
            $query = $this->User_Api_Model->get_total_product_in_category_model($category);

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data updated",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no product with this category"

                ];
            }

            echo json_encode($response);

            return;


        }
    }


    public function show_rudraksh(){

          if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {


            $query = $this->User_Api_Model->show_rudraksh_model();

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data updated",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no product with this category"

                ];
            }

            echo json_encode($response);

            return;

        }


    }



    public function show_energy_stones()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {


            $query = $this->User_Api_Model->show_energy_stones_model();

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data updated",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no product with this category"

                ];
            }

            echo json_encode($response);

            return;

        }

    }



    public function show_product_feedback_data()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {


            $query = $this->User_Api_Model->show_product_feedback_data_model();

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data updated",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no product with this category"

                ];
            }

            echo json_encode($response);

            return;

        }
    }


    public function show_astrologer_free_kudali()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    "status" => "error",
                    "message" => "Invalid request method"
                ]));
        } else {


            $query = $this->User_Api_Model->show_astrologer_free_kundali_model();

            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "data updated",
                    "data" => $query
                ];
            } else {

                $response = [
                    "status" => "error",
                    "message" => "There is no astrologer available"

                ];
            }

            echo json_encode($response);

            return;

        }
    }



}

