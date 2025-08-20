<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChatModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('firebase_helper');
    }

    // Create Chat Session
    public function createSession($sessionData)
    {
        $this->db->insert('chat_sessions', $sessionData);
        return $this->db->insert_id();
    }


    public function getSessiondata($session_id)
    {

        $this->db->where("id", $session_id);
        $query = $this->db->get("chat_sessions");
        return $query->result();
    }

    public function getSessionById($session_id)
    {
        return $this->db->get_where('chat_sessions', ['id' => $session_id])->row_array();
    }
    // Add message to Firebase
    public function addMessage($session_id, $messageData)
    {
        $messageData['session_id'] = $session_id;
        $this->db->insert('chat_messages', $messageData);
    }


    // Fetch Chat History
    public function getUserSessions($user_id)
    {
        return $this->db->where('user_id', $user_id)
            ->or_where('astrologer_id', $user_id)
            ->get('chat_sessions')
            ->result_array();
    }


    // End Session with Duration Calculation
    public function endSession($session_id, $end_time, $duration)
    {
        $this->db->where('firebase_chat_id', $session_id)
            ->update('chat_sessions', [
                'end_time' => $end_time,
                'total_duration' => $duration,
                'status' => 'inactive'
            ]);
    }

    public function getUsers()
    {
        return $this->db->select('user_name, user_id,user_image')
            ->get('astro_users')
            ->result_array();

    }

    public function getSessionByChat($session_id)
    {
        return $this->db->get_where('chat_sessions', ['firebase_chat_id' => $session_id])->row_array();
    }


    public function insert_income($data)
    {
        return $this->db->insert('astrologer_income', $data);
    }

    
    public function get_astrologer_charge($astrologer_id)
    {
        return $this->db->select('charge')
            ->from('astrologer_details')
            ->where('id', $astrologer_id)
            ->get()
            ->row();
    }


    public function getLatestFirebaseChatId($session_id, $userid)
    {
        $result = $this->db->where('astrologer_id', $session_id)
            ->where('user_id', $userid)
            ->order_by('id', 'DESC') 
            ->limit(1)
            ->get('chat_sessions')
            ->row_array();

        return $result;
    }

    public function endSessionid($session_id, $userid)
    {

        $this->db->where('astrologer_id', $session_id)
            ->where('user_id', $userid)
            ->update('chat_sessions', ['status' => 'inactive']);

    }


    // public function checksession($userid, $astrologer_id)
    // {

    //     $this->db->where("user_id", $userid);
    //     $this->db->where("astrologer_id", $astrologer_id);
    //     $query = $this->db->get("chat_sessions");
    //     return $query->result_array();


    // }


    public function checksession($userid, $astrologer_id)
    {
        $this->db->where("user_id", $userid);
        $this->db->where("astrologer_id", $astrologer_id);
        $query = $this->db->get("chat_sessions");

        if ($query->num_rows() > 0) {
           
            $this->db->where("user_id", $userid);
            $this->db->where("astrologer_id", $astrologer_id);
            $this->db->update("chat_sessions", ["status" => "active"]);

            return $query->result_array(); 
        }

      
    }


    public function get_astro($astroid)
    {

        $this->db->select('users.*, users.profile_image as img ,astrologer_details.*');
        $this->db->from('users');
        $this->db->join('astrologer_details', 'users.id = astrologer_details.user_id');
        $this->db->where('users.role', 'astrologer');
        $this->db->where('astrologer_details.status', 'Approved');
        $this->db->where('users.id', $astroid);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function CheckAstroAvailable($astroid)
    {
        $this->db->where("astrologer_id", $astroid);
        $this->db->where("status", "active");

        $query = $this->db->get("chat_sessions"); 

        $num = $query->num_rows(); 

        if ($num == 0) {
            return true;
        } else {
            return false;
        }
    }


    public function endSessioncheck($session_id, $end_time, $duration)
    {
        $this->db->where('firebase_chat_id', $session_id)
            ->update('chat_sessions', [
                'end_time' => $end_time,
                'total_duration' => $duration,
                'status' => 'inactive'
            ]);
    }


    public function updateuser($user_id, $amount)
    {


        $this->db->set('amount', 'amount - ' . $amount, FALSE)
            ->where('user_id', $user_id)
            ->update('astro_users');


    }


    public function checkonline($astrologer_id)
    {
        $this->db->where("is_online", 1);
        $this->db->where("id", $astrologer_id);
        $query = $this->db->get("astrologer_details");

        $num = $query->num_rows();
        if ($num == 1) {
            return true;
        } else {
            return false;
        }
    }



    public function checkactive($astrologer_id)
    {

        $this->db->where("astrologer_id", $astrologer_id);
        $querygetdata = $this->db->get("chat_sessions");
        $numdata = $querygetdata->num_rows();

        if ($numdata == 0) {
            return true;
        } else {


            $this->db->where("status", "active");
            $this->db->where("astrologer_id", $astrologer_id);
            $query = $this->db->get("chat_sessions");

            $num = $query->num_rows();
            if ($num > 0) {
                return false;
            } else {
                return true;
            }
        }


    }


    public function checkbalance($user_id) {
        $this->db->where("user_id", $user_id);
        $querygetdata = $this->db->get("astro_users");
    
        return $querygetdata->row(); 
    }
    
    public function astrolger_charge($astrologer_id) {
        $this->db->where("id", $astrologer_id); 
        $querygetdata = $this->db->get("astrologer_details");
    
        return $querygetdata->row(); 
    }



   
  
}
