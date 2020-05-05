<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;

class GenerateCode extends BaseController
{


    
    public function index()
    {

        $email = $_POST['email'];
        $code = rand(1000, 9999);
        $db = db_connect();

        $sql = "SELECT * FROM hw_users WHERE email = ?";
        $query = $db->query($sql, [$email]);
        $count = count($query->getResult());


      


        $user = $query->getResult();


        if ($count) {

            $sql = "DELETE FROM hw_recover WHERE email = ?";
            $query = $db->query($sql, [$email]);

            $sql = "INSERT INTO hw_recover (
            email,
            digits
         )
         VALUES
         (
            ?,
            ?
         )";
            $query = $db->query($sql, [$email, $code]);



            $sql = "SELECT * FROM hw_users WHERE email = ?";
            $query = $db->query($sql, [$email]);
            $users = $query->getResult();
            
            $count = count($users);
                
    
    
            $user = $users[0];
        



          
            

            helper('email');



            $codeboker = str_split($code);


            $newcode = '';



            foreach ($codeboker as $value) {
                $newcode .= '<span style="display: inline-block; margin: 0 15px;">' . $value . '</span>';
            }



            $nome = explode(' ', $user->name)[0];
            
            $emailcontainer = '<p>Olá, <b>' . $nome   . '</b></p>';
            $emailcontainer .= '<p>Foi solicitada uma recuperação de senha da sua conta no <b>GIC</b></p>';
            $emailcontainer .= '<p>Segue abaixo o código para a recuperação da senha:</p>';
            $emailcontainer .= alertemail('secondary', '<h1 style="text-align: center; padding:30px 0; margin:0;">' . $newcode . '</h1>');

            $emailcontainer .= '<p>';
           
   
            $emailcontainer .= btnemail('warning', base_url('forgot'), "Recuperar a senha") . '<br>';
       
            $emailcontainer .= '</p>';


            $alertcontent = '<h3 style="margin:0; padding: 0; margin-bottom: 15px;">Lembre-se</h3>';
            $alertcontent .= 'Não informe esse código a ninguém!';

            $emailcontainer .= alertemail('', $alertcontent);


            $alertcontent2 = 'Caso não tenha solicitado essa recuperação de senha, ';
            if($user->gender == 'o' OR $user->gender == 'a' )
            {
                $alertcontent2 .= 'fique tranquil'.$user->gender;
            }
            else
            {
                $alertcontent2 .= 'não se preocupe';
            }

            helper('siteconfig');
            $encemail = encrypt_decrypt('encrypt', $user->email);

            $alertcontent2 .= '. Sua conta está segura. Clique <b><a style="color: inherit;" href="'.base_url('Cleancode/getcode/'.$encemail).'" target="_blank">aqui</a></b> para invalidar esse código!<br>';

            


            $emailcontainer .= alertemail('warning', $alertcontent2);





            $data['content'] = $emailcontainer;

            $emailcontent = view('templates/email', $data);

            

       


    

            require_once APPPATH . 'ThirdParty/PHPMailer/src/Exception.php';
            require_once APPPATH . 'ThirdParty/PHPMailer/src/PHPMailer.php';
            require_once APPPATH . 'ThirdParty/PHPMailer/src/SMTP.php';


            $mailer = new PHPmailer();
            helper('siteconfig');


            $mailer = smtpserver($mailer);

           

            $mailer->AddAddress($email, '');
            $mailer->Subject = html_entity_decode('Código de Segurança para recuperação de senha');
            $mailer->AltBody    = "To view the message, please use an HTML compatible email viewer!";
            
            $mailer->SMTPDebug = SMTP::DEBUG_SERVER;
//$mailer->SMTPDebug = 2;
           // $mailer->MsgHTML(html_entity_decode($emailcontent));
            $mailer->Body = html_entity_decode($emailcontent);

              if (!$mailer->Send()) {
                echo 0;
                echo "Mailer Error: " . $mailer->ErrorInfo; exit;
            } else {
                echo 1;
            }  
        }
    }
}
