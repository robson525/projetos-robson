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
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
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
        <td width="65%"><input id="nomepai" name="nomepai" type="text" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" maxlength="100" required/></td>
      </tr>
      <tr>
        <td class="col-1">Nome da Mãe: </td>
        <td width="65%"><input id="nomemae" name="nomemae" type="text" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" maxlength="100" required/></td>
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
            <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
            <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
            <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
            <option value="Ensino Médio Completo">Ensino Médio Completo</option>
            <option value="Ensino Superio Incompleto">Ensino Superio Incompleto</option>
            <option value="Ensino Superio Completo" selected>Ensino Superio Completo</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Já participou de Atividade de extensão da Universidade Federal do Pará: </td>
        <td><select id="participou" name="participou" required>
            <option value=""></option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
          </select></td>
      </tr>
      <tr>
      	<td class="col-1">Código INEP da sua escola: </td>
        <td><input id="inep" name="inep" type="text" maxlength="8" style="width:25%" /></td>
      </tr>
      <tr>
        <td class="col-1">Sua escola está vinculada a qual secretaria: </td>
        <td><select id="orgao" name="orgao" style="min-width:120px" required >
            <option value='' selected></option>
            <option value='SECRETARIA DE EDUCAÇÃO - SEDUC'>SECRETARIA DE EDUCAÇÃO - SEDUC</option>
            <option value='SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC'>SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC</option>
            <option value='SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED'>SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED</option>
            <option value='RESERVA SOCIAL'>NÃO SE APLICA - RESERVA SOCIAL</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Em caso de Reserva Social em que área você atua: </td>
        <td><select id="reserva" name="reserva" >
            <option value=""></option>
            <option value="Assistência Social">Assistência Social</option>
            <option value="Saúde">Saúde</option>
            <option value="Segurança Pública">Segurança Pública</option>
            </select></td>
      </tr>
      <tr>
        <td class="col-1">Nível de ensino em que você atua na escola participante do curso: </td>
        <td><select id="nivel_ensino" name="nivel_ensino" required>
            <option value=""></option>
            <option value="Educação Infantil">Educação Infantil</option>
            <option value="Ensino Fundamental - Anos Iniciais">Ensino Fundamental - Anos Iniciais</option>
            <option value="Ensino Fundamental - Anos Finais">Ensino Fundamental - Anos Finais</option>
            <option value="Ensino Médio">Ensino Médio</option>
          </select></td>
      </tr>
      <tr>
        <td class="col-1">Função que exerce na escola participante do curso: </td>
        <td><select id="funcao" name="funcao" onChange="mostrarQual('funcao', 'qual_funcao')" style="min-width:120px" required >
            <option value='' selected></option>
            <option value='Docente do quadro permanente'>Docente do quadro permanente</option>
            <option value='Docente com contrato temporário'>Docente com contrato temporário</option>
            <option value='Coordenador(a)'>Coordenador(a)</option>
            <option value='Orientador(a)'>Orientador(a)</option>
            <option value='Diretor(a)'>Diretor(a)</option>
            <option value='Integrante do quadro dirigente.'>Integrante do quadro dirigente.</option>
            <option value='Funcionário técnico-administrativo'>Funcionário técnico-administrativo</option>
            <option value='Integrante da equipe técnica '>Integrante da equipe técnica </option>
            <option value='OUTRO'>Outro</option>
          </select></td>
      </tr>
      <tr id="qual_funcao" style="display:none">
        <td class="col-1">Qual ?</td>
        <td><input id="outra_funcao" name="outra_funcao" type="text" maxlength="30" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:40%" /></td>
      </tr>
      <tr>
        <td class="col-1">De qual(is) programa(s) a seguir a sua escola participa: </td>
        <td><input name="programas[]" type="checkbox" value="Programa Saúde na Escola - PSE">Programa Saúde na Escola - PSE<br>
            <input name="programas[]" type="checkbox" value="Projeto Saúde e Prevenção nas Escolas - SPE">Projeto Saúde e Prevenção nas Escolas - SPE<br>
            <input name="programas[0]" type="checkbox" value="Programa Mais Educação">Programa Mais Educação<br>
            <input name="programas[1]" type="checkbox" value="Programa Educação Integral">Programa Educação Integral<br>
            <input name="programas[2]" type="checkbox" value="Programa Escola Aberta">Programa Escola Aberta<br>
            <input name="programas[3]" type="checkbox" value="Programa TV Escola">Programa TV Escola<br>
            <input name="programas[4]" type="checkbox" value="PDE - Escola">PDE - Escola<br>
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