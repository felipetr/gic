<?php
if ($user->type > 2) {
	echo '<b>CPF/CNPJ: </b>' . $user->cpf;
	echo '<hr>';
}
if ($user->nascimento) {
	$date = new DateTime($user->nascimento);
	echo '<b>Data de Nascimento: </b>' . $date->format('d/m/Y');;
	echo '<hr>';
}

if ($user->type > 2) {
	echo '<b>Área de Atuação: </b>' . $workarea[$user->workarea];
	echo '<hr>';
}
echo '<b>Email: </b>' . $user->email;
echo '<hr>';
if ($user->google_account) {
	echo '<b>Conta do Google: </b>' . $user->google_account;
	echo '<hr>';
}
echo '<b>Estado: </b>' . $user->uf;
echo '<hr>';

echo '<b>Whatsapp: </b>' . $user->whatsapp;
echo '<hr>';

if ($user->mobile) {
	echo '<b>Celular 2: </b>' . $user->mobile;
	echo '<hr>';
}

if ($user->phone) {
	echo '<b>Fixo: </b>' . $user->phone;
	echo '<hr>';
}

if ($user->address) {
	echo '<b>Endereço:</b><br>' . $user->address;
	echo '<hr>';
}

if ($user->type == 4) {
	if ($user->banco && $user->agencia && $user->conta) {

		echo '<h5>Dados Bancários</h5>';
		echo '<b>Banco:</b> ' . $user->banco . '<br>';
		echo '<b>Agência:</b> ' . $user->agencia;
		if ($user->agd) {
			echo '-' . $user->agd;
		}
		echo '<br>';
		echo '<b>Conta:</b> ' . $user->conta;
		if ($user->contad) {
			echo '-' . $user->contad;
		}
		echo '<br>';
		echo '<b>Tipo:</b> ' . $user->tipoconta . '<br>';
	
		echo '<hr>';
	}


	$status = $status = 'info';
	$avalianum = "Não Avaliado";
	if ($user->status == 3) {
		$status = 'success';
		$avalianum = $user->status;
	}
	if ($user->status == 2) {
		$status = 'warning';
		$avalianum = $user->status;
	}
	if ($user->status == 1) {
		$status = 'danger';
		$avalianum = $user->status;
	}

	echo '<b>Avaliação:</b> <span class="badge bg-'.$status.'">' . $avalianum . '</span>';
	echo '<hr>';
	
	if ($user->folio) {
	echo '<b>Portfólio:</b> <a class="text-warning" href="' . $user->folio . '" target="_blank" >' . $user->folio . '</a>';
	echo '<hr>';
	}
	
	
	if ($user->cv) {
	echo '<b>Currículo:</b> <a class="badge btn-warning btn-small" href="'.base_url('/CV/download/'.$user->slug).'" target="_blank" >Baixar</a>';
	echo '<hr>';
	}

}


$date = new DateTime($user->created_at);
echo '<b>Criado em: </b>' . $date->format('d/m/Y H:i:s');;
echo '<hr>';

$date = new DateTime($user->updated_at);
echo '<b>Última alteração: </b>' . $date->format('d/m/Y H:i:s');;
echo '<hr>';