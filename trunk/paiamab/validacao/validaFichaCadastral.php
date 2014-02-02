<?php @session_start();


	if(!$_SESSION || !$_POST['nome']){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=../'>";
		exit();
	}
	
	
	

?>