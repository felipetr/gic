<?php

namespace App\Controllers;

class Save extends BaseController
{
    public function newuser()
    {
        $data = $_POST;

        $newpass =  $data['newpass'];
        $newpass2 =  $data['newpass2'];

        $newpassval = $newpass;


        $newpassval = $newpass;
        $validacao = '';
        $status = 'success';
        if (!preg_match('/[a-z]/', $newpassval)) {
            $status = 'warning';
            $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra min&uacute;scula</b>.</li>';
        }

        $newpassval = preg_replace('/[a-z]/', '', $newpassval);

        if (!preg_match('/[A-Z]/', $newpassval)) {
            $status = 'warning';
            $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra mai&uacute;scula</b>.</li>';
        }
        $newpassval = preg_replace('/[A-Z]/', '', $newpassval);

        if (!preg_match('/[0-9]/', $newpassval)) {
            $status = 'warning';
            $validacao .= '<li>A senha precisa ter, ao menos, um <b>n&uacute;mero</b>.</li>';
        }
        $newpassval = preg_replace('/[0-9]/', '', $newpassval);


        if (!preg_match('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $newpassval)) {
            $status = 'warning';
            $validacao .= '<li>A senha deve ter ao menos um desses caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
        }


        $newpassval = preg_replace('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', '', $newpassval);


        if ($newpassval) {
            $status = 'warning';
            $validacao .=  '<li>A senha deve ter apenas <b>letras</b>, <b>n&uacute;meros</b> e caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
        }


        if (strlen($newpass) < 8) {
            $status = 'warning';
            $validacao .= '<li>A senha precisa ter, ao menos, 8 d&iacute;gitos.</li>';
        }

        if (strlen($newpass) > 20) {
            $status = 'warning';
            $validacao .= '<li>A senha precisa ter, no m&aacute;ximo, 20 d&iacute;gitos.</li>';
        }

        if ($newpass != $newpass2) {
            $status = 'warning';
            $validacao .= '<li>As senhas n&atilde;o coincidem.</li>';
        }


        $email = $data['email'];
        $db = db_connect();
        $sql = "SELECT * FROM hw_users WHERE email = ?";
        $query = $db->query($sql, [$email]);
        $count = count($query->getResult());

        if ($count) {
            $status = 'warning';
            $validacao .= '<li>Email já sendo usado por outro usuário!</li>';
        }


        $cpf = $data['cpf'];
        $db = db_connect();
        $sql = "SELECT * FROM hw_users WHERE cpf = ?";
        $query = $db->query($sql, [$cpf]);
        $count = count($query->getResult());

        if ($count) {
            $status = 'warning';
            $validacao .= '<li>CPF/CNPJ já sendo usado por outro usuário!</li>';
        }
        helper('siteconfig');
     


        if (!$data['banco']) {
            $data['banco'] = $data['bancopress'];
        }

        if ($status != 'warning') {
           

            $data['slug'] = hw_slug($data['name']);


            $sql = "SELECT * FROM hw_users WHERE slug = ?";
            $query = $db->query($sql, [$data['slug']]);
            $count = count($query->getResult());

            if ($count) {
                $data['slug'] =    $data['slug'] . $count;
            }


            $total = 1;
            for ($i = 0; $i < 1; $i) {

                $sql = "SELECT * FROM hw_users WHERE slug = ?";
                $query = $db->query($sql, [$data['slug']]);
                $count = count($query->getResult());

                if ($count) {
                    $data['slug'] =    $data['slug'] . '-' . $total;
                    $i = 0;
                } else {
                    $i = 1;
                }

                $total++;
            }



            $newpass = $data['newpass'];
            $newpass = md5($newpass);
       
            $newpass  = encrypt_decrypt('encrypt', $newpass);

            $data['newpass'] =     $newpass;

            if ($status != 'warning') {

                $sql = "INSERT INTO hw_users (
                login,
                pass,
                email,
                name,
                type,
                slug,
                gender,
                workarea,
                uf,
                phone,
                whatsapp,
                google_account,
                mobile,
                address,
                folio,
                cpf,
                banco,
                tipoconta,
                agencia,
                agd,
                conta,
                contad,
                cv,
                nascimento,
                created_at
             )
             VALUES
             (
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                NOW()
             )";

                $db = db_connect();

                $query = $db->query($sql, [
                    $data['email'],
                    $data['newpass'],
                    $data['email'],
                    $data['name'],
                    $data['type'],
                    $data['slug'],
                    $data['gender'],
                    $data['workarea'],
                    $data['state'],
                    $data['comercial'],
                    $data['whatsapp'],
                    $data['google_account'],
                    $data['mobile'],
                    $data['address'],
                    $data['portfolio'],
                    $data['cpf'],
                    $data['banco'],
                    $data['tipoconta'],
                    $data['ag'],
                    $data['agd'],
                    $data['conta'],
                    $data['contad'],
                    $data['cv'],
                    $data['nascimento']
                ]);
            }

            $resp = [];
            if($query)
            {
            $resp['status'] = 'success';
            $resp['validacao'] = false;
            
            if($data['saveandclose'])
            {  
                $typeofuser = 'professionals';
                if($data['type'] == 3)
                {
                    $typeofuser = 'costumers';
                }
                if($data['type'] == 2)
                {
                    $typeofuser = 'controllers';
                }
                if($data['type'] == 1)
                {
                    $typeofuser = 'admins';
                }

                $resp['validacao'] = base_url('/Dashboard').'/'.$typeofuser.'/list';

                header('Content-Type: application/json');
                echo json_encode($resp);
            }
            }else
            {
                $resp['status'] = 'error';
                $resp['validacao'] = 'db';

                header('Content-Type: application/json');
                echo json_encode($resp);
            }
        } else {
            $resp = [];
            $resp['status'] = $status;
            $resp['validacao'] = '<ul class="p-0 m-0 pl-3">'.$validacao.'</ul>';
            header('Content-Type: application/json');
            echo json_encode($resp);
        }
    }
}
