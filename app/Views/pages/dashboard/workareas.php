 <script src="<?php echo base_url('/assets/lib/touch-dnd.js') ?>"></script>


 <style>

 </style>



 <script>
     $(function() {
         $("#removewaform").submit(function() {




             $('#removewaform #alertbox').slideUp();

             setTimeout(function() {
                 var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
                 textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
                 $('#removewaform #alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                 $('#removewaform #alertbox').slideDown();
                 setTimeout(function() {




                     var formData = new FormData($('#removewaform')[0]);
                     $.ajax({
                         url: base_url + '/Save/removewa',
                         type: 'POST',
                         data: formData,
                         async: true,
                         cache: false,
                         contentType: false,
                         processData: false,
                         error: function(result) {
                             var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                             textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                             $('#removewaform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');
                         },
                         success: function(returndata) {

                             try {
                                 returndata = JSON.parse(returndata);


                                 var tipo = returndata.status;

                                 if (tipo == 'success') {

                                     var userid = returndata.validacao;

                                     $('#DeleteWorkareaModal').modal('hide');
                                     $('#wa-' + userid).remove();


                                 } else {
                                     var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                     textodealerta += '<ul class="m-0 p-0 pl-3">';
                                     textodealerta += returndata.validacao;
                                     textodealerta += '</ul></small>';

                                     $('#removewaform #alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                                 }
                             } catch (e) {

                                 var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                                 textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                                 $('#removewaform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                             }

                         }
                     });


                 }, 300);
             }, 300);
             return false;



         });
         $('#newwaform').on('submit', (function(e) {
             e.preventDefault();

             $.ajax({
                 url: base_url + '/Save/newwa',
                 type: 'POST',
                 data: new FormData(this),
                 async: true,
                 cache: false,
                 contentType: false,
                 processData: false,

                 success: function(returndata) {



                     $('.sortablelist').append(returndata);

                     $('#NewWorkareaModal').modal('hide');


                 }
             });

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




         $('.sortablelist').sortable({
             placeholder: 'btn alert-secondary mb-2 btn-block',
             cancel: '.pause'
         }).on('sortable:stop', function(e, ui) {

             savechange($('.sortablelist'));

         });

         function savechange($obj) {

             var arr = [];
             $($obj).find("li").removeClass('carregado').each(function(index) {
                 var dataslug = $(this).data('slug');
                 if (dataslug) {
                     arr.push(dataslug);
                 }

             });

             console.log(arr);

             var formData = new FormData;
             formData.append('type', <?php echo $type; ?>);
             formData.append('newsort', arr);

             $.ajax({
                 url: base_url + '/Save/reorderwa',
                 type: 'POST',
                 data: formData,
                 async: true,
                 cache: false,
                 contentType: false,
                 processData: false,

                 success: function(returndata) {



                 }
             });


         };

         $('#editwaform').on('submit', (function(e) {
             e.preventDefault();

             $.ajax({
                 url: base_url + '/Save/editwa',
                 type: 'POST',
                 data: new FormData(this),
                 async: true,
                 cache: false,
                 contentType: false,
                 processData: false,

                 success: function(returndata) {

                     var novonome = $('#EditWorkareaModal .waname').val();
                     var obid = $('#EditWorkareaModal #iduser').val();
                     var $obj = $('#wa-' + obid);
                     $('#EditWorkareaModal').modal('hide');
                     $obj.data('name', novonome);
                     $obj.find('.username').html(novonome);

                 }
             });

         }));
     });
 </script>
 <ul class="sortablelist list">
     <?php foreach ($query as $key => $result) { ?>
         <li id="wa-<?php echo $result->id; ?>" data-name="<?php echo $result->name; ?>" data-id="<?php echo $result->id; ?>" class="btn alert-warning realul d-block  mb-2 text-left" data-slug='<?php echo $result->slug; ?>'>
             <span class="btn"><span class="username"><?php echo $result->name; ?></span>
                 <?php


                        if ($result->contagem) {
                            echo '<small class="badge bg-danger text-white ml-2">';
                            echo $result->contagem;
                            echo '</small>';
                        }


                        ?></span>
             <span class="float-right pause">
                 <button data-id="<?php echo $result->id; ?>" class="btn btn-danger text-white trashbtn"><i class="fas fa-trash"></i></button>
                 <button data-id="<?php echo $result->id; ?>" class="btn btn-info text-light editbtn"><i class="fas fa-edit"></i></button>

                 <form class="d-inline" target="_blank" action="<?php echo base_url('/Dashboard/' . $typeofuser . '/list'); ?>" method="POST">
                     <input type="hidden" name="workarea[]" value="<?php echo $result->slug; ?>">
                     <button class="btn btn-dark text-warning trashbtn"><i class="fas fa-eye"></i></button>
                 </form>
             </span>
         </li>
     <?php } ?>

 </ul>
 <button class="addwabtn alert btn-warning btn-block">Adicionar</button>
 <?php echo $modals; ?>