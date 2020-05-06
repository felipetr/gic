<div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark " role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteUserModalLabel">Excluir Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="removeuserform" class="text-center">
	  <input name="iduser" value="" type="hidden" id="iduser">
	  
	  Tem certeza que deseja deletar o usuário <b class="d-inline-block nameofuser"></b>?
	  
	  <div id="alertbox" style="display: none">
                            <div class="py-3">
                                <div class="alert alert-warning text-left p-2 py-0">
                                </div>
                            </div>
                </div>
	  <hr>
	  
	  <div class="form-row">
	  <div class="col-6">
	  <button class="btn btn-block btn-success">Sim</button>
	  </div>
	  <div class="col-6">
	  <button type="button" data-dismiss="modal" class="btn btn-block btn-danger">Não</button>
	  </div>
	  </div>
	  </form>
	 
 
		
		
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="NewPassModal" tabindex="-1" role="dialog" aria-labelledby="NewPassModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="NewPassModalLabel">Alterar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="changepassuser">
	  <input name="iduser" value="" type="hidden" id="iduser">
	  
	  <div class="pb-3">
                    Senha:
                    <div class="input-group mb-3 inputgroup-pass">
                        <input required id="newpass" name="newpass" type="password" class="form-control">
                        <div class="input-group-append">
                            <button data-slash="0" class="btn btn-warning" type="button"><i class="fas fa-eye-slash"></i></button>
                        </div>
                    </div>
                </div>

                <div class="pb-3">
                    Redigitar Senha:
                    <div class="input-group mb-3 inputgroup-pass">
                        <input required id="newpass2" name="newpass2" type="password" class="form-control">
                        <div class="input-group-append">
                            <button data-slash="0" class="btn btn-warning" type="button"><i class="fas fa-eye-slash"></i></button>
                        </div>
                    </div>

                </div>  
	  
				<div id="alertbox" style="display: none">
                            <div class="py-3">
                                <div class="alert alert-warning text-left p-2 py-0">
                                </div>
                            </div>
                </div>
	  <div class="form-row">
		<div class="col-12 col-md-6">
		
            </div>
          <div class="col-12 col-md-6">
            <button class="btn-block btn btn-warning">Salvar</button>
          </div>
	  </div>
	  </form>
	  <hr>
Gerar senha:
        <input id="passgenerated" class="form-control text-center">

        <hr>
        <div class="form-row">
          <div class="col-12 col-md-6">
            <button class="generatenewpass btn-block btn btn-secondary"><i class="fas fa-random"></i> Gerar Nova Senha</button>
          </div>
          <div class="col-12 col-md-6">
            <button class="copypass btn-block btn btn-warning" data-container="body" data-toggle="popover" data-placement="top" data-content="Senha copiada com sucesso!"><i class="fas fa-copy"></i> Copiar Senha</button>
          </div>
        </div>
		
		
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="IdCardModal" tabindex="-1" role="dialog" aria-labelledby="IdCardModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="IdCardModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  </div>
    </div>
  </div>
</div>