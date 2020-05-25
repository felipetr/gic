<style>

</style>




<form class="row" id="newbriefform">
    <div class="col-12 col-md-6 col-lg-9">
        Nome:
        <input class="form-control mb-3" name="name" required>

        Cliente:

        <select name="costumer" class="custom-select mb-3" required>
            <option></option>
            <?php foreach ($costumers as &$value) { ?>
                <option value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
            <?php } ?>
        </select>



        Categoria:

        <select name="briefing" class="custom-select mb-3" required>
            <option></option>
            <?php foreach ($workareas as &$value) { ?>
                <option value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
            <?php } ?>
        </select>






        Briefing:

        <script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>
        <div class="autocompletebox mb-3">

            <?php

            $arrbr = [];
            foreach ($briefings as &$brief) {
                $briefn = $brief->name;
                $briefslug = $brief->slug;
                $arrbr[$briefslug] =  $briefn;
            }




            ?>
            <input class="form-control realselect" value="<?php
                                                            $querybr = $query->briefing;
                                                            echo $arrbr[$querybr]; ?>">
            <input name="briefing" value="<?php echo $query->briefing; ?>" type="hidden" class="inputvalue">
            <div id="briefinglist" class="fakelist" style="display:none;">

                <?php foreach ($briefings as &$brief) { ?>
                    <div class="fakeoption" data-value="<?php echo $brief->slug; ?>" data-text="<?php echo $brief->name; ?>"><?php echo $brief->name; ?> <button type="button" class="btn btn-warning btn-sm float-right text-dark btn-seequest" "><span class=" d-none questions"><?php echo $brief->questions; ?></span><i class="fas fa-eye"></i></button></div>
                <?php } ?>

                <div class="p-1"></div>

            </div>
        </div>





        Descrição:
        <textarea name="address" class="addresssummernote"></textarea>



        <hr>
        <div class="form-row">

            <div class="col-12 <?php if (!$logged->type) {
                                    echo  'col-sm-6 col-md-8';
                                } ?>">
                Pasta do Google Drive:
                <input class="form-control mb-3" name="gdrive" required>
            </div>
            <?php if (!$logged->type) { ?>
                <div class="col-12 col-sm-6 col-md-4">
                    Valor:


                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">R$</span>
                        </div>
                        <input type="text" name=valor class="form-control money text-right" placeholder="0,00">
                    </div>
                </div>
            <?php } ?>
        </div>

        <hr>




        <h3 class="m-0 p-0 pb-3">Usuários:</h3>

        <div class="form-row">
            <div class="col-12 col-sm-12">
                <div class="alert alert-secondary">
                    <h4 class="p-0 m-0 text-center text-secondary">Auditores</h4>
                    <hr>
                    <div class="form-row">
                        <?php foreach ($controllers as &$controller) { ?>
                            <div class="col-12 col-lg-6 select-user-btnc">
                                <button type="button" class="btn select-user-btn btn-outline-secondary  mb-2 btn-block text-center">
                                     <?php echo $controller->name; ?> <hr class="p-0 m-2 mb-0"><small class="d-block"><?php echo $controller->uf; ?></small>

                                </button>
								 <input class="d-none" type="checkbox" name="users[]" value="<?php echo $controller->slug ?>">
                                  
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12">
                <div class="alert alert-secondary">
                    <h4 class="p-0 m-0 text-center  text-secondary">Profissionais</h4>
                    <hr>
                    <div class="form-row">
                        <?php foreach ($professionals as &$controller) { ?>
                            <div class="col-12 col-lg-6 select-user-btnc">
                                 <button type="button" class="btn select-user-btn btn-outline-secondary mb-2 btn-block text-center">
								
                                     <?php echo $controller->name; ?><hr class="p-0 m-2 mb-0"><small class="d-block"><?php
                                                                                                                                                $workarea = $controller->workarea;

                                                                                                                                                echo $workareasarr[$workarea];
                                                                                                                                                ?></small>
                                </button>
								  <input class="d-none" type="checkbox" name="users[]" value="<?php echo $controller->slug ?>">
                                 
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-12 col-md-6 col-lg-3">

        <div class="alert alert-secondary text-secondary">

            <div id="json" class="d-none">

            </div>
            <input type="hidden" name="saveandclose" id="saveandclose" value="false">
            <button id="submitbtn" class="btn btn-block btn-outline-secondary">Salvar</button>
            <hr>
            <button type="button" class="btn btn-block btn-secondary btn-close">Salvar e Fechar</button>

            <hr>
            <input type="checkbox" name="vib" value="true">
            <label class="d-inline"> Comentários visíveis a profissionais</label>

            <hr>
            <div id="alertbox" style="display: none">
                <div class="py-3">
                    <div class="alert alert-warning text-left p-2 py-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php echo $modals; ?>

<div class="modal fade" id="ShowBriefModal" tabindex="-1" role="dialog" aria-labelledby="ShowBriefModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dark " role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="ShowBriefModalLabel">Excluir Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                Perguntas:
                <div class="questslist">

                </div>
                <hr>

                <div class="form-row">
                    <div class="col-12">
                        <button type="button" data-dismiss="modal" class="btn btn-block btn-warning text-dark">Fechar</button>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>