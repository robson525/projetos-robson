<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Moodle PSE</title>
<style type="text/css">
	

</style>
<script src="../js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">	
$(document).ready( function() {
	//$("#frame").load("http://www.aedmoodle.ufpa.br/login/index.php");
	$('#botao').click(function() {alert('oi');

		$('#formulario').ajaxSubmit(function(resposta) {
			alert(resposta);
			$("#div_aux").html(resposta);
					
		});
		// Retornando false para que o formulário não envie as informações da forma convencional
		return false;
   	});
});
</script>
</head>

<body>
<div id="div_formulario">
    <form id="formulario" action="login.php" method="post">
        <input type="text" name="username" id="username" size="15" value="" />
        <input type="password" name="password" id="password" size="15" value="" />
        <input type="button" value="Acesso" id="botao"/>
        <input type="hidden" name="testcookies" value="1" />
    </form>
</div>

<div id="div_aux">
	<!--<iframe id="frame" style="border: 2px solid #132d54; display: block; margin-left: auto; margin-right: auto;" title="PDF in an i-Frame" src="" name="meuiframe" frameborder="1" scrolling="auto" height="600" width="850"></iframe>-->
</div>

</body>
</html>