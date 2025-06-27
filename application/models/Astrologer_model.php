<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Astrologer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Function to insert astrologer data into the database
    

    public function insert_astrologer($data) {
        return $this->db->insert('astrologer_registration', $data);
    }

    public function is_contact_exists($contact) {
        $this->db->where('contact', $contact);
        $query = $this->db->get('astrologer_registration');
        return $query->num_rows() > 0;
    }


    public function get_user_by_mobile($mobile)
    {
        return $this->db->where('contact', $mobile)->get('astrologer_registration')->row_array();
    }


    public function user_check($phone)
    {
        $this->db->where('contact', $phone);
        $query = $this->db->get('astrologer_registration');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function get_astrologer_details_by_user_id($user_id)
    {
        return $this->db->where('id', $user_id)->get('astrologer_registration')->row_array();
    }

    
    public function insert_otp($mobile, $otp, $expiry)
    {
        $this->db->delete('otps', ['mobile' => $mobile]); // Delete existing entry
        return $this->db->insert('otps', ['mobile' => $mobile, 'otp' => $otp, 'expiry' => $expiry]);
    }


    public function get_otp($mobile, $otp)
    {
        return $this->db->get_where('otps', ['mobile' => $mobile, 'otp' => $otp])->row();
    }

    public function getOtpDataByPhone($phone)
    {
        return $this->db->get_where('otps', ['mobile' => $phone])->row_array();
    }

    public function setAstrologerStatus($user_id, $status)
    {
        if ($status == 'online') {
            $status = 1;
        } else {
            $status = 0;
        }
        $this->db->where('id', $user_id);
        $this->db->update('astrologer_registration', ['is_online' => $status]);
    }


    public function getAstrologerStatus($user_id)
    {
        $this->db->select('is_online');
        $this->db->from('astrologer_registration');
        $this->db->where('id', $user_id);
        return $this->db->get()->row();
    }

}