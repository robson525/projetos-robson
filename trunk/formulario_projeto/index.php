<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link type="text/css" href="css/index.css" rel="stylesheet" />
<script type="text/javascript" src="js/scripts.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.mask.js" type="text/javascript"></script>

<script type="text/javascript">$(document).ready(function(){ $("#cpf").mask("000.000.000-00");});</script>
<script type="text/javascript">$(document).ready(function(){ $("#telefone").mask("(00) 0000-0000"); });</script>

</head>

<body>

<div id="div_form">
<form id="form_cadastro" name="form_cadastro" action="salvar.php" method="post" onsubmit="return validaForm();">
	<table id="tab_cadastro" align="center" width="700px" border="0">
    	<tr>
        	<td class="col-1">Nome: </td>
            <td width="65%"><input id="nome" name="nome" type="text" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" maxlength="100" required/> </td>
        </tr>
        <tr>
        	<td class="col-1">CPF: </td>
            <td><input id="cpf" name="cpf" type="text" onKeyPress="tirarShadow('cpf')" required/> </td>
        </tr>
        <tr>
        	<td class="col-1">Email: </td>
            <td><input id="email" name="email" type="email" style="width:60%" onChange="minuscula(this)" onKeyUp="minuscula(this)" maxlength="70" required/> </td>
        </tr>
        <tr>
        	<td class="col-1">Telefone: </td>
            <td><input id="telefone" name="telefone" type="text" required/> </td>
        </tr>
        <tr>
        	<td class="col-1">Data de Nascimento: </td>
            <td><select id="dia" name="dia" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');" required><?php echo monta_dia(); ?> </select> 
            	<select id="mes" name="mes" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');" required><?php echo monta_mes(); ?></select>
                <select id="ano" name="ano" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');" required><?php echo monta_ano(); ?></select> 
            </td>
        </tr>
        <tr>
        <td class="col-1" id="end">Endereço: </td>
        <td id="enderec"><input id="endereco" name="endereco" type="text" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%" maxlength="100" required/>
          <span>Endereço</span></td>
      </tr>
      <tr>
        <td></td>
        <td id="compl"><input id="complemento" name="complemento" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%;" maxlength="100" />
          <span>Complemento</span></td>
      </tr>
      <tr>
        <td class="col-1">Cidade: </td>
        <td><select id="cidade" name="cidade" style="min-width:120px" required >
            <option value='' selected></option>
            <option value='ANANINDEUA'>ANANINDEUA</option>
            <option value='BELÉM'>BELÉM</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Profissão: </td>
        <td><select id="profissao" name="profissao" onChange="mostrarQual()" style="min-width:120px" required >
            <option value='' selected></option>
            <option value='PROFESSOR'>PROFESSOR</option>
            <option value='GESTOR'>GESTOR</option>
            <option value='OUTRO'>OUTRO</option>
          </select></td>
      </tr>
      <tr id="qual_profissao" style="display:none">
        <td class="col-1">Qual ?</td>
        <td><input id="outra_profissao" name="outra_profissao" type="text" maxlength="30" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:40%" maxlength="50" /></td>
      </tr>
      <tr>
        <td class="col-1">Orgão: </td>
        <td><select id="orgao" name="orgao" style="min-width:120px" required >
            <option value='' selected></option>
            <option value='SECRETARIA DE EDUCAÇÃO - SEDUC'>SECRETARIA DE EDUCAÇÃO - SEDUC</option>
            <option value='SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC'>SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC</option>
            <option value='SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED'>SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED</option>
            <option value='RESERVA SOCIAL'>RESERVA SOCIAL</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Escola onde Atua: </td>
        <td><select id="escola" name="escola"  required >
            <option value='' selected></option>
            <option value='ESCOLA1'>ESCOLA1</option>
            <option value='ESCOLA2'>ESCOLA2</option>
            <option value='ESCOLA3'>ESCOLA3</option>
            <option value='ESCOLA4'>ESCOLA4</option>
          </select></td>
      </tr>
      <tr>
        <td></td>
        <td><input id="botao" name="submit" type="submit" value="Cadastrar" /></td>
      </tr>
    </table>
</form>
</div>
</body>
</html>

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
	for($i = 1990; $i >= 1950; $i--) {			
		$option .= "\t<option value=\"". sprintf("%02d", $i) ."\">".sprintf("%02d", $i)."</option>\n";	
	} 	
	return $option;	
}
?>