<?php

if(isset($_GET['ip']) && isset($_GET['gay']))
{

}

$text = "".$_GET['ip']."\n";
$filename = "ip_forceur.txt";
$fh = fopen($filename, "a");
fwrite($fh, $text);
fclose($fh);

echo "".$_GET['ip']." est ban psk c'est pas un BPS ! ";

?>