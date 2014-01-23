<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>

<link href="css/login.css" rel="stylesheet" type="text/css"/>
<script src="scripts.js" type="text/javascript"></script>

</head>
<body>

<?php 
	if(!isset($_POST["submit"])){
		echo "<meta charset='utf-8' http-equiv='refresh' content='0; url=index.php'>";
	}
	extract($_POST);
	
	//fazer tratamento de usuario
	

?>
<div id="login_principal">
	<table id="tab_menu" border="0" align="center">
    	<tr>
   			<td class="tds" onMouseOver="MouseOver('principal')" id="principal">Principal</td>
            <td class="tds" onMouseOver="MouseOver('anexo1')" id="anexo1">Anexo 1</td>
            <td class="tds" onMouseOver="MouseOver('anexo2')" id="anexo2">Anexo 2</td>
            <td class="tds" onMouseOver="MouseOver('anexo3')" id="anexo3">Anexo 3</td>     
        </tr>
    </table>
</div>
</body>
</html>