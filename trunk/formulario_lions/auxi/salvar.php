<?php 
	include "conn.php";
	$conecta = new Conecta();
	
	if(!$_POST){
		header('Location: http://www.lionsdla6.com.br');
	}
		
	extract ($_POST);
	
	$nascimento = "{$ano}-{$mes}-{$dia}";
	
	if($matricula == NULL){ $matricula = ''; }	
	if($dia==NULL && $mes==NULL && $ano==NULL){ $nascimento = '';} 
	if($endereco == NULL){ $endereco = ''; }
	if($complemento == NULL){ $complemento = ''; }	
	if($cargo_clube == NULL){ $cargo_clube = ''; }
	if($outro_cargo_clube == NULL){ $outro_cargo_clube = ''; }
	if($cargo_distrito == NULL){ $cargo_distrito = ''; }
	if($outro_cargo_distrtito == NULL){ $outro_cargo_distrtito = ''; }
	

	$sql = "INSERT INTO xv_convencao (nome, matricula, cpf, email, nascimento, endereco, complemento, estado, cidade, clube, delegado, cargo_clube, qual_cc, cargo_distrito, qual_cd, cl_mj, prefixo, camisa ) VALUES ('$nome', '$matricula', '$cpf', '$email', '$nascimento', '$endereco', '$complemento', '$estado', '$cidade', '$clube', '$delegado', '$cargo_clube', '$outro_cargo_clube', '$cargo_distrito', '$outro_cargo_distrtito', '$cl_mj', '$prefixo', '$camisa' )";
	
	$query = mysql_query($sql);
	
	
	if(mysql_error($conecta->conn)){
		echo mysql_error($conecta->conn);
	}
	else{
		include "sucesso.html";	
	}
	$conecta->desconecta();
	
?>
