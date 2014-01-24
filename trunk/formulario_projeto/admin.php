<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administração</title>

<?php include "class/conecta.php";?>

<style type="text/css">
td{
	padding:2px;		
}

</style>

</head>

<body>
<?php $conex = new Conecta(); ?>

<table  border="1" align="center">
  <caption>
    Administração
  </caption>
  <tr>
  	<th scope="col">&nbsp;</th>
    <th scope="col">Nome</th>
    <th scope="col">CPF</th>
    <th scope="col">Email</th>
    <th scope="col">Telefone</th>
    <th scope="col">Nascimento</th>
    <th scope="col">Endereço</th>
    <th scope="col">Profissão</th>
    <th scope="col">Orgão</th>
    <th scope="col">Escola</th>
  </tr>
  <?php  carrega(); ?>

  
</table>


</body>
</html>

<?php 

function carrega(){
	
	$sql = "SELECT * FROM 1_formulario";
	$query = mysql_query($sql);
	$cont = 1;
	
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
		
		echo "
		<tr id='val_tabela' style='text-align: center'>
			<td style='padding:5px;'>$cont</td>
			<td>$nome</td>
			<td>$cpf</td>
			<td>$email</td>
			<td>$telefone</td>
			<td>$nascimento</td>
			<td>$endereco<br>$complemento<br>$cidade</td>
			<td>$profissao</td>
			<td>$orgao</td>
			<td>$escola</td>
		</tr>\n";
		
		$cont++;
	}	
}


?>


