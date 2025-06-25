<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_ChatUser_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->delete_cache();

        $this->load->helper('firebase_helper');

        $this->load->model('UserChatModel');
        //header('Content-Type: application/json');
    }


    public function Start_session()
    {

        date_default_timezone_set('Asia/Kolkata');
        $json_input = file_get_contents("php://input");
        $input_data = json_decode($json_input, true);

        if (!isset($input_data['user_id']) || !isset($input_data['astrologer_id'])) {
            echo json_encode(['error' => 'Invalid input']);
            return;
        }
        $userid = $input_data["user_id"];
        $astrologer_id = $input_data["astrologer_id"];


        $checkbalance = $this->UserChatModel->checkbalance($userid);
        $astrolger_charge = $this->UserChatModel->astrolger_charge($astrologer_id);

        if ($checkbalance && $astrolger_charge) {
            $charge = $astrolger_charge->price_per_minute * 5;
            $user_balance = $checkbalance->amount;
        } else {
            $charge = 0;
            $user_balance = 0;
        }

        if (($user_balance > $charge) && ($user_balance != 0)) {

            $query = $this->UserChatModel->checkonline($astrologer_id);

            if ($query) {

                $checkactive = $this->UserChatModel->checkactive($astrologer_id);



                if ($checkactive) {



                    $firebase_chat_id = uniqid('chat_');

                    $session_data = [
                        'username' => $checkbalance->user_name,
                        'user_id' => $userid,
                        'astrologer_id' => $astrologer_id,
                        'start_time' => date('Y-m-d H:i:s'),
                        'expire_on' => date('Y-m-d H:i:s', strtotime('+5 minutes')), // Expires in 5 minutes
                        'status' => 'active',
                        'firebase_chat_id' => $firebase_chat_id
                    ];

                    $session_id = $this->UserChatModel->createSession($session_data);

                    if ($session_id) {
                        $getdata = $this->UserChatModel->getSessiondata($session_id);
                    }

                    firebaseRequest("chats/{$firebase_chat_id}/session_info", $session_data);

                    echo json_encode([
                        "session_data" => $getdata,
                        'session_id' => $session_id,
                        'firebase_chat_id' => $firebase_chat_id
                    ]);
                } else {
                    echo json_encode([
                        "astrologeractive" => "astrologer busy with other user have pls wait some time"

                    ]);
                }

            } else {
                echo json_encode([
                    "astrologernotonline" => "not online"

                ]);
            }
        } else {

            echo json_encode([
                "chargeover" => "charge is over"

            ]);

        }

    }


    public function End_session()
    {
        date_default_timezone_set('Asia/Kolkata');
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['session_id'])) {
            echo json_encode(['error' => 'Invalid session ID not geted']);
            return;
        }

        $charge = $data['charge'];
        $user_id = $data['user_id'];
        $session = $this->UserChatModel->getSessionByChat($data['session_id']);
        if (!$session) {
            echo json_encode(['error' => 'Session not found']);
            return;
        }

        $end_time = date('Y-m-d H:i:s');

        $duration = (strtotime($end_time) - strtotime($session['start_time'])) / 60;

        if ($duration > 5) {
            $duration = 5;
            // Optional: Adjust end_time according to 5 minutes from start_time
            $end_time = date('Y-m-d H:i:s', strtotime($session['start_time']) + (5 * 60));
        }


        $amount = $charge * $duration;

        $query = $this->UserChatModel->updateuser($user_id, $amount);



        $this->UserChatModel->endSessioncheck($data['session_id'], $end_time, $duration);

        firebaseRequest("chats/{$session['firebase_chat_id']}/session_info", [
            'status' => 'completed',
            'end_time' => $end_time,
            'total_duration' => $duration
        ], 'PATCH');

        echo json_encode(['status' => 'success', 'duration' => $duration, "amount" => $amount]);
    }


   

  




}