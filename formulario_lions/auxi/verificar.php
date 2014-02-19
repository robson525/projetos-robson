<?php
include_once("../auxi/conn.php");

	if(isset($_POST['matricula']) && $_POST['matricula'] && strlen($_POST['matricula'])==10){
		echo "matricula";
	}
	else
	if(isset($_POST['cpf']) && $_POST['cpf'] && strlen($_POST['cpf'])==14){
		$con = new Conecta();
		$cpf = $_POST['cpf'];
		cpf();
	}
	else{
		echo false;	
	}
	
//***************************************************************************	
	
	function atualiza($campo){ 
		$con = new Conecta(); 
		$sql = "SELECT * FROM xv_convencao WHERE matricula = '$campo';";
		$query = mysql_query($sql) or die("Error in query: $query. ".mysql_error());
		$campo = mysql_fetch_array($query);
		
		echo "document.getElementById('nome').value = ".$campo['nome']; 
	}
	

?>