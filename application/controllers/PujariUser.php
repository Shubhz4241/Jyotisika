<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PujariUser extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');

		$allowedPages = ['MobileNumberAndOTPForm', 'UserSelection', 'PujariReg', 'RegisterForm', 'Loaderpage', 'RegistrationForm'];

		$currentPage = $this->router->fetch_method();

		if (!in_array($currentPage, $allowedPages) && !$this->session->userdata('logged_in')) {
			redirect('PujariUser/MobileNumberAndOTPForm');
		}
	}

	public function PujariReg()
	{
		$this->load->view('Pujari/PujariReg');
	}
	public function RegisterForm()
	{
		$this->load->view('Pujari/RegisterForm');
	}
	public function PujariDashboard()
	{
		$data['pujari_id'] = $this->session->userdata('pujari_id');
		$pujari_id = $this->session->userdata('pujari_id');
		$url = base_url('PujariController/feedback/' . $pujari_id);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			log_message('error', 'cURL error: ' . curl_error($ch));
			$data['feedbacks'] = [];
		} else {
			$response = json_decode($result, true);
			$data['feedbacks'] = !empty($response['data']) ? $response['data'] : [];
		}
		$this->load->view('Pujari/PujariDashboard', $data);
	}
	public function RecentRequest()
	{
		$data['pujari_id'] = $this->session->userdata('pujari_id');
		$this->load->view('Pujari/RecentRequest', $data);
	}
	public function SetRate()
	{
		$this->load->view('Pujari/SetRate');
	}
	public function RateChart()
	{
		$data['pujari_id'] = $this->session->userdata('pujari_id');
		$this->load->view('Pujari/RateChart', $data);
	}
	public function List()
	{
		$this->load->view('Pujari/List');
	}
	public function PujaForm()
	{
		$this->load->view('Pujari/PujaForm');
	}
	public function AnalyticsandEarning()
	{
		$data['pujari_id'] = $this->session->userdata('pujari_id');
		$this->load->view('Pujari/AnalyticsandEarning', $data);
	}
	public function OnlinePuja()
	{

		$pujari_id = $this->session->userdata('pujari_id');
		$url = base_url('PujariController/getPujas/' . $pujari_id);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL error: ' . curl_error($ch));
			$data['pujas'] = [];
		} else {
			$response = json_decode($result, true);
			$data['pujas'] = !empty($response['data']) ? $response['data'] : [];
		}
		$this->load->view('Pujari/OnlinePuja', $data);
	}
	public function OfflinePuja()
	{
		$this->load->view('Pujari/OfflinePuja');
	}
	public function ProfileForm()
	{
		$data['pujari_id'] = $this->session->userdata('pujari_id');

		$this->load->view('Pujari/ProfileForm', $data);
	}
	public function AnalyticsAndEarning2()
	{
		$pujari_id = $this->session->userdata('pujari_id');

		$this->load->model('PujariModel');

		$earningsMonthTotal = $this->makeCurlRequest(
			base_url('PujariController/earningsBreakdownTotalMonthly/' . $pujari_id)
		);

		$earningsTotal = $this->makeCurlRequest(
			base_url('PujariController/getTotalEarnings/' . $pujari_id)
		);

		// Get data for graphs
		$onlineServices = $this->PujariModel->earningsBreakdownOnline($pujari_id);
		$mobServices = $this->PujariModel->earningsBreakdownMob($pujari_id);

		// Prepare data for view
		$data = [
			'earningsMonthTotal' => [
				'data' => !empty($earningsMonthTotal['data'])
					? $earningsMonthTotal['data']
					: ['total_earnings' => 0]
			],
			'earningsTotal' => [
				'data' => !empty($earningsTotal['data'])
					? $earningsTotal['data']
					: ['total_earnings' => 0]
			],
			'onlineServices' => [
				'data' => $onlineServices ?: []
			],
			'mobServices' => [
				'data' => $mobServices ?: []
			]
		];

		$this->load->view('Pujari/AnalyticsAndEarning2', $data);
	}

	private function makeCurlRequest($url)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL error in ' . __METHOD__ . ': ' . curl_error($ch));
			curl_close($ch);
			return ['data' => [], 'error' => curl_error($ch)];
		}

		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($httpCode >= 400) {
			log_message('error', 'HTTP error in ' . __METHOD__ . ': ' . $httpCode);
			return ['data' => [], 'error' => 'HTTP error: ' . $httpCode];
		}

		$decoded = json_decode($result, true);
		if (json_last_error() !== JSON_ERROR_NONE) {
			log_message('error', 'JSON decode error in ' . __METHOD__ . ': ' . json_last_error_msg());
			return ['data' => [], 'error' => 'Invalid JSON response'];
		}

		return $decoded;
	}


	public function EarningsBreakdown()
	{

		$pujari_id = $this->session->userdata('pujari_id');
		$url = base_url('PujariController/earningsBreakdownOnline/' . $pujari_id);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			log_message('error', 'cURL error: ' . curl_error($ch));
			$data['earnings'] = [];
		} else {
			$response = json_decode($result, true);
			$data['earnings'] = !empty($response['data']) ? $response['data'] : [];
		}

		$url2 = base_url('PujariController/earningsBreakdownMob/' . $pujari_id);
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		$result2 = curl_exec($ch2);
		if (curl_errno($ch2)) {
			log_message('error', 'cURL error: ' . curl_error($ch2));
			$data['earningMob'] = [];
		} else {
			$response2 = json_decode($result2, true);
			$data['earningMob'] = !empty($response2['data']) ? $response2['data'] : [];
		}


		$this->load->view('Pujari/EarningsBreakdown', $data);
	}
	public function MonthlyEarningsBreakdown()
	{

		$pujari_id = $this->session->userdata('pujari_id');
		$url = base_url('PujariController/earningsBreakdownMonthlyOnline/' . $pujari_id);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL error: ' . curl_error($ch));
			$data['earnings'] = [];
		} else {
			$response = json_decode($result, true);
			$data['earnings'] = !empty($response['data']) ? $response['data'] : [];
		}

		$url2 = base_url('PujariController/earningsBreakdownMonthlyMob/' . $pujari_id);
		$ch2 = curl_init($url2);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		$result2 = curl_exec($ch2);
		if (curl_errno($ch2)) {
			log_message('error', 'cURL error: ' . curl_error($ch2));
			$data['earningMob'] = [];
		} else {
			$response2 = json_decode($result2, true);
			$data['earningMob'] = !empty($response2['data']) ? $response2['data'] : [];
		}

		$this->load->view('Pujari/MonthlyEarningsBreakdown', $data);
	}
	public function MobileNumberAndOTPForm()
	{
		$this->load->view('Pujari/MobileNumberAndOTPForm');
	}
	public function PujaReminder()
	{
		$this->load->view('Pujari/PujaReminder');
	}
	public function PujaReminder2()
	{
		$data['pujari_id'] = $this->session->userdata('pujari_id');
		$this->load->view('Pujari/PujaReminder2', $data);
	}
	public function PujaReminder3()
	{
		$this->load->view('Pujari/PujaReminder3');
	}
	public function UserSelection()
	{
		$this->load->view('Pujari/UserSelection');
	}
	public function Loaderpage()
	{
		$this->load->view('Pujari/Loaderpage');
	}
	public function RegistrationForm()
	{
		$this->load->view('Pujari/RegistrationForm');
	}


	public function TodaysSchedule()
	{

		$pujari_id = $this->session->userdata('pujari_id');
		$url = base_url('PujariController/todaySchedule/' . $pujari_id);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'cURL error: ' . curl_error($ch));
			$data['todaysSchedule'] = [];
		} else {
			$response = json_decode($result, true);
			$data['todaysSchedule'] = !empty($response['data']) ? $response['data'] : [];
		}

		$this->load->view('Pujari/TodaysSchedule', $data);
	}

	public function update_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$this->load->model('PujariModel');

		if (empty($id) || empty($status)) {
			$this->session->set_flashdata('error', 'Invalid input.');
			redirect(base_url('schedule'));
			return;
		}

		if ($this->PujariModel->update_status($id, $status)) {
			$this->session->set_flashdata('success', 'Status updated successfully!');
		} else {
			$this->session->set_flashdata('error', 'Failed to update status.');
		}

		redirect(base_url('/PujariUser/TodaysSchedule'));
	}

	public function PujariFeedBackCard()
	{

		$pujari_id = $this->session->userdata('pujari_id');

		$url = base_url('PujariController/feedback/' . $pujari_id);

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			$data['feedbacks'] = [];
		} else {
			$response = json_decode($result, true);
			$data['feedbacks'] = !empty($response['data']) ? $response['data'] : [];
			$data['sessionid'] = $this->session->userdata('pujari_id');
		}
		$this->load->view('Pujari/PujariFeedBackCard', $data);
	}
}
