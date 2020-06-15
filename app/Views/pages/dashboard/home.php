<?php if ($logged->type < 2) { 
    
    ?>
    <?php if ($cardcounter['profisionaisna']) { ?>
        <div class="alert alert-warning bg-shadow alert-dismissible fade show" role="alert">
            <?php $plural = ['','l',''];
            if($cardcounter['profisionaisna'] > 1)
            {
                $plural = ['m','is','s'];
            }
            ?>
            <span class="btn alert-warning-color px-0">Existe<?php echo $plural[0]; ?> <strong><?php echo $cardcounter['profisionaisna'] ;?></strong> profissiona<?php echo $plural[1]; ?> pendente<?php echo $plural[3]; ?> de avaliação!</span>
            <form class="text-right d-inline" action="<?php echo base_url('/Dashboard/professionals/list') ?>" method="POST">
            <input type="hidden" value="0" name="status[]">

            <button class="btn btn-link alert-warning-color  px-0">Clique aqui visualizar</button>

            </form>
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert p-0 m-0 mb-3 bg-transparent-white text-dark border-ml text-center">
                <h5 class="m-0 p-2"><i class="fas fa-store"></i> Clientes</h5>
                <hr class="m-0 p-0">
                <div class="p-2">
                    <span class="badge"><?php
                                            $plural = '';

                                            if ($cardcounter['clientes']) {
                                                echo $cardcounter['clientes'];

                                                if ($cardcounter['clientes'] > 1) {
                                                    $plural = 's';
                                                }
                                            } else {
                                                echo 'Nenhum';
                                            }
                                            ?> Cliente<?php echo $plural; ?></span>

                    <a class="btn btn-warning mt-2 btn-block" href="<?php echo base_url('/Dashboard/costumers/list'); ?>">Ver mais</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert p-0 m-0 mb-3 bg-transparent-white text-dark border-ml text-center">
                <h5 class="m-0 p-2"><i class="fas fa-book"></i> Projetos</h5>
                <hr class="m-0 p-0">
                <div class="p-2">
                    <span class="badge"><?php
                                            $plural = '';

                                            if ($cardcounter['projetos']) {
                                                echo $cardcounter['projetos'];

                                                if ($cardcounter['projetos'] > 1) {
                                                    $plural = 's';
                                                }
                                            } else {
                                                echo 'Nenhum';
                                            }
                                            ?> Projeto<?php echo $plural; ?></span>

                    <a class="btn btn-warning mt-2 btn-block" href="<?php echo base_url('/Dashboard/project/list'); ?>">Ver mais</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert p-0 m-0 mb-3 bg-transparent-white text-dark border-ml text-center">
                <h5 class="m-0 p-2"><i class="fas fa-user-tie"></i> Auditores</h5>
                <hr class="m-0 p-0">
                <div class="p-2">
                    <span class="badge"><?php
                                            $plural = '';


                                            if ($cardcounter['auditores']) {
                                                echo $cardcounter['auditores'];

                                                if ($cardcounter['auditores'] > 1) {
                                                    $plural = 'es';
                                                }
                                            } else {
                                                echo 'Nenhum';
                                            }
                                            ?> Auditor<?php echo $plural; ?></span>

                    <a class="btn btn-warning mt-2 btn-block" href="<?php echo base_url('/Dashboard/controllers/list'); ?>">Ver mais</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert p-0 m-0 mb-3 bg-transparent-white text-dark border-ml text-center">
                <h5 class="m-0 p-2"><i class="fas fa-user"></i> Profissionais</h5>
                <hr class="m-0 p-0">
                <div class="p-2">
                    <span class="badge"><?php
                                            $plural = 'l';

                                            if ($cardcounter['profissionais']) {
                                                echo $cardcounter['profissionais'];

                                                if ($cardcounter['profissionais'] > 1) {
                                                    $plural = 'is';
                                                }
                                            } else {
                                                echo 'Nenhum';
                                            }
                                            ?> Profissiona<?php echo $plural; ?></span>

                    <a class="btn btn-warning mt-2 btn-block" href="<?php echo base_url('/Dashboard/professionals/list'); ?>">Ver mais</a>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert p-0 m-0 mb-3 bg-transparent-white text-dark border-ml text-center">
                <h5 class="m-0 p-2"><i class="fas fa-user-cog"></i> Administradores</h5>
                <hr class="m-0 p-0">
                <div class="p-2">
                    <span class="badge"><?php
                                            $plural = '';
                                            $cardcounter['admin'];
                                            if ($cardcounter['admin']) {
                                                echo $cardcounter['admin'];

                                                if ($cardcounter['admin'] > 1) {
                                                    $plural = 'es';
                                                }
                                            } else {
                                                echo 'Nenhum';
                                            }
                                            ?> Administrador<?php echo $plural; ?></span>

                    <a class="btn btn-warning mt-2 btn-block" href="<?php echo base_url('/Dashboard/admins/list'); ?>">Ver mais</a>
                </div>
            </div>
        </div>


        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert p-0 m-0 mb-3 bg-transparent-white text-dark border-ml text-center">
                <h5 class="m-0 p-2"><i class="fas fa-briefcase"></i> Briefings</h5>
                <hr class="m-0 p-0">
                <div class="p-2">
                    <span class="badge"><?php
                                            $plural = '';
                                            $cardcounter['briefings'];
                                            if ($cardcounter['briefings']) {
                                                echo $cardcounter['briefings'];

                                                if ($cardcounter['briefings'] > 1) {
                                                    $plural = 's';
                                                }
                                            } else {
                                                echo 'Nenhum';
                                            }
                                            ?> Briefing<?php echo $plural; ?></span>

                    <a class="btn btn-warning mt-2 btn-block" href="<?php echo base_url('/Dashboard/briefings/list'); ?>">Ver mais</a>
                </div>
            </div>
        </div>







    </div>

<?php } ?>
<hr>