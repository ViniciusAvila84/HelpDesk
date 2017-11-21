#!/usr/bin/php -q

<?php

	$hostname = "localhost";
	$bancodedados = "conector";
	$usuario = "root";
	$senha = "central";

	$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
	if ($mysqli->connect_errno) {
	    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$entrante = 999999;
	$ramal = 8888888;
//$entrante = $_POST['numero'];
//	$ramal = $_POST ['ramal'];



	$sql = "insert teste (numero, ramal) values ('$entrante','$ramal');";
	$query = $mysqli->query($sql);

mysqli_close();
       
?>