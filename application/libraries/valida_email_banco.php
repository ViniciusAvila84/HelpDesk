<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");
  $mysqli = new mysqli('localhost', 'root', '', 'testemarcio');
  $user = filter_input(INPUT_GET, 'email');
  $sql = "SELECT * FROM `candidato` WHERE `email` = '{$user}'"; //monto a query
  $query = $mysqli->query( $sql ); //executo a query
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo 'E-mail j&aacute; cadastrado!';
  } else {
    echo '';
  }
  
  ?>