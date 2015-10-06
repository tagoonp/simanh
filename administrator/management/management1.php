<?php
$strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
$resultHospital = $db->select($strSQL,false,true);
?>
<table class="table">
  <thead>
    <tr>
      <th rowspan="2">
        Management
      </th>
      <th colspan="<?php print sizeof($resultHospital) * 2;?>" style="text-align: center;">
        Results n (%)
      </th>
    </tr>
    <tr>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
              $arr = explode(' ',$value['hos_name_en']);
              print "<th style=text-align:center; class=col_".$value['hos_id']." colspan=2>".$arr[0]."</th>";

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
          <th style="text-align:center;" class="col_<?php print $value['hos_id'];?>" colspan=2>
            <?php
              $val = calculateTotal_N($db, $value['hos_id'], 2);
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
        1. MgSo4 administration after diagnosis
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'], 1, 14); ?>
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
          -
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left;">
        2. Maternal monitoring after MgSo4 administration
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 15, 14); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        2.1 Retained foley catheter
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 16, 15); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        2.1 Retained foley catheter
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 17, 15); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        2.2 Monitoring urine output
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 18, 15); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 60px;">
        2.2.1 Urine more than 0.5 ml. per kg. per hour
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 19, 18); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        2.3 Monitoring deep tendon reflex
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 20, 15); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 60px;">
        2.3.1 Absence tendon reflex
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 21, 20); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        2.4 Monitoring respiratory rate
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            -
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 22, 15); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 60px;">
        2.4.1 Respiratory rate <14 per min
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>" style="background: #f3f3f3;">

          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 23, 21); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        3. Antihypertensive drugs given when BP 160/110 mm Hg or more
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td style="width: 50px;" class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'], 1, 24); ?>
          </td>
          <td style="width: 50px; background: #f3f3f3;" class="col_<?php print $value['hos_id'];?>">

          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        4. Fetal monitoring
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'], 1, 25); ?>
          </td>
          <td class="col_<?php print $value['hos_id'];?>"  style="background: #f3f3f3;">
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        4.1 NST
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>"  style="background: #f3f3f3;">
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 26, 25); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        4.2 US
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>"  style="background: #f3f3f3;">
          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 27, 25); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;">
        4.3 Continuous fetal monitoring if uterine contraction
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>" style="background: #f3f3f3;">

          </td>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_sub($db, $value['hos_id'], 1, 28, 25); ?>
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

// ----------------------------------------------------
function calculate($db, $hos, $qs, $qsn){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

  $total = calculateTotal_N($db, $hos, 2);

  if($total==0){
    print "<font color=#ccc>0<br>(0)</font>";
  }else{
    $strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
  				FROM tb_response".$qs."
  				INNER JOIN tb_inddata ON tb_response".$qs.".ind_id = tb_inddata.ind_id
  				WHERE tb_inddata.hos_id =  '".$hos."'
  				AND tb_inddata.dadel
  				BETWEEN  '".$sd."'
  				AND  '".$ed."'
  				AND tb_response".$qs.".qares".$qsn." =  '1' group by tb_inddata.ind_id";
          $resultP1 = $db->select($strSQL,false,true);
        	if($resultP1){
        		if($total!=0){
              // print "count = ".$resultP1[0]['a']."<br>";
        			$values = round(($resultP1[0]['a']/$total)*100,1,0);
              // print $total." ";
        				if($values!=0){
        					// printf("%.1f",$values);\
                  print $resultP1[0]['a']."<br>(";
        					printf("%.1f",$values);
                  print ")";
        				}else{
        					print "<font color=#ccc>0<br>(0)</font>";
        				}
        		}else{
        			print "<font color=#ccc>0<br>(0)</font>";
        		}
        	}else{
        		print "<font color=#ccc>0<br>(0)</font>";
        	}
  }
}

function calculate_check($db, $hos, $qs, $check){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

  // $total = calculateTotal_N($db, $hos, 2);
  $sub_value = 0;

  $strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
        FROM tb_response".$qs."
        INNER JOIN tb_inddata ON tb_response".$qs.".ind_id = tb_inddata.ind_id
        WHERE tb_inddata.hos_id =  '".$hos."'
        AND tb_inddata.dadel
        BETWEEN  '".$sd."'
        AND  '".$ed."'
        AND tb_response".$qs.".qares".$check." =  '1' group by tb_inddata.ind_id";
        $resultP1 = $db->select($strSQL,false,true);
        if($resultP1){
          $sub_value = $resultP1[0]['a'];
        }

  // print "Check = ".$check." value = ".$sub_value;
  return $sub_value;
}

function calculate_sub($db, $hos, $qs, $qsn, $check){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

  $total = calculate_check($db, $hos, 2, $check);

  if($total==0){
    print "<font color=#ccc>0<br>(0)</font>";
  }else{
    $strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
  				FROM tb_response".$qs."
  				INNER JOIN tb_inddata ON tb_response".$qs.".ind_id = tb_inddata.ind_id
  				WHERE tb_inddata.hos_id =  '".$hos."'
  				AND tb_inddata.dadel
  				BETWEEN  '".$sd."'
  				AND  '".$ed."'
  				AND tb_response".$qs.".qares".$qsn." =  '1' group by tb_inddata.ind_id";
          $resultP1 = $db->select($strSQL,false,true);
        	if($resultP1){
        		if($total!=0){
              // print "count = ".$resultP1[0]['a']."<br>";
        			$values = round(($resultP1[0]['a']/$total)*100,1,0);
              // print $total." ";
        				if($values!=0){
        					// printf("%.1f",$values);\
                  print $resultP1[0]['a']."<br>(";
        					printf("%.1f",$values);
                  print ")";
        				}else{
        					print "<font color=#ccc>0<br>(0)</font>";
        				}
        		}else{
        			print "<font color=#ccc>0<br>(0)</font>";
        		}
        	}else{
        		print "<font color=#ccc>0<br>(0)</font>";
        	}
  }
}
?>
