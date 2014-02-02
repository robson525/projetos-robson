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
	public function addFicha($ficha){
		
		reset($ficha); 
		while (list($key, $val) = each($ficha)) {  
			$this->formulario[$key] = $ficha[$key];
		}
	}
	/* Insere a Ficha Cadastral no banco de dados 
	- Retorna False se a Query funcionar */
	public function insertFicha(){
		$sql = "INSERT INTO $this->tabela (n_controle, nome, idade, sexo, n_sus, n_prontuario, rg, cpf, cuidador, endereco, telefone, pai, mae, c_q_mora, c_q_mora_outro, q_filhos, q_filhos_mais, atualmente, residencia, moram_casa, moram_casa_mais, escolaridade, renda, programa, violencia, qual_violencia, entrevistador, data, id_usuario) 
				VALUES (";
		
		reset($this->formulario);
		while (list($key, $val) = each($this->formulario)) { 
			if($val == NULL)
				$this->formulario[$key] = '';
		}
		reset($this->formulario);
		while (list($key, $val) = each($this->formulario)) { 
			$sql .=  "'".$val."'";
			
			if($key != 'id_usuario')
				$sql .=", ";
			else
				$sql .="); ";
			
		}
		$query = mysql_query($sql);
		//return $sql;
		if(!$query)
			return mysql_error();
		else
			return false;
		
		

	}
	
/* ------------------------ Fim do Tratamento da  Ficha Cadastral ------------------------ */	
/* --------------------------------------------------------------------------------------- */

	
	public function setIdUsuario($id){
		$this->formulario['id_usuario'] = $id;
	}
	
	
	public function getFormulario(){
		return $this->formulario;	
	}
	
	
	
}


?>