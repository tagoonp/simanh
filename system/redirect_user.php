<?php
session_start();

require ("../database/connect.class.php");
$db = new database();
$db->connect();

require ("../configuration/config.class.php");
$conf = new Config();
$prefix = $conf->getPrefix();
$sessionName = $conf->getSessionname();

// Include and instantiate the class.
require_once '../libraries/Mobile-Detect/Mobile_Detect.php';
$detect = new Mobile_Detect;

if(isset($_SESSION[$sessionName.'sessID'])){
  // Any mobile device (phones or tablets).
  if ($detect->isMobile()) {

  }else{
    switch($_SESSION[$sessionName.'sessUtype']){
      case 1: header('Location: ../administrator/'); break;
      case 2: header('Location: ../actor/'); break;
      case 3: header('Location: ../enter/'); break;
      default: header('Location: ../500-page.html'); break;
    }
  }

}else{
  header('Location: ../signout.php');
  exit();
}
?>
