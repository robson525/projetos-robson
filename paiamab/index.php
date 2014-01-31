﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tela de Login</title>
<link href="css/login.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript">

// Quando carregado a página
$(function($) {
	
	// Tratamento de Login de Usuario
	$('#form_login').submit(function() {

		// Limpando mensagem de erro
		$('#div_erro').html('');

		// Enviando informações do formulário via AJAX
		$(this).ajaxSubmit(function(resposta) {
			// Se não retornado nenhum erro
			if (!resposta){
				// Redirecionando
				$.ajax({
							
							type:"POST",
							url: "login.php",
							data: "login="+$("#login").val()+"&senha="+$("#senha").val(),
							
							success:function(data){alert('Entrou');
								document.forms['form_login'].submit;
							}
						});
			   
			}else{alert('Erro');
				// Exibimos a mensagem de erro
				$('#div_erro').html(resposta);
			}
		});
		// Retornando false para que o formulário não envie as informações da forma convencional
		return false;
	}); // Final Tratamento do Formulario
	
	
});
</script>

</head>


<body>

<div id="div_login">
<div id="div_erro"> </div>
	<form id="form_login" name="form_login" action="validaLogin.php" method="post">
    	<table id="tab_login" border="0">
        	<tr>
            	<td>Login: </td> 
                <td><input id="login" name="login" type="text" /></td>
            </tr>
            <tr>
            	<td>Senha: </td>
                <td><input id="senha" name="senha" type="password" /> </td>
            </tr>
            <tr>
            	<td></td>
                <td><input id="submit" name="submit" type="submit" value="Logar" style="cursor:pointer; "/> </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>