<?php @session_start();?>
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
	if(!$_SESSION){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=index.php'>";
		exit();
	}
	
	require_once('classes/class.usuario.php');
	$usuario = new Usuario();
	
	$usuario->set_usuario( $_SESSION['id_usuario'] );
	
	

?>

<script type="text/javascript">
$(document).ready( function() {
	
	$('#div_principal').load('formulario/fichaCadastral.php');
	clickBotao('fichaCadastral');
	
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

<div id="div_usuario">
	<table id="tab_usuario" border="0">
        <tr>
            <td class="td_usu" >Usuário: </td>
            <td class="td_usu_esc" ><h2><?php echo $usuario->get_nome();?></h2></td>
        </tr>
        <tr>
            <td class="td_usu" >Ultimo Acesso: </td>
            <td class="td_usu_esc" ><?php echo $usuario->get_ultima_sessao();?></td>
        </tr>
    </table>
	
</div>

<div id="div_menu"> 
    <table id="tab_menu" border="0" align="center">
        <tr>
            <td class="td_menu" id="fichaCadastral">Fixa Cadastral</td>
            <td class="td_menu" id="anexo1">Anexo 1</td>
            <td class="td_menu" id="anexo2">Anexo 2</td>
            <td class="td_menu" id="anexo3">Anexo 3</td>
            <td class="td_menu" id="anexo4">Anexo 4</td> 
            <td class="td_menu" id="anexo5">Anexo 5</td> 
            <td class="td_menu" id="anexo6">Anexo 6</td> 
            <td class="td_menu" id="anexo7">Anexo 7</td> 
            <td class="td_menu" id="anexo8">Anexo 8</td> 
            <td class="td_menu" id="anexo9">Anexo 9</td>      
        </tr>
    </table>
</div>


<div id="div_principal">
	
</div>

</body>
</html>