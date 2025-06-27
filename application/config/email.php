
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_user' => 'ganeshgodse1902@gmail.com',
    'smtp_pass' => 'mbre meek ymyt eagl', // Use App Password if 2FA is enabled
    'smtp_port' => 587,
    'smtp_crypto' => 'tls',
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'wordwrap'  => TRUE,
    'newline'   => "\r\n", // Required for proper email sending
);
