<?php 
		//Verifica se os Dados de busca Estão Preenchidos
		if(!isset($_SESSION['id_usuario'])){
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
		}
		else{
		?>
			<center><h2>Resultado</h2></center>
            <table id="tab_result_busca" align="center" border="1" width="75%" style="margin-bottom:20px">
                <tr>
                    <td width="20%">Nº de Controle: </td>
                    <td>Nome: </td>
                    <td width="20%">&nbsp;</td>
                </tr>
            <?php 
                foreach($query as $query){
					while ($array = mysql_fetch_array($query)){ 	$id = $array['id_ficha'];		?>
						<tr>
							<td><?php echo $array['n_controle'] ?></td>
							<td><?php echo $array['nome'] ?></td>
							<td><a href="index.php?buscar=<?php echo $id; ?>">Selecionar</a> </td>
						</tr>
			<?php 	}
				}
                ?></table>
                
            <?php 
       }?>




