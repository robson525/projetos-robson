<?
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
<head>
<title>Documento sem título</title>
</head>
		<!-- PREENCHE TABALA COM O RESULTADO DA BUSCA DE USUARIOS -->
        
<?php 
require_once  "../../class/usuario.class.php";
		
		$login = $_POST["login"];
		$nome = $_POST["nome"];
		$cpf = $_POST["cpf"];
		
		$usuario = new Usuario();
		$tabela = $usuario->get_tabela();
		
		$re = $usuario->busca($nome, $login, $cpf);
?>        
        
        
<body>

    <div id="div_pdf" >
    	<a href="usuario/pdf/salvarPDF.php?nome=<?php echo $nome;?>&cpf=<?php echo $cpf;?>&login=<?php echo $login;?>";  
           target="_blank"><img border="0" src="img/pdf_icon.png" title="Gerar PDF da Tabela" width="25px" height="25px"></a>
    </div>

<table width="100%" border="1">

	<tr style="text-align: center">
		<td>Login</td>
		<td>Nome</td>
		<td>CPF</td>
        <td>RG</td>
		<td>Endereço</td>
		<td>Data Nascimento</td>
        <td>Sexo</td>
		<td>Cargo</td>
		<td>Salario</td>
	</tr>


<?php 
		$aux = false;
		
		while($l = pg_fetch_array($re)) {
			$id   		= $l["id"];
			$nome 		= $l["nome"];
			$login		= $l["login"];
			$cpf		= $l["cpf"];
			$rg   		= $l["rg"];
			$endereco 	= $l["endereco"];
			$data_nasc	= implode("/", array_reverse(explode("-", $l["data_nasc"])));
			$sexo		= $l["sexo"] == "1" ? "Masculino" : "Feminino";
			$cargo		= $l["cargo"];
			$salario	= $l["salario"];
			
			// SO MOSTRA USUARIOS QUE JA FORAM ACEITOS
			if($usuario->verificaAceito($id) == 't'){ // 't' = true
				
				$aux = true; 
				echo "
					<tr style='text-align: center'>
						<td>&nbsp;$login</td>
						<td>&nbsp;$nome</td>
						<td>&nbsp;$cpf</td>
						<td>&nbsp;$rg</td>
						<td>&nbsp;$endereco</td>
						<td>&nbsp;$data_nasc</td>
						<td>&nbsp;$sexo</td>
						<td>&nbsp;$cargo</td>
						<td>&nbsp;$salario</td>
					</tr>\n";
			}
			
		}	
		
		// SE NÃO AHAR NENHUM USUARIO ACEITO
		if($aux == false){
				echo '<script type="text/javascript">alert("Nenhum Resultado Encontrado");</script>';
		}
		
				
				
?>

		<form method="post">
			<input type="hidden" id="nome" name="nome" value="<?php echo $nome;?>"= />
            <input type="hidden" id="cpf" name="cpf" value="<?php echo $cpf;?>"= />
            <input type="hidden" id="login" name="login" value="<?php echo $login;?>"= />
		</form>


</table>

</body>
</html>