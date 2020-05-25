<?php

namespace App\Controllers;

class Briefing extends BaseController
{
    public function index()
    { }
    public function user($bar1, $bar2)
    {
        $session = session();
        if (!$session->get('logged')) {
            return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
        } else {
            if ($bar1 == 'view') {
                if ($session->get('logged')->type < 2) {

                    $db = db_connect();
                    $dataquery = 'SELECT * FROM hw_users WHERE slug = ?';

                    $query = $db->query($dataquery, [$bar2]);
                    $wcont = count($query->getResult());
                    if ($wcont) {
                        $while = $query->getResult()[0];

                        if(!$while->briefing_replyed)
                        {
                            return redirect()->to(base_url('/Dashboard/'));
                            exit();
                        }
                        $data['query'] =  $while;


                        $data['title'] =  $data['query']->name;
                        $data['icon'] = 'briefcase';



                        $data['content'] = view('pages/dashboard/viewuserbrief', $data);

                        echo view('templates/dashboard', $data);
                    } else {
                        return redirect()->to(base_url('/Dashboard/'));
                        exit();
                    }
                } else {
                    return redirect()->to(base_url('/Dashboard/'));
                    exit();
                }
            }
        }
        if ($bar1 == 'reply') {
            if ($session->get('logged')->slug < $ba) {
                $db = db_connect();
                $dataquery = 'SELECT * FROM hw_users WHERE slug = ?';

                $query = $db->query($dataquery, [$bar2]);
                $wcont = count($query->getResult());
                if ($wcont) {
                    $while = $query->getResult()[0];
                } else {
                    return redirect()->to(base_url('/Dashboard/'));
                    exit();
                }
            }
        }
    }
    public function edit($bar1)
    {
        $session = session();
        if (!$session->get('logged')) {
            return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2) {



                $db = db_connect();
                $dataquery = 'SELECT * FROM hw_briefings WHERE slug = ?';

                $query = $db->query($dataquery, [$bar1]);

                $while = $query->getResult()[0];
                $bid = $while->id;



                $sql = 'SELECT * FROM hw_projects WHERE briefing = ?';
                $query2 = $db->query($sql, [$bid]);
                $while->cont = count($query2->getResult());

                if ($while->cont) {
                    return redirect()->to(base_url('/Dashboard/briefings/list'));
                    exit();
                }

                $data['query'] =  $while;


                $data['title'] = 'Editar Briefing';
                $data['icon'] = 'briefcase';

                $data['modals'] = view('items/newbriefmodal');


                $data['content'] = view('pages/dashboard/editbrief', $data);



                //  $data['content'] = '';
                echo view('templates/dashboard', $data);
            }
        }
    }


    public function copy($bar1)
    {
        $session = session();
        if (!$session->get('logged')) {
            return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2) {



                $db = db_connect();
                $dataquery = 'SELECT * FROM hw_briefings WHERE slug = ?';

                $query = $db->query($dataquery, [$bar1]);

                $while = $query->getResult()[0];
                $bid = $while->id;



                $data['query'] =  $while;


                $data['title'] = 'Novo Briefing';
                $data['icon'] = 'briefcase';

                $data['modals'] = view('items/newbriefmodal');


                $data['content'] = view('pages/dashboard/copybrief', $data);



                //  $data['content'] = '';
                echo view('templates/dashboard', $data);
            }
        }
    }



    public function new()
    {



        $session = session();

        if (!$session->get('logged')) {
            return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2) {


                $data = [];
                $data['title'] = 'Novo Briefing';
                $data['icon'] = 'briefcase';

                $data['query'] = [];

                $data['modals'] = view('items/newbriefmodal');


                $data['content'] = view('pages/dashboard/newbrief', $data);

                //  $data['content'] = '';
                echo view('templates/dashboard', $data);
            } else {
                return redirect()->to(base_url('/Dashboard'));
            }
        }
    }
}
