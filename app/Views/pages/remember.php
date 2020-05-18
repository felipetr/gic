<div class="loginbox p-3">
    <div id="loginform">
        <a href="<?php

if(isset($_GET['redirect']))
				{
					echo base_url($_GET['redirect']);
				} else {
		echo base_url('/Dashboard');
				}
		?>" class="btn btn-block btn-warning mb-3"><?php echo $title; ?></a>
        <a href="<?php echo base_url('/Dashboard/logout'); 
		
		if(isset($_GET['redirect']))
				{
					echo '?redirect='.$_GET['redirect'];
				}
		
		?>" class="btn btn-block btn-outline-warning  mb-3">Entrar com outra conta</a>
    </div>
</div>
<script>
    var datapage = 'remember';
</script>