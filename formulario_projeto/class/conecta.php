<?php
class Conecta{
	
// 	Informações para conexão
/*	var $host = 'mysql111.prv.f1.k8.com.br';
	var $usuario = 'lionsdla6';
	var $senha = 'Psherman42WallabyWaySydney';
	var $banco = 'lionsdla6';
	var $conn = '';*/
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
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
