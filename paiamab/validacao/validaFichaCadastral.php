<?php @session_start();
	
	require_once('../classes/class.prontuario.php');

	if(!$_SESSION || !$_POST['nome']){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=../'>";
		exit();
	}
	
	$prontuario = new Prontuario('ficha');
	$ficha;
	
	$prontuario->addFicha($_POST);
	$prontuario->setIdUsuario($_SESSION['id_usuario']);
	$formualrio = $prontuario->getFormulario();
	
	/*reset($formualrio); 
	while (list($key, $val) = each($formualrio)) {  
		  echo "$key => $val\n";  
	}*/
	
	echo $prontuario->insertFicha();
	
	
	
	
	
	

	

?>