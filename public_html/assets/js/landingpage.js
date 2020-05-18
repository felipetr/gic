$(function () {

   const queryString = window.location.search;
  
   if(queryString)
   {
	   const urlParams = new URLSearchParams(queryString);
	   try{
	 
				var redirect = urlParams.get('redirect');
	   
	   }catch (e) {
		    var redirect = '';
	   }
   }

    if(datapage != 'remember')
    {
    if (localStorage.getItem('email')); {

            $('body').hide();

            var email = localStorage.getItem('email'),
                pass = localStorage.getItem('pass');

                


            var formData = new FormData();
            formData.append('email', email);
            formData.append('pass', pass);
            if ($('#rememberChkBox').is(':checked')) {} else {
              
            }


            $.ajax({
                url: base_url + '/Dashboard/validatelogin',
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                error: function(result) {
                    var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-exclamation-triangle"></i></h3>';
                    textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Ocorreu um erro ao conectar!</b>Por favor tente mais tarde!</small>';


                    $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').addClass('alert-danger').removeClass('alert-success');

                    $('#pass').val('');
                    $('body').show();

                },
                success: function(returndata) {
                    returndata = JSON.parse(returndata);
                    var tipo = returndata.type;


                    if (tipo == 'success') {
                        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
                        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Redirecionando...</b></small>';


                        $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');



if(redirect)
{
	 window.location.href = base_url + '/Remember?redirect='+redirect;
}else
{
	 window.location.href = base_url + '/Remember';
}
                       

                    } else {
                        var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                        textodealerta += '<ul class="m-0 p-0 pl-3">';
                        textodealerta += '<li>Usuário ou senha não encontrados!</li>';
                        textodealerta += '</ul></small>';
                        $('#pass').val('');
                        $('body').show();
                        $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                    }

                }
            });



        }
        
    }
    $("#recoverform").submit(function () {
        var formData = new FormData($('#loginform')[0]);
        $('#recoverform #alertbox').slideUp();
        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
            $('#alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            $('#recoverform #alertbox').slideDown();
            setTimeout(function () {

                var validacao = '';
                var newpass = $('#newpass').val();
                var newpassval = $('#newpass').val();
                var newpass2 = $('#newpass2').val();
                var npl = newpass.length
                var islowercase = /[a-z]/.test(newpassval);
                if (!islowercase) {
                    validacao += '<li>A senha precisa ter, ao menos, uma <b>letra minúscula</b>.</li>';
                } else {
                    newpassval = newpassval.replace(/[a-z]/g, "");
                }
                var isuppercase = /[A-Z]/.test(newpassval);
                if (!isuppercase) {
                    validacao += '<li>A senha precisa ter, ao menos, uma <b>letra maiúscula</b>.</li>';
                } else {
                    newpassval = newpassval.replace(/[A-Z]/g, "");
                }
                var isnum = /[0-9]/.test(newpassval);
                if (!isnum) {
                    validacao += '<li>A senha precisa ter, ao menos, um <b>número</b>.</li>';
                } else {
                    newpassval = newpassval.replace(/[0-9]/g, "");
                }
                var isspecial = /^[-!@$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/.test(newpassval);
                if (!isspecial) {
                    validacao += '<li>A senha deve ter ao menos um desses caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
                } else {
                    newpassval = newpassval.replace(/^[-!@$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/g, "");
                }
                if (newpassval) {
                    validacao += '<li>A senha deve ter apenas <b>letras</b>, <b>números</b> e caracteres especiais: <b>@ ! $ % ^ & * ( ) _ + | ~ - = ` { } [ ] : " ; \' < > ? , . /</b></li>';
                 
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
                    var formData = new FormData($('#recoverform')[0]);

                    $.ajax({
                        url: base_url + '/Dashboard/savenewpass',
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

                            $('input').val('');

                        },
                        success: function (returndata) {
                            returndata = JSON.parse(returndata);
                            var tipo = returndata.status;

                            if (tipo == 'success') {
                                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
                                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Redirecionando...</b></small>';


                                $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');



                                $('#recoverform').html('<h3 class="text-warning text-center">Senha alterada com sucesso</h3><a href="' + base_url + '" class="btn btn-warning text-dark">Logar-se</a>');


                            } else {
                                var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                textodealerta += '<ul class="m-0 p-0 pl-3">';
                                textodealerta += returndata.validacao;
                                textodealerta += '</ul></small>';
                                $('#code').val('');
                                $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                            }

                        }
                    });
                }

            }, 300);
        }, 300);
        return false;

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


    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    $(".enviacode").click(function () {




        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
        $('#alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');
        $('#alertbox').slideDown();
        var email = $('#email').val();
        var emailval = '';
        if (!email) {
            emailval = 1;

            var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';

            textodealerta += '<span class="d-block text-center">Favor informar um email.</span>';

            $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

        }
        if (!validateEmail(email)) {
            var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';

            textodealerta += '<span class="d-block text-center">Favor informar um email válido.</span>';


            $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            emailval = 1;
        }
        if (!emailval) {
            $(".reenviacode").click();
            $(".codselectbox").hide();
            $(".codinputbox").show();
        }

    });
    $(".alreadycode").click(function () {

        $(".codselectbox").hide();
        $(".codinputbox").show();
    });
    $(".reenviacode").click(function () {


        var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
        textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
        $('#alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');
        $('#alertbox').slideDown();
        var email = $('#email').val();


        var emailval = '';
        if (!email) {
            emailval = 1;

            var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';

            textodealerta += '<span class="d-block text-center">Favor informar um email.</span>';

            $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

        }
        if (!validateEmail(email)) {
            var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';

            textodealerta += '<span class="d-block text-center">Favor informar um email válido.</span>';


            $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            emailval = 1;
        }
        if (!emailval) {




            var formData = new FormData();
            formData.append('email', email);
            console.log(formData);
            $.ajax({
                url: base_url + '/GenerateCode',
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
                    var textodealerta = '<small><b class="d-block text-center">Código Enviado!</b>';

                    textodealerta += '<span class="d-block text-center">Se não receber o código em até 5 minutos, favor verificar caixa de spam.</span>';
                    $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');
                    $(".reenviacode").hide();
                    $(".loadingcode").show();

                    $('.segundos').html(segundos);
                }
            });

            $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');

            var segundos = 10;
            var dezsec = setInterval(function () {

                if (segundos == 0) {
                    $(".reenviacode").show();
                    $(".loadingcode").hide();
                    segundos = 10;
                    clearTimeout(dezsec);
                } else {
                    segundos = segundos - 1;
                    $('.segundos').html(segundos);
                }

            }, 1000);
        }


    });
    $('.codemask').mask('0  0  0  0');


    $('#loginform .input-group input').on('keyup', function (e) {

        if ($(this).val()) {



            $(this).removeClass("border-danger");
            $(this).parents('.input-group').find('.chamaseta').addClass('bg-info').addClass('border-info').removeClass("bg-danger").removeClass("border-danger");

        } else {

            $(this).addClass("border-danger");
            $(this).parents('.input-group').find('.chamaseta').removeClass('bg-info').removeClass('border-info').addClass("bg-danger").addClass("border-danger");

        }



    });
    $("#loginform").submit(function () {

        var formData = new FormData($('#loginform')[0]);
        $('#browserpass').val($('#pass').val());


        $.ajax({
            url: base_url + '/Dashboard/encrypter',
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

                $('#pass').val('');

            },
            success: function (encs) {
                $('#pass').val(encs);
            }


        });

        $('#alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
            $('#alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            $('#alertbox').slideDown();
            setTimeout(function () {
                $('#loginform .input-group input').removeClass("border-danger");
                $('.chamaseta').addClass('bg-info').addClass('border-info').removeClass("bg-danger").removeClass("border-danger");



                var validacao = '';
                var emailvalue = $('#email').val();

                var passvalue = $('#pass').val();

                var $emailchamaseta = $('#email').parents('.input-group').find('.chamaseta');
                var $passchamaseta = $('#pass').parents('.input-group').find('.chamaseta');


                if (!emailvalue) {
                    validacao += '<li>Por favor, informe seu email</li>';
                    $('#email').addClass("border-danger");
                    $emailchamaseta.removeClass('bg-info').removeClass('border-info').addClass("bg-danger").addClass("border-danger");
                } else {
                    if (!validateEmail(emailvalue)) {
                        validacao += '<li>Por favor, informe um email válido!</li>';
                        $('#email').addClass("border-danger");
                        $emailchamaseta.removeClass('bg-info').removeClass('border-info').addClass("bg-danger").addClass("border-danger");
                    }
                }
                if (!passvalue) {
                    validacao += '<li>Por favor, informe sua senha</li>';
                    $('#pass').addClass("border-danger");
                    $passchamaseta.removeClass('bg-info').removeClass('border-info').addClass("bg-danger").addClass("border-danger");
                }

                if (validacao) {
                    var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                    textodealerta += '<ul class="m-0 p-0 pl-3">';
                    textodealerta += validacao;
                    textodealerta += '</ul></small>';


                    $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                } else {
                    var formData = new FormData($('#loginform')[0]);
                    $.ajax({
                        url: base_url + '/Dashboard/validatelogin',
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

                            $('#pass').val('');

                        },
                        success: function (returndata) {
                            returndata = JSON.parse(returndata);
                            var tipo = returndata.type;

                            if ($('#rememberChkBox').is(':checked')) {
                                // save username and password
                                localStorage.setItem('email', $('#email').val());
                                localStorage.setItem('pass', $('#pass').val());
                            } else {
                                localStorage.setItem('email', '');
                                localStorage.setItem('pass', '');
                            }
                            if (tipo == 'success') {
                                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
                                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Redirecionando...</b></small>';


                                if ($('#rememberChkBox').is(':checked')) {
                                    // save username and password
                                    localStorage.setItem('email', $('#email').val());
                                    localStorage.setItem('pass', $('#pass').val());


                                } else {
                                    localStorage.setItem('email', '');
                                    localStorage.setItem('pass', '');
                                }

                                $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');


if(redirect)
{
	 window.location.href = base_url + '/'+redirect;
}else
{
	 window.location.href = base_url + '/Dashboard';
}
                            } else {
                                var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                textodealerta += '<ul class="m-0 p-0 pl-3">';
                                textodealerta += '<li>Usuário ou senha não encontrados!</li>';
                                textodealerta += '</ul></small>';
                                $('#pass').val('');
                                $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                            }

                        }
                    });
                }

            }, 300);
        }, 300);
        return false;



    });

    $("#forgotform").submit(function () {



        var formData = new FormData($('#forgotform')[0]);



        $('#alertbox').slideUp();

        setTimeout(function () {
            var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
            textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Conectando...</b></small>';
            $('#alertbox .alert').html(textodealerta).addClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

            $('#alertbox').slideDown();
            setTimeout(function () {
                $('#forgotform .input-group input').removeClass("border-danger");



                var validacao = '';
                var emailvalue = $('#email').val();

                var codevalue = $('#code').val();



                if (!emailvalue) {
                    validacao += '<li>Por favor, informe seu email</li>';
                    $('#email').addClass("border-danger");
                } else {
                    if (!validateEmail(emailvalue)) {
                        validacao += '<li>Por favor, informe um email válido!</li>';
                        $('#email').addClass("border-danger");
                    }
                }
                if (!codevalue) {
                    validacao += '<li>Por favor, informe o código de validação</li>';
                    $('#code').addClass("border-danger");
                }

                if (validacao) {
                    var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                    textodealerta += '<ul class="m-0 p-0 pl-3">';
                    textodealerta += validacao;
                    textodealerta += '</ul></small>';


                    $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                } else {
                    var formData = new FormData($('#forgotform')[0]);
                    $.ajax({
                        url: base_url + '/Dashboard/validatecode',
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

                            $('#code').val('');

                        },
                        success: function (returndata) {
                            returndata = JSON.parse(returndata);
                            var tipo = returndata.type;

                            if ($('#rememberChkBox').is(':checked')) {
                                // save username and codeword
                                localStorage.setItem('email', $('#email').val());
                                localStorage.setItem('code', $('#code').val());
                            } else {
                                localStorage.setItem('email', '');
                                localStorage.setItem('code', '');
                            }
                            if (tipo == 'success') {
                                var textodealerta = '<h3 class="p-0 m-0 text-center"><i class="fas fa-circle-notch fa-spin"></i></h3>';
                                textodealerta += '<small class="d-block text-center"><b class="d-block text-center">Redirecionando...</b></small>';


                                if ($('#rememberChkBox').is(':checked')) {
                                    // save username and codeword
                                    localStorage.setItem('email', $('#email').val());
                                    localStorage.setItem('code', $('#code').val());


                                } else {
                                    localStorage.setItem('email', '');
                                    localStorage.setItem('code', '');
                                }

                                $('#alertbox .alert').html(textodealerta).removeClass('alert-info').removeClass('alert-warning').removeClass('alert-danger').addClass('alert-success');



                                window.location.href = base_url + '/Recover';

                            } else {
                                var textodealerta = '<small><b class="d-block text-center">Aviso!</b>';
                                textodealerta += '<ul class="m-0 p-0 pl-3">';
                                textodealerta += '<li>Usuário ou código de validação não encontrados!</li>';
                                textodealerta += '</ul></small>';
                                $('#code').val('');
                                $('#alertbox .alert').html(textodealerta).removeClass('alert-info').addClass('alert-warning').removeClass('alert-danger').removeClass('alert-success');

                            }

                        }
                    });
                }

            }, 300);
        }, 300);
        return false;



    });
});