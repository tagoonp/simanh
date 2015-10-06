<?php
include "../../database/connect.class.php";
$db = new database();
$db->connect();

require ("../../configuration/config.class.php");
$conf = new Config();
$prefix = $conf->getPrefix();

// $condition = $_POST['condition'];
// Define xAxis and yAxis array value
$xValue = [];
$xValue_label = [];
$yValue = [];

// Create xAxis value
$start    = (new DateTime('2013-07-01'))->modify('first day of this month');
$end      = (new DateTime(date('Y-m-d')))->modify('first day of this month');
$interval = DateInterval::createFromDateString('1 month');
$period   = new DatePeriod($start, $interval, $end);

foreach ($period as $dt) {
    $xValue_label[] = pDate($dt->format("Y-m"));
    $xValue[] = $dt->format("Y-m");
}


$strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
$resultHospital = $db->select($strSQL,false,true);

$sum = 0;
foreach($xValue as $val){

  foreach($resultHospital as $v){

  }
  
  $strSQL = "SELECT count(*) as valCount FROM tb_inddata where dateadm like '".$val."%' and hos_id <> 0 ";
  $resultValue = $db->select($strSQL,false,true);

  $strSQL = "SELECT count(*) as valCount FROM tb_inddata where dadel like '".$val."%' and hos_id <> 0 ";
	$resultValue2 = $db->select($strSQL,false,true);

  if($resultValue){
    if(intval($resultValue[0]['valCount']) >= intval($resultValue2[0]['valCount'])){
      print "CASE A : ";
      $yValue[] = intval($resultValue[0]['valCount']);
      $sum += intval($resultValue[0]['valCount']);
    }else{
      print "CASE B : ";
      $yValue[] = intval($resultValue2[0]['valCount']);
      $sum += intval($resultValue2[0]['valCount']);
    }

  }else{
    $yValue[] = 0;
  }

  print intval($resultValue[0]['valCount'])."<br>\n";


}
print "#----------------------------------<br>\n";
print $sum;

// $strSQL = ""
function pDate($date){
  $mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
  $arrDate = explode('-',$date);
  return $mons[intval($arrDate[1])]." ".$arrDate[0];
}
?>
