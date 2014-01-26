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
  	<th scope='col'>&nbsp;</th>
    <th scope='col'>Nome</th>
    <th scope='col'>CPF</th>
    <th scope='col'>Email</th>
    <th scope='col'>Telefone</th>
    <th scope='col'>Nascimento</th>
    <th scope='col'>Endereço</th>
    <th scope='col'>Orgão</th>
    <th scope='col'>Profissão</th>
    <th scope='col'>Escola</th>
  </tr>
" ;
  

include_once('class/conecta.php');
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
		$cpf		= $l["cpf"];
		$email		= $l["email"];
		$telefone	= $l["telefone"];
		$nascimento	= implode("/", array_reverse(explode("-", $l["nascimento"])));
		$endereco	= $l["endereco"];
		$complemento= $l["complemento"];
		$cidade		= $l["cidade"];
		$profissao	= $l["profissao"];
		$outra		= $l["outra_profissao"];
		$orgao		= $l["orgao"];
		$escola		= $l["escola"];
		
		$result .= "
		<tr>
			<td style='padding:5px;'>$cont</td>
			<td>$nome</td>
			<td>$cpf</td>
			<td>$email</td>
			<td>$telefone</td>
			<td>$nascimento</td>
			<td>$endereco<br>$complemento<br>$cidade</td>
			<td>$orgao</td>
			<td>$profissao</td>
			<td>$escola</td>
		</tr>\n";
		
		$cont++;
	}
	
	$conex->desconecta();
	
	echo $tabela . $result;
	
?>
</table>



</body>
</html>
