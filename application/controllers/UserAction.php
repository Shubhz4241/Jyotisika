<?php

defined("BASEPATH") or ("No Direct Script Access Allowed");
class UserAction extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

        $this->load->library('session'); // Load session library
        $this->load->model('UserModel');

    }

    public function update_userprofile()
    {


        $user_id = $this->session->userdata('user_id');
        $admincurrentimage = $this->input->post('current_image_name');




        if (!empty($_FILES['user_image']['name'])) {
            $config['upload_path'] = './uploads/user_image/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif';
            $config['max_size'] = 2048;

            $config['file_name'] = uniqid('img_');


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('user_image')) {
                $image_data = $this->upload->data();
                $image_path = 'uploads/user_image/' . $image_data['file_name'];
            } else {

                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error_admin', $error);
                redirect('User/UserProfile');
                return;
            }

        } else {
            $image_path = $admincurrentimage;
        }

        $data = [

            'user_name' => $this->input->post('user_name'),

            'user_gender' => $this->input->post('user_gender'),
            'user_dob' => $this->input->post('user_dob'),
            'user_TimeofBirth' => $this->input->post('user_TimeofBirth'),
            'user_PlaceofBirth' => $this->input->post('user_PlaceofBirth'),
            'user_CurrentAddress' => $this->input->post('user_CurrentAddress'),
            'user_City' => $this->input->post('user_City'),
            'user_Pincode' => $this->input->post('user_Pincode'),
            'user_image' => $image_path,

        ];



        $result = $this->UserModel->update_userprofile_model($data, $user_id);



        if ($result == 1) {
            redirect("User/UserProfile");
        } else {
            print_r("unsuccess");
        }
    }


  




    public function Updateprofile()
    {
        $api_url = "http://localhost/jyotisika_api/User/User_Auth/update_userprofile";


        $session_id = $this->session->userdata('user_id');
        $admincurrentimage = $this->input->post('current_image_name');


        if (!empty($_FILES['user_image']['name'])) {
            $config['upload_path'] = './uploads/user_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = uniqid('img_');

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('user_image')) {
                $image_data = $this->upload->data();
                $image_path = 'uploads/user_image/' . $image_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error_photo', $error);
                redirect('User/UserProfile');
                return;
            }
        } else {
            $image_path = $admincurrentimage;
        }


        $data = [
            'session_id' => $session_id,
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


        if (empty($data)) {

            $this->session->set_flashdata('warning', "data is empty");
            redirect('User/UserProfile');

        }


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo "cURL Error: " . curl_error($ch);
        }


        curl_close($ch);


        $decoded = json_decode($response, true);
        if ($decoded === null) {
            print_r($response);

        } else {

            $responsedata = json_decode($response, true);

            if (!$responsedata || !is_array($responsedata) || !isset($responsedata["status"])) {
                $userdata = "Not updated";
                $this->session->set_flashdata('error', $userdata);
                redirect('User/UserProfile');
            } else {

                if ($responsedata["status"] == "warning") {
                    $userdata = $responsedata["message"] ?? [];
                    $this->session->set_flashdata('warning', $userdata);
                    redirect('User/UserProfile');
                } elseif ($responsedata["status"] == "success") {
                    $userdata = $responsedata["message"] ?? [];
                    $this->session->set_flashdata('success', $userdata);
                    redirect('User/UserProfile');
                } elseif ($responsedata["status"] == "error") {
                    $userdata = $responsedata["message"] ?? [];
                    $this->session->set_flashdata('error', $userdata);
                    redirect('User/UserProfile');
                } else {
                    $this->session->set_flashdata('unsuccess', "Unexpected status received: " . htmlspecialchars($responsedata["status"]));
                    redirect('User/UserProfile');

                }
            }
        }

    }
}