<?php

class Admin_API extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('Admin_Api_Model');
        $this->load->model('Admin_Login_Model');
        $this->load->library('email');
        $this->config->load('order_email', TRUE);
    }

    public function getallpoojaris() {}

    public function getallastrologers() {}

    // [------------------Fetch Users Details Data ----------------------]
    public function getallusers()
    {
        $users = $this->Admin_Api_Model->get_all_users();
        if (!empty($users)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Users fetched successfully',
                    'users' => $users
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No users found'
                ]));
        }
    }

    // [------------------Delete Users Details Data ----------------------]
    public function delete_user()
    {
        $user_id = $this->input->post('user_id');
        if (!$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'User ID is required']);
            return;
        }

        $this->load->model('Admin_Api_Model');
        $deleted = $this->Admin_Api_Model->delete_user($user_id);

        if ($deleted) {
            echo json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No data found']);
        }
    }


    // [--------------Fetch Astrologer Data-----------------------]
    public function getallAstro()
    {
        $Astro = $this->Admin_Api_Model->get_all_Astro();

        if (!empty($Astro)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Astro fetched successfully',
                    'Astro' => $Astro
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Astro found'
                ]));
        }
    }

    public function getallAstro_Aprove()
    {
        $Astro = $this->Admin_Api_Model->get_all_Astro_Apreove();

        if (!empty($Astro)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Astro fetched successfully',
                    'Astro' => $Astro
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Astro found'
                ]));
        }
    }

    // [--------------Fetch Astrologer Data By ID -----------------------]
    public function getAstroById($id)
    {
        $Astro = $this->Admin_Api_Model->get_astro_by_id($id);

        if (!empty($Astro)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Astro fetched successfully',
                    'Astro' => $Astro
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Astro not found'
                ]));
        }
    }



    // [--------------Fetch Pujari Data-----------------------]
    public function getallPujari()
    {
        $Astro = $this->Admin_Api_Model->get_all_Pujari();

        if (!empty($Astro)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Pujari fetched successfully',
                    'Pujari' => $Astro
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Pujari found'
                ]));
        }
    }


    public function getallPujari_Aprove()
    {
        $Astro = $this->Admin_Api_Model->get_all_Pujari_Approve();

        if (!empty($Astro)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Pujari fetched successfully',
                    'Pujari' => $Astro
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Pujari found'
                ]));
        }
    }
    // [--------------Fetch Pujari Data By ID -----------------------]
    public function getallPujariById($id)
    {

        $Astro = $this->Admin_Api_Model->get_all_Pujari_by_id($id);

        // echo "Astrii";die;
        if (!empty($Astro)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Pujari fetched successfully',
                    'Pujari' => $Astro
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Pujari found'
                ]));
        }
    }



    //   //[---------------- API endpoint to update astrologer's data ---------------------]
    //   public function updateAstrologerData() {
    //     $data = $this->input->post();
    //     if (isset($data['id'], $data['mode'], $data['date'], $data['time'], $data['venue'])) {
    //         $updateData = array(
    //             'mode' => $data['mode'],
    //             'date' => $data['date'],
    //             'time' => $data['time'],
    //             'venue' => $data['venue']
    //         );
    //         $result = $this->Admin_Api_Model->updateAstrologer($data['id'], $updateData);
    //         if ($result) {
    //             $response = array('status' => 'success', 'message' => 'Astrologer data updated successfully.');
    //         } else {
    //             $response = array('status' => 'error', 'message' => 'Failed to update astrologer data.');
    //         }
    //     } else {
    //         $response = array('status' => 'error', 'message' => 'Missing required fields.');
    //     }
    //     echo json_encode($response);
    // }


    // [---------------- API endpoint to update astrologer's data ---------------------]
    public function updateAstrologerData()
    {
        $data = $this->input->post();
        log_message('debug', 'API Input: ' . print_r($data, true)); // Add logging

        if (isset($data['id'])) {
            $updateData = [];

            if (!empty($data['mode'])) {
                $updateData['mode'] = $data['mode'];
            }

            if (!empty($data['date'])) {
                $updateData['date'] = $data['date'];
            }

            if (!empty($data['time'])) {
                $updateData['time'] = date('h:i A', strtotime($data['time']));
            }

            if (!empty($data['meeting_link'])) {
                $updateData['meeting_link'] = $data['meeting_link'];
            }

            if (!empty($data['status'])) {
                $updateData['status'] = $data['status'];
            }
            if (!empty($data['price_per_minute'])) {
                $updateData['price_per_minute'] = $data['price_per_minute'];
            }

            if (!empty($updateData)) {
                $result = $this->Admin_Api_Model->updateAstrologer($data['id'], $updateData);
                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Astrologer data updated successfully.');
                } else {
                    $response = array('status' => 'error', 'message' => 'Failed to update astrologer data.');
                }
            } else {
                $response = array('status' => 'error', 'message' => 'No valid data provided to update.');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Missing astrologer ID.');
        }

        echo json_encode($response);
    }

    public function changeAstrologerStatus()
{
    header('Content-Type: application/json');
    
    $data = $this->input->post();
    log_message('debug', 'Change Status Input: ' . print_r($data, true));

    $id = $data['id'];
    $status = $data['status'];

    // Directly call model to update status
    $result = $this->Admin_Api_Model->updateAstrologer($id, ['status' => $status]);

    $this->Admin_Api_Model->updateAstrologerServeic($id, ['status' => $status]);

    if ($result) {
        $response = ['status' => 'success', 'message' => 'Status updated successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to update status.'];
    }

    echo json_encode($response);
}


    // [---------------- API endpoint to update Pujari's data ---------------------]
    public function updatePujariData()
    {
        $data = $this->input->post();
        if (isset($data['id'], $data['mode'], $data['date'], $data['time'], $data['meeting-link'])) {
            if (!$this->Admin_Api_Model->checkPujariExists($data['id'])) {
                $response = array('status' => 'error', 'message' => 'Invalid ID. Record not found.');
            } else {
                $time_12hr = date('h:i A', strtotime($data['time']));

                $updateData = array(
                    'mode' => $data['mode'],
                    'date' => $data['date'],
                    'time' => $time_12hr,
                    'meeting-link' => $data['meeting-link']
                );
                $result = $this->Admin_Api_Model->updatePujari($data['id'], $updateData);

                if ($result) {
                    $response = array('status' => 'success', 'message' => 'Pujari interview scheduled successfully.');
                } else {
                    $response = array('status' => 'error', 'message' => 'Failed to update Pujari data.');
                }
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Missing required fields.');
        }
        echo json_encode($response);
    }
    // -------- Ritesh
    public function getFestival()
    {

        $festival = $this->Admin_Api_Model->getAllFestival();

        if (!empty($festival)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Festival fetched successfully',
                    'Festival' => $festival
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Festival found'
                ]));
        }
    }
    public function deleteFestivalAPI()
    {
        // Load model if not already loaded
        $this->load->model('Admin_Api_Model');

        // Setup default response
        $response = [
            'status'   => false,
            'message'  => 'Failed to delete festival.',
            'csrfHash' => $this->security->get_csrf_hash()
        ];

        // Ensure it's a POST request
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            return $this->_json($response, 'Invalid request method.');
        }

        // Get festival ID from POST
        $festival_id = $this->input->post('festivals_id');
        if (empty($festival_id)) {
            return $this->_json($response, 'Festival ID is required.');
        }

        // Fetch the festival
        $festival = $this->Admin_Api_Model->get_by_id($festival_id);
        if (!$festival) {
            return $this->_json($response, 'Festival not found.');
        }

        // Delete the image if it exists
        if (!empty($festival->festivals_image) && file_exists(FCPATH . $festival->festivals_image)) {
            unlink(FCPATH . $festival->festivals_image);
        }

        // Delete from DB
        if ($this->Admin_Api_Model->delete_festival($festival_id)) {
            return $this->_json($response, 'Festival deleted successfully.', true);
        }

        return $this->_json($response, 'Failed to delete festival from database.');
    }


    public function deleteUser()
    {
        $userId = $this->input->post('id', true); // With XSS filter

        if (empty($userId) || !is_numeric($userId)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Valid User ID is required'
                ]));
            return;
        }

        $deleted = $this->Admin_Api_Model->deleteUserById($userId);

        if ($deleted) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'User deleted successfully'
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Failed to delete user'
                ]));
        }
    }

    // [------------------Add Festival API ----------------------]
    // public function addFestivalAPI()
    // {
    //     header('Content-Type: application/json');

    //     // Adjusted to match frontend field names:
    //     $title = $this->input->post('festivals_title');
    //     $description = $this->input->post('festivals_description');

    //     // Validate required fields
    //     if (empty($title) || empty($description)) {
    //         echo json_encode([
    //             'status' => false,
    //             'message' => 'Title and Description are required.'
    //         ]);
    //         return;
    //     }

    //     if (!empty($_FILES['festivals_image']['name'])) {
    //         // Configuration for profile picture upload
    //         $config['upload_path'] = 'uploads/festivals';
    //         $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Allowed image types
    //         $config['max_size'] = 2048; // Max size for profile pic (2 MB in KB)
    //         $this->upload->initialize($config);

    //         // Handle profile picture upload
    //         if (isset($_FILES["festivals_image"])) {
    //             if (!$this->upload->do_upload('festivals_image')) {
    //                 $data['festivals_image_error'] = $this->upload->display_errors();
    //             } else {
    //                 $data['festivals_image_upload_data'] = $this->upload->data();
    //                 $image_path = $data['festivals_image_upload_data']['file_name'];
    //             }
    //         }

    //         $data = [
    //             'festivals_title' => $title,
    //             'festivals_decription' => $description,
    //             'festivals_image' => $image_path,
    //             'festivals_date' => date('Y-m-d H:i:s')
    //         ];
    //         // print_r($data);die;
    //         // Insert data into DB via model
    //         $inserted = $this->Admin_Api_Model->insertFestival($data);

    //         if ($inserted) {
    //             echo json_encode([
    //                 'status' => true,
    //                 'message' => 'Festival added successfully!',
    //                 'data' => $data
    //             ]);
    //         } else {
    //             echo json_encode([
    //                 'status' => false,
    //                 'message' => 'Failed to insert into database.'
    //             ]);
    //         }
    //     } else {
    //         echo json_encode([
    //             'status' => false,
    //             'message' => 'Please upload an image.'
    //         ]);
    //     }
    // }

    public function addFestivalAPI()
    {
        header('Content-Type: application/json');

        // 1. basic validation ----------------------------------------------------
        $title       = $this->input->post('festivals_title');
        $description = $this->input->post('festivals_description');

        if (empty($title) || empty($description)) {
            echo json_encode([
                'status'  => false,
                'message' => 'Title and Description are required.'
            ]);
            return;
        }

        // 2. there must be an image ---------------------------------------------
        if (empty($_FILES['festivals_image']['name'])) {
            echo json_encode([
                'status'  => false,
                'message' => 'Please upload an image.'
            ]);
            return;
        }

        // 3. configure upload ----------------------------------------------------
        $uploadDir              = FCPATH . 'uploads/';
        $newFileName            = 'festival_' . time() . '_' . $_FILES['festivals_image']['name'];
        $config = [
            'upload_path'   => $uploadDir,
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size'      => 2048,
            'file_name'     => $newFileName
        ];
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $this->upload->initialize($config);

        // 4. attempt upload ------------------------------------------------------
        if (!$this->upload->do_upload('festivals_image')) {
            echo json_encode([
                'status'  => false,
                'message' => $this->upload->display_errors()
            ]);
            return;
        }

        // 5. build data & insert -------------------------------------------------
        $uploadData = $this->upload->data();   // contains final sanitized name
        $data = [
            'festivals_title'       => $title,
            'festivals_decription'  => $description,
            'festivals_image'       => 'uploads/' . $uploadData['file_name'], // <- full relative path
            'festivals_date'        => date('Y-m-d H:i:s')
        ];

        if ($this->Admin_Api_Model->insertFestival($data)) {
            echo json_encode([
                'status'  => true,
                'message' => 'Festival added successfully!',
                'data'    => $data
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Failed to insert into database.'
            ]);
        }
    }




    public function updateFestivalAPI()
    {
        // ---- 0.  Load the model  ----


        // ---- 1.  Basic request checks  ----
        $response = [
            'status'   => false,
            'message'  => 'Failed to update festival.',
            'csrfHash' => $this->security->get_csrf_hash()
        ];

        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            return $this->_json($response, 'Invalid request method.');
        }

        // ---- 2.  Gather & validate input  ----
        $festival_id = $this->input->post('festivals_id');
        $title       = $this->input->post('festivals_title');
        $description = $this->input->post('festivals_decription');

        if (!$festival_id || !$title || !$description) {
            return $this->_json($response, 'All fields are required.');
        }

        // ---- 3.  Ensure the record exists (via model) ----
        $festival = $this->Admin_Api_Model->get_by_id($festival_id);
        if (!$festival) {
            return $this->_json($response, 'Festival not found.');
        }

        // ---- 4.  Prepare update data ----
        $data = [
            'festivals_title'      => $title,
            'festivals_decription' => $description
        ];

        // ---- 5.  Optional image upload ----
        if (!empty($_FILES['festivals_image']['name'])) {
            $uploadPath = FCPATH . 'uploads/';
            $config = [
                'upload_path'   => $uploadPath,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 2048,
                'file_name'     => 'festival_' . time() . '_' . $_FILES['festivals_image']['name']
            ];
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('festivals_image')) {
                return $this->_json($response, $this->upload->display_errors());
            }

            $uploadData              = $this->upload->data();
            $data['festivals_image'] = 'uploads/' . $uploadData['file_name'];

            // delete old image
            if (!empty($festival->festivals_image) && file_exists(FCPATH . $festival->festivals_image)) {
                unlink(FCPATH . $festival->festivals_image);
            }
        }

        // ---- 6.  Update via model ----
        if ($this->Admin_Api_Model->update_festival($festival_id, $data)) {
            return $this->_json($response, 'Festival updated successfully.', true);
        }

        return $this->_json($response, 'Failed to update festival in database.');
    }

    /**
     * Helper to send JSON with consistent structure.
     */
    private function _json(array $base, string $msg, bool $success = false)
    {
        $base['status']  = $success;
        $base['message'] = $msg;

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($base));
    }


    public function getPoojas()
    {
        $pooja = $this->Admin_Api_Model->getAllPojas();

        if (!empty($pooja)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Poojas fetched successfully',
                    'poojas' => $pooja
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Poojas found'
                ]));
        }
    }


    public function getAllOrders() 
    {
        $orders = $this->Admin_Api_Model->getAllOrders();

        if (!empty($orders)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Orders fetched successfully',
                    'orders' => $orders
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Orders found'
                ]));
        }
    }




    // public function updateOrderStatus()
    // {
    //     // POST values
    //     $orderId = $this->input->post('order_id');
    //     $status  = $this->input->post('status');

    //     // Basic validation
    //     if (!$orderId || !$status) {
    //         return $this->output
    //             ->set_content_type('application/json')
    //             ->set_status_header(400)
    //             ->set_output(json_encode([
    //                 'status'  => false,
    //                 'message' => 'order_id and status required'
    //             ]));
    //     }

    //     // Call model
    //     $updated = $this->Admin_Api_Model->updateOrderStatus($orderId, $status);

    //     if ($updated) {
    //         $this->output
    //             ->set_content_type('application/json')
    //             ->set_status_header(200)
    //             ->set_output(json_encode([
    //                 'status'  => true,
    //                 'message' => 'Order status updated'
    //             ]));
    //     } else {
    //         $this->output
    //             ->set_content_type('application/json')
    //             ->set_status_header(500)
    //             ->set_output(json_encode([
    //                 'status'  => false,
    //                 'message' => 'Database update failed'
    //             ]));
    //     }
    // }

public function updateOrderStatus()
{
    try {
        // Get POST data
        $orderId = $this->input->post('order_id');
        $status  = $this->input->post('status');
        
        // Validate input
        if (empty($orderId) || empty($status)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status'  => false,
                    'message' => 'Order ID and status are required'
                ]));
            return;
        }
        
        // Log for debugging
        log_message('error', 'DEBUG: order_id=' . $orderId . ', status=' . $status);
        
        // Update order status in DB
        $updated = $this->Admin_Api_Model->updateOrderStatus($orderId, $status);
        
        if (!$updated) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'status'  => false,
                    'message' => 'Failed to update order status in database'
                ]));
            return;
        }
        
        // Fetch order details (includes email)
        $orderDetails = $this->Admin_Api_Model->getOrderDetails($orderId);
        
        if (!$orderDetails) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status'  => false,
                    'message' => 'Order details not found'
                ]));
            return;
        }
        
        $emailMessage = '';
        
        // Check if user email exists
        if (!empty($orderDetails['user_email'])) {
            // Load email library
            $this->load->library('email');
            
            // SOLUTION 1: Enhanced Email Configuration with SSL Context Options
            $emailConfig = array(
                'protocol'     => 'smtp',
                'smtp_host'    => 'smtp.gmail.com',
                'smtp_user'    => 'ganeshgodse1902@gmail.com',
                'smtp_pass'    => 'mbre meek ymyt eagl',
                'smtp_port'    => 587,
                'smtp_crypto'  => 'tls',
                'mailtype'     => 'html',
                'charset'      => 'utf-8',
                'wordwrap'     => TRUE,
                'newline'      => "\r\n",
                'crlf'         => "\r\n",
                'smtp_timeout' => 30,
                // SSL Context Options to bypass certificate verification
                'smtp_context' => array(
                    'ssl' => array(
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                        'allow_self_signed' => true
                    )
                )
            );
            
            // Initialize email with config
            $this->email->initialize($emailConfig);
            
            // Set email parameters
            $this->email->from('ganeshgodse1902@gmail.com', 'Jyotisika Mall');
            $this->email->to($orderDetails['user_email']);
            $this->email->subject('Order Status Update - Order #' . $orderDetails['order_no']);
            
            // Generate email content
            $emailContent = $this->generateEmailContent($orderDetails, $status);
            $this->email->message($emailContent);
            
            // Send email with additional error handling
            if ($this->email->send()) {
                $emailMessage = 'Status updated and email sent to ' . $orderDetails['user_email'];
                log_message('info', 'Email sent successfully to: ' . $orderDetails['user_email']);
            } else {
                $emailMessage = 'Status updated but email failed to send';
                $debugInfo = $this->email->print_debugger(['headers']);
                log_message('error', 'Email Error: ' . $debugInfo);
                
                // Try alternative configuration if first attempt fails
                $this->sendEmailAlternative($orderDetails, $status);
            }
            
            // Clear email data for next use
            $this->email->clear();
            
        } else {
            $emailMessage = 'Status updated but user email not found';
            log_message('error', 'Email Error: User email not found for order ID: ' . $orderId);
        }
        
        // Success response
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status'  => true,
                'message' => $emailMessage
            ]));
            
    } catch (Exception $e) {
        log_message('error', 'Exception in updateOrderStatus: ' . $e->getMessage());
        
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(500)
            ->set_output(json_encode([
                'status'  => false,
                'message' => 'Server error occurred: ' . $e->getMessage()
            ]));
    }
}

// Alternative email sending method with different configuration
private function sendEmailAlternative($orderDetails, $status)
{
    try {
        // SOLUTION 2: Try with port 465 and SSL
        $alternativeConfig = array(
            'protocol'     => 'smtp',
            'smtp_host'    => 'smtp.gmail.com',
            'smtp_user'    => 'ganeshgodse1902@gmail.com',
            'smtp_pass'    => 'mbre meek ymyt eagl',
            'smtp_port'    => 465,
            'smtp_crypto'  => 'ssl',
            'mailtype'     => 'html',
            'charset'      => 'utf-8',
            'wordwrap'     => TRUE,
            'newline'      => "\r\n",
            'crlf'         => "\r\n",
            'smtp_timeout' => 30,
            'smtp_context' => array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                    'cafile'           => APPPATH . 'config/cacert.pem' // If you have cacert.pem
                )
            )
        );
        
        $this->email->initialize($alternativeConfig);
        $this->email->from('ganeshgodse1902@gmail.com', 'Jyotisika Mall');
        $this->email->to($orderDetails['user_email']);
        $this->email->subject('Order Status Update - Order #' . $orderDetails['order_no']);
        $this->email->message($this->generateEmailContent($orderDetails, $status));
        
        if ($this->email->send()) {
            log_message('info', 'Alternative email method successful');
            return true;
        } else {
            log_message('error', 'Alternative email method also failed: ' . $this->email->print_debugger());
            return false;
        }
        
    } catch (Exception $e) {
        log_message('error', 'Alternative email method exception: ' . $e->getMessage());
        return false;
    }
}

// SOLUTION 3: PHPMailer alternative method
private function sendEmailWithPHPMailer($orderDetails, $status)
{
    // If you want to use PHPMailer instead of CodeIgniter's email library
    // First download PHPMailer and include it in your project
    
    /*
    require_once APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
    require_once APPPATH . 'third_party/PHPMailer/src/SMTP.php';
    require_once APPPATH . 'third_party/PHPMailer/src/Exception.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ganeshgodse1902@gmail.com';
        $mail->Password   = 'mbre meek ymyt eagl';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        // Disable SSL verification for local development
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        $mail->setFrom('ganeshgodse1902@gmail.com', 'Jyotisika Mall');
        $mail->addAddress($orderDetails['user_email']);
        
        $mail->isHTML(true);
        $mail->Subject = 'Order Status Update - Order #' . $orderDetails['order_no'];
        $mail->Body    = $this->generateEmailContent($orderDetails, $status);
        
        $mail->send();
        return true;
        
    } catch (Exception $e) {
        log_message('error', 'PHPMailer Error: ' . $mail->ErrorInfo);
        return false;
    }
    */
}

// Email content generation function
private function generateEmailContent($orderDetails, $status)
{
    $statusMessages = [
        'packed'    => 'Your order has been packed and is ready for shipment.',
        'shipped'   => 'Your order has been shipped and is on its way to you.',
        'delivered' => 'Your order has been delivered successfully.',
        'pending'   => 'Your order is currently pending and will be processed soon.',
        'Accepted'  => 'Your order has been accepted and will be processed.',
        'Rejected'  => 'Unfortunately, your order has been rejected.'
    ];
    
    $statusMessage = isset($statusMessages[$status]) ? $statusMessages[$status] : 'Your order status has been updated.';
    
    $emailContent = '
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #0C768A; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background-color: #f9f9f9; }
            .order-details { background-color: white; padding: 15px; margin: 10px 0; border-radius: 5px; }
            .footer { text-align: center; padding: 10px; color: #666; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Order Status Update</h1>
            </div>
            <div class="content">
                <p>Dear ' . htmlspecialchars($orderDetails['user_fullname']) . ',</p>
                <p>' . $statusMessage . '</p>
                
                <div class="order-details">
                    <h3>Order Details:</h3>
                    <p><strong>Order Number:</strong> ' . $orderDetails['order_no'] . '</p>
                    <p><strong>New Status:</strong> ' . ucfirst($status) . '</p>
                    <p><strong>Order Date:</strong> ' . date('d-m-Y', strtotime($orderDetails['order_date'])) . '</p>
                    <p><strong>Total Amount:</strong> ₹' . $orderDetails['price'] . '</p>
                </div>
                
                <p>Thank you for shopping with us!</p>
            </div>
            <div class="footer">
                <p>&copy; 2025 Jyotisika Mall. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>';
    
    return $emailContent;
}

public function sendBirthdayEmails()
{
    // 1. Load email library
    $this->load->library('email');

    // 2. Configure SMTP
    $config = array(
        'protocol'    => 'smtp',
        'smtp_host'   => 'smtp.gmail.com',
        'smtp_port'   => 587,
        'smtp_user'   => 'amplifierlover007@gmail.com',
        'smtp_pass'   => 'irjwyyggkfnidnue', // Consider using an app password for Gmail
        'mailtype'    => 'html',
        'charset'     => 'utf-8',
        'newline'     => "\r\n",
        'smtp_crypto' => 'tls'
    );
    $this->email->initialize($config);

    // 3. Static birthday message
    $message = '
        <h2>🎉 Happy Birthday Ritesh! 🎉</h2>
        <p>Wishing you a day filled with love, laughter, and joy. May this year bring you success and happiness!</p>
        <p>— From your HR Team 😊</p>
    ';

    // 4. Set recipient
    $this->email->from('amplifierlover007@gmail.com', 'HR Team');
    $this->email->to('riteshshingote23@gmail.com');
    $this->email->subject("🎂 Birthday Wishes to You, Ritesh!");
    $this->email->message($message);

    // 5. Send the email
    if ($this->email->send()) {
        echo "✅ Birthday email sent to Ritesh!";
    } else {
        echo "❌ Failed to send email.";
        log_message('error', 'Email error: ' . $this->email->print_debugger());
    }
}

     public function testGetOrderDetails()
{
    // Get POST data
    $orderId = $this->input->post('order_id');

    // Fetch order details using model
    $orderDetails = $this->Admin_Api_Model->getOrderDetails($orderId);

    // Return response
    if ($orderDetails) {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'status'  => true,
                'data'    => $orderDetails
            ]));
    } else {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode([
                'status'  => false,
                'message' => 'Order not found'
            ]));
    }
}

 
//    public function updateOrderStatus() {
    
//         try {
//             // POST values
//             $orderId = $this->input->post('order_id');
//             $status  = strtolower(trim($this->input->post('status')));

//                 //  print_r($status);die;

//             // Basic validation
//             if (empty($orderId) || empty($status)) {
//                 return $this->output
//                     ->set_content_type('application/json')
//                     ->set_status_header(400)
//                     ->set_output(json_encode([
//                         'status'  => false,
//                         'message' => 'order_id and status are required'
//                     ]));
//             }

//             // Valid status check
//             $validStatuses = ['pending', 'packed', 'shipped', 'delivered', 'accepted', 'rejected'];
//             if (!in_array($status, $validStatuses)) {
//                 return $this->output
//                     ->set_content_type('application/json')
//                     ->set_status_header(400)
//                     ->set_output(json_encode([
//                         'status'  => false,
//                         'message' => 'Invalid status provided'
//                     ]));
//             }

//             // Get order details BEFORE update (to get user email)
//             $orderDetails = $this->Admin_Api_Model->getOrderDetailsById($orderId);

       
            
//             if (!$orderDetails) {
//                 return $this->output
//                     ->set_content_type('application/json')
//                     ->set_status_header(404)
//                     ->set_output(json_encode([
//                         'status'  => false,
//                         'message' => 'Order not found'
//                     ]));
//             }

//             // Update the status in database
//             $updated = $this->Admin_Api_Model->updateOrderStatus($orderId, $status);

//             if ($updated) {
//                 // Send email notification with fallback
//                 $emailSent = $this->sendStatusUpdateEmail($orderDetails, $status);
                
//                 // 🔄 Fallback: If SMTP fails, try alternative method
//                 if (!$emailSent) {
//                     log_message('info', 'SMTP email failed, trying alternative method...');
//                     $emailSent = $this->sendStatusUpdateEmailAlternative($orderDetails, $status);
//                 }
                
//                 $emailMessage = $emailSent ? 
//                     'Order status updated and email sent successfully!' : 
//                     'Order status updated but email notification failed';
                
//                 return $this->output
//                     ->set_content_type('application/json')
//                     ->set_status_header(200)
//                     ->set_output(json_encode([
//                         'status'  => true,
//                         'message' => $emailMessage,
//                         'email_sent' => $emailSent
//                     ]));
//             } else {
//                 return $this->output
//                     ->set_content_type('application/json')
//                     ->set_status_header(500)
//                     ->set_output(json_encode([
//                         'status'  => false,
//                         'message' => 'Database update failed'
//                     ]));
//             }

//         } catch (Exception $e) {
//             // Log the error
//             log_message('error', 'Order status update error: ' . $e->getMessage());
            
//             return $this->output
//                 ->set_content_type('application/json')
//                 ->set_status_header(500)
//                 ->set_output(json_encode([
//                     'status'  => false,
//                     'message' => 'Internal server error occurred'
//                 ]));
//         }
//     }

    private function sendStatusUpdateEmail($orderDetails, $status) {
        try {
            // Check if email exists
            if (empty($orderDetails['user_email'])) {
                log_message('error', 'No email found for order: ' . $orderDetails['order_no']);
                return false;
            }

            $userEmail = $orderDetails['user_email'];
            $userName  = $orderDetails['user_fullname'] ?? 'Customer';
            $product   = $orderDetails['product_name'] ?? 'Your Product';
            $orderNo   = $orderDetails['order_no'];

            // Status display mapping
            $statusDisplay = [
                'pending'   => 'Pending',
                'packed'    => 'Packed',
                'shipped'   => 'Shipped',
                'delivered' => 'Delivered',
                'accepted'  => 'Accepted',
                'rejected'  => 'Rejected'
            ];

            $displayStatus = $statusDisplay[$status] ?? ucfirst($status);

            $subject = "Order #$orderNo Status Update - Jyotisika Mall";
            
            $message = "
            <!DOCTYPE html>
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background-color: #0C768A; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
                    .content { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
                    .status { background-color: #e8f5e8; padding: 15px; border-radius: 5px; margin: 15px 0; border-left: 4px solid #0C768A; }
                    .footer { background-color: #333; color: white; padding: 15px; text-align: center; border-radius: 0 0 8px 8px; }
                    .order-info { background-color: white; padding: 15px; border-radius: 5px; margin: 10px 0; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>🚚 Order Status Update</h2>
                    </div>
                    <div class='content'>
                        <p>Dear <strong>$userName</strong>,</p>
                        <p>Great news! We have an update on your recent order:</p>
                        
                        <div class='order-info'>
                            <p><strong>📦 Order Number:</strong> $orderNo</p>
                            <p><strong>🛍️ Product:</strong> $product</p>
                        </div>
                        
                        <div class='status'>
                            <p><strong>📋 Status Update:</strong></p>
                            <h3 style='color: #0C768A; margin: 5px 0;'>$displayStatus</h3>
                        </div>
                        
                        <p>Thank you for choosing <strong>Jyotisika Mall</strong>. We appreciate your trust in us!</p>
                        
                        <p>If you have any questions or concerns, please don't hesitate to contact our customer support team.</p>
                        
                        <hr style='margin: 20px 0; border: none; border-top: 1px solid #ddd;'>
                        <p style='font-size: 14px; color: #666;'>
                            <em>This is an automated message. Please do not reply to this email.</em>
                        </p>
                    </div>
                    <div class='footer'>
                        <p>Best Regards,<br><strong>🏪 Jyotisika Mall Team</strong></p>
                        <p style='font-size: 12px; margin-top: 10px;'>© 2025 Jyotisika Mall. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>";

            // Email configuration
            $orderEmailConfig = [
                'protocol'    => 'smtp',
                'smtp_host'   => 'smtp.gmail.com',
                'smtp_port'   => 587,
                'smtp_timeout' => 30,
                'smtp_user'   => 'riteshshingote23@gmail.com',
                'smtp_pass'   => 'your_gmail_app_password', // Replace with actual Gmail App Password
                'charset'     => 'utf-8',
                'mailtype'    => 'html',
                'smtp_crypto' => 'tls',
                'wordwrap'    => TRUE,
                'newline'     => "\r\n",
                'validate'    => TRUE
            ];

            // Clear any previous config and initialize new config
            $this->email->clear();
            $this->email->initialize($orderEmailConfig);
            
            // Email setup
            $this->email->from('riteshshingote23@gmail.com', 'Jyotisika Mall - Order Updates');
            $this->email->to($userEmail);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                log_message('info', "Order status email sent successfully to: $userEmail for order: $orderNo (Status: $displayStatus)");
                return true;
            } else {
                $debugger = $this->email->print_debugger();
                log_message('error', "Email send failed for order $orderNo: " . $debugger);
                return false;
            }

        } catch (Exception $e) {
            log_message('error', 'Email sending error for order status: ' . $e->getMessage());
            return false;
        }
    }

    private function sendStatusUpdateEmailAlternative($orderDetails, $status) {
        try {
            $userEmail = $orderDetails['user_email'];
            $userName  = $orderDetails['user_fullname'] ?? 'Customer';
            $orderNo   = $orderDetails['order_no'];
            $product   = $orderDetails['product_name'] ?? 'Your Product';

            $statusDisplay = ucfirst($status);
            $subject = "Order #$orderNo Status: $statusDisplay - Jyotisika Mall";
            
            $message = "
            Dear $userName,
            
            Your order has been updated:
            
            Order Number: $orderNo
            Product: $product
            New Status: $statusDisplay
            
            Thank you for choosing Jyotisika Mall!
            
            Best Regards,
            Jyotisika Mall Team
            ";

            $headers = [
                'From: Jyotisika Mall <riteshshingote23@gmail.com>',
                'Reply-To: riteshshingote23@gmail.com',
                'Content-Type: text/plain; charset=UTF-8'
            ];

            if (mail($userEmail, $subject, $message, implode("\r\n", $headers))) {
                log_message('info', "Alternative email sent to: $userEmail for order: $orderNo");
                return true;
            }
            
            return false;
            
        } catch (Exception $e) {
            log_message('error', 'Alternative email error: ' . $e->getMessage());
            return false;
        }
    }



    public function update_order_status()
    {
        $orderId = $this->input->post('order_id');
        $status = strtolower($this->input->post('status'));

        $allowedStatuses = ['accepted', 'rejected', 'packed', 'shipped', 'delivered', 'pending'];

        if (!$orderId || !in_array($status, $allowedStatuses)) {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            return;
        }

        $this->load->model('Admin_Api_Model');
        $updated = $this->Admin_Api_Model->updateOrderStatus($orderId, $status);

        echo json_encode(['success' => $updated]);
    }



    public function addProductAPI()
    {
        header('Content-Type: application/json');


        $name        = $this->input->post('product_name');
        $description = $this->input->post('product_description');
        $price       = $this->input->post('product_price');



        if (!is_numeric($price) || $price < 0) {
            echo json_encode([
                'status'  => false,
                'message' => 'Price must be a positive number.'
            ]);
            return;
        }

        // ---------- Image upload ----------
        if (!empty($_FILES['product_image']['name'])) {

            $config = [
                'upload_path'   => 'uploads/products',      // make sure folder exists & is writable
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 2048                     // 2 MB
            ];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('product_image')) {
                echo json_encode([
                    'status'  => false,
                    'message' => $this->upload->display_errors('', '')
                ]);
                return;
            }

            $uploadData  = $this->upload->data();
            $imagePath   = $uploadData['file_name'];       // relative path you’ll store in DB

            // ---------- Prepare & insert ----------
            $data = [
                'product_name'        => $name,
                'product_description' => $description,
                'product_price'       => $price,
                'product_image'       => $imagePath,
                'created_at'          => date('Y-m-d H:i:s')
            ];

            $inserted = $this->Admin_Api_Model->insertProduct($data);

            echo json_encode([
                'status'  => $inserted,
                'message' => $inserted ? 'Product added successfully!' : 'Failed to insert into database.',
                'data'    => $inserted ? $data : null
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Please upload an image.'
            ]);
        }
    }


    public function getProducts()
    {
        header('Content-Type: application/json');

        $products = $this->Admin_Api_Model->getAllProducts();

        echo json_encode([
            'status' => true,
            'data'   => $products
        ]);
    }



    public function updateProduct()
    {
        header('Content-Type: application/json');

        // Get POST data - Fixed parameter names
        $id    = $this->input->post('product_id');        // Fixed: was expecting 'product_id'
        $name  = $this->input->post('product_name');
        $desc  = $this->input->post('product_description');
        $price = $this->input->post('product_price');

        // Validation
        if (empty($id) || empty($name) || empty($desc) || $price === null || $price === '') {
            echo json_encode(['status' => false, 'message' => 'All fields are required.']);
            return;
        }

        if (!is_numeric($price) || $price < 0) {
            echo json_encode(['status' => false, 'message' => 'Price must be a positive number.']);
            return;
        }

        $data = [
            'product_name'        => trim($name),
            'product_description' => trim($desc),
            'product_price'       => floatval($price)
        ];

        // Handle optional image upload
        if (!empty($_FILES['product_image']['name'])) {
            $config = [
                'upload_path'   => './uploads/products/',    // Added ./ for proper path
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 2048,
                'encrypt_name'  => TRUE                      // Encrypt filename for security
            ];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('product_image')) {
                echo json_encode(['status' => false, 'message' => $this->upload->display_errors('', '')]);
                return;
            }

            $uploadData = $this->upload->data();
            $data['product_image'] = $uploadData['file_name'];

            // Optional: Delete old image
            $oldProduct = $this->Admin_Api_Model->getProductById($id);
            if ($oldProduct && $oldProduct['product_image']) {
                $oldImagePath = './uploads/products/' . $oldProduct['product_image'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        // Update in database
        $updated = $this->Admin_Api_Model->updateProduct($id, $data);

        echo json_encode([
            'status'  => $updated,
            'message' => $updated ? 'Product updated successfully.' : 'Database update failed.'
        ]);
    }
    // Alternative: You can also fix the deleteProductAPI method to accept both parameters
    public function deleteProductAPI()
    {
        header('Content-Type: application/json');

        // Accept both 'product_id' and 'id' parameters
        $id = $this->input->post('product_id') ?: $this->input->post('id');
        log_message('debug', 'deleteProductAPI POST Data: ' . print_r($_POST, true));

        if (empty($id)) {
            echo json_encode(['status' => false, 'message' => 'Product ID is required.']);
            return;
        }


        $deleted = $this->Admin_Api_Model->deleteProduct($id);

        if ($deleted) {
            echo json_encode(['status' => true, 'message' => 'Product deleted successfully.', 'csrfHash' => $this->security->get_csrf_hash()]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Failed to delete product.', 'csrfHash' => $this->security->get_csrf_hash()]);
        }
    }



    // public function addPoojaAPI()
    // {

    //     header('Content-Type: application/json');

    //     $name        = $this->input->post('pooja_name');
    //     $description = $this->input->post('pooja_description');
    //     $mode        = $this->input->post('pooja_mode');

    //     if (empty($name) || empty($description) || empty($mode)) {
    //         echo json_encode([
    //             'status'  => false,
    //             'message' => 'All fields are required.'
    //         ]);
    //         return;
    //     }

    //     if (!in_array($mode, ['Online', 'Offline', 'Mob'])) {
    //         echo json_encode([
    //             'status'  => false,
    //             'message' => 'Invalid pooja mode.'
    //         ]);
    //         return;
    //     }
    //     // print_r($_FILES);die; // Debugging line to check file upload data
    //     // Image upload
    //     // if (!empty($_FILES['pooja_image']['name'])) {
    //         $config = [
    //             'upload_path'   => './Uploads/pooja_images/', // Ensure this path exists and is writable
    //             'allowed_types' => 'jpg|jpeg|png|gif',
    //             'max_size'      => 2048 // 2MB
    //         ];
    //         // $this->load->library('upload');
    //         // $this->upload->initialize($config);

    //        if (isset($_FILES["pooja_image"])) {
    //         if (!$this->upload->do_upload('pooja_image')) {
    //             $data['pooja_image_error'] = $this->upload->display_errors();
    //         } else {
    //             $data['pooja_image_upload_data'] = $this->upload->data();
    //             $imagePath = $data['pooja_image_upload_data']['file_name'];
    //         }
    //     }

    //         // Prepare data for insertion
    //         $data = [
    //             'puja_name'        => $name,
    //             'puja_decription'  => $description,
    //             'puja_mode'        => $mode,
    //             'puja_image'       => $imagePath,
    //             'created_at'       => date('Y-m-d H:i:s')
    //         ];

    //         // Insert into database
    //         $inserted = $this->Admin_Api_Model->insertPooja($data);

    //         echo json_encode([
    //             'status'  => $inserted,
    //             'message' => $inserted ? 'Pooja added successfully!' : 'Failed to insert into database.',
    //             'data'    => $inserted ? $data : null
    //         ]);
    //     // } else {
    //     //     echo json_encode([
    //     //         'status'  => false,
    //     //         'message' => 'Please upload an image.'
    //     //     ]);
    //     // }
    // }


    public function addPoojaAPI()
    {

        header('Content-Type: application/json');

        $name        = $this->input->post('pooja_name');
        $description = $this->input->post('pooja_description');
        $mode        = $this->input->post('pooja_mode');

        if (empty($name) || empty($description) || empty($mode)) {
            echo json_encode([
                'status'  => false,
                'message' => 'All fields are required.'
            ]);
            return;
        }

        if (!in_array($mode, ['Online', 'Offline', 'Mob'])) {
            echo json_encode([
                'status'  => false,
                'message' => 'Invalid pooja mode.'
            ]);
            return;
        }
        // print_r($_FILES);die; // Debugging line to check file upload data
        // Image upload
        if (!empty($_FILES['pooja_image']['name'])) {
            $config = [
                'upload_path'   => './uploads/pooja_images/', // Ensure this path exists and is writable
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 2048 // 2MB
            ];
            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('pooja_image')) {
                echo json_encode([
                    'status'  => false,
                    'message' => $this->upload->display_errors('', '')
                ]);
                return;
            }

            $uploadData  = $this->upload->data();
            $imagePath   = $uploadData['file_name'];

            // Prepare data for insertion
            $data = [
                'puja_name'        => $name,
                'puja_decription'  => $description,
                'puja_mode'        => $mode,
                'puja_image'       => $imagePath,
                'created_at'       => date('Y-m-d H:i:s')
            ];

            // Insert into database
            $inserted = $this->Admin_Api_Model->insertPooja($data);

            echo json_encode([
                'status'  => $inserted,
                'message' => $inserted ? 'Pooja added successfully!' : 'Failed to insert into database.',
                'data'    => $inserted ? $data : null
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Please upload an image.'
            ]);
        }
    }

    public function updatePoojaAPI()
    {
        header('Content-Type: application/json');

        $id          = $this->input->post('puja_id');
        $name        = $this->input->post('pooja_name');
        $description = $this->input->post('pooja_description');
        $mode        = $this->input->post('pooja_mode');

        if (empty($id) || empty($name) || empty($description) || empty($mode)) {
            echo json_encode([
                'status'  => false,
                'message' => 'All fields are required.'
            ]);
            return;
        }

        // Normalize mode to lowercase for database consistency
        $mode = ucfirst(strtolower($mode));
        if (!in_array($mode, ['Online', 'Offline', 'Mob'])) {
            echo json_encode([
                'status'  => false,
                'message' => 'Invalid pooja mode.'
            ]);
            return;
        }

        // Check if puja_id exists
        $this->db->where('puja_id', $id);
        $exists = $this->db->count_all_results('puja') > 0;
        if (!$exists) {
            echo json_encode([
                'status'  => false,
                'message' => 'Pooja ID not found.'
            ]);
            return;
        }

        // Prepare data for update
        $data = [
            'puja_name'        => $name,
            'puja_decription'  => $description,
            'puja_mode'        => $mode
        ];

        // Handle image upload if provided
        if (!empty($_FILES['pooja_image']['name'])) {
            $config = [
                'upload_path'   => './Uploads/pooja_images/',
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 2048 // 2MB
            ];
            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('pooja_image')) {
                echo json_encode([
                    'status'  => false,
                    'message' => $this->upload->display_errors('', '')
                ]);
                return;
            }

            $uploadData = $this->upload->data();
            $data['puja_image'] = $uploadData['file_name'];
        }

        // Update the pooja record
        $updated = $this->Admin_Api_Model->updatePooja($id, $data);

        echo json_encode([
            'status'  => $updated,
            'message' => $updated ? 'Pooja updated successfully!' : 'Failed to update pooja or no changes made.',
            'data'    => $updated ? $data : null
        ]);
    }

    public function deletePoojaAPI()
    {
        header('Content-Type: application/json');

        $id = $this->input->post('puja_id');

        if (empty($id)) {
            echo json_encode([
                'status'  => false,
                'message' => 'Pooja ID is required.'
            ]);
            return;
        }

        // Check if puja_id exists
        $this->db->where('puja_id', $id);
        $pooja = $this->db->get('puja')->row_array();
        if (!$pooja) {
            echo json_encode([
                'status'  => false,
                'message' => 'Pooja ID not found.'
            ]);
            return;
        }

        // Delete the pooja record
        $deleted = $this->Admin_Api_Model->deletePooja($id);

        if ($deleted) {
            // Optionally delete the image file
            if (!empty($pooja['puja_image'])) {
                $imagePath = FCPATH . 'Uploads/pooja_images/' . $pooja['puja_image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            echo json_encode([
                'status'  => true,
                'message' => 'Pooja deleted successfully.'
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Failed to delete pooja.'
            ]);
        }
    }

    public function GetAllAdmins()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admins = $this->Admin_Api_Model->get_all_admins();

            if (!empty($admins)) {
                $this->output->set_status_header(200);
                $response = ["status" => "success", "data" => $admins];
            } else {
                $this->output->set_status_header(200);
                $response = ["status" => "success", "message" => "No admins found"];
            }
        } else {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }

    public function CheckEmailExists()
    {
        header('Content-Type: application/json');

        $email = $this->input->post('email');

        if (empty($email)) {
            echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
            return;
        }

        $user = $this->Admin_Login_Model->get_user_by_email($email);

        if ($user) {
            echo json_encode(['status' => 'exists', 'message' => 'This email is already registered.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Email is available.']);
        }
    }

    public function CheckMobileExists()
    {
        header('Content-Type: application/json');

        $mobile_number = $this->input->post('mobile_number');

        if (empty($mobile_number)) {
            echo json_encode(['status' => 'error', 'message' => 'Mobile number is required.']);
            return;
        }

        $user = $this->Admin_Login_Model->get_user_by_mobile($mobile_number);

        if ($user) {
            echo json_encode(['status' => 'exists', 'message' => 'This mobile number is already registered.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Mobile number is available.']);
        }
    }

    public function AddAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $password = password_hash($this->input->post("password"), PASSWORD_BCRYPT);
            $mobile_number = $this->input->post("mobile_number");
            $role = $this->input->post("role"); // New role field

            if (empty($name) || empty($email) || empty($password) || empty($mobile_number) || empty($role)) {
                $this->output->set_status_header(400);
                $response = ["status" => "error", "message" => "All fields are required"];
            } else {
                $result = $this->Admin_Api_Model->add_admin($name, $email, $password, $mobile_number, $role);

                if ($result) {
                    $this->output->set_status_header(201);
                    $response = ["status" => "success", "message" => "Admin added successfully"];
                } else {
                    $this->output->set_status_header(500);
                    $response = ["status" => "error", "message" => "Failed to add admin"];
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }

    public function GetAdminById()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $admin_id = $this->input->get("admin_id");

            if (!$admin_id || !is_numeric($admin_id)) {
                $this->output->set_status_header(400);
                $response = ["status" => "error", "message" => "Invalid admin ID"];
            } else {
                $admin = $this->Admin_Api_Model->get_admin_by_id($admin_id);

                if ($admin) {
                    $this->output->set_status_header(200);
                    $response = ["status" => "success", "data" => $admin];
                } else {
                    $this->output->set_status_header(404);
                    $response = ["status" => "error", "message" => "Admin not found"];
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }


    public function EditAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin_id = $this->input->post("admin_id");
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $password = $this->input->post("password");  // Password is now optional
            $mobile_number = $this->input->post("mobile_number");
            $role = $this->input->post("role");

            // If password is not provided, retain the old password (use original password)
            if (empty($admin_id) || empty($name) || empty($email) || empty($mobile_number) || empty($role)) {
                $this->output->set_status_header(400);
                $response = ["status" => "error", "message" => "All fields are required"];
            } else {
                // Check if the password is provided. If not, fetch the existing password.
                if (empty($password)) {
                    // Fetch existing password from the database
                    $currentAdmin = $this->AdminModel->get_admin_by_id($admin_id);
                    $password = $currentAdmin['password']; // Use current password if no new password is provided
                } else {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                }

                $result = $this->Admin_Api_Model->edit_admin($password, $admin_id, $name, $email, $mobile_number, $role);

                if ($result) {
                    $this->output->set_status_header(200);
                    $response = ["status" => "success", "message" => "Admin updated successfully"];
                } else {
                    $this->output->set_status_header(500);
                    $response = ["status" => "error", "message" => "Failed to update admin"];
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }

    public function DeleteAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin_id = $this->input->post("admin_id");

            if (empty($admin_id)) {
                $this->output->set_status_header(400);
                $response = ["status" => "error", "message" => "Admin ID is required"];
            } else {
                $result = $this->Admin_Api_Model->delete_admin($admin_id);

                if ($result) {
                    $this->output->set_status_header(200);
                    $response = ["status" => "success", "message" => "Admin deleted successfully"];
                } else {
                    $this->output->set_status_header(500);
                    $response = ["status" => "error", "message" => "Failed to delete admin"];
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }

    public function GetAllService()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {



            // Fetch data from both models
            $astrologerServices = $this->Admin_Api_Model->getAllServices();
            $pujariServices = $this->Admin_Api_Model->getAllPujariServices();

            $mergedServices = array_merge($astrologerServices, $pujariServices);

            if (!empty($astrologerServices) || !empty($pujariServices)) {
                $this->output->set_status_header(200);
                $response = [
                    "status" => "success",
                    // "astrologer_services" => $astrologerServices,
                    // "pujari_services" => $pujariServices

                    "services" => $mergedServices
                ];
            } else {
                $this->output->set_status_header(200);
                $response = [
                    "status" => "success",
                    "message" => "No services found"
                ];
            }
        } else {
            $this->output->set_status_header(405);
            $response = [
                "status" => "error",
                "message" => "Method Not Allowed"
            ];
        }

        // Final JSON response
        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($response));
    }

    public function RescheduleInterview()
    {
        // Set JSON response header
        header('Content-Type: application/json');

        try {
            // Get JSON input
            $input = json_decode(file_get_contents('php://input'), true);

            // Validate required fields
            if (
                !isset($input['service_id']) || !isset($input['meeting_date']) ||
                !isset($input['meeting_time']) || !isset($input['meeting_link']) ||
                !isset($input['user_type'])
            ) {

                echo json_encode([
                    'success' => false,
                    'message' => 'Missing required fields'
                ]);
                return;
            }

            $service_id = $input['service_id'];
            $meeting_date = $input['meeting_date'];
            $meeting_time = $input['meeting_time'];
            $meeting_link = $input['meeting_link'];
            $status = isset($input['status']) ? $input['status'] : 'Rescheduled';
            $user_type = strtolower($input['user_type']); // Normalize to lowercase

            // Update the service in database
            $update_data = [
                'status' => $status,
                'date' => $meeting_date,
                'time' => $meeting_time,
                'meeting_link' => $meeting_link,
                // 'updated_at' => date('Y-m-d H:i:s')
            ];

            $result = false; // Initialize result to prevent undefined variable error

            if ($user_type === 'astrologer') {
                // Load the model for astrologer services
                $this->load->model('Admin_Api_Model');
                $result = $this->Admin_Api_Model->updateAstrologerService($service_id, $update_data);
            } else if ($user_type === 'pujari') {
                $this->load->model('Admin_Api_Model');
                $result = $this->Admin_Api_Model->updatePujariService($service_id, $update_data);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid user type'
                ]);
                return;
            }

            if ($result) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Interview rescheduled successfully',
                    'data' => [
                        'service_id' => $service_id,
                        'date' => $meeting_date,
                        'time' => $meeting_time,
                        'meeting_link' => $meeting_link,
                        'status' => $status,
                        'user_type' => $user_type
                    ]
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to update interview schedule'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ]);
        }
    } 


    public function GetRescheduledServices()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return $this->output
                ->set_status_header(405)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status'  => 'error',
                    'message' => 'Method Not Allowed'
                ]));
        }

        // Data खींचो
        $astro = $this->Admin_Api_Model->getRescheduledServices();
        $pujari = $this->Admin_Api_Model->getRescheduledPujariServices();
        $merged = array_merge($astro, $pujari);

        // Response बनाओ
        if (!empty($merged)) {
            $this->output->set_status_header(200);
            $response = [
                'status'   => 'success',
                'services' => $merged
            ];
        } else {
            $this->output->set_status_header(200);
            $response = [
                'status'  => 'success',
                'message' => 'No rescheduled services found'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }



    /* ----------------- API ----------------- */
    // public function UpdateServiceStatus()
    // {
    //     try {
    //         /* 1. बेसिक validations */
    //         if ($this->input->method() !== 'post') {
    //             return $this->json_response(false, 'Only POST method allowed', 405);
    //         }

    //         $json = json_decode($this->input->raw_input_stream, true);
    //         if (empty($json)) {
    //             return $this->json_response(false, 'Invalid JSON', 400);
    //         }

    //         foreach (['service_id', 'status', 'user_type'] as $f) {
    //             if (empty($json[$f])) {
    //                 return $this->json_response(false, "Field '{$f}' is required", 400);
    //             }
    //         }

    //         $id        = (int) $json['service_id'];
    //         $status    = trim($json['status']);
    //         $user_type = ucfirst(strtolower(trim($json['user_type'])));   // Astrologer / Pujari

    //         $allowed = ['Approved', 'Rejected', 'Pending'];
    //         if (!in_array($status, $allowed)) {
    //             return $this->json_response(false,
    //                 'Invalid status. Allowed: '.implode(', ', $allowed), 400);
    //         }

    //         /* 2. कौन‑सा model/table यूज़ होगा? */
    //         if ($user_type === 'Astrologer') {
    //             $service      = $this->Admin_->get_astro_service($id);
    //             $update_fn    = 'update_astro_service';
    //         } elseif ($user_type === 'Pujari') {
    //             $service      = $this->api->get_pujari_service($id);
    //             $update_fn    = 'update_pujari_service';
    //         } else {
    //             return $this->json_response(false, 'Invalid user_type', 400);
    //         }

    //         if (!$service) {
    //             return $this->json_response(false, 'Service not found', 404);
    //         }

    //         /* 3. update payload */
    //         $data = [
    //             'status'     => $status,
    //             'updated_at' => date('Y-m-d H:i:s'),
    //             'updated_by' => $user_type
    //         ];
    //         if ($status === 'Approved') {
    //             $data['approved_at'] = $data['updated_at'];
    //             $data['approved_by'] = $user_type;
    //         } elseif ($status === 'Rejected') {
    //             $data['rejected_at'] = $data['updated_at'];
    //             $data['rejected_by'] = $user_type;
    //         }

    //         /* 4. DB update (dynamic call) */
    //         $ok = $this->api->{$update_fn}($id, $data);

    //         if ($ok) {
    //             return $this->json_response(true, "Service {$status} successfully", 200, [
    //                 'service_id'  => $id,
    //                 'user_type'   => $user_type,
    //                 'old_status'  => $service['status'],
    //                 'new_status'  => $status,
    //                 'updated_at'  => $data['updated_at']
    //             ]);
    //         }
    //         return $this->json_response(false, 'Failed to update', 500);

    //     } catch (Throwable $e) {
    //         log_message('error', 'UpdateServiceStatus: '.$e->getMessage());
    //         return $this->json_response(false, 'Internal error', 500);
    //     }
    // }

    // /* ---------- shared JSON helper ---------- */
    // private function json_response($success, $message, $code = 200, $data = [])
    // {
    //     $out = ['success' => $success, 'message' => $message];
    //     if ($data) $out['data'] = $data;
    //     return $this->output
    //         ->set_content_type('application/json')
    //         ->set_status_header($code)
    //         ->set_output(json_encode($out));
    // }

    public function UpdateServiceStatus()
    {
        
        // Get JSON input
        $json = json_decode($this->input->raw_input_stream, true);

        if (
            empty($json['service_id']) ||
            empty($json['status']) ||
            empty($json['user_type'])
        ) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Required fields: service_id, status, user_type'
                ]));
            return;
        }

        $service_id = (int) $json['service_id'];
        $status = $json['status'];
        $user_type = ucfirst(strtolower(trim($json['user_type']))); // Astrologer / Pujari

        // Valid statuses
        $valid_statuses = ['Approved', 'Rejected', 'Pending'];
        if (!in_array($status, $valid_statuses)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Invalid status. Allowed: ' . implode(', ', $valid_statuses)
                ]));
            return;
        }

        // Prepare update data
        $update_data = [
            'status' => $status,
            // 'updated_at' => date('Y-m-d H:i:s'),
            'user_type' => $user_type
        ];

        if ($status === 'Approved') {
            $update_data['created_at'] = date('Y-m-d H:i:s');
            $update_data['user_type'] = $user_type;
        } elseif ($status === 'Rejected') {
            $update_data['created_at'] = date('Y-m-d H:i:s');
            $update_data['user_type'] = $user_type;
        }

        // Call correct model function
        if ($user_type === 'Astrologer') {
            $result = $this->Admin_Api_Model->updateAstroServiceStatus($service_id, $update_data);
        } elseif ($user_type === 'Pujari') {
            $result = $this->Admin_Api_Model->updatePujariServiceStatus($service_id, $update_data);
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Invalid user type'
                ]));
            return;
        }

        if ($result) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'success' => true,
                    'message' => 'Service status updated successfully'
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Failed to update service status'
                ]));
        }
    }





    // [--------------Approve or Reject Pujari-----------------------]
    public function approveRejectPujari()
    {
        $data = $this->input->post();
        if (isset($data['id'], $data['status'])) {
            $updateData = ['status' => $data['status']];
            $result = $this->Admin_Api_Model->updatePujari($data['id'], $updateData);
            $this->Admin_Api_Model->updatePujariServicesStatus($data['id'], $updateData);

            if ($result) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode([
                        'status' => true,
                        'message' => 'Pujari status updated successfully'
                    ]));
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(500)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'Failed to update Pujari status'
                    ]));
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Missing required fields'
                ]));
        }
    }

    // [--------------Schedule Pujari Interview-----------------------]
    public function SchedulePujariInterview()
    {
        $data = $this->input->post();
        if (isset($data['id'], $data['mode'], $data['date'], $data['time'], $data['meeting_link'])) {
            if (!$this->Admin_Api_Model->checkPujariExists($data['id'])) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'Invalid ID. Pujari not found.'
                    ]));
            } else {
                $time_12hr = date('h:i A', strtotime($data['time']));
                $updateData = [
                    'mode' => $data['mode'],
                    'date' => $data['date'],
                    'time' => $time_12hr,
                    'meeting_link' => $data['meeting_link'],
                    'status' => 'scheduled'
                ];
                $result = $this->Admin_Api_Model->updatePujari($data['id'], $updateData);
                if ($result) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode([
                            'status' => true,
                            'message' => 'Pujari interview scheduled successfully'
                        ]));
                } else {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(500)
                        ->set_output(json_encode([
                            'status' => false,
                            'message' => 'Failed to schedule Pujari interview'
                        ]));
                }
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Missing required fields'
                ]));
        }
    }

    // [--------------Assign Pujari Charges-----------------------]
    public function assignPujariCharges()
    {
        $data = $this->input->post();
        if (isset($data['id'], $data['price_per_minute'])) {
            if (!$this->Admin_Api_Model->checkPujariExists($data['id'])) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'Invalid ID. Pujari not found.'
                    ]));
            } else {
                $updateData = ['price_per_minute' => $data['price_per_minute']];
                $result = $this->Admin_Api_Model->updatePujari($data['id'], $updateData);
                if ($result) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(200)
                        ->set_output(json_encode([
                            'status' => true,
                            'message' => 'Pujari charges assigned successfully'
                        ]));
                } else {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_status_header(500)
                        ->set_output(json_encode([
                            'status' => false,
                            'message' => 'Failed to assign Pujari charges'
                        ]));
                }
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Missing required fields'
                ]));
        }
    }

    public function getPujariById($id)
    {
        $Pujari = $this->Admin_Api_Model->get_all_Pujari_by_id($id);

        if (!empty($Pujari)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Pujari fetched successfully',
                    'Pujari' => $Pujari
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'Astro not found'
                ]));
        }
    }

    public function getAllOrder($mall_id)
    {
        $orders = $this->Admin_Api_Model->getAllOrder($mall_id);

        if (!empty($orders)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Orders fetched successfully',
                    'orders' => $orders
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No orders found for this mall'
                ]));
        }
    }


     public function GetUserCount()
    {
        $user = $this->Admin_Api_Model->getUserCount();

        if (!empty($user)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Count fetched successfully',
                    'orders' => $user
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Count found'
                ]));
        }
    }

    
     public function GetAstroCount()
    {
        $Astro = $this->Admin_Api_Model->getAstrologerCount();

        if (!empty($Astro)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Count fetched successfully',
                    'orders' => $Astro
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Count found'
                ]));
        }
    }

    
     public function GetPujariCount()
    {
        $pujari = $this->Admin_Api_Model->getPujariCount();

        if (!empty($pujari)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Count fetched successfully',
                    'orders' => $pujari
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Count found'
                ]));
        }
    }


       public function getReinterviewCount()
    {
        $Reinterview = $this->Admin_Api_Model->getReinterviewCount();

        if (!empty($Reinterview)) {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode([
                    'status' => true,
                    'message' => 'Count fetched successfully',
                    'orders' => $Reinterview
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode([
                    'status' => false,
                    'message' => 'No Count found'
                ]));
        }
    }
}