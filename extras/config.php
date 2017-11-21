<?php

$hostname = "localhost";
$bancodedados = "conector";
$usuario = "root";
$senha = "central";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo 'Banco conectado com sucesso! ! !'.'<br />';


?>