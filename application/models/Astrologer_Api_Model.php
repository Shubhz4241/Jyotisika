<?php
class Astrologer_Api_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();  // Load the database here
    }

    public function insertTempData($data)
    {
        $this->db->insert('temp_users', $data);
    }

    public function getTempDataByPhone($phone)
    {
        return $this->db->get_where('temp_users', ['contact' => $phone])->row_array();
    }

    public function getOtpDataByPhone($phone)
    {
        return $this->db->get_where('otps', ['mobile' => $phone])->row_array();
    }

    public function deleteTempData($phone)
    {
        $this->db->delete('temp_users', ['contact' => $phone]);
    }

    public function user_check($phone)
    {
        $this->db->where('contact', $phone);
        $query = $this->db->get('astrologer_registration');
        return $query->num_rows() > 0;
    }



    public function get_user_by_mobile($mobile)
    {
        return $this->db->where('contact', $mobile)->get('astrologer_registration')->row_array();
    }


    // Get astrologer details by user ID
    public function get_astrologer_details_by_user_id($user_id)
    {
        return $this->db->where('id', $user_id)->get('astrologer_registration')->row_array();
    }

    public function registerUser($data)
    {
        // Flatten the specialties list for astrologer_registration
        $specialtyNames = array_column($data['specialties'], 'name');
        $specialtiesCommaSeparated = implode(',', $specialtyNames);

        // Insert into 'astrologer_registration' table
        $astrologerData = [
            'name'             => $data['name'],
            'email'            => $data['email'],
            'contact'          => $data['contact'],
            'gender'           => $data['gender'],
            'address'          => $data['address'],
            'languages'        => $data['languages'],
            'specialties'      => $specialtiesCommaSeparated, // Save as comma-separated string
            'experience'       => $data['experience'],
            'aadharcard'       => $data['aadhaar_card'],
            'certificates'     => $data['certificates'],
            'profile_image'      => $data['profile_image'],
            'status'           => 'new request',
            'price_per_minute' => $data['price_per_minute'] ?? '0',
            'is_online'        => 0,
            'mode'             => $data['mode'] ?? 'NA',
            'venue'            => $data['venue'] ?? 'NA',
            'meeting-link'     => $data['meeting-link'] ?? 'NA',
            'time'             => $data['time'] ?? 'NA',
            'date'             => $data['date'] ?? 'NA',
            'created_at'       => date('Y-m-d H:i:s')
        ];

        $this->db->insert('astrologer_registration', $astrologerData);
        $astrologer_id = $this->db->insert_id();

        // Insert each specialty into astrologer_services
        if (!empty($data['specialties']) && is_array($data['specialties'])) {
            foreach ($data['specialties'] as $specialty) {
                // Get the service_id from services table using the name
                $this->db->where('name', $specialty['name']);
                $service = $this->db->get('services')->row();

                if ($service) {
                    // Extract start_time and end_time from available_time or directly
                    $start_time = $specialty['start_time'] ?? null;
                    $end_time = $specialty['end_time'] ?? null;

                    // Fallback: if available_time is a string like "9:00 AM - 5:00 PM"
                    if ((!$start_time || !$end_time) && isset($specialty['available_time'])) {
                        $time_parts = explode('-', $specialty['available_time']);
                        $start_time = trim($time_parts[0] ?? '');
                        $end_time = trim($time_parts[1] ?? '');
                    }

                    $this->db->insert('astrologer_services', [
                        'astrologer_id'  => $astrologer_id,
                        'service_id'     => $service->id,
                        'specialities'   => $specialty['name'],
                        'available_days' => implode(',', $specialty['available_days']),
                        'start_time'     => $start_time,
                        'end_time'       => $end_time,
                        'status'         => 'pending'
                    ]);
                }
            }
        }
    }



    public function delete_existing_user($contact)
    {

        $this->db->or_where('contact', $contact);
        $this->db->delete('temp_users');
    }

    public function updateTempData($phone, $otp)
    {
        $this->db->where('contact', $phone);
        $this->db->update('temp_users', [
            'otp' => $otp,
            'created_at' => date('Y-m-d H:i:s') // Proper date format for MySQL timestamp or datetime field

        ]);
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

    //get the details of the astologer
    public function getAstrologerByPhone($mobile)
    {
        return $this->db->where('contact', $mobile)->get('astrologer_registration')->row();
    }




    // get the services related to the astrologer
    public function getServicesByType($type)
    {
        return $this->db->get_where('services', ['service_type' => $type])->result();
    }

    // get the details of the logged in astrologer
    public function getAstrologerDetailsById($id)
    {
        return $this->db->select('id, profile_image, name, contact, email, gender, address, languages, experience, aadharcard, certificates, status, price_per_minute, is_online, created_at')
            ->where('id', $id)
            ->get('astrologer_registration')
            ->row();
    }


    public function getServiceNameById($service_id)
    {
        $query = $this->db->get_where('services', ['id' => $service_id]);
        $row = $query->row_array();
        return $row['name'] ?? '';
    }


    // Fetch approved services for the logged-in astrologer
    public function getApprovedServices($astrologer_id)
    {
        return $this->db->get_where('astrologer_services', [
            'astrologer_id' => $astrologer_id,
            'status' => 'approved'
        ])->result_array();
    }

    // Fetch pending services for the logged-in astrologer
    public function getPendingServices($astrologer_id)
    {
        return $this->db->get_where('astrologer_services', [
            'astrologer_id' => $astrologer_id,
            'status' => 'pending'
        ])->result_array();
    }

    // Insert new service as pending
    public function insertPendingService($data)
    {
        $data['status'] = 'pending';  // Ensure status is set to pending
        return $this->db->insert('astrologer_services', $data);
    }


    //to get services of the logged in user
    public function getAstrologerServices($astrologer_id)
    {
        return $this->db->get_where('astrologer_services', [
            'astrologer_id' => $astrologer_id,
            'status' => 'approved'
        ])->result_array();
    }


    public function getServicesData($service_ids)
    {
        if (empty($service_ids)) {
            return [];
        }

        $this->db->where_in('id', $service_ids);
        return $this->db->get('services')->result_array();
    }

    //get the feedbacks related to logged in astologer
    public function getAstrologerFeedback($astrologer_id)
    {
        return $this->db->select('
                astrologer_feedback.created_at,
                astrologer_feedback.rating,
                astrologer_feedback.feedback,
                astrologer_feedback.id,
                astro_users.user_name,
                astro_users.user_image
            ')
            ->from('astrologer_feedback')
            ->join('astro_users', 'astro_users.user_id = astrologer_feedback.user_id')
            ->where('astrologer_feedback.astrologer_id', $astrologer_id)
            ->get()
            ->result();
    }

    // get the feedback
    public function getFeedbackById($feedback_id)
    {
        return $this->db->get_where('astrologer_feedback', ['id' => $feedback_id])->row();
    }
    //delete the feedback
    public function deleteFeedback($feedback_id)
    {
        $this->db->where('id', $feedback_id);
        $this->db->delete('astrologer_feedback');
    }


    public function setAstrologerStatus($id, $status)
    {
        $statusValue = ($status == 'online') ? 1 : 0;
        return $this->db->where('id', $id)
            ->update('astrologer_registration', ['is_online' => $statusValue]);
    }


    public function getAstrologerStatus($id)
    {
        return $this->db->select('is_online')
            ->where('id', $id)
            ->get('astrologer_registration')
            ->row();
    }


    //upadate the profile of the user
    public function save_data($id, $data)
    {
        $updateData = [
            'name'             => $data['name'],
            'email'            => $data['email'],
            'address'          => $data['address'],
            'languages'  => $data['languages'],
            'gender'           => $data['gender'],
            'experience'       => $data['experience']
        ];

        return $this->db->where('id', $id)
            ->update('astrologer_registration', $updateData);
    }


    //update the services time 
    public function update_availability($astrologer_id, $service_id, $data)
    {
        $this->db->where('astrologer_id', $astrologer_id);
        $this->db->where('service_id', $service_id);

        return $this->db->update('astrologer_services', $data);
    }

    //upadate the image of the astologer 
    public function update_profile_image($id, $imagePath)
    {
        return $this->db->where('id', $id)
            ->update('astrologer_registration', ['profile_image' => $imagePath]);
    }



    // get earnings by year 
    public function get_earnings_grouped_by_year_status($astrologer_id)
    {
        $query = $this->db->query("
            SELECT 
                YEAR(created_at) AS year,
                status,
                SUM(income) AS total_income
            FROM astrologer_income
            WHERE astrologer_id = ?
            GROUP BY YEAR(created_at), status
        ", [$astrologer_id]);

        return $query->result();
    }

    // get earnings by month
    public function get_monthly_income_grouped_by_status($astrologer_id)
    {
        $year = date('Y');
        $query = $this->db->query("
            SELECT 
                MONTH(created_at) AS month,
                status,
                SUM(income) AS total_income
            FROM astrologer_income
            WHERE astrologer_id = ? AND YEAR(created_at) = ?
            GROUP BY MONTH(created_at), status
        ", [$astrologer_id, $year]);

        return $query->result();
    }

    // total income statewise

    public function get_total_income_statuswise($astrologer_id)
    {
        $query = $this->db->query("
            SELECT status, SUM(income) AS total_income
            FROM astrologer_income
            WHERE astrologer_id = ?
            GROUP BY status
        ", [$astrologer_id]);

        return $query->result();
    }


    // get the all data by user name
    public function get_all_bookings($astrologer_id)
    {
        $this->db->select('username, income, status, created_at,duration');
        $this->db->from('astrologer_income');
        $this->db->where('astrologer_id', $astrologer_id);

        return $this->db->get()->result();
    }

    //get bookings by month
    public function get_monthly_bookings($astrologer_id)
    {
        $current_month = date('m');
        $current_year = date('Y');

        $this->db->select('username, income as fees, status, created_at as booking_date,duration');
        $this->db->from('astrologer_income');
        $this->db->where('astrologer_id', $astrologer_id);
        $this->db->where('MONTH(created_at)', $current_month);
        $this->db->where('YEAR(created_at)', $current_year);

        return $this->db->get()->result();
    }
}
