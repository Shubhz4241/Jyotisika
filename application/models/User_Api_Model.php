<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Api_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function getdata_model()
    {

        $query = $this->db->get("users");
        $data = "hello worls";
        return $query->result();
    }

    public function saveOtp($mobileNumber, $otp, $expiryTime)
    {

        $user = $this->db->get_where("otp_data", array("mobile_number" => $mobileNumber))->row();

        if ($user) {

            $this->db->where("mobile_number", $mobileNumber);
            $this->db->update("otp_data", array(
                "otp" => $otp,
                "expiry_time" => $expiryTime
            ));
        } else {

            $this->db->insert("otp_data", array(
                "mobile_number" => $mobileNumber,
                "otp" => $otp,
                "expiry_time" => $expiryTime
            ));
        }

        return true;
    }


    public function verifyOtp($mobileNumber, $otp, $currentTime)
    {
        $user = $this->db->get_where("otp_data", array(
            "mobile_number" => $mobileNumber,
            "otp" => $otp
        ))->row();

        if (!$user) {
            return false; // No matching OTP found
        }

        if ($currentTime > $user->expiry_time) {
            return false; // OTP expired
        }

        return true; // OTP is valid
    }


    public function getUserByMobile($mobile_number)
    {

        $this->db->where("user_mobilenumber", $mobile_number);
        $query = $this->db->get("jyotisika_users");

        return $query->row_array();

    }

    public function Register_User_model($userdata)
    {
        $this->db->where("user_mobilenumber", $userdata['user_mobilenumber']);
        $query = $this->db->get("jyotisika_users");
        if ($query) {

            if ($query->num_rows() > 0) {
                return [
                    "status" => "usermobilenumberexit",
                    "message" => "Mobile number already exists"
                ];
            } else {
                $this->db->insert("jyotisika_users", $userdata);


                if ($this->db->affected_rows() == 1) {
                    $inserted_id = $this->db->insert_id();
                    $this->db->where("user_id", $inserted_id);
                    $query = $this->db->get("jyotisika_users");

                    return [
                        "status" => "success",
                        "message" => "User added successfully",
                        "data" => $query->row_array()
                    ];
                } else {
                    $error = $this->db->error();

                    return [
                        "status" => "dbqueryfailed",
                        "message" => "Database error occurred",
                        "error" => $error['message'],
                        "query" => $this->db->last_query()
                    ];
                }
            }

        } else {
            $error = $this->db->error();

            return [
                "status" => "dbqueryfailed",
                "message" => "Database error occurred",
                "error" => $error['message'],
                "query" => $this->db->last_query()
            ];
        }
    }


    public function getuser_info_model($session_id)
    {
        if (!$session_id) {
            return array(
                "status" => "sessionkeynotfound",
                "message" => "Session ID is required"
            );
        } else {


            $this->db->where("user_id", $session_id);
            $query = $this->db->get("jyotisika_users");


            if (!$query) {
                $error = $this->db->error();
                return array(
                    "status" => "dberror",
                    "message" => "Database error occurred",
                    "error_code" => $error["code"] ?? null,
                    "error_message" => $error["message"] ?? "Unknown database error",
                    "query" => $this->db->last_query()
                );
            } else {

                if ($query->num_rows() > 0) {
                    return array(
                        "status" => "success",
                        "message" => "User found",
                        "data" => $query->row_array()
                    );
                } else {
                    return array(
                        "status" => "failed",
                        "message" => "User not found"
                    );
                }
            }
        }
    }



    public function update_userprofile_model($userData, $sessionId)
    {
        if (!$sessionId || empty($userData)) {
            return array(
                "status" => "sessionerror",
                "message" => "Session ID and user data are required"
            );
        }

        // Check if user exists
        $this->db->where("user_id", $sessionId);
        $query = $this->db->get("jyotisika_users");

        if (!$query) {
            $error = $this->db->error();
            return array(
                "status" => "databaseerror",
                "message" => "Query execution failed",
                "error_code" => $error["code"] ?? null,
                "error_message" => $error["message"] ?? "Unknown database error",
                "query" => $this->db->last_query()
            );
        }

        $existingUser = $query->row_array();

        if (!$existingUser) {
            return array(
                "status" => "notfound",
                "message" => "User not found"
            );
        }

        // Update user profile
        $this->db->where("user_id", $sessionId);
        $updateQuery = $this->db->update("jyotisika_users", $userData);

        if (!$updateQuery) {
            $error = $this->db->error();
            return array(
                "status" => "databaseerror",
                "message" => "A database error occurred.",
                "error_code" => $error["code"] ?? null,
                "error_message" => $error["message"] ?? "Unknown error"
            );
        }

        $affectedRows = $this->db->affected_rows();

        // Fetch updated user data
        $this->db->where("user_id", $sessionId);
        $updatedQuery = $this->db->get("jyotisika_users");
        $updatedUserData = $updatedQuery->row_array();

        if ($affectedRows > 0) {
            return array(
                "status" => "success",
                "message" => "User profile updated successfully",
                "data" => $updatedUserData // Return updated user details
            );
        } else {
            return array(
                "status" => "warning",
                "message" => "Update query ran but no changes were made",
                "data" => $updatedUserData // Still return the user data
            );
        }
    }


    public function getAllAstrologers()
    {

       $this->db->where("is_online" , 1);
       $query = $this->db->get("astrologer_registration");
        return $query->result();
    }

    public function GetAstrologerById_model($astrologer_id){

        $this->db->where("id" , $astrologer_id);
        $query = $this->db->get("astrologer_registration");
        return $query->result();
    }


    public function GetFestivals_Model(){

       $query =  $this->db->get("festivals");
       return $query->result();
    }


    public function getfestivalbyid_model($festival_id){

        $this->db->where("festivals_id" , $festival_id);
       $query = $this->db->get("festivals");
        return $query->result();
    }










}