<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Upload extends Controller
{
        public function avatar()
        {
                $session = session();
                if ($session->get('logged')) {
                        if ($this->request->getMethod() == 'post') {

                                // validation
                                $validated = $this->validate([
                                        'file' => [
                                                'uploaded[file]',
                                                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                                                'max_size[file,4096]',
                                        ],
                                ]);
                                $response = [];
                                if ($validated) {
                                        $file = $this->request->getFile('file');
                                        $ext = $file->getClientExtension();
                                        $newName = $file->getRandomName();
                                        $file->move('././uploads', $newName);
                                        $response['status'] = 'success';
                                        $response['name'] = $newName;
                                        $session->logged->avatar = $newName;
                                        $userid = $session->logged->id;
                                        $db = db_connect();
                                        $sql = "UPDATE hw_users SET avatar = ? WHERE  id = ?";
                                        $query = $db->query($sql, [$newName, $userid]);
                                } else {
                                        $response['status'] = 'error';
                                        $response['name'] = 'error';
                                }

                                header('Content-Type: application/json');
                                echo json_encode($response);
                        }
                }
        }


        public function cv()
        {
                ini_set('upload_max_filesize', '8M');
                ini_set('post_max_size', '8M');
                $session = session();
                if ($session->get('logged')) {
                        if ($this->request->getMethod() == 'post') {

                                // validation
                                $validated = true;

                                $response = [];
                                if ($validated) {


                                        $file = $this->request->getFile('file');
                                        $ext = $file->getClientExtension();
                                        $extv = strtolower($ext);
                                        $extv = str_replace('.', '', $extv);
                                        $response['status'] = 'success';
                                        $response['name'] = '';
                                        $extvali = false;

                                        if ($extv == 'doc' || $extv == 'docx' || $extv == 'pdf' || $extv == 'odt' || $extv == 'rtf') {
                                                $extvali = true;
                                        }

                                        if (!$extvali) {
                                                $response['status'] = 'warning';
                                                $response['name'] .= '<li>Extensão não suportada!</li>';
                                        }
                                        $filesize = $_FILES['file']['size'];
                                        if ($filesize > 8388608) {


                                                $response['status'] = 'warning';
                                                $response['name'] .= '<li>O tamanho do arquivo ultrapassa o limite de 8mb.</li>';
                                        }





                                        if ($response['status'] == 'success') {



                                                $response['realname'] = $file->getName();
                                                
                                                $newName = $file->getRandomName();

                                                $file->move('././cv', $newName);
                                                $response['status'] = 'success';
                                                $response['name'] = $newName;
                                                
                                        } else {
                                                $response['name'] = '<ul class="p-0 m-0  pl-3">' . $response['name'] . '</ul>';
                                        }
                                } else {
                                        $response['status'] = 'error';
                                        $response['name'] = 'error';
                                }

                                header('Content-Type: application/json');
                                echo json_encode($response);
                        }
                }
        }
}
