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

// login poge
$route['Signup'] = 'UserLoginSignup/Signup';
$route['Login'] = 'UserLoginSignup/Login';
$route['Logout'] = 'UserLoginSignup/Logout';

$route['terms'] = 'User/Terms';

//User self page
$route['home'] = 'User/Home';
$route['UserProfile'] ='User/UserProfile';



//data get from Api pages
$route['freekundli'] = 'User/FreeKundli';
$route['kundlimatching'] = 'User/KundliMatching';
$route['panchang'] = 'User/Panchang';

$route['kp'] = 'User/KP';
$route['ShowFreeKundli'] ='User/ShowFreeKundli';


$route['todayhoroscope'] = 'User/TodayHoroscope';
$route['horoscopereadmore/(:any)'] = 'User/HoroscopeReadmore/$1';
// $route['horoscopereadmore/(:any)'] = 'YourController/HoroscopeReadmore/$1';


//Data from astroller 
$route['astrologers'] = 'User/Astrologers';
$route['ViewAstrologer/(:num)'] = 'User/ViewAstrologer/$1';

$route['AstrologyServices'] ='User/AstrologyServices';
$route['Following'] ='User/Following';


$route['privacypolicy'] = 'User/Privacypolicy';

$route['wallet'] = 'User/Wallet';

//data from pujari side book puja section
$route['PoojarViewMore/(:num)/(:num)'] ='User/PoojarViewMore/$1/$2';
$route['OfflinePoojaris'] ='User/OfflinePoojaris';
$route['bookpooja'] = 'User/BookPooja';
$route['OnlinePoojaris/(:num)'] ='User/OnlinePoojaris/$1';
$route['Poojaris'] ='User/Poojaris';
$route['PoojaInfo'] ='User/PoojaInfo';



//data from admin side  Festivals
$route['festival'] = 'User/Festival';
$route['FestivalReadmore/(:num)'] ='User/FestivalReadmore/$1';



//data from admin  Jyotisika mall section
$route['jyotisikamall'] = 'User/JyotisikaMall';
$route['ProductDetails/(:num)'] ='User/ProductDetails/$1';
$route['ProductPayment'] ='User/ProductPayment';


//Notification section 
$route['Orders'] ='User/Orders';
$route['Notification'] ='User/Notification';
$route['CustomerSupport'] ='User/CustomerSupport';



//Mob puja section
$route['MobPooja'] ='User/MobPooja';


//Why us page
$route['WhyUs'] ='User/WhyUs';

$route['Cart'] = 'User/Cart';



$route['demo'] = 'User/Demo';
$route['Recharge'] ='User/Recharge';
$route['ServiceDetails'] ='User/ServiceDetails';

$route['chat/(:num)'] = 'User/Chat/$1';


//user end ---User route end--- 


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
$route['rescheduleinterview'] = 'Admin/RescheduleInterview';
$route['viewastrologer'] = 'Admin/ViewAstrologer';
$route['viewpujari'] = 'Admin/ViewPujari';
$route['astrologerslist'] = 'Admin/AstrologersList';
$route['astrologerreview'] = 'Admin/AstrologerReview';
$route['pujariList'] = 'Admin/PujariList';
$route['pujarireview'] = 'Admin/PujariReview';
$route['adminorders'] = 'Admin/AdminOrders';
$route['trackandship'] = 'Admin/TrackandShip';
$route['trackorderdetails'] = 'Admin/Track_Order_Details';

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
$route['AnalyticsAndEarning2']='PujariUser/AnalyticsAndEarning2';
$route['EarningsBreakdown']='PujariUser/EarningsBreakdown';
$route['MonthlyEarningsBreakdown']='PujariUser/MonthlyEarningsBreakdown';
$route['MobileNumberAndOTPForm']='PujariUser/MobileNumberAndOTPForm';
$route['PujaReminder']='PujariUser/PujaReminder';
$route['PujaReminder2']='PujariUser/PujaReminder2';
$route['PujaReminder3']='PujariUser/PujaReminder3';
$route['UserSelection']='PujariUser/UserSelection';
$route['Loaderpage']='PujariUser/Loaderpage';
$route['RegistrationForm']='PujariUser/RegistrationForm';
$route['TodaysSchedule']='PujariUser/TodaysSchedule';
$route['PujariFeedBackCard']='PujariUser/PujariFeedBackCard';

// Astrologer Module
$route['AstrologerNav']='AstrologerUser/AstrologerNav';
$route['AstrologerDashboard']='AstrologerUser/AstrologerDashboard';
$route['AstrologerFooter']='AstrologerUser/AstrologerFooter';
$route['RegisterForm']='AstrologerUser/RegisterForm';
$route['AstrologerAnalyticsAndEarning1']='AstrologerUser/AstrologerAnalyticsAndEarning1';
$route['AstrologerAnalyticsAndEarning2']='AstrologerUser/AstrologerAnalyticsAndEarning2';
$route['AstrologerEarningsBreakdown']='AstrologerUser/AstrologerEarningsBreakdown';
$route['List']='AstrologerUser/List';
$route['AstrologerMobileNumberAndOTPForm']='AstrologerUser/AstrologerMobileNumberAndOTPForm';
$route['AstrologerMonthlyEarningsBreakdown']='AstrologerUser/AstrologerMonthlyEarningsBreakdown';
$route['AstrologerReg']='AstrologerUser/AstrologerReg';
$route['AstrologerRecentRequest']='AstrologerUser/AstrologerRecentRequest';
$route['AstrogerRegistrationForm']='AstrologerUser/AstrogerRegistrationForm';
$route['AudioAndVideoCall']='AstrologerUser/AudioAndVideoCall';
$route['AstrologerProfileForm']='AstrologerUser/AstrologerProfileForm';
$route['AstrologerChatUI']='AstrologerUser/AstrologerChatUI';
$route['AstrologerAnalyticsandEarning1']='AstrologerUser/AstrologerAnalyticsandEarning1';
$route['AstrologyAndSpiritualServices']='AstrologerUser/AstrologyAndSpiritualServices';
$route['AstrologerTodaysSchedule']='AstrologerUser/AstrologerTodaysSchedule';
$route['AstrologerFeedBackCard']='AstrologerUser/AstrologerFeedBackCard';
$route['ConsultationCards']='AstrologerUser/ConsultationCards';




// routes for the astrologer controllger 
$route['astrologer/register']='Astrologer_api_controller/Register_post';
$route['astrologer/send_otp_login']='Astrologer_api_controller/Send_Otp_Login';
$route['astrologer/verify_otp_login']='Astrologer_api_controller/Verify_otp_Login';
$route['astrologer/resend_Otp_Login']='Astrologer_api_controller/Resend_Otp_Login';
$route['astrologer/set_online_offline_status'] = 'Astrologer_api_controller/SetAstrologerStatus';//set the online offline status of the astrologer
$route['astrologer/check_astrologer_status'] = 'Astrologer_api_controller/Check_online';//check the status of the astrologer is he online or offline

// routes for the HR Admin
$route['HRAdmin'] = 'HRAdminController/home';
$route['HRAdmin/login'] = 'Admin/login';
$route['HRAdmin/Astrolger']='HrAdminController/astrologer';
$route['HRAdmin/Pujari'] = 'HrAdminController/pujari';
$route['HRAdmin/Profile'] = 'HrAdminController/profile';
$route['HRAdmin/AstrologerRequest'] = 'HrAdminController/astrorequest';
$route['HRAdmin/PujariRequest'] = 'HrAdminController/pujarirequest';
$route['HRAdmin/ViewallAstrologers'] = 'HrAdminController/viewallAstrologers';
$route['HRAdmin/ViewallPujaris'] = 'HrAdminController/viewallPujari';
$route['HRAdmin/ViewAstrologerProfile'] = 'HrAdminController/viewastrologerprofile';
$route['HRAdmin/ViewpujariProfile'] = 'HrAdminController/viewpujariprofile';
$route['HRAdmin/Reinterviews'] = 'HrAdminController/reinterviews';




// routes for sales
$route['salesdashboard'] = 'Sales/Dashboard';
$route['allastrologer'] = 'Sales/AllAstrologer';
$route['viewastrologerprofile'] = 'Sales/ViewAstrologerProfile';
$route['allpoojaris'] = 'Sales/Allpoojaris';
$route['viewpoojariprofile'] = 'Sales/ViewPoojariProfile';
$route['products'] = 'Sales/Products';
$route['profile'] = 'Sales/Profile';
$route['orders'] = 'Sales/Orders';
$route['ordersdetails'] = 'Sales/OrdersDetails';


//routes for inverntory

$route['dashboard'] = 'Inventory/Dashboard';
$route['profile'] = 'Inventory/Profile';


//routes for finance
$route['financeastrologer'] = 'Finance/FinanceAstrologer';
$route['FinancePoojari'] = 'Finance/FinancePoojari';
$route['financeprofile'] = 'Finance/FinanceProfile';