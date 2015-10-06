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
      <td colspan="<?php print sizeof($resultHospital)+100; ?>" style="text-align: left; background: #f3f3f3;">
        <strong>General Mangement</strong>
      </td>
    </tr>
    <tr>
      <td style="text-align: left;">
        1. IV fluid administration with Normal Saline or Lactate Ringer
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
        2. Monitoring V/S every 15 minutes
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
      <td style="text-align: left;">
        3. Retained foley catheter
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
      <td style="text-align: left;">
        4. Monitoring urine output
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
      <td style="text-align: left;">
        5. Typing screening or cross-matching blood
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
      <td style="text-align: left;">
        6. If blood loss >1500 ml. Blood transmission within 60 min.
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
      <td colspan="<?php print sizeof($resultHospital)+100; ?>" style="text-align: left; background: #f3f3f3;">
        <strong>Cause of PPH</strong>
      </td>
    </tr>

    <tr>
      <td style="text-align: left;">
        7. Uterine atony
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
        7.1 Uterine massage
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
        7.2 Oxytocin 20 units in Saline 1000 ml. or 10 units IM
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
        7.3 Methergine 0.2 mg IV slowly in women without hypertension when oxytocin failed
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
      <td style="text-align: left; padding-left: 30px;">
        7.4 Misoprostol 800 ug subligual when oxytocin failed
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
      <td style="text-align: left; padding-left: 30px;">
        7.5 Intravenous prostaglandin when oxytocin failed
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
      <td style="text-align: left;">
        8. Retained placenta
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
        8.1 Removal of placenta
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
      <td style="text-align: left; padding-left: 30px;">
        8.2 Removal of placenta under general anesthesia
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
      <td style="text-align: left; padding-left: 30px;">
        8.3 Oxytocin administration for good uterine contraction after removal of placenta
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
      <td style="text-align: left; padding-left: 30px;">
        8.4 Antibiotic prophylaxis in removal of placenta
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
      <td style="text-align: left; padding-left: 30px;">
        8.5 Retained piece of placenta
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
      <td style="text-align: left; padding-left: 30px;">
        8.6 Vaginal or cervical injuries
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

  // print $check."<br>";

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

  $total = calculate_check($db, $hos, 1, $check);

  // print "Check value = ".$total.'<br>';
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
