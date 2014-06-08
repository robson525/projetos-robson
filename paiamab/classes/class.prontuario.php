<?php 
require_once('class.conecta.php');

class Prontuario {
	
	private $formulario;
	private $conecta;
	private $tabela;
	private $idFicha;
	
	
	public function __construct($prontuario) {
		$this->conecta = new Conecta();
		
		if($prontuario == 'ficha'){
			$this->tabela = "1_ficha";
		}
					
	}


/*  TRATAMENTO DO FORMULARIO Ficha cadastral    */


	/* 	Verifica se o Nº de Controle ja foi cadastrado 
		Retorna TRUE se já existir e false se o contrario */
	public function verifiaNcontrole($n_controle){
		$sql = "SELECT n_controle FROM $this->tabela WHERE n_controle = '".$n_controle."';";
		$query = mysql_query($sql);
		if(mysql_num_rows($query) > 0)
			return true;
		else
			return false;
	}

	/* Seta Valores do Vetor $ficha para o $formulari o*/
	public function addFicha($ficha, $id_usuario){
		reset($ficha); 
		while (list($key, $val) = each($ficha)) {  
			$this->formulario[$key] = $ficha[$key];
		}
		$this->formulario['id_usuario'] = $id_usuario;
		unset($this->formulario["submit"]);
		unset($this->formulario["formulario_tipo"]);

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
			$this->setIdFicha($this->formulario['n_controle']);
			$this->conecta->testa_backup();
			return true;
		}	
	}
	
	
	/* Atualiza a Ficha Cadastral no banco de dados 
	- Retorna False se a Query funcionar */
	public function atualizaFicha($id_ficha){
		$sql = "UPDATE $this->tabela SET ";
		
		reset($this->formulario);
		while (list($key, $val) = each($this->formulario)) { 
			if($val == NULL)
				$this->formulario[$key] = '';
		}
		reset($this->formulario);
		while (list($key, $val) = each($this->formulario)) { 
			$sql .= $key." = '".$val."'";
			
			if($key != 'id_usuario'){
				$sql .=" , ";
			}
			else{
				$sql .=" WHERE id_ficha = ".$id_ficha.";";
			}	
		}
		$query = mysql_query($sql);
		//return $sql;
		if(!$query)
			return mysql_error()."<br>".$sql;
		else{
			$this->idFicha = $id_ficha;
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
	
	
	/* BUSCA FORMULARIO ATRAVES DO ID*/
	public function buscarFichaId($id_ficha){
	
		$sql = "SELECT * FROM $this->tabela WHERE id_ficha = $id_ficha;";
		$query = mysql_query($sql);
		if ( mysql_num_rows($query)  < 1)
			die("Erro ao Buscar Ficha Pelo ID<br>".$sql);
		$this->idFicha = $id_ficha;
		
		$this->formulario = mysql_fetch_assoc($query);
		
		return $this->formulario;
	}

	
/* ------------------------ Fim do Tratamento da  Ficha Cadastral ------------------------ */	
/* --------------------------------------------------------------------------------------- */


	private function setIdFicha($n_controle){
		$sql = "SELECT id_ficha FROM $this->tabela WHERE n_controle = '$n_controle';";
		$query = mysql_query($sql) or die("Erro ao pegar o id da ficha.<br>".$sql);
		if(mysql_num_rows($query) == 1)
			$this->idFicha = mysql_fetch_object($query)->id_ficha;
		else
			$this->idFicha = false;
	}
	
	
	
	public function getFormulario(){
		return $this->formulario;	
	}
	public function getIdFicha(){
		return $this->idFicha;	
	}
	
	
}


?>