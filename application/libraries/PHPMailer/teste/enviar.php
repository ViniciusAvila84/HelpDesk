<?php
	
	//
	//require './phpmailer/class.phpmailer.php';
  //require './phpmailer/class.smtp.php';
  //require '/phpmailer/phpmailerautoload.php';
  require("../../phpmailer/phpmailerautoload.php");
  
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone= $_POST['telefone'];
	$arquivo = $_FILES['arquivo'];
	
	$tamanho = 512000;
	$tipo = array('image/jpeg','image/pjpeg');
	
	
	
	
	
	
	$mail = new PHPMailer();
	$mail ->setLanguage('pt');
	
	$from = 'no-replay@stv.com.br';
	$fromName= 'Enviado pelo Site';
	
	$host = '192.168.0.49';
	$username = 'teste';
	$password='teste';
	$port=25;
	$secure=false;
			
	$mail->isSMTP();
	$mail->Host = $host;
	$mail->SMTPAuth = false;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->Port = $port;
	$mail->SMTPSecure = $secure;
	
	$mail->From =$from;
	$mail->fromName =$fromName;
	$mail->addReplyTo($from, $fromName);
	
	$mail->addAddress('marcio@stv.com.br', 'Marcio Azevedo');

	
	$mail->isHTML(true);
	$mail->CharSet ='utf-8';
	$mail->WordWrap=70;
	
	$mail->Subject='Enviando E-mail PHP Mailer';
	$mail->Body ='Nome: '.$nome.'<br /> E-mail: '.$email.'<br /> Telefone: '.$telefone;
	$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );
	$mail->AltBody ='enviando um tal de altBody que é um texto plano sem html';
	
	$send = $mail->Send();
	
	if($send){
				//header('Location:index.php');
				echo'Enviado com sucesso! ! !';
			
	}
		else{
			echo'Erro:'.$mail->ErrorInfo;
		}

	
	 

?>