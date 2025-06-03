<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_Chat_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->delete_cache();

        $this->load->helper('firebase_helper');

        $this->load->model('ChatModel');
        //header('Content-Type: application/json');
    }

    public function Start_session()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        // Try to get astrologer_id from JSON input
        $astrologer_id = !empty($data['astrologer_id'])
            ? $data['astrologer_id']
            : $this->session->userdata('astrologer_id');

        if (!$astrologer_id) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized. Astrologer ID missing.']);
            return;
        }

        if (empty($data['user_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data: user_id is required']);
            return;
        }

        $firebase_chat_id = uniqid('chat_');
        $session_data = [
            'user_id' => $data['user_id'],
            'astrologer_id' => $astrologer_id,
            'start_time' => date('Y-m-d H:i:s'),
            'status' => 'active',
            'firebase_chat_id' => $firebase_chat_id
        ];

        $session_id = $this->ChatModel->createSession($session_data);

        firebaseRequest("chats/{$firebase_chat_id}/session_info", $session_data);

        echo json_encode([
            'session_id' => $session_id,
            'firebase_chat_id' => $firebase_chat_id
        ]);
    }


    public function Send_message()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['session_id']) || empty($data['sender_id']) || empty($data['message'])) {
            echo json_encode(['error' => 'Invalid data']);
            return;
        }

        $session = $this->ChatModel->getSessionById($data['session_id']);
        if (!$session) {
            echo json_encode(['error' => 'Session not found']);
            return;
        }

        $firebase_chat_id = $session['firebase_chat_id'];

        $messageData = [
            'sender_id' => $data['sender_id'],
            'message' => $data['message'],
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Store message in Firebase
        firebaseRequest("chats/{$firebase_chat_id}/messages/msg_" . time(), $messageData);

        // Store message in the database
        $this->ChatModel->addMessage($data['session_id'], $messageData);

        echo json_encode(['status' => 'Message sent']);
    }


    public function Get_chat_history($user_id)
    {
        $sessions = $this->ChatModel->getUserSessions($user_id);

        $history = [];
        foreach ($sessions as $session) {
            $firebase_chat_id = $session['firebase_chat_id'];
            $messages = firebaseRequest("chats/{$firebase_chat_id}/messages", [], 'GET');

            $history[] = [
                'session_id' => $session['id'],
                'start_time' => $session['start_time'],
                'end_time' => $session['end_time'] ?? null,
                'total_duration' => $session['total_duration'] ?? null,
                'messages' => $messages ?: []
            ];
        }

        echo json_encode($history);
    }

    public function End_session()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['session_id'])) {
            echo json_encode(['error' => 'Invalid session ID']);
            return;
        }

        $session = $this->ChatModel->getSessionByChat($data['session_id']);
        if (!$session) {
            echo json_encode(['error' => 'Session not found']);
            return;
        }

        $end_time = date('Y-m-d H:i:s');
        $duration = (strtotime($end_time) - strtotime($session['start_time'])) / 60;

        $this->ChatModel->endSession($data['session_id'], $end_time, $duration);

        firebaseRequest("chats/{$session['firebase_chat_id']}/session_info", [
            'status' => 'completed',
            'end_time' => $end_time,
            'total_duration' => $duration
        ], 'PATCH');

        echo json_encode(['status' => 'Session ended', 'duration' => $duration]);
    }


    public function Get_users()
    {
        $users = $this->ChatModel->getUsers();
        echo json_encode($users);
    }

    // chat controllers 
    public function Add_income()
    {
        // Check if request is POST
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            return $this->output->set_content_type('application/json')
                ->set_status_header(405)
                ->set_output(json_encode(["status" => false, "message" => "Only POST method allowed"]));
        }

        // Get astrologer ID from session
        $astrologer_id = $this->session->userdata('astrologer_id');
        // If not found, try getting from POST (mobile)
        if (!$astrologer_id) {
            $astrologer_id = $this->input->post('astrologer_id');
            if (!$astrologer_id) {
                return $this->output->set_content_type('application/json')
                    ->set_status_header(401)
                    ->set_output(json_encode(["status" => false, "message" => "Astrologer not logged in or ID not provided"]));
            }
        }

        // Get user ID and time from POST request
        $user_id = $this->input->post('user_id');
        $username = $this->input->post('username');
        $time_in_minutes = $this->input->post('time'); // Time in minutes

        if (!$user_id || !$time_in_minutes || !is_numeric($time_in_minutes)) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode(["status" => false, "message" => "Invalid input"]));
        }

        // Get astrologer's charge per minute
        $charge_data = $this->ChatModel->get_astrologer_charge($astrologer_id);
        if (!$charge_data) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode(["status" => false, "message" => "Astrologer not found"]));
        }

        $charge_per_min = $charge_data->charge;
        $income = $charge_per_min * $time_in_minutes;

        // Insert into astrologer_income table
        $insert_data = [
            'user_id' => $user_id,
            'astrologer_id' => $astrologer_id,
            'income' => $income,
            'username' => $username,
            'duration' => $time_in_minutes,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $inserted = $this->ChatModel->insert_income($insert_data);

        if ($inserted) {
            return $this->output->set_content_type('application/json')
                ->set_status_header(201)
                ->set_output(json_encode(["status" => true, "message" => "Income recorded successfully", "income" => $income]));
        } else {
            return $this->output->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(["status" => false, "message" => "Failed to record income"]));
        }
    }
}    


// chat ctrolloger
