<?php
class Conecta{
	
// 	Informações para conexão

	private $host = 'localhost';
	private $usuario = 'root';
//	private $usuario = 'pseufpa';
	private $senha = '';
//	private $senha = 'vdBVKPCq';
	private $banco = 'st_pse';
	var $conn = '';

	// Realizando conexão e selecionando o banco de dados
	function __construct(){
		$conn = mysql_connect($this->host, $this->usuario, $this->senha) or die(mysql_error());
		$db = mysql_select_db($this->banco, $conn) or die(mysql_error());
		
		if (mysqli_connect_errno()){
  			echo "falga ao conectar no MySQL: " . mysqli_connect_error();
  		}
		
		$this->conn = $conn;

	// Definindo o charset como utf8 para evitar problemas com acentuação
		$charset = mysql_set_charset('utf8');
		
	}
	
	function desconecta(){
		mysql_close($this->conn);
		
	}

}

?>
