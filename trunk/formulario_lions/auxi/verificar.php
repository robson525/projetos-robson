<?php
include_once("../auxi/conn.php");

	if(isset($_POST['matricula']) && $_POST['matricula'] && strlen($_POST['matricula'])==10){
		$con = new Conecta();
		$matricula = $_POST['matricula'];
		$sql = "SELECT * FROM xv_convencao WHERE matricula = '$matricula';";
		matricula();			
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
	
	function matricula(){
		echo strlen($_POST['matricula']); 
	}
	
	function cpf(){
		echo strlen($_POST['cpf']);
	}

?>