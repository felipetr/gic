<?php

namespace App\Controllers;

class Project extends BaseController
{
    public function new()
    {
        $data['title'] = 'Projetos';
        $data['content'] = "Página de novo projeto";
        echo view('templates/error', $data);

    }


    public function edit($var)
    {
        $data['title'] = 'Projetos';
        $data['content'] = "Página do projeto ".$var;
        echo view('templates/error', $data);

    }

    
}
