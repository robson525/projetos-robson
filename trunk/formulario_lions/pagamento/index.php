<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.mask.js" type="text/javascript"></script>
<script type="text/javascript">$(document).ready(function(){ $("#cpf").mask("000.000.000-00");});</script>
<script type="text/javascript">$(document).ready(function(){ $("#matricula").mask("0000000000"); });</script>
</head>

<body>
<div id="principal">
	<form id="comprovante" name="comprovante" method="post" action="salvar.php" enctype="multipart/form-data" >
    	
    	<table id="tab_comprovante" border="0" width="100%">
        <caption>Comprovante de Pagamento</caption>
        <tr>
        	<td class="col-1">Número de Matricula <span class="span_obg">*</span></td>
            <td><input id="matricula" name="matricula" type="text" maxlength="10" required /> </td>
        </tr>
        <tr>
        	<td class="col-1">CPF <span class="span_obg">*</span></td>
            <td><input id="cpf" name="cpf" type="text" onKeyPress="tirarShadow('cpf')" maxlength="14" required/></td>
        </tr>
        <tr>
        	<td class="col-1">Comprovante <span class="span_obg">*</span></td>
            <td><input id="arquivo" name="arquivo" type="file" required /> <br>
            	<span id="info">Você poderá enviar apenas arquivos .jpg; .jpeg; .gif; .png ou .pdf</span></td>
        </tr>
        <tr>
        	<td></td>
            <td><input id="enviar" name="enviar" type="submit" value="Enviar" /> </td>
        </tr>
        
        </table>
    </form>
</div>
</body>
</html>
