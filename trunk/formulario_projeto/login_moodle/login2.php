<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<script src="../js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">	
$(document).ready( function() {
	$('#botao').click(function() {alert('Oi');
	
		var href = "http://www.aedmoodle.ufpa.br/login/index.php";
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;
		var testcookies = document.getElementById('testcookies').value;
		
		$.ajax({
			
			type:"POST",
			url: href,
			data: "username="+username+"&password="+password+"&testcookies="+testcookies,
			
			success:function(data){
				$("#div_aux").html(data);
			}
		});
   	});
	
});
</script>
</head>

<body>
<div id="div_formulario">
    <form id="formulario" action="http://www.aedmoodle.ufpa.br/login/index.php" method="post">
        <input type="text" name="username" id="username" size="15" value="" />
        <input type="password" name="password" id="password" size="15" value="" />
        <input id="botao" type="button" value="Acesso" />
        <input type="hidden" id="testcookies" name="testcookies" value="1" />
    </form>
</div>

<div id="div_aux">

</div>

</body>
</html>