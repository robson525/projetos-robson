<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Inscrição da Convenção</title>
<link href="css/formulario.css" rel="stylesheet" type="text/css"/>
<script src="js/formulario.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.mask.js" type="text/javascript"></script>

<!--Mascaras-->

<script type="text/javascript">$(document).ready(function(){ $("#cpf").mask("000.000.000-00");});</script>
<script type="text/javascript">$(document).ready(function(){ $("#matricula").mask("0000000000"); });</script>
<script type="text/javascript">

 $(document).ready( function() {

	$('#estado').change(function() {

		$.post('auxi/cidades.php',{estado: $(this).val() }, 

		function(resposta){

			$('#cidade').html(resposta);

		});

		$.post('auxi/clubes.php',{estado: $(this).val() }, 

		function(resposta){

			$('#clube').html(resposta);

		});

	})
	$('#estado').val(function() {});
	
	
	$('#matricula').change(function() {		
		$.post('auxi/verificar.php',{matricula: $(this).val() }, 

		function(resposta){
			if(resposta != false){
				alert(resposta);
				//$('#cidade').html(resposta);
			}
		});
	});
	
	$('#cpf').change(function() {		
		$.post('auxi/verificar.php',{cpf: $(this).val() }, 

		function(resposta){
			if(resposta != false){
				alert(resposta);
				//$('#cidade').html(resposta);
			}
		});
	});

 });  

</script>
</head>

<body>
<div id="div_formulario">
  <form id="formulario" name="formulario" action="auxi/salvar.php" method="POST" onsubmit="return validaForm();">
    <table id="tabela" align="center" border="0" width="100%" >
      <tr>
        <td width="30%" class="col-1">Nome Completo</td>
        <td width="70%"><input id="nome" name="nome" type="text" maxlength="100" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" required /></td>
      </tr>
      <tr>
        <td class="col-1">Número de Matricula</td>
        <td><input id="matricula" name="matricula" type="text" maxlength="10" style="width:25%" />
          <br>
          <span>Vide: <a href="http://www.lionsdla6.com.br/index.php/distrito/lista-de-associados.html" target="_blank">Lista de	 Associados do Distrito</a></span></td>
      </tr>
      <tr>
        <td class="col-1">CPF</td>
        <td><input id="cpf" name="cpf" type="text" style="width:25%;" onKeyPress="tirarShadow('cpf')" required/>
          <br>
          <span class="ocultar" id="span_cpf">Di</span></td>
      </tr>
      <tr>
        <td class="col-1">E-mail</td>
        <td><input id="email" name="email" type="email" maxlength="50" style="width:50%;" onKeyUp="minuscula(this)" required/></td>
      </tr>
      <tr>
        <td class="col-1">Data de Nascimento</td>
        <td><select id="dia" name="dia" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');">
            <?php echo monta_dia(); ?>
          </select>
          <select id="mes" name="mes" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');">
            <?php echo monta_mes(); ?>
          </select>
          <select id="ano" name="ano" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');">
            <?php echo monta_ano(); ?>
          </select></td>
      </tr>
      <tr>
        <td class="col-1" id="end">Endereço</td>
        <td id="enderec"><input id="endereco" name="endereco" type="text" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%"/>
          <span>Endereço</span></td>
      </tr>
      <tr>
        <td></td>
        <td id="compl"><input id="complemento" name="complemento" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%;"/>
          <span>Complemento</span></td>
      </tr>
      <tr>
        <td class="col-1">Estado</td>
        <td><select id="estado" name="estado" required>
            <option value=""></option>
            <option value="AMAPÁ">AMAPÁ</option>
            <option value="MARANHÃO">MARANHÃO</option>
            <option value="PARÁ">PARÁ</option>
            <option value="PIAUÍ">PIAUÍ</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Cidade</td>
        <td><select id="cidade" name="cidade" size="1" style="min-width:100px" required >
            <option id="padrao" value="" selected></option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Clube</td>
        <td><select id="clube" name="clube" style="min-width:100px" required>
            <option value=""></option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Delegado do Clube ?</td>
        <td><select id="delegado" name="delegado" onChange="Delegado()" required>
            <option value=""></option>
            <option value="SIM">SIM</option>
            <option value="NÃO">NÃO</option>
          </select>
          <br>
          <span id="span_delegado">Ao Delegado é obrigatório a apresentação da carta de credenciamento e copia das cartas internacional e distrital dos dois semestres anteriores para votação no dia do evento.</span></td>
      </tr>
      <tr>
        <td class="col-1">Cargo no Clube</td>
        <td><select id="cargo_clube" name="cargo_clube" onChange="mostrarQual()" >
            <option value=""></option>
            <option value="PRESIDENTE">PRESIDENTE</option>
            <option value="SECRETÁRIO">SECRETÁRIO</option>
            <option value="TESOUREIRO">TESOUREIRO</option>
            <option value="LEO">LEO</option>
            <option value="OUTRO">OUTRO</option>
          </select></td>
      </tr>
      <tr class="ocultar" id="qual_clube">
        <td class="col-1">Qual ?</td>
        <td><input id="outro_cargo_clube" name="outro_cargo_clube" type="text" maxlength="30" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:40%" /></td>
      </tr>
      <tr>
        <td class="col-1">Cargo no Distrito</td>
        <td><select id="cargo_distrito" name="cargo_distrito" onChange="mostrarQual()">
            <option value="0"></option>
            <option value="GOVERNADOR">GOVERNADOR</option>
            <option value="VICE GOVERNADOR">VICE GOVERNADOR</option>
            <option value="PDG">PDG</option>
            <option value="ASSESSOR">ASSESSOR</option>
            <option value="ASSISTENTE">ASSISTENTE</option>
            <option value="ASSOCIADO">ASSOCIADO</option>
            <option value="CONVIDADO">CONVIDADO</option>
            <option value="COORDENADOR">COORDENADOR</option>
            <option value="DIRETOR">DIRETOR</option>
            <option value="DOMADORA">DOMADORA</option>
            <option value="PRESIDENTE DA RAGIÃO">PRESIDENTE DA RAGIÃO</option>
            <option value="PRESIDENTE DA DIVISÃO">PRESIDENTE DA DIVISÃO</option>
            <option value="COORDENADOR">COORDENADOR</option>
            <option value="EX-PRESIDENTE CONSELHO">EX-PRESIDENTE CONSELHO</option>
            <option value="VOGAL">VOGAL</option>
            <option value="SECRETARIO">SECRETARIO</option>
            <option value="TESOUREIRO">TESOUREIRO</option>
            <option value="VICE PRESIDENTE">VICE PRESIDENTE</option>
            <option value="OUTRO">OUTRO</option>
          </select></td>
      </tr>
      <tr class="ocultar" id="qual_distrito" >
        <td class="col-1">Qual ?</td>
        <td><input id="outro_cargo_distrtito" name="outro_cargo_distrtito" type="text" maxlength="30" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:40%" /></td>
      </tr>
      <tr>
        <td class="col-1">CL Melvin Jones ?</td>
        <td><select id="cl_mj" name="cl_mj" required>
            <option value=""></option>
            <option value="SIM">SIM</option>
            <option value="NÃO">NÃO</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Prefixo</td>
        <td><select id="prefixo" name="prefixo" required>
            <option value=""></option>
            <option value="Cal">Cal</option>
            <option value="CL">CL</option>
            <option value="DM">DM</option>
            <option value="CCLEO">CCLEO</option>
            <option value="Convidado">Convidado</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Tamanho Camisa</td>
        <td><select id="camisa" name="camisa" required>
            <option value=""></option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
            <option value="GG">GG</option>
          </select></td>
      </tr>
      <tr>
        <td></td>
        <td><input id="botao" type="submit" value="Enviar" /></td>
      </tr>
    </table>
  </form>
</div>
</body>
<?php 

function monta_dia() {

	$option = "<option value=''>Dia</option>";

	for($i = 1; $i <= 31; $i++) {			

		$option .= "\t<option value=\"". sprintf("%02d", $i) ."\">".sprintf("%02d", $i)."</option>\n";	

	} 	

	return $option;	

}



function monta_mes() {

	$option  = "<option value=''>Mês</option>";

	$option .= "<option value='01'>Janeiro</option>";

	$option .= "<option value='02'>Fevereiro</option>";

	$option .= "<option value='03'>Março</option>";	

	$option .= "<option value='04'>Abril</option>";	

	$option .= "<option value='05'>Maio</option>";	

	$option .= "<option value='06'>Junho</option>";	

	$option .= "<option value='07'>Julho</option>";	

	$option .= "<option value='08'>Agosto</option>";	

	$option .= "<option value='09'>Setembro</option>";	

	$option .= "<option value='10'>Outubro</option>";	

	$option .= "<option value='11'>Novembro</option>";	

	$option .= "<option value='12'>Dezembro</option>";	



	return $option;	



}







function monta_ano() {



	$option = "<option value=''>Ano</option>";

	for($i = 2010; $i >= 1950; $i--) {			

		$option .= "\t<option value=\"". sprintf("%02d", $i) ."\">".sprintf("%02d", $i)."</option>\n";	

	} 	



	return $option;	

}



function montaCidade(){

	echo "<script>alert('OI')</script>";

}



?>
</html>