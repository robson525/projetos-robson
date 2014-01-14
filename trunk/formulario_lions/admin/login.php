<!doctype html>
<html>
<head>

<meta charset="utf-8">
<link href="css/index.css" rel="stylesheet" type="text/css"/>
<title>Login</title>

</head>

		<script type='text/javascript' src='js/jquery.js'></script>
        <script type='text/javascript' src='js/jquery.form.js'></script>
        <script type="text/javascript">

        // Quando carregado a página
        $(function($) {
			
            // Tratamento de Login de Usuario
            $('#frmLogin').submit(function() {

                // Limpando mensagem de erro
                $('div.mensagem-erro').html('');
                // Mostrando loader
                $('div.loader').show();

                // Enviando informações do formulário via AJAX
                $(this).ajaxSubmit(function(resposta) {
                    // Se não retornado nenhum erro
                    if (!resposta){
                        // Redirecionando
						$.ajax({
							
							type:"POST",
							url: "usuario/areaUsuario.php",
							data: "login="+$("#log").val()+"&senha="+$("#sen").val(),
							
							success:function(data){
								$("#div_principal").html(data);
							}
						});
					   
					}else{
                        // Encondendo loader
                        $('div.loader').hide();
						// Exibimos a mensagem de erro
                        $('div.mensagem-erro').html(resposta);
                    }
				});
				// Retornando false para que o formulário não envie as informações da forma convencional
                return false;
			}); // Final Tratamento do Formulario
			
        });
        </script>

<!-- Tela de Login -->
<body>

	<div id="div_principal"; style=" alignment-adjust:central"  >
    
    	<center> 
        <br><br>
        <h2 style="font-size: 20px">Login de Usuário</h2>
        <br>
		<form id="frmLogin" action="usuario/auxiliar/loginUsuario.php" method="POST">
			<table align="center">
            	<div class="loader" style="display: none;"><img src="img/loader.gif" alt="Carregando" /></div>
                <div class="mensagem-erro"></div>
				<tr>
					<td align="right" width="30%">Login:</td><td width="70%"><input id="log" type="text" value="" name="login" /></td>
				</tr>
				<tr>
					<td align="right">Senha:</td><td><input id="sen" type="password" value="" name="senha" /></td>
				</tr>
				<tr>
					<td align="right"></td><td id="bt_entra" align="center"><input type="submit" value="    Entrar    " /></td>
                </tr>
			</table>
		</form>
        <br><br><br>
        <div id="div_cadastro";>
             
                <a href="usuario/areaCadastro.php"; >Cadastro de Novos Usuários </a>
            
   		</div>
        
      
</center>
   </div>

</body>
</html>