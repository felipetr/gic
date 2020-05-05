<div class="loginbox p-3">
    <form id="recoverform" class="text-white">
    <h4 class="font-weight-light p-0 m-0 text-center">Recuperação de Senha</h4>
            <hr class="border-light">
        <div class="row text-left">
            

        
            <div class="col-12  pb-3">
           
                Nova Senha:
                <div class="input-group mb-3 inputgroup-pass">
                    <input required id="newpass" name="newpass" type="password" class="form-control">
                    <div class="input-group-append">
                        <button data-slash="0" class="btn btn-warning" type="button"><i class="fas fa-eye-slash"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-12  pb-3">
                Redigitar Senha:
                <div class="input-group mb-3 inputgroup-pass">
                    <input required id="newpass2" name="newpass2" type="password" class="form-control">
                    <div class="input-group-append">
                        <button data-slash="0" class="btn btn-warning" type="button"><i class="fas fa-eye-slash"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="alertbox" style="display: none">
                    <div class="py-3">
                        <div class="alert alert-warning text-left p-2 py-0">
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="d-none d-md-block col-12 col-md-6 pb-0 text-center text-md-left">
                <a href="<?php echo base_url("Forgot"); ?>" class="text-white btn btn-link px-0 mx-0 text-md-left"> Esqueci a Senha </a>
            </div>



            <div class="col-12 col-md-6 pb-0">
                <button class="btn btn-warning btn-block">Recuperar</button>
            </div>
            <div class="d-block d-md-none col-12 col-md-6 pb-0 text-center text-md-left">
                <a href="<?php echo base_url("/forgot"); ?>" class="text-white btn btn-link px-0 mx-0 text-md-left"> Esqueci a Senha </a>
            </div>
        </div>
    </form>
</div>