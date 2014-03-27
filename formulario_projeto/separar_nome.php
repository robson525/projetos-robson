<?php 
include "class/conecta.php";
$con = new Conecta();

$sql = "SELECT * FROM 1_formulario ORDER BY nome;";
$query = mysql_query($sql) or die(mysql_error());

$sql = "INSERT INTO usuarios (username, password, firstname, lastname, email, city) VALUES <br>";


$cont = 1;
while($row = mysql_fetch_array($query)) {
	$nome = explode(" ", $row['nome']);
	$primeiro = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome[0] ) );
	$ultimo = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome[count($nome)-1] ) );
	$username = strtolower($primeiro).".".strtolower($ultimo);
	//$username = explode("@", $row['email']);
	
	$cpf = preg_replace("/[^0-9\s]/", "", $row['cpf']);
	
	//echo $cont++."&emsp;".$row["id"]."&ensp;".$nome[0].", ".strstr($row['nome'], " ").", ".$cpf."<br>";
	
	$sql .= "('".  $username ."', '" . $cpf . "', '". $nome[0] . "', '". strstr($row['nome'], " ") . "', '". $row['email'] . "', '". $row['cidade'] ."' ), <br>";
}
	echo $sql;
?>