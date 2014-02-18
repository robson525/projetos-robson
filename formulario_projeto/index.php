<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link type="text/css" href="css/index.css" rel="stylesheet" />
<script type="text/javascript" src="js/scripts.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.mask.js" type="text/javascript"></script>
<script type="text/javascript">$(document).ready(function(){ $("#rg").mask("999999999999999");});</script>
<script type="text/javascript">$(document).ready(function(){ $("#cpf").mask("000.000.000-00");});</script>
<script type="text/javascript">$(document).ready(function(){ $("#telefone1").mask("(00) 0000-0000"); });</script>
<script type="text/javascript">$(document).ready(function(){ $("#telefone2").mask("(00) 0000-0000"); });</script>
<script type="text/javascript">$(document).ready(function(){ $("#cep").mask("00000-000"); });</script>
<script type="text/javascript">$(document).ready(function(){ $("#inep").mask("00000000"); });</script>
</head>

<body>
<div id="div_form">
  <form id="form_cadastro" name="form_cadastro" action="salvar.php" method="post" onsubmit="return validaForm();">
    <table id="tab_cadastro" align="center" width="700px" border="0">
      <tr>
        <td class="col-1">Nome: </td>
        <td width="65%"><input id="nome" name="nome" type="text" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" maxlength="100" required/></td>
      </tr>
      <tr>
        <td class="col-1">RG: </td>
        <td><input id="rg" name="rg" type="text" onKeyPress="tirarShadow('rg')" required/>
          <a class="col-1">&emsp; Orgão Emissor:
          <input id="orgao" name="orgao" type="text" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" maxlength="30" required/>
          </a></td>
      </tr>
      <tr>
        <td class="col-1">CPF: </td>
        <td><input id="cpf" name="cpf" type="text" onKeyPress="tirarShadow('cpf')" required/></td>
      </tr>
      <tr>
        <td class="col-1">Sexo: </td>
        <td><select id="sexo" name="sexo" required>
            <option value=""></option>
            <option value="MASCULINO">MASCULINO</option>
            <option value="FEMININO">FEMININO</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Data de Nascimento: </td>
        <td><select id="dia" name="dia" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');" required>
            <?php echo monta_dia(); ?>
          </select>
          <select id="mes" name="mes" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');" required>
            <?php echo monta_mes(); ?>
          </select>
          <select id="ano" name="ano" onChange="tirarShadow('dia');tirarShadow('mes');tirarShadow('ano');" required>
            <?php echo monta_ano(); ?>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Nome do Pai: </td>
        <td width="65%"><input id="pai" name="pai" type="text" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" maxlength="100" required/></td>
      </tr>
      <tr>
        <td class="col-1">Nome da Mãe: </td>
        <td width="65%"><input id="mae" name="mae" type="text" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" maxlength="100" required/></td>
      </tr>
      <tr>
        <td class="col-1" id="end">Endereço: </td>
        <td id="enderec"><input id="endereco" name="endereco" type="text" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%" maxlength="100" required />
          <span>Endereço</span></td>
      </tr>
      <tr>
        <td></td>
        <td id="compl"><input id="complemento" name="complemento" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%;" />
          <span>Complemento</span></td>
      </tr>
      <tr>
        <td class="col-1">CEP: </td>
        <td><input id="cep" name="cep" type="text" onKeyPress="tirarShadow('cep')" required/></td>
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
        <td class="col-1">Email: </td>
        <td><input id="email" name="email" type="email" style="width:60%" onChange="minuscula(this)" onKeyUp="minuscula(this)" maxlength="70" required/></td>
      </tr>
      <tr>
        <td class="col-1">Telefone 1: </td>
        <td><input id="telefone1" name="telefone1" type="text" required/>
          <a class="col-1">&emsp;Telefone 2:&emsp;
          <input id="telefone2" name="telefone2" type="text" />
          </a></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="col-1">Nivel de Escolaridade: </td>
        <td><select id="escolaridade" name="escolaridade" required>
            <option value=""></option>
            <option value="ENSINO FUNDAMENTAL INCOMPLETO">ENSINO FUNDAMENTAL INCOMPLETO</option>
            <option value="ENSINO FUNDAMENTAL COMPLETO">ENSINO FUNDAMENTAL COMPLETO</option>
            <option value="ENSINO MÉDIO INCOMPLETO">ENSINO MÉDIO INCOMPLETO</option>
            <option value="ENSINO MÉDIO COMPLETO">ENSINO MÉDIO COMPLETO</option>
            <option value="ENSINO SUPERIO INCOMPLETO">ENSINO SUPERIO INCOMPLETO</option>
            <option value="ENSINO SUPERIO COMPLETO" selected>ENSINO SUPERIO COMPLETO</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Já participou de Atividade de extensão da Universidade Federal do Pará: </td>
        <td><select id="extensao" name="extensao" required>
            <option value=""></option>
            <option value="SIM">SIM</option>
            <option value="NÃO">NÃO</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Sua escola está vinculada a qual secretaria: </td>
        <td><select id="secretaria" name="secretaria" style="min-width:120px" required >
            <option value=''></option>
            <option value='SECRETARIA DE EDUCAÇÃO - SEDUC'>SECRETARIA DE EDUCAÇÃO - SEDUC</option>
            <option value='SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC'>SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC</option>
            <option value='SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED'>SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED</option>
            <option value='RESERVA SOCIAL'>NÃO SE APLICA - RESERVA SOCIAL</option>
          </select></td>
      </tr>
      <tr>
      	<td class="col-1">Código INEP da sua escola: </td>
        <td><input id="inep" name="inep" type="text" maxlength="8" style="width:25%" onKeyPress="tirarShadow('inep')" required />
        	<span>&thinsp; &thinsp; &thinsp; &thinsp; Caso não seja vinculado a uma escola insira o código 00000000</span></td>
      </tr>
      <tr>
        <td class="col-1">Em caso de Reserva Social em que área você atua: </td>
        <td><select id="reserva" name="reserva" >
            <option value=""></option>
            <option value="ASSISTÊNCIA SOCIAL">ASSISTÊNCIA SOCIAL</option>
            <option value="SAÚDE">SAÚDE</option>
            <option value="SEGURANÇA PÚBLICA">SEGURANÇA PÚBLICA</option>
            </select></td>
      </tr>
      <tr>
        <td class="col-1">Nível de ensino em que você atua na escola participante do curso: </td>
        <td><select id="nivel_ensino" name="nivel_ensino" required>
            <option value=""></option>
            <option value="EDUCAÇÃO INFANTIL">EDUCAÇÃO INFANTIL</option>
            <option value="ENSINO FUNDAMENTAL - ANOS INICIAIS">ENSINO FUNDAMENTAL - ANOS INICIAIS</option>
            <option value="ENSINO FUNDAMENTAL - ANOS FINAIS">ENSINO FUNDAMENTAL - ANOS FINAIS</option>
            <option value="ENSINO MÉDIO">ENSINO MÉDIO</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Função que exerce na escola participante do curso: </td>
        <td><select id="funcao" name="funcao" onChange="mostrarQual('funcao', 'qual_funcao')" style="min-width:120px" required >
            <option value=''></option>
            <option value='DOCENTE DO QUADRO PERMANENTE'>DOCENTE DO QUADRO PERMANENTE</option>
            <option value='DOCENTE COM CONTRATO TEMPORÁRIO'>DOCENTE COM CONTRATO TEMPORÁRIO</option>
            <option value='COORDENADOR(A)'>COORDENADOR(A)</option>
            <option value='ORIENTADOR(A)'>ORIENTADOR(A)</option>
            <option value='DIRETOR(A)'>DIRETOR(A)</option>
            <option value='INTEGRANTE DO QUADRO DIRIGENTE.'>INTEGRANTE DO QUADRO DIRIGENTE.</option>
            <option value='FUNCIONÁRIO TÉCNICO-ADMINISTRATIVO'>FUNCIONÁRIO TÉCNICO-ADMINISTRATIVO</option>
            <option value='INTEGRANTE DA EQUIPE TÉCNICA '>INTEGRANTE DA EQUIPE TÉCNICA </option>
            <option value='OUTRO'>OUTRO</option>
          </select></td>
      </tr>
      <tr id="qual_funcao" style="display:none">
        <td class="col-1">Qual ?</td>
        <td><input id="outra_funcao" name="outra_funcao" type="text" maxlength="50" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:40%" /></td>
      </tr>
      <tr>
        <td class="col-1">De qual(is) programa(s) a seguir a sua escola participa: </td>
        <td><input name="programa[]" type="checkbox" value="Programa Saúde na Escola - PSE">Programa Saúde na Escola - PSE<br>
            <input name="programa[]" type="checkbox" value="Projeto Saúde e Prevenção nas Escolas - SPE">Projeto Saúde e Prevenção nas Escolas - SPE<br>
            <input name="programa[]" type="checkbox" value="Programa Mais Educação">Programa Mais Educação<br>
            <input name="programa[]" type="checkbox" value="Programa Educação Integral">Programa Educação Integral<br>
            <input name="programa[]" type="checkbox" value="Programa Escola Aberta">Programa Escola Aberta<br>
            <input name="programa[]" type="checkbox" value="Programa TV Escola">Programa TV Escola<br>
            <input name="programa[]" type="checkbox" value="PDE - Escola">PDE - Escola<br>
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
	for($i = 1999; $i >= 1950; $i--) {			
		$option .= "\t<option value=\"". sprintf("%02d", $i) ."\">".sprintf("%02d", $i)."</option>\n";	
	} 	
	return $option;	
}
?>