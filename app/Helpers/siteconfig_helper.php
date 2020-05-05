<?php

function validate_cpf($text)
{
	 $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
}

function validate_cnpj($text)
{
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;

	// Verifica se todos os digitos são iguais
	if (preg_match('/(\d)\1{13}/', $cnpj))
		return false;	

	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
		return false;

	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}
function hw_slug($text)
{


    
   	$text = str_replace(' ', '-', $text);
    $text = preg_replace(array("/(á|à|ã|â|ä|å|ª)/","/(Á|À|Ã|Â|Ä|Å)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö|º)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$text);


    $text = strtolower($text);
    	$text = preg_replace('/[^a-z0-9\-]/', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function smtpserver($mailer)
{



    $mailer->CharSet = 'UTF-8';
     //$mailer->SMTPDebug = 3;
    $mailer->isSMTP();                                   // Set mailer to use SMTP
    $mailer->isHTML(true);                                 // Set mailer to use SMTP
    $mailer->Host = 'mail.felipetravassos.com ';                 // Specify main and backup SMTP servers
    $mailer->SMTPAuth = true;
    $mailer->SMTPSecure = 'ssl';                           // Enable SMTP authentication
    $mailer->Username = 'naoresponda@felipetravassos.com'; //Login de autenticação do SMTP
    $mailer->Password = '6UA1xyaC8c7q'; //Senha de autenticação do SMTP
    $mailer->Port = 465;
    $mailer->SMTPKeepAlive = true;
    // don't change the quotes!
    $mailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mailer->FromName = 'GIC - Gestor de Informação Compartilhada'; //Nome que será exibido
    $mailer->From = 'gic@gerens.com.br'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP

    return $mailer;
}


function encrypt_decrypt($action, $string)
{

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'TmZNOUNHU2dGaG43OTZTZW5nVHk2NWlwSnN1OHg4MXRIWnFBTXVYcVlpTlo3VlFBUldxY3QvZ1U1QjhmdVBYLw==';
    $secret_iv = 'WkwxNEREMXpYT21WT2NSY2dHZHA4azN0K3RSS2lYOFhReEptVHJzOGZZSjYxSkFFUjVGaFdSd2FNYmdjMEJmbQ==';
    $key = hash('sha256', $secret_key);


    $output = false;



    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning $iv = substr(hash('sha256', $secret_iv), 0, 16); $output = openssl_decrypt(base64_decode($enc), $encrypt_method, $key, 0, $iv); echo $output;
