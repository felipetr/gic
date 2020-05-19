 <script src="<?php echo base_url('/assets/lib/touch-dnd.js') ?>"></script>


 <style>

 </style>



 
 <form class="row" id="newbriefform">
     <div class="col-12 col-md-6 col-lg-9">
         Nome:
         <input class="form-control mb-3" name="name" required>

     Cliente:
	
	 <select name="costumer" class="custom-select mb-3" required>
                        <option></option>
                        <?php foreach ($costumers as &$value) { ?>
                            <option value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
                        <?php } ?>
     </select>
	 
	 
	 
	  Briefing:
	
	 <select name="briefing" class="custom-select mb-3" required>
                        <option></option>
                        <?php foreach ($briefings as &$value) { ?>
                            <option value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
                        <?php } ?>
     </select>
	 
	        Descrição do Projeto:
                    <textarea name="address" class="addresssummernote"></textarea>
					
			
			
			<hr>
			
			<?php if(!$logged->type) { ?>
			<div class="row">
			<div class="col-12 col-sm-6 col-md-8"> </div>
			<div class="col-12 col-sm-6 col-md-4">
 Valor:
 
 
 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">R$</span>
  </div>
  <input type="text" name= valor class="form-control money text-right" placeholder="0,00">
</div>
</div>
</div>


       
	   
			<?php } ?>
	 <script>
$(function () {


   

    
        $('.addresssummernote').summernote({
            height: 100,
            toolbar: false
        });
    
	});
</script>
	 
     </div>
     <div class="col-12 col-md-6 col-lg-3">

         <div class="alert alert-secondary text-secondary">

             <div id="json" class="d-none">

             </div>
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
         </div>
     </div>
 </form>
 <?php echo $modals; ?>