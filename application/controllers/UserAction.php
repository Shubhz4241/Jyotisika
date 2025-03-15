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


    public function Updateprofile()
    {
        $api_url = "http://localhost/jyotisika_api/User/User_Auth/update_userprofile";

        $data = [
            'session_id' => $this->session->userdata('user_id'),
            'user_name' => $this->input->post('user_name'),
            'user_gender' => $this->input->post('user_gender'),
            'user_dob' => $this->input->post('user_dob'),
            'user_TimeofBirth' => $this->input->post('user_TimeofBirth'),
            'user_PlaceofBirth' => $this->input->post('user_PlaceofBirth'),
            'user_CurrentAddress' => $this->input->post('user_CurrentAddress'),
            'user_City' => $this->input->post('user_City'),
            'user_Pincode' => $this->input->post('user_Pincode'),
            'user_images' => $this->input->post('current_image_name')
        ];


        if (empty($data)) {

            $this->session->set_flashdata('warning', "data is empty");
            redirect('User/UserProfile');

        }

        if (!empty($_FILES['user_image']['tmp_name'])) {
            $data['user_image'] = new CURLFile($_FILES['user_image']['tmp_name'], $_FILES['user_image']['type'], $_FILES['user_image']['name']);


        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $response = curl_exec($ch);
        if (curl_errno($ch)) {

            $this->session->set_flashdata('error', "Profile not updated");
            redirect('User/UserProfile');
            echo "cURL Error: " . curl_error($ch);
        }


        curl_close($ch);


        $decoded = json_decode($response, true);

        if ($decoded === null) {
            print_r($response);
            // $this->session->set_flashdata('error', "Wrong response from api");
            // redirect('User/UserProfile');

        } else {

            $responsedata = json_decode($response, true);


            if (!$responsedata || !is_array($responsedata) || !isset($responsedata["status"])) {
                $userdata = "Satus not getted from api";
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

                } elseif ($responsedata["status"] == "imguploaderror") {

                    $userdata = $responsedata["message"] ?? [];
                    $this->session->set_flashdata('imguploaderror', $userdata);
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
// public function update_userprofile()
// {


//     $user_id = $this->session->userdata('user_id');
//     $admincurrentimage = $this->input->post('current_image_name');




//     if (!empty($_FILES['user_image']['name'])) {
//         $config['upload_path'] = './uploads/user_image/';
//         $config['allowed_types'] = 'jpeg|jpg|png|gif';
//         $config['max_size'] = 2048;

//         $config['file_name'] = uniqid('img_');


//         $this->load->library('upload', $config);

//         if ($this->upload->do_upload('user_image')) {
//             $image_data = $this->upload->data();
//             $image_path = 'uploads/user_image/' . $image_data['file_name'];
//         } else {

//             $error = $this->upload->display_errors();
//             $this->session->set_flashdata('upload_error_admin', $error);
//             redirect('User/UserProfile');
//             return;
//         }

//     } else {
//         $image_path = $admincurrentimage;
//     }

//     $data = [

//         'user_name' => $this->input->post('user_name'),

//         'user_gender' => $this->input->post('user_gender'),
//         'user_dob' => $this->input->post('user_dob'),
//         'user_TimeofBirth' => $this->input->post('user_TimeofBirth'),
//         'user_PlaceofBirth' => $this->input->post('user_PlaceofBirth'),
//         'user_CurrentAddress' => $this->input->post('user_CurrentAddress'),
//         'user_City' => $this->input->post('user_City'),
//         'user_Pincode' => $this->input->post('user_Pincode'),
//         'user_image' => $image_path,

//     ];



//     $result = $this->UserModel->update_userprofile_model($data, $user_id);



//     if ($result == 1) {
//         redirect("User/UserProfile");
//     } else {
//         print_r("unsuccess");
//     }
// }




// if (!empty($_FILES['user_image']['name'])) {
//     $config['upload_path'] = './uploads/user_image/';
//     $config['allowed_types'] = 'jpg|jpeg|png|gif';
//     $config['max_size'] = 2048;
//     $config['file_name'] = uniqid('img_');

//     $this->load->library('upload', $config);

//     if ($this->upload->do_upload('user_image')) {
//         $image_data = $this->upload->data();
//         $image_path = 'uploads/user_image/' . $image_data['file_name'];
//     } else {
//         $error = $this->upload->display_errors();
//         $this->session->set_flashdata('upload_error_photo', $error);
//         redirect('User/UserProfile');
//         return;
//     }
// } else {
//     $image_path = $admincurrentimage;
// }





// public function horoscope()
// {
//     $apiUrl = 'https://json.freeastrologyapi.com/horoscope-chart-svg-code';
//     $apiKey = 'HqMEQxu52q4NMzuNyvfk69of6uDPCGQK3rlqaY5V'; // Ideally, store this in an environment variable

//     $payload = [
//         "year" => 2022,
//         "month" => 8,
//         "date" => 11,
//         "hours" => 6,
//         "minutes" => 0,
//         "seconds" => 0,
//         "latitude" => 17.38333,
//         "longitude" => 78.4666,
//         "timezone" => 5.5,
//         "config" => [
//             "observation_point" => "topocentric",
//             "ayanamsha" => "lahiri"
//         ]
//     ];

//     $curl = curl_init();

//     curl_setopt_array($curl, [
//         CURLOPT_URL => $apiUrl,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => json_encode($payload),
//         CURLOPT_HTTPHEADER => [
//             'Content-Type: application/json',
//             'x-api-key: ' . $apiKey
//         ],
//         CURLOPT_FAILONERROR => true // Makes curl_exec return false on HTTP errors
//     ]);

//     $response = curl_exec($curl);
//     $error = curl_error($curl);
//     curl_close($curl);

//     if ($error) {
//         return response()->json(["error" => "Curl Error: " . $error], 500);
//     }

//     $data = json_decode($response, true);
//     print_r($data);
// }

//     public function horoscopetiti()
//     {

//     $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://json.freeastrologyapi.com/tithi-durations',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS =>'{
//     "year": 2025,
//     "month": 3,
//     "date": 13,
//     "hours": 6,
//     "minutes": 0,
//     "seconds": 0,
//     "latitude": 17.38333,
//     "longitude": 78.4666,
//     "timezone": 5.5,
//     "config": {
//         "observation_point": "topocentric",
//         "ayanamsha": "lahiri"
//     }
// }',
//   CURLOPT_HTTPHEADER => array(
//     'Content-Type: application/json',
//     'x-api-key: HqMEQxu52q4NMzuNyvfk69of6uDPCGQK3rlqaY5V'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

//     }

