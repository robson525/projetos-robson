<?php 
require_once('class.conecta.php');

class Log {
	
	private $conecta;
	private $tabela;
	
/*  TIPO
	1 = login de Usuario
	2 = Cadastro de Usuario
	3 = Exclusão de Usuario
	
	4 = Criação de Prontuario 
	5 = Edição de Prontuario
	6 = Exclusão de Prontuario
*/
	
	public function __construct() {
		$this->conecta = new Conecta();		
		$this->tabela = "1_log";
	}
	
	private function QUERY($id_usuario ,$mensagem, $tipo, $id_ficha=""){
		$sql = "INSERT INTO $this->tabela (id_usuario, mensagem, data, tipo, id_ficha) 
				VALUES('".$id_usuario."','".$mensagem."','".date('Y-m-d H:i:s')."', '".$tipo."', '".$id_ficha."' );";
		$query = mysql_query($sql) or die("Erro no LOG UsuarioLogin(): ".mysql_error()."<br>".$sql);
	}
	
	public function UsuarioLogin($id_usuario, $nome){
		$mensagem = "O Usuario: ".$nome." - Efetuou Login - às ".date('H:i:s')." do dia ".date('d/m/Y')."";
		$this->QUERY($id_usuario, $mensagem, 1);
	}
	
	public function UsuarioCadastra($id_usuario, $nome, $cadastrado){
		$mensagem = "O Usuario: ".$nome." - Cadastrou o Usuario: ".$cadastrado." - às ".date('H:i:s')." do dia ".date('d/m/Y')."";
		$this->QUERY($id_usuario, $mensagem, 2);
	}
	
	
	public function ProntuarioCriacao($id_usuario, $nome, $n_prontuario, $anexo, $id_ficha){
		$mensagem = "O Usuario: ".$nome." - Cadastrou ".$anexo." do Prontuário: ".$n_prontuario." - às ".date('H:i:s')." do dia ".date('d/m/Y')."";
		$this->QUERY($id_usuario, $mensagem, 4, $id_ficha);	
	}
	
	public function ProntuarioEdicao($id_usuario, $nome, $n_prontuario, $anexo, $id_ficha){
		$mensagem = "O Usuario: ".$nome." - Modificou ".$anexo." do Prontuário: ".$n_prontuario." - às ".date('H:i:s')." do dia ".date('d/m/Y')."";
		$this->QUERY($id_usuario, $mensagem, 5, $id_ficha);	
	}
	
	
	
}

?>