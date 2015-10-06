<?php
$strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
$resultHospital = $db->select($strSQL,false,true);
?>
<table class="table">
  <thead>
    <tr>
      <th rowspan="2">
        Maternal Complications
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
      $sumN = 0;
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <th style="text-align:center;"  class="col_<?php print $value['hos_id'];?>">
            <?php
              $val = calculateTotal_N($db, $value['hos_id'], 2, 11);
              $sumN += $val;
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
        1. Blood component transfusion
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td  class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],1,26); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left;">
        2. DIC
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],2,27); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        3. Massive blood transfusion
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],3,28); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        4. Shock
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],4,29); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        5. Pulmonary edema
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],5,30); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        6. Hysterectomy
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],6,31); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        7. Other surgeries to save life
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],7,32); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        8. Intubation
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],8,33); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        9. Organ failure
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],9,34); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        10. Cardiopulmonary resuscitation
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],10,35); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        11. Maternal death
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,36); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

  </tbody>
</table>
<?php
function calculateTotal_N($db, $hos, $qs, $qsn){
	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator2 inner join tb_inddata on tb_indicator2.ind_id=tb_inddata.ind_id where tb_indicator2.ind2_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
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

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator2 inner join tb_inddata on tb_indicator2.ind_id=tb_inddata.ind_id where tb_indicator2.ind2_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['a'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
				FROM tb_response2
				INNER JOIN tb_inddata ON tb_response2.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response2.qares".$qsn." =  '1'";

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
