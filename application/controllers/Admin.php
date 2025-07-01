<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function AdminDash(){
		
		$this->load->view('Admin/AdminDash');
	}
	public function AstrologerReqList(){
		
		$this->load->view('Admin/AstrologerReqList');
	}
	public function PujariReqList(){
		
		$this->load->view('Admin/PujariReqList');
	}
	public function UserManagement(){
		
		$this->load->view('Admin/UserManagement');
	}
	public function Festivals(){
		
		$this->load->view('Admin/Festivals');
	}
	public function BookPooja(){
		
		$this->load->view('Admin/BookPooja');
	}
	public function JyotisikaStore(){
		
		$this->load->view('Admin/JyotisikaStore');
	}
	public function Profile(){
		
		$this->load->view('Admin/Profile');
	}
	public function AnyliticsandReports(){
		
		$this->load->view('Admin/AnyliticsandReports');
	}
	public function RescheduleInterview(){
		
		$this->load->view('Admin/RescheduleInterview');
	}
	public function ViewAstrologer(){
		
		$this->load->view('Admin/ViewAstrologer');
	}
	public function ViewPujari(){
		
		$this->load->view('Admin/ViewPujari');
	}
	public function AstrologersList(){
		
		$this->load->view('Admin/AstrologersList');
	}
	public function AstrologerReview(){
		
		$this->load->view('Admin/AstrologerReview');
	}
	public function PujariList(){
		
		$this->load->view('Admin/PujariList');
	}
	public function PujariReview(){
		
		$this->load->view('Admin/PujariReview');
	}
	public function AdminOrders(){
		
		$this->load->view('Admin/AdminOrders');
	}
	public function TrackandShip(){
		
		$this->load->view('Admin/TrackandShip');
	}
	public function Track_Order_Details(){
		
		$this->load->view('Admin/Track_Order_Details');
	}
	public function login(){
		
		$this->load->view('Admin/login');
	}
    public function FinanceAstrologer(){
		 $this->load->model('FinanceModel');
    $data['astrologers'] = $this->FinanceModel->getAstrologerOverview();
		$this->load->view('Admin/FinanceAstrologer',$data);
}
 	public function FinancePoojari(){
		 $this->load->model('FinanceModel');
    $data['pujaris'] = $this->FinanceModel->getPujariOverview();
		$this->load->view('Admin/FinancePoojari', $data);
	}
	public function AstrologerServices()
	
{
	

    $this->load->view('Admin/astrologerservices');
}
public function GetAstrologerServices()
{
	$this->load->model('Astrologer_Api_Model');
    header('Content-Type: application/json'); // Set response header

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        http_response_code(405);
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
        return;
    }

    $services = $this->Astrologer_Api_Model->getServicesByType('astrologer');

    if ($services) {
        echo json_encode(['status' => 'success', 'services' => $services]);
    } else {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'No services found.']);
    }
}

	  public function EditService()
	  
    {
		$this->load->model('Astrologer_Api_Model');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service_id = $this->input->post("service_id");
            $name = $this->input->post("name");
            // $price = $this->input->post("price");
            $description = $this->input->post("description");
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;
            // if ($image && isset($image['tmp_name'])) {
            //     $mime = mime_content_type($image['tmp_name']);
            //     var_dump($mime);

            // }

            if (!$service_id || !$name) {
                $this->output->set_status_header(400);
                $response = ["status" => "error", "message" => "Service ID and name are required"];
            } else {
                $result = $this->Astrologer_Api_Model->edit_service($service_id, $name, $description, $image);

                if ($result) {
                    $this->output->set_status_header(200);
                    $response = ["status" => "success", "message" => "Service updated successfully"];
                } else {
                    $this->output->set_status_header(500);
                    $response = ["status" => "error", "message" => "Failed to update service"];
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }

    //<-------------------- Add Service -------------------->
    public function AddService()
    {
				$this->load->model('Astrologer_Api_Model');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $this->input->post("name");
            $description = $this->input->post("description");
            $service_type = $this->input->post("service_type");
            // $price = $this->input->post("price");
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;

            // Validate required fields
            if (empty($name) || empty($service_type) || !in_array($service_type, ['astrologer', 'pujari'])) {
                $this->output->set_status_header(400);
                $response = ["status" => "error", "message" => "Name and valid service_type (astrologer or pujari) are required"];
            } else {
                $result = $this->Astrologer_Api_Model->add_service($name, $description, $service_type, $image);

                if ($result) {
                    $this->output->set_status_header(201);
                    $response = ["status" => "success", "message" => "Service added successfully"];
                } else {
                    $this->output->set_status_header(500);
                    $response = ["status" => "error", "message" => "Failed to add service"];
                }
            }
        } else {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }
    //<-------------------- Delete Service -------------------->
    public function DeleteService()
    {
		$this->load->model('Astrologer_Api_Model');
        $id = $this->input->post("service_id");
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        } else {
            if (!is_numeric($id) || $id <= 0) {
                $this->output->set_status_header(400);
                $response = ["status" => "error", "message" => "Invalid service ID"];
            } else {
                // Fetch service details before deleting
                $service = $this->Astrologer_Api_Model->getServiceById($id);

                if ($service) {
                    // Delete service image if exists
                    if (!empty($service->image)) {
                        $imagePath = FCPATH . 'uploads/services/' . $service->image;
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                    }

                    // Delete service from database
                    $deleted = $this->Astrologer_Api_Model->delete_service($id);

                    $response = $deleted
                        ? ["status" => "success", "message" => "Service deleted successfully"]
                        : ["status" => "error", "message" => "Failed to delete service"];
                } else {
                    $this->output->set_status_header(404);
                    $response = ["status" => "error", "message" => "Service not found"];
                }
            }
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }


    
    // get pujari service
  
    public function pujariServices()
    {
        $this->load->view('Admin/pujariservices');
    }
    public function FetchAllServices()
    {
        		$this->load->model('PujariModel');

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            $this->output->set_status_header(405);
            $response = ["status" => "error", "message" => "Method Not Allowed"];
        } else {
            $services = $this->PujariModel->get_all_services();
            if (!empty($services)) {
                $response = ["status" => "success", "data" => $services];
            } else {
                $this->output->set_status_header(404);
                $response = ["status" => "error", "message" => "No services found"];
            }
        }

        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }
}

