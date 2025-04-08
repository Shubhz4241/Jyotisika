<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
                    $response = array("status" => "failed", "message" => "User not found");
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



    public function getuser_infos()
    {

        $session_id = $this->session->userdata("user_id") ?? $this->input->post("user_id");

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
                $response = array("status" => "failed", "message" => "User not found");
            } else {
                $this->output->set_status_header(400);
                $response = array("status" => "error", "message" => "User not found in our data");
            }

        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));
    }


    public function get_astrologer()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }

        $result = $this->User_Api_Model->getAllAstrologers();

        if ($result) {
            $response = [
                "status" => "success",
                "message" => "Astrologer fetched",
                "data" => $result
            ];
        } else {
            $response = [
                "status" => "dberror",
                "message" => "Data not fetched"
            ];
        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));
    }


    public function getastrologerbyid(){

       
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }
        $astrologerid = $this->input->post("astrologerid");
      
        // $session_id = $this->session->userdata('user_id');



        if (empty($astrologerid)) {
            $this->output->set_status_header(400);
            echo json_encode(["status" => "error", "message" => "User ID missing"]);
            return;
        } else {

            $result = $this->User_Api_Model->GetAstrologerById_model($astrologerid);

            if ($result) {
                $this->output->set_status_header(200);
                $response = [
                    "status" => "success",
                    "message" => "Astrologer fetched",
                    "data" => $result
                ];
            } else {
                $this->output->set_status_header(500);
                $response = [
                    "status" => "dberror",
                    "message" => "Data not fetched"
                ];
            }

        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));



    }



    public function GetFestivals(){

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }

        $result = $this->User_Api_Model->GetFestivals_Model();

        if ($result) {
            $response = [
                "status" => "success",
                "message" => "Festivals fetched",
                "data" => $result
            ];
        } else {
            $response = [
                "status" => "dberror",
                "message" => "Data not fetched"
            ];
        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));


    }


    public function getfestivalbyid(){


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
            return;
        }
        $festival_id = $this->input->post("festival_id");
      
        // $session_id = $this->session->userdata('user_id');



        if (empty($festival_id)) {
            $this->output->set_status_header(400);
            echo json_encode(["status" => "error", "message" => "User ID missing"]);
            return;
        } else {

            $result = $this->User_Api_Model->getfestivalbyid_model($festival_id);

            if ($result) {
                $this->output->set_status_header(200);
                $response = [
                    "status" => "success",
                    "message" => "Astrologer fetched",
                    "data" => $result
                ];
            } else {
                $this->output->set_status_header(500);
                $response = [
                    "status" => "dberror",
                    "message" => "Data not fetched"
                ];
            }

        }

        $this->output->set_content_type("application/json");
        $this->output->set_output(json_encode($response));

    }




















}

