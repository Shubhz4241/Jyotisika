<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Api_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Example method to get data
    public function get_all_users() {
      $query= $this->db->get('users');
        return $query->result_array();
    }

    // Example method to insert data
    public function insertData($data) {
        return $this->db->insert('users', $data);
    }

    // Example method to update data
    public function updateData($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Example method to delete data
    public function delete_user_by_id($user_id)
{
    $this->db->where('user_id', $user_id);
    return $this->db->delete('users');
}




//   [------------------Delte Data of User ------------------------------]
public function delete_user($user_id)
{
    $this->db->where('user_id', $user_id);
    $this->db->delete('users');
    return $this->db->affected_rows() > 0;
}

//   [------------------Fetch Data of Astro ------------------------------]
public function get_all_Astro() {
    // $this->db->where('status', 'Approved'); 
    $query= $this->db->get('astrologer_registration');
      return $query->result_array();
  }
 
  public function get_all_Astro_Apreove() {
    $this->db->where('status', 'Approved'); 
    $query= $this->db->get('astrologer_registration');
      return $query->result_array();
  }

//   [------------------Fetch Data of Pujari ------------------------------]
// public function get_all_Pujari() {
    
//     $query= $this->db->get('pujari_registration');
//       return $query->result_array();
//   }

// public function get_all_Pujari() {
//     return $this->db
//             ->select('pr.*, psv.*')                 
//             ->from('pujari_registration AS pr') 
//             ->join(
//                 'pujari_services AS psv',
//                 'psv.pujari_id = pr.id',        
//                 'left'                             
//             )
//             ->order_by('pr.id', 'ASC')              
//             ->get()
//             ->result_array(); 
// }

public function get_all_Pujari() {
    $query = "
        SELECT pr.*, 
               GROUP_CONCAT(DISTINCT psv.specialties SEPARATOR ', ') AS specialties
        FROM pujari_registration AS pr
        LEFT JOIN pujari_services AS psv ON psv.pujari_id = pr.id
        GROUP BY pr.id
        ORDER BY pr.id ASC
    ";
    
    return $this->db->query($query)->result_array();
}


  public function get_all_Pujari_Approve() {
    $this->db->where('status', 'Approved'); 
    $query= $this->db->get('pujari_registration');
      return $query->result_array();
  }

//   [------------------Fetch Data of Astro By ID------------------------------]
public function get_astro_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('astrologer_registration');
    return $query->row_array();
}
//   [------------------Fetch Data of Pujari By ID------------------------------]
// public function get_all_Pujari_by_id($id) {
//     $this->db->where('id', $id);
//     $query = $this->db->get('pujari_registration');
//     return $query->row();
// }

public function get_all_Pujari_by_id($id) {
    $query = "
        SELECT pr.*, 
               GROUP_CONCAT(DISTINCT psv.specialties SEPARATOR ', ') AS specialties
        FROM pujari_registration AS pr
        LEFT JOIN pujari_services AS psv ON psv.pujari_id = pr.id
        WHERE pr.id = ?
        GROUP BY pr.id
        ORDER BY pr.id ASC
    ";
    
    return $this->db->query($query, [$id])->row();
}


 //   [------------------ Update astrologer data by ID ------------------------------]
 public function updateAstrologer($id, $updateData) {
    $this->db->where('id', $id);
    return $this->db->update('astrologer_registration', $updateData); 
}

 public function updateAstrologerServeic($id, $updateData) {
    $this->db->where('astro_id', $id);
    return $this->db->update('astro_services', $updateData); 
}

 //   [------------------ Update Pujari data by ID ------------------------------]
 public function updatePujari($id, $updateData) {
    $this->db->where('id', $id);
    return $this->db->update('pujari_registration', $updateData); 
}

 public function updatePujariServicesStatus($id, $updateData) {
    $this->db->where('pujari_id', $id);
    return $this->db->update('pujari_services', $updateData); 
}

 //   [------------------ Check Pujari data by ID ------------------------------]
public function checkPujariExists($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('pujari_registration');
    return $query->num_rows() > 0;
}

//     [--------------- Festival --------------------]

public function getAllFestival()  {
    $query = $this->db->get('festivals');

    return $query->result_array();
}
public function delete_festival($id)
{
    return $this->db
                ->where('festivals_id', $id)
                ->delete('festivals');
}


public function deleteUserById($id) {
    $this->db->where('id', $id);
    return $this->db->delete('users'); 
}


public function addFestival($data) {
    return $this->db->insert('festivals', $data);
}

 public function insertFestival($data)
    {
        return $this->db->insert('festivals', $data);
    }

    public function updateFestival($id, $data)
{
    $this->db->where('festivals_id', $id);
    return $this->db->update('festivals', $data);
}

public function getFestivalById($id)
{
    $this->db->where('festivals_id', $id);
    return $this->db->get('festivals')->row();
}

  public function get_by_id($id)
    {
        return $this->db
                    ->where('festivals_id', $id)
                    ->get('festivals')
                    ->row();
    }

    /**
     * Update a festival record.
     *
     * @param int   $id
     * @param array $data Associative array of columns to update.
     * @return bool TRUE on success, FALSE on failure.
     */
    public function update_festival($id, array $data)
    {
        return $this->db
                    ->where('festivals_id', $id)
                    ->update('festivals', $data);
    }


public function getAllPojas()  {
    $query = $this->db->get('puja');

    return $query->result_array();
}

// public function getAllOrders()
// {
//     return $this->db
//         ->select('oi.*, jmo.*, p.product_name, p.product_price, p.product_image') // Add product fields as needed
//         ->from('jyotisika_mall_orders AS jmo')
//         ->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner')
//         ->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left') // Left join in case product deleted
//         ->order_by('jmo.order_id', 'ASC')
//         ->get()

//         ->result_array();
// }

// public function updateOrderStatus($orderId, $status)
// {
//     return $this->db
//         ->where('order_id', $orderId)
//         ->update('jyotisika_mall_orders', [          
//             'status'     => strtolower($status),
//             'updated_at' => date('Y-m-d H:i:s')
//         ]);
// } 

// public function getOrderDetailsById($orderId)
// {
//     return $this->db
//         ->select('jmo.order_no, jmo.status, jmo.user_fullname, jmo.user_email, p.product_name')
//         ->from('jyotisika_mall_orders AS jmo')
//         ->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner')
//         ->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left')
//         ->where('jmo.order_id', $orderId)
//         ->get()
//         ->row_array();  // Only first product; use ->result_array() if you want multiple
// }



//  public function getOrderDetails($orderId) {
//         $this->db->select('jmo.order_id, jmo.order_no, jmo.user_fullname, jmo.user_phonenumber, jmo.user_city, jmo.user_state, jmo.user_pincode, jmo.price, jmo.payment_type, jmo.order_date, jmo.status, GROUP_CONCAT(p.product_name SEPARATOR ", ") as product_name, u.user_email	 as user_email');
//         $this->db->from('jyotisika_mall_orders AS jmo');
//         $this->db->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner');
//         $this->db->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left');
//         $this->db->join('jyotisika_users AS u', 'jmo.user_id = u.user_id', 'left');
//         $this->db->where('jmo.order_id', $orderId);
//         $this->db->group_by('jmo.order_id');
//         $query = $this->db->get();
//         return $query->row_array();
//     }
 

//     public function getAllOrders() {
//         return $this->db
//             ->select('oi.*, jmo.*, p.product_name, p.product_price, p.product_image')
//             ->from('jyotisika_mall_orders AS jmo')
//             ->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner')
//             ->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left')
//             ->order_by('jmo.order_date', 'DESC')
//             ->get()
//             ->result_array();
//     }
 public function getAllOrders() {
        return $this->db
            ->select('oi.*, jmo.*, p.product_name, p.product_price, p.product_image')
            ->from('jyotisika_mall_orders AS jmo')
            ->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner')
            ->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left')
            ->order_by('jmo.order_date', 'DESC')
            ->get()
            ->result_array();
    }

    public function getOrderDetails($orderId) {
        $this->db->select('jmo.order_id, jmo.order_no, jmo.user_fullname, jmo.user_phonenumber, jmo.user_city, jmo.user_state, jmo.user_pincode, jmo.price, jmo.payment_type, jmo.order_date, jmo.status, jmo.user_email, GROUP_CONCAT(p.product_name SEPARATOR ", ") as product_name');
        $this->db->from('jyotisika_mall_orders AS jmo');
        $this->db->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner');
        $this->db->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left');
        $this->db->where('jmo.order_id', $orderId);
        $this->db->group_by('jmo.order_id');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function updateOrderStatus($orderId, $status) {
        $this->db->where('order_id', $orderId);
        $result = $this->db->update('jyotisika_mall_orders', [
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        // Check if update was successful
        return $this->db->affected_rows() > 0;
    }

    public function getOrderDetailsById($orderId) {
        $query = $this->db
            ->select('jmo.order_no, jmo.status, jmo.user_fullname, jmo.user_email, jmo.user_phonenumber, p.product_name, p.product_price')
            ->from('jyotisika_mall_orders AS jmo')
            ->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner')
            ->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left')
            ->where('jmo.order_id', $orderId)
            ->limit(1)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;
    }

    // Alternative method to get order with multiple products
    public function getOrderWithAllProducts($orderId) {
        return $this->db
            ->select('jmo.order_no, jmo.status, jmo.user_fullname, jmo.user_email, p.product_name')
            ->from('jyotisika_mall_orders AS jmo')
            ->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner')
            ->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left')
            ->where('jmo.order_id', $orderId)
            ->get()
            ->result_array();
    }




public function insertProduct($data)
{
    return $this->db->insert('jotishika_mall', $data);  
}


 public function getAllProducts()
    {
        return $this->db->order_by('product_id', 'DESC')->get('jotishika_mall')->result_array();
    }


    

    // public function updateProduct($id, $data)
    // {
    //     return $this->db->where('product_id', $id)->update('jotishika_mall', $data);
    // }


public function getProductById($id) {
    return $this->db->where('product_id', $id)->get('jotishika_mall')->row_array();
}

public function updateProduct($id, $data) {
    $this->db->where('product_id', $id);
    return $this->db->update('jotishika_mall', $data);
}
    public function deleteProduct($id) {
        $this->db->where('product_id', $id);
        $this->db->delete('jotishika_mall');
        $query = $this->db->last_query();
        
       
        return true;
    }

public function insertPooja($data) {
        // Insert the data into the 'puja' table
        $this->db->insert('puja', $data);
        
        // Return true if the insertion was successful, false otherwise
        return $this->db->affected_rows() > 0;
    }

    //  public function insertPooja($data) {
    //     $this->db->insert('puja', $data);
    //     return $this->db->affected_rows() > 0;
    // }

     public function updatePooja($id, $data) {
        $this->db->where('puja_id', $id);
        $this->db->update('puja', $data);
        $query = $this->db->last_query();
        if ($this->db->error()['code'] != 0) {
            log_message('error', 'Update Pooja Query Failed: ' . $query . ' | Error: ' . $this->db->error()['message']);
            return false;
        }
        log_message('debug', 'Update Pooja Query: ' . $query);
        return true; // Return true if query executed, even if no rows changed
    }


        public function deletePooja($id) {
        $this->db->where('puja_id', $id);
        $this->db->delete('puja');
        $query = $this->db->last_query();
        if ($this->db->error()['code'] != 0) {
            log_message('error', 'Delete Pooja Query Failed: ' . $query . ' | Error: ' . $this->db->error()['message']);
            return false;
        }
        log_message('debug', 'Delete Pooja Query: ' . $query);
        return $this->db->affected_rows() > 0;
    }

      public function get_all_admins()
    {
        $this->db->where('role !=', 'superadmin'); // Exclude superadmin
        $query = $this->db->get('admins');
        return $query->result_array();
    }

     public function add_admin($name, $email, $password, $mobile_number, $role)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'mobile_number' => $mobile_number,
            'role' => $role
        ];

        return $this->db->insert('admins', $data);
    }

    public function get_admin_by_id($admin_id)
    {
        $this->db->where('id', $admin_id);
        $query = $this->db->get('admins');
        return $query->row_array();
    }

      public function edit_admin($password, $admin_id, $name, $email, $mobile_number, $role)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'role' => $role
        ];

        // If the password is updated, add it to the data array.
        if (!empty($password)) {
            $data['password'] = $password;
        }

        $this->db->where('id', $admin_id);
        return $this->db->update('admins', $data);
    }
      public function delete_admin($admin_id)
    {
        $this->db->where('id', $admin_id);
        return $this->db->delete('admins');
    }



    // public function getAllServices()
    // {
    //     return $this->db
    //         ->select('ar.*, asv.*') 
                            
    //         ->from('astrologer_registration AS ar') 
    //         ->join(
    //             'astro_services AS asv',
    //             'asv.astro_id = ar.id',        
    //             'inner'                             
    //         )
    //         ->order_by('ar.id', 'ASC')              
    //         ->get()
    //         ->result_array();                      
    // }
    public function getAllServices()
{
    return $this->db
        ->select('ar.name, ar.contact, asv.*')  // Sirf name aur contact liya ar se
        ->from('astrologer_registration AS ar')
        ->join(
            'astro_services AS asv',
            'asv.astro_id = ar.id',
            'inner'
        )
        ->order_by('ar.id', 'ASC')
        ->get()
        ->result_array();
}


public function getAllPujariServices()
{
    return $this->db
        ->select('pr.*, ps.*')                      
        ->from('pujari_registration AS pr')        
        ->join(
            'pujari_services AS ps',
            'ps.pujari_id = pr.id',                 
            'inner'                                 
        )
        ->order_by('pr.id', 'ASC')                  
        ->get()
        ->result_array();                          
}

 public function updateAstrologerService($astro_id, $services)
    {
        // Delete existing services for the astrologer
        $this->db->where('id', $astro_id);

        return $this->db->update('astro_services', $services);
    }

     public function updatePujariService($astro_id, $services)
    {
        // Delete existing services for the astrologer
        $this->db->where('id', $astro_id);

        return $this->db->update('pujari_services', $services);
    }

    // 🔮 Astrologer – सिर्फ Rescheduled
public function getRescheduledServices()
{
    return $this->db
        ->select('ar.*, asv.*')
        ->from('astrologer_registration AS ar')
        ->join('astro_services AS asv', 'asv.astro_id = ar.id', 'inner')
        ->where('asv.status', 'Rescheduled')     // <‑‑ FILTER
        ->order_by('ar.id', 'ASC')
        ->get()
        ->result_array();
}

// ⛪ Pujari – सिर्फ Rescheduled
public function getRescheduledPujariServices()
{
    return $this->db
        ->select('pr.*, ps.*')
        ->from('pujari_registration AS pr')
        ->join('pujari_services AS ps', 'ps.pujari_id = pr.id', 'inner')
        ->where('ps.status', 'Rescheduled')      // <‑‑ FILTER
        ->order_by('pr.id', 'ASC')
        ->get()
        ->result_array();
}

 public function updateAstroServiceStatus($id, $statusData)
    {
        // $statusData = ['status'=>'Approved', 'updated_at'=>..., ...]
        return $this->db->update('astro_services', $statusData, ['id' => $id]);
    }

    /* =================   PUJARI SERVICES  ================= */

    public function updatePujariServiceStatus($id, $statusData)
    {
        return $this->db->update('pujari_services', $statusData, ['id' => $id]);
    }

// public function updatePujari($id, $data) {
//         $this->db->where('id', $id);
//         return $this->db->update('pujari_registration', $data);
//     }

public function getAllOrder($mall_id)
{
    return $this->db
        ->select('oi.*, jmo.*, p.product_name, p.product_price, p.product_image') // Add product fields as needed
        ->from('jyotisika_mall_orders AS jmo')
        ->join('order_items AS oi', 'jmo.order_id = oi.order_id', 'inner')
        ->join('jotishika_mall AS p', 'oi.product_id = p.product_id', 'left') // Left join in case product deleted
        ->where('jmo.order_id', $mall_id)
        ->order_by('jmo.order_id', 'ASC')
        ->get()
        ->result_array();
}



public function getUserCount()
{
    return $this->db->count_all('users');
}

public function getAstrologerCount()
{
    $this->db->where('status', 'Approved'); // Count only approved astrologers
    return $this->db->count_all('astrologer_registration');
}

public function getPujariCount()
{
    $this->db->where('status', 'Approved'); 
    return $this->db->count_all('pujari_registration');
}

public function getReinterviewCount()
{
    
    $pujariCount = $this->db
        ->where('status', 'pending')
        ->from('pujari_services')
        ->count_all_results();

 
    $this->db->reset_query();

    // Count from astro_services
    $astroCount = $this->db
        ->where('status', 'pending')
        ->from('astro_services')
        ->count_all_results();

    return $pujariCount + $astroCount;
}
}

