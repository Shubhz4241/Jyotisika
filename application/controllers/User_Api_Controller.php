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

                    if ($UserData) {

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


        if (!$data || !isset($data['amount'])) {
            echo json_encode(["status" => "error", "message" => "Invalid JSON input"]);
            return;
        }


        $session_id = $this->session->userdata('user_id');
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

                'key' => 'rzp_test_n9TyNiHflMp51H',

                // 'key' => 'rzp_live_aKnqCVUpRcVAoS',



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


        if (!$data || !isset($data['amount'])) {
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



        $session_id = $this->session->userdata('user_id');
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

            $username = $this->input->post("user_name");
            $useraddress = $this->input->post("user_address");
            $usercity = $this->input->post("user_city");
            $userpincode = $this->input->post("user_pincode");

            $userphonenumber = $this->input->post("user_phonenumber");

            $user_id = $this->input->post("session_id");

            if (empty($username) || empty($useraddress) || empty($usercity) || empty($userpincode) || empty($user_id)) {

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
                "user_id" => $user_id,

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

    public function show_online_pujari()
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
                    "message" => "Puja id is missing"
                ];

            } else {

                $query = $this->User_Api_Model->show_online_pujari_model();

                if ($query) {
                    $response = [
                        "status" => "success",
                        "message" => "Pujari fetched successfully",
                        "data" => $query
                    ];

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "There is no pujari available"
                    ];
                }
            }

            $this->output->set_content_type("application/json");
            $this->output->set_output(json_encode($response));

        }
    }


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


    

}

