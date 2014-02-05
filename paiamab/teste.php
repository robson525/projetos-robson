<?php 

	$nome = NULL;
	$n_controle = 'robson';

		if($nome != '' && $nome != NULL && ($n_controle == '' || $n_controle ==NULL) ){
			echo 1;
		}
		else if(($nome == '' || $nome == NULL) && $n_controle != '' && $n_controle != NULL ){
			echo 2;
		}
		else 
			echo 3;
?>