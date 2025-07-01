<?php
// Model: User_model.php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Login_Model extends CI_Model
{
    public function get_user_by_mobile($mobile_number)
    {
        return $this->db->get_where('admins', ['mobile_number' => $mobile_number])->row();
    }

    public function update_account_info($admin_id, $data)
    {
        $this->db->where('id', $admin_id);
        return $this->db->update('admins', $data);
    }


    
    public function store_verified_token($mobile_number, $token)
    {
        $this->db->where('mobile_number', $mobile_number);
        $this->db->delete('admin_password_reset_tokens');

        $data = [
            'mobile_number' => $mobile_number,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('admin_password_reset_tokens', $data);
    }

    public function get_mobile_by_token($token)
    {
        $this->db->where('token', $token);
        $this->db->where('created_at >=', date('Y-m-d H:i:s', time() - 1200)); // valid for 20 mins
        return $this->db->get('admin_password_reset_tokens')->row_array();
    }

    public function delete_token($token)
    {
        $this->db->where('token', $token);
        return $this->db->delete('admin_password_reset_tokens');
    }

    public function save_otp_temp($data)
    {
        $existing = $this->db->get_where('admin_otp_temp', ['mobile_number' => $data['mobile_number']])->row();

        if ($existing) {
            $this->db->where('mobile_number', $data['mobile_number']);
            return $this->db->update('admin_otp_temp', $data);
        } else {
            return $this->db->insert('admin_otp_temp', $data);
        }
    }

    public function get_otp_temp_by_mobile($mobile)
    {
        return $this->db->get_where('admin_otp_temp', ['mobile_number' => $mobile])->row_array();
    }

    public function update_password_by_mobile($mobile, $hashed_password)
    {
        $this->db->where('mobile_number', $mobile);
        return $this->db->update('admins', ['password' => $hashed_password]);
    }



    // <--------------OTP Ends Here--------------> 


    // public function get_user_by_mobile($mobile_number)
    // {
    //     return $this->db->get_where('admins', ['mobile_number' => $mobile_number])->row();
    // }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('admins', ['email' => $email])->row();
    }


    // Get user by ID
    public function get_user_by_id($admin_id)
    {
        return $this->db->get_where('admins', ['id' => $admin_id])->row();
    }

    public function get_user_by_role($role)
    {
        return $this->db->get_where('admins', ['role' => $role])->row();
    }

    // Update account info (email & mobile number)
    // public function update_account_info($admin_id, $data)
    // {
    //     $this->db->where('id', $admin_id);
    //     return $this->db->update('admins', $data);
    // }

    // Update password
    public function update_password($admin_id, $new_password)
    {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $this->db->where('id', $admin_id);
        return $this->db->update('admins', ['password' => $hashed_password]);
    }


    public function check_old_password($admin_id, $old_password)
    {
        $admin = $this->db->get_where('admins', ['id' => $admin_id])->row();

        if ($admin && password_verify($old_password, $admin->password)) {
            return true; // Old password is correct
        }

        return false; // Old password is incorrect
    }
}