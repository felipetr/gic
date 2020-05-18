 <script src="<?php echo base_url('/assets/lib/touch-dnd.js') ?>"></script>


 <style>

 </style>



 
 <form class="row" id="newbriefform">
     <div class="col-12 col-md-6 col-lg-9">
         Nome:
         <input class="form-control mb-3" name="name" required>

     Cliente:
	 <pre>
	 <?php print_r($costumers); ?>
	 </pre>

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