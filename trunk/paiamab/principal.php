<?php 
	if(!isset($_SESSION['id_usuario'])){
		echo "Acesso Negado";
		echo "<meta charset='utf-8' http-equiv='refresh' content='1; url=index.php'>";
		exit();
	}
	$_SESSION['data_sessao'] = date('Y-m-d H:i:s');
	require_once('classes/class.usuario.php');
	$usuario = new Usuario();
	
	$usuario->set_usuario( $_SESSION['id_usuario'] );
	
	if(isset($_GET['novo']) && $_GET['novo']){
		unset($_SESSION['fichaCadas']);
		unset($_SESSION['id_ficha']);
	}
	
	if(isset($_GET['buscar']) && $_GET['buscar'] && isset($_POST['id_ficha']) && $_POST['id_ficha']){
		$selecionar = true;	
		unset($_SESSION['fichaCadas']);
		$_SESSION['id_ficha'] = $_POST['id_ficha'];
	}else{
		$selecionar = false;
	}
	
	if((isset($_POST["buscar_ncontrole"]) && $_POST["buscar_ncontrole"]) || (isset($_POST["buscar_nome"]) && $_POST["buscar_nome"])){
		$busca = true;
	}
	
	if(isset($_GET['form']) && $_GET['form']){
		$form = $_GET['form'];	
	}else{
		$form = 0;
	}
	
	
	
	
	
	
	
	
	/*  
	*	Verifica qual formulario foi submetido para fazer sua validação
	*/
		if(isset($_POST['submit']) && $_POST['submit'] && isset($_POST['formulario_tipo']) && $_POST['formulario_tipo']){
			$submetido = true;
			include "validacao/valida".$_POST['formulario_tipo'].".php";
		}else{
			$submetido = false;
			$mensagem_tipo = false;		
		}
	
	
	
	
	
	
	if(isset($_SESSION['id_ficha']) && $_SESSION['id_ficha']){
		$id_ficha = $_SESSION['id_ficha'];
	}else{
		$id_ficha = false;	
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
		var id_ficha = <?php echo $id_ficha?$id_ficha:"false";?>;
		
		if(id == "fichaCadastral" || id_ficha != false)
			location.href = "index.php?form="+id.charAt(id.length-1);
		else
			alert('Você deve primeiramente preencher uma Ficha Cadastral.');				
	});
	
	
	//DIV da mensagem ao cadastrar novo usuario
	$('#cadastro_usuario').submit(function() {

		$('#div_mensagem').html('');
		$(this).ajaxSubmit(function(resposta) {
			if(resposta == false){
				$('#div_mensagem').html("Usuário Cadastrado com Sucesso.");
				$('#div_mensagem').css( "color","green");
				$('#cad_nome').val("");
				$('#cad_login').val("");
				$('#cad_senha').val("");
			}
			else{
				$('#div_mensagem').html(resposta);
				$('#div_mensagem').css( "color","red");
			}
			
		});
		// Retornando false para que o formulário não envie as informações da forma convencional
		return false;
	});
	
	
//****************************************************************************************************	

	//DIV mensagem ao cadastar formulario
	var div_erro_validacao = <?php echo $mensagem_tipo?$mensagem_tipo:"false"?>;
	if(div_erro_validacao == 1)
		$('#div_erro_validacao').css( "color","green");
		
//****************************************************************************************************
	
	
});  
	var busca = <?php echo isset($busca)&&$busca?"true":"false"; ?>;
	function botBuscar(){
		display = document.getElementById('div_buscar').style.display;
		if(display == "" || display == "none"){
			$('#div_buscar').show('slow');
			$('#a_busca').css("color", "#9E2D2D");
			if(busca == true)
				$('#div_formularios').hide('fast');
		}
		else{
			$('#div_buscar').hide('slow');
			$('#a_busca').css("color", "#eb2323");
			if(busca == true)
				$('#div_formularios').show('fast');
			
		}
	}
	
	var admin = <?php echo $usuario->admin()?"true":"false"; ?>;
	function botCadastrar(){
		if(admin == false)
			return false;
			
		display = document.getElementById('div_cadastro_usuario').style.display;
		if(display == "" || display == "none"){
			$('#div_cadastro_usuario').show('slow');
			$('#a_usuario').css("color", "#9E2D2D");
		}
		else{
			$('#div_cadastro_usuario').hide('slow');
			$('#a_usuario').css("color", "#eb2323");
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
  <div id="div_tab_botoes">
      <table id="tab_botoes" border="0">
        <tr>
          <td colspan="2"><div id="div_contador"> </div></td>
          <td><a id="a_sair" href="sair.php" onMouseOut="MouseOver('a_sair')" onMouseOver="MouseOut('a_sair')"> Sair </a></td>
        </tr>
        <tr>
          <td><a id="a_usuario" onClick="botCadastrar();" onMouseOut="MouseOver('a_usuario')" onMouseOver="MouseOut('a_usuario')" <?php echo $usuario->admin()?"":"hidden"?>> Cadastrar Usuario </a></td>
          <td><a id="a_novo" href="index.php?novo=1" onMouseOut="MouseOver('a_novo')" onMouseOver="MouseOut('a_novo')"> Novo Prontuario </a> </td>
          <td><a id="a_busca" onClick="botBuscar()" onMouseOut="MouseOver('a_busca')" onMouseOver="MouseOut('a_busca')"> Buscar Prontuario </a> </td>
        </tr>
      </table>
  </div>
</div>



<div id="div_cadastro_usuario" class="div_padrao" hidden>
<center><h2>Cadastrar Usuário</h2></center>
	<div id="div_mensagem"> </div>
	<form id="cadastro_usuario" action="validacao/validaLogin.php" method="post">
    	<table id="tab_castro_usuario" border="0" align="center" style="margin-bottom:20px; width: 500px";>
        	<tr>
            	<td class="td_esq">Nome:</td>
            	<td class="td_dir" width="50%"><input id="cad_nome" name="nome" type="text" maxlength="70" style="width:97%" required></td>
                <td rowspan="3" width="20%"><input id="bot" class="bot_submit" type="submit" value=" Cadastrar "></td>
            </tr>
            <tr>
                <td class="td_esq">Login:</td>
                <td class="td_dir"><input id="cad_login" name="login" type="text" maxlength="20" required></td>
          	</tr>
            <tr>
                <td class="td_esq">Senha:</td>
                <td class="td_dir"><input id="cad_senha" name="senha" type="password" maxlength="30" required></td>
          	</tr>
            <tr><td><input type="text" name="tipo" value="cadastro" hidden></td></tr>
            
        </table>
    </form>
	
</div>
	

<div id="div_buscar" class="div_padrao" style="display:<?php echo (isset($busca) && $busca==true)?"block":"none"?>">
<center><h2>Buscar Protuário</h2></center>
  <form id="formBuscar"  action="index.php" method="POST">
    <table id="tab_buscar" border="0" align="center">
      <tr>
        <td rowspan="3"></td>
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
