<?php 
	if(!$_POST){
		echo "Acesso Negado";
		exit();
	}
	include "conn.php";
	$conecta = new Conecta();
		
	extract ($_POST);
	
	$nascimento = "{$ano}-{$mes}-{$dia}";
	
	if($dia==NULL && $mes==NULL && $ano==NULL){ $nascimento = '';} 
	if($endereco == NULL){ $endereco = ''; }
	if($complemento == NULL){ $complemento = ''; }	
	if($cargo_clube == NULL){ $cargo_clube = ''; }
	if($outro_cargo_clube == NULL){ $outro_cargo_clube = ''; }
	if($cargo_distrito == NULL){ $cargo_distrito = ''; }
	if($outro_cargo_distrtito == NULL){ $outro_cargo_distrtito = ''; }
	
	if($botao == "Enviar"){
		$sql = "INSERT INTO xv_convencao (nome, matricula, cpf, email, nascimento, endereco, complemento, estado, cidade, clube, delegado, cargo_clube, qual_cc, cargo_distrito, qual_cd, cl_mj, prefixo, camisa ) 
				VALUES ('$nome', '$matricula', '$cpf', '$email', '$nascimento', '$endereco', '$complemento', '$estado', '$cidade', '$clube', '$delegado', '$cargo_clube', '$outro_cargo_clube', '$cargo_distrito', '$outro_cargo_distrtito', '$cl_mj', '$prefixo', '$camisa' );";
	}
	elseif($botao == "Atualizar"){
		$sql = "UPDATE xv_convencao SET nome='$nome', matricula='$matricula', email='$email', nascimento='$nascimento', endereco='$endereco', complemento='$complemento', estado='$estado', cidade='$cidade', clube='$clube', delegado='$delegado', cargo_clube='$cargo_clube', qual_cc= '$outro_cargo_clube', cargo_distrito='$cargo_distrito', qual_cd='$outro_cargo_distrtito', cl_mj='$cl_mj', prefixo='$prefixo', camisa='$camisa'
				WHERE cpf = '$cpf';";
	}
	else {
		echo "Acesso Negadooo";
		exit();
	}
	
	$query = mysql_query($sql);
	
	
	if(mysql_error($conecta->conn)){
		echo mysql_error($conecta->conn)."<br>SQL = ".$sql;
	}
	else{
		include "sucesso.html";	
	}
	$conecta->desconecta();
	
?>
