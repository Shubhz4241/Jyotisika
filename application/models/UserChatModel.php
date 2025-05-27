<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserChatModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('firebase_helper');
    }

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

     public function getSessionByChat($session_id)
    {
        return $this->db->get_where('chat_sessions', ['firebase_chat_id' => $session_id])->row_array();
    }

     public function updateuser($user_id, $amount)
    {


        $this->db->set('amount', 'amount - ' . $amount, FALSE)
            ->where('user_id', $user_id)
            ->update('jyotisika_users');
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


     public function checkbalance($user_id) {
        $this->db->where("user_id", $user_id);
        $querygetdata = $this->db->get("jyotisika_users");
    
        return $querygetdata->row(); 
    }

    public function astrolger_charge($astrologer_id) {
        $this->db->where("id", $astrologer_id); 
        $querygetdata = $this->db->get("astrologer_registration");
    
        return $querygetdata->row(); 
    }

      public function checkonline($astrologer_id)
    {
        $this->db->where("is_online", 1);
        $this->db->where("id", $astrologer_id);
        $query = $this->db->get("astrologer_registration");

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




}