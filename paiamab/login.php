<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logado</title>

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

<div id="div_menu" class="content"> 
    <table id="tab_menu" border="0" align="center">
        <tr>
            <td class="td_menu" onMouseOver="MouseOver('principal')" onMouseOut="MouseOut('principal')" onClick="Click('principal')" id="principal">Principal</td>
            <td class="td_menu" onMouseOver="MouseOver('anexo1')" onMouseOut="MouseOut('anexo1')" onClick="Click('anexo1')" id="anexo1">Anexo 1</td>
            <td class="td_menu" onMouseOver="MouseOver('anexo2')" onMouseOut="MouseOut('anexo2')" onClick="Click('anexo2')" id="anexo2">Anexo 2</td>
            <td class="td_menu" onMouseOver="MouseOver('anexo3')" onMouseOut="MouseOut('anexo3')" onClick="Click('anexo3')" id="anexo3">Anexo 3</td>     
        </tr>
    </table>
</div>

<div id="login_principal">
	
</div>
</body>
</html>