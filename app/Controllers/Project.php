<?php

namespace App\Controllers;

class Project extends BaseController
{
    public function edit($bar1)
    {
        $session = session();
        if (!$session->get('logged')) {
            return redirect()->to(base_url().'?redirect='.$_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2) {

             
                
                $db = db_connect();
                $dataquery = 'SELECT * FROM hw_projects WHERE slug = ?';
                
                $query = $db->query($dataquery, [$bar1]);
                
                $while = $query->getResult()[0];
                
                
                $db = db_connect();
                $dataqueryu = 'SELECT * FROM hw_users WHERE type = ? ORDER BY slug';
                
                $queryu = $db->query($dataqueryu, 3);
                
                $whileu = $queryu->getResult();
                $data['costumers'] =   $whileu;
                

                $dataqueryb = 'SELECT * FROM hw_briefings ORDER BY created_at';
                
                $queryb = $db->query($dataqueryb);
                
                $whileb = $queryb->getResult();
                
                $data['briefings'] =   $whileb;
                


                $data['query'] =  $while;
             

                
            
                $data['title'] = 'Editar Projeto';
                $data['icon'] = 'book';

                $data['modals'] = view('items/newprojmodal');


                $data['content'] = view('pages/dashboard/editproject', $data);

                
               
                //  $data['content'] = '';
                echo view('templates/dashboard', $data);
            }
        }
    }

    public function view($bar1)
    {
        $session = session();
        if (!$session->get('logged')) {
            return redirect()->to(base_url().'?redirect='.$_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2) {

             
                
                $db = db_connect();
                $dataquery = 'SELECT * FROM hw_projects WHERE slug = ?';
                
                $query = $db->query($dataquery, [$bar1]);
                
                $while = $query->getResult()[0];
                $bid = $while->id;
                
                
                $db = db_connect();
                $dataqueryu = 'SELECT * FROM hw_users WHERE type = ? ORDER BY slug';
                
                $queryu = $db->query($dataqueryu, 3);
                
                $whileu = $queryu->getResult();
                $data['costumers'] =   $whileu;
         

                $dataqueryb = 'SELECT * FROM hw_briefings ORDER BY created_at';
                
                $queryb = $db->query($dataqueryb);
                
                $whileb = $queryb->getResult();
                
                $data['briefings'] =   $whileb;
                

                
                $data['query'] =  $while;
             
            
                $data['title'] = $while['name'];
                $data['icon'] = 'book';

                $data['modals'] = view('items/viewprojmodal');


                $data['content'] = view('pages/dashboard/viewproject', $data);

                
               
                //  $data['content'] = '';
                echo view('templates/dashboard', $data);
            }
        }
    }


    public function new()
    {



        $session = session();

        if (!$session->get('logged')) {
            return redirect()->to(base_url().'?redirect='.$_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2) {


                $data = [];
                $data['title'] = 'Novo Projeto';
                $data['icon'] = 'book';

                $data['query'] = [];
                $db = db_connect();
                $dataqueryu = 'SELECT * FROM hw_users WHERE type = ? ORDER BY slug';
                
                $queryu = $db->query($dataqueryu, '3');
                
                $whileu = $queryu->getResult();

                $data['costumers'] =   $whileu;



                $dataqueryu = 'SELECT * FROM hw_users WHERE type = ? ORDER BY slug';
                
                $queryu = $db->query($dataqueryu, '4');
                
                $whileu = $queryu->getResult();

                $data['professionals'] =   $whileu;


                
                $dataqueryu = 'SELECT * FROM hw_users WHERE type = ? ORDER BY slug';
                
                $queryu = $db->query($dataqueryu, '2');
                
                $whileu = $queryu->getResult();

                $data['controllers'] =   $whileu;


                $dataqueryb = 'SELECT * FROM hw_briefings ORDER BY created_at';
                
                $queryb = $db->query($dataqueryb);
                
                $whileb = $queryb->getResult();
                
                $data['briefings'] =   $whileb;


                $dataqueryw = 'SELECT * FROM hw_workarea_professionals ORDER BY slug';
                
                $queryw = $db->query($dataqueryw);
                
                $whilew = $queryw->getResult();
                
                $data['workareas'] =   $whilew;

                $workareasnew = [];

                foreach ($whilew as &$workarea) {
                    $slug = $workarea->slug;
                    $name = $workarea->name;
                    $workareasnew[$slug] = $name;
                }

                $data['workareasarr'] =   $workareasnew;
                
                $data['modals'] = view('items/newprojmodal');


                $data['content'] = view('pages/dashboard/newproject', $data);

                
           
                echo view('templates/dashboard', $data);
            } else {
                return redirect()->to(base_url('/Dashboard'));
            }
        }
    }


   

    
}
