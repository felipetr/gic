<div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark " role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteUserModalLabel">Excluir Briefing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form id="removebriefform" class="text-center">
	  <input name="iduser" value="" type="hidden" id="iduser">
	  
	  Tem certeza que deseja deletar o briefing <b class="d-inline-block nameofuser"></b>?
	  
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