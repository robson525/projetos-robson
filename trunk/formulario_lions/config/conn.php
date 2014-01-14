<?php
class Conecta{
	
// 	Informações para conexão
	var $host = 'localhost';
	var $usuario = 'root';
	var $senha = '';
	var $banco = 'lionsdla6';
	var $conn = '';

	// Realizando conexão e selecionando o banco de dados
	function __construct(){
		$conn = mysql_connect($this->host, $this->usuario, $this->senha) or die(mysql_error());
		$db = mysql_select_db($this->banco, $conn) or die(mysql_error());
		
		$this->conn = $conn;

	// Definindo o charset como utf8 para evitar problemas com acentuação
		$charset = mysql_set_charset('utf8');
		
	}
	
	function desconecta(){
		mysql_close($this->conn);
		
	}

}

?>
