<?php

namespace App\Controllers;

class Cleancode extends BaseController
{
    public function index()
    {

   

    }
    public function getcode($teste)
    {
        helper('siteconfig');
        $email = encrypt_decrypt('decrypt', $teste);
        $db = db_connect();
        $sql = "DELETE FROM hw_recover WHERE email = ?";
        $query = $db->query($sql, [$email]);


        $sql = "SELECT * FROM hw_users WHERE email = ?";
        $query = $db->query($sql, [$email]);
        $users = $query->getResult();
        
        $count = count($users);
            


    

        $user = $users[0];

        if($user->gender == 'o' OR $user->gender == 'a' )
        {
            $data['tranquilo'] = 'Fique tranquil'.$user->gender;
        }
        else
        {
            $data['$alertcontent2'] .= 'Não se preocupe';
        }

        $data['title'] = 'Código Invalidado com Sucesso';
        $data['content'] = view('pages/invalidcode', $data);
        echo view('templates/landing', $data);

    }


}
