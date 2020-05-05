<?php
namespace App\Libraries;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;

class PHPMailerCI4
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        // Include PHPMailer library files
       // require_once APPPATH.'third_party/PHPMailer/src/Exception.php';
       // require_once APPPATH.'third_party/PHPMailer/src/PHPMailer.php';
       // require_once APPPATH.'third_party/PHPMailer/src/SMTP.php';
        
        $mail = new PHPMailer;
        return $mail;
    }
    
}