<?php 
		//Verifica se os Dados de busca Estão Preenchidos

		require_once "../../class/usuario.class.php";
		
		$nome = $_POST["nome"];
		$cpf = $_POST["cpf"];
		$login = $_POST["login"];
		
		$usuario = new Usuario();
		$sql = $usuario->busca($nome, $login, $cpf);
		$aux = $usuario->verificaResultado($sql);
		
	
		if($nome==NULL && $cpf==NULL && $login==NULL){
			echo '<script type="text/javascript">alert("Preencha Pelo Menos um dos Campos");</script>';
		}
		else if($aux == false){
			echo '<script type="text/javascript">alert("Nenhum Resultado Encontrado");</script>';	
		}
		else{
			echo false;
		}
		
?>



