<?php 
if(!isset($_POST['submit'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";	
}

include "class/conecta.php";

	$conex = new Conecta();
	extract($_POST);
	
	$nascimento = "{$ano}-{$mes}-{$dia}";
	
	$programas = '';
	if(isset($programa)){
		for($i=0; $i<count($_POST['programa']); $i++){
			$programas .= $programa[$i].'<br>';
		}
	}

	$sql = "INSERT INTO 1_formulario (nome, rg, cpf, sexo, email, nascimento, pai, mae, endereco, complemento, cep, cidade, telefone1, telefone2, escolaridade, extensao, inep, secretaria, reserva, nivel_ensino, funcao, outra_funcao, programas)
	VALUES ('$nome', '$rg', '$cpf', '$sexo', '$email', '$nascimento', '$pai', '$mae', '$endereco', '$complemento', '$cep', '$cidade', '$telefone1', '$telefone2', '$escolaridade', '$extensao', '$inep', '$secretaria', '$reserva', '$nivel_ensino', '$funcao', '$outra_funcao', '$programas')";		
	
	$query = mysql_query($sql);
	
	if(mysql_error($conex->conn)){
		echo mysql_error($conex->conn);
	}
	else{
		include "sucesso.html";	
	}
	
	

	$conex->desconecta();
?>