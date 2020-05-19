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
	 
	 
	 
	 Categoria:
	
	 <select name="briefing" class="custom-select mb-3" required>
                        <option></option>
                        <?php foreach ($workareas as &$value) { ?>
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
	 
	 
	 
	 
	        Descrição:
                    <textarea name="address" class="addresssummernote"></textarea>
					
			
			
			<hr>
	<div class="form-row">		
		
			<div class="col-12 <?php if(!$logged->type) { echo  'col-sm-6 col-md-8'; } ?>">
			 Pasta do Google Drive:
				<input class="form-control mb-3" name="gdrive" required>
			</div>
				<?php if(!$logged->type) { ?>
			<div class="col-12 col-sm-6 col-md-4">
 Valor:
 
 
 <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">R$</span>
  </div>
  <input type="text" name= valor class="form-control money text-right" placeholder="0,00">
</div>
</div>
<?php } ?>
</div>

<hr>
       
	   
			


	 
     </div>
     <div class="col-12 col-md-6 col-lg-3">

         <div class="alert alert-secondary text-secondary">

             <div id="json" class="d-none">

             </div>
             <input type="hidden" name="saveandclose" id="saveandclose" value="false">
             <button id="submitbtn" class="btn btn-block btn-outline-secondary">Salvar</button>
             <hr>
             <button type="button" class="btn btn-block btn-secondary btn-close">Salvar e Fechar</button>

	<hr>
	<input type="checkbox" name="vib" value="true">
            <label> Comentários visíveis a profissionais</label>
			
	<hr>
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