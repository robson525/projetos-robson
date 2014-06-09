<?php
	
/* POS do ajax que verifica se o Nº de Controle ja existe */
if(isset($_POST['n_controle']) && $_POST['n_controle'] && $_POST['ajax_controle'] && $_POST['ajax_controle']){
	
	require_once('../classes/class.prontuario.php');
	$prontuario = new Prontuario('1_ficha');
	
	if($prontuario->verifiaNcontrole($_POST['n_controle']))
		echo "Numero de Controle já existe.";
	else
		echo false;
	die();
}



?>