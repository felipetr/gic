  <form id="edituserform">
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
                      <input class="form-control mb-3" name="name" value="<?php echo $query->name; ?>" required>
                  </div>
                  <div class="col-12 col-xl-3 pb-3 <?php if ($typeofuser == 3) {
                                                        echo 'd-none';
                                                    } else {
                                                        echo '';
                                                    } ?>">
                      Gênero
                      <select name="gender" class="custom-select" required>
                          <option selected value="x">Prefiro não informar</option>
                          <option <?php if ($query->gender == 'a') {
                                        echo 'selected';
                                    } ?> value="a">Feminino</option>
                          <option <?php if ($query->gender == 'o') {
                                        echo 'selected';
                                    } ?> value="o">Masculino</option>
                      </select>
                  </div>

                  <div class="col-12 pb-3 <?php if ($typeofuser == 3) {
                                                echo '';
                                            } else {
                                                echo 'd-none';
                                            } ?>">
                      Nome Fantasia<small class="text-danger">*</small>
                      <input value="<?php echo $query->fantasia; ?>" class="form-control mb-3" name="fantasia" required value="<?php if ($typeofuser == 3) {
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
                                                                        } ?>" value="<?php $cpf = $query->cpf;
                                                                                        $cpf = str_replace('.', '', $cpf);
                                                                                        $cpf = str_replace('-', '', $cpf);
                                                                                        $cpf = str_replace('/', '', $cpf);
                                                                                        echo $cpf;

                                                                                        ?>" <?php if ($col == 4) {
                                                                                                echo 'required';
                                                                                            } ?>>
                  </div>
                  <div class="col-12 col-xl-<?php echo $col;
                                            if ($col != 4) {
                                                echo ' d-none';
                                            } ?> pb-3">
                      Data de Nascimento

                      <input type="date" name="nascimento" class="form-control" value="<?php echo $query->nascimento; ?>">
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
                              <option <?php if ($query->workarea == $value->slug) {
                                                echo 'selected';
                                            } ?> value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
                          <?php } ?>
                      </select>
                  </div>
                  <div class="col-12 col-xl-4 pb-3">
                      Email<small class="text-danger">*</small>
                      <input type="email" name="email" class="form-control" value="<?php echo $query->email; ?>" required>
                  </div>

                  <div class="col-12 col-xl-4 pb-3">
                      Conta Google <small class="text-secondary">(Para o Google Docs)</small>
                      <input type="email" name="google_account" class="form-control" value="<?php echo $query->google_account; ?>">
                  </div>
                  <div class="col-12 col-xl-4 pb-3">
                      Estado<small class="text-danger">*</small>
                      <select name="state" class="custom-select" required>
                          <option value=""></option>
                          <option <?php if ($query->uf == 'AC') {
                                        echo 'selected';
                                    } ?> value="AC">Acre</option>
                          <option <?php if ($query->uf == 'AL') {
                                        echo 'selected';
                                    } ?> value="AL">Alagoas</option>
                          <option <?php if ($query->uf == 'AP') {
                                        echo 'selected';
                                    } ?> value="AP">Amapá</option>
                          <option <?php if ($query->uf == 'AM') {
                                        echo 'selected';
                                    } ?> value="AM">Amazonas</option>
                          <option <?php if ($query->uf == 'BA') {
                                        echo 'selected';
                                    } ?> value="BA">Bahia</option>
                          <option <?php if ($query->uf == 'CE') {
                                        echo 'selected';
                                    } ?> value="CE">Ceará</option>
                          <option <?php if ($query->uf == 'DF') {
                                        echo 'selected';
                                    } ?> value="DF">Distrito Federal</option>
                          <option <?php if ($query->uf == 'ES') {
                                        echo 'selected';
                                    } ?> value="ES">Espírito Santo</option>
                          <option <?php if ($query->uf == 'GO') {
                                        echo 'selected';
                                    } ?> value="GO">Goiás</option>
                          <option <?php if ($query->uf == 'MA') {
                                        echo 'selected';
                                    } ?> value="MA">Maranhão</option>
                          <option <?php if ($query->uf == 'MT') {
                                        echo 'selected';
                                    } ?> value="MT">Mato Grosso</option>
                          <option <?php if ($query->uf == 'MS') {
                                        echo 'selected';
                                    } ?> value="MS">Mato Grosso do Sul</option>
                          <option <?php if ($query->uf == 'MG') {
                                        echo 'selected';
                                    } ?> value="MG">Minas Gerais</option>
                          <option <?php if ($query->uf == 'PA') {
                                        echo 'selected';
                                    } ?> value="PA">Pará</option>
                          <option <?php if ($query->uf == 'PB') {
                                        echo 'selected';
                                    } ?> value="PB">Paraíba</option>
                          <option <?php if ($query->uf == 'PR') {
                                        echo 'selected';
                                    } ?> value="PR">Paraná</option>
                          <option <?php if ($query->uf == 'PE') {
                                        echo 'selected';
                                    } ?> value="PE">Pernambuco</option>
                          <option <?php if ($query->uf == 'PI') {
                                        echo 'selected';
                                    } ?> value="PI">Piauí</option>
                          <option <?php if ($query->uf == 'RJ') {
                                        echo 'selected';
                                    } ?> value="RJ">Rio de Janeiro</option>
                          <option <?php if ($query->uf == 'RN') {
                                        echo 'selected';
                                    } ?> value="RN">Rio Grande do Norte</option>
                          <option <?php if ($query->uf == 'RS') {
                                        echo 'selected';
                                    } ?> value="RS">Rio Grande do Sul</option>
                          <option <?php if ($query->uf == 'RO') {
                                        echo 'selected';
                                    } ?> value="RO">Rondônia</option>
                          <option <?php if ($query->uf == 'RR') {
                                        echo 'selected';
                                    } ?> value="RR">Roraima</option>
                          <option <?php if ($query->uf == 'SC') {
                                        echo 'selected';
                                    } ?> value="SC">Santa Catarina</option>
                          <option <?php if ($query->uf == 'SP') {
                                        echo 'selected';
                                    } ?> value="SP">São Paulo</option>
                          <option <?php if ($query->uf == 'SE') {
                                        echo 'selected';
                                    } ?> value="SE">Sergipe</option>
                          <option <?php if ($query->uf == 'TO') {
                                        echo 'selected';
                                    } ?> value="TO">Tocantins</option>
                          <option <?php if ($query->uf == 'EX') {
                                        echo 'selected';
                                    } ?> value="EX">Extrangeiro</option>
                      </select>
                  </div>
                  <div class="col-12 col-xl-4 pb-3">
                      Whatsapp<small class="text-danger">*</small>
                      <input type="text" name="whatsapp" class="form-control mobile" value="<?php echo $query->whatsapp; ?>" required>
                  </div>
                  <div class="col-12 col-xl-4 pb-3">
                      Móvel 2 <small class="text-secondary">(opcional)</small>
                      <input type="text" name="mobile" class="form-control mobile" value="<?php echo $query->mobile; ?>">
                  </div>
                  <div class="col-12 col-xl-4 pb-3">
                      Telefone Fixo <small class="text-secondary">(opcional)</small>
                      <input type="text" name="comercial" class="form-control fixo" value="<?php echo $query->comercial; ?>">
                  </div>



                  <div class="col-12 col-xl-12 pb-3 <?php if ($typeofuser != 3) {
                                                        echo 'd-none';
                                                    } ?>">
                      Endereço Completo <small class="text-secondary">(opcional)</small>
                      <textarea name="address" class="addresssummernote"><?php echo $query->address; ?></textarea>
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
                          Portfólio
                          <input type="url" name="portifolio" class="form-control" value="<?php echo $query->folio; ?>">
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
              &nbsp;
              <div class="alert alert-secondary text-secondary">
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
                      <hr>
                      Briefing
                      <?php
                            if ($query->briefing_replyed) {

                                ?>
                          <a target="_blank" href="<?php echo base_url('/Briefing/user/view/'.$query->slug); ?>" class="btn btn-block btn-warning ">Ver Briefing</a>
                          <input name="briefing" type="hidden" value="<?php echo $query->briefing; ?>">
                      <?php

                            } else {
                                ?>


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



                      <?php }
                        } else { ?>

                      <input name="briefing" type="hidden">
                  <?php } ?>
                  <div class="<?php if ($typeofuser != 4) {
                                    echo 'd-none';
                                } else { } ?>">


                      <hr>
                      <div>
                          <hr>
                          Avaliação
                          <div class="alert alert-light">
                              <input type="hidden" id="avalia" name="avalia" value="<?php echo $query->status; ?>">
                              <div class="form-row">
                                  <div class="col-12 col-sm-4">
                                      <button data-avalia="1" type="button" class="btn btn<?php if ($query->status != 1) {
                                                                                                echo '-outline';
                                                                                            } ?>-danger btn-avalia btn-block">C</button>
                                  </div>
                                  <div class="col-12 col-sm-4">
                                      <button data-avalia="2" type="button" class="btn btn<?php if ($query->status != 2) {
                                                                                                echo '-outline';
                                                                                            } ?>-warning btn-avalia btn-block">B</button>
                                  </div>
                                  <div class="col-12 col-sm-4">
                                      <button data-avalia="3" type="button" class="btn btn<?php if ($query->status != 3) {
                                                                                                echo '-outline';
                                                                                            } ?>-success btn-avalia btn-block">A</button>
                                  </div>
                              </div>
                          </div>
                      </div>
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
                          <input class="form-control bancoinput realselect" name="bancopress" value="<?php echo $query->banco; ?>">
                          <input name="banco" type="hidden" class="inputvalue" value="<?php echo $query->banco; ?>">
                          <div id="bancolist" class="fakelist" style="display:none;">
                          </div>
                      </div>
                      Tipo de Conta
                      <select class="custom-select mb-3" name="tipoconta">
                          <option></option>
                          <option <?php if ($query->uf == 'CC') {
                                        echo 'selected';
                                    } ?> value="CC">Corrente</option>
                          <option <?php if ($query->uf == 'CP') {
                                        echo 'selected';
                                    } ?> value="CP">Poupança</option>
                          <option <?php if ($query->uf == 'CS') {
                                        echo 'selected';
                                    } ?> value="CS">Salário</option>
                          <option <?php if ($query->uf == 'CD') {
                                        echo 'selected';
                                    } ?> value="CD">Digital</option>
                          <option <?php if ($query->uf == 'CU') {
                                        echo 'selected';
                                    } ?> value="CU">Universitária</option>
                      </select>
                      <div class="form-row mb-3">
                          <div class="col-8">
                              Agência
                              <input value="<?php echo $query->agencia; ?>" class="form-control onlynumbers" name="ag">
                          </div>
                          <div class="col-1 text-center">
                              &nbsp;
                              <div class="tracodig">-</div>
                          </div>
                          <div class="col-3">
                              &nbsp;
                              <input class="form-control onlynumbers" value="<?php echo $query->agd; ?>" name="agd">
                          </div>

                      </div>

                      <div class="form-row mb-3">
                          <div class="col-8">
                              Conta
                              <input value="<?php echo $query->conta; ?>" class="form-control onlynumbers" name="conta">
                          </div>
                          <div class="col-1 text-center">
                              &nbsp;
                              <div class="tracodig">-</div>
                          </div>
                          <div class="col-3">
                              &nbsp;
                              <input value="<?php echo $query->contad; ?>" class="form-control onlynumbers" name="contad">
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