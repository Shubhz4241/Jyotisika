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


    public function get_astrologer_by_id_model($astrologer_id)
    {


        $this->db->where("id", $astrologer_id);
        $this->db->where("status", "approved");
        $this->db->where("is_online", "1");
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

        if ($chatSession) {
            $astrologer['chat_start_time'] = $chatSession->start_time;
            $astrologer['chat_expire_on'] = $chatSession->expire_on;
            $astrologer['chatstatus'] = "active";
        } else {
            $astrologer['chat_start_time'] = null;
            $astrologer['chat_expire_on'] = null;
            $astrologer['chatstatus'] = "inactive";
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

        $this->db->select("pujari_registration.id as pujari_id_, pujari_registration.name as pujariname,pujari_registration.*,  services.* , pujari_services.* , pujari_services.status as puja_status ,  AVG(pujari_feedback.rating) as average_rating");
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

                if ((int)$nummobrows >= (int)$pujaData["totalAttendee"]) {
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
        $this->db->select('pujari_feedback.pujari_id, AVG(pujari_feedback.rating) as average_rating');
        $this->db->from('pujari_feedback');
        $this->db->where("pujari_id", $pujari_id);
        $query = $this->db->get();

        return $query->result();

    }

    public function get_no_of_completed_puja_model($pujari_id)
    {

        $this->db->where("status", "Completed");
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

        // Check if update was successful
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false; // No rows updated
        }
    }

    public function show_mob_puja_model(){

        $this->db->select('services.* ,services.name as puja_name ,  mob_puja.* ,mob_puja.id as mobid,   pujari_registration.*');
        $this->db->from("mob_puja");
        $this->db->join("services" , "services.id = mob_puja.service_id");
        $this->db->join("pujari_registration", "pujari_registration.id = mob_puja.pujari_id");
        $query =  $this->db->get();  
        return  $query->result();

    }







}