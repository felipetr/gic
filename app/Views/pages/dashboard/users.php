<div class="row">
    <div class="col-12 col-md-4 col-lg-3">
        <div class="alert alert-secondary text-secondary">
            <form method="post">
                <div class="input-group">

                    <input type="text" value="<?php if ($search) {
                                                    echo $search;
                                                } ?>" class="form-control border-right-0" placeholder="Procurar" name="search">
                    <div class="input-group-append ">
                        <button class="form-control border-left-0" style="border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <hr>



                <div id="accordion">
                    <div class="card bg-transparent">
                        <div class="card-header m-0 p-0 bg-transparent " id="headingOne">

                            <button type="button" class="btn bg-transparent text-secondary btn-block text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="p-0 m-0 font-weight-light">Filtro</h5>
                            </button>

                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                <?php
                                if ($typeuser == 4 and $logged->type == 1) {
                                    ?>
                                    <b>Avaliação</b>
                                    <div class="row">


                                        <div class="col-6 col-md-12">
                                            <input <?php
                                                        if ($filter_status) {
                                                            if (in_array('3', $filter_status)) {
                                                                echo 'checked';
                                                            }
                                                        } ?> type="checkbox" name="status[]" value="3"> <span class="badge badge-success">A</span>
                                        </div>
                                        <div class="col-12">
                                            <input <?php if ($filter_status) {
                                                            if (in_array('2', $filter_status)) {
                                                                echo 'checked';
                                                            }
                                                        } ?> type="checkbox" name="status[]" value="2"> <span class="badge badge-warning">B</span>
                                        </div>
                                        <div class="col-12">
                                            <input <?php if ($filter_status) {
                                                            if (in_array('1', $filter_status)) {
                                                                echo 'checked';
                                                            }
                                                        } ?> type="checkbox" name="status[]" value="1"> <span class="badge badge-danger">C</span>
                                        </div>
                                        <div class="col-12">
                                            <input <?php if ($filter_status) {
                                                            if (in_array('0', $filter_status)) {
                                                                echo 'checked';
                                                            }
                                                        } ?> type="checkbox" name="status[]" value="0"> <span class="badge badge-dark">Não Avaliado</span>
                                        </div>


                                    </div>

                                    <hr>
                                <?php

                                }
                                ?>
                                <b>Estado</b>
                                <div class="row">
                                    <?php
                                    foreach ($uf as &$value) {

                                        ?>
                                        <div class="col-3 col-md-12">
                                            <input <?php
                                                        if (in_array($value->uf, $filter_uf)) {
                                                            echo 'checked';
                                                        } ?> type="checkbox" name="uf[]" value="<?php echo $value->uf; ?>"> <?php echo $value->uf; ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <hr>
                                <b>Gênero</b>
                                <div class="row">
                                    <div class="col-6 col-md-12">
                                        <input <?php
                                                if (in_array('a', $filter_gender)) {
                                                    echo 'checked';
                                                } ?> type="checkbox" name="gender[]" value="a"> Feminino
                                    </div>
                                    <div class="col-6 col-md-12">
                                        <input <?php
                                                if (in_array('o', $filter_gender)) {
                                                    echo 'checked';
                                                } ?> type="checkbox" name="gender[]" value="o"> Masculino
                                    </div>
                                    <div class="col-6 col-md-12">
                                        <input <?php
                                                if (in_array('x', $filter_gender)) {
                                                    echo 'checked';
                                                } ?> type="checkbox" name="gender[]" value="x"> Não informado
                                    </div>
                                </div>


                                <?php if ($typeuser > 2) { ?>

                                    <hr>
                                    <b>Área de Atuação</b>
                                    <?php

                                        foreach ($workarea as &$value) { ?>
                                        <div>
                                            <input <?php
                                                            if ($filter_workarea) {
                                                                if (in_array($value->slug, $filter_workarea)) {
                                                                    echo 'checked';
                                                                }
                                                            } ?> type="checkbox" name="workarea[]" value="<?php echo $value->slug; ?>"> <?php echo $value->name; ?>
                                        </div>
                                <?php }
                                } ?>


                                <hr>
                                <button class="btn btn-secondary">Filtrar</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="col-12 col-md-8 col-lg-9">
        <table class="table table-striped border alert-secondary bg-transparent">
            <thead class="hidden-sm">
                <tr>
                    <th scope="col" class="text-center text-md-left">Nome</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($query as &$value) { ?>
                    <tr data-user="<?php echo $value->id; ?>" id="user-<?php echo $value->id; ?>">
                        <th class="text-center text-md-left">
                            <div class="btn btn-block text-center text-md-left font-weight-bold text-<?php if ($logged->type < 2 and $value->type == 4) {
                                                                                                                $status = 'dark px-0';
                                                                                                                if ($value->status == 3) {
                                                                                                                    $status = 'left alert-success';
                                                                                                                }
                                                                                                                if ($value->status == 2) {
                                                                                                                    $status = 'left alert-warning';
                                                                                                                }
                                                                                                                if ($value->status == 1) {
                                                                                                                    $status = 'left alert-danger';
                                                                                                                }
                                                                                                                echo $status;
                                                                                                            } else {
                                                                                                                echo 'dark px-0';
                                                                                                            } ?>"><?php echo $value->name; ?></div>
                            <div class="d-block d-md-none">
                                <hr>
                                <div class=" font-weight-light"> Estado: <?php echo $value->uf; ?></div>
                                <hr>

                                <div class="form-row">
                                    <?php
                                        $col = 6;
                                        if ($logged->type < 2) {

                                            $col = 3;

                                            ?>
                                        <div class="col-3">
                                            <button data-user="<?php echo $value->id; ?>" data-name="<?php echo $value->name; ?>" class="idcard-btn btn btn-small btn-block btn-dark text-warning"><i class="fas fa-id-card"></i></button>


                                        </div>

                                        <div class="col-3">
                                            <button data-user="<?php echo $value->id; ?>" class="password-btn btn btn-small btn-block btn-warning"><i class="fas fa-key"></i></button>
                                        </div>
                                    <?php } ?>
                                    <div class="col-<?php echo $col; ?>">
                                        <a href="<?php



                                                        echo base_url('/Dashboard/user/' . $typeslug . '/' . $value->slug); ?>" class="btn btn-small btn-info  btn-block"><i class="fas fa-user-edit"></i></a>
                                    </div>
                                    <div class="col-<?php echo $col; ?>">
                                        <button data-user="<?php echo $value->id; ?>"  class="delete-btn btn-block btn btn-small btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <td class="hidden-sm text-center">
                            <div class="btn text-center px-0 bg-transparent text-dark"><?php echo $value->uf; ?></div>
                        </td>
                        <td class="hidden-sm text-right">


                            <button data-user="<?php echo $value->id; ?>" data-name="<?php echo $value->name; ?>" class="idcard-btn btn btn-small  btn-dark text-warning"><i class="fas fa-id-card"></i></button>
                            <button data-user="<?php echo $value->id; ?>" class="password-btn btn btn-small  btn-warning"><i class="fas fa-key"></i></button>





                            <a href="<?php


                                            echo base_url('/Dashboard/user/' . $typeslug . '/' . $value->slug); ?>" class="btn btn-small btn-info"><i class="fas fa-user-edit"></i></a>

                            <button class="delete-btn btn btn-small btn-danger"><i class="fas fa-trash"></i></button>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $modals; ?>
