<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php 

$tabela = "

<table id='tab_lista'  border='1' align='center'>
  <tr>
  	<th scope='col'style='padding:5px;'>&nbsp;</th>
    <th scope='col'style='width:300px;'>Nome</th>
	<th scope='col'style='width:300px;'>RG/CPF</th>
    <th scope='col'style='width:300px;'>Nascimento</th>
    <th scope='col'style='width:300px;'>Endereço</th>
	<th scope='col'style='width:300px;'>Email</th>
	<th scope='col'style='width:300px;'>Telefone</th>
	<th scope='col'style='width:300px;'>INEP</th>
	<th scope='col'style='width:300px;'>Função</th>
	<th scope='col'style='width:300px;'>Programas</th>
  </tr>
" ;
  

include_once('../class/conecta.php');
$conex = new Conecta();
$ordem = "";
$filtro = "";

// Ordenação
if (!empty($_POST["ordem"])){
	$ordem = $_POST["ordem"].", ";
	
}

if (!empty($_POST["orgao"]) && !empty($_POST["profs"])){
	$orgao = $_POST["orgao"];
	$profs = $_POST["profs"];
	$filtro = "WHERE orgao = '$orgao' AND profissao = '$profs'";
}
else {
	//Filtrar Orgão
	if (!empty($_POST["orgao"])){
		$orgao = $_POST["orgao"];
		$filtro = "WHERE orgao = '$orgao'";
	}
	
	//Filtrar Profissão
	else if (!empty($_POST["profs"])){
		$profs = $_POST["profs"];
		$filtro = "WHERE profissao = '$profs'";
	}
}
	
	$sql = "SELECT * FROM 1_formulario $filtro ORDER BY $ordem nome";

	$query = mysql_query($sql);
	$cont = 1;
	
	$result = "";
	
	while($l = mysql_fetch_array($query)) {
		$nome 		= $l["nome"];
		$rg			= $l["rg"];
		$orgao		= $l["orgao"];
		$cpf		= $l["cpf"];
		$sexo		= $l["sexo"];
		$nascimento	= implode("/", array_reverse(explode("-", $l["nascimento"])));
		$pai		= $l["pai"];
		$mae		= $l["mae"];
		$endereco	= $l["endereco"];
		$complemento= $l["complemento"];
		$cep		= $l["cep"];
		$cidade		= $l["cidade"];
		$email		= $l["email"];
		$telefone1	= $l["telefone1"];
		$telefone2	= $l["telefone2"];
		$escolaridade= $l["escolaridade"];
		$extensao	= $l["extensao"];
		$inep		= $l["inep"];
		$secretaria	= $l["secretaria"];
		$reserva	= $l["reserva"];
		$nivel_ensino	= $l["nivel_ensino"];
		$funcao		= $l["funcao"];
		$outra_funcao	= $l["outra_funcao"];
		$programa	= $l["programa"];
		
		$result .= "
		<tr>
			<td>$cont</td>
			<td>$nome</td>
			<td>$rg - $orgao <br>$cpf</td>
			<td>$nascimento</td>
			<td>$endereco<br>$complemento<br>$cidade - $cep</td>
			<td>$email</td>
			<td>$telefone1 <br>$telefone2</td>
			<td>$inep</td>
			<td>$funcao</td>
			<td>$programa</td>
		</tr>\n";
		
		$cont++;
	}
	
	$conex->desconecta();
	
	echo $tabela . $result;
	
?>
</table>



</body>
</html>
