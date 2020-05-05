<?php

namespace App\Controllers;

class Error404 extends BaseController
{
    public function index()
    {
        $data['title'] = '404';
        $data['content'] = "Página não encontrada";
        echo view('templates/error', $data);

    }

    
}
