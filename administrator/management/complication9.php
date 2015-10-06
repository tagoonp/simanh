<?php
$strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
$resultHospital = $db->select($strSQL,false,true);
?>
<table class="table">
  <thead>
    <tr>
      <th rowspan="2">
        Outomes
      </th>
      <th colspan="<?php print sizeof($resultHospital);?>" style="text-align: center;">
        Results n (%)
      </th>
    </tr>
    <tr>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
              $arr = explode(' ',$value['hos_name_en']);
              print "<th style=text-align:center;  class=col_".$value['hos_id'].">".$arr[0]."</th>";

        }
      }
      ?>
    </tr>
    <tr>
      <th>
        N =
      </th>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <th style="text-align:center;"  class="col_<?php print $value['hos_id'];?>">
            <?php
              $val = calculateTotal_N($db, $value['hos_id'], 9);
              print $val;
            ?>
          </th>
          <?php
        }
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: left;">
        1. Percent of stillbirth
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td  class="col_<?php print $value['hos_id'];?>">
            <?php calculate1($db, $value['hos_id'],33,7); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left;">
        2. Identified death
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],2,15); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td colspan="<?php print sizeof($resultHospital)+1; ?>" style="text-align: left; padding-left: 30px; background: #f3f3f3;">
        <strong>Cause of stillbirth</strong>
      </td>
    </tr>
    <tr>
      <td style="text-align: left; padding-left: 30px;" >
        2.1 Maternal conditions
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php //calculate1($db, $value['hos_id'],35,16); ?>
            <?php calculate($db, $value['hos_id'],2,16); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;" >
        2.2 Fetal conditions
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php //calculate1($db, $value['hos_id'],36,17); ?>
            <?php calculate($db, $value['hos_id'],2,17); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        3. Unexplained death
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],3,18); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;" >
        4. Decision of termination<br>after diagnosis within 6 hours
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],5,19); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left;">
        5. Maternal other complications
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td  class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],10,20); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

  </tbody>
</table>
<?php
function calculateTotal_N($db, $hos, $qs){
	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator".$qs." inner join tb_inddata on tb_indicator".$qs.".ind_id=tb_inddata.ind_id where tb_indicator".$qs.".ind".$qs."_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['a'];
	}

	return intval($total);
}

function calculate($db, $hos,$qs,$qsn){
	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator9 inner join tb_inddata on tb_indicator9.ind_id=tb_inddata.ind_id where tb_indicator9.ind9_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['a'];
	}

		$strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
				FROM tb_response9
				INNER JOIN tb_inddata ON tb_response9.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response9.qares".$qsn." =  '1'";



	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		if($total!=0){
			$values = round(($resultP1[0]['a']/$total)*100,1,0);
				if($values!=0){
          print $resultP1[0]['a']." (";
					printf("%.1f",$values);
          print ")";
				}else{
					print "<font color=#ccc>0 (0)</font>";
				}
		}else{
		    print "<font color=#ccc>0 (0)</font>";
		}
	}else{
		print "<font color=#ccc>0 (0)</font>";
	}
}

function calculate1($db, $hos,$qs,$qsn){
	$res17=0;
	$res171=0;
	$res172=0;
	$MC=0;
	$FC=0;
	$UD=0;

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator9 inner join tb_inddata on tb_indicator9.ind_id=tb_inddata.ind_id where tb_indicator9.ind9_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";

	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['a'];
	}

	$strSQL =  "SELECT COUNT( tb_inddata.ind_id ) as b
				FROM tb_response9
				INNER JOIN tb_inddata ON tb_response9.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response9.qares17 =  '1'";

	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		$res17 = $resultP1[0]['b'];
	}

	if($total!=0){
			$res172 = round(($res17/$total)*100,2);
	}else{
			$res172 = 0;
	}

	$strSQL2 = "SELECT tb_response9.qares18 as d
				FROM tb_response9
				INNER JOIN tb_inddata ON tb_response9.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response9.qares17 =  '1'";
	$resultP2 = $db->select($strSQL2,false,true);
	if($resultP2){
		$res18 = $resultP2[0]['d'];
	}else{
		$res18 = 0;
	}


	switch ($res18) {
	    case 1:	$MC=$MC+1;break;
    	case 2:    $FC=$FC+1;break;
    	case 3:    $UD=$UD+1;break;
	}

  $noMC = 0;
  $noFC = 0;
	if ($res17!=0) {
		$res172=round(($res17/$total)*100,2);
    $noMC = $MC;
		$MC=round(($MC/$res17)*100,2);
    $noFC = $FC;
		$FC=round(($FC/$res17)*100,2);
		$UD=round(($UD/$res17)*100,2);
		$res171=1-$res17;
	}else if($res17=0) {
		$MC=0;
		$FC=0;
		$UD=0;
	}

	if($qs==33){
    if($res172==0){
      print "<font color=#ccc>0 (0)</font>";
    }else{
      print $res17." (".$res172.")";
    }

	}else if($qs==34){
    if($res171==0){
      print "<font color=#ccc>0 (0)</font>";
    }else{
      print $res171;
    }
	}else if($qs==35){
    if($MC==0){
      print "<font color=#ccc>0 (0)</font>";
    }else{
      print $noMC." (".$MC.")";
    }
	}else if($qs==36){
    if($FC==0){
      print "<font color=#ccc>0 (0)</font>";
    }else{
      print $noFC." (".$FC.")";
    }
	}else if($qs==37){
		print $UD;
	}
}
?>
