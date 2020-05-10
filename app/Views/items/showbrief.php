<?php
echo '<b>Perguntas: </b>';
echo '<div class="alert p-2 alert-dark ">';
$question = json_decode($brief->questions);
$questcount = count($question);

foreach ( $question as $key => $result) {
    echo $result;

        if($key+1 != $questcount)
        { echo '<hr class="my-2">'; }
}
echo '</div>';

if ($brief->cont) {

    echo '<b>Projetos</b>';
    echo '<div class="alert p-2 alert-dark">';
   


    foreach ($brief->projects as $key => $result) {
        echo '<span class="d-inline-block py-1">'.$result->name.'</span>';

        echo '<span class="float-right">';
        echo '<a href="'.base_url('/Project/edit/'.$result->slug).'" target="_blank"  class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>';
        echo '<a href="'.base_url('/Project/view/'.$result->slug).'" target="_blank"  class="btn btn-sm btn-warning text-dark ml-1"><i class="fas fa-search"></i></a>';
        echo '</span>';
        if($key+1 != $brief->cont)
        { echo '<hr class="my-2">'; }
    }  
    echo '</div>';
    echo '<small class="d-block text-right">';
    echo '<b>Total: </b>' . $brief->cont;
    echo '</small>';
}else
{
    echo '<b>Projetos Associados: </b>' . $brief->cont;
}
echo '<hr>';
$date = new DateTime($brief->created_at);
echo '<b>Criado em: </b>' . $date->format('d/m/Y H:i:s');
echo '<hr>';
