<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['order_email'] = [
    'protocol'    => 'smtp',
    'smtp_host'   => 'smtp.gmail.com',
    'smtp_port'   => 587,
    'smtp_user'   => 'riteshshingote23@gmail.com',
    'smtp_pass'   => 'your_gmail_app_password', // App Password
    'charset'     => 'utf-8',
    'mailtype'    => 'html',
    'smtp_crypto' => 'tls',
    'wordwrap'    => TRUE,
    'newline'     => "\r\n"
];
?>