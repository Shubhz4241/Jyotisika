<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FreeKundli_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        // Load any models if needed
    }

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

    public function BasicAstrology()
    {


         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);


        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
        // print_r($data["astrologer_data"]);



        $this->load->view('User/FreeKundli/BasicAstrology', $data);
    }
    public function PlanetaryPosition()
    {


         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
       


        $this->load->view('User/FreeKundli/PlanetaryPosition', $data);
    }
    public function VimshottariDasha()
    {
         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
       

        $this->load->view('User/FreeKundli/VimshottariDasha', $data);
    }
    public function AscendantReport()
    {

         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
     



        $this->load->view('User/FreeKundli/AscendantReport', $data);
    }
    public function GemstoneRecommendation()
    {
         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
    

        $this->load->view('User/FreeKundli/GemstoneRecommendation', $data);
    }
    public function CompositeFriendship()
    {

        $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);


        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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

       
     

        $this->load->view('User/FreeKundli/CompositeFriendship', $data);
    }
    public function Shadbala()
    {


         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);


        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
     

        $this->load->view('User/FreeKundli/Shadbala', $data);
    }
    public function YoginiDasha()
    {

         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);


        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
       
        $this->load->view('User/FreeKundli/YoginiDasha', $data);
    }
    public function HoroscopeCharts()
    {

         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);


        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
       

        $this->load->view('User/FreeKundli/HoroscopeCharts', $data);
    }
    public function ManglikDosha()
    {

         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
    
        $this->load->view('User/FreeKundli/ManglikDosha', $data);
    }
    public function KaalSarpaDosha()
    {

         $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);

        

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
       



        $this->load->view('User/FreeKundli/KaalSarpaDosha', $data);
    }
    public function SadheSati()
    {

             $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);



        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
      


        $this->load->view('User/FreeKundli/SadheSati', $data);
    }
    public function BhavaKundli()
    {

             $language = $this->session->userdata('site_language') ?? 'english';
        $this->lang->load('message', $language);

        

        $ch_url_astrologer = base_url("User_Api_Controller/show_astrologer_free_kudali");

        $ch_astrologer = curl_init();
        curl_setopt($ch_astrologer, CURLOPT_URL, $ch_url_astrologer);
        curl_setopt($ch_astrologer, CURLOPT_RETURNTRANSFER, true);
        $astrologer_data = curl_exec($ch_astrologer);
        $curl_error_astrologer_data = curl_error($ch_astrologer);
        curl_close($ch_astrologer);

        if ($astrologer_data === false) {
            show_error("cURL Error: " . $curl_error_astrologer_data, 500);
            return;
        }

        $astrologer_data_response = json_decode($astrologer_data, associative: true);


        $data["astrologer_data"] = "";
        if ($astrologer_data_response["status"] == "success") {
            $data["astrologer_data"] = $astrologer_data_response["data"];
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
       


        $this->load->view('User/FreeKundli/BhavaKundli', $data);
    }
}
?>