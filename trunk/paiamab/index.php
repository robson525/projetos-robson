<?php session_name('paiamab');
	  session_start();	
	  
	  if(isset($_SESSION['data_sessao'])){
		  $dia_s =  date('d', strtotime($_SESSION['data_sessao']));
		  $mes_s =  date('m', strtotime($_SESSION['data_sessao']));
		  $ano_s =  date('Y', strtotime($_SESSION['data_sessao']));
		  // data atual
		  $dia = date('d'); $mes = date('m'); $ano = date('Y');
		  // Caso a data do ultimo acesso seja diferente do dia atual, ele destroi a sessão;
		  if(($ano - $ano_s != 0)||($mes - $mes_s != 0)||($dia - $dia_s != 0)  ){
			  header('Location: sair.php');
		  }
		  
	  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tela de Login</title>
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.form.js" type="text/javascript"></script>
</head>

<body>
<?php

	if(isset($_SESSION['id_usuario'])){
		include ('principal.php');		
	}
		
	else{
		include ('login.php');	
	}
		


/*
	if($_SESSION){ 
		if(isset($_GET['buscar']) && $_GET['buscar'])
			$_SESSION['id_ficha'] = $_GET['buscar'];
		header('Location: login.php');
	}
	
*/
?>
</body>
</html>