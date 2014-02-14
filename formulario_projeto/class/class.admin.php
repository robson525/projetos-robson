<?php 
require_once("conecta.php");

class Admin {
	
	private $ID;
	private $tabela;
	
	function __construct(){
		$conecta = new Conecta();
		
		$this->tabela = "1_admin";
	}
	
	public function validaAdmin($log, $sen){
		
		$sql = "SELECT * FROM $this->tabela WHERE login COLLATE utf8_bin = '$log' and senha = '$sen'";
		
		$query = mysql_query($sql);
				
		//Verifica Registros
       $reg = mysql_fetch_assoc($query); 
		
		if(mysql_num_rows($query) == 1){
			$this->ID	 = $reg["id_admin"];
			return true;
		}
		else
			return false; 
		
	}
	
	public function get_id(){
		return $this->ID;
	}
	



}
?>