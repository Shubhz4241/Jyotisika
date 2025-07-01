<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->database(); // ✅ Load database here
        $this->load->model('FinanceModel'); // Optional: load model here if used everywhere
    }
	public function FinanceAstrologer()
{
    $this->load->model('FinanceModel');
    $data['astrologers'] = $this->FinanceModel->getAstrologerOverview();
    $this->load->view('Finance/FinanceAstrologer', $data);
}

	public function markPaid()
{
    $income_id = $this->input->post('income_id');
    if (!$income_id) {
        echo json_encode(['success' => false, 'message' => 'Invalid income ID']);
        return;
    }

    $this->load->model('FinanceModel'); // Adjust if needed
    $updated = $this->FinanceModel->markChatAsPaid($income_id);

    echo json_encode(['success' => $updated]);
}


	public function FinancePoojari(){
    $data['pujaris'] = $this->FinanceModel->getPujariOverview();
		$this->load->view('Finance/FinancePoojari', $data);
	}
	public function FinanceProfile(){
		
		$this->load->view('Finance/FinanceProfile');
	}
	public function markPujariPaid()
{
    $income_id = $this->input->post('income_id');

    if (!$income_id) {
        echo json_encode(['success' => false, 'message' => 'Invalid ID']);
        return;
    }

    $this->load->model('FinanceModel');
    $updated = $this->FinanceModel->markPujariChatAsPaid($income_id);

    if ($updated) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update in DB']);
    }
}

}


