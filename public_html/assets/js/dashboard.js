$(function () {


  

        $('.mobile').mask('00 0 0000.0000');
        $('.mobile').mask('00 0 0000.0000');
        $('.money').mask("#.##0,00", {reverse: true});
        $('.onlynumbers').mask('000000000000000000000000000000');
        $('.date').mask('00/00/0000');
        $('.summernote').summernote();
        $('.addresssummernote').summernote({
            height: 100,
            toolbar: false
        });
		
		

		
    
  $("#removebriefform").submit(function () {

        $('#removebriefform #alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
            $('#removebriefform #alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            $('#removebriefform #alertbox').slideDown();
            setTimeout(function () {




                var formData = new FormData($('#removebriefform')[0]);
                $.ajax({
                    url: base_url + '/Save/removebrief',
                    type: 'POST',
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function (result) {
                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                        $('#removebriefform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');
                    },
                    success: function (returndata) {

                        try {
                            returndata = JSON.parse(returndata);


                            var tipo = returndata.status;

                            if (tipo == 'success') {

                                var userid = returndata.validacao;

                                $('#DeleteUserModal').modal('hide');
                                $('#user-' + userid).remove();


                            } else {
                                var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                textodealerta += '<ul class="m-0 p-0 pl-3">';
                                textodealerta += returndata.validacao;
                                textodealerta += '</ul></small>';

                                $('#removebriefform #alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                            }
                        } catch (e) {

                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                            $('#removebriefform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                        }

                    }
                });


            }, 300);
        }, 300);
        return false;



    });

    $('#newbriefform').on('submit', (function (e) {
        e.preventDefault();
     
        $('#newbriefform #alertbox').slideDown();
        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Salvando...</b></small>';
        $('#newbriefform #alertbox .alert').html(textodealerta).removeClass('alert-danger').removeClass('alert-warning').addClass('alert-info').removeClass('alert-success');


        $.ajax({
            url: base_url + '/Save/newbrief',
            type: 'POST',
            data: new FormData(this),
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            error: function (result) {
                $('#newbriefform #alertbox').slideDown();
                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao enviar os dados, por favor tente mais tarde!</b></small>';
                $('#newbriefform #alertbox .alert').html(textodealerta).addClass('alert-danger').removeClass('alert-warning').removeClass('alert-info').removeClass('alert-success');

            },
            success: function (returndata) {
                try {
                    data = JSON.parse(returndata);

                    if (data['status'] == 'warning')
                    {
                        $('#newbriefform #alertbox').slideDown();
                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">'+data['validacao']+'</b></small>';
                        $('#newbriefform #alertbox .alert').html(textodealerta).removeClass('alert-danger').addClass('alert-warning').removeClass('alert-info').removeClass('alert-success');
        
                    }else
                    {
                        window.location.href = data['validacao'];
                    }
                }catch (e) {
                    $('#newbriefform #alertbox').slideDown();
                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao enviar os dados, por favor tente mais tarde!</b></small>';
                    $('#newbriefform #alertbox .alert').html(textodealerta).addClass('alert-danger').removeClass('alert-warning').removeClass('alert-info').removeClass('alert-success');
    
                }
             
            }
        });

    }));


    $('#editbriefform').on('submit', (function (e) {
        e.preventDefault();
     
        $('#editbriefform #alertbox').slideDown();
        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Salvando...</b></small>';
        $('#editbriefform #alertbox .alert').html(textodealerta).removeClass('alert-danger').removeClass('alert-warning').addClass('alert-info').removeClass('alert-success');


        $.ajax({
            url: base_url + '/Save/editbrief',
            type: 'POST',
            data: new FormData(this),
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            error: function (result) {
                $('#alertbox').slideDown();
                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao enviar os dados, por favor tente mais tarde!</b></small>';
                $('#alertbox .alert').html(textodealerta).addClass('alert-danger').removeClass('alert-warning').removeClass('alert-info').removeClass('alert-success');

            },
            success: function (returndata) {
                try {
                    data = JSON.parse(returndata);

                    if (data['status'] == 'warning')
                    {
                        $('#editbriefform #alertbox').slideDown();
                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">'+data['validacao']+'</b></small>';
                        $('#editbriefform #alertbox .alert').html(textodealerta).removeClass('alert-danger').addClass('alert-warning').removeClass('alert-info').removeClass('alert-success');
        
                    }else
                    {
                        if(data['validacao'])
                        {
                        window.location.href = data['validacao'];
                        }else{
                            $('#editbriefform #alertbox').slideDown();
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-check"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Alteração concluída com sucesso!';


                            $('#editbriefform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');

             
                        }
                    }
                }catch (e) {
                    $('#editbriefform #alertbox').slideDown();
                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao enviar os dados, por favor tente mais tarde!</b></small>';
                    $('#editbriefform #alertbox .alert').html(textodealerta).addClass('alert-danger').removeClass('alert-warning').removeClass('alert-info').removeClass('alert-success');
    
                }
             
            }
        });

    }));


  

    $(".password-btn").on('click', (function (e) {
        var datauser = $(this).data('user');
        $('#NewPassModal .form-control').val('');
        $('#NewPassModal #iduser').val(datauser);
        $('#NewPassModal #passgenerated').val('');

        $('#NewPassModal #alertbox').hide();
        $('#NewPassModal').modal('show');

    }));


    $(".delete-btn").on('click', (function (e) {
        var datauser = $(this).data('user');
        var datausername = $(this).data('name');

        $('#DeleteUserModal #iduser').val(datauser);
        $('#DeleteUserModal .nameofuser').text(datausername);
        $('#DeleteUserModal #alertbox').hide();
        $('#DeleteUserModal').modal('show');

    }));



    $(".idcard-btn").on('click', (function (e) {
        var datauser = $(this).data('user');
        var datausername = $(this).data('name');
        var datatype = $(this).data('type');
        $('#IdCardModalLabel').text(datausername);
        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Carregando...</b></small>';
        var loading = '<div class="alert alert-info">' + textodealerta + '</div>';

        $('#IdCardModal .modal-body').html(loading);


        $('#IdCardModal').modal('show');


        var formData = new FormData();
        formData.append('iduser', datauser);
        formData.append('type', datatype);

        $.ajax({
            url: base_url + '/Dashboard/showuser',
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            error: function (result) {
                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao acessar os dados, por favor tente mais tarde!</b></small>';
                var loading = '<div class="alert alert-danger">' + textodealerta + '</div>';

                $('#IdCardModal .modal-body').html(loading);

            },
            success: function (returndata) {

                $('#IdCardModal .modal-body').html(returndata);
            }
        });


    }));
    $(".btn-close").on('click', (function (e) {
        $('#saveandclose').val('true');
        $('#submitbtn').click();


    }));
    $(".btn-avalia").on('click', (function (e) {
        var datanota = $(this).data('avalia');

        if (datanota == 3) {
            $(this).removeClass('btn-outline-success').addClass('btn-success');
            $('.btn-warning.btn-avalia').addClass('btn-outline-warning').removeClass('btn-warning');
            $('.btn-danger.btn-avalia').addClass('btn-outline-danger').removeClass('btn-danger');
        }
        if (datanota == 2) {
            $(this).removeClass('btn-outline-warning').addClass('btn-warning');
            $('.btn-success.btn-avalia').addClass('btn-outline-success').removeClass('btn-success');
            $('.btn-danger.btn-avalia').addClass('btn-outline-danger').removeClass('btn-danger');

        }
        if (datanota == 1) {
            $(this).removeClass('btn-outline-danger').addClass('btn-danger');
            $('.btn-warning.btn-avalia').addClass('btn-outline-warning').removeClass('btn-warning');
            $('.btn-success.btn-avalia').addClass('btn-outline-success').removeClass('btn-success');
        }
        $('#avalia').val(datanota);

    }));

    $('.fixo').mask('00 0000.0000');
    $(".realselect").on('focus', (function (e) {

        $(this).parents('.autocompletebox').find('.fakelist').slideDown();

    }));

    $(".realselect").on('blur', (function (e) {

        $(this).parents('.autocompletebox').find('.fakelist').slideUp();

    }));
    $(".realselect").on('keydown keyup change', (function (e) {
        var thisvalue = $(this).val();
        thislowervalue = thisvalue.toLowerCase();


        $(".fakelist .fakeoption").each(function (index) {
            var thistext = $(this).data('text');

            thistext = thistext.normalize('NFD').replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, ' ');
            thisvalue = thisvalue.normalize('NFD').replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, ' ');


            if (thisvalue) {
                if (thistext.includes(thisvalue)) {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }

            } else {
                $(this).show();
            }

        });

    }));
    $(document).on("click", ".fakeoption", function () {

        var thisvalue = $(this).data('value'),
            thistext = $(this).text();

        $(this).parents('.autocompletebox').find(".realselect").val(thistext);
        $(this).parents('.autocompletebox').find(".inputvalue").val(thisvalue);


    });

    $(".inputgroup-pass button").on('click', (function (e) {

        var dataslash = $(this).data('slash'),
            $this = $(this);
        newdataslash = 1,
            $slashi = $(this).find('i'),
            $passinput = $(this).parents('.inputgroup-pass').find('input');
        if (dataslash == 0) {
            $slashi.removeClass('fa-eye-slash').addClass('fa-eye');
            $passinput.attr('type', 'text');

            setTimeout(function () {
                dataslash3 = $this.data('slash');
                if (dataslash3 == 1) {
                    $this.click();
                }
            }, 5000);

        } else {
            newdataslash = 0;
            $slashi.addClass('fa-eye-slash').removeClass('fa-eye');
            $passinput.attr('type', 'password');
        }
        $this.data('slash', newdataslash);

    }));
    $(".changeaavatar").on('click', (function (e) {
        $('#avatarform input').click();
    }));


    $('.sendcvbtn').on('click', (function (e) {
        $('.uploadCV').click();
    }));
    $('.uploadCV').on('change', (function (e) {
        $(this).parents('form').find('button').click();
    }));

    $('.uploadImage').on('change', (function (e) {
        $(this).parents('form').find('button').click();

    }));


    $("#avatarform").on('submit', (function (e) {
        e.preventDefault();





        $.ajax({
            url: base_url + "/Upload/avatar",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

                try {
                    data = JSON.parse(data);




                    if (data.status == 'success') {
                        $('.avatarhover img').attr('src', base_url + '/imgcrop.php?w=80&h=80&f=uploads/' + data.name);
                        $('.avatarimg img').attr('src', base_url + '/imgcrop.php?w=40&h=40&f=uploads/' + data.name);

                    } else {
                        callalert('Erro ao mudar o avatar!', 'Por favor tente mais tarde!', 'danger', 'OK', 'danger', 'sm', 'dark');
                    }
                } catch (e) {
                    callalert('Erro ao mudar o avatar!', 'Por favor tente mais tarde!', 'danger', 'OK', 'danger', 'sm', 'dark');
                }

            },
            error: function (e) {
                callalert('Erro ao mudar o avatar!', 'Por favor tente mais tarde!', 'danger', 'OK', 'danger', 'sm', 'dark');
            }
        });
    }));


    $("#cvupload").on('submit', (function (e) {
        e.preventDefault();
        $('.nomearquivo').text('Enviando...');
        var om = 8388608;

        var file = document.getElementById('uploadCV').files[0];


        var erromsg = '';

        var extension = $('#uploadCV').val().split('.');
        extv = extension.slice(-1)[0];


        if (extv == 'doc' || extv == 'docx' || extv == 'pdf' || extv == 'odt' || extv == 'rtf') {

        }
        else {
            erromsg += '<li>Extensão não suportada!</li>';
        }
        if (file && file.size > 8388608) {
            erromsg += '<li>O tamanho do arquivo ultrapassa o limite de 8mb.</li>';
        }


        if (!erromsg) {
            $('#cvalertbox').slideUp();
            $(".sendcvbtn").addClass('btn-secondary').removeClass('btn-success').removeClass('btn-danger');

            $('.cvprogressbarbox').slideDown();
            $(".cvprogressbarbox .progress-bar").addClass('bg-secondary').removeClass('bg-success').removeClass('bg-danger');
            e.preventDefault();
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $(".cvprogressbarbox .progress-bar").width(percentComplete + '%');
                            $(".cvprogressbarbox .progress-bar").html('');
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: base_url + "/Upload/cv",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $(".cvprogressbarbox .progress-bar").width('0%');
                    $(".cvprogressbarbox .progress-bar").html('');
                },
                error: function () {
                    $('#cvalertbox').slideDown();
                    $(".cvprogressbarbox .progress-bar").removeClass('bg-secondary').removeClass('bg-success').addClass('bg-danger').width('100%').html('ERRO');
                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao enviar o arquivo, por favor tente mais tarde!</b></small>';
                    $('#cvalertbox .alert').html(textodealerta).addClass('alert-danger').removeClass('alert-warning').removeClass('alert-info').removeClass('alert-success');

                },
                success: function (resp) {


                    try {
                        var resp = JSON.parse(resp);

                        if (resp['status'] == 'warning') {

                            $('#cvalertbox').slideDown();
                            $(".cvprogressbarbox .progress-bar").addClass('bg-secondary').removeClass('bg-success').removeClass('bg-danger').width('0%').html('');
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><ul  class="p-0 m-0 pl-3">' + resp['name'] + '</ul></small>';
                            $('#cvalertbox .alert').html(textodealerta).removeClass('alert-danger').addClass('alert-warning').removeClass('alert-info').removeClass('alert-success');
                            $('.nomearquivo').text('Selecione um arquivo');
                        }
                        if (resp['status'] == 'error') {
                            $('#cvalertbox').slideDown();
                            $(".cvprogressbarbox .progress-bar").removeClass('bg-secondary').removeClass('bg-success').addClass('bg-danger').width('100%').html('');
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao enviar o arquivo, por favor tente mais tarde!</b></small>';
                            $('#cvalertbox .alert').html(textodealerta).addClass('alert-danger').removeClass('alert-warning').removeClass('alert-info').removeClass('alert-success');
                            $('.nomearquivo').text('Selecione um arquivo');
                        }
                        if (resp['status'] == 'success') {
                            $('#cvalertbox').slideUp();
                            $(".cvprogressbarbox .progress-bar").removeClass('bg-secondary').addClass('bg-success').removeClass('bg-danger').width('100%').html('');
                            $(".sendcvbtn").removeClass('btn-secondary').addClass('btn-success').removeClass('btn-danger');
                            $('.nomearquivo').text(resp['realname']);
                            $('.nomearquivoval').val(resp['name']);

                        }


                    } catch (e) {
                        $('#cvalertbox').slideDown();
                        $(".cvprogressbarbox .progress-bar").removeClass('bg-secondary').removeClass('bg-success').addClass('bg-danger').width('100%').html('');
                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Houve um erro ao enviar o arquivo, por favor tente mais tarde!</b></small>';
                        $('#cvalertbox .alert').html(textodealerta).addClass('alert-danger').removeClass('alert-warning').removeClass('alert-info').removeClass('alert-success');
                        $('.nomearquivo').text('Selecione um arquivo');
                    }


                }
            });
        } else {
            $('#cvalertbox').slideDown();
            $(".cvprogressbarbox .progress-bar").addClass('bg-secondary').removeClass('bg-success').removeClass('bg-danger').width('0%').html('');
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
            textodealerta += '<small class="d-block text-center"><ul>' + erromsg + '</ul></small>';
            $('#cvalertbox .alert').html(textodealerta).removeClass('alert-danger').addClass('alert-warning').removeClass('alert-info').removeClass('alert-success');



        }

    }));





    $(".copypass").on('click', (function (e) {


        $('.copypass').popover('show');

        var copyText = document.getElementById("passgenerated");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        setTimeout(function () {
            $('.copypass').popover('hide');
        }, 1500);
        //alert("Copied the text: " + copyText.value);







    }));
    $(".generatepass").on('click', (function (e) {
        $('#GeneratePassModal').modal('show');

        $(".generatenewpass").click();

    }));
    $(".generatenewpass").on('click', (function (e) {

        var newpass = '',
            numb = '0123456789',
            lowercase = 'abcdefghijklmnopqrstuvwxyz',
            uppercase = lowercase.toUpperCase(),
            specialchar = '!@$%^&*()_+|~-=`{}[]:";\'<>?,./',
            allchars = numb + uppercase + lowercase;
        sortnumber = numb.charAt(Math.floor(Math.random() * numb.length));
        sortlowercase = lowercase.charAt(Math.floor(Math.random() * lowercase.length));
        sortuppercase = uppercase.charAt(Math.floor(Math.random() * uppercase.length));
        sortspecialchar = specialchar.charAt(Math.floor(Math.random() * specialchar.length));
        newpass += sortnumber + sortlowercase + sortuppercase + sortspecialchar;


        for (var i = 0; i < 6; i++) {
            newpass += allchars.charAt(Math.floor(Math.random() * allchars.length));
        }

        var newpassar = newpass.split("");




        newpassars = newpassar.sort(() => Math.random() - 0.5);



        newpass = newpassars.join('');

        $('#passgenerated').val(newpass);




    }));


    $("#newuserform").submit(function () {



        $('#newuserform #alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Salvando...</b></small>';
            $('#newuserform #alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');




            $('#newuserform #alertbox').slideDown();


            var formData = new FormData($('#newuserform')[0]);


            $.ajax({
                url: base_url + "/Save/newuser",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    try {
                        returndata = JSON.parse(data);

                        if (returndata['status'] == 'warning') {
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center">' + returndata['validacao'] + '</small>';

                            $('#newuserform #alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');
                        }
                        else if (returndata['status'] == 'success') {

                           window.location.href = returndata['validacao'];



                        } else {
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                            $('#newuserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                        }

                    } catch (e) {

                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                        $('#newuserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');


                    }


                },
                error: function (e) {
                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                    $('#newuserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');


                }
            });
            $('#saveandclose').val('false');
        }, 300);


        return false;
    });

    $("#edituserform").submit(function () {



        $('#edituserform #alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Salvando...</b></small>';
            $('#edituserform #alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');




            $('#edituserform #alertbox').slideDown();


            var formData = new FormData($('#edituserform')[0]);
            formData.append('url', window.location.href);


            $.ajax({
                url: base_url + "/Save/edituser",
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    try {
                        returndata = JSON.parse(data);

                        if (returndata['status'] == 'warning') {
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center">' + returndata['validacao'] + '</small>';

                            $('#edituserform #alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');
                        }
                        else if (returndata['status'] == 'success') {

                            if (returndata['validacao']) {
                                window.location.href = returndata['validacao'];
                            } else {

                               
                                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-check"></i></h3>';
                                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Alteração concluída com sucesso!';


                                $('#edituserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');

                            }



                        } else {
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                            $('#edituserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                        }

                    } catch (e) {

                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                        $('#edituserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');


                    }


                },
                error: function (e) {
                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                    $('#edituserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');


                }
            });
            $('#saveandclose').val('false');
        }, 300);

        return false;
    });

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    $('#loginform .input-group input').on('keyup', function (e) {

        if ($(this).val()) {


            $(this).removeClass("border-danger");
            $(this).parents('.input-group').find('.chamaseta').addClass('bg-info').addClass('border-info').removeClass("bg-danger").removeClass("border-danger");

        } else {

            $(this).addClass("border-danger");
            $(this).parents('.input-group').find('.chamaseta').removeClass('bg-info').removeClass('border-info').addClass("bg-danger").addClass("border-danger");

        }


        $(".changecapa").on('click', (function (e) {
            $('#capaform input').click();
        }));
    });

    $("#removeuserform").submit(function () {




        $('#removeuserform #alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
            $('#removeuserform #alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            $('#removeuserform #alertbox').slideDown();
            setTimeout(function () {




                var formData = new FormData($('#removeuserform')[0]);
                $.ajax({
                    url: base_url + '/Save/removeuser',
                    type: 'POST',
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function (result) {
                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                        $('#removeuserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');
                    },
                    success: function (returndata) {

                        try {
                            returndata = JSON.parse(returndata);


                            var tipo = returndata.status;

                            if (tipo == 'success') {

                                var userid = returndata.validacao;

                                $('#DeleteUserModal').modal('hide');
                                $('#user-' + userid).remove();


                            } else {
                                var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                textodealerta += '<ul class="m-0 p-0 pl-3">';
                                textodealerta += returndata.validacao;
                                textodealerta += '</ul></small>';

                                $('#removeuserform #alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                            }
                        } catch (e) {

                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                            $('#removeuserform #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                        }

                    }
                });


            }, 300);
        }, 300);
        return false;



    });

    $("#changepassuser").submit(function () {




        $('#changepassuser #alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
            $('#changepassuser #alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            $('#changepassuser #alertbox').slideDown();
            setTimeout(function () {



                var validacao = '';


                var newpass = $('#newpass').val();
                var newpassval = $('#newpass').val();
                var newpass2 = $('#newpass2').val();
                var npl = newpass.length









                var islowercase = /[a-z]/.test(newpassval)
                if (!islowercase) {
                    validacao += '<li>A senha precisa ter, ao menos, uma <b>letra minúscula</b>.</li>';


                } else {
                    newpassval = newpassval.replace(/[a-z]/g, "");
                }
                var isuppercase = /[A-Z]/.test(newpassval)
                if (!isuppercase) {
                    validacao += '<li>A senha precisa ter, ao menos, uma <b>letra maiúscula</b>.</li>';
                } else {
                    newpassval = newpassval.replace(/[A-Z]/g, "");
                }

                var isnum = /[0-9]/.test(newpassval)
                if (!isnum) {
                    validacao += '<li>A senha precisa ter, ao menos, um <b>número</b>.</li>';
                } else {
                    newpassval = newpassval.replace(/[0-9]/g, "");
                }






                var isspecial = /^[-!@$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(newpassval)

                if (!isspecial) {
                    validacao += '<li>A senha deve ter ao menos um desses caracteres especiais: <b>! @ $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
                } else {
                    newpassval = newpassval.replace(/^[-!@$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/g, "");
                }
                if (newpassval) {
                    validacao += '<li>A senha deve ter apenas <b>letras</b>, <b>números</b> e caracteres especiais: <b>! @ $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';

                }

                if (npl < 8) {
                    validacao += '<li>A senha deve ao menos 8 dígitos</li>';
                }

                if (npl > 20) {
                    validacao += '<li>A senha deve no máximo 20 dígitos</li>';
                }

                if (newpass != newpass2) {
                    validacao += '<li>As senhas não coincidem</li>';
                }

                if (validacao) {
                    var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                    textodealerta += '<ul class="m-0 p-0 pl-3">';
                    textodealerta += validacao;
                    textodealerta += '</ul></small>';


                    $('#changepassuser #alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                } else {
                    var formData = new FormData($('#changepassuser')[0]);
                    $.ajax({
                        url: base_url + '/Dashboard/changepassuser',
                        type: 'POST',
                        data: formData,
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (result) {
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                            $('#changepassuser #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');
                        },
                        success: function (returndata) {

                            try {
                                returndata = JSON.parse(returndata);


                                var tipo = returndata.status;

                                if (tipo == 'success') {
                                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-check"></i></h3>';
                                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Senha alterada com sucesso!</b></small>';


                                    $('#changepassuser #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');


                                } else {
                                    var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                    textodealerta += '<ul class="m-0 p-0 pl-3">';
                                    textodealerta += returndata.validacao;
                                    textodealerta += '</ul></small>';

                                    $('#changepassuser #alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                                }
                            } catch (e) {

                                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                                $('#changepassuser #alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                            }

                        }
                    });
                }

            }, 300);
        }, 300);
        return false;



    });

    $("#passform").submit(function () {




        $('#passform #alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
            $('#alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            $('#passform #alertbox').slideDown();
            setTimeout(function () {
                $('#loginform .input-group input').removeClass("border-danger");
                $('.chamaseta').addClass('bg-info').addClass('border-info').removeClass("bg-danger").removeClass("border-danger");



                var validacao = '';


                var newpass = $('#newpass').val();
                var newpassval = $('#newpass').val();
                var newpass2 = $('#newpass2').val();
                var npl = newpass.length









                var islowercase = /[a-z]/.test(newpassval)
                if (!islowercase) {
                    validacao += '<li>A senha precisa ter, ao menos, uma <b>letra minúscula</b>.</li>';


                } else {
                    newpassval = newpassval.replace(/[a-z]/g, "");
                }
                var isuppercase = /[A-Z]/.test(newpassval)
                if (!isuppercase) {
                    validacao += '<li>A senha precisa ter, ao menos, uma <b>letra maiúscula</b>.</li>';
                } else {
                    newpassval = newpassval.replace(/[A-Z]/g, "");
                }

                var isnum = /[0-9]/.test(newpassval)
                if (!isnum) {
                    validacao += '<li>A senha precisa ter, ao menos, um <b>número</b>.</li>';
                } else {
                    newpassval = newpassval.replace(/[0-9]/g, "");
                }






                var isspecial = /^[-!@$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(newpassval)

                if (!isspecial) {
                    validacao += '<li>A senha deve ter ao menos um desses caracteres especiais: <b>! @ $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
                } else {
                    newpassval = newpassval.replace(/^[-!@$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/g, "");
                }
                if (newpassval) {
                    validacao += '<li>A senha deve ter apenas <b>letras</b>, <b>números</b> e caracteres especiais: <b>! @ $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';

                }

                if (npl < 8) {
                    validacao += '<li>A senha deve ao menos 8 dígitos</li>';
                }

                if (npl > 20) {
                    validacao += '<li>A senha deve no máximo 20 dígitos</li>';
                }

                if (newpass != newpass2) {
                    validacao += '<li>As senhas não coincidem</li>';
                }

                if (validacao) {
                    var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                    textodealerta += '<ul class="m-0 p-0 pl-3">';
                    textodealerta += validacao;
                    textodealerta += '</ul></small>';


                    $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                } else {
                    var formData = new FormData($('#passform')[0]);
                    $.ajax({
                        url: base_url + '/Dashboard/changepass',
                        type: 'POST',
                        data: formData,
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (result) {
                            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                            $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');
                        },
                        success: function (returndata) {

                            try {
                                returndata = JSON.parse(returndata);


                                var tipo = returndata.type;

                                if (tipo == 'success') {
                                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
                                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Redirecionando...</b></small>';


                                    $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');
                                    window.location.href = base_url + '/Dashboard';

                                } else {
                                    var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                    textodealerta += '<ul class="m-0 p-0 pl-3">';
                                    textodealerta += '<li>Usuário ou senha não encontrados!</li>';
                                    textodealerta += '</ul></small>';

                                    $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                                }
                            } catch (e) {

                                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                                $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                            }

                        }
                    });
                }

            }, 300);
        }, 300);
        return false;



    });
});