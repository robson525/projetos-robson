<?php 	
	if(!isset($_SESSION['id_usuario'])){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=../'>";
	}
	
	if(!isset($_POST['n_controle']) || !$_POST['n_controle']){
		$mensagem_tipo = 0;
		$mensagem_texto = "O Campo Nº de Controle é Obrigatório.";
		$_SESSION['fichaCadas'] = $_POST;
	}
	elseif(!isset($_POST['nome']) || !$_POST['nome']){
		$mensagem_tipo = 0;
		$mensagem_texto = "O Campo Nome é Obrigatório.";
		$_SESSION['fichaCadas'] = $_POST;
	}
	else{
		require_once('classes/class.prontuario.php');
		require_once('classes/class.log.php');
		$prontuario = new Prontuario('1_ficha');
		
		$prontuario->addFicha($_POST, $_SESSION['id_usuario']);
		$_POST['entrevistador'] = htmlspecialchars($_POST['entrevistador']);
		
		if($_POST['submit'] == "Salvar")
			$ficha = $prontuario->insertFicha();
		if($_POST['submit'] == "Atualizar")
			$ficha = $prontuario->atualizaFicha($_SESSION['id_ficha']);
		
		$prontuario->setIdFicha($_POST['n_controle']);
		
		if(is_bool($ficha)){
			$_SESSION['fichaCadas'] = $prontuario->getFormulario();
			$_SESSION['id_ficha']	= $prontuario->getIdFicha();
			$mensagem_tipo = 1;
			$mensagem_texto = "Formulário Salvo Com Sucesso";
			
			$log = new Log();
			if($_POST['submit'] == "Salvar")
				$log->ProntuarioCriacao($_SESSION['id_usuario'], $usuario->get_nome(), $_POST['n_controle'], "a Ficha Cadastral", $_SESSION['id_ficha']);
			if($_POST['submit'] == "Atualizar")
				$log->ProntuarioEdicao($_SESSION['id_usuario'], $usuario->get_nome(), $_POST['n_controle'], "a Ficha Cadastral", $_SESSION['id_ficha']);
				
		}
		else{
			$mensagem_tipo = 0;
			$mensagem_texto = "Erro ao Salvar a Ficha.<br>Tente Novamente mais tarde.<br>".$ficha;
		}
			
	}
	
	/*reset($formualrio); 
	while (list($key, $val) = each($formualrio)) {  
		  echo "$key => $val\n";  
	}*/
	
	
	
	
	
	
	

	

?>