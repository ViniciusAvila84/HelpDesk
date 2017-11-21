<?php
# Nome do arquivo html
echo $Nome= "Marcio Azevedo1"; 
$pagina = "sip_conector.conf";

# Texto a ser salvo no arquivo
$conteudo = '
[general]
allowguest=no
srvlookup=no
udpbindaddr=0.0.0.0
tcpenable=no
canreinvite = no
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


$conteudo2 = '
[100](ramal-voip)
secret=senha100
callerid="Vegeta" <100>
type=friend

[200](ramal-voip)
secret=123456
callerid="Kakaroto" <200>
type=friend

[300](ramal-voip)
secret=123456
callerid="Kakaroto" <200>
type=friend

[400](ramal-voip)
secret=123456
callerid="Kakaroto" <200>
type=friend

[500](ramal-voip)
secret=123456
callerid="Kakaroto" <200>
type=friend
';

$conteudoGeral = $conteudo.$conteudo2.$array;

#Criar o arquivo
$fp = fopen($pagina , "w");
$fw = fwrite($fp, $conteudoGeral);

//$pasta='/etc/asterisk/conector';

$srcfile='/var/www/html/teste/sip_conector.conf'; 
$dstfile='/etc/asterisk/conector/sip_conector.conf';
//mkdir(dirname($pasta), 7777, true);

mkdir('/etc/asterisk/conector', 0777);
chmod('/etc/asterisk/conector', 0777);





if (!copy($srcfile, $dstfile)) {
    echo "falha ao copiar $dstfile...\n";
}

//shell_exec("/etc/asterisk/conector/./executa.sh");




?>
