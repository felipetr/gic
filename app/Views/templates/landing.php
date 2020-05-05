<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php if ($title){ echo $title.' - '; } ?>GIC - Gestor de Informação Compartilhada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link rel="icon shortcut" type="image/x-icon" href="<?php echo base_url("/assets/img/favicon.png"); ?>"/>
	
	<link rel="apple-touch-icon" href="<?php echo base_url("/assets/img/favicon.png"); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("/assets/img/favicon.png"); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("/assets/img/favicon.png"); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("/assets/img/favicon.png"); ?>">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" href="<?php echo base_url("/assets/lib/bootstrap/css/bootstrap.min.css"); ?>">

    <link rel="stylesheet" href="<?php echo base_url("/assets/lib/fontawesome/css/all.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("/assets/lib/cleanalert/cleanalert.css"); ?>">
    <link href="<?php echo base_url("/assets/lib/summernote/summernote.css"); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/landingpage.css"); ?>">
	<script src="<?php echo base_url("/assets/lib/jquery-3.4.0.min.js"); ?>"></script>
    
	<meta name="theme-color" content="#343a40">
<meta name="apple-mobile-web-app-status-bar-style" content="#343a40">

    <meta name="keywords"
          content="GIC - Gestor de Informação Compartilhada"/>
    <meta name="description"
          content="GIC - Gestor de Informação Compartilhada"/>
    <meta name="generator" content="Gerens"/>

    <meta name="reply-to" content="gerens@gerens.com.br">
    <meta name="author" content="Felipe Travassos"/>


    <meta property="og:image"
          content="<?php echo base_url("/assets/img/fbshare.jpg"); ?>"/>

    <meta property="og:site_name" content="<?php echo base_url("/assets/img/fbshare.jpg"); ?>"/>

    <meta property="og:description" content="GIC - Gestor de Informação Compartilhada"/>

    <script> var base_url = '<?php echo base_url() ?>';
	var datapage = 'false';
	</script>
    
        </head>
        <body>
              <div id="app">
              <div id="wof">

              <header class="p-3 text-white">
    <img  height="80" src="<?php echo base_url("/assets/img/logo-h-w.svg"); ?>" alt="">
   
</header>
<?php echo $content; ?>

</div>
<footer class="text-center">
    <div class="py-2 text-white text-right px-2">
        <small><a class="text-white" target="_blank" href="https://gerens.com.br/" title="Desenvolvido por Gerens">Desenvolvido por <img src="<?php echo base_url("/assets/img/assina.svg"); ?>"> Gerens</a></small>
    </div>
</footer>
</div>
<script src="<?php echo base_url("/assets/lib/popper.min.js"); ?>"></script>
<script src="<?php echo base_url("/assets/lib/summernote/summernote.js"); ?>"></script>
<script src="<?php echo base_url("/assets/lib/bootstrap/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("/assets/lib/jquery.mask.js"); ?>"></script>
<script src="<?php echo base_url("/assets/lib/cleanalert/cleanalert.js"); ?>"></script>
<script src="<?php echo base_url("/assets/js/landingpage.js"); ?>"></script>




</body>

</html>