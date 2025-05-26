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

        $json_input = file_get_contents("php://input");
        $input_data = json_decode($json_input, true);

        if (!isset($input_data['user_id']) || !isset($input_data['astrologer_id'])) {
            echo json_encode(['error' => 'Invalid input']);
            return;
        }
         $userid = $input_data["user_id"];
        $astrologer_id = $input_data["astrologer_id"];
 
         $checkbalance = $this->ChatModel->checkbalance($userid);
        $astrolger_charge = $this->ChatModel->astrolger_charge($astrologer_id);

    }




}