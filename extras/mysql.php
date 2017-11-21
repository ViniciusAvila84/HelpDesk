#!/usr/bin/php -q

<?php

	include 'config.php';
       require 'phpagi.php';
        $agi = new AGI();

	
	
	$numero=99999999999;
	
$sql = "insert teste (numero) values ('$numero');";
$query = $mysqli->query($sql);
;



mysqli_close();





			execute_agi('Numero Consultado: ');
			$saldo="Saldo do Asterisk";
			$agi->exec('Set',"saldo", $saldo);
                        $agi->set_variable("saldo", $saldo);


        
?>