<?php



	

// 	Informações para conexão

	 $host = 'localhost';

	 $usuario = 'root';

	 $senha = '';

	 $banco = 'lionsdla6';

	 $conn = '';



	// Realizando conexão e selecionando o banco de dados

	

		$conn = mysql_connect($host, $usuario, $senha) or die(mysql_error());

		$db = mysql_select_db($banco, $conn) or die(mysql_error());

		
mysql_select_db($banco) or die( "Não foi possível conectar ao banco MySQL");
if (!$conn) {echo "Não foi possível conectar ao banco MySQL.
"; exit;}
else {echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.
";}
		



	// Definindo o charset como utf8 para evitar problemas com acentuação

		$charset = mysql_set_charset('utf8');

		

	

	

	function desconecta(){

		mysql_close($conn);

		

	}







?>

