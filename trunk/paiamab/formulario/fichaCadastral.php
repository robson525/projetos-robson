<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/formularios.css" rel="stylesheet" type="text/css"/>
<title>Ficha Cadastral</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript">

// Quando carregado a página
$(function($) {
	
	// Tratamento de Login de Usuario
	$('#form_ficha').submit(function() {

		// Limpando mensagem de erro
		$('#div_erro').html('');

		// Enviando informações do formulário via AJAX
		$(this).ajaxSubmit(function(resposta) {
			// Se não retornado nenhum erro
			if (resposta.length <= 1){
				// Redirecionando
				 alert('Usuario Salvo');			
			}else{
				// Exibimos a mensagem de erro
				alert(resposta);
			}
		});
		// Retornando false para que o formulário não envie as informações da forma convencional
		return false;
	}); // Final Tratamento do Formulario
	
	
});
</script>
</head>

<body>
<center>
<h2>Ficha Cadastral</h2>
</center>

<div id="div_ficha">

<form id="form_ficha" name="form_ficha" method="post" action="validacao/validaFichaCadastral.php" >
	
    <table id="tab_ficha" border="0" align="center" width="80%">
    	<tr>
        	<td class="td_esq" width="30%">Nº de Controle: </td>
            <td class="td_dir" width="50%"> <input id="n_controle" name="n_controle" type="text" maxlength="10" > </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome: </td>
            <td class="td_dir"> <input id="nome" name="nome" type="text" maxlength="100" style="width:100%"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Idade: </td>
            <td class="td_dir"><input id="idade" name="idade" type="text" maxlength="3" style="width:10%"> anos</td>
        
        </tr>
        <tr>
        	<td class="td_esq">Sexo: </td>
            <td class="td_dir"> <select id="sexo" name="sexo">
            					<option value=""></option>
            					<option value="Masculino">Masculino</option>
            					<option value="Feminino">Feminino</option></select></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Numero do SUS: </td>
            <td class="td_dir"> <input id="n_sus" name="n_sus" type="text" maxlength="15" > </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Numero do Prontuário:  </td>
            <td class="td_dir"> <input id="n_prontuario" name="n_prontuario" type="text" maxlength="15" > </td>
        
        </tr>
        <tr>
        	<td class="td_esq">RG: </td>
            <td class="td_dir"> <input id="rg" name="rg" type="text" maxlength="15" > </td>
        
        </tr>
        <tr>
        	<td class="td_esq">CPF:  </td>
            <td class="td_dir"> <input id="cpf" name="cpf" type="text" maxlength="15" > </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome do Cuidador:  </td>
            <td class="td_dir"><input id="cuidador" name="cuidador" type="text" maxlength="100" style="width:100%">  </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Endereço:  </td>
            <td class="td_dir"><input id="endereco" name="endereco" type="text" maxlength="150" style="width:100%">  </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Telefone/Celular  </td>
            <td class="td_dir"> <input id="telefone" name="telefone" type="text" maxlength="15" > </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome do Pai:  </td>
            <td class="td_dir"> <input id="pai" name="pai" type="text" maxlength="100" style="width:100%"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Nome da Mãe  </td>
            <td class="td_dir"> <input id="mae" name="mae" type="text" maxlength="100" style="width:100%"> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Com quem Mora:  </td>
            <td class="td_dir">	<select id="c_q_mora" name="c_q_mora">
            					<option value=""></option>
            					<option value="Pais">Pais </option>
            					<option value="Companheiro(a)">Companheiro(a)</option>
                                <option value="Filhos">Filhos</option>
                                <option value="Parentes">Parentes</option>
                                <option value="Amigos">Amigos</option>
                                <option value="Empregados Domesticos">Empregados Domesticos</option>
                                <option value="outros">Outros</option> </select> &ensp;&ensp;
        	<span id="span_cq_mora">Quem: <input id="c_q_mora_outro" name="c_q_mora_outro" type="text" maxlength="50"> </span></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Quantos Filhos Nascidos vivos você teve no Total:  </td>
            <td class="td_dir">	<select id="q_filhos" name="q_filhos">
            					<option value=""></option>
            					<option value="Nenhum">Nenhum </option>
            					<option value="Um">Um</option>
                                <option value="Dois">Dois</option>
                                <option value="Três">Três</option>
                                <option value="Quatro">Quatro</option>
                                <option value="Cinco">Cinco</option>
                                <option value="mais">Mais</option> </select> &ensp;&ensp;
        	<span id="span_q_filhos">Quantos: <input id="q_filhos_mais" name="q_filhos_mais" type="text" maxlength="20"> </span> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Atualmente você:  </td>
            <td class="td_dir">	<select id="atualmente" name="atualmente">
            					<option value=""></option>
            					<option value="Esta Aposentado(a)">Esta Aposentado(a) </option>
            					<option value="Trabalha">Trabalha</option>
                                <option value="Trabalha e estuda">Trabalha e estuda</option>
                                <option value="Estuda">Estuda</option> </select></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Qual o tipo de Residencia de sua Faminlia: </td>
            <td class="td_dir"> <select id="residencia" name="residencia">
            					<option value=""></option>
            					<option value="Própria">Própria</option>
            					<option value="Alvenaria">Alvenaria</option>
                                <option value="Madeira">Madeira</option>
                                <option value="Alugada">Alugada</option>
                                <option value="Emprestada">Emprestada</option></select></td>
        
        </tr>
        <tr>
        	<td class="td_esq">Quantas Pessoas moram na sua casa, incluindo você:  </td>
            <td class="td_dir"> <select id="moram_casa" name="moram_casa">
            					<option value=""></option>
            					<option value="1 Pessoa">1 Pessoa</option>
            					<option value="2 Pessoas">2 Pessoas</option>
                                <option value="3 Pessoas">3 Pessoas</option>
                                <option value="4 Pessoas">4 Pessoas</option>
                                <option value="5 Pessoas">5 Pessoas</option>
                                <option value="mais">Mais</option></select> &ensp;&ensp;
        	<span id="span_moram_casa">Quantas: <input id="moram_casa_mais" name="moram_casa_mais" type="text" maxlength="3"> </span> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Qual o seu nivl de Escolaridade:  </td>
            <td class="td_dir"> <select id="escolaridade" name="escolaridade">
            					<option value=""></option>
            					<option value="Não Alfabetizado(a)">Não Alfabetizado(a)</option>
            					<option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                                <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                                <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                                <option value="Ensino Médio Completo">Ensino Médio Completo</option>
                                <option value="Ensino Superio Incompleto">Ensino Superio Incompleto</option>
                                <option value="Ensino Superio Completo">Ensino Superio Completo</option></select> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Qual a renda mensal média de sua familia:  </td>
            <td class="td_dir"> <select id="renda" name="renda">
            					<option value=""></option>
            					<option value="Até R$ 610,00">Até R$ 610,00</option>
            					<option value="De R$ 610,00 até R$ 800,00">De R$ 610,00 até R$ 800,00</option>
                                <option value="De R$ 800,00 até R$ 1000,00">De R$ 800,00 até R$ 1000,00</option>
                                <option value="Acima de R$ 1000,00">Acima de R$ 1000,00</option>
                                <option value="Não Possui Renda - Vive de Ajuda">Não Possui Renda - Vive de Ajuda</option></select>  </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Você é beneficiário de algum Programa Social do Governo Federal? Se sim qual: </td>
            <td class="td_dir"> <select id="programa" name="programa">
            					<option value=""></option>
            					<option value="Bolsa Família">Bolsa Família</option>
            					<option value="BPC - Benefício de Prestação Continuada / Idoso">BPC - Benefício de Prestação Continuada / Idoso</option>
                                <option value="BPC - Benefício de Prestação Continuada / Pessoa com Deficiência">BPC - Benefício de Prestação Continuada / Pessoa com Deficiência</option></select> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Você já foi Vitima de algum tipo de Violência: </td>
            <td class="td_dir"> <select id="violencia" name="violencia">
            					<option value=""></option>
            					<option value="Sim">Sim</option>
            					<option value="Não">Não</option>
                                <option value="Prefiro não Declarar">Prefiro não Declarar</option></select>  &ensp;&ensp;
        	<span id="span_violencia">Qual: <input id="qual_violencia" name="qual_violencia" type="text" maxlength="25"> </span> </td>
        
        </tr>
        <tr>
        	<td class="td_esq">Entrevistador/Coletor: </td>
            <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:100%"> </td>
            <td class="td_esq">Data: </td>
            <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" > </td>
        
        </tr>
       	
        <tr>
        	<td> </td>
            <td><input id="submit" name="submit" type="submit" value="Salvar"  </td>
        </tr>
        
    
    </table>
    
</form>

</div>
</body>
</html>