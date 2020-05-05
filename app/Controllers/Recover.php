<?php

namespace App\Controllers;

class Recover extends BaseController
{
    public function index()
    {
        $session = session();
        //$session->recovermail = '1';

        if (!$session->get('recovermail')) {
            return redirect()->to(base_url());
        } else {

            $data['title'] = 'Recuperação de Senha';
            $data['content'] = view('pages/recover', $data);
            echo view('templates/landing', $data);

        }
    }


}
