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

    public function checkuserisregistered($mobile_number)
    {
        $this->db->where("user_mobilenumber", $mobile_number);
        $query = $this->db->get("jyotisika_users");

        return $query->num_rows();

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

                if ($query->num_rows() == 1) {
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

    //Razerpay update wallet code

    public function updatewallet_model($sessionid, $amount)
    {
        $this->db->where("user_id", $sessionid);
        $query = $this->db->get("jyotisika_users");

        if ($query->num_rows() == 0) {
            return false;
        }

        $userData = $query->row_array();
        $amountuser = $userData["amount"] + $amount;

        $this->db->where("user_id", $sessionid);
        $this->db->update("jyotisika_users", ['amount' => $amountuser]);

        return $this->db->affected_rows() > 0;
    }


    //Get Astrologer


    public function getastrologer_model()
    {

        $this->db->select("astrologer_registration.* , AVG(astrologer_feedback.rating) as average_rating");
        $this->db->from("astrologer_registration");
        $this->db->join('astrologer_feedback', 'astrologer_feedback.astrologer_id = astrologer_registration.id', 'Left');
        $this->db->group_by('astrologer_registration.id');
        $this->db->where("status", "approved");
        $this->db->where("is_online", "1");

        $query = $this->db->get();
        return $query->result();

    }


    public function get_astrologer_by_id_model($astrologer_id)
    {

        $this->db->where("id", $astrologer_id);
        $this->db->where("status", "approved");
        $this->db->where("is_online", "1");
        $query = $this->db->get("astrologer_registration");
        return $query->result();
    }

    public function followastrologer_model($data)
    {

        if ($data["astrologer_id"] && $data["user_id"]) {

            $this->db->where("astrologer_id", $data["astrologer_id"]);
            $this->db->where("user_id", $data["user_id"]);
            $query = $this->db->get("following");

            if ($query->num_rows() > 0) {

                $response = [
                    "status" => "exist",
                    "message" => "astrologer followed successfully",

                ];


                return $response;
            }


        } else {

            $response = [
                "status" => "error",
                "message" => "userid and astrologer id missing",

            ];



            return $response;
        }

        $query = $this->db->insert("following", $data);
        if ($query) {

            $response = [
                "status" => "success",
                "message" => "astrologer followed successfully",

            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "astrologer followed successfully"
            ];
        }

        return $response;


    }


    public function checkfollow_status_model($data)
    {


        if (empty($data["astrologer_id"]) || empty($data["session_id"])) {

            $response = [
                "status" => "error",
                "message" => "userid and astrologer id missing",

            ];
            return $response;
        } else {

            $this->db->where("astrologer_id", $data["astrologer_id"]);
            $this->db->where("user_id", $data["session_id"]);
            $query = $this->db->get("following");


            if ($query->num_rows() > 0) {
                $response = [
                    "status" => "success",
                    "value" => "followed",

                ];

            } else if ($query->num_rows() == 0) {
                $response = [
                    "status" => "success",
                    "value" => "unfollowed",

                ];


            } else {
                $response = [
                    "status" => "error",
                    "message" => "userid and astrologer id missing",
                ];

            }

            return $response;
        }
    }


    public function show_top_astrologer_model()
    {

        $this->db->select("astrologer_registration.* , AVG(astrologer_feedback.rating) as average_rating");
        $this->db->from("astrologer_registration");
        $this->db->join('astrologer_feedback', 'astrologer_feedback.astrologer_id = astrologer_registration.id', 'Left');
        $this->db->group_by('astrologer_registration.id');
        $this->db->where("status", "approved");
        $this->db->where("is_online", "1");
        $this->db->order_by('average_rating', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result();



    }

    public function getfollowed_astrologer_by_user_model($session_id)
    {

        if (!$session_id) {

            $response = [
                "status" => "error",
                "message" => "session id is missing "
            ];

            return $response;

        } else {

            $this->db->select("following.* , astrologer_registration.*");
            $this->db->from("following");
            $this->db->join('astrologer_registration', 'astrologer_registration.id = following.astrologer_id', 'left');
            $this->db->where("user_id", $session_id);
            $this->db->order_by("astrologer_registration.name", "ASC");
            $query = $this->db->get();
            return $query->result();
        }

    }


    public function unfollowastrologer_model($data)
    {

        if ((!$data["session_id"]) && (!$data["astrologer_id"])) {
            $response = [
                "status" => "error",
                "message" => "session id is missing "
            ];


            return $response;

        } else {

            $this->db->where("user_id", $data["session_id"]);
            $this->db->where("astrologer_id", $data["astrologer_id"]);
            $query = $this->db->get("following");

            if ($query->num_rows() == 0) {
                $response = [
                    "status" => "notfound",
                    "message" => "astrologer not found"
                ];

                return $response;
            }

            $this->db->where("user_id", $data["session_id"]);
            $this->db->where("astrologer_id", $data["astrologer_id"]);
            $queryf = $this->db->delete("following");

            if ($queryf) {
                $response = [
                    "status" => "success",
                    "message" => "astrologer unfollwed successfully"
                ];

                return $response;

            }


        }
    }

    public function submitfeedback($data)
    {

        $query = $this->db->insert("astrologer_feedback", $data);

        return $query;
    }


    public function get_astrologer_feedback_model($astrologer_id)
    {

        $this->db->select("astrologer_feedback.* , jyotisika_users.user_name as username , jyotisika_users.user_image user_images");
        $this->db->from("astrologer_feedback");
        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = astrologer_feedback.user_id', 'Left');
        $this->db->where("astrologer_id", $astrologer_id);
        $query = $this->db->get();

        return $query->result();
    }


    public function get_avg_rating_model($astrologer_id)
    {

        $this->db->select('astrologer_feedback.astrologer_id, AVG(astrologer_feedback.rating) as average_rating');
        $this->db->from('astrologer_feedback');
        $this->db->where("astrologer_id", $astrologer_id);
        $query = $this->db->get();

        return $query->result();
    }


    public function getproducts_model()
    {

        $query = $this->db->get("jotishika_mall");
        return $query->result();
    }

    public function get_specific_product_model($product_id)
    {

        $this->db->where("product_id", $product_id);
        $query = $this->db->get("jotishika_mall");
        return $query->result();
    }


    public function save_user_address($data)
    {

        $query = $this->db->insert("deliveryaddress", $data);
        return $query;
    }

    public function get_delivery_address_model($user_id)
    {

        $this->db->where("user_id", $user_id);
        $query = $this->db->get("deliveryaddress");
        return $query->result();
    }







    //Pujari section 

    public function show_online_puja_model()
    {

        $query = $this->db->get("puja");
        return $query->result();
    }


    public function show_specific_puja_model($puja_id)
    {

        $this->db->where("puja_id", $puja_id);
        $query = $this->db->get("puja");
        return $query->result();

    }

    public function show_online_pujari_model()
    {

        $query = $this->db->get("pujari_registration");
        return $query->result();
    }


    public function AddToCart_model($formdata)
    {
        $product_id = $formdata["product_id"];
        $user_id = $formdata["user_id"];


        $this->db->where("product_id", $product_id);
        $this->db->where("user_id", $user_id);
        $query = $this->db->get("store_cart");

        if ($query->num_rows() > 0) {
            return [
                "status" => "productalreadyexist",
                "message" => "Product is already in your cart"
            ];
        }


        if ($this->db->insert("store_cart", $formdata)) {
            return [
                "status" => "success",
                "message" => "Product added to cart successfully",
                "insert_id" => $this->db->insert_id()
            ];
        } else {
            return [
                "status" => "error",
                "message" => "Failed to add product to cart",
                "db_error" => $this->db->error()
            ];
        }
    }


    public function VerifyProductInTheCart_model($user_id, $product_id)
    {
        $this->db->where("product_id", $product_id);
        $this->db->where("user_id", $user_id);
        $query = $this->db->get("store_cart");

        if ($query->num_rows() == 0) {
            return [
                "status" => "success",
                "message" => "Product is not in your cart"
            ];
        } else {
            return [
                "status" => "productalreadyexist",
                "message" => "Product is already in your cart"
            ];
        }
    }


    public function GetCartData_model($user_id)
    {
        $this->db->select("store_cart.* , jotishika_mall.*");
        $this->db->from("store_cart");
        $this->db->join('jotishika_mall' , 'jotishika_mall.product_id = store_cart.product_id');
        $this->db->where("store_cart.user_id", $user_id);
         $query = $this->db->get();
        return $query->result();

    }




}