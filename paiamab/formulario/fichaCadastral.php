<?php 
	require_once('classes/class.prontuario.php');
	
	if($_SESSION['selecionar'])
		$prontuario = new Prontuario('1_ficha');
	
	if(($_SESSION['selecionar'] || $submetido)){
		$_SESSION['fichaCadas'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
	}
	
	if(isset($_SESSION['fichaCadas']) && $_SESSION['fichaCadas'])
		$ficha = true;
	else
		$ficha = false;		
		
		
	if(isset($_SESSION['fichaCadas']['n_controle']) && $_SESSION['fichaCadas']['n_controle'])
		$n_controle = $_SESSION['fichaCadas']['n_controle'];
	else
		$n_controle = false;
		
?>

<script type="text/javascript">
var n_controle = true;
// Quando carregado a página
$(document).ready( function() {
	
	// Tratamento de Login de Usuario
	$('#form_ficha').submit(function() {
		
		if($('#n_controle').val() == ""){
			$('#n_controle').focus();
			alert("Preencha o campo Nº de Controle.");
			return false;	
		}
		else if(!n_controle){
			$('#n_controle').focus();
			alert("Nº de Controle já Existe.\nFavor Fornecer Outro\nou Atualizar o já Existente.");
			return false;
		}
		else if($('#nome').val() == ""){
			$('#nome').focus();
			alert("Preencha o campo Nome.");
			return false;	
		}
		
		
	}); // Final Tratamento do Formulario
	
	$('#n_controle').change(function() {
			$.post('validacao/valida_ajax.php',{n_controle: $(this).val(), ajax_controle: 1 }, 
			function(resposta){
				var n_controle_php = '<?php echo $n_controle?$n_controle:"false";?>';
				var imput_n_controle = document.getElementById('n_controle').value;
				if(resposta.length > 1 && (n_controle_php == false || n_controle_php != imput_n_controle)){
					document.getElementById('span_n_controle').hidden = false;
					n_controle = false;
				}
				else{
					document.getElementById('span_n_controle').hidden = true;
					n_controle = true;
				}
			});
	
	});
	
	$('#c_q_mora').change(function() {
		if($(this).val() == 'outros')
			$('#span_cq_mora').show('slow');
		else
			$('#span_cq_mora').hide('slow');
		
	});
	
	$('#q_filhos').change(function() {
		if($(this).val() == 'mais')
			$('#span_q_filhos').show('slow');
		else
			$('#span_q_filhos').hide('slow');
		
	});
	
	$('#moram_casa').change(function() {
		if($(this).val() == 'mais')
			$('#span_moram_casa').show('slow');
		else
			$('#span_moram_casa').hide('slow');
		
	});
	
	$('#violencia').change(function() {
		if($(this).val() == 'Sim')
			$('#span_violencia').show('slow');
		else
			$('#span_violencia').hide('slow');
		
	});
	
	
});


</script>
<div id="div_erro_validacao">
    <center>
    <?php 
        if(isset($_POST['submit']) && $_POST['submit'])
            echo $mensagem_texto;
    ?>
    <br>
    </center>
</div>
<center>
<h2>Ficha Cadastral</h2>
</center>

<div id="div_ficha">

<form id="form_ficha" name="form_ficha" method="post" action="index.php" >
	
    <table id="tab_ficha" border="0" align="center" width="80%">
    	<tr>
        	<td class="td_esq" width="30%">Nº de Controle: </td>
            <td class="td_dir" width="50%"> <input id="n_controle" name="n_controle" type="text" maxlength="10" value="<?php echo $ficha?$_SESSION['fichaCadas']['n_controle']:""; ?>" required> 
            <span id="span_n_controle" style="color:#FD0004; margin-left:10px;" hidden>Número de Controle já está Cadastradado</span>
            </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome: </td>
            <td class="td_dir"> <input id="nome" name="nome" type="text" maxlength="100" style="width:100%" value="<?php echo $ficha?$_SESSION['fichaCadas']['nome']:""; ?>" required> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Idade: </td>
            <td class="td_dir"><input id="idade" name="idade" type="text" maxlength="3" style="width:10%" value="<?php echo $ficha?$_SESSION['fichaCadas']['idade']:""; ?>"> anos</td>
        
        </tr>
        <tr>
        	<td class="td_esq">Sexo: </td>
            <td class="td_dir"> <select id="sexo" name="sexo">
            					<option value=""></option>
            					<option value="Masculino"<?php echo $ficha&&$_SESSION['fichaCadas']['sexo']=="Masculino"?"selected":""; ?>>Masculino</option>
            					<option value="Feminino" <?php echo $ficha&&$_SESSION['fichaCadas']['sexo']=="Feminino" ?"selected":""; ?>>Feminino</option></select></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Numero do SUS: </td>
            <td class="td_dir"> <input id="n_sus" name="n_sus" type="text" maxlength="15" value="<?php echo $ficha?$_SESSION['fichaCadas']['n_sus']:""; ?>"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Numero do Prontuário:  </td>
            <td class="td_dir"> <input id="n_prontuario" name="n_prontuario" type="text" maxlength="15" value="<?php echo $ficha?$_SESSION['fichaCadas']['n_prontuario']:""; ?>"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">RG: </td>
            <td class="td_dir"> <input id="rg" name="rg" type="text" maxlength="15" value="<?php echo $ficha?$_SESSION['fichaCadas']['rg']:""; ?>"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">CPF:  </td>
            <td class="td_dir"> <input id="cpf" name="cpf" type="text" maxlength="15" value="<?php echo $ficha?$_SESSION['fichaCadas']['cpf']:""; ?>"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome do Cuidador:  </td>
            <td class="td_dir"><input id="cuidador" name="cuidador" type="text" maxlength="100" style="width:100%" value="<?php echo $ficha?$_SESSION['fichaCadas']['cuidador']:""; ?>">  </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Endereço:  </td>
            <td class="td_dir"><input id="endereco" name="endereco" type="text" maxlength="150" style="width:100%" value="<?php echo $ficha?$_SESSION['fichaCadas']['endereco']:""; ?>">  </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Telefone/Celular  </td>
            <td class="td_dir"> <input id="telefone" name="telefone" type="text" maxlength="14" value="<?php echo $ficha?$_SESSION['fichaCadas']['telefone']:""; ?>"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome do Pai:  </td>
            <td class="td_dir"> <input id="pai" name="pai" type="text" maxlength="100" style="width:100%" value="<?php echo $ficha?$_SESSION['fichaCadas']['pai']:""; ?>"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome da Mãe  </td>
            <td class="td_dir"> <input id="mae" name="mae" type="text" maxlength="100" style="width:100%" value="<?php echo $ficha?$_SESSION['fichaCadas']['mae']:""; ?>"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Com quem Mora:  </td>
            <td class="td_dir">	<select id="c_q_mora" name="c_q_mora">
            					<option value=""></option>
            					<option value="Pais" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="Pais" ?"selected":""; ?>>Pais </option>
            					<option value="Companheiro(a)" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="Companheiro(a)" ?"selected":""; ?>>Companheiro(a)</option>
                                <option value="Filhos" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="Filhos" ?"selected":""; ?>>Filhos</option>
                                <option value="Parentes" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="Parentes" ?"selected":""; ?>>Parentes</option>
                                <option value="Amigos" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="Amigos" ?"selected":""; ?>>Amigos</option>
                                <option value="Empregados Domesticos" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="Empregados Domesticos" ?"selected":""; ?>>Empregados Domesticos</option>
                                <option value="outros" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="outros" ?"selected":""; ?>>Outros</option> </select> &ensp;&ensp;
        	<span id="span_cq_mora" <?php echo $ficha&&$_SESSION['fichaCadas']['c_q_mora']=="outros" ?"":"hidden"; ?>>Quem: <input id="c_q_mora_outro" name="c_q_mora_outro" type="text" maxlength="50" value="<?php echo $ficha?$_SESSION['fichaCadas']['c_q_mora_outro']:""; ?>"> </span></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Quantos Filhos Nascidos vivos você teve no Total:  </td>
            <td class="td_dir">	<select id="q_filhos" name="q_filhos">
            					<option value=""></option>
            					<option value="Nenhum" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="Nenhum" ?"selected":""; ?>>Nenhum </option>
            					<option value="Um" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="Um" ?"selected":""; ?>>Um</option>
                                <option value="Dois" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="Dois" ?"selected":""; ?>>Dois</option>
                                <option value="Três" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="Três" ?"selected":""; ?>>Três</option>
                                <option value="Quatro" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="Quatro" ?"selected":""; ?>>Quatro</option>
                                <option value="Cinco" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="Cinco" ?"selected":""; ?>>Cinco</option>
                                <option value="mais" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="mais" ?"selected":""; ?>>Mais</option> </select> &ensp;&ensp;
        	<span id="span_q_filhos" <?php echo $ficha&&$_SESSION['fichaCadas']['q_filhos']=="mais" ?"":"hidden"; ?>>Quantos: <input id="q_filhos_mais" name="q_filhos_mais" type="text" maxlength="20" value="<?php echo $ficha?$_SESSION['fichaCadas']['q_filhos_mais']:""; ?>"> </span> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Atualmente você:  </td>
            <td class="td_dir">	<select id="atualmente" name="atualmente">
            					<option value=""></option>
            					<option value="Esta Aposentado(a)" <?php echo $ficha&&$_SESSION['fichaCadas']['atualmente']=="Esta Aposentado(a)" ?"selected":""; ?>>Esta Aposentado(a) </option>
            					<option value="Trabalha" <?php echo $ficha&&$_SESSION['fichaCadas']['atualmente']=="Trabalha" ?"selected":""; ?>>Trabalha</option>
                                <option value="Trabalha e Estuda" <?php echo $ficha&&$_SESSION['fichaCadas']['atualmente']=="Trabalha e Estuda" ?"selected":""; ?>>Trabalha e Estuda</option>
                                <option value="Estuda" <?php echo $ficha&&$_SESSION['fichaCadas']['atualmente']=="Estuda" ?"selected":""; ?>>Estuda</option> </select></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Qual o tipo de Residencia de sua Faminlia: </td>
            <td class="td_dir"> <select id="residencia" name="residencia">
            					<option value=""></option>
            					<option value="Própria" <?php echo $ficha&&$_SESSION['fichaCadas']['residencia']=="Própria" ?"selected":""; ?>>Própria</option>
            					<option value="Alvenaria" <?php echo $ficha&&$_SESSION['fichaCadas']['residencia']=="Alvenaria" ?"selected":""; ?>>Alvenaria</option>
                                <option value="Madeira" <?php echo $ficha&&$_SESSION['fichaCadas']['residencia']=="Madeira" ?"selected":""; ?>>Madeira</option>
                                <option value="Alugada" <?php echo $ficha&&$_SESSION['fichaCadas']['residencia']=="Alugada" ?"selected":""; ?>>Alugada</option>
                                <option value="Emprestada" <?php echo $ficha&&$_SESSION['fichaCadas']['residencia']=="Emprestada" ?"selected":""; ?>>Emprestada</option></select></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Quantas Pessoas moram na sua casa, incluindo você:  </td>
            <td class="td_dir"> <select id="moram_casa" name="moram_casa">
            					<option value=""></option>
            					<option value="1 Pessoa"   <?php echo $ficha&&$_SESSION['fichaCadas']['moram_casa']=="1 Pessoa"?"selected":""; ?>>1 Pessoa</option>
            					<option value="2 Pessoas"  <?php echo $ficha&&$_SESSION['fichaCadas']['moram_casa']=="2 Pessoas"?"selected":""; ?>>2 Pessoas</option>
                                <option value="3 Pessoas"  <?php echo $ficha&&$_SESSION['fichaCadas']['moram_casa']=="3 Pessoas"?"selected":""; ?>>3 Pessoas</option>
                                <option value="4 Pessoas"  <?php echo $ficha&&$_SESSION['fichaCadas']['moram_casa']=="4 Pessoas"?"selected":""; ?>>4 Pessoas</option>
                                <option value="5 Pessoas"  <?php echo $ficha&&$_SESSION['fichaCadas']['moram_casa']=="5 Pessoas"?"selected":""; ?>>5 Pessoas</option>
                                <option value="mais"   <?php echo $ficha&&$_SESSION['fichaCadas']['moram_casa']=="mais" ?"selected":""; ?>>Mais</option></select> &ensp;&ensp;
        	<span id="span_moram_casa" <?php echo $ficha&&$_SESSION['fichaCadas']['moram_casa']=="mais" ?"":"hidden"; ?>>Quantas: <input id="moram_casa_mais" name="moram_casa_mais" type="text" maxlength="10" value="<?php echo $ficha?$_SESSION['fichaCadas']['moram_casa_mais']:""; ?>"> </span> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Qual o seu nível de Escolaridade:  </td>
            <td class="td_dir"> <select id="escolaridade" name="escolaridade">
            					<option value=""></option>
            					<option value="Não Alfabetizado(a)" <?php echo $ficha&&$_SESSION['fichaCadas']['escolaridade']=="Não Alfabetizado(a)"?"selected":""; ?>>Não Alfabetizado(a)</option>
            					<option value="Ensino Fundamental Incompleto" <?php echo $ficha&&$_SESSION['fichaCadas']['escolaridade']=="Ensino Fundamental Incompleto"?"selected":""; ?>>Ensino Fundamental Incompleto</option>
                                <option value="Ensino Fundamental Completo" <?php echo $ficha&&$_SESSION['fichaCadas']['escolaridade']=="Ensino Fundamental Completo"?"selected":""; ?>>Ensino Fundamental Completo</option>
                                <option value="Ensino Médio Incompleto" <?php echo $ficha&&$_SESSION['fichaCadas']['escolaridade']=="Ensino Médio Incompleto"?"selected":""; ?>>Ensino Médio Incompleto</option>
                                <option value="Ensino Médio Completo" <?php echo $ficha&&$_SESSION['fichaCadas']['escolaridade']=="Ensino Médio Completo"?"selected":""; ?>>Ensino Médio Completo</option>
                                <option value="Ensino Superio Incompleto" <?php echo $ficha&&$_SESSION['fichaCadas']['escolaridade']=="Ensino Superio Incompleto"?"selected":""; ?>>Ensino Superio Incompleto</option>
                                <option value="Ensino Superio Completo" <?php echo $ficha&&$_SESSION['fichaCadas']['escolaridade']=="Ensino Superio Completo"?"selected":""; ?>>Ensino Superio Completo</option></select> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Qual a renda mensal média de sua familia:  </td>
            <td class="td_dir"> <select id="renda" name="renda">
            					<option value=""></option>
            					<option value="Até R$ 610,00" <?php echo $ficha&&$_SESSION['fichaCadas']['renda']=="Até R$ 610,00" ?"selected":""; ?>>Até R$ 610,00</option>
            					<option value="De R$ 610,00 até R$ 800,00" <?php echo $ficha&&$_SESSION['fichaCadas']['renda']=="De R$ 610,00 até R$ 800,00" ?"selected":""; ?>>De R$ 610,00 até R$ 800,00</option>
                                <option value="De R$ 800,00 até R$ 1000,00" <?php echo $ficha&&$_SESSION['fichaCadas']['renda']=="De R$ 800,00 até R$ 1000,00" ?"selected":""; ?>>De R$ 800,00 até R$ 1000,00</option>
                                <option value="Acima de R$ 1000,00" <?php echo $ficha&&$_SESSION['fichaCadas']['renda']=="Acima de R$ 1000,00" ?"selected":""; ?>>Acima de R$ 1000,00</option>
                                <option value="Não Possui Renda - Vive de Ajuda" <?php echo $ficha&&$_SESSION['fichaCadas']['renda']=="Não Possui Renda - Vive de Ajuda" ?"selected":""; ?>>Não Possui Renda - Vive de Ajuda</option></select>  </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Você é beneficiário de algum Programa Social do Governo Federal? Se sim qual: </td>
            <td class="td_dir"> <select id="programa" name="programa">
            					<option value=""></option>
            					<option value="Bolsa Família" <?php echo $ficha&&$_SESSION['fichaCadas']['programa']=="Bolsa Família" ?"selected":""; ?>>Bolsa Família</option>
            					<option value="BPC - Benefício de Prestação Continuada / Idoso" <?php echo $ficha&&$_SESSION['fichaCadas']['programa']=="BPC - Benefício de Prestação Continuada / Idoso" ?"selected":""; ?>>BPC - Benefício de Prestação Continuada / Idoso</option>
                                <option value="BPC - Benefício de Prestação Continuada / Pessoa com Deficiência" <?php echo $ficha&&$_SESSION['fichaCadas']['programa']=="BPC - Benefício de Prestação Continuada / Pessoa com Deficiência" ?"selected":""; ?>>BPC - Benefício de Prestação Continuada / Pessoa com Deficiência</option></select> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Você já foi Vitima de algum tipo de Violência: </td>
            <td class="td_dir"> <select id="violencia" name="violencia">
            					<option value=""></option>
            					<option value="Sim" <?php echo $ficha&&$_SESSION['fichaCadas']['violencia']=="Sim" ?"selected":""; ?>>Sim</option>
            					<option value="Não" <?php echo $ficha&&$_SESSION['fichaCadas']['violencia']=="Não" ?"selected":""; ?>>Não</option>
                                <option value="Prefiro não Declarar" <?php echo $ficha&&$_SESSION['fichaCadas']['violencia']=="Prefiro não Declarar" ?"selected":""; ?>>Prefiro não Declarar</option></select>  &ensp;&ensp;
        	<span id="span_violencia"  <?php echo $ficha&&$_SESSION['fichaCadas']['violencia']=="Sim" ?"":"hidden"; ?>>Qual: <input id="qual_violencia" name="qual_violencia" type="text" maxlength="25" value="<?php echo $ficha?$_SESSION['fichaCadas']['qual_violencia']:""; ?>"> </span> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Entrevistador/Coletor: </td>
            <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:100%" value="<?php echo $ficha?$_SESSION['fichaCadas']['entrevistador']:""; ?>"> </td>
            <td class="td_esq">Data: </td>
            <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha?$_SESSION['fichaCadas']['data']:""; ?>"> </td>
        
        </tr>
        
        <tr>
        	<td><input id="formulario_tipo" name="formulario_tipo" type="text" value="FichaCadastral" hidden> </td>
            <td></td>
        </tr>
       	
        <tr>
        	<td></td>
            <td style="padding-top:10px;">
            <?php if(!$ficha){ ?>
<input id="submit" name="submit" class="bot_submit" type="submit" value="Salvar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');" > 
			<?php }else{ ?>
<input id="submit" name="submit" class="bot_submit" type="submit" value="Atualizar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');">
			<?php }?>
</td>
        </tr>
        
    
    </table>
    
</form>

</div>
