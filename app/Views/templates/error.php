<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?php if (isset($title)) {
                echo $title . ' - ';
            } ?>GIC - Gestor de Informação Compartilhada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="icon shortcut" type="image/x-icon" href="<?php echo base_url("/assets/img/favicon.png"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("/assets/lib/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/lib/fontawesome/css/all.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/lib/cleanalert/cleanalert.css"); ?>">
    <link href="<?php echo base_url("/assets/lib/summernote/summernote.css"); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/dashboard.css"); ?>">
    <script src="<?php echo base_url("/assets/lib/jquery-3.4.0.min.js"); ?>"></script>



    <meta name="keywords" content="GIC - Gestor de Informação Compartilhada" />
    <meta name="description" content="GIC - Gestor de Informação Compartilhada" />
    <meta name="generator" content="Gerens" />

    <meta name="reply-to" content="gerens@gerens.com.br">
    <meta name="author" content="Felipe Travassos" />


    <meta property="og:image" content="<?php echo base_url("/assets/img/fbshare.jpg"); ?>" />

    <meta property="og:site_name" content="<?php echo base_url("/assets/img/fbshare.jpg"); ?>" />

    <meta property="og:description" content="GIC - Gestor de Informação Compartilhada" />

    <script>
        var base_url = '<?php echo base_url() ?>';
    </script>

</head>

<body class="bg-light text-center">
    <div id="app">
        <div id="wof" class="valign">
        
            
        <div>
        <img height="50" src="<?php echo base_url("/assets/img/logo-h.svg"); ?>" alt="">
        <div class="text-secondary mt-4" style="width: 300px; max-width: 100%;">
            <p><h1 class="m-0 p-0"><i class="fas fa-exclamation-triangle"></i></h1>
            <p><h2 class="m-0 p-0 font-weight-bolder"><?php echo $title; ?></h2>
            </p>
            <p><?php echo $content; ?>
            </p>
            <a href="javascript:history.go(-1)" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Voltar</a>
        </div>
        <p></p>
        <p>
        <small><a class="text-secondary" target="_blank" href="https://gerens.com.br/" title="Desenvolvido por Gerens">Desenvolvido por <img src="<?php echo base_url("/assets/img/assina2.svg"); ?>"> Gerens</a></small>
        </p>
        </div>

     
    </div>
	<script src="<?php echo base_url("/assets/lib/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/summernote/summernote.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/jquery.mask.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/cleanalert/cleanalert.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/js/dashboard.js"); ?>"></script>


</body>

</html>