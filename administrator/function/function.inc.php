<?php
$sumReferin = 0;
$sumReferout = 0;

function adm($db, $hos_id){

  $sd = "2013-07-01";
	$ed = date('Y-m-d');

	$strSQL = "SELECT count(*) as summ1 FROM tb_inddata where (dateadm between '" .$sd. "' and '".$ed."') and hos_id = '$hos_id' and status <> 0 ";
	$result = $db->select($strSQL,false,true);

	$strSQL = "SELECT count(*) as summ2 FROM tb_inddata where dadel between '" .$sd. "' and '".$ed."' and hos_id = '$hos_id' and status <> 0 ";
	$result2 = $db->select($strSQL,false,true);

  $sum = 0;
  if(($result) && ($result2)){
    if($result[0]['summ1'] >= $result2[0]['summ2']){
      $sum = $result[0]['summ1'];
  	}else{
      $sum = $result2[0]['summ2'];
  	}
  }else{
    if($result){
      $sum = $result[0]['summ1'];
    }else{
      $sum = $result2[0]['summ2'];
    }
  }
  return $sum;
}

function del($db, $hos_id){
  $sd = "2013-07-01";
	$ed = date('Y-m-d');
	$strSQL = "SELECT count(*) as summ1 FROM tb_inddata where dadel between '" .$sd. "' and '".$ed."' and hos_id = '$hos_id' and status <> 0 ";
	$result = $db->select($strSQL,false,true);
  if($result){
    return $result[0]['summ1'];
  }else{
    return 0;
  }
}


function birth($db, $hos_id){
  $sd = "2013-07-01";
	$ed = date('Y-m-d');
  $strSQL = "SELECT count(*) as summ1 FROM tb_newborn_charector where indData_id in (select ind_id from tb_inddata where dadel between '$sd' and '$ed' and hos_id = '$hos_id' and status <> 0) or indData_id in (select ind_id from tb_inddata where dateadm between '$sd' and '$ed' and hos_id = '$hos_id' and status <> 0)";
	$result = $db->select($strSQL,false,true);
  if($result){
    return $result[0]['summ1'];
  }else{
    return 0;
  }
}

function lbirth($db, $hos_id){
  $sd = "2013-07-01";
	$ed = date('Y-m-d');
  $strSQL = "SELECT count(*) as summ1 FROM tb_newborn_charector where indData_id in (select ind_id from tb_inddata where dadel between '$sd' and '$ed' and hos_id = '$hos_id'  and status <> 0 ) and sov = 1";
	$result = $db->select($strSQL,false,true);

  if($result){
    return $result[0]['summ1'];
  }else{
    return 0;
  }
}

function referin($db, $hos_id){

  $strSQL = "SELECT count(*) as summ1 FROM tb_inddata where hos_id = '$hos_id' and refer != 0 and refer_f != '' and status <> 0";
	$result = $db->select($strSQL,false,true);

  if($result){
    return $result[0]['summ1'];
  }else{
    return 0;
  }
}

function referout($db, $hos_id){
  $strSQL = "SELECT count(*) as summ1  FROM tb_inddata where hos_id = '$hos_id' and refer != 0 and refer_t != '' and status <> 0";
  $result = $db->select($strSQL,false,true);
  if($result){
    return $result[0]['summ1'];
  }else{
    return 0;
  }
}

function getRefer($db, $refer){
  if($refer=='in'){
    $strSQL = "SELECT count(*) FROM tb_inddata where hos_id != '0' and refer != 0 and refer_f != '' and status <> 0";
  	$result = $db->select($strSQL,false,true);

    if($result){
      print "<a href=# class=\"wlink\" >".$result[0]['count(*)']."</a>";
    }else{
      print "0";
    }
  }else{
    $strSQL = "SELECT count(*) FROM tb_inddata where hos_id != '0' and refer != 0 and refer_t != '' and status <> 0";
    $result = $db->select($strSQL,false,true);
    if($result){
      print "<a href=# class=\"wlink\" >".$result[0]['count(*)']."</a>";
    }else{
      print "0";
    }
  }
}

function complication($db, $hos_id, $com_id){
  $strSQL = "SELECT count(*) as numall FROM tb_inddata a inner join tb_indicator".$com_id." b on a.ind_id = b.ind_id WHERE a.hos_id = '".$hos_id."' and a.status != 0 and a.dadel between '2013-07-01' and '2013-09-30' and b.status != 0";
  $result = $db->select($strSQL,false,true);
  if($result){
    print $result[0]['numall'];
  }else{
    print "0";
  }
}

function countcase($db, $hos_id, $ind_no){
	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator".$ind_no." inner join tb_inddata on tb_indicator".$ind_no.".ind_id=tb_inddata.ind_id
	where tb_indicator".$ind_no.".ind".$ind_no."_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos_id."'";

	//$strSQL = "SELECT count(*) FROM tb_indicator".$ind_no." where ind_id in (select ind_id from tb_inddata where dateent between '2013-07-01' and '2013-12-31' and hos_id = '$hos_id')";
	$result = $db->select($strSQL,false,true);
	if($result[0]['a']!=0){
		print "<a href=result.php?hos=$hos_id class=\"wlink\" >".$result[0]['a']."</a>";
	}else{
		print "-";
	}
}

function countcase2($db, $hos_id,$ind_no){
	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator".$ind_no." inner join tb_inddata on tb_indicator".$ind_no.".ind_id=tb_inddata.ind_id
	where tb_indicator".$ind_no.".ind".$ind_no."_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos_id."'";

	//$strSQL = "SELECT count(*) FROM tb_indicator".$ind_no." where ind_id in (select ind_id from tb_inddata where dateent between '2013-07-01' and '2013-12-31' and hos_id = '$hos_id')";
	$result = $db->select($strSQL,false,true);
	if($result[0]['a']!=0){
    return $result[0]['a'];
	}else{
    return 0;
	}
}

function summary($db, $choice){
  $sd = "2013-07-01";
	$ed = date('Y-m-d');

  $strSQL = "SELECT hos_id FROM tb_hospital WHERE status = 1";
  $resultHos = $db->select($strSQL,false,true);

  if($resultHos){
    switch($choice){
      case 1: $summ = 0;
              foreach($resultHos as $val){
                $strSQL = "SELECT count(*) as summ1 FROM tb_inddata a inner join tb_hospital b on a.hos_id=b.hos_id where a.dateadm between '" .$sd. "' and '".$ed."' and b.status = 1 and b.hos_id = '".$val['hos_id']."' and a.status <> 0";
                $result = $db->select($strSQL,false,true);

                $strSQL = "SELECT count(*) as summ2 FROM tb_inddata a inner join tb_hospital b on a.hos_id=b.hos_id where a.dadel between '" .$sd. "' and '".$ed."' and  b.status = 1 and b.hos_id = '".$val['hos_id']."' and a.status <> 0 ";
                $result2 = $db->select($strSQL,false,true);

                if(($result) && ($result2)){
                  if($result[0]['summ1'] >= $result2[0]['summ2']){
                    $summ += $result[0]['summ1'];
                    //print $result[0]['summ1']." 1<br>";
                	}else{
                    //print $result2[0]['summ2']." 2<br>";
                    $summ += $result2[0]['summ2'];
                	}
                }else{
                  if($result){
                    //print $result[0]['summ1']." 1<br>";
                    $summ += $result[0]['summ1'];
                  }else{
                    //print $result2[0]['summ2']." 2<br>";
                    $summ += $result2[0]['summ2'];
                  }
                }
              }
              return $summ;
              break;
      case 2: $summ = 0;
              foreach($resultHos as $val){
                $strSQL = "SELECT count(*) as summ1 FROM tb_inddata where dadel between '" .$sd. "' and '".$ed."' and hos_id = '".$val['hos_id']."' and status <> 0 ";
              	$result = $db->select($strSQL,false,true);
                if($result){
                  $summ += $result[0]['summ1'];
                }
              }

              return $summ;
              break;
      case 3: $summ = 0;
              foreach($resultHos as $val){
                $strSQL = "SELECT count(*) as summ1 FROM tb_newborn_charector where indData_id in (select ind_id from tb_inddata where dadel between '$sd' and '$ed' and hos_id = '".$val['hos_id']."' and status <> 0) or indData_id in (select ind_id from tb_inddata where dateadm between '$sd' and '$ed' and hos_id = '".$val['hos_id']."' and status <> 0)";
                $result = $db->select($strSQL,false,true);
                if($result[0]['summ1']!=0){
                  $summ += $result[0]['summ1'];
                }
              }
              return $summ;
              break;
      case 4: $summ = 0;
              foreach($resultHos as $val){
                $strSQL = "SELECT count(*) as summ1 FROM tb_newborn_charector where indData_id in (select ind_id from tb_inddata where dadel between '$sd' and '$ed' and hos_id = '".$val['hos_id']."'  and status <> 0 ) and sov = 1";
                $result = $db->select($strSQL,false,true);
                if($result[0]['summ1']!=0){
                  $summ += $result[0]['summ1'];
                }
              }
              return $summ;
              break;

    }
  }
}

function countaTotal($db, $part, $choice){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');
	if($part==0){
		// Do nothing
    // Look on function named "summary"
	}else if($part==1){
		// $strSQL = "SELECT count(*) FROM tb_indicator".$choice." where ind_id in (select ind_id from tb_inddata where dateent between '$sd' and '$ed')";
    $strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator".$choice." inner join tb_inddata on tb_indicator".$choice.".ind_id=tb_inddata.ind_id
  	where tb_indicator".$choice.".ind".$choice."_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id != 0";

    $result = $db->select($strSQL,false,true);
  	if($result[0]['a']!=0){
  		print "<strong><a href=result_all.php class=\"wlink\">".$result[0]['a']."</a></strong>";
  	}else{
  		print "-";
  	}
	}
}

function calcaseComplication($d,$a){
	if($a!=0){
		$values = round((($d/$a)*100),2);
				if($values!=0){
					printf("%.1f",$values);
				}else{
					print "0";
				}
	}else{
		print '0';
	}

	print "%";
}

function calcaseComplication2($d,$a){
	if($a!=0){
		$values = round((($d/$a)*100000),0);
				if($values!=0){
					printf("%d",$values);
				}else{
					print "0";
				}
	}else{
		print '0';
	}

	print " case per 100,000";
}

function calcaseComplication3($d,$a){
	if($a!=0){
		$values = round((($d/$a)*1000),0);
				if($values!=0){
					printf("%d",$values);
				}else{
					print "0";
				}
	}else{
		print '0';
	}

	print " case per 1,000";
}
?>
