<?php session_name('paiamab');session_start();
	require_once('classes/class.usuario.php');
	$usuario = new Usuario();
	$usuario->set_usuario( $_SESSION['id_usuario'] );
	$usuario->set_ultima_sessao( $_SESSION['data_sessao']);
	
	session_destroy();
	header('Location: index.php');

?>