<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Register_Form_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// User Routes
$route['home'] = 'User/Home';
$route['demo'] = 'User/Demo';
$route['freekundli'] = 'User/FreeKundli';
$route['bookpooja'] = 'User/BookPooja';
$route['kundlimatching'] = 'User/KundliMatching';
$route['festival'] = 'User/Festival';
$route['panchang'] = 'User/Panchang';
$route['jyotisikamall'] = 'User/JyotisikaMall';
$route['todayhoroscope'] = 'User/TodayHoroscope';
$route['horoscopereadmore'] = 'User/HoroscopeReadmore';
$route['kp'] = 'User/KP';
$route['astrologers'] = 'User/Astrologers';
$route['ViewAstrologer'] = 'User/ViewAstrologer';
$route['PoojarViewMore'] ='User/PoojarViewMore';
$route['OfflinePoojaris'] ='User/OfflinePoojaris';
$route['FestivalReadmore'] ='User/FestivalReadmore';
$route['WhyUs'] ='User/WhyUs';
$route['OnlinePoojaris'] ='User/OnlinePoojaris';
$route['Recharge'] ='User/Recharge';
$route['ServiceDetails'] ='User/ServiceDetails';
$route['Poojaris'] ='User/Poojaris';
$route['UserProfile'] ='User/UserProfile';
$route['Orders'] ='User/Orders';
$route['AstrologyServices'] ='User/AstrologyServices';
$route['ProductDetails'] ='User/ProductDetails';
$route['ProductPayment'] ='User/ProductPayment';
$route['Notification'] ='User/Notification';
$route['CustomerSupport'] ='User/CustomerSupport';



// login poge
$route['LoginSignup'] = 'LoginSignup/LoginSignup';

// Admin Routes
$route['admindash'] = 'Admin/AdminDash';
$route['astrologerrequests'] = 'Admin/AstrologerReqList';
$route['pujarirequests'] = 'Admin/PujariReqList';
$route['usermanagement'] = 'Admin/UserManagement';
$route['festivals'] = 'Admin/Festivals';
$route['poojalist'] = 'Admin/BookPooja';
$route['jyotisikastore'] = 'Admin/JyotisikaStore';
$route['profile'] = 'Admin/Profile';
$route['anyliticsandreports'] = 'Admin/AnyliticsandReports';

// Login Admin Routes
$route['login'] = 'LoginForgotAdmin/LoginAdmin';


//Pujari Module
$route['PujariReg'] = 'PujariUser/PujariReg';
$route['RegisterForm']='PujariUser/RegisterForm';
$route['PujariDashboard']='PujariUser/PujariDashboard';
$route['PujariNav']='PujariUser/PujariNav';
$route['PujariFooter']='PujariUser/PujariFooter';
$route['RecentRequest']='PujariUser/RecentRequest';
$route['SetRate']='PujariUser/SetRate';
$route['RateChart']='PujariUser/RateChart';
$route['List']='PujariUser/List';
$route['PujaForm']='PujariUser/PujaForm';
$route['AnalyticsandEarning']='PujariUser/AnalyticsandEarning';
$route['OnlinePuja']='PujariUser/OnlinePuja';
$route['OfflinePuja']='PujariUser/OfflinePuja';
$route['ProfileForm']='PujariUser/ProfileForm';