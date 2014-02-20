<?php
include_once("../auxi/conn.php");

	if(isset($_POST['matricula']) && $_POST['matricula'] && strlen($_POST['matricula'])==10){
		$id = verifica($_POST['matricula']);
		echo $id; 
	}
	else
	if(isset($_POST['cpf']) && $_POST['cpf'] && strlen($_POST['cpf'])==14){
		$id = verifica($_POST['cpf']);
		echo $id;
	}
	else{
		echo false;	
	}
	
//***************************************************************************	
	
	function verifica($campo){ 
		
		$con = new Conecta(); 
		$sql = "SELECT * FROM xv_convencao WHERE matricula = '$campo';";
		$query = mysql_query($sql) or die("Error in query: $sql. ".mysql_error());
		if(mysql_num_rows($query) > 0){
			$campo = mysql_fetch_array($query);
			return $campo['id'];
		}
		else
			return false;
	}
	

?>