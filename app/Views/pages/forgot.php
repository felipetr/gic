<div class="loginbox p-3">
    <form id="forgotform" class="text-white text-left">
        <h4 class="font-weight-light p-0 m-0 text-center">Recuperação de Senha</h4>
        <hr class="border-light">
        Email:
        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="E-mail" required>

        Código de Verificação:
        <div class="codinputbox" style="display:none;">
            <div class="row">
                <div class="col-12 col-sm-6 mb-3">
                    <input name="code" id="code" class="form-control  text-center codemask" placeholder="0  0  0  0">
                </div>
                <div class="col-12 col-sm-6  mb-3">
                    <button type="button" class="btn btn-outline-warning  reenviacode btn-block">Reenviar código</button>
                    <button type="button" style="display: none" class="btn border border-light text-white loadingcode btn-block mt-0">Novo envio em <span class="segundos"></span>...</button>
                </div>
            </div>
        </div>
        <div class="codselectbox">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <button type="button" class="btn mb-3 btn-outline-warning  enviacode btn-block">Enviar código</button>
                </div>
                <div class="col-12 col-sm-6">
                    <button type="button" class="btn mb-3 btn-outline-warning alreadycode  btn-block">Já tenho</button>
                </div>
            </div>
        </div>
        <hr class="border-light">
        <div id="alertbox" style="display: none">
            <div class="py-3">
                <div class="alert alert-warning text-left p-2 py-0">
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-12">
                <button class="btn btn-warning btn-block">Validar</button>
            </div>
            <div class="col-12 pb-0 text-center text-md-left">
                <a href="<?php echo base_url(""); ?>" class="text-white btn btn-link px-0 mx-0 text-md-left"> Logar-se </a>
            </div>
        </div>
    </form>
</div>