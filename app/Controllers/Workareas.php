<?php

namespace App\Controllers;

class Workareas extends BaseController
{
    public function index()
    { }

    public function professionals($do)
    {

     

        $session = session();

        if (!$session->get('logged')) {
            return redirect()->to(base_url().'?redirect='.$_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2  && $do == 'list') {
                
                $sql = "SELECT * FROM hw_workarea_professionals ORDER BY sort";
                $data = [];
                $data['title'] = 'Áreas de Atuação <small> | Profissionais</small>';
                $data['typeofuser'] = 'professionals';
                $data['type'] = '4';
                $data['icon'] = 'user-alt';
                $db = db_connect();
                $query = $db->query($sql);




                $while = $query->getResult();





                foreach ($while as $key => $result) {
                    $slug = $result->slug;
                    $sql2 = "SELECT * FROM hw_users WHERE workarea = ?";

                    $querys = $db->query($sql2, [$slug]);

                    $count = count($querys->getResult());

                    $while[$key]->contagem = $count;
                }

                $data['query'] = $while;

                $data['modals'] = view('items/workareasmodals');

                $data['content'] = view('pages/dashboard/workareas', $data);
                echo view('templates/dashboard', $data);
            } else {
                return redirect()->to(base_url('/Dashboard'));
            }
        }
    }



    public function costumers($do)
    {

     

        $session = session();

        if (!$session->get('logged')) {
            return redirect()->to(base_url().'?redirect='.$_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2  && $do == 'list') {
                
                $sql = "SELECT * FROM hw_workarea_costumers ORDER BY sort";
                $data = [];
                $data['title'] = 'Áreas de Atuação <small> | Clientes</small>';
                $data['typeofuser'] = 'costumers';
                $data['type'] = '3';
                $data['icon'] = 'store';
                $db = db_connect();
                $query = $db->query($sql);




                $while = $query->getResult();





                foreach ($while as $key => $result) {
                    $slug = $result->slug;
                    $sql2 = "SELECT * FROM hw_users WHERE workarea = ?";

                    $querys = $db->query($sql2, [$slug]);

                    $count = count($querys->getResult());

                    $while[$key]->contagem = $count;
                }

                $data['query'] = $while;

                $data['modals'] = view('items/workareasmodals');

                $data['content'] = view('pages/dashboard/workareas', $data);
                echo view('templates/dashboard', $data);
            } else {
                return redirect()->to(base_url('/Dashboard'));
            }
        }
    }

}
