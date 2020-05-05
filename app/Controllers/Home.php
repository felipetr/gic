<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
       
        $data['title'] = '';
        $data['content'] = view('pages/landing', $data);
        echo view('templates/landing', $data);

    }
}
