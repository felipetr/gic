<?php

namespace App\Controllers;

class ListaBancos extends BaseController
{
    public function index()
    {


        $url = "https://www.bcb.gov.br/pom/spb/estatistica/port/ParticipantesSTRport.csv";

        $list = file_get_contents($url);

        $listarr = explode(PHP_EOL, $list);

        $keys = strtolower($listarr[0]);
        $keys = str_replace('ú', 'u', $keys);
        $keys = str_replace('ó', 'o', $keys);
        $keys = str_replace('í', 'i', $keys);
        $keys = str_replace('ç', 'c', $keys);
        $keys = str_replace('ã', 'a', $keys);

        unset($listarr[0]);


        $keys = explode(',', $keys);

        $banks = [];

        foreach ($listarr as &$value) {
            $valuear = explode(',', $value);

            $newarr = [];

            foreach ($keys as $key => $value2) {
                $newarr[$value2] = $valuear[$key];
            }

            if ($newarr['numero_codigo'] != 'n/a') {

                array_push($banks, $newarr);
            }
        }

      


       
        echo json_encode($banks);
        
    }
}
