<?php 	
	if(!isset($_SESSION['id_usuario'])){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=../'>";
	}
	if(!isset($_POST['n_controle']) || !$_POST['n_controle']){
		echo "O Campo Nº de Controle é Obrigatório.";
	}
	elseif(!isset($_POST['nome']) || !$_POST['nome']){
		echo "O Campo Nome é Obrigatório.";
	}
	else{
	
		require_once('classes/class.prontuario.php');
		
		$prontuario = new Prontuario('ficha');
		$ficha = $prontuario->addFicha($_POST, $_SESSION['id_usuario']);
		$_SESSION['fichaCadas'] = $prontuario->getFormulario();
		
		if(is_bool($ficha))
			echo false;
		else
			echo "Erro ao Salvar a Ficha.\nTente Novamente mais tarde.\n".$ficha;
			
	}
	
	/*reset($formualrio); 
	while (list($key, $val) = each($formualrio)) {  
		  echo "$key => $val\n";  
	}*/
	
	
	
	
	
	
	

	

?>