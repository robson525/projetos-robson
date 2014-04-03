<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<script src="../js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">	
$(document).ready( function() {
	$('#formulario').submit(function() {alert('OI');

		$(this).ajaxSubmit(function(resposta) {
			alert(resposta);
			//$("#div_aux").html(resposta);
					
		});
		// Retornando false para que o formulário não envie as informações da forma convencional
		return false;
   	});
});
</script>
</head>

<body>
<div id="div_formulario">
    <form id="formulario" action="http://www.aedmoodle.ufpa.br/login/index.php" method="post">
        <input type="text" name="username" id="username" size="15" value="" />
        <input type="password" name="password" id="password" size="15" value="" />
        <input type="submit" value="Acesso" />
        <input type="hidden" name="testcookies" value="1" />
    </form>
</div>

<div id="div_aux">

</div>

</body>
</html>