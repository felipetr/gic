<form id="newuserform">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-9">
            <div class="form-row">
                <div class="col-12 col-xl-<?php if ($typeofuser == 3) {
                                                echo '12';
                                            } else {
                                                echo '9';
                                            } ?>">
                    <?php if ($typeofuser == 3) {
                        echo 'Razão Social';
                    } else {
                        echo 'Nome';
                    } ?><small class="text-danger">*</small>
                    <input class="form-control mb-3" name="<?php if ($typeofuser == 3) {
                                                echo 'fantasia';
                                            } else {
                                                echo 'name';
                                            } ?>" required>
                </div>
                <div class="col-12 col-xl-3 pb-3 <?php if ($typeofuser == 3) {
                                                        echo 'd-none';
                                                    } else {
                                                        echo '';
                                                    } ?>">
                    Gênero
                    <select name="gender" class="custom-select" required>
                        <option selected value="x">Prefiro não informar</option>
                        <option value="a">Feminino</option>
                        <option value="o">Masculino</option>
                    </select>
                </div>

                <div class="col-12 pb-3 <?php if ($typeofuser == 3) {
                                            echo '';
                                        } else {
                                            echo 'd-none';
                                        } ?>">
                    Nome Fantasia<small class="text-danger">*</small>
                    <input class="form-control mb-3" name="<?php if ($typeofuser == 3) {
                                                echo 'name';
                                            } else {
                                                echo 'fantasia';
                                            } ?>" required value="<?php if ($typeofuser == 3) {
                                                                                        echo '';
                                                                                    } else {
                                                                                        echo 'NULL';
                                                                                    } ?>">
                </div>


                <?php
                $col = 3;
                if ($typeofuser > 2) {
                    $col = 4;
                } ?>
                <div class="col-12 col-xl-<?php echo $col;
                                            if ($col != 4) {
                                                echo ' d-none';
                                            } ?> pb-3">
                     <?php if ($typeofuser == 3) {
                                            echo 'CNPJ';
                                        } else {
                                            echo 'CPF';
                                        } ?><small class="text-secondary">(apenas números)</small> <small class="text-danger">*</small>
                    <input type="text" name="cpf" class="form-control <?php if ($typeofuser == 3) {
                                            echo 'cnpj';
                                        } else {
                                            echo 'cpf';
                                        } ?>" value="" <?php if ($col == 4) {
                                                                                                echo 'required';
                                                                                            } ?>>
                </div>
                <div class="col-12 col-xl-<?php echo $col;
                                            if ($col != 4) {
                                                echo ' d-none';
                                            } ?> pb-3">
                    Data de Nascimento
                    <input type="date" name="nascimento" class="form-control" value="">
                </div>
                <div class="col-12 col-xl-<?php echo $col;
                                            if ($col != 4) {
                                                echo ' d-none';
                                            } ?> pb-3">
                    Área de Atuação<small class="text-danger">*</small>
                    <select name="workarea" class="custom-select" <?php if ($col == 6) {
                                                                        echo 'required';
                                                                    } ?>>
                        <option></option>
                        <?php foreach ($workarea as &$value) { ?>
                            <option value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-12 col-xl-4 pb-3">
                    Email<small class="text-danger">*</small>
                    <input type="email" name="email" class="form-control" value="" required>
                </div>

                <div class="col-12 col-xl-4 pb-3">
                    Conta Google <small class="text-secondary">(Para o Google Docs)</small>
                    <input type="email" name="google_account" class="form-control" value="">
                </div>
                <div class="col-12 col-xl-4 pb-3">
                    Estado<small class="text-danger">*</small>
                    <select name="state" class="custom-select" required>
                        <option value=""></option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Extrangeiro</option>
                    </select>
                </div>
                <div class="col-12 col-xl-4 pb-3">
                    Whatsapp<small class="text-danger">*</small>
                    <input type="text" name="whatsapp" class="form-control mobile" value="" required>
                </div>
                <div class="col-12 col-xl-4 pb-3">
                    Móvel 2 <small class="text-secondary">(opcional)</small>
                    <input type="text" name="mobile" class="form-control mobile" value="">
                </div>
                <div class="col-12 col-xl-4 pb-3">
                    Telefone Fixo <small class="text-secondary">(opcional)</small>
                    <input type="text" name="comercial" class="form-control fixo" value="">
                </div>



                <div class="col-12 col-xl-12 pb-3 <?php if ($typeofuser != 3) {
                                                        echo 'd-none';
                                                    } ?>">
                    Endereço Completo <small class="text-secondary">(opcional)</small>
                    <textarea name="address" class="addresssummernote"></textarea>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12 col-md-6 col-lg-4 pb-0 pb-lg-3">
                    Senha:
                    <div class="input-group mb-3 inputgroup-pass">
                        <input required id="newpass" name="newpass" type="password" class="form-control">
                        <div class="input-group-append">
                            <button data-slash="0" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye-slash"></i></button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 pb-0 pb-lg-3">
                    Redigitar Senha:
                    <div class="input-group mb-3 inputgroup-pass">
                        <input required id="newpass2" name="newpass2" type="password" class="form-control">
                        <div class="input-group-append">
                            <button data-slash="0" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye-slash"></i></button>
                        </div>
                    </div>

                </div>


                <div class="col-12 col-lg-4 pb-3">
                    <span class="d-none d-lg-block">&nbsp;</span>
                    <button type="button" class="btn btn-block btn-secondary generatepass">Gerar Senha</button>
                </div>
            </div>
            <div class="<?php if ($typeofuser != 4) {
                            echo 'd-none';
                        } else { } ?>">
                <div class="<?php if ($typeofuser < 3) {
                                echo 'd-none';
                            } ?>">
                    <hr>
                    <div class="mb-3">
                        Currículo <small class="text-secondary">(PDF, DOC, DOCX, ODT ou RTF com limite máximo de 8mb)</small>
                        <div>
                            <button type="button" class="btn sendcvbtn btn-secondary">Enviar</button>
                            <div class="btn border-0 text-secondary ml-1 nomearquivo">Selecione um arquivo</div>
                            <input type="hidden" name="cv" class="nomearquivoval">
                        </div>


                        <div class="cvprogressbarbox" style="display: none">
                            <p></p>
                            <div class="progress">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                        <div id="cvalertbox" style="display: none">
                            <div class="py-3">
                                <div class="alert alert-warning text-left p-2 py-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        Portfólio
                        <input type="url" name="portifolio" class="form-control" value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            &nbsp;
            <div class="alert alert-secondary text-secondary">
                <input type="hidden" name="type" value="<?php echo $typeofuser; ?>">
                <input type="hidden" name="saveandclose" id="saveandclose" value="false">
                <button id="submitbtn" class="btn btn-block btn-outline-secondary">Salvar</button>
                <hr>
                <button type="button" class="btn btn-block btn-secondary btn-close">Salvar e Fechar</button>

                <div id="alertbox" style="display: none">
                    <div class="py-3">
                        <div class="alert alert-warning text-left p-2 py-0">
                        </div>
                    </div>
                </div>

                <?php if ($typeofuser == 3) { ?>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>
                    <div class="autocompletebox mb-3">
                        <hr>
                        Briefing
                        <input class="form-control bancoinput realselect">
                        <input name="briefing" type="hidden" class="inputvalue">
                        <div id="briefinglist" class="fakelist" style="display:none;">

                            <?php foreach ($briefings as &$brief) { ?>
                                <div class="fakeoption" data-value="<?php echo $brief->slug; ?>" data-text="<?php echo $brief->name; ?>"><?php echo $brief->name; ?> <button type="button" class="btn btn-warning btn-sm float-right text-dark btn-seequest" "><span class=" d-none questions"><?php echo $brief->questions; ?></span><i class="fas fa-eye"></i></button></div>
                            <?php } ?>

                            <div class="p-1"></div>

                        </div>
                    </div>



                <?php } else { ?>
                    <input type="hidden" name="briefing">
                    <input name="briefing2" type="hidden">
                <?php } ?>

                <div class="<?php if ($typeofuser != 4) {
                                echo 'd-none';
                            } else { } ?>">



                    <hr>

                    <h5 class="p-0 p-0 mb-3">Dados Bancários</h5>
                    Banco
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>
                    <script>
                        $(function() {


                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', base_url + '/ListaBancos');

                            xhr.responseType = 'text';

                            xhr.send();

                            // the response is {"message": "Hello, world!"}
                            xhr.onload = function() {
                                var responseObj = JSON.parse(xhr.response);

                                // alert(responseObj[0]['nome_extenso']);
                                for (i = 0; i < responseObj.length; i++) {

                                    var thisbank = responseObj[i];


                                    try {
                                        var thisnome = thisbank.nome_extenso;
                                    } catch (e) {
                                        try {
                                            var thisnome = thisbank.nome_reduzido;
                                        } catch (e) {
                                            var thisnome = '';
                                        }
                                    }

                                    if (thisnome == null) {
                                        thisnome = '';
                                    }

                                    thisnome = thisnome.replace('"', '');
                                    var thiscod = thisbank.numero_codigo;

                                    var thisnome2 = thisnome.toLowerCase();
                                    if (thisnome.length > 100) {
                                        thisnome = thisbank.nome_reduzido;
                                    }

                                    var option = '<div class="fakeoption" data-value="' + thiscod + '" data-text="' + thiscod + ' - ' + thisnome2 + '">' + thiscod + ' - ' + thisnome + '</div>';

                                    $('#bancolist').append(option);
                                }

                            };



                        });
                    </script>
                    <div class="autocompletebox mb-3">
                        <input class="form-control bancoinput realselect" name="bancopress">
                        <input name="banco" type="hidden" class="inputvalue">
                        <div id="bancolist" class="fakelist" style="display:none;">
                        </div>
                    </div>
                    Tipo de Conta
                    <select class="custom-select mb-3" name="tipoconta">
                        <option></option>
                        <option value="CC">Corrente</option>
                        <option value="CP">Poupança</option>
                        <option value="CS">Salário</option>
                        <option value="CD">Digital</option>
                        <option value="CU">Universitária</option>
                    </select>
                    <div class="form-row mb-3">
                        <div class="col-8">
                            Agência
                            <input class="form-control onlynumbers" name="ag">
                        </div>
                        <div class="col-1 text-center">
                            &nbsp;
                            <div class="tracodig">-</div>
                        </div>
                        <div class="col-3">
                            &nbsp;
                            <input class="form-control onlynumbers" name="agd">
                        </div>

                    </div>

                    <div class="form-row mb-3">
                        <div class="col-8">
                            Conta
                            <input class="form-control onlynumbers" name="conta">
                        </div>
                        <div class="col-1 text-center">
                            &nbsp;
                            <div class="tracodig">-</div>
                        </div>
                        <div class="col-3">
                            &nbsp;
                            <input class="form-control onlynumbers" name="contad">
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</form>
<script>
    $(function() {





        $('.addresssummernote').summernote({
            height: 100,
            toolbar: false
        });

    });
</script>

<?php echo $generatepassmodal; ?>



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