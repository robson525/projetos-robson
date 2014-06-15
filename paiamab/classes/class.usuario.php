<?php 

require_once('class.conecta.php');
require_once('class.log.php');

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
	private $LOG;   
    private $tabela; //nome da tabela
	
	public function __construct() {
		$this->conecta = new Conecta();
		$this->LOG   = new Log();
		$this->tabela = "1_usuario";				
	}
	
	
	//-------------------------- VALIDAÇÃO DE USUARIO E SENHA ----------------------------------//
		
	public function validaUsuario($log, $sen){
		
		$sql = "SELECT * FROM $this->tabela WHERE login COLLATE utf8_bin = '$log' AND senha COLLATE utf8_bin = '".md5($sen)."' AND ativo = 1;";
		
		$query = mysql_query($sql);
				
		//Verifica Registros
       $reg = mysql_fetch_assoc($query); 
		
		if(mysql_num_rows($query) == 1){
			$this->ID	 = $reg["id_usuario"];
			$this->LOG->UsuarioLogin($this->ID, $reg["nome"]);
			return true;
		}
		else
			return false; 
		
	}
	
	/* 	VERIFICA SE NOME DE USUARIO JA ESTA CADASTRADO 
		RETORNA TRUE SE LOGIN EXISTE */
	public function verificaLogin($login){
			
		$sql = "SELECT * FROM $this->tabela WHERE login COLLATE utf8_bin = '$login';";
		
		$query = mysql_query($sql);
				
		//Verifica Registros
       $reg = mysql_fetch_assoc($query); 
		
		if(mysql_num_rows($query) > 0 || mysql_error())
			return true;
		else
			return false; 	
		
	}
	
	
	/* CADASTRA NOVO USUARIO */
	public function cadastraUsuario($nome, $login, $senha){
		
		$sql = "INSERT INTO $this->tabela (login, senha, nome) VALUES ('".$login."', '".md5($senha)."', '".$nome."');";
		$query = mysql_query($sql);
		
		if(mysql_error()){
			return false;	
		}
		
		return true;	
	}
	
	/* SETA AS INFORMAÇÕES DE USUÁRIO EM SUAS RESPECTIVAS VARIAVEIS */
	public function set_usuario($id){
		
		$sql = "SELECT * FROM $this->tabela WHERE id_usuario= '$id'";
		
		$query = mysql_query($sql);
		
		if (mysql_num_rows($query) == 1){
			$reg = mysql_fetch_assoc($query);
			$this->login = $reg["login"];
			$this->senha = $reg["senha"]; 
			$this->ID	 = $reg["id_usuario"];
			$this->nome  = $reg["nome"];
			$this->ultima_sessao  = $reg["ultima_sessao"];
			$this->admin = $reg["admin"];
		}
		
	}
	
	
/*  Verifica se é Administrador  */	
	public function admin(){
		if($this->admin == 1)
			return true;
		else
			return false;		
	}
	
/* */
	public function set_ultima_sessao($date){
		$sql = "UPDATE $this->tabela SET ultima_sessao = '$date' WHERE id_usuario = '$this->ID';";
		$query = mysql_query($sql) or die("Erro: set_ultima_sessao");
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