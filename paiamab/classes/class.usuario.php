<?php 

require_once('class.conecta.php');

class Usuario{
	
	//v	ariaveis Utilizadas
	private $ID;
    private $login;
    private $senha;
    private $nome;
	private $ultima_sessao;
	private $admin;
    
    //variaveis internas
    private $conecta; //conexão com o banco
    private $tabela; //nome da tabela
	
	public function __construct() {
		$this->conecta = new Conecta();
		$this->tabela = "1_form_usuario";				
	}
	
	
	//--------------------------VERIFICA SE USUARIO ESTA CADASTRADO----------------------------------//
		
	public function validaUsuario($log, $sen){
		
		$sql = "SELECT * FROM $this->tabela WHERE login= '$log' and senha= '$sen'";
		
		$query = mysql_query($sql);
				
		//Verifica Registros
       $reg = mysql_fetch_assoc($query);
           	
			$this->login = $reg["login"];
            $this->senha = $reg["senha"]; 
		
		if($this->login == $log && $this->senha == $sen){
			$this->ID	 = $reg["id_usuario"];
			$this->nome  = $reg["nome"];
			$this->ultima_sessao  = $reg["ultima_sessao"];
			$this->admin = $reg["admin"];
			return true;
		}
		else
			return false; 
		
	}
	
	
/*  Verifica se é Administrador  */	
	public function admin(){
		if($this->admin == 1)
			return true;
		else
			return false;		
	}
	
	
	

/* ----- GETs ----- */

	function get_tabela(){
		return $this->tabela;
	}
	function get_id(){
		return $this->ID;
	}
	function get_nome(){
		return $this->nome;
	}
	function get_ultima_sessao(){
		return $this->ultima_sessao;
	}
	
	
		
	
}
?>