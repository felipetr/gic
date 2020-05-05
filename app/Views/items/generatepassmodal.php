<div class="modal fade" id="GeneratePassModal" tabindex="-1" role="dialog" aria-labelledby="GeneratePassModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dark" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="GeneratePassModalLabel">Gerar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

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