<?php

error_reporting(E_ALL ^ E_DEPRECATED ^ E_STRICT);
include_once("../../configuration.php");
include_once("../classe/Conecta.php");

if (isset($_POST['matricula']) && $_POST['matricula'] && isset($_POST['cpf']) && $_POST['cpf']) {
    $matricula = preg_replace('/[^[:digit:]_]/', '', $_POST['matricula']);
    $cpf = preg_replace('/[^[:digit:]_]/', '', $_POST['cpf']);
    $id = validaMatCpf($matricula, $cpf);
    echo $id;
} else if (isset($_POST['matricula']) && $_POST['matricula']) {
    $matricula = preg_replace('/[^[:digit:]_]/', '', $_POST['matricula']);
    $id = verifica('matricula', $matricula);
    echo $id;
} else if (isset($_POST['cpf']) && $_POST['cpf']) {
    $cpf = preg_replace('/[^[:digit:]_]/', '', $_POST['cpf']);
    $id = verifica('cpf', $cpf);
    echo $id;
} else {
    echo false;
}

//***************************************************************************	

function verifica($campo, $valor) {
    $tabela = $campo=='matricula' ? 'jom0__usuario' : 'jom0__users';
    $campo = $campo=='matricula' ? 'matricula' : 'username';
    $con = new Conecta();
    $sql = "SELECT * FROM $tabela WHERE $campo = '$valor';";
    $query = mysql_query($sql) or die("Error in query: $sql. " . mysql_error());
    if (mysql_num_rows($query) > 0) {
        $campo = mysql_fetch_array($query);
        return $campo['id'];
    } else
        return false;
}

function validaMatCpf($matricula, $cpf) {

    $con = new Conecta();
    $sql = "SELECT * FROM xv_convencao WHERE matricula = '$matricula' AND cpf = '$cpf';";
    $query = mysql_query($sql) or die("Error in query: $sql. " . mysql_error());
    if (mysql_num_rows($query) > 0) {
        $campo = mysql_fetch_array($query);
        return $campo['id'];
    } else
        return false;
}

?>