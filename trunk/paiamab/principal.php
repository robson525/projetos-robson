﻿<?php 
	if(!isset($_SESSION['id_usuario'])){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=index.php'>";
		exit();
	}
	$_SESSION['data_sessao'] = date('Y-m-d H:i:s');
	require_once('classes/class.usuario.php');
	$usuario = new Usuario();
	
	$usuario->set_usuario( $_SESSION['id_usuario'] );
	
	if((isset($_POST["buscar_ncontrole"]) && $_POST["buscar_ncontrole"]) || (isset($_POST["buscar_nome"]) && $_POST["buscar_nome"])){
		$busca = true;
	}
	
	if(isset($_GET['form']) && $_GET['form']){
		$form = $_GET['form'];	
	}else{
		$form = 0;
	}
	
	if(isset($_GET['buscar']) && $_GET['buscar']){
		$buscar = $_GET['buscar'];	
		$_SESSION['id_ficha'] = $buscar;
	}else{
		$buscar = false;
	}
	
	if(isset($_GET['novo']) && $_GET['novo']){
		unset($_SESSION['fichaCadas']);
	}
	

?>
<link href="css/formularios.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
$(document).ready( function() {
	var form = parseInt('<?php echo $form;?>');
	switch(form){
		case 1: clickBotao('anexo1'); break;
		case 2: clickBotao('anexo2'); break;
		case 3: clickBotao('anexo3'); break;
		case 4: clickBotao('anexo4'); break;
		case 5: clickBotao('anexo5'); break;
		case 6: clickBotao('anexo6'); break;
		case 7: clickBotao('anexo7'); break;
		case 8: clickBotao('anexo8'); break;
		case 9: clickBotao('anexo9'); break;
		default: clickBotao('fichaCadastral');break;	
	}
	
	$('.td_menu').click(function(evt) {
		
		var id = $(this).attr('id'); // id tem que ser o mesmo nome do arquivo da pasta formulario
		var href = "formulario/"+ id +".php";
		location.href = "index.php?form="+id.charAt(id.length-1);
				
	});
	
});  
	var busca = <?php echo isset($busca)&&$busca?"true":"false"; ?>;
	function botBuscar(){
		display = document.getElementById('div_buscar').style.display;
		if(display == "" || display == "none"){
			$('#div_buscar').show('slow');
			if(busca == true)
				$('#div_formularios').hide('fast');
		}
		else{
			$('#div_buscar').hide('slow');
			if(busca == true)
				$('#div_formularios').show('fast');
			
		}
	}
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
        <td class="td_dir" ><?php 	if($usuario->get_ultima_sessao()=="")
										echo "Primeira Sessão";
									else
										echo date('d/m/Y', strtotime($usuario->get_ultima_sessao()))
											 ." às ".date('H:i:s', strtotime($usuario->get_ultima_sessao()));
							?></td>
      </tr>
    </table>
  </div>
  <div id="div_contador"> </div>
  <div id="div_bt_sair"> <a href="sair.php"> Sair </a> </div>
  <div id="div_bt_novo"> <a href="index.php?novo=1"> Novo Prontuario </a> </div>
  <div id="div_bt_buscar"> <a onClick="botBuscar()"> Buscar Prontuario </a> </div>
</div>


<div id="div_buscar" class="div_padrao" style="display:<?php echo (isset($busca) && $busca==true)?"block":"none"?>">
  <form id="formBuscar"  action="index.php" method="POST">
    <table id="tab_buscar" border="0" align="center">
      <tr>
        <td rowspan="3"><h2>Buscar</h2></td>
        <td class="td_esq" >Nº de Controle: </td>
        <td class="td_dir" ><input id="buscar_ncontrole" name="buscar_ncontrole" type="text" value="<?php echo (isset($_POST["buscar_ncontrole"])&&$_POST["buscar_ncontrole"]==true)?$_POST["buscar_ncontrole"]:""?>" /></td>
      </tr>
      <tr>
      	<td colspan="2">OU</td>
        <td id="botao"><input id="input_busca" name="input_busca" class="bot_submit" type="submit" value="Buscar" /></td>
      </tr>
      <tr>
        <td class="td_esq" >Nome: </td>
        <td class="td_dir" width="250px"><input id="buscar_nome" name="buscar_nome" type="text" value="<?php echo (isset($_POST["buscar_nome"])&&$_POST["buscar_nome"]==true)?$_POST["buscar_nome"]:""?>" style="width:100%"/></td>
      </tr>
    </table>
    <br>
  </form>
    <div id="div_listar" >
        <?php
            if(isset($busca)&&$busca==true)
                include "buscar.php";
        ?>
    </div>
</div>


<div id="div_formularios" style="display:<?php echo (isset($busca) && $busca==true)?"none":"block"?>">
    
    <div id="div_menu">
      <table id="tab_menu" border="0" align="center">
        <tr>
          <td class="td_menu" id="fichaCadastral" onMouseOver="MouseOver('fichaCadastral');" onMouseOut="MouseOut('fichaCadastral');">Fixa Cadastral</td>
          <td class="td_menu" id="anexo1" onMouseOver="MouseOver('anexo1');" onMouseOut="MouseOut('anexo1');">Anexo 1</td>
          <td class="td_menu" id="anexo2" onMouseOver="MouseOver('anexo2');" onMouseOut="MouseOut('anexo2');">Anexo 2</td>
          <td class="td_menu" id="anexo3" onMouseOver="MouseOver('anexo3');" onMouseOut="MouseOut('anexo3');">Anexo 3</td>
          <td class="td_menu" id="anexo4" onMouseOver="MouseOver('anexo4');" onMouseOut="MouseOut('anexo4');">Anexo 4</td>
          <td class="td_menu" id="anexo5" onMouseOver="MouseOver('anexo5');" onMouseOut="MouseOut('anexo5');">Anexo 5</td>
          <td class="td_menu" id="anexo6" onMouseOver="MouseOver('anexo6');" onMouseOut="MouseOut('anexo6');">Anexo 6</td>
          <td class="td_menu" id="anexo7" onMouseOver="MouseOver('anexo7');" onMouseOut="MouseOut('anexo7');">Anexo 7</td>
          <td class="td_menu" id="anexo8" onMouseOver="MouseOver('anexo8');" onMouseOut="MouseOut('anexo8');">Anexo 8</td>
          <td class="td_menu" id="anexo9" onMouseOver="MouseOver('anexo9');" onMouseOut="MouseOut('anexo9');">Anexo 9</td>
        </tr>
      </table>
    </div>
    
    <div id="div_principal" class="div_padrao"> 
    	<?php
        	switch($form){
				case 1: include "formulario/anexo1.php"; break;
				case 2: include "formulario/anexo2.php"; break;
				case 3: include "formulario/anexo3.php"; break;
				case 4: include "formulario/anexo4.php"; break;
				case 5: include "formulario/anexo5.php"; break;
				case 6: include "formulario/anexo6.php"; break;
				case 7: include "formulario/anexo7.php"; break;
				case 8: include "formulario/anexo8.php"; break;
				case 9: include "formulario/anexo9.php"; break;
				default: include "formulario/fichaCadastral.php"; break;	
				
			}
		?>
    </div>
   
</div>