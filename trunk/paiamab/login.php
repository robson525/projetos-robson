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
	
	if(isset($_SESSION['id_ficha']) && $_SESSION['id_ficha']){
		echo "ID FICHA = ".$_SESSION['id_ficha'];
	}

?>
<script type="text/javascript">
$(document).ready( function() {
	
	$('#div_principal').load('formulario/fichaCadastral.php');
	clickBotao('fichaCadastral');
	
	$('#formBuscar').submit(function() {

		$(this).ajaxSubmit(function(resposta) {
			$("#div_listar").html(resposta);
					
		});
		// Retornando false para que o formulário não envie as informações da forma convencional
		return false;
   	});
	
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
<div id="div_usuario"  class="div_padrao">
  <div id="div_tab_usuario">
    <table id="tab_usuario" border="0">
      <tr>
        <td class="td_esq" >Usuário: </td>
        <td class="td_dir" ><h2><?php echo $usuario->get_nome();?></h2></td>
      </tr>
      <tr>
        <td class="td_esq" >Ultimo Acesso: </td>
        <td class="td_dir" ><?php echo $usuario->get_ultima_sessao();?></td>
      </tr>
    </table>
  </div>
  <div id="div_bt_sair"> <a href="sair.php"> Sair </a> </div>
  <div id="div_bt_buscar"> <a onClick="botBuscar()"> Buscar Prontuario </a> </div>
</div>


<div id="div_buscar" class="div_padrao">
  <form id="formBuscar"  action="buscar.php" method="POST">
    <table id="tab_buscar" border="0" align="center">
      <tr>
        <td rowspan="3"><h2>Buscar</h2></td>
        <td class="td_esq" >Nº de Controle: </td>
        <td class="td_dir" ><input id="buscar_ncontrole" name="buscar_ncontrole" type="text" /></td>
        <td rowspan="3" id="botao"><input id="input_busca" name="input_busca" type="submit" value="Buscar" /></td>
      </tr>
      <tr>
        <td class="td_esq" >Nome: </td>
        <td class="td_dir" width="250px"><input id="buscar_nome" name="buscar_nome" type="text" style="width:100%"/></td>
      </tr>
    </table>
  </form>
</div>

<div id="div_listar" class="div_padrao">

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
<div id="div_principal" class="div_padrao"> </div>
</body>
</html>