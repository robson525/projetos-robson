<?php session_name('paiamab');
	  session_start();	
	if(!$_POST || (!$_POST["login"] && !$_POST["senha"])){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=index.php'>";
		exit();
	}
	
	require_once ('../classes/class.usuario.php');
	extract($_POST);
	
	$usuario = new Usuario();
	
	if($_POST["tipo"] == "login"){
		$existe = $usuario->validaUsuario($login, $senha);
		
		if($existe){
			$_SESSION['id_usuario'] = $usuario->get_id();
			echo false;	
		}
		else{
			echo "Login Inválido";	
		}
	}
	elseif($_POST["tipo"] == "cadastro"){
		$existe = $usuario->verificaLogin($_POST["login"]);
		
		if($existe)
			echo "Login já está cadastrado. Escolha outro.";
		else{
			if(!$usuario->cadastraUsuario($_POST["nome"], $_POST["login"], $_POST["senha"]))
				echo "Erro ao Cadastrar Usuário. <br>Tente Novamente.";
			else
				echo false;
		}
	}
	
	


?>