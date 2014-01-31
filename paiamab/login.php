<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logado</title>

<link href="css/login.css" rel="stylesheet" type="text/css"/>
<script src="js/scripts.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>


</head>
<body>

<?php 
	if(!isset($_POST["submit"])){
		echo "<meta charset='utf-8' http-equiv='refresh' content='0; url=index.php'>";
	}
	extract($_POST);
	
	if(!$_POST["login"] || !$_POST["senha"]){
		
	}
		
	require_once('classes/class.usuario.php');
	
	
	

?>

<script type="text/javascript">
$(document).ready( function() {
	
	$('#div_principal').load('formulario/fixaCadastral.php');
	clickBotao('fixaCadastral');
	
	$('.td_menu').click(function(evt) {
		
		var id = $(this).attr('id'); // id tem que ser o mesmo nome do arquivo da pasta formulario
		var href = "formulario/"+ id +".php";
		
		$.ajax({
			
			type:"POST",
			url: href,
			data:"url="+href,
			
			beforeSend: function(){
				normalBotao();
				clickBotao(id);
			},
			success:function(data){
				$("#div_principal").html(data);
			}
		});
		
	});
	
	
	
});  

</script>


<div id="div_menu"> 
    <table id="tab_menu" border="0" align="center">
        <tr>
            <td class="td_menu" id="fixaCadastral">Fixa Cadastral</td>
            <td class="td_menu" id="anexo1">Anexo 1</td>
            <td class="td_menu" id="anexo2">Anexo 2</td>
            <td class="td_menu" id="anexo3">Anexo 3</td>     
        </tr>
    </table>
</div>


<div id="div_principal">
	
</div>

</body>
</html>