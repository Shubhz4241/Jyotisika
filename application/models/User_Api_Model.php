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
        $data = $query->row_array();


        date_default_timezone_set('Asia/Kolkata');


        $timestamp = date('Y-m-d H:i:s');


        $form_data_user_notification = [
            "sender_id" => $data["user_id"],
            "sender_role" => "user",
            "receiver_id" => $data["user_id"],
            "receiver_role" => "user",
            "title" => "Welcome Back!",
            "message" => "Hello " . $data["user_name"] . ", welcome back to Jyotisika! We're happy to see you again.",
            "type" => "info",
            "created_at" => $timestamp,
            "updated_at" => $timestamp
        ];


        $this->db->insert("jyotisika_notifications", $form_data_user_notification);


        return $data;

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


                    date_default_timezone_set('Asia/Kolkata');

                    $timestamp = date('Y-m-d H:i:s');


                    $form_data_user_notification = [
                        "sender_id" => $inserted_id,
                        "sender_role" => "user",
                        "receiver_id" => $inserted_id,
                        "receiver_role" => "user",
                        "title" => "Welcome Aboard!",
                        "message" => "Dear " . $userdata["user_name"] . ", we're delighted to welcome you! Thank you for joining Jyotisika. We’re here to guide you on your spiritual journey.",
                        "type" => "info",
                        "created_at" => $timestamp,
                        "updated_at" => $timestamp
                    ];


                    $this->db->insert("jyotisika_notifications", $form_data_user_notification);

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


        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d H:i:s');

        // Prepare wallet update notification
        $form_data_user_notification = [
            "sender_id" => $sessionid,
            "sender_role" => "user",
            "receiver_id" => $sessionid,
            "receiver_role" => "user",
            "title" => "Wallet Updated",
            "message" => "Your wallet has been updated successfully. You’re now ready to chat with your preferred astrologer.",

            "type" => "success",
            "created_at" => $timestamp,
            "updated_at" => $timestamp
        ];

        $this->db->insert("jyotisika_notifications", $form_data_user_notification);




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

        $this->db->select("astrologer_registration.* , AVG(astrologer_feedback.rating) as average_rating ");
        $this->db->from("astrologer_registration");
        $this->db->join('astrologer_feedback', 'astrologer_feedback.astrologer_id = astrologer_registration.id', 'Left');
        $this->db->group_by('astrologer_registration.id');
        $this->db->where("status", "approved");
        $this->db->where("is_online", "1");

        $query = $this->db->get();
        $astrologers = $query->result();
        foreach ($astrologers as &$astro) {
            $chatSession = $this->db->select('start_time, expire_on')
                ->from('chat_sessions')
                ->where('astrologer_id', $astro->id)
                ->where('status', 'active')
                ->order_by('id', 'DESC')
                ->limit(1)
                ->get()
                ->row();

            if ($chatSession) {

                date_default_timezone_set('Asia/Kolkata');
                $timestamp = date('Y-m-d H:i:s', time());

                $astro->chat_start_time = $chatSession->start_time;
                $astro->chat_expire_on = $chatSession->expire_on;
                $astro->chatstatus = "active";

                if ($chatSession->expire_on < $timestamp) {
                    $astro->chatvalue = "sessionnotend";
                } else {
                    $astro->chatvalue = null;
                }


            } else {
                // $astro->chat_start_time = null;
                // $astro->chat_expire_on = null;
                // $astro->chatstatus = "inactive";

                $astro->chat_start_time = null;
                $astro->chat_expire_on = null;
                $astro->chatvalue = null;
                $astro->chatstatus = "inactive";
            }
        }

        return $astrologers;


    }


    public function get_astrologer_by_id_model($astrologer_id)
    {


        $this->db->where("id", $astrologer_id);
        $this->db->where("status", "approved");

        $query = $this->db->get("astrologer_registration");
        $astrologer = $query->result();

        $chatSession = $this->db->select('start_time, expire_on')
            ->from('chat_sessions')
            ->where('astrologer_id', $astrologer_id) // astrologer_details.id
            ->where('status', 'active')
            ->order_by('id', 'DESC')
            ->limit(1)
            ->get()
            ->row();

        // if ($chatSession) {
        //     $astrologer['chat_start_time'] = $chatSession->start_time;
        //     $astrologer['chat_expire_on'] = $chatSession->expire_on;
        //     $astrologer['chatstatus'] = "active";
        // } else {
        //     $astrologer['chat_start_time'] = null;
        //     $astrologer['chat_expire_on'] = null;
        //     $astrologer['chatstatus'] = "inactive";
        // }

        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d H:i:s', time());


        if ($chatSession) {

            $astrologer['chat_start_time'] = $chatSession->start_time;
            $astrologer['chat_expire_on'] = $chatSession->expire_on;
            $astrologer['chatstatus'] = "active";

            if ($astrologer['chat_expire_on'] < $timestamp) {
                $astrologer['chatvalue'] = "sessionnotend";
            } else {
                $astrologer['chatvalue'] = null;
            }
        } else {
            $astrologer['chat_start_time'] = null;
            $astrologer['chat_expire_on'] = null;
            $astrologer['chatstatus'] = "inactive";
            $astrologer['chatvalue'] = null;
        }


        return $astrologer;
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


            $this->db->where("user_id", $data["user_id"]);
            $user_data = $this->db->get("jyotisika_users")->row_array();

            date_default_timezone_set('Asia/Kolkata');

            $timestamp = date('Y-m-d H:i:s');


            $form_data_astrologer_notification = [

                "sender_id" => $data["user_id"],
                "sender_role" => "user",
                "receiver_id" => $data["astrologer_id"],
                "receiver_role" => "astrologer",
                "title" => "New Follower",
                "message" => $user_data["user_name"] . " has started following you. Stay connected and share your guidance.",
                "type" => "info",
                "created_at" => $timestamp,
                "updated_at" => $timestamp


            ];

            $this->db->insert("jyotisika_notifications", $form_data_astrologer_notification);
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
        $astrologers = $query->result();
        foreach ($astrologers as &$astro) {
            $chatSession = $this->db->select('start_time, expire_on')
                ->from('chat_sessions')
                ->where('astrologer_id', $astro->id)
                ->where('status', 'active')
                ->order_by('id', 'DESC')
                ->limit(1)
                ->get()
                ->row();

            if ($chatSession) {
                $astro->chat_start_time = $chatSession->start_time;
                $astro->chat_expire_on = $chatSession->expire_on;
                $astro->chatstatus = "active";
            } else {
                $astro->chat_start_time = null;
                $astro->chat_expire_on = null;
                $astro->chatstatus = "inactive";
            }
        }

        return $astrologers;



    }


    public function get_astrologer_chat_with_user_model($session_id)
    {

        if (!$session_id) {

            $response = [
                "status" => "error",
                "message" => "session id is missing "
            ];

            return $response;

        } else {

            $this->db->select("chat_sessions.astrologer_id , astrologer_registration.*");
            $this->db->from("chat_sessions");
            $this->db->join("astrologer_registration", "astrologer_registration.id = chat_sessions.astrologer_id");
            $this->db->where("user_id", $session_id);
            $this->db->group_by("chat_sessions.astrologer_id");
            $query = $this->db->get();
            return $query->result();
        }
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


                $this->db->where("user_id", $data["session_id"]);
                $user_data = $this->db->get("jyotisika_users")->row_array();

                  date_default_timezone_set('Asia/Kolkata');

                    $timestamp = date('Y-m-d H:i:s');


                    $form_data_astrologer_notification = [

                        "sender_id" => $data["session_id"],
                        "sender_role" => "user",
                        "receiver_id" => $data["astrologer_id"],
                        "receiver_role" => "astrologer",
                        "title"   => "Unfollowed",
                        "message" => $user_data["user_name"] . " has unfollowed you.",

                        "type" => "info",
                        "created_at" => $timestamp,
                        "updated_at" => $timestamp

                    ];

                     $this->db->insert("jyotisika_notifications", $form_data_astrologer_notification);


                return $response;

            }


        }
    }

    public function submitfeedback($data)
    {

        $this->db->where("user_id", $data["user_id"]);
        $user_data = $this->db->get("jyotisika_users")->row_array();

        date_default_timezone_set('Asia/Kolkata');

        $timestamp = date('Y-m-d H:i:s');


        $form_data_pujari_notification = [

            "sender_id" => $data["user_id"],
            "sender_role" => "user",
            "receiver_id" => $data["astrologer_id"],
            "receiver_role" => "astrologer",
            "title" => "New Feedback Received",
            "message" => $user_data["user_name"] . " has submitted feedback on your service. You can view it in your dashboard.",
            "type" => "info",
            "created_at" => $timestamp,
            "updated_at" => $timestamp

        ];



        // Insert into notifications table

        $this->db->insert("jyotisika_notifications", $form_data_pujari_notification);


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

    public function show_puja_info_model($puja_id)
    {

        $this->db->where("id", $puja_id);
        $query = $this->db->get("services");
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
        $this->db->join('jotishika_mall', 'jotishika_mall.product_id = store_cart.product_id');
        $this->db->where("store_cart.user_id", $user_id);
        $query = $this->db->get();
        return $query->result();

    }


    public function getcartdata_razerpay_model_($user_id)
    {

        $this->db->where("user_id", $user_id);
        $query = $this->db->get("store_cart");
        return $query->result();
    }


    public function updatequantity_model($product_id, $user_id, $quantity)
    {

        $this->db->where("product_id ", $product_id);
        $this->db->where("user_id ", $user_id);

        return $this->db->update("store_cart", ["product_quantity" => $quantity]);
    }


    public function deleteproductfromcart_model($product_id, $user_id)
    {

        $this->db->where("product_id ", $product_id);
        $this->db->where("user_id ", $user_id);
        $query = $this->db->delete("store_cart");
        return $query;
    }

    public function getuserinfo_model($addressid)
    {

        $this->db->where("user_info_id", $addressid);
        $query = $this->db->get("deliveryaddress");

        return $query->result();

    }

    public function getcartdata_model_data($user_id)
    {

        $this->db->where("user_id", $user_id);
        $query = $this->db->get("store_cart");
        return $query->result();
    }

    public function create_order($orderdata)
    {

        date_default_timezone_set('Asia/Kolkata');

        $timestamp = date('Y-m-d H:i:s');


        $this->db->where("user_id", $orderdata["user_id"]);
        $user_data = $this->db->get("jyotisika_users")->row_array();


        $form_data_order_notification = [

            "sender_id" => $orderdata["user_id"],
            "sender_role" => "user",
            "receiver_id" => $orderdata["user_id"],
            "receiver_role" => "user",
            "title" => "Order Confirmed",
            "message" => "Thank you, " . $user_data["user_name"] . "! Your order has been successfully placed. We will keep you updated on its status.",
            "type" => "success",
            "created_at" => $timestamp,
            "updated_at" => $timestamp,
        ];

        $this->db->insert("jyotisika_notifications", $form_data_order_notification);


        $form_data_order_notification = [

            "sender_id" => $orderdata["user_id"],
            "sender_role" => "user",
            "receiver_id" => 1,
            "receiver_role" => "admin",
            "title" => "New Order Placed",
            "message" => $orderdata["user_fullname"] . " has placed a new order. Please review and process it at your earliest convenience.",
            "type" => "success",
            "created_at" => $timestamp,
            "updated_at" => $timestamp,
        ];

        $this->db->insert("jyotisika_notifications", $form_data_order_notification);



        $this->db->insert('jyotisika_mall_orders', $orderdata);
        return $this->db->insert_id();
    }

    public function add_order_item($orderdata)
    {
        $this->db->insert('order_items', $orderdata);
        return $this->db->insert_id();
    }

    public function remove_cart_items($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('store_cart'); // Deletes all cart items for the user
    }



    public function showorderedproducts_model($user_id)
    {
        $this->db->select('jyotisika_mall_orders.*, order_items.*, jotishika_mall.*');
        $this->db->from('jyotisika_mall_orders');
        $this->db->join('order_items', 'jyotisika_mall_orders.order_id = order_items.order_id', 'inner');
        $this->db->join('jotishika_mall', 'order_items.product_id = jotishika_mall.product_id', 'inner');
        $this->db->where('jyotisika_mall_orders.user_id', $user_id);
        $this->db->where('jyotisika_mall_orders.status !=', 'shipped');
        $this->db->order_by('jyotisika_mall_orders.order_date', 'DESC');



        $query = $this->db->get();
        return $query->result(); // Fetch and return results
    }


    public function showorderedproducts_model_shipped($user_id)
    {
        $this->db->select('jyotisika_mall_orders.*, order_items.*, jotishika_mall.*');
        $this->db->from('jyotisika_mall_orders');
        $this->db->join('order_items', 'jyotisika_mall_orders.order_id = order_items.order_id', 'inner');
        $this->db->join('jotishika_mall', 'order_items.product_id = jotishika_mall.product_id', 'inner'); // Joining products table
        $this->db->where('jyotisika_mall_orders.user_id', $user_id);
        $this->db->where('jyotisika_mall_orders.status', 'shipped');
        $this->db->order_by('jyotisika_mall_orders.order_date', 'DESC'); // Order by created_at (most recent first)


        $query = $this->db->get();
        return $query->result(); // Fetch and return results
    }


    public function save_feedback($formdata)
    {

        date_default_timezone_set('Asia/Kolkata');

        $timestamp = date('Y-m-d H:i:s');

        $this->db->where("user_id", $formdata["session_id"]);
        $user_data = $this->db->get("jyotisika_users")->row_array();

        $form_data_product_notification = [

            "sender_id" => $formdata["session_id"],
            "sender_role" => "user",
            "receiver_id" => 1,
            "receiver_role" => "admin",
            "title" => "Product Feedback Submitted",
            "message" => $user_data["user_name"] . " has submitted feedback on a product. Please review it in the admin panel.",
            "type" => "info",
            "created_at" => $timestamp,
            "updated_at" => $timestamp

        ];

        $this->db->insert("jyotisika_notifications", $form_data_product_notification);

        $query = $this->db->insert("product_feedback", $formdata);
        return $query;


    }

    public function show_product_feedback_model($product_id)
    {

        $this->db->select("product_feedback.* , jyotisika_users.* ");
        $this->db->from("product_feedback");
        $this->db->join("jyotisika_users", "jyotisika_users.user_id = product_feedback.session_id");
        $this->db->join("jotishika_mall", "jotishika_mall.product_id = product_feedback.product_id");
        $this->db->where("product_feedback.product_id", $product_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_avg_rating_of_product_model($product_id)
    {
        $this->db->select('product_feedback.product_id, AVG(product_feedback.productrating) as average_product_rating');
        $this->db->where("product_id", $product_id);
        $query = $this->db->get("product_feedback");

        return $query->result();

    }



    //Pujari section 


    public function show_puja_model()
    {

        $this->db->where("service_type", "pujari");
        $query = $this->db->get("services");
        return $query->result();
    }



    public function get_pujari_of_puja_model($puja_id)
    {
        $this->db->select("pujari_registration.id as pujari_id_, 
                  pujari_registration.name as pujariname,
                  pujari_registration.*,  
                  services.* , 
                  pujari_services.* , 
                  pujari_services.status as puja_status,  
                  ROUND(AVG(pujari_feedback.rating), 1) as average_rating,
                  (SELECT COUNT(*) 
                   FROM bookpuja_request_by_user_to_pujari 
                   WHERE puja_status = 'Completed' 
                     AND pujari_id = pujari_registration.id
                  ) as completed_puja_count");
        $this->db->from("pujari_services");
        $this->db->join('pujari_registration', 'pujari_registration.id = pujari_services.pujari_id', 'Left');
        $this->db->join('pujari_feedback', 'pujari_feedback.pujari_id = pujari_registration.id', 'Left');
        $this->db->join('services', 'services.id = pujari_services.service_id', 'Left');
        $this->db->group_by('pujari_registration.id');
        $this->db->where("service_id", $puja_id);
        $this->db->where("pujari_services.status", "approved");

        $query = $this->db->get();
        return $query->result();
    }

    // public function get_pujari_of_puja_model($puja_id)
    // {

    //     $this->db->select("pujari_registration.id as pujari_id_, 
    //               pujari_registration.name as pujariname,
    //               pujari_registration.*,  
    //               services.* , 
    //               pujari_services.* , 
    //               pujari_services.status as puja_status,  
    //               AVG(pujari_feedback.rating) as average_rating,
    //               (SELECT COUNT(*) 
    //                FROM bookpuja_request_by_user_to_pujari 
    //                WHERE puja_status = 'Completed' 
    //                  AND pujari_id = pujari_registration.id
    //               ) as completed_puja_count");
    //     $this->db->from("pujari_services");
    //     $this->db->join('pujari_registration', 'pujari_registration.id = pujari_services.pujari_id', 'Left');
    //     $this->db->join('pujari_feedback', 'pujari_feedback.pujari_id = pujari_registration.id', 'Left');
    //     $this->db->join('services', 'services.id = pujari_services.service_id', 'Left');
    //     $this->db->group_by('pujari_registration.id');
    //     $this->db->where("service_id", $puja_id);
    //     $this->db->where("pujari_services.status", "approved");

    //     $query = $this->db->get();
    //     return $query->result();
    // }

    //  $this->db->select("astrologer_registration.* , AVG(astrologer_feedback.rating) as average_rating");
    //     $this->db->from("astrologer_registration");
    //     $this->db->join('astrologer_feedback', 'astrologer_feedback.astrologer_id = astrologer_registration.id', 'Left');
    //     $this->db->group_by('astrologer_registration.id');
    //     $this->db->where("status", "approved");
    //     $this->db->where("is_online", "1");



    public function pujari_view_more_model($pujari_id, $puja_id)
    {

        $this->db->select("pujari_registration.id as pujari_id_, pujari_registration.name as pujariname,pujari_registration.*,  services.* , pujari_services.* , pujari_services.status as puja_status");
        $this->db->from("pujari_services");
        $this->db->join('pujari_registration', 'pujari_registration.id = pujari_services.pujari_id', 'Left');
        $this->db->join('services', 'services.id = pujari_services.service_id', 'Left');
        $this->db->where("service_id", $puja_id);
        $this->db->where("pujari_id", $pujari_id);
        $this->db->where("pujari_services.status", "approved");

        $query = $this->db->get();
        return $query->result();

    }


    public function send_request_to_pujari_model($formdata)
    {

        $pujari_id = $formdata["pujari_id"];
        $puja_date = $formdata["puja_date"];
        $puja_time = $formdata["puja_time"];
        $service_id = $formdata["service_id"];
        $puja_mode = $formdata["puja_mode"]; // Ensure puja_mode exists



        $duration = 2;


        $this->db->where("pujari_id", $pujari_id);
        $this->db->where("puja_date", $puja_date);
        $query = $this->db->get("bookpuja_request_by_user_to_pujari");
        $pujari_data = $query->result();



        if ($puja_mode !== "Mob") {
            $new_puja_time = strtotime($puja_time);
            $new_puja_end_time = strtotime("+{$duration} hours", $new_puja_time);

            foreach ($pujari_data as $puja) {

                $existing_puja_time = strtotime($puja->puja_time);
                $existing_puja_end_time = strtotime("+{$duration} hours", $existing_puja_time);


                if (
                    ($new_puja_time >= $existing_puja_time && $new_puja_time < $existing_puja_end_time) ||
                    ($new_puja_end_time > $existing_puja_time && $new_puja_end_time <= $existing_puja_end_time)
                ) {
                    $response = [
                        "status" => "pujarialreadybooked",
                        "message" => "Pujari is already booked for this time. Please select a different time."
                    ];

                    return $response;
                }

            }


        } else {
            $this->db->from("bookpuja_request_by_user_to_pujari");
            $this->db->where([
                "jyotisika_user_id" => $formdata["jyotisika_user_id"],
                "pujari_id" => $formdata["pujari_id"],
                "mob_puja_id" => $formdata["mob_puja_id"]
            ]);


            $numrows = $this->db->count_all_results();






            if ($numrows > 0) {
                return [
                    "status" => "requestgetalready",
                    "message" => "You already sent request to book this puja"
                ];
            }

            $this->db->from("bookpuja_request_by_user_to_pujari");
            $this->db->where([
                "mob_puja_id" => $formdata["mob_puja_id"]
            ]);
            $nummobrows = $this->db->count_all_results();

            $this->db->where("id", $formdata["mob_puja_id"]);
            $query = $this->db->get("mob_puja");
            $pujaData = $query->row_array();

            if ((int) $nummobrows >= (int) $pujaData["totalAttendee"]) {
                return [
                    "status" => "userfull",
                    "message" => "User full"
                ];
            }



        }

        $this->db->insert("bookpuja_request_by_user_to_pujari", $formdata);






        if ($this->db->affected_rows() == 1) {
            $inserted_id = $this->db->insert_id();


            $this->db->where("book_puja_id", $inserted_id);
            $query = $this->db->get("bookpuja_request_by_user_to_pujari");





            date_default_timezone_set('Asia/Kolkata');
            $timestamp = date('Y-m-d H:i:s', time());


            $this->db->where("user_id", $formdata["jyotisika_user_id"]);
            $userdata = $this->db->get("jyotisika_users")->row_array();


            $formdatanotification = [
                "sender_id" => $formdata["jyotisika_user_id"],
                "sender_role" => "user",
                "receiver_id" => $formdata["pujari_id"],
                "receiver_role" => "pujari",
                "title" => "Pooja Booking Request",
                "message" => $userdata["user_name"] . " has sent a request to book a pooja on " . $formdata["puja_date"] . ".",
                "type" => "info",
                "created_at" => $timestamp,
                "updated_at" => $timestamp
            ];

            $this->db->insert("jyotisika_notifications", $formdatanotification);



            $formdatanotificationuser = [
                "sender_id" => $formdata["jyotisika_user_id"],
                "sender_role" => "user",
                "receiver_id" => $formdata["jyotisika_user_id"],
                "receiver_role" => "user",
                "title" => "Pooja Booking Request Sent",
                "message" => "Your pooja booking request has been sent. Please wait for the pujari's approval. You can track the status from the Orders section.",
                "type" => "success",
                "created_at" => $timestamp,
                "updated_at" => $timestamp
            ];

            $this->db->insert("jyotisika_notifications", $formdatanotificationuser);





            $response = [
                "status" => "success",
                "message" => "Request sent for puja.",
                "data" => $query->row_array()
            ];
            return $response;
        } else {
            $response = [
                "status" => "dbqueryfailed",
                "message" => "Database error occurred.",
                "error" => $this->db->error()['message'],
                "query" => $this->db->last_query()
            ];
            return $response;
        }


    }

    public function get_booked_puja_model($user_id)
    {
        $this->db->select("
        bookpuja_request_by_user_to_pujari.*, 
        pujari_registration.name as pujari_name,
        services.name as service_name,
        mob_puja.name as mobpujaname,
        jyotisika_users.user_name 
    ");
        $this->db->from("bookpuja_request_by_user_to_pujari");
        $this->db->join("pujari_registration", "pujari_registration.id = bookpuja_request_by_user_to_pujari.pujari_id", "left");
        $this->db->join("services", "services.id = bookpuja_request_by_user_to_pujari.service_id", "left");
        $this->db->join("mob_puja", "mob_puja.id = bookpuja_request_by_user_to_pujari.mob_puja_id", "left");
        $this->db->join("jyotisika_users", "jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id", "left");
        $this->db->where("bookpuja_request_by_user_to_pujari.jyotisika_user_id", $user_id);
        $this->db->where("bookpuja_request_by_user_to_pujari.puja_status !=", "Completed");

        $query = $this->db->get();
        return $query->result();
    }

    public function get_completed_puja_model($user_id)
    {

        $this->db->select("
        bookpuja_request_by_user_to_pujari.*, 
        pujari_registration.name as pujari_name,
        services.name as service_name,
        mob_puja.name as mobpujaname,
        jyotisika_users.user_name 
    ");
        $this->db->from("bookpuja_request_by_user_to_pujari");
        $this->db->join("pujari_registration", "pujari_registration.id = bookpuja_request_by_user_to_pujari.pujari_id", "left");
        $this->db->join("services", "services.id = bookpuja_request_by_user_to_pujari.service_id", "left");
        $this->db->join("mob_puja", "mob_puja.id = bookpuja_request_by_user_to_pujari.mob_puja_id", "left");
        $this->db->join("jyotisika_users", "jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id", "left");
        $this->db->where("bookpuja_request_by_user_to_pujari.jyotisika_user_id", $user_id);
        $this->db->where("bookpuja_request_by_user_to_pujari.puja_status", "Completed");
        $query = $this->db->get();
        return $query->result();
    }



    public function pujarifeedback_model($formdata)
    {

        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d H:i:s');


        $this->db->where("user_id", $formdata["user_id"]);
        $user_data = $this->db->get("jyotisika_users")->row_array();

        $form_data_pujari_notification = [
            "sender_id" => $formdata["user_id"],
            "sender_role" => "user",
            "receiver_id" => $formdata["pujari_id"],
            "receiver_role" => "pujari",
            "title" => "New Feedback Received",
            "message" => $user_data["user_name"] . " has submitted feedback on your service. You can view it in your dashboard.",
            "type" => "info",
            "created_at" => $timestamp,
            "updated_at" => $timestamp
        ];

        // Insert into notifications table
        $this->db->insert("jyotisika_notifications", $form_data_pujari_notification);

        $query = $this->db->insert("pujari_feedback", $formdata);
        return $query;


    }


    public function getpujarifeedback_model($pujari_id)
    {

        $this->db->select("pujari_feedback.* , jyotisika_users.user_name ,  jyotisika_users.user_image");
        $this->db->from("pujari_feedback");
        $this->db->join("jyotisika_users", "jyotisika_users.user_id = pujari_feedback.user_id");
        $this->db->where("pujari_id", $pujari_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_avg_rating_pujari_model($pujari_id)
    {
        $this->db->select('pujari_feedback.pujari_id, ROUND(AVG(pujari_feedback.rating), 1) as average_rating'); // Rounded to 1 decimal place
        $this->db->from('pujari_feedback');
        $this->db->where("pujari_id", $pujari_id);
        $query = $this->db->get();

        return $query->result();
    }


    public function get_no_of_completed_puja_model($pujari_id)
    {

        $this->db->where("puja_status", "Completed");
        $this->db->where("pujari_id", $pujari_id);
        $query = $this->db->get("bookpuja_request_by_user_to_pujari");
        $count = $query->num_rows();
        return $count;

    }




    public function update_payment_status_model($book_puja_id, $amount, $payment_id)
    {
        // Prepare data to update
        $data = [
            'amount_paid_by_user' => $amount,
            'payment_status' => 'Paid',  // Assuming you want to mark it as paid
            'payment_id' => $payment_id
        ];

        // Update the database
        $this->db->where("book_puja_id", $book_puja_id);
        $this->db->update("bookpuja_request_by_user_to_pujari", $data);
        $num = $this->db->affected_rows();



        $this->db->where("book_puja_id", $book_puja_id);
        $notification_data = $this->db->get("bookpuja_request_by_user_to_pujari")->row_array();

        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('Y-m-d H:i:s');

        $this->db->where("user_id", $notification_data["jyotisika_user_id"]);
        $querydata = $this->db->get("jyotisika_users")->row_array();

       
        $formdata = [
            "sender_id" => $notification_data["jyotisika_user_id"],
            "sender_role" => "user",
            "receiver_id" => $notification_data["pujari_id"],
            "receiver_role" => "pujari",
            "title" => "Pooja Payment Done",
            "message" => $querydata["user_name"] . " has successfully completed the payment for the pooja.",
            "type" => "success",
            "created_at" => $timestamp,
            "updated_at" => $timestamp
        ];

       
        $this->db->insert("jyotisika_notifications", $formdata);



        $formdata_pujari = [
            "sender_id" => $notification_data["jyotisika_user_id"],
            "sender_role" => "user",
            "receiver_id" => $notification_data["jyotisika_user_id"],
            "receiver_role" => "user",
            "title" => "Pooja Payment Done",
           "message" => "You have successfully completed the payment for your pooja. Thank you!",
            "type" => "success",
            "created_at" => $timestamp,
            "updated_at" => $timestamp
        ];

        // Insert into notifications table
        $this->db->insert("jyotisika_notifications", $formdata_pujari);








        // Check if update was successful
        if ($num > 0) {
            return true;
        } else {
            return false; // No rows updated
        }
    }

    // public function show_mob_puja_model()
    // {

    //     $this->db->select("services.* ,services.name as puja_name , mob_puja.original_price as original_price  ,mob_puja.totalAttendee as totalAttendee,  mob_puja.discount_price as discount_price , mob_puja.pujari_id as pujari_id , mob_puja.time as puja_time ,mob_puja.id as mobid, pujari_registration.* ,  mob_puja.date as mobpujadate,

    //      (SELECT COUNT(*) FROM bookpuja_request_by_user_to_pujari  WHERE puja_status = 'Completed'  AND pujari_id = pujari_registration.id ) as completed_puja_count");
    //     $this->db->from("mob_puja");
    //     $this->db->join("services", "services.id = mob_puja.service_id", 'Left');
    //     $this->db->join("pujari_registration", "pujari_registration.id =  mob_puja.pujari_id");

    //     $query = $this->db->get();
    //     return $query->result();

    // }


    //     public function show_mob_puja_model()
// {
//     $this->db->select("services.*,
//                        services.name as puja_name,
//                        mob_puja.original_price,
//                        mob_puja.totalAttendee,
//                        mob_puja.discount_price,
//                        mob_puja.pujari_id,
//                        mob_puja.time as puja_time,
//                        mob_puja.id as mobid,
//                        pujari_registration.*,
//                        mob_puja.date as mobpujadate,
//                        (SELECT COUNT(*) 
//                         FROM bookpuja_request_by_user_to_pujari  
//                         WHERE puja_status = 'Completed'  
//                         AND pujari_id = pujari_registration.id) as completed_puja_count");
//     $this->db->from("mob_puja");
//     $this->db->join("services", "services.id = mob_puja.service_id", 'left');
//     $this->db->join("pujari_registration", "pujari_registration.id = mob_puja.pujari_id");
//     $this->db->order_by('mob_puja.date', 'DESC'); // optional

    //     $query = $this->db->get();
//     return $query->result();
// }

    public function show_mob_puja_model()
    {
        $this->db->select("services.*,
                       services.name as puja_name,
                       mob_puja.original_price,
                       mob_puja.totalAttendee,
                       mob_puja.discount_price,
                       mob_puja.pujari_id,
                       mob_puja.time as puja_time,
                       mob_puja.id as mobid,
                       pujari_registration.*,
                       mob_puja.date as mobpujadate,
                       (SELECT COUNT(*) 
                        FROM bookpuja_request_by_user_to_pujari  
                        WHERE puja_status = 'Completed'  
                        AND pujari_id = pujari_registration.id) as completed_puja_count");

        $this->db->from("mob_puja");
        $this->db->join("services", "services.id = mob_puja.service_id", 'left');
        $this->db->join("pujari_registration", "pujari_registration.id = mob_puja.pujari_id");

        // 👇 Only include upcoming pujas (where date + time is in the future)
        $this->db->where("STR_TO_DATE(CONCAT(mob_puja.date, ' ', mob_puja.time), '%Y-%m-%d %H:%i:%s') >", date('Y-m-d H:i:s'));

        $this->db->order_by('mob_puja.date', 'ASC');

        $query = $this->db->get();
        return $query->result();
    }



    //  public function show_mob_puja_model()
    // {

    //    $query = $this->db->get("mob_puja");
    //    return $query->result();

    // }






    // public function show_mob_puja_model()
    // {
    //     $this->db->select("services.*, 
    //                    services.name as puja_name, 
    //                    mob_puja.*, 
    //                    mob_puja.id as mobid, 
    //                    pujari_registration.*,  
    //                    AVG(pujari_feedback.rating) as average_rating,
    //                    (SELECT COUNT(*) 
    //                     FROM bookpuja_request_by_user_to_pujari  
    //                     WHERE puja_status = 'Completed'  
    //                     AND pujari_id = pujari_registration.id
    //                    ) as completed_puja_count");

    //     $this->db->from("mob_puja");
    //     $this->db->join("services", "services.id = mob_puja.service_id", "left");
    //     $this->db->join("pujari_registration", "pujari_registration.id = mob_puja.pujari_id", "left");
    //     $this->db->join("pujari_feedback", "pujari_feedback.pujari_id = pujari_registration.id", "left");
    //     // $this->db->group_by("pujari_registration.id");

    //     $query = $this->db->get();
    //     return $query->result();
    // }



    public function show_festivals_model()
    {

        $query = $this->db->get("festivals");
        return $query->result();
    }

    public function show_specific_festival_model($festival_id)
    {

        $this->db->where("festivals_id", $festival_id);
        $query = $this->db->get("festivals");
        return $query->result();
    }


    public function show_user_model()
    {
        $query = $this->db->get("festivals");
        return $query->result();
    }


    public function showservices_model()
    {
        $this->db->where("service_type", "astrologer");
        $this->db->limit(4);
        $query = $this->db->get("services");
        return $query->result();
    }


    public function showallservices_model()
    {
        $this->db->where("service_type", "astrologer");
        $query = $this->db->get("services");
        return $query->result();
    }

    public function show_today_festivals_model()
    {
        $today = date('Y-m-d');

        $this->db->select('festivals_id, festivals_title, festivals_decription, festivals_date, festivals_image');
        $this->db->from('festivals');
        $this->db->where('DATE(festivals_date)', $today); // ✅ This is the fix

        $query = $this->db->get();
        return $query->result_array();
    }



    public function auto_cancel_puja_model()
    {
        date_default_timezone_set('Asia/Kolkata');


        $this->db->where('payment_status', 'Pending');
        $this->db->where('puja_status !=', 'Cancelled');
        $query = $this->db->get('bookpuja_request_by_user_to_pujari');

        $pujas = $query->result();

        foreach ($pujas as $puja) {

            $pujaDateTime = new DateTime($puja->puja_date . ' ' . $puja->puja_time);
            $now = new DateTime();
            $cancel = false;


            if ($now >= $pujaDateTime) {
                $cancel = true;
            } else {
                $interval = $now->diff($pujaDateTime);
                $hoursDiff = ($interval->days * 24) + $interval->h + ($interval->i / 60);
                if ($puja->puja_urgency === 'urgent') {
                    if ($hoursDiff < 4) {
                        $cancel = true;
                    }
                } else {

                    if ($hoursDiff < 48) {
                        $cancel = true;
                    }
                }
            }

            if ($cancel) {
                $this->db->where('book_puja_id', $puja->book_puja_id);
                $this->db->update('bookpuja_request_by_user_to_pujari', ['puja_status' => 'Cancelled']);


                $this->db->where("user_id",  $puja->jyotisika_user_id);
                $user_data = $this->db->get("jyotisika_users")->row_array();

                date_default_timezone_set('Asia/Kolkata');
                $timestamp = date('Y-m-d H:i:s');


                $formdata_pujari_notification = [
                    "sender_id" => $puja->jyotisika_user_id,
                    "sender_role" => "user",
                    "receiver_id" => $puja->pujari_id,
                    "receiver_role" => "pujari",
                    "title" => "Pooja Cancelled",
                   "message" => $user_data["user_name"] . " was unable to make the payment for the pooja, so the booking has been cancelled.",
                    "type" => "success",
                    "created_at" => $timestamp,
                    "updated_at" => $timestamp
                ];


                $this->db->insert("jyotisika_notifications", $formdata_pujari_notification);





                $formdata_user_notification = [
                    "sender_id" => $puja->jyotisika_user_id,
                    "sender_role" => "user",
                    "receiver_id" => $puja->jyotisika_user_id,
                    "receiver_role" => "user",
                    "title" => "Pooja Cancelled",
                  "message" => "Your pooja booking has been cancelled as the payment was not completed. Please rebook and complete the payment to confirm.",
                    "type" => "warning",
                    "created_at" => $timestamp,
                    "updated_at" => $timestamp
                ];


                $this->db->insert("jyotisika_notifications", $formdata_user_notification);


            }
        }
    }



    public function show_home_astrologer_service_model()
    {

        $query = $this->db->get("home_page_service");
        return $query->result();


    }



    //  $this->db->select("astrologer_registration.* , AVG(astrologer_feedback.rating) as average_rating ");
    //     $this->db->from("astrologer_registration");
    //     $this->db->join('astrologer_feedback', 'astrologer_feedback.astrologer_id = astrologer_registration.id', 'Left');
    //     $this->db->group_by('astrologer_registration.id');
    //     $this->db->where("status", "approved");
    //     $this->db->where("is_online", "1");

    //     $query = $this->db->get();
    //     $astrologers = $query->result();
    //     foreach ($astrologers as &$astro) {
    //         $chatSession = $this->db->select('start_time, expire_on')
    //             ->from('chat_sessions')
    //             ->where('astrologer_id', $astro->id)
    //             ->where('status', 'active')
    //             ->order_by('id', 'DESC')
    //             ->limit(1)
    //             ->get()
    //             ->row();

    //         if ($chatSession) {

    //             date_default_timezone_set('Asia/Kolkata');
    //             $timestamp = date('Y-m-d H:i:s', time());

    //             $astro->chat_start_time = $chatSession->start_time;
    //             $astro->chat_expire_on = $chatSession->expire_on;
    //             $astro->chatstatus = "active";

    //             if ($chatSession->expire_on < $timestamp) {
    //                 $astro->chatvalue = "sessionnotend";
    //             } else {
    //                 $astro->chatvalue = null;
    //             }


    //         } else {
    //             // $astro->chat_start_time = null;
    //             // $astro->chat_expire_on = null;
    //             // $astro->chatstatus = "inactive";

    //             $astro->chat_start_time = null;
    //             $astro->chat_expire_on = null;
    //             $astro->chatvalue = null;
    //             $astro->chatstatus = "inactive";
    //         }
    //     }

    //     return $astrologers;






    public function show_filtered_astrolger_model($service_id)
    {

        $this->db->select("astrologer_registration.*, astrologer_services.*, AVG(astrologer_feedback.rating) as average_rating");

        $this->db->from("astrologer_services");
        $this->db->join("astrologer_registration", "astrologer_registration.id = astrologer_services.astrologer_id", 'Left');
        $this->db->join('astrologer_feedback', 'astrologer_feedback.astrologer_id = astrologer_registration.id', 'Left');
        $this->db->group_by('astrologer_registration.id');
        $this->db->where("astrologer_registration.status", "approved");
        $this->db->where("astrologer_registration.is_online", "1");
        $this->db->where("astrologer_services.service_id", $service_id);
        $query = $this->db->get();

        $astrologers = $query->result();

        foreach ($astrologers as &$astro) {
            $chatSession = $this->db->select('start_time, expire_on')
                ->from('chat_sessions')
                ->where('astrologer_id', $astro->id)
                ->where('status', 'active')
                ->order_by('id', 'DESC')
                ->limit(1)
                ->get()
                ->row();

            if ($chatSession) {

                date_default_timezone_set('Asia/Kolkata');
                $timestamp = date('Y-m-d H:i:s', time());

                $astro->chat_start_time = $chatSession->start_time;
                $astro->chat_expire_on = $chatSession->expire_on;
                $astro->chatstatus = "active";

                if ($chatSession->expire_on < $timestamp) {
                    $astro->chatvalue = "sessionnotend";
                } else {
                    $astro->chatvalue = null;
                }


            } else {
                // $astro->chat_start_time = null;
                // $astro->chat_expire_on = null;
                // $astro->chatstatus = "inactive";

                $astro->chat_start_time = null;
                $astro->chat_expire_on = null;
                $astro->chatvalue = null;
                $astro->chatstatus = "inactive";
            }
        }

        return $astrologers;


    }
    //    public function show_filtered_astrolger_model($service_id)
// {
//     $this->db->select('
//         ar.id,
//         ar.name,
//         ar.profile_image,
//         ar.contact,
//         ar.email,
//         ar.gender,
//         ar.languages,
//         ar.specialties,
//         ar.experience,
//         ar.price_per_minute,
//         ar.is_online,

    //         ar.status,
//         ar.created_at,
//         ast_service.specialities as service_specialities,

    //     ');
//     $this->db->from('astrologer_services as ast_service');
//     $this->db->join('astrologer_registration as ar', 'ast_service.astrologer_id = ar.id');
//     $this->db->where('ast_service.service_id', $service_id);
//     $this->db->where('ar.is_online', '1'); // Only active astrologers
//      $this->db->where('ar.status', 'Approved');
//     $query = $this->db->get();
//     return $query->result();
// }



    public function show_service_info_model($service_id)
    {

        $this->db->where("id", $service_id);
        $query = $this->db->get("services");
        return $query->result();

    }


    public function show_notification_model($user_id)
    {
        $this->db->where("receiver_id", $user_id);
        $this->db->where("receiver_role", "user");
        $this->db->order_by("created_at", "DESC"); // Latest first
        $query = $this->db->get("jyotisika_notifications");
        return $query->result();
    }



    public function show_notification_number_model($user_id)
    {
        $this->db->where("receiver_id", $user_id);
        $this->db->where("receiver_role", "user");
        $this->db->where("is_read", 0);
        $query = $this->db->get("jyotisika_notifications");
        return $query->num_rows();
    }



    public function mark_as_read_notification($user_id)
    {

        $this->db->set('is_read', 1);


        $this->db->where('receiver_id', $user_id);
        $this->db->where('receiver_role', 'user');
        $this->db->where('is_read', 0);


        $this->db->update('jyotisika_notifications');


        return true;
    }



    public function show_blogs_model(){

      $query =   $this->db->get("blogs");
      return $query->result();
    }



    public function show_specific_blogs_model($blog_id){

        $this->db->where("blog_id", $blog_id);
        $query = $this->db->get("blogs");
        return $query->result();

    }


    public function show_pooja_info_model($puja_id){

        $this->db->where("id", $puja_id);
        $query = $this->db->get("services");
        return $query->result();

    }


    public function get_top_ratedproduct()
    {
        try {
            $this->db->select('as.*, AVG(pf.productrating) as average_rating');
            $this->db->from('jotishika_mall as as');
            $this->db->join('product_feedback as pf', 'pf.product_id = as.product_id', 'left');
            $this->db->group_by('as.product_id');
            $this->db->order_by('average_rating', 'DESC');
            $this->db->limit(5);

            $query = $this->db->get();
            $result = $query->result();

            if (!empty($result)) {
                return [
                    "status" => "success",
                    "data" => $result
                ];
            } else {
                return [
                    "status" => "notfound",
                    "message" => "No top-rated products found."
                ];
            }
        } catch (Exception $e) {
            return [
                "status" => "error",
                "message" => "Something went wrong: " . $e->getMessage()
            ];
        }
    }





}