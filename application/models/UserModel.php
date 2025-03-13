<?php
defined("BASEPATH") or exit("No direct script access allowed");

class UserModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();


    }

    function AddUser($userdata)
    {

        $this->db->insert("user", $userdata);
    }

    function GetUserData()
    {
        $users = $this->db->get("user")->result();
        print_r($users);
    }

    public function update_userprofile_model($userdata, $user_id)
    {
       
       

        if (!$user_id || empty($userdata)) {
            return 0; 
        }
        
 
        $this->db->where("user_id", $user_id);
        $this->db->update("users", $userdata);
        return 1;
    }

  




}

?>