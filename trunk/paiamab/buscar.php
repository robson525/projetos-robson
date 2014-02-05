<?php 
		//Verifica se os Dados de busca Estão Preenchidos
		if(!$_POST || !$_POST["buscar_nome"]){
			echo "Acesso Negado";
			echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=index.php'>";
			exit();
		}
		
		require_once('classes/class.prontuario.php');
		
		$nome = $_POST["buscar_nome"];
		$n_controle = $_POST["buscar_ncontrole"];
		
		$prontuario = new Prontuario('ficha');
		
		$query = $prontuario->buscarFicha($nome, $n_controle);
		
		if ($query == false){
			echo "Nenhum Resultado Encontrado";
			exit(); // PARA A AEXECUÇÃO DO ARQUIVO
		}
		
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	

</head>
<body>
	<center><h2>Resultado</h2></center>
	<table id="tab_result_busca" align="center" border="1" width="75%">
		<tr>
        	<td width="20%">Nº de Controle: </td>
            <td>Nome: </td>
            <td width="20%">&nbsp;</td>
        </tr>
	<?php 
		while ($busca = mysql_fetch_array($query)){ 	$id = $busca['id_ficha'];		?>
			<tr>
            	<td><?php echo $busca['n_controle'] ?></td>
            	<td><?php echo $busca['nome'] ?></td>
                <td><a href="index.php?buscar=<?php echo $id; ?>">Selecionar</a> </td>
            </tr>
<?php	}
	?></table>
</body>
</html>



