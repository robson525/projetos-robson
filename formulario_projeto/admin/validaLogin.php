<?php session_id('admin'); session_start();
	if(!$_POST || !$_POST["login"] || !$_POST["senha"]){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=index.php'>";
		exit();
	}
	
	require_once ('../class/class.admin.php');
	extract($_POST);
	
	$admin = new Admin();
	$existe = $admin->validaAdmin($login, md5($senha));
	
	if($existe){
		$_SESSION['id_admin'] = $admin->get_id();
		echo false;	
	}
	else{
		session_destroy();
		echo "Login Inválido";	
	}


?>