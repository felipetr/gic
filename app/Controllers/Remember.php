<?php

namespace App\Controllers;

class Remember extends BaseController
{
    public function index()
    {

        $session = session();


        if (!$session->get('logged')) {
            return redirect()->to(base_url().'?redirect='.$_SERVER['REQUEST_URI']);
        } else {

            $data['logged'] = $session->get('logged');


            $data['title'] = 'Continuar como ' . $data['logged']->name;

            $data['content'] = view('pages/remember', $data);
            echo view('templates/landing', $data);
        }
    }
}
