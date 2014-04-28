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
			if (resposta.length <= 1){
				// Redirecionando
				window.location = 'index.php';				
			}else{
				// Exibimos a mensagem de erro
				$('#div_erro').html(resposta);
			}
		});
		// Retornando false para que o formulário não envie as informações da forma convencional
		return false;
	}); // Final Tratamento do Formulario
	
	
});
</script>

<div id="div_erro"> </div>
<div id="div_login">

	<form id="form_login" name="form_login" action="validacao/validaLogin.php" method="post">
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