<?php

namespace App\Controllers;

class Forgot extends BaseController
{
    public function index()
    {
        
        $data['title'] = 'Recuperação de Senha';
        $data['content'] = view('pages/forgot', $data);
        echo view('templates/landing', $data);

    }
}

