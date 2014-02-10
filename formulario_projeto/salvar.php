<?php 
if(!isset($_POST['submit'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";	
}

include "class/conecta.php";

	$conex = new Conecta();
	extract($_POST);
	
	$nascimento = "{$ano}-{$mes}-{$dia}";
	
	if ($complemento == NULL) { $complemento = ""; }
	if ($telefone2 == NULL) { $telefone2 = ""; }
	if ($reserva == NULL) { $reserva = ""; }
	if ($outra_funcao == NULL) { $outra_funcao = ""; }
	
	$programas = '';
	if(isset($programa)){
		for($i=0; $i<count($_POST['programa']); $i++){
			$programas .= $programa[$i].'<br>';
		}
	}
	
	$sql = "INSERT INTO 1_formulario (nome, rg, orgao, cpf, sexo, nascimento, pai, mae, endereco, complemento, cep, cidade, email, telefone1, telefone2, escolaridade, extensao, inep, secretaria, reserva, nivel_ensino, funcao, outra_funcao, programa)
	VALUES ('$nome', '$rg', '$orgao', '$cpf', '$email', '$nascimento', '$pai', '$mae', '$endereco', '$complemento', '$cep', '$cidade', '$email', '$telefone1', '$telefone2', '$escolaridade', '$extensao', '$inep', '$secretaria', '$reserva', '$nivel_ensino', '$funcao', '$outra_funcao', '$programas')";		
	
	$query = mysql_query($sql);
	
	if(mysql_error($conex->conn)){
		echo mysql_error($conex->conn);
	}
	else{
		include "sucesso.html";	
	}
	
	

	$conex->desconecta();
?>