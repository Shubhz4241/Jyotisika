<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HrAdminController extends CI_Controller {

    

    public function home() {
        $this->load->view('HRSIDE/DashBoard');
    }

   public function astrologer(){
    $this->load->view('HRSIDE/Astrologer');
   }
public function profile(){
    $this->load->view('HRSIDE/Profile');
   }
   public function pujari(){
    $this->load->view('HRSIDE/Pujari');
   }

   public function reinterviews(){
    $this->load->view('HRSIDE/Reinterviews');
   }
   public function astrorequest(){
    $this->load->view('HRSIDE/viewastrologerrequest');
   }
  public function viewallAstrologers(){
    $this->load->view('HRSIDE/viewallAstrologers');
  }
  public function viewastrologerprofile(){
    $this->load->view('HRSIDE/viewastrologerprofile');
  }
  public function pujarirequest(){
    $this->load->view('HRSIDE/viewpujarirequest');
   }
   public function viewallPujari(){
    $this->load->view('HRSIDE/viewallPujari');
   }
   public function viewpujariprofile(){
    $this->load->view('HRSIDE/viewpujariprofile');
   }
}
?>