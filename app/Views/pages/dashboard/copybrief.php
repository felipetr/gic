 <script src="<?php echo base_url('/assets/lib/touch-dnd.js') ?>"></script>


 <style>

 </style>



 <script>
     $(function() {

         function updatejson() {

             $('#json').html('');
             $('.sortablelist').find("li").removeClass('carregado').each(function(index) {
                 var dataslug = $(this).data('name');

                 if (dataslug) {
                     $('#json').append('<input type="text" readonly name="question[]" value="' + dataslug + '">');
                 }
             });





         }



         updatejson();
         $('.sortablelist').sortable({
             placeholder: 'btn alert-secondary mb-2 btn-block',
             cancel: '.pause'
         }).on('sortable:stop', function(e, ui) {

             updatejson();


         });

         $(document).on('click', ".editbtn", (function(e) {
             var $wa = $(this).parents('li');
             var dataid = $wa.data('id');
             var dataname = $wa.data('name');

             $('#EditWorkareaModal .waname').val(dataname);
             $('#EditWorkareaModal .type').val(<?php echo $type; ?>);
             $('#EditWorkareaModal #iduser').val(dataid);

             $('#EditWorkareaModal #alertbox').hide();
             $('#EditWorkareaModal').modal('show');


         }));


         $(".addwabtn").on('click', (function(e) {


             $('#NewWorkareaModal .waname').val('');
             $('#NewWorkareaModal .type').val(<?php echo $type; ?>);

             $('#NewWorkareaModal #alertbox').hide();
             $('#NewWorkareaModal').modal('show');

         }));


         $(document).on('click', ".trashbtn", (function(e) {

             var $wa = $(this).parents('li');
             var dataid = $wa.data('id');
             var datausername = $wa.data('name');

             $('#DeleteWorkareaModal #iduser').val(dataid);
             $('#DeleteWorkareaModal .nameofuser').text(datausername);
             $('#DeleteWorkareaModal .type').val(<?php echo $type; ?>);
             $('#DeleteWorkareaModal #alertbox').hide();
             $('#DeleteWorkareaModal').modal('show');

         }));


         $('#editwaform').on('submit', (function(e) {
             e.preventDefault();
             $('#EditWorkareaModal').modal('hide');
             var obid = $('#EditWorkareaModal #iduser').val();
             var $obj = $('#wa-' + obid);
             var novonome = $('#EditWorkareaModal .waname').val();
             if (novonome) {
                 $obj.data('name', novonome);
                 $obj.find('.username').html(novonome);
                 updatejson();
             }
         }));
         $('#removewaform').on('submit', (function(e) {
             e.preventDefault();

             var obid = $('#DeleteWorkareaModal #iduser').val();

             $('#DeleteWorkareaModal').modal('hide');
             $('#wa-' + obid).remove();
             updatejson();

         }));

         $('#newwaform').on('submit', (function(e) {
             e.preventDefault();
             var userid = $('.sortablelist>li').length;
             var waname = $('#newwaform .waname').val();
             if (waname) {
             var returndata = '<li id="wa-' + userid + '" data-name="' + waname + '" data-id="' + userid + '" class="btn alert-warning realul d-block mb-2 text-left" data-slug="' + userid + '">';
             returndata += '<span class="btn"><span class="username">' + waname + '</span>';
             returndata += '</span>';
             returndata += '<span class="float-right pause">';
             returndata += '<button type="button" data-id="' + userid + '" class="btn btn-danger text-white trashbtn"><i class="fas fa-trash"></i></button>';
             returndata += '<button type="button" data-id="' + userid + '" class="btn btn-info text-light editbtn"><i class="fas fa-edit"></i></button>';
             returndata += '</span>';
             returndata += '</li>';
             $('.sortablelist').append(returndata);
             $('#NewWorkareaModal').modal('hide');
             updatejson();
             }
         }));












     });
 </script>
 <form class="row" id="newbriefform">
     <div class="col-12 col-md-6 col-lg-9">
         Nome:
         <input class="form-control mb-3" name="name" value="Cópia de <?php echo $query->name; ?>" required>

         Perguntas:
         <ul class="sortablelist list">
             <?php
		$questions = json_decode($query->questions);



			 foreach ($questions as $key => $result) { ?>
                 <li id="wa-<?php echo $key; ?>" data-name="<?php echo $result; ?>" data-id="<?php echo $key; ?>" class="btn alert-warning realul d-block  mb-2 text-left" data-slug='<?php echo $key; ?>'>
                     <span class="btn"><span class="username"><?php echo $result; ?></span>
                         <?php


                               


                                ?></span>
                     <span class="float-right pause">
                         <button type="button" data-id="<?php echo $key; ?>" class="btn btn-danger text-white trashbtn"><i class="fas fa-trash"></i></button>
                         <button type="button" data-id="<?php echo $key; ?>" class="btn btn-info text-light editbtn"><i class="fas fa-edit"></i></button>
                     </span>
                 </li>
             <?php } ?>

         </ul>
         <button type="button" class="addwabtn btn btn-warning btn-block">Nova Pergunta</button>
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