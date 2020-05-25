<?php

namespace App\Controllers;


class Save extends BaseController
{


    public function removebrief()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {



                $id = $_POST['iduser'];
                $data = $_POST;
                $db = db_connect();


                $sql = "DELETE FROM hw_briefings WHERE id = ?";




                $query = $db->query($sql, [$id]);


                $response = [];
                $response['status'] = 'success';
                $response['validacao'] = $id;

                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }

    public function editbrief()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {

                $data = $_POST;

                $while = $data['question'];
                $response = [];
                $response['validacao'] = '';
                $response['status'] = 'success';
                if (!$data['question']) {
                    $response['status'] = 'warning';
                    $response['validacao'] = 'Crie, ao menos, uma pergunta!';
                } else {

                    $question = implode('", "', $while);
                    $question = '["' . $question . '"]';

                    $name = $data['name'];



                    $sql = " UPDATE hw_briefings
                    Set  
                        name = ?,
                       questions = ?
                       
                       WHERE slug = ?
                   ";
                    $db = db_connect();


                    $query = $db->query($sql, [
                        $data['name'],
                        $question,
                        $data['iduser']
                    ]);
                }
                if ($response['status'] == 'success') {
                    $response['validacao'] = '';
                    if ($data['saveandclose'] == 'true') {

                        $response['validacao'] = base_url('/Dashboard/briefings') . '/list';
                    }
                }
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }

    public function newbrief()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {

                $data = $_POST;

                $while = $data['question'];
                $response = [];
                $response['validacao'] = '';
                $response['status'] = 'success';
                if (!$data['question']) {
                    $response['status'] = 'warning';
                    $response['validacao'] = 'Crie, ao menos, uma pergunta!';
                } else {

                    $question = implode('", "', $while);
                    $question = '["' . $question . '"]';

                    $name = $data['name'];

                    helper('siteconfig');
                    $data['slug'] = hw_slug($data['name']);


                    $sql = "SELECT * FROM hw_briefings WHERE slug = ?";

                    $db = db_connect();
                    $query = $db->query($sql, [$data['slug']]);
                    $count = count($query->getResult());

                    $total = 1;
                    for ($i = 0; $i < 1; $i) {

                        $sql = "SELECT * FROM hw_briefings WHERE slug = ?";

                        $query = $db->query($sql, [$data['slug']]);
                        $count = count($query->getResult());

                        if ($count) {
                            $data['slug'] =    $data['slug'] . '-' . $total;
                            $i = 0;
                        } else {
                            $i = 1;
                        }

                        $total++;
                    }



                    $sql = "INSERT INTO hw_briefings (
                        name, slug, questions)  VALUES  (?, ?, ?)";


                    $query = $db->query($sql, [
                        $data['name'],
                        $data['slug'],
                        $question
                    ]);
                }
                if ($response['status'] == 'success') {
                    $response['validacao'] = base_url('/Briefing/edit') . '/' . $data['slug'];
                    if ($data['saveandclose'] == 'true') {

                        $response['validacao'] = base_url('/Dashboard/briefings') . '/list';
                    }
                }
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }
    public function editwa()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {
                $data = $_POST;
                $newname = $data['waname'];
                $id = $data['iduser'];
                $db = db_connect();
                if ($data['type'] == 4) {
                    $sql = " UPDATE hw_workarea_professionals Set  name = ?  WHERE id = ?";
                }
                if ($data['type'] == 3) {
                    $sql = " UPDATE hw_workarea_costumers Set  name = ?  WHERE id = ?";
                }
                $query = $db->query($sql, [$newname, $id]);
            }
        }
    }

    public function newwa()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {
                $data = $_POST;
                $data['name'] = $data['waname'];
                helper('siteconfig');
                $data['slug'] = hw_slug($data['name']);

                if ($data['type'] == 4) {
                    $sql = "SELECT * FROM hw_workarea_professionals WHERE slug = ?";
                }
                if ($data['type'] == 3) {
                    $sql = "SELECT * FROM hw_workarea_costumers WHERE slug = ?";
                }


                $db = db_connect();
                $query = $db->query($sql, [$data['slug']]);
                $count = count($query->getResult());


                $total = 1;
                for ($i = 0; $i < 1; $i) {

                    if ($data['type'] == 4) {
                        $sql = "SELECT * FROM hw_workarea_professionals WHERE slug = ?";
                    }
                    if ($data['type'] == 3) {
                        $sql = "SELECT * FROM hw_workarea_costumers WHERE slug = ?";
                    }
                    $query = $db->query($sql, [$data['slug']]);
                    $count = count($query->getResult());

                    if ($count) {
                        $data['slug'] =    $data['slug'] . '-' . $total;
                        $i = 0;
                    } else {
                        $i = 1;
                    }

                    $total++;
                }




                if ($data['type'] == 4) {
                    $sql = "INSERT INTO hw_workarea_professionals (
                    name, slug)  VALUES  (?, ?)";
                }
                if ($data['type'] == 3) {
                    $sql = "INSERT INTO hw_workarea_costumers (
                            name, slug)  VALUES  (?, ?)";
                }

                $db = db_connect();

                $query = $db->query($sql, [
                    $data['name'],
                    $data['slug']
                ]);


                if ($data['type'] == 4) {
                    $sql = "SELECT * FROM hw_workarea_professionals WHERE slug = ?";
                }
                if ($data['type'] == 3) {
                    $sql = "SELECT * FROM hw_workarea_costumers WHERE slug = ?";
                }

                $query = $db->query($sql, [$data['slug']]);

                $while = $query->getResult();
                $user = $while[0];

                $obj = '<li id="wa-' . $user->id . '" data-name="' . $user->name . '" data-id="' . $user->id . '" class="btn alert-warning realul d-block mb-2 text-left" data-slug="' .  $user->slug . '">
                <span class="btn"><span class="username">' . $user->name . '</span>
                </span>
                <span class="float-right pause">
                    <button data-id="' . $user->id . '" class="btn btn-danger text-white trashbtn"><i class="fas fa-trash"></i></button>
                    <button data-id="' . $user->id . '" class="btn btn-info text-light editbtn"><i class="fas fa-edit"></i></button>
                    
                    <form class="d-inline" target="_blank" action="' . base_url() . '/Dashboard/professionals/list" method="POST">
                        <input type="hidden" name="workarea[]" value="' .  $user->slug . '">
                        <button class="btn btn-dark text-warning trashbtn"><i class="fas fa-eye"></i></button>
                    </form>
                </span>
                </li>';
                echo $obj;
            }
        }
    }
    public function reorderwa()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {
                $data = $_POST;
                $db = db_connect();

                if ($data['type'] == 4) {
                    $sql = " UPDATE hw_workarea_professionals Set  sort = ?  WHERE slug = ?";
                }
                if ($data['type'] == 3) {
                    $sql = " UPDATE hw_workarea_costumers Set  sort = ?  WHERE slug = ?";
                }
                $while = explode(',', $data['newsort']);

                echo '<pre>';
                print_r($while);
                echo '</pre>';



                $db = db_connect();



                foreach ($while as $key => $result) {


                    if ($data['type'] == 4) {
                        $sql = "UPDATE hw_workarea_professionals SET sort = ?  WHERE slug = ?";
                    }
                    if ($data['type'] == 3) {
                        $sql = "UPDATE hw_workarea_costumers SET sort = ?  WHERE slug = ?";
                    }


                    $query = $db->query($sql, [$key, $result]);
                    //if ($query) {

                    //                        }

                }
            }
        }
    }
    public function removewa()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {


                $id = $_POST['iduser'];
                $data = $_POST;

                $db = db_connect();
                if ($data['type'] == 4) {

                    $sql = "DELETE FROM hw_workarea_professionals WHERE id = ?";
                }
                if ($data['type'] == 3) {
                    $sql = "DELETE FROM hw_workarea_costumers WHERE id = ?";
                }

                $query = $db->query($sql, [$id]);

                $response = [];
                $response['status'] = 'success';
                $response['validacao'] = $id;

                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }
    public function removeuser()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {


                $id = $_POST['iduser'];
                $data = $_POST;

                $db = db_connect();
                $sql = "SELECT * FROM hw_users WHERE id = ?";
                $query = $db->query($sql, [$id]);

                $user = $query->getResult()[0];

                $data['type'] == $user->type;


                if ($data['type'] == $session->get('logged')->type) {
                    exit();
                } else {

                    $sql = "DELETE FROM hw_users WHERE id = ?";
                    $query = $db->query($sql, [$id]);
                }
                $response = [];
                $response['status'] = 'success';
                $response['validacao'] = $id;

                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }
    public function edituser()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {


                $getslug = end(explode('/', $_POST['url']));
                $_POST['slug'] = $_POST['url'] = $getslug;


                $data = $_POST;
                $slug = $data['slug'];
                $db = db_connect();
                $sql = "SELECT * FROM hw_users WHERE slug = ?";
                $query = $db->query($sql, [$slug]);

                $user = $query->getResult()[0];

                $data['type'] == $user->type;


                if ($data['type'] == $session->get('logged')->type) {
                    exit();
                }


                $email = $data['email'];
                $slug = $data['slug'];







                $sql = "SELECT * FROM hw_users WHERE email = ? AND slug != ?";
                $query = $db->query($sql, [$email, $slug]);
                $count = count($query->getResult());




                if ($count) {
                    $status = 'warning';
                    $validacao .= '<li>Email já sendo usado por outro usuário!</li>';
                }


                $sql = "SELECT * FROM hw_users WHERE slug = ?";
                $query = $db->query($sql, [$slug]);

                $while = $query->getResult()[0];


                $data['type'] = intval($while->type);

                if ($data['type'] > 2) {
                    $cpf = $data['cpf'];
                    $db = db_connect();
                    $sql = "SELECT * FROM hw_users WHERE cpf = ?";
                    $query = $db->query($sql, [$cpf, $slug]);
                    $count = count($query->getResult());

                    if ($count) {
                        $status = 'warning';
                        $validacao .= '<li>CPF/CNPJ já sendo usado por outro usuário!</li>';
                    }
                }
                if (!$data['banco']) {
                    $data['banco'] = $data['bancopress'];
                }
                if ($status != 'warning') {

                    $sql = " UPDATE hw_users
                    Set  
                       name = ?,
                       gender = ?,
                       cpf = ?,
                       nascimento = ?,
                       workarea = ?,
                       email = ?,
                       google_account = ?,
                       uf = ?,
                       whatsapp = ?,
                       mobile = ?,
                       comercial = ?,
                       address = ?,
                       folio = ?,
                       status = ?,
                       banco = ?,
                       tipoconta = ?,
                       agencia = ?,
                       agd = ?,
                       conta = ?,
                       contad = ?,
                       briefing = ?,
                       fantasia = ?,
                       updated_at = NOW()
                       
                       WHERE slug = ?
                   ";
                    $db = db_connect();

                    $query = $db->query($sql, [
                        $data['name'],
                        $data['gender'],
                        $data['cpf'],
                        $data['nascimento'],
                        $data['workarea'],
                        $data['email'],
                        $data['google_account'],
                        $data['state'],
                        $data['whatsapp'],
                        $data['mobile'],
                        $data['comercial'],
                        $data['address'],
                        $data['portifolio'],
                        $data['avalia'],
                        $data['banco'],
                        $data['tipoconta'],
                        $data['ag'],
                        $data['agd'],
                        $data['conta'],
                        $data['contad'],
                        $data['briefing'],
                        $data['fantasia'],
                        $data['slug']
                    ]);



                    $sql = "SELECT * FROM hw_users WHERE slug = ?";
                    $query = $db->query($sql, [$slug]);

                    $while = $query->getResult()[0];


                    $data['type'] = $while->type;


                    $resp = [];
                    $resp['status'] = 'success';
                    $resp['validacao'] = false;

                    $typeofuser = 'professionals';
                    if ($data['type'] == 3) {
                        $typeofuser = 'costumers';
                    }
                    if ($data['type'] == 2) {
                        $typeofuser = 'controllers';
                    }
                    if ($data['type'] == 1) {
                        $typeofuser = 'admins';
                    }
                    if ($data['saveandclose'] == 'true') {

                        $resp['validacao'] = base_url('/Dashboard') . '/' . $typeofuser  . '/list';
                    }
                    header('Content-Type: application/json');
                    echo json_encode($resp);
                } else {
                    $resp = [];
                    $resp['status'] = $status;
                    $resp['validacao'] = '<ul class="p-0 m-0 pl-3">' . $validacao . '</ul>';
                    header('Content-Type: application/json');
                    echo json_encode($resp);
                }
            }
        }
    }
    public function newuser()
    {
        $session = session();

        if (!$session->get('logged')) { } else {
            if ($session->get('logged')->type < 2) {
                $data = $_POST;
             
                $newpass =  $data['newpass'];
                $newpass2 =  $data['newpass2'];

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


                $email = $data['email'];
                $db = db_connect();
                $sql = "SELECT * FROM hw_users WHERE email = ?";
                $query = $db->query($sql, [$email]);
                $count = count($query->getResult());

                if ($count) {
                    $status = 'warning';
                    $validacao .= '<li>Email já sendo usado por outro usuário!</li>';
                }

              


                if ($data['type'] > 2) {
                    $cpf = $data['cpf'];
                    $db = db_connect();
                    $sql = "SELECT * FROM hw_users WHERE cpf = ? AND type = ?";
                    $query = $db->query($sql, [$cpf, $data['type']]);
                    $count = count($query->getResult());


                    if ($count) {
                        $status = 'warning';
                        $validacao .= '<li>CPF/CNPJ já sendo usado por outro usuário!</li>';
                    }
                }
                helper('siteconfig');

                


                if (!$data['banco']) {
                    $data['banco'] = $data['bancopress'];
                }

                if ($status != 'warning') {


                    $data['slug'] = hw_slug($data['name']);


                    $sql = "SELECT * FROM hw_users WHERE slug = ?";
                    $query = $db->query($sql, [$data['slug']]);
                    $count = count($query->getResult());




                    $total = 1;
                    for ($i = 0; $i < 1; $i) {

                        $sql = "SELECT * FROM hw_users WHERE slug = ?";
                        $query = $db->query($sql, [$data['slug']]);
                        $count = count($query->getResult());

                        if ($count) {
                            $data['slug'] =    $data['slug'] . '-' . $total;
                            $i = 0;
                        } else {
                            $i = 1;
                        }

                        $total++;
                    }

                    

                    $newpass = $data['newpass'];
                    $newpass = md5($newpass);

                    $newpass  = encrypt_decrypt('encrypt', $newpass);

                    $data['newpass'] =     $newpass;

                    if ($status != 'warning') {

                        $sql = "INSERT INTO hw_users (
                login,
                pass,
                email,
                name,
                type,
                slug,
                gender,
                workarea,
                uf,
                phone,
                whatsapp,
                google_account,
                mobile,
                address,
                folio,
                cpf,
                banco,
                tipoconta,
                agencia,
                agd,
                conta,
                contad,
                cv,
                nascimento,
                briefing,
                fantasia,
                created_at
             )
             VALUES
             (
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                NOW()
             )";

                        $db = db_connect();

                        $query = $db->query($sql, [
                            $data['email'],
                            $data['newpass'],
                            $data['email'],
                            $data['name'],
                            $data['type'],
                            $data['slug'],
                            $data['gender'],
                            $data['workarea'],
                            $data['state'],
                            $data['comercial'],
                            $data['whatsapp'],
                            $data['google_account'],
                            $data['mobile'],
                            $data['address'],
                            $data['portifolio'],
                            $data['cpf'],
                            $data['banco'],
                            $data['tipoconta'],
                            $data['ag'],
                            $data['agd'],
                            $data['conta'],
                            $data['contad'],
                            $data['cv'],
                            $data['nascimento'],
                            $data['briefing'],
                            $data['fantasia']
                        ]);
                    }

                    $resp = [];
                    if ($query) {
                        $resp['status'] = 'success';
                        $resp['validacao'] = false;

                        $typeofuser = 'professionals';
                        if ($data['type'] == 3) {
                            $typeofuser = 'costumers';
                        }
                        if ($data['type'] == 2) {
                            $typeofuser = 'controllers';
                        }
                        if ($data['type'] == 1) {
                            $typeofuser = 'admins';
                        }
                        if ($data['saveandclose'] == 'true') {


                            $resp['validacao'] = base_url('/Dashboard') . '/' . $typeofuser . '/list';
                        } else {
                            $typeofuser = 'professional';
                            if ($data['type'] == 3) {
                                $typeofuser = 'costumer';
                            }
                            if ($data['type'] == 2) {
                                $typeofuser = 'controller';
                            }
                            if ($data['type'] == 1) {
                                $typeofuser = 'admin';
                            }
                            $resp['validacao'] = base_url('/Dashboard') . '/user/' . $typeofuser . '/' . $data['slug'];
                        }
                        header('Content-Type: application/json');
                        echo json_encode($resp);
                    } else {
                        $resp['status'] = 'error';
                        $resp['validacao'] = 'db';

                        header('Content-Type: application/json');
                        echo json_encode($resp);
                    }
                } else {
                    $resp = [];
                    $resp['status'] = $status;
                    $resp['validacao'] = '<ul class="p-0 m-0 pl-3">' . $validacao . '</ul>';
                    header('Content-Type: application/json');
                    echo json_encode($resp);
                }
            }
        }
    }
}
