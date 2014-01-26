<?php

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administração</title>
<?php include "class/conecta.php";?>
<link type="text/css" href="css/admin.css" rel="stylesheet" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type="text/javascript">



// Quando carregado a página
$(function($) {

$('#div_resultado').load('listar.php');

$('#bot_filtro').click(function(evt){
	var ordem = document.getElementById('filtro_ordem').value;
	var orgao = document.getElementById('filtro_orgao').value;
	var profs = document.getElementById('filtro_prof').value;

	$.ajax({
		
		type:"POST",
		url: "listar.php",
		data:"ordem="+ordem+"&orgao="+orgao+"&profs="+profs,
		
		success:function(data){
			$("#div_resultado").html(data);
		}
		
	});
	
});

$('#div_pdf').click(function(evt){
	var ordem = document.getElementById('filtro_ordem').value;
	var orgao = document.getElementById('filtro_orgao').value;
	var profs = document.getElementById('filtro_prof').value;

	window.open('pdf/salvarPDF.php?ordem='+ordem+'&orgao='+orgao+'&profs='+profs, 'janela', 'width=800, height=600');
	
});
	
});
</script>
</head>
<body>
<header>
  <h1>Resultado das Inscrições</h1>
</header>
<div id="div_botao">
  <table class="tb_filtro" border="0" align="center" cellspacing="10">
    <tr>
      <td align="center">Ordenar por: </td>
      <td><select id="filtro_ordem" name="filtro_ordem">
          <option value='' selected></option>
          <option value='nome'>NOME</option>
          <option value='orgao'>ORGÃO</option>
          <option value='profissao'>PROFISSÃO</option>
          <option value='escola'>ESCOLA</option>
        </select></td>
    </tr>
    <tr>
      <td>Fitrar Orgão</td>
      <td><select id="filtro_orgao" name="filtro_orgao">
          <option value='' selected></option>
          <option value='SECRETARIA DE EDUCAÇÃO - SEDUC'>SECRETARIA DE EDUCAÇÃO - SEDUC</option>
          <option value='SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC'>SECRETARIA MUNICIPAL DE EDUCAÇÃO - SEMEC</option>
          <option value='SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED'>SECRETARIA DE EDUCAÇÃO DE ANANINDEUA - SEMED</option>
          <option value='RESERVA SOCIAL'>RESERVA SOCIAL</option>
        </select></td>
    </tr>
    <tr>
      <td>Fitrar Profissão</td>
      <td><select id="filtro_prof" name="filtro_prof">
          <option value='' selected></option>
          <option value='PROFESSOR'>PROFESSOR</option>
          <option value='GESTOR'>GESTOR</option>
          <option value='OUTRO'>OUTRO</option>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input id="bot_filtro" type="button" value="Filtrar" /></td>
    </tr>
  </table>
</div>

<!--Tabela com Resultados -->
<div id="div_pdf"> 
	<a ><img border="0" src="img/pdf_icon.png" title="Gerar PDF da Tabela" width="30px" height="30px"></a>
</div>

<!--Tabela com Resultados -->
<div id="div_resultado"> 

</div>

</body>
</html>
<?php
$html = ob_get_contents();
?>