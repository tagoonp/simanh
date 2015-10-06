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
              $val = calculateTotal_N($db, $value['hos_id'], 10);
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
      <td style="text-align: left; " colspan="<?php print sizeof($resultHospital)+1; ?>">
        1. Age of death
      </td>
    </tr>
    <tr>
      <td style="text-align: left; padding-left: 30px;" >
        1.1 Within 24 hours
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php //calculate1($db, $value['hos_id'],35,16); ?>
            <?php calculate_n($db, $value['hos_id'],2,3,1); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left; padding-left: 30px;" >
        1.2 Before discharge
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php //calculate1($db, $value['hos_id'],35,16); ?>
            <?php calculate_n($db, $value['hos_id'],2,3,2); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left;" colspan="<?php print sizeof($resultHospital)+1; ?>">
        2. Process of Death
      </td>
    </tr>

    <tr>
      <td style="text-align: left; padding-left: 30px;" >
        2.1 At delivery room
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php //calculate1($db, $value['hos_id'],35,16); ?>
            <?php calculate_n($db, $value['hos_id'],2,4,1); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left; padding-left: 30px;" >
        2.2 At nursery or NICU
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php //calculate1($db, $value['hos_id'],35,16); ?>
            <?php calculate_n($db, $value['hos_id'],2,4,2); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left; padding-left: 30px;" >
        2.3 At ward with mother
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php //calculate1($db, $value['hos_id'],35,16); ?>
            <?php calculate_n($db, $value['hos_id'],2,4,3); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        3. Maternal problems diseases during delivery
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate_n($db, $value['hos_id'],2,5,1); ?>
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

function calculate_n($db, $hos, $qs ,$qsn, $value){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

  $option = '';
  switch($qsn){
    case 3: $option = 'ind10_q1'; break;
    case 4: $option = 'ind10_q2'; break;
  }

	$strSQL = "SELECT count(a.ind_id) as countNo
            FROM
            tb_indicator10 a inner join tb_inddata b on a.ind_id=b.ind_id
            -- inner join tb_response10 c on b.ind_id = c.ind_id
            where
            a.ind10_datediag between '" .$sd. "' and '".$ed."'
            and b.hos_id = '".$hos."'
            and a.$option = '$value'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['countNo'];
	}

  $totalCase = 0;
  $totalCase = calculateTotal_N($db, $hos, 10);

  if($total==0){
    print "<font color=#ccc>0 (0)</font>";
  }else{
    $values = round(($total/$totalCase)*100,1,0);
    if($values!=0){
  					// printf("%.1f",$values);\
            print $total." (";
  					printf("%.1f",$values);
            print ")";
  				}else{
  					print "<font color=#ccc>0 (0)</font>";
  				}
  }


 // print $strSQL;
	// $strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
	// 			FROM tb_response10
	// 			INNER JOIN tb_inddata ON tb_response10.ind_id = tb_inddata.ind_id
	// 			WHERE tb_inddata.hos_id =  '".$hos."'
	// 			AND tb_inddata.dadel
	// 			BETWEEN  '".$sd."'
	// 			AND  '".$ed."'
	// 			AND tb_response10.qares".$qsn." =  '1'";

	// $resultP1 = $db->select($strSQL,false,true);
	// if($resultP1){
	// 	if($total!=0){
	// 		$values = round(($resultP1[0]['a']/$total)*100,1,0);
	// 			if($values!=0){
	// 				// printf("%.1f",$values);\
  //         print $resultP1[0]['a']." (";
	// 				printf("%.1f",$values);
  //         print ")";
	// 			}else{
	// 				print "<font color=#ccc>0 (0)</font>";
	// 			}
	// 	}else{
	// 		print "<font color=#ccc>0 (0)</font>";
	// 	}
	// }else{
	// 	print "<font color=#ccc>0 (0)</font>";
	// }
}

function calculate($db, $hos,$qs,$qsn){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator10 inner join tb_inddata on tb_indicator10.ind_id=tb_inddata.ind_id where tb_indicator10.ind10_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['a'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
				FROM tb_response10
				INNER JOIN tb_inddata ON tb_response10.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response10.qares".$qsn." =  '1'";

	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		if($total!=0){
			$values = round(($resultP1[0]['a']/$total)*100,1,0);
				if($values!=0){
					// printf("%.1f",$values);\
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
?>
