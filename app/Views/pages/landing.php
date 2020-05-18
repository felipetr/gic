<div class="loginbox p-3">
    <form id="loginform" class="text-white">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" aria-label="E-mail" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text bg-warning border-warning chamaseta" id="basic-addon2"><i class="fas fa-at"></i></span>
            </div>
        </div>
        <input class="hidden" id="browserpass" type="password" style="display: none!important; visibility: hidden!important;">

        <div class="input-group mb-3">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha" aria-label="Senha" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text bg-warning border-warning chamaseta" id="basic-addon2"><i class="fas fa-key"></i></span>
            </div>
        </div>
        <div class="col-12 col-md-12 p-0 text-center text-md-right">



            <input type="checkbox" id="rememberChkBox" value="true">
            <label> Lembre de mim</label>
            <hr class="border-secondary">
        </div>
        <div id="alertbox" style="display: none">
            <div class="py-3">
                <div class="alert alert-warning text-left p-2 py-0">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-none d-md-block col-12 col-md-6 pb-0 text-center text-md-left">
                <a href="<?php echo base_url("Forgot"); 
				if(isset($_GET['redirect']))
				{
					echo '?redirect='.$_GET['redirect'];
				}
					
				?>" class="text-white btn btn-link px-0 mx-0 text-md-left"> Esqueci a Senha </a>
            </div>



            <div class="col-12 col-md-6 pb-0">
                <button class="btn btn-warning btn-block">Entrar</button>
            </div>
            <div class="d-block d-md-none col-12 col-md-6 pb-0 text-center text-md-left">
                <a href="<?php echo base_url("Forgot"); 
				if(isset($_GET['redirect']))
				{
					echo '?redirect='.$_GET['redirect'];
				}
				?>" class="text-white btn btn-link px-0 mx-0 text-md-left"> Esqueci a Senha </a>
            </div>
        </div>
    </form>
</div>

