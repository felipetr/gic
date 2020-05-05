<?php

include('m2brimagem.class.php');
$arquivo	= $_GET['f'];
$largura	= $_GET['w'];
$altura		= $_GET['h'];
$oImg = new m2brimagem($arquivo);
$valida = $oImg->valida();
if ($valida == 'OK') {
    $oImg->redimensiona($largura,$altura,'crop');
    $oImg->grava();
} else {
    die($valida);
}
exit;
?>