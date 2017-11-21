<?php
include 'config.php';
echo $etapa1 = "CONECTOU AO BANCO DE DADOS".'<br />';
echo $Nome= "Marcio Azevedo1".'<br />'; 
$pagina = fopen("sip_conector.conf","w");
$quebra = chr(13).chr(10);

$SimboloIgual='=';

$conteudo = '[general]
allowguest=no
srvlookup=no
udpbindaddr=0.0.0.0
tcpenable=no
language=pt-br
canreinvite= no
dtmfmode=auto

[ramal-voip](!)
type=friend
context=INTERNO
host=dynamic
disallow=all
allow=ulaw
allow=alaw
allow=g729
';
echo $ETAPA = 'PASSOU O CABEÇALHO'.'<br />';

fwrite($pagina,$conteudo."\n".$quebra);

$sql = "SELECT * FROM RAMAL;";
$query = $mysqli->query($sql);
while ($dados = mysqli_fetch_assoc($query)) {
  	$nome = $dados ['NOME'];
	$ramal = $dados ['RAMAL']; 
	$callerid = $nome;
	$secret = $dados ['SENHA_RAMAL'];  
	$type = 'friend';
	$callgroup = $dados ['FK_CENTRO_DE_CUSTO'];


fwrite($pagina,"[".$ramal."](ramal-voip)"."\n".
secret.$SimboloIgual.$secret."\n".
callerid.$SimboloIgual.$callerid."\n".
type.$SimboloIgual.$type."\n".
callgroup.$SimboloIgual.$callgroup."\n".
pickupgroup.$SimboloIgual.$callgroup."\n".
$quebra);





}
echo 'Registros encontrados: ' . $query->num_rows.'<br />';


fclose($pagina);

$pasta='/etc/asterisk/';

echo $ETAPA = 'INSERIU O SELECT DO BANCO NO ARQUIVO'.'<br />';

$srcfile='/var/www/html/conecttor/extras/sip_conector.conf'; 
$dstfile='/etc/asterisk/sip.conf';
mkdir(dirname($pasta), 777, true);

mkdir('/etc/asterisk/conector', 0777);
chmod('/etc/asterisk/conector', 0777);

if (!copy($srcfile, $dstfile)) {
    echo "falha ao copiar $dstfile...\n".'<br />';
}else{
echo $ETAPA = 'FINALIZOU A CÓPIA DAS PASTAS'.'<br />';
include 'reload.php';
echo $ETAPA = 'EXECUTOU O ASTERISK SIP RELOAD '.'<br />';
}
?>