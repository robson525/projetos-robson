﻿<?php
class Conecta{
	
// 	Informações para conexão
/*	var $host = 'mysql111.prv.f1.k8.com.br';
	var $usuario = 'lionsdla6';
	var $senha = 'Psherman42WallabyWaySydney';
	var $banco = 'lionsdla6';
	var $conn = '';*/
	var $host = 'localhost';
	var $usuario = 'root';
	var $senha = '';
	var $banco = 'lionsdla6';
	var $conn = '';
	var $pdo;

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
	
	// Verifica se Matricula e CPF são validos e se Já estão Cadastrados
	function pagamento_verifica($matricula, $cpf){
		if (!preg_match("/^[0-9]{5,10}$/", $matricula) || !preg_match("/^[0-9]{3}+.+[0-9]{3}+.[0-9]{3}+-[0-9]{2}$/", $cpf)){
			return false;
		}
		$sql = "SELECT * FROM xv_convencao WHERE matricula = '$matricula' AND cpf = '$cpf';";
		$query = mysql_query($sql) or die("SQL: ". $sql ."<br>Erro na Query : ".mysql_error());
		return $query;
	}
	
	/* Adiciona Comprovante de Pagamento
$comprovante é o caminho do arquivo no servidor	*/
	function pagamento_comprovante($comprovante, $matricula, $cpf){
		$sql = "UPDATE xv_convencao SET comprovante = '$comprovante' WHERE matricula = '$matricula' AND cpf = '$cpf';";
		$query = mysql_query($sql) or die("SQL: ". $sql ."<br>Erro na Query : ".mysql_error());
	}
	
	
	
}

?>
