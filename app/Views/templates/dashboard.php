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

<body class="bg-light">
    <div id="app">
        <div id="wof">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><img height="30" src="<?php echo base_url("/assets/img/gic-w.svg"); ?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/Dashboard'); ?>">Home</a>
                        </li>
                        <?php if ($logged->type < 2) { ?>
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="clienteDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Clientes
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="clienteDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/costumers/list'); ?>"><i class="fas fa-bars"></i> Lista de Clientes</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/user/costumer/new'); ?>"><i class="fas fa-plus"></i> Novo Cliente</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/user/costumers/workareas'); ?>"><i class="fas fa-star"></i> Áreas de Atuação</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="projectsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Projetos
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="projectsDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/projects/list'); ?>"><i class="fas fa-bars"></i> Lista de Projetos</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/project/new'); ?>"><i class="fas fa-plus"></i> Novo Projeto</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="auditorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Auditores
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="auditorDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/controllers/list'); ?>"><i class="fas fa-bars"></i> Lista de Auditores</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/user/controller/new'); ?>"><i class="fas fa-plus"></i> Novo Auditor</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="professionalsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Profissionais
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="professionalsDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/professionals/list'); ?>"><i class="fas fa-bars"></i> Lista de Profissionais</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/user/professional/new'); ?>"><i class="fas fa-plus"></i> Novo Profissional</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/user/professionals/workareas'); ?>"><i class="fas fa-star"></i> Áreas de Atuação</a>
                                </div>
                            </li>
                            <?php if ($logged->type == 0) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Administradores
                                    </a>
                                    <div class="dropdown-menu bg-dark" aria-labelledby="adminDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url('/Dashboard/admins/list'); ?>"><i class="fas fa-bars"></i> Lista de Administradores</a>
                                        <a class="dropdown-item" href="<?php echo base_url('/Dashboard/user/admin/new'); ?>"><i class="fas fa-plus"></i> Novo Administrador</a>
                                    </div>
                                </li>
                            <?php } ?>
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" id="breafingDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Breafings
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="breafingDropdown">
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/breafings/list'); ?>"><i class="fas fa-bars"></i> Lista de Breafings</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/breafing/new'); ?>"><i class="fas fa-plus"></i> Novo Breafing</a>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if ($logged->type > 1) { ?>

                            <li class="nav-item dropdown">

                                <a class="nav-link" href="<?php echo base_url('/Dashboard/projects/list'); ?>" id="projectsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Projetos
                                </a>

                            </li>
                        <?php } ?>

                    </ul>

                    <div class="nav-item my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-inbox"></i>
                                </a>
                                <div class="dropdown-menu text-center dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown2">

                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/messages'); ?>">Ver Mais</a>
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="avatarimg">
                                        <img src="<?php
                                                    $avatar = $logged->avatar;
                                                    if (!$avatar) {
                                                        $avatar = 'default-' . $logged->gender . '.jpg';
                                                    }
                                                    echo base_url('/imgcrop.php?w=40&h=40&f=uploads/' . $avatar); ?>">

                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-item text-center">
                                        <div class="text-center p-2">
                                            <span class="avatarhover img-rounded"><img class="img-rounded" src="<?php
                                                                                                                $avatar = $logged->avatar;
                                                                                                                if (!$avatar) {
                                                                                                                    $avatar = 'default-' . $logged->gender . '.jpg';
                                                                                                                }
                                                                                                                echo base_url('/imgcrop.php?w=80&h=80&f=uploads/' . $avatar); ?>">

                                                <button class="changeaavatar"><i class="fas fa-camera"></i></button>
                                            </span>
                                        </div>
                                        <?php if ($logged->gender == 'x') {
                                            echo "Olá";
                                        } else {
                                            echo 'Bem vind' . $logged->gender;
                                        } ?>,&nbsp;<b>
                                            <?php echo explode(' ', $logged->nome)[0]; ?>
                                        </b>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/profile'); ?>"><i class="fas fa-user"></i> Meu Perfil</a>

                                    <a class="dropdown-item" href="<?php echo base_url('/Dashboard/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Sair</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="p-3 mb-4">
                <div class=" <?php if (isset($title)) { ?> bg-white         <?php } ?> text-dark">
                    <?php if (isset($title)) { ?>
                        <h4 class="text-secondary font-weight-light p-4 m-0"><i class="fas fa-<?php echo $icon; ?>"></i> <?php echo $title; ?></h4>

                        <hr class="p-0 m-0">
                    <?php } ?>
                    <div class="p-4">
                        <?php
                        echo $content;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="">
            <div class="pr-2 py-2 text-secondary text-right">
                <small><a class="text-secondary" target="_blank" href="https://gerens.com.br/" title="Desenvolvido por Gerens">Desenvolvido por <img src="<?php echo base_url("/assets/img/assina2.svg"); ?>"> Gerens</a></small>
            </div>
        </footer>
    </div>
    <script src="<?php echo base_url("/assets/lib/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/summernote/summernote.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/jquery.mask.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/lib/cleanalert/cleanalert.js"); ?>"></script>
    <script src="<?php echo base_url("/assets/js/dashboard.js"); ?>"></script>


    <form id="avatarform" class="d-none" enctype="multipart/form-data">
        <input class="uploadImage" type="file" accept="image/*" name="file" />
        <button>go</button>
    </form>
    <form id="cvupload" class="d-none" enctype="multipart/form-data">
        <input class="uploadCV" id="uploadCV" type="file" accept=".doc,.docx,.pdf,.odt,.rtf" name="file" />
        <button>go</button>
    </form>

</body>

</html>