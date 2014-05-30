<?php 
require_once('class.conecta.php');

class Prontuario {
	
	private $formulario;
	private $conecta;
	private $tabela;
	
	
	public function __construct($prontuario) {
		$this->conecta = new Conecta();
		
		if($prontuario == 'ficha'){
			$this->tabela = "1_ficha";
		}
					
	}


/*  TRATAMENTO DO FORMULARIO Ficha cadastral    */

	/* Seta Valores do Vetor $ficha para o $formulari o*/
	public function addFicha($ficha, $id_usuario){
		reset($ficha); 
		while (list($key, $val) = each($ficha)) {  
			$this->formulario[$key] = $ficha[$key];
		}
		$this->formulario['id_usuario'] = $id_usuario;
		unset($this->formulario["submit"]);
		
		return $this->insertFicha();
	}
	
	/* Insere a Ficha Cadastral no banco de dados 
	- Retorna False se a Query funcionar */
	public function insertFicha(){
		$sql = "INSERT INTO $this->tabela (";
		$values = "VALUES (";
		
		reset($this->formulario);
		while (list($key, $val) = each($this->formulario)) { 
			if($val == NULL)
				$this->formulario[$key] = '';
		}
		reset($this->formulario);
		while (list($key, $val) = each($this->formulario)) { 
			$sql .= $key;
			$values .=  "'".$val."'";
			
			if($key != 'id_usuario'){
				$sql .=", ";
				$values .=", ";
			}
			else{
				$sql .=") ";
				$values .="); ";
			}	
		}
		$sql .= $values;
		$query = mysql_query($sql);
		//return $sql;
		if(!$query)
			return mysql_error()."<br>".$sql;
		else{
			$this->conecta->testa_backup();
			return true;
		}
		
		

	}
	
	/* BUSCAR NOME = (nome, ''); BUSCAR NCONTROLE = ('', ncontrole); BUSCAR OS DOIS = (nome, ncontrole)
	Só para formulario Ficha Cadastral*/
	public function buscarFicha($nome, $n_controle){
		if($nome != '' && $nome != NULL && ($n_controle == '' || $n_controle ==NULL) ){
			$sql1 = 	"SELECT * FROM $this->tabela WHERE nome LIKE '$nome%';";
			$sql2 = 	"SELECT * FROM $this->tabela WHERE nome LIKE '%".$nome."%' AND nome NOT LIKE '$nome%';";
			$query[0] = mysql_query($sql1);
			$query[1] = mysql_query($sql2);
			if ( mysql_num_rows($query[0])  < 1 &&  mysql_num_rows($query[1])  < 1)
				return false;
		}
		else if(($nome == '' || $nome == NULL) && $n_controle != '' && $n_controle != NULL ){
			$sql1 = 	"SELECT * FROM $this->tabela WHERE n_controle = '$n_controle';";
			$query[0] = mysql_query($sql1);
			if ( mysql_num_rows($query[0])  < 1)
				return false;
		}
		else{
			$sql1 = "SELECT * FROM $this->tabela WHERE n_controle = '$n_controle'";
			$sql2 =	"SELECT * FROM $this->tabela WHERE nome LIKE '$nome%' AND n_controle != '$n_controle';;";
			$sql3 = "SELECT * FROM $this->tabela WHERE nome LIKE '%".$nome."%'AND nome NOT LIKE '$nome%' AND n_controle != '$n_controle';";
			$query[0] = mysql_query($sql1);
			$query[1] = mysql_query($sql2);
			$query[2] = mysql_query($sql3);
			if ( mysql_num_rows($query[0])  < 1 &&  mysql_num_rows($query[1])  < 1 &&  mysql_num_rows($query[2])  < 1)
				return false;
		}
		
		$erro = mysql_error();
		if(!empty($erro)) die("Erro: Query de Busca.".$erro);
		return $query;
	}

	
/* ------------------------ Fim do Tratamento da  Ficha Cadastral ------------------------ */	
/* --------------------------------------------------------------------------------------- */

	
	public function getFormulario(){
		return $this->formulario;	
	}
	
	
	
}


?>