<?php 	
	if(!isset($_SESSION['id_usuario'])){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=../'>";
	}
	
	require_once('classes/class.prontuario.php');
	require_once('classes/class.log.php');
	$prontuario = new Prontuario('1_anexo2');
	
	$temp = ["id_ficha" => $_SESSION['id_ficha']];
	
	$_POST['entrevistador'] = htmlspecialchars($_POST['entrevistador']);
	
	$pos_n_controle = $_POST['n_controle'];
	unset($_POST['n_controle']);
	
	$prontuario->addFicha(array_merge($temp,$_POST), $_SESSION['id_usuario']);
		
	if($_POST['submit'] == "Salvar")
		$ficha = $prontuario->insertFicha();
	if($_POST['submit'] == "Atualizar")
		$ficha = $prontuario->atualizaFicha($_SESSION['id_ficha']);
	
	
	if(is_bool($ficha)){
		$_SESSION['anexo2'] = $prontuario->getFormulario();
		$mensagem_tipo = 1;
		$mensagem_texto = "Anexo 2 Salvo Com Sucesso";
		
		$log = new Log();
			if($_POST['submit'] == "Salvar")
				$log->ProntuarioCriacao($_SESSION['id_usuario'], $usuario->get_nome(), $pos_n_controle, "o Anexo 2", $_SESSION['id_ficha']);
			if($_POST['submit'] == "Atualizar")
				$log->ProntuarioEdicao($_SESSION['id_usuario'], $usuario->get_nome(), $pos_n_controle, "o Anexo 2", $_SESSION['id_ficha']);
	}
	else{
		$mensagem_tipo = 0;
		$mensagem_texto = "Erro ao Salvar o Anexo 2.<br>Tente Novamente mais tarde.<br>".$ficha;
	}
		



?>