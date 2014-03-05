<?php 

	if(!isset($_POST['enviar'])){
		//header('Location: http://www.lionsdla6.com.br');
		echo "Acesso Negado";
		exit();
	}

	// verifica se foi enviado um arquivo 
	if(!isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] != 0){
		echo "Erro ao enviar arquivo. Por favor, tente novamente.";
	}

    $nome = $_FILES['arquivo']['name'];
	
	// Pega a extensao
	$extensao = strrchr($nome, '.');

	if(!strstr('.jpg;.jpeg;.gif;.png;.pdf', $extensao)){
		echo "Formato de arquivo invalido <br>Você poderá enviar apenas arquivos \".jpg; .jpeg; .gif; .png ou .pdf\"<br />";
		exit();
	}
	
	if($_FILES['arquivo']['size'] > 2097152){
		echo "O tamanho do arquivo tem que ser no maximo de 2 MB";
		exit();
	}
	
///******************************************************************************************************* 
    echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
    echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
    echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
    echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";
///******************************************************************************************************* 

	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	
    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);
    
	// Cria um nome único para esta imagem
	// Evita que duplique as imagens no servidor.
	$novoNome = md5(microtime()) . $extensao .".lions";
	 
	// Concatena a pasta com o nome
	$destino = 'arquivos/' . $novoNome; 
	 
	
	include "../auxi/conn.php";
	$conecta = new Conecta();
	extract($_POST);
	
	$sql = "SELECT * FROM xv_convencao WHERE matricula = '$matricula' AND cpf = '$cpf';";
	$query = mysql_query($sql) or die("SQL: ". $sql ."<br>Erro na Query : ".mysql_error());
	
	if(mysql_num_rows($query) == 0){
		echo "Matricula ou CPF ainda não estão cadastrados.<br />";
		exit();
	}
	
	$sql = "UPDATE xv_convencao SET comprovante = '$novoNome' WHERE matricula = '$matricula' AND cpf = '$cpf';";
	$query = mysql_query($sql) or die("SQL: ". $sql ."<br>Erro na Query : ".mysql_error());
	
	// tenta mover o arquivo para o destino
	if( @move_uploaded_file( $arquivo_tmp, $destino  ) == false){
		echo "Erro ao salvar o arquivo. Tente Novamente.<br />";
		exit();
	}
	
	echo false;

?>