<?php 
	if(!$_POST || !$_POST["login"] || !$_POST["senha"]){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=index.php'>";
		exit();
	}
	
	require_once ('../classes/class.usuario.php');
	extract($_POST);
	
	$usuario = new Usuario();
	$existe = $usuario->validaUsuario($login, $senha);
	
	if($existe){
		session_start();
		$_SESSION['id_usuario'] = $usuario->get_id();
		echo false;	
	}
	else{
		echo "Login Inválido";	
	}
	
	


?>