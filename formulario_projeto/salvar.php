<?php 
if(!isset($_POST['submit'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";	
}

include "class/conecta.php";

$conex = new Conecta();

	
	extract($_POST);
	$nascimento = "{$ano}-{$mes}-{$dia}";
	
	$sql = "INSERT INTO 1_formulario (nome, cpf, email, telefone, nascimento, endereco, complemento, cidade, profissao, outra_profissao, orgao, escola)
			VALUES ('$nome', '$cpf', '$email', '$telefone', '$nascimento', '$endereco', '$complemento', '$cidade', '$profissao', '$outra_profissao', '$orgao', '$escola')";
			
	$query = mysql_query($sql);
	
	if(mysql_error($conex->conn)){
		echo mysql_error($conex->conn);
	}
	else{
		include "sucesso.html";	
	}
	
	

	$conex->desconecta();
?>