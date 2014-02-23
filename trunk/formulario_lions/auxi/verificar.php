<?php
include_once("../auxi/conn.php");

	if (isset($_POST['matricula']) && $_POST['matricula'] && isset($_POST['cpf']) && $_POST['cpf']){
		$id = validaMatCpf($_POST['matricula'], $_POST['cpf']);
		echo $id;
	}

	else if(isset($_POST['matricula']) && $_POST['matricula']){
		$id = verifica('matricula', $_POST['matricula']);
		echo $id; 
	}
	else
	if(isset($_POST['cpf']) && $_POST['cpf']){
		$id = verifica('cpf', $_POST['cpf']);
		echo $id;
	}
	else{
		echo false;	
	}
	
//***************************************************************************	
	
	function verifica($campo, $valor){ 
		
		$con = new Conecta(); 
		$sql = "SELECT * FROM xv_convencao WHERE $campo = '$valor';";
		$query = mysql_query($sql) or die("Error in query: $sql. ".mysql_error());
		if(mysql_num_rows($query) > 0){
			$campo = mysql_fetch_array($query);
			return $campo['id'];
		}
		else
			return false;
	}
	
	function validaMatCpf($matricula,  $cpf){ 
		
		$con = new Conecta(); 
		$sql = "SELECT * FROM xv_convencao WHERE matricula = '$matricula' AND cpf = '$cpf';";
		$query = mysql_query($sql) or die("Error in query: $sql. ".mysql_error());
		if(mysql_num_rows($query) > 0){
			$campo = mysql_fetch_array($query);
			return $campo['id'];
		}
		else
			return false;
	}
	

?>