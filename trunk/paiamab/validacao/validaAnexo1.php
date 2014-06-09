<?php 	
	if(!isset($_SESSION['id_usuario'])){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=../'>";
	}
	
	require_once('classes/class.prontuario.php');
	$prontuario = new Prontuario('1_anexo1');
	
	$temp = ["id_ficha" => $_SESSION['id_ficha']];
	
	$prontuario->addFicha(array_merge($temp,$_POST), $_SESSION['id_usuario']);
		
	if($_POST['submit'] == "Salvar")
		$ficha = $prontuario->insertFicha();
	if($_POST['submit'] == "Atualizar")
		$ficha = $prontuario->atualizaFicha($_SESSION['id_ficha']);
	
	
	if(is_bool($ficha)){
		$_SESSION['anexo1'] = $prontuario->getFormulario();
		$mensagem_tipo = 1;
		$mensagem_texto = "Formulário Salvo Com Sucesso";
	}
	else{
		$mensagem_tipo = 0;
		$mensagem_texto = "Erro ao Salvar a Ficha.<br>Tente Novamente mais tarde.<br>".$ficha;
	}
		



?>