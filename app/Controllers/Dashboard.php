<?php

namespace App\Controllers;



class Dashboard extends BaseController
{


  public function briefings($bar1)
  {
    $session = session();
    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      if ($bar1 == 'list' && $session->get('logged')->type < 2) {
        $data['logged'] = $session->get('logged');

        $filters = array();
        $filtersvar = array();



        if ($_POST['search']) {
          $data['search'] = $_POST['search'];

          $search = strtolower($data['search']);


          array_push($filters, '(LOWER(name) LIKE ? OR LOWER(questions) LIKE ?)');
          array_push($filtersvar, '%' . $search . '%');
          array_push($filtersvar, '%' . $search . '%');
        }


        if ($filters) {
          $filtroquery = ' WHERE ' . implode(' AND ', $filters);
        }



        $db = db_connect();
        $dataquery = 'SELECT * FROM hw_briefings ' . $filtroquery . ' ORDER BY created_at;';















        $query = $db->query($dataquery, $filtersvar);
        $data['query'] = $query->getResult();

        $data['filtroquery'] =  $dataquery;

        $while = $query->getResult();


        foreach ($while as $key => $result) {

          $bid = $result->id;
          $db = db_connect();
          $sql = 'SELECT * FROM hw_projects WHERE briefing = ?';
          $query2 = $db->query($sql, [$bid]);
          $while[$key]->cont = count($query2->getResult());
        }


        $data['query'] = $while;


        $data['title'] = 'Briefings';
        $data['icon'] = 'briefcase';
        $data['modals'] = view('items/briefingsmodals');

        $data['content'] = view('pages/dashboard/briefings', $data);
        echo view('templates/dashboard', $data);
      }
    }
  }
  public function encrypter()
  {
    $text = md5($_POST['pass']);
    helper('siteconfig');
    $text  = encrypt_decrypt('encrypt', $text);
    echo    $_POST['pass'];
  }
  public function savenewpass()
  {
    $newpass =  $_POST['newpass'];
    $newpass2 =  $_POST['newpass2'];

    $newpassval = $newpass;


    $newpassval = $newpass;
    $validacao = '';
    $status = 'success';
    if (!preg_match('/[a-z]/', $newpassval)) {
      $status = 'warning';
      $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra min&uacute;scula</b>.</li>';
    }

    $newpassval = preg_replace('/[a-z]/', '', $newpassval);

    if (!preg_match('/[A-Z]/', $newpassval)) {
      $status = 'warning';
      $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra mai&uacute;scula</b>.</li>';
    }
    $newpassval = preg_replace('/[A-Z]/', '', $newpassval);

    if (!preg_match('/[0-9]/', $newpassval)) {
      $status = 'warning';
      $validacao .= '<li>A senha precisa ter, ao menos, um <b>n&uacute;mero</b>.</li>';
    }
    $newpassval = preg_replace('/[0-9]/', '', $newpassval);


    if (!preg_match('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $newpassval)) {
      $status = 'warning';
      $validacao .= '<li>A senha deve ter ao menos um desses caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
    }


    $newpassval = preg_replace('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', '', $newpassval);


    if ($newpassval) {
      $status = 'warning';
      $validacao .=  '<li>A senha deve ter apenas <b>letras</b>, <b>n&uacute;meros</b> e caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
    }


    if (strlen($newpass) < 8) {
      $status = 'warning';
      $validacao .= '<li>A senha precisa ter, ao menos, 8 d&iacute;gitos.</li>';
    }

    if (strlen($newpass) > 20) {
      $status = 'warning';
      $validacao .= '<li>A senha precisa ter, no m&aacute;ximo, 20 d&iacute;gitos.</li>';
    }

    if ($newpass != $newpass2) {
      $status = 'warning';
      $validacao .= '<li>As senhas n&atilde;o coincidem.</li>';
    }

    $session = session();
    $recovermail = $session->get('recovermail');



    helper('siteconfig');

    $email  = encrypt_decrypt('decrypt', $recovermail);
    $db = db_connect();
    $sql = "SELECT * FROM hw_users WHERE email = ?";
    $query = $db->query($sql, [$email]);
    $count = count($query->getResult());

    if ($count) {
      $while = $query->getResult();


      $newpass = md5($newpass);
      helper('siteconfig');
      $newpass  = encrypt_decrypt('encrypt', $newpass);


      foreach ($while as $key => $result) {
        $pass = $result->pass;
        if ($pass == $newpass) {
          $status = 'warning';
          $validacao .= '<li>A senha n&atilde;o pode ser igual &agrave; anterior.</li>';
        }
      }
    } else {

      $status = 'warning';
      $validacao .= '<li>Usu&aacute;rio ' . $email . ' n&atilde;o encontrado.</li>';
    }

    if (!$validacao) {
      $db = db_connect();
      $sql = "UPDATE hw_users SET pass = ? WHERE  email = ?";
      $query = $db->query($sql, [$newpass, $email]);
      $session->destroy();
    }
    $response = [];
    $response['status'] = $status;
    $response['validacao'] = html_entity_decode($validacao);

    header('Content-Type: application/json');
    echo json_encode($response);
  }


  public function changepass()
  {
    $session = session();
    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      if ($session->get('logged')->type < 5) {
        $newpass =  $_POST['newpass'];
        $newpass2 =  $_POST['newpass2'];

        $newpassval = $newpass;


        $newpassval = $newpass;
        $validacao = '';
        $status = 'success';
        if (!preg_match('/[a-z]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra min&uacute;scula</b>.</li>';
        }

        $newpassval = preg_replace('/[a-z]/', '', $newpassval);

        if (!preg_match('/[A-Z]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra mai&uacute;scula</b>.</li>';
        }
        $newpassval = preg_replace('/[A-Z]/', '', $newpassval);

        if (!preg_match('/[0-9]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, um <b>n&uacute;mero</b>.</li>';
        }
        $newpassval = preg_replace('/[0-9]/', '', $newpassval);


        if (!preg_match('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha deve ter ao menos um desses caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
        }


        $newpassval = preg_replace('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', '', $newpassval);


        if ($newpassval) {
          $status = 'warning';
          $validacao .=  '<li>A senha deve ter apenas <b>letras</b>, <b>n&uacute;meros</b> e caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
        }


        if (strlen($newpass) < 8) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, 8 d&iacute;gitos.</li>';
        }

        if (strlen($newpass) > 20) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, no m&aacute;ximo, 20 d&iacute;gitos.</li>';
        }

        if ($_POST['newpass'] != $_POST['newpass2']) {
          $status = 'warning';
          $validacao .= '<li>As senhas n&atilde;o coincidem.</li>';
        }

        $session = session();
        $id = $session->get('logged')->id;



        helper('siteconfig');


        $db = db_connect();
        $sql = "SELECT * FROM hw_users WHERE id = ?";
        $query = $db->query($sql, [$id]);
        $count = count($query->getResult());

        if ($count) {
          $while = $query->getResult();


          $newpass = md5($newpass);
          helper('siteconfig');
          $newpass  = encrypt_decrypt('encrypt', $newpass);


          foreach ($while as $key => $result) {
            $pass = $result->pass;
            if ($pass == $newpass) {
              $status = 'warning';
              $validacao .= '<li>A senha n&atilde;o pode ser igual &agrave; anterior.</li>';
            }
          }
        } else {

          $status = 'warning';
          $validacao .= '<li>Usu&aacute;rio n&atilde;o encontrado.</li>';
        }

        if (!$validacao) {
          $db = db_connect();
          $sql = "UPDATE hw_users SET pass = ? WHERE  id = ?";
          $query = $db->query($sql, [$newpass, $id]);
          $sql = "UPDATE hw_users SET updated_at = NOW() WHERE id = ?";
          $query = $db->query($sql, [$id]);
        }
        $response = [];
        $response['status'] = $status;
        $response['validacao'] = html_entity_decode($validacao);

        header('Content-Type: application/json');
        echo json_encode($response);
      }
    }
  }

  public function changepassuser()
  {
    $session = session();
    if (!$session->get('logged')) {

      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {

      if ($session->get('logged')->type < 2) {

        $newpass =  $_POST['newpass'];

        $newpass2 =  $_POST['newpass2'];




        $newpassval = $newpass;



        $newpassval = $newpass;
        $validacao = '';
        $status = 'success';

        if (!preg_match('/[a-z]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra min&uacute;scula</b>.</li>';
        }

        $newpassval = preg_replace('/[a-z]/', '', $newpassval);

        if (!preg_match('/[A-Z]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra mai&uacute;scula</b>.</li>';
        }
        $newpassval = preg_replace('/[A-Z]/', '', $newpassval);

        if (!preg_match('/[0-9]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, um <b>n&uacute;mero</b>.</li>';
        }
        $newpassval = preg_replace('/[0-9]/', '', $newpassval);


        if (!preg_match('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $newpassval)) {
          $status = 'warning';
          $validacao .= '<li>A senha deve ter ao menos um desses caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
        }


        $newpassval = preg_replace('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', '', $newpassval);


        if ($newpassval) {
          $status = 'warning';
          $validacao .=  '<li>A senha deve ter apenas <b>letras</b>, <b>n&uacute;meros</b> e caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
        }


        if (strlen($newpass) < 8) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, ao menos, 8 d&iacute;gitos.</li>';
        }

        if (strlen($newpass) > 20) {
          $status = 'warning';
          $validacao .= '<li>A senha precisa ter, no m&aacute;ximo, 20 d&iacute;gitos.</li>';
        }

        if ($_POST['newpass'] != $_POST['newpass2']) {
          $status = 'warning';

          $validacao .= '<li>As senhas n&atilde;o coincidem.</li>';
          $validacao .= '<li>' . $_POST['newpass'] . '</li>';
          $validacao .= '<li>' . $_POST['newpass2'] . '</li>';
        }

        $session = session();
        $id = $_POST['iduser'];



        helper('siteconfig');


        $db = db_connect();
        $sql = "SELECT * FROM hw_users WHERE id = ?";
        $query = $db->query($sql, [$id]);
        $count = count($query->getResult());

        if ($count) {
          $while = $query->getResult();


          $newpass = md5($newpass);
          helper('siteconfig');
          $newpass  = encrypt_decrypt('encrypt', $newpass);


          foreach ($while as $key => $result) {
            $pass = $result->pass;
            if ($pass == $newpass) {
              $status = 'warning';
              $validacao .= '<li>A senha n&atilde;o pode ser igual &agrave; anterior.</li>';
            }
          }
        } else {

          $status = 'warning';
          $validacao .= '<li>Usu&aacute;rio n&atilde;o encontrado.</li>';
        }

        if (!$validacao) {
          $db = db_connect();
          $sql = "UPDATE hw_users SET pass = ? WHERE  id = ?";
          $query = $db->query($sql, [$newpass, $id]);
          $sql = "UPDATE hw_users SET updated_at = NOW() WHERE id = ?";
          $query = $db->query($sql, [$id]);
        }
        $response = [];
        $response['status'] = $status;
        $response['validacao'] = html_entity_decode($validacao);

        header('Content-Type: application/json');
        echo json_encode($response);
      }
    }
  }


  public function savenewpassuser()
  {
    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      $newpass =  $_POST['newpass'];
      $newpass2 =  $_POST['newpass2'];

      $newpassval = $newpass;


      $newpassval = $newpass;
      $validacao = '';
      $status = 'success';
      if (!preg_match('/[a-z]/', $newpassval)) {
        $status = 'warning';
        $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra min&uacute;scula</b>.</li>';
      }

      $newpassval = preg_replace('/[a-z]/', '', $newpassval);

      if (!preg_match('/[A-Z]/', $newpassval)) {
        $status = 'warning';
        $validacao .= '<li>A senha precisa ter, ao menos, uma <b>letra mai&uacute;scula</b>.</li>';
      }
      $newpassval = preg_replace('/[A-Z]/', '', $newpassval);

      if (!preg_match('/[0-9]/', $newpassval)) {
        $status = 'warning';
        $validacao .= '<li>A senha precisa ter, ao menos, um <b>n&uacute;mero</b>.</li>';
      }
      $newpassval = preg_replace('/[0-9]/', '', $newpassval);


      if (!preg_match('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', $newpassval)) {
        $status = 'warning';
        $validacao .= '<li>A senha deve ter ao menos um desses caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
      }


      $newpassval = preg_replace('/[-!@$%^&*()_+|~=`{}\[\]:";\'<>?,.\/]/', '', $newpassval);


      if ($newpassval) {
        $status = 'warning';
        $validacao .=  '<li>A senha deve ter apenas <b>letras</b>, <b>n&uacute;meros</b> e caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
      }


      if (strlen($newpass) < 8) {
        $status = 'warning';
        $validacao .= '<li>A senha precisa ter, ao menos, 8 d&iacute;gitos.</li>';
      }

      if (strlen($newpass) > 20) {
        $status = 'warning';
        $validacao .= '<li>A senha precisa ter, no m&aacute;ximo, 20 d&iacute;gitos.</li>';
      }

      if ($newpass != $newpass2) {
        $status = 'warning';
        $validacao .= '<li>As senhas n&atilde;o coincidem.</li>';
      }






      helper('siteconfig');

      $email  = $_POST['email'];
      $db = db_connect();
      $sql = "SELECT * FROM hw_users WHERE email = ?";
      $query = $db->query($sql, [$email]);
      $count = count($query->getResult());

      if ($count) {
        $while = $query->getResult();


        $newpass = md5($newpass);
        helper('siteconfig');
        $newpass  = encrypt_decrypt('encrypt', $newpass);


        foreach ($while as $key => $result) {
          $pass = $result->pass;
          if ($pass == $newpass) {
            $status = 'warning';
            $validacao .= '<li>A senha n&atilde;o pode ser igual &agrave; anterior.</li>';
          }
        }
      } else {

        $status = 'warning';
        $validacao .= '<li>Usu&aacute;rio ' . $email . ' n&atilde;o encontrado.</li>';
      }

      if (!$validacao) {
        $db = db_connect();
        $sql = "UPDATE hw_users SET pass = ? WHERE  email = ?";
        $query = $db->query($sql, [$newpass, $email]);
        $sql = "UPDATE hw_users SET updated_at = NOW() WHERE email = ?";
        $query = $db->query($sql, [$email]);

        $session->destroy();
      }
      $response = [];
      $response['status'] = $status;
      $response['validacao'] = html_entity_decode($validacao);

      header('Content-Type: application/json');
      echo json_encode($response);
    }
  }

  public function index()
  {

    $session = session();


    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {


      $db = db_connect();

      if ($session->get('logged')->type < 2) {
        $sql = "SELECT * FROM hw_users WHERE type = ? AND status = 0";
        $query = $db->query($sql, 4);
        $cardcounter['profisionaisna'] = 0;
        if ($query) {
          $cardcounter['profisionaisna'] = count($query->getResult());
        }

        $sql = "SELECT * FROM hw_users WHERE type = ?";
        $query = $db->query($sql, 3);
        $cardcounter['clientes'] = 0;
        if ($query) {
          $cardcounter['clientes'] = count($query->getResult());
        }

        $sql = "SELECT * FROM hw_users WHERE type = ?";
        $query = $db->query($sql, 1);
        $cardcounter['admin'] = 0;
        if ($query) {
          $cardcounter['admin'] = count($query->getResult());
        }

        $sql = "SELECT * FROM hw_briefings";
        $query = $db->query($sql);
        $cardcounter['briefings'] = 0;
        if ($query) {
          $cardcounter['briefings'] = count($query->getResult());
        }

        $sql = "SELECT * FROM hw_users WHERE type = ?";
        $query = $db->query($sql, 2);
        $cardcounter['auditores'] = 0;
        if ($query) {
          $cardcounter['auditores'] = count($query->getResult());
        }
        $sql = "SELECT * FROM hw_users WHERE type = ?";
        $query = $db->query($sql, 4);
        $cardcounter['profisionais'] = 0;
        if ($query) {
          $cardcounter['profisionais'] = count($query->getResult());
        }

        $sql = "SELECT * FROM hw_projects";
        $query = $db->query($sql);
        $cardcounter['projetos'] = 0;
        if ($query) {
          $cardcounter['projetos'] = count($query->getResult());
        }

        $sql = "SELECT * FROM hw_briefings";
        $query = $db->query($sql, 4);
        $cardcounter['briefings'] = 0;
        if ($query) {
          $cardcounter['briefings'] = count($query->getResult());
        }
      }


      $data['cardcounter'] = $cardcounter;

      $data['logged'] = $session->get('logged');
      $data['content'] = view('pages/dashboard/home', $data);

      echo view('templates/dashboard', $data);
    }
  }
  public function showuser()
  {
    $session = session();


    if (!$session->get('logged')) { } else {

      if ($session->get('logged')->type < 2) {
        $iduser = $_POST['iduser'];

        $db = db_connect();
        $type = $_POST['type'];
        if ($type == 'briefing') {
          $sql = "SELECT * FROM hw_briefings WHERE id = ?";
          $query = $db->query($sql, $iduser);
          if (count($query->getResult())) {

            $while = $query->getResult()[0];


            $projetos = [];




            $bid = $while->id;
            $db = db_connect();
            $sql = 'SELECT * FROM hw_projects WHERE briefing = ?';
            $query2 = $db->query($sql, [$bid]);
            $while->cont = count($query2->getResult());
            $while->projects = $query2->getResult();




            $data['brief'] = $while;
            try {
              echo view('items/showbrief', $data);
            } catch (Exception $e) {
              echo '<div class="alert alert-danger">';
              echo    '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
              echo '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao acessar os dados, por favor tente mais tarde!</b></small>';

              echo '</div>';
            }
          } else {
            echo '<div class="alert alert-danger">';
            echo    '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
            echo '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao acessar os dados, por favor tente mais tarde!</b></small>';

            echo '</div>';
          }
        } elseif ($type == 'user') {
          $sql = "SELECT * FROM hw_users WHERE id = ?";
          $query = $db->query($sql, $iduser);
          $count = count($query->getResult());

          $tablewa = 'hw_workarea_professionals';

          if ($count == 1) {
            $data['user'] = $query->getResult()[0];
            $data['typeuser'] = $data['user']->type;
            if ($data['typeuser'] == 3) {
              $tablewa = 'hw_workarea_costumers';
            }

            $sql2 = "SELECT * FROM " . $tablewa . " ORDER BY sort";

            $query2 = $db->query($sql2);
            $workarea = $query2->getResult();



            foreach ($workarea as $key => $result) {
              $slug = $result->slug;
              $name = $result->name;
              $workareaar[$slug] = $name;
            }
            $data['workarea'] =   $workareaar;

            echo view('items/showuser', $data);
          } else {
            echo '<div class="alert alert-danger">';
            echo    '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
            echo '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao acessar os dados, por favor tente mais tarde!</b></small>';

            echo '</div>';
          }
        }
      }
    }
  }

  public function profile()
  {




    $session = session();

    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      helper('getmessages');
      $data['messages'] = getmessages($session->get('logged')->type);
      $data['logged'] = $session->get('logged');
      $db = db_connect();





      $data['title'] = 'Meu Perfil';
      $data['icon'] = 'user';
      $data['content'] = view('pages/dashboard/profile', $data);

      echo view('templates/dashboard', $data);
    }
  }
  public function logout()
  {

    $session = session();
    $session->destroy();

    $redirect = '';
    if (isset($_GET['redirect'])) {
      $redirect = $_GET['redirect'];
    }

    echo '<script>
    localStorage.setItem("email", "");
    localStorage.setItem("pass", "");
    setTimeout(function () {
      window.location.href = "' . base_url() . $redirect . '";
    }, 300);

    </script>';
  }
  public function validatelogin()
  {
    $session = session();
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $rememberme = $_POST['rememberme'];
    $pass = md5($pass);
    helper('siteconfig');
    $pass  = encrypt_decrypt('encrypt', $pass);



    $db = db_connect();
    $sql = "SELECT * FROM hw_users WHERE email = ?";
    $query = $db->query($sql, $email);
    $count = count($query->getResult());


    $problem = '';

    if ($query) {

      $count = count($query->getResult());


      if ($count == 1) {
        $while = $query->getResult();


        foreach ($while as $key => $result) {



          if ($result->pass != $pass) {
            $problem .= 'validation';
          } else {
            $session->logged = $result;
          }
        }
      } else {
        $problem = 'validation';
      }
    } else {
      $problem = 'connect';
    }
    $db->close();

    $response = [];


    if ($problem) {

      $response['content'] = $problem;
      $response['type'] = 'danger';
    } else {
      $response['content'] = 'success';
      $response['type'] = 'success';
    }


    header('Content-Type: application/json');
    echo json_encode($response);
  }



  public function validatecode()
  {
    $session = session();
    $email = $_POST['email'];
    $code = $_POST['code'];
    $code = str_replace(' ', '', $code);
    $rememberme = $_POST['rememberme'];



    $db = db_connect();

    $sql = "SELECT * FROM hw_recover WHERE email = ? AND digits = ? AND created_at BETWEEN DATE_SUB(NOW(), INTERVAL 15 MINUTE) AND NOW()";

    $query = $db->query($sql, [$email, $code]);
    $count = count($query->getResult());


    $problem = '';

    if ($query) {

      $count = count($query->getResult());

      if ($count == 1) { } else {
        $problem = 'validation';
      }
    } else {
      $problem = 'connect';
    }


    $response = [];


    if ($problem) {

      $response['content'] = 'validation';
      $response['type'] = 'danger';
    } else {
      $response['content'] = 'success';
      $response['type'] = 'success';

      $session = session();



      helper('siteconfig');
      $encmail  = encrypt_decrypt('encrypt', $email);
      $session->recovermail = $encmail;
    }


    header('Content-Type: application/json');
    echo json_encode($response);
  }
  public function costumers($bar1)
  {
    $session = session();


    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      if ($bar1 == 'list') {

        if ($session->get('logged')->type < 2) {


          $data['logged'] = $session->get('logged');


          $data['title'] = 'Clientes';
          $data['icon'] = 'store';
          $data['typeuser'] = 3;
          $data['typeslug'] = 'costumer';



          $db = db_connect();
          $sql = 'SELECT DISTINCT uf FROM hw_users WHERE type = ? ORDER BY uf;';
          $query = $db->query($sql, $data['typeuser']);
          $data['uf'] = $query->getResult();

          $filters = array();
          $filtersvar = array();
          array_push($filtersvar, $data['typeuser']);
          $filtroquery = '';



          $data['search'] = '';
          $data['filter_gender'] = array();
          $data['filter_uf'] = array();

          if ($_POST['search']) {
            $data['search'] = $_POST['search'];

            $search = strtolower($data['search']);


            array_push($filters, '(LOWER(name) LIKE ? OR LOWER(email) LIKE ?)');
            array_push($filtersvar, '%' . $search . '%');
            array_push($filtersvar, '%' . $search . '%');
          }
          if ($_POST['uf']) {
            $data['filter_uf'] = $_POST['uf'];
            $postuf = $_POST['uf'];

            if (is_array($postuf)) {
              $filtersuf = array();

              foreach ($postuf as &$value) {
                array_push($filtersuf, 'uf = ?');
                array_push($filtersvar, $value);
              }

              $filtersuf = implode(' OR ', $filtersuf);

              array_push($filters, '(' . $filtersuf . ')');
            } else {

              array_push($filters, 'uf = ?');
              array_push($filtersvar, $postuf);
            }
          }



          if ($_POST['gender']) {
            $data['filter_gender'] = $_POST['gender'];
            $postgender = $_POST['gender'];

            if (is_array($postgender)) {
              $filtersgender = array();

              foreach ($postgender as &$value) {
                array_push($filtersgender, 'gender = ?');
                array_push($filtersvar, $value);
              }

              $filtersgender = implode(' OR ', $filtersgender);

              array_push($filters, '(' . $filtersgender . ')');
            } else {

              array_push($filters, 'gender = ?');
              array_push($filtersvar, $postuf);
            }
          }

          if ($_POST['workarea']) {
            $data['filter_workarea'] = $_POST['workarea'];
            $postworkarea = $_POST['workarea'];

            if (is_array($postworkarea)) {
              $filtersworkarea = array();

              foreach ($postworkarea as &$value) {
                array_push($filtersworkarea, 'workarea = ?');
                array_push($filtersvar, $value);
              }

              $filtersworkarea = implode(' OR ', $filtersworkarea);

              array_push($filters, '(' . $filtersworkarea . ')');
            } else {

              array_push($filters, 'workarea = ?');
              array_push($filtersvar, $postworkarea);
            }
          }

          if ($filters) {
            $filtroquery = ' AND ' . implode(' AND ', $filters);
          }



          $dataquery = 'SELECT * FROM hw_users WHERE type = ? ' . $filtroquery . ' ORDER BY slug;';



          $query = $db->query($dataquery, $filtersvar);
          $data['query'] = $query->getResult();
          $data['filtroquery'] =  $dataquery;



          $tablewa = 'hw_workarea_professionals';

          if ($data['typeuser'] == 3) {
            $tablewa = 'hw_workarea_costumers';
          }

          $sql = "SELECT * FROM " . $tablewa . " ORDER BY sort";
          $query = $db->query($sql);
          $data['workarea'] = $query->getResult();



          $data['modals'] = view('items/usersmodals');

          $data['content'] = view('pages/dashboard/users', $data);
          echo view('templates/dashboard', $data);
        } else {
          return redirect()->to(base_url('/Dashboard'));
        }
      }
    }
  }


  public function professionals($bar1)
  {
    $session = session();


    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      if ($bar1 == 'list') {

        if ($session->get('logged')->type < 2) {

          helper('getmessages');
          $data['messages'] = getmessages($session->get('logged')->type);
          $data['logged'] = $session->get('logged');


          $data['title'] = 'Profissionais';
          $data['icon'] = 'user-alt';
          $data['typeuser'] = 4;
          $data['typeslug'] = 'professional';


          $db = db_connect();
          $sql = 'SELECT DISTINCT uf FROM hw_users WHERE type = ? ORDER BY uf;';
          $query = $db->query($sql, $data['typeuser']);
          $data['uf'] = $query->getResult();

          $filters = array();
          $filtersvar = array();
          array_push($filtersvar, $data['typeuser']);
          $filtroquery = '';



          $data['search'] = '';
          $data['filter_gender'] = array();
          $data['filter_uf'] = array();

          if ($_POST['search']) {
            $data['search'] = $_POST['search'];

            $search = strtolower($data['search']);


            array_push($filters, '(LOWER(name) LIKE ? OR LOWER(email) LIKE ?)');
            array_push($filtersvar, '%' . $search . '%');
            array_push($filtersvar, '%' . $search . '%');
          }
          if ($_POST['uf']) {
            $data['filter_uf'] = $_POST['uf'];
            $postuf = $_POST['uf'];

            if (is_array($postuf)) {
              $filtersuf = array();

              foreach ($postuf as &$value) {
                array_push($filtersuf, 'uf = ?');
                array_push($filtersvar, $value);
              }

              $filtersuf = implode(' OR ', $filtersuf);

              array_push($filters, '(' . $filtersuf . ')');
            } else {

              array_push($filters, 'uf = ?');
              array_push($filtersvar, $postuf);
            }
          }



          if ($_POST['gender']) {
            $data['filter_gender'] = $_POST['gender'];
            $postgender = $_POST['gender'];

            if (is_array($postgender)) {
              $filtersgender = array();

              foreach ($postgender as &$value) {
                array_push($filtersgender, 'gender = ?');
                array_push($filtersvar, $value);
              }

              $filtersgender = implode(' OR ', $filtersgender);

              array_push($filters, '(' . $filtersgender . ')');
            } else {

              array_push($filters, 'gender = ?');
              array_push($filtersvar, $postuf);
            }
          }

          if ($_POST['workarea']) {
            $data['filter_workarea'] = $_POST['workarea'];
            $postworkarea = $_POST['workarea'];

            if (is_array($postworkarea)) {
              $filtersworkarea = array();

              foreach ($postworkarea as &$value) {
                array_push($filtersworkarea, 'workarea = ?');
                array_push($filtersvar, $value);
              }

              $filtersworkarea = implode(' OR ', $filtersworkarea);

              array_push($filters, '(' . $filtersworkarea . ')');
            } else {

              array_push($filters, 'workarea = ?');
              array_push($filtersvar, $postworkarea);
            }
          }
          if ($_POST['status']) {
            $data['filter_status'] = $_POST['status'];
            $poststatus = $_POST['status'];

            if (is_array($poststatus)) {
              $filtersstatus = array();

              foreach ($poststatus as &$value) {
                array_push($filtersstatus, 'status = ?');
                array_push($filtersvar, $value);
              }

              $filtersstatus = implode(' OR ', $filtersstatus);

              array_push($filters, '(' . $filtersstatus . ')');
            } else {

              array_push($filters, 'status = ?');
              array_push($filtersvar, $poststatus);
            }
          }
          if ($filters) {
            $filtroquery = ' AND ' . implode(' AND ', $filters);
          }





          $dataquery = 'SELECT * FROM hw_users WHERE type = ? ' . $filtroquery . ' ORDER BY slug;';



          $query = $db->query($dataquery, $filtersvar);
          $data['query'] = $query->getResult();
          $data['filtroquery'] =  $dataquery;



          $tablewa = 'hw_workarea_professionals';

          if ($data['typeuser'] == 3) {
            $tablewa = 'hw_workarea_costumers';
          }

          $sql = "SELECT * FROM " . $tablewa . " ORDER BY sort";
          $query = $db->query($sql);
          $data['workarea'] = $query->getResult();



          $data['modals'] = view('items/usersmodals');
          $data['content'] = view('pages/dashboard/users', $data);
          echo view('templates/dashboard', $data);
        } else {
          return redirect()->to(base_url('/Dashboard'));
        }
      }
    }
  }




  public function controllers($bar1)
  {
    $session = session();


    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      if ($bar1 == 'list') {

        if ($session->get('logged')->type < 2) {

          helper('getmessages');
          $data['messages'] = getmessages($session->get('logged')->type1);
          $data['logged'] = $session->get('logged');


          $data['title'] = 'Auditores';
          $data['icon'] = 'user-tie';
          $data['typeuser'] = 2;
          $data['typeslug'] = 'controller';


          $db = db_connect();
          $sql = 'SELECT DISTINCT uf FROM hw_users WHERE type = ? ORDER BY uf;';
          $query = $db->query($sql, $data['typeuser']);
          $data['uf'] = $query->getResult();

          $filters = array();
          $filtersvar = array();
          array_push($filtersvar, $data['typeuser']);
          $filtroquery = '';



          $data['search'] = '';
          $data['filter_gender'] = array();
          $data['filter_uf'] = array();

          if ($_POST['search']) {
            $data['search'] = $_POST['search'];

            $search = strtolower($data['search']);


            array_push($filters, '(LOWER(name) LIKE ? OR LOWER(email) LIKE ?)');
            array_push($filtersvar, '%' . $search . '%');
            array_push($filtersvar, '%' . $search . '%');
          }
          if ($_POST['uf']) {
            $data['filter_uf'] = $_POST['uf'];
            $postuf = $_POST['uf'];

            if (is_array($postuf)) {
              $filtersuf = array();

              foreach ($postuf as &$value) {
                array_push($filtersuf, 'uf = ?');
                array_push($filtersvar, $value);
              }

              $filtersuf = implode(' OR ', $filtersuf);

              array_push($filters, '(' . $filtersuf . ')');
            } else {

              array_push($filters, 'uf = ?');
              array_push($filtersvar, $postuf);
            }
          }



          if ($_POST['gender']) {
            $data['filter_gender'] = $_POST['gender'];
            $postgender = $_POST['gender'];

            if (is_array($postgender)) {
              $filtersgender = array();

              foreach ($postgender as &$value) {
                array_push($filtersgender, 'gender = ?');
                array_push($filtersvar, $value);
              }

              $filtersgender = implode(' OR ', $filtersgender);

              array_push($filters, '(' . $filtersgender . ')');
            } else {

              array_push($filters, 'gender = ?');
              array_push($filtersvar, $postuf);
            }
          }

          if ($_POST['workarea']) {
            $data['filter_workarea'] = $_POST['workarea'];
            $postworkarea = $_POST['workarea'];

            if (is_array($postworkarea)) {
              $filtersworkarea = array();

              foreach ($postworkarea as &$value) {
                array_push($filtersworkarea, 'workarea = ?');
                array_push($filtersvar, $value);
              }

              $filtersworkarea = implode(' OR ', $filtersworkarea);

              array_push($filters, '(' . $filtersworkarea . ')');
            } else {

              array_push($filters, 'workarea = ?');
              array_push($filtersvar, $postworkarea);
            }
          }

          if ($filters) {
            $filtroquery = ' AND ' . implode(' AND ', $filters);
          }



          $dataquery = 'SELECT * FROM hw_users WHERE type = ? ' . $filtroquery . ' ORDER BY slug;';



          $query = $db->query($dataquery, $filtersvar);
          $data['query'] = $query->getResult();
          $data['filtroquery'] =  $dataquery;



          $tablewa = 'hw_workarea_professionals';

          if ($data['typeuser'] == 3) {
            $tablewa = 'hw_workarea_costumers';
          }

          $sql = "SELECT * FROM " . $tablewa . " ORDER BY sort";
          $query = $db->query($sql);
          $data['workarea'] = $query->getResult();



          $data['modals'] = view('items/usersmodals');
          $data['content'] = view('pages/dashboard/users', $data);
          echo view('templates/dashboard', $data);
        } else {
          return redirect()->to(base_url('/Dashboard'));
        }
      }
    }
  }


  public function admins($bar1)
  {
    $session = session();


    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      if ($bar1 == 'list') {

        if ($session->get('logged')->type == 0) {

          helper('getmessages');
          $data['messages'] = getmessages($session->get('logged')->type);
          $data['logged'] = $session->get('logged');


          $data['title'] = 'Adminstradores';
          $data['icon'] = 'user-cog';
          $data['typeuser'] = 1;
          $data['typeslug'] = 'admin';

          $me = $data['logged']->id;

          $db = db_connect();
          $sql = 'SELECT DISTINCT uf FROM hw_users WHERE type = ? ORDER BY uf;';
          $query = $db->query($sql, $data['typeuser'], $me);
          $data['uf'] = $query->getResult();

          $filters = array();
          $filtersvar = array();
          array_push($filtersvar, $data['typeuser']);
          $filtroquery = '';



          $data['search'] = '';
          $data['filter_gender'] = array();
          $data['filter_uf'] = array();

          if ($_POST['search']) {
            $data['search'] = $_POST['search'];

            $search = strtolower($data['search']);


            array_push($filters, '(LOWER(name) LIKE ? OR LOWER(email) LIKE ?)');
            array_push($filtersvar, '%' . $search . '%');
            array_push($filtersvar, '%' . $search . '%');
          }
          if ($_POST['uf']) {
            $data['filter_uf'] = $_POST['uf'];
            $postuf = $_POST['uf'];

            if (is_array($postuf)) {
              $filtersuf = array();

              foreach ($postuf as &$value) {
                array_push($filtersuf, 'uf = ?');
                array_push($filtersvar, $value);
              }

              $filtersuf = implode(' OR ', $filtersuf);

              array_push($filters, '(' . $filtersuf . ')');
            } else {

              array_push($filters, 'uf = ?');
              array_push($filtersvar, $postuf);
            }
          }



          if ($_POST['gender']) {
            $data['filter_gender'] = $_POST['gender'];
            $postgender = $_POST['gender'];

            if (is_array($postgender)) {
              $filtersgender = array();

              foreach ($postgender as &$value) {
                array_push($filtersgender, 'gender = ?');
                array_push($filtersvar, $value);
              }

              $filtersgender = implode(' OR ', $filtersgender);

              array_push($filters, '(' . $filtersgender . ')');
            } else {

              array_push($filters, 'gender = ?');
              array_push($filtersvar, $postuf);
            }
          }

          if ($_POST['workarea']) {
            $data['filter_workarea'] = $_POST['workarea'];
            $postworkarea = $_POST['workarea'];

            if (is_array($postworkarea)) {
              $filtersworkarea = array();

              foreach ($postworkarea as &$value) {
                array_push($filtersworkarea, 'workarea = ?');
                array_push($filtersvar, $value);
              }

              $filtersworkarea = implode(' OR ', $filtersworkarea);

              array_push($filters, '(' . $filtersworkarea . ')');
            } else {

              array_push($filters, 'workarea = ?');
              array_push($filtersvar, $postworkarea);
            }
          }

          if ($filters) {
            $filtroquery = ' AND ' . implode(' AND ', $filters);
          }



          $dataquery = 'SELECT * FROM hw_users WHERE type = ? ' . $filtroquery . ' ORDER BY slug;';



          $query = $db->query($dataquery, $filtersvar);
          $data['query'] = $query->getResult();
          $data['filtroquery'] =  $dataquery;



          $tablewa = 'hw_workarea_professionals';

          if ($data['typeuser'] == 3) {
            $tablewa = 'hw_workarea_costumers';
          }

          $sql = "SELECT * FROM " . $tablewa . " ORDER BY sort";
          $query = $db->query($sql);
          $data['workarea'] = $query->getResult();


          $data['modals'] = view('items/usersmodals');

          $data['content'] = view('pages/dashboard/users', $data);
          echo view('templates/dashboard', $data);
        } else {
          return redirect()->to(base_url('/Dashboard'));
        }
      }
    }
  }

  public function user($type, $user)
  {
    $session = session();



    if (!$session->get('logged')) {
      return redirect()->to(base_url() . '?redirect=' . $_SERVER['REQUEST_URI']);
    } else {
      if ($session->get('logged')->type < 2) {
        $data['logged'] = $session->get('logged');

        $data['workarea'] = array();
        $querywa = false;
        if ($type == 'professional') {
          $data['typeofuser'] = 4;
          $data['title'] = 'Profissional';
          $data['icon'] = 'user-alt';
          $querywa = 'workarea_professionals';
        }
        if ($type == 'costumer') {
          $data['typeofuser'] = 3;
          $data['title'] = 'Cliente';
          $data['icon'] = 'store';
          $querywa = 'workarea_costumers';
        }
        if ($type == 'controller') {
          $data['typeofuser'] = 2;
          $data['title'] = 'Auditor';
          $data['icon'] = 'user-tie';
        }
        if ($type == 'admin') {
          $data['typeofuser'] = 1;
          $data['title'] = 'Admistrador';
          $data['icon'] = 'user-cog';
        }


        if ($querywa) {

          $dataquery = 'SELECT * FROM hw_' . $querywa . ' ORDER by sort;';
          $db = db_connect();
          $query = $db->query($dataquery);
          $data['workarea'] = $query->getResult();
        }

        $dataquery = 'SELECT * FROM hw_briefings ORDER by slug;';
        $db = db_connect();
        $query = $db->query($dataquery);
        $data['briefings'] = $query->getResult();


        if ($user == 'new') {

          $data['title'] = "Novo " . $data['title'];
          $data['generatepassmodal'] = view('items/generatepassmodal');
          $data['content'] = view('pages/dashboard/newuser', $data);

          echo view('templates/dashboard', $data);
          exit();
        } else {


          $dataquery = 'SELECT * FROM hw_users WHERE slug = ? LIMIT 1;';

          $filtersvar = array();
          array_push($filtersvar, $user);
          $db = db_connect();
          $query = $db->query($dataquery, $filtersvar);

          $queryc = count($query->getResult());

          if ($queryc) {
            $data['query'] = $query->getResult()[0];
            $data['title'] = "Editar " . $data['title'];
            $data['content'] = view('pages/dashboard/edituser', $data);
          }
          else
          {
            return redirect()->to(base_url('/Dashboard/'.$type.'s/list'));
          }
        }


        echo view('templates/dashboard', $data);
      } else {
        return redirect()->to(base_url('/Dashboard'));
      }
    }
  }
}
