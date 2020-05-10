<div class="modal fade" id="DeleteWorkareaModal" tabindex="-1" role="dialog" aria-labelledby="DeleteWorkareaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark " role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteWorkareaModalLabel">Excluir Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="removewaform" class="text-center">
	  <input name="iduser" value="" type="hidden" id="iduser">
	  <input name="type" class="type" type="hidden">
	  Tem certeza que deseja deletar a pergunta "<b class="d-inline-block nameofuser"></b>" ?
	  
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



<div class="modal fade" id="EditWorkareaModal" tabindex="-1" role="dialog" aria-labelledby="EditWorkareaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark " role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="EditWorkareaModalLabel">Editar Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="editwaform" class="text-center">
	  <input name="iduser" value="" type="hidden" id="iduser">
	  
	  <input name="type" class="type" type="hidden">
	  
	  <input class="form-control waname" name="waname" value="">
	  
	  <div id="alertbox" style="display: none">
                            <div class="py-3">
                                <div class="alert alert-warning text-left p-2 py-0">
                                </div>
                            </div>
                </div>
	  <hr>
	  
	  <div class="form-row">
	  <div class="col-6">
	  <button class="btn btn-block btn-success">Salvar</button>
	  </div>
	  <div class="col-6">
	  <button type="button" data-dismiss="modal" class="btn btn-block btn-danger">Cancelar</button>
	  </div>
	  </div>
	  </form>
	 
 
		
		
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="NewWorkareaModal" tabindex="-1" role="dialog" aria-labelledby="NewWorkareaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark " role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="NewWorkareaModalLabel">Nova Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="newwaform" class="text-center">
	  <input name="iduser" value="" type="hidden" id="iduser">
	  
	  <input name="type" class="type" type="hidden">
	  
	  <input class="form-control waname" name="waname" value="">
	  
	  <div id="alertbox" style="display: none">
                            <div class="py-3">
                                <div class="alert alert-warning text-left p-2 py-0">
                                </div>
                            </div>
                </div>
	  <hr>
	  
	  <div class="form-row">
	  <div class="col-6">
	  <button class="btn btn-block btn-success">Salvar</button>
	  </div>
	  <div class="col-6">
	  <button type="button" data-dismiss="modal" class="btn btn-block btn-danger">Cancelar</button>
	  </div>
	  </div>
	  </form>
	 
 
		
		
      </div>
    </div>
  </div>
</div>
