<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PujariModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function checkUserStatus($mobile_number)
    {
        $this->db->where('contact', $mobile_number);
        $query = $this->db->get('pujari_registration');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function generateOtp()
    {
        return rand(1000, 9999);
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
            return false;
        }

        if ($currentTime > $user->expiry_time) {
            return false;
        }

        return true;
    }

    public function getPujariByMobile($mobile_number)
    {
        return $this->db->where('contact', $mobile_number)->get('pujari_registration')->row_array();
    }

    public function getPujariByMobileNumber($mobile_number)
    {
        return $this->db->where('contact', $mobile_number)->get('pujari_registration')->row_array();
    }

    public function getPujariByEmail($email)
    {
        return $this->db->where('email', $email)->get('pujari_registration')->row_array();
    }

    public function registerPujari($data)
    {
        return $this->db->insert('pujari_registration', $data);
    }




    public function getAllRequest($pujari_id)
    {
        $this->db->select('
        bookpuja_request_by_user_to_pujari.book_puja_id,
        bookpuja_request_by_user_to_pujari.payment_status,
        bookpuja_request_by_user_to_pujari.user_email,
        bookpuja_request_by_user_to_pujari.status,
        bookpuja_request_by_user_to_pujari.puja_date,
        bookpuja_request_by_user_to_pujari.puja_mode,
        bookpuja_request_by_user_to_pujari.puja_time,
        jyotisika_users.user_name,
        jyotisika_users.user_CurrentAddress AS address,
        jyotisika_users.user_image,
        COALESCE(services.name, fallback_service.name) AS service_name
    ');

        $this->db->from('bookpuja_request_by_user_to_pujari');
        $this->db->where('bookpuja_request_by_user_to_pujari.pujari_id', $pujari_id);

        // Join for online puja (service_id in main table)
        $this->db->join('services', 'services.id = bookpuja_request_by_user_to_pujari.service_id', 'left');

        // Join for fallback (in case of mob puja)
        $this->db->join('mob_puja', 'mob_puja.id = bookpuja_request_by_user_to_pujari.mob_puja_id', 'left');
        $this->db->join('services AS fallback_service', 'fallback_service.id = mob_puja.service_id', 'left');

        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id', 'left');

        $this->db->order_by('bookpuja_request_by_user_to_pujari.book_puja_id', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }

    public function getLatestRequestByPujari($pujari_id)
    {
        $this->db->select('
            b.book_puja_id,
            b.puja_mode,
            b.puja_date,
            b.puja_time,
            b.service_id,
            b.pujari_id,
            b.jyotisika_user_id,
            COALESCE(s.name, fs.name) as name,
            a.user_name as user_name,
            a.user_CurrentAddress as user_CurrentAddress,
            a.user_image as user_image
        ');

        $this->db->from('bookpuja_request_by_user_to_pujari b');

        // Join online service
        $this->db->join('services s', 's.id = b.service_id', 'left');

        // Join mob_puja and fallback service
        $this->db->join('mob_puja m', 'm.id = b.mob_puja_id', 'left');
        $this->db->join('services fs', 'fs.id = m.service_id', 'left');

        $this->db->join('jyotisika_users a', 'a.user_id = b.jyotisika_user_id', 'left');

        $this->db->where('b.pujari_id', $pujari_id);
        $this->db->order_by('b.book_puja_id', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

    public function getRequestDetails($request_id)
    {
        $this->db->select('bp.*, u.user_name, s.name');
        $this->db->from('bookpuja_request_by_user_to_pujari bp');
        $this->db->join('jyotisika_users u', 'bp.jyotisika_user_id = u.user_id', 'left');
        $this->db->join('services s', 'bp.service_id = s.id', 'left');
        $this->db->where('bp.book_puja_id', $request_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }

    public function acceptRequest($id)
    {
        $this->db->select('puja_mode, service_id, puja_date, puja_time, pujari_id,mob_puja_id');
        $this->db->from('bookpuja_request_by_user_to_pujari');
        $this->db->where('book_puja_id', $id);
        $query = $this->db->get();
        $request = $query->row();

        $this->db->where('book_puja_id', $id);
        $status_update = $this->db->update('bookpuja_request_by_user_to_pujari', ['status' => "Approved"]);

        if ($status_update && $request && strtolower($request->puja_mode) === 'mob' && !empty($request->mob_puja_id)) {
            $this->db->set('attendee', 'attendee + 1', FALSE);
            $this->db->where('id', $request->mob_puja_id);
            $this->db->update('mob_puja');
        }

        return $status_update;
    }

    public function rejectRequest($id)
    {
        $this->db->where('book_puja_id', $id);
        return $this->db->update('bookpuja_request_by_user_to_pujari', ['status' => "Rejected"]);
    }

    public function getAllFeedback($pujari_id)
    {
        $this->db->select('pujari_reviews.id, pujari_reviews.rating, pujari_reviews.puja_id, pujari_reviews.pujari_id, pujari_reviews.user_id, pujari_reviews.message, pujari_reviews.created_at, jyotisika_users.user_name');
        $this->db->from('pujari_reviews');
        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = pujari_reviews.user_id', 'left');
        $this->db->where('pujari_reviews.pujari_id', $pujari_id);
        $this->db->group_by('pujari_reviews.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteFeedback($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pujari_reviews');
    }

    public function addMobPuja($data)
    {
        return $this->db->insert('mob_puja', $data);
    }

    public function todaySchedule($pujari_id)
    {
        $this->db->select('bookpuja_request_by_user_to_pujari.book_puja_id, bookpuja_request_by_user_to_pujari.puja_date, bookpuja_request_by_user_to_pujari.puja_mode,bookpuja_request_by_user_to_pujari.puja_time,bookpuja_request_by_user_to_pujari.puja_status,bookpuja_request_by_user_to_pujari.request_created_at, jyotisika_users.user_name,jyotisika_users.user_image, jyotisika_users.user_CurrentAddress AS address ,  services.name AS service_name');
        $this->db->where('pujari_id', $pujari_id);
        $this->db->where('puja_date', date('Y-m-d'));
        $this->db->where('status', 'Approved');
        $this->db->from('bookpuja_request_by_user_to_pujari');

        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id', 'left');
        $this->db->join('services', 'services.id = bookpuja_request_by_user_to_pujari.service_id', 'left');

        $query = $this->db->get();
        return $query->result();
    }

    public function getPujariDetailsById($pujari_id)
    {
        return $this->db->where('id', $pujari_id)->get('pujari_registration')->row_array();
    }

    public function updatePujariDetailsById($pujari_id, $data)
    {
        return $this->db->where('id', $pujari_id)->update('pujari_registration', $data);
    }

    public function getServicesByType($type)
    {
        return $this->db->get_where('services', ['service_type' => $type])->result();
    }

    public function getServiceById($service_id)
    {
        return $this->db->get_where('services', ['id' => $service_id])->row();
    }

    public function addPendingService($data)
    {
        return $this->db->insert('pujari_services', $data);
    }

    public function getServiceByName($name)
    {
        return $this->db
            ->where('name', $name)
            ->get('services')
            ->row_array();
    }


    public function getLoggedInPujariServices($pujari_id)
    {
        // Fetch pujari_services with service names
        $this->db->select(' ps.id,
    ps.specialties,
    ps.available_day,
    ps.start_time,
    ps.end_time,
    ps.puja_charges,
    ps.pujari_id,
    ps.service_id');
        $this->db->from('pujari_services ps');
        $this->db->where('ps.pujari_id', $pujari_id);
        $this->db->where('ps.status', 'approved');
        $pujari_services = $this->db->get()->result();

        if (!$pujari_services) {
            return false;
        }

        // Extract service details for the dropdown
        // $services = [];
        // foreach ($pujari_services as $ps) {
        //     $services[] = [
        //         'id' => $ps->service_id,
        //         'name' => $ps->specialties
        //     ];
        // }

        // Remove duplicates (if any)
        //$services = array_values(array_unique($services, SORT_REGULAR));

        return [
            // 'services' => $services, // For dropdown
            'pujari_services' => $pujari_services // Full details for form fields
        ];
    }

    public function getPujariServiceById($pujari_id, $service_id)
    {
        $this->db->where('pujari_id', $pujari_id);
        $this->db->where('service_id', $service_id);
        return $this->db->get('pujari_services')->row();
    }

    public function updateLoggedInPujariService($pujari_id, $service_id, $data)
    {
        $this->db->where('pujari_id', $pujari_id);
        $this->db->where('service_id', $service_id);
        return $this->db->update('pujari_services', $data);
    }

    public function updateServicePrice($pujari_id, $service_name, $price)
    {
        // $this->db->select('id');
        // $this->db->from('services');
        // $this->db->where('name', $service_name);
        // $service = $this->db->get()->row();

        // if (!$service) {
        //     return false;
        // }

        // $service_name = $service->name;

        $this->db->where('pujari_id', $pujari_id);
        $this->db->where('specialties', $service_name);
        $this->db->update('pujari_services', ['puja_charges' => $price]);

        return $this->db->affected_rows() > 0;
    }

    public function getOnlinePujaSchedules($pujari_id, $today, $type)
    {
        $this->db->select("
             b.book_puja_id,
             b.puja_mode,
             b.puja_date,
             b.puja_time,
             b.service_id,
             s.name AS puja_name,
             a.user_name,
             a.user_CurrentAddress AS address
         ");
        $this->db->from('bookpuja_request_by_user_to_pujari b');
        $this->db->join('services s', 's.id = b.service_id', 'left');
        $this->db->join('jyotisika_users a', 'a.user_id = b.jyotisika_user_id', 'left');
        $this->db->where('b.pujari_id', $pujari_id);
        $this->db->where('b.puja_mode', 'Online');
        $this->db->where('b.status', 'Approved');

        if ($type === 'today') {
            $this->db->where('b.puja_date', $today);
        } else { // upcoming
            $this->db->where('b.puja_date >', $today);
        }

        $this->db->order_by('b.puja_date, b.puja_time', 'ASC');
        $query = $this->db->get();

        log_message('debug', 'Online Puja Query: ' . $this->db->last_query());
        return $query->result_array();
    }

    public function getMobPujaSchedules($pujari_id, $today, $type)
    {
        $this->db->select("
             m.id,
             m.name AS puja_name,
             m.service_id,
             m.date AS puja_date,
             m.time AS puja_time,
             m.totalAttendee AS total_attendee,
             m.attendee,
             m.pujari_id,
             m.original_price,
             m.discount_price,
             m.duration,
         ");
        $this->db->from('mob_puja m');
        $this->db->where('m.pujari_id', $pujari_id);

        if ($type === 'today') {
            $this->db->where('m.date', $today);
        } else { // upcoming
            $this->db->where('m.date >', $today);
        }

        $this->db->order_by('m.date, m.time', 'ASC');
        $query = $this->db->get();

        log_message('debug', 'Mob Puja Query: ' . $this->db->last_query());
        return $query->result_array();
    }

    public function countPuja($pujari_id)
    {
        $this->db->where('puja_mode', 'Online');
        $this->db->where('puja_status', 'Completed');
        $this->db->where('pujari_id', $pujari_id);
        $query = $this->db->get('bookpuja_request_by_user_to_pujari');
        return $query->num_rows();
    }

    public function countMobPuja($pujari_id)
    {
        // $this->db->where('status', 'Approved');
        $this->db->where('puja_mode', 'mob');
        $this->db->where('puja_status', 'Completed');
        $this->db->where('pujari_id', $pujari_id);
        $query = $this->db->get('bookpuja_request_by_user_to_pujari');
        return $query->num_rows();
    }


    public function earningsBreakdownMonthlyOnline($pujari_id)
    {

        $this->db->select('bookpuja_request_by_user_to_pujari.jyotisika_user_id,bookpuja_request_by_user_to_pujari.puja_date, bookpuja_request_by_user_to_pujari.pujari_id, bookpuja_request_by_user_to_pujari.puja_status, bookpuja_request_by_user_to_pujari.puja_mode , bookpuja_request_by_user_to_pujari.jyotisika_user_id, services.name AS service_name,pujari_services.puja_charges AS price, jyotisika_users.user_name');
        // $this->db->where('pujari_id', $pujari_id);
        $this->db->from('bookpuja_request_by_user_to_pujari');

        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id', 'left');
        $this->db->join('services', 'services.id = bookpuja_request_by_user_to_pujari.service_id', 'left');
        $this->db->join('pujari_services', 'pujari_services.service_id = services.id', 'left');
        $this->db->where('puja_status', 'Completed');
        $this->db->where('bookpuja_request_by_user_to_pujari.pujari_id', $pujari_id);

        $this->db->where('MONTH(puja_date)', date('m'));
        $this->db->where('YEAR(puja_date)', date('Y'));
        $this->db->where('puja_mode', 'Online');
        $query = $this->db->get();
        return $query->result();
    }


    public function earningsBreakdownMonthlyMob($pujari_id)
    {

        $this->db->select('bookpuja_request_by_user_to_pujari.jyotisika_user_id,bookpuja_request_by_user_to_pujari.puja_date, bookpuja_request_by_user_to_pujari.pujari_id, bookpuja_request_by_user_to_pujari.puja_status, bookpuja_request_by_user_to_pujari.puja_mode, bookpuja_request_by_user_to_pujari.jyotisika_user_id, mob_puja.name AS service_name, mob_puja.discount_price, jyotisika_users.user_name');
        $this->db->from('bookpuja_request_by_user_to_pujari');

        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id', 'left');
        $this->db->join('mob_puja', 'mob_puja.service_id = bookpuja_request_by_user_to_pujari.service_id', 'left');

        // Corrected this line
        $this->db->where('bookpuja_request_by_user_to_pujari.pujari_id', $pujari_id);
        $this->db->where('MONTH(puja_date)', date('m'));
        $this->db->where('YEAR(puja_date)', date('Y'));
        $this->db->where('bookpuja_request_by_user_to_pujari.puja_status', 'Completed');
        $this->db->where('bookpuja_request_by_user_to_pujari.puja_mode', 'mob');

        $query = $this->db->get();
        return $query->result();
    }

    public function earningsBreakdownTotalMonthly($pujari_id)
    {


        // Get results from Online pujas
        $online_results = $this->earningsBreakdownMonthlyOnline($pujari_id);

        // Get results from Mob pujas
        $mob_results = $this->earningsBreakdownMonthlyMob($pujari_id);

        // Initialize total price variables
        $total_price_online = 0;
        $total_price_mob = 0;

        // Calculate total price from online results
        if (!empty($online_results)) {
            foreach ($online_results as $online) {
                $total_price_online += isset($online->price) ? (float)$online->price : 0;
            }
        }

        // Calculate total price from mob results
        if (!empty($mob_results)) {
            foreach ($mob_results as $mob) {
                $total_price_mob += isset($mob->discount_price) ? (float)$mob->discount_price : 0;
            }
        }

        // Calculate overall total
        $total_earnings = $total_price_online + $total_price_mob;

        // Return combined total earnings
        return array(
            'online_total' => $total_price_online,
            'mob_total' => $total_price_mob,
            'total_earnings' => $total_earnings
        );
    }

    public function earningsBreakdownOnline($pujari_id)
    {
        $this->db->select('
            bookpuja_request_by_user_to_pujari.jyotisika_user_id, 
            bookpuja_request_by_user_to_pujari.pujari_id, 
            bookpuja_request_by_user_to_pujari.puja_status, 
            bookpuja_request_by_user_to_pujari.puja_mode, 
            bookpuja_request_by_user_to_pujari.jyotisika_user_id,
            bookpuja_request_by_user_to_pujari.puja_date, 
            services.name,
            pujari_services.puja_charges AS price, 
            jyotisika_users.user_name
        ');
        $this->db->from('bookpuja_request_by_user_to_pujari');
        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id', 'left');
        $this->db->join('services', 'services.id = bookpuja_request_by_user_to_pujari.service_id', 'left');
        $this->db->join('pujari_services', 'pujari_services.service_id = services.id', 'left');
        $this->db->where('bookpuja_request_by_user_to_pujari.pujari_id', $pujari_id);
        $this->db->where('puja_status', 'Completed');
        $this->db->where('puja_mode', 'Online');
        $query = $this->db->get();
        return $query->result();
    }


    public function earningsBreakdownMob($pujari_id)
    {
        $this->db->select('
            bookpuja_request_by_user_to_pujari.jyotisika_user_id, 
            bookpuja_request_by_user_to_pujari.pujari_id, 
            bookpuja_request_by_user_to_pujari.puja_status, 
            bookpuja_request_by_user_to_pujari.puja_mode, 
            bookpuja_request_by_user_to_pujari.jyotisika_user_id,
            bookpuja_request_by_user_to_pujari.puja_date,
            mob_puja.name AS service_name, 
            mob_puja.discount_price, 
            jyotisika_users.user_name
        ');
        $this->db->from('bookpuja_request_by_user_to_pujari');
        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id', 'left');
        $this->db->join('mob_puja', 'mob_puja.service_id = bookpuja_request_by_user_to_pujari.service_id', 'left');
        $this->db->where('bookpuja_request_by_user_to_pujari.pujari_id', $pujari_id);
        $this->db->where('bookpuja_request_by_user_to_pujari.puja_status', 'Completed');
        $this->db->where('bookpuja_request_by_user_to_pujari.puja_mode', 'mob');
        $query = $this->db->get();
        return $query->result();
    }

     public function getTotalEarnings($pujari_id)
    {

        // Get results from Online pujas
        $online_results = $this->earningsBreakdownOnline($pujari_id);

        // Get results from Mob pujas
        $mob_results = $this->earningsBreakdownMob($pujari_id);

        // Initialize total price variables
        $total_price_online = 0;
        $total_price_mob = 0;

        // Calculate total price from online results
        if (!empty($online_results)) {
            foreach ($online_results as $online) {
                $total_price_online += isset($online->price) ? (float)$online->price : 0;
            }
        }

        // Calculate total price from mob results
        if (!empty($mob_results)) {
            foreach ($mob_results as $mob) {
                $total_price_mob += isset($mob->discount_price) ? (float)$mob->discount_price : 0;
            }
        }

        // Calculate overall total
        $total_earnings = $total_price_online + $total_price_mob;

        // Return combined total earnings
        return array(
            'online_total' => $total_price_online,
            'mob_total' => $total_price_mob,
            'total_earnings' => $total_earnings
        );
    }

    public function getOnlinePujas($pujari_id)
    {
        $this->db->select('bookpuja_request_by_user_to_pujari.book_puja_id, bookpuja_request_by_user_to_pujari.puja_status, bookpuja_request_by_user_to_pujari.puja_mode,bookpuja_request_by_user_to_pujari.puja_date,bookpuja_request_by_user_to_pujari.puja_time, jyotisika_users.user_name, jyotisika_users.user_CurrentAddress AS address ,  services.name AS service_name');
        // $this->db->where('pujari_id', $pujari_id);
        $this->db->from('bookpuja_request_by_user_to_pujari');

        $this->db->join('jyotisika_users', 'jyotisika_users.user_id = bookpuja_request_by_user_to_pujari.jyotisika_user_id', 'left');
        $this->db->join('services', 'services.id = bookpuja_request_by_user_to_pujari.service_id', 'left');
        $this->db->join('pujari_services', 'pujari_services.service_id = services.id', 'left');

        // $this->db->where('status', 'Approved');
        $this->db->where('puja_mode', 'Online');
        $this->db->where('puja_status', 'Completed');
        // $this->db->where('pujari_id', $poojari_id);
        $this->db->where('bookpuja_request_by_user_to_pujari.pujari_id', $pujari_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_status($id, $status)
    {
        $data = [
            'puja_status' => $status
        ];
        $this->db->where('book_puja_id', $id);
        return $this->db->update('bookpuja_request_by_user_to_pujari', $data);
    }
}
