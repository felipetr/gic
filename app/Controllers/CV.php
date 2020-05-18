<?php

namespace App\Controllers;

class CV extends BaseController
{
    public function download($slug)
    {
        $session = session();

        if (!$session->get('logged')) {
            return redirect()->to(base_url().'?redirect='.$_SERVER['REQUEST_URI']);
        } else {
            if ($session->get('logged')->type < 2) {

                $db = db_connect();
                $sql = "SELECT * FROM hw_users WHERE slug = ?";
                $query = $db->query($sql, [$slug]);
                $count = count($query->getResult());

                if ($count) {
                    $while = $query->getResult();
                    $user = $while[0];
                    $originalcv = $user->cv;
                    $explodecv = explode('.',$originalcv);
                    $extension = end($explodecv);
                    $newfilename = str_replace('-','_','gic-cv-'.$slug.'.'.$extension);
                

     $file_url = base_url('/cv/'.$originalcv);
     header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" .  $newfilename . "\""); 
readfile($file_url); 


                    
                }
            } else {
                return redirect()->to(base_url('/Dashboard'));
            }
        }
    }
}
