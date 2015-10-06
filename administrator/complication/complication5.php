<?php
$strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
$resultHospital = $db->select($strSQL,false,true);
?>
<table class="table">
  <thead>
    <tr>
      <th rowspan="2">
        Assessment of intensive procedures undergone
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
              $val = calculateTotal_N($db, $value['hos_id'], 5);
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
        1. Hysterectomy
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td  class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],2,15); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>
    <tr>
      <td style="text-align: left;">
        2. Other surgeries to save life
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],3,16); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        3. Intubation
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],4,17); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        4. Cardiopulmonary resuscitation
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],5,18); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td colspan="<?php print sizeof($resultHospital)+1 ?>" style="text-align: left; background: #f3f3f3;">
        <strong>Outomes</strong>
      </td>
    </tr>
    <tr>
      <td style="text-align: left;">
        5. Postpartum hemorrhage
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td  class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],10,19); ?>
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
            <?php calculate($db, $value['hos_id'],11,20); ?>
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
            <?php calculate($db, $value['hos_id'],11,21); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        8. Massive blood transfusion
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,22); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        9. DIC
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,23); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        10. Puerperal morbidity
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,24); ?>
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
            <?php calculate($db, $value['hos_id'],11,25); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        12. Low apgar score
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,26); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        13. Fetal surgeries
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,27); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        14. Neonatal ICU admission
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,28); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        15. Intrapartum fetal death
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculate($db, $value['hos_id'],11,29); ?>
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

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator5 inner join tb_inddata on tb_indicator5.ind_id=tb_inddata.ind_id where tb_indicator5.ind5_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['a'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
				FROM tb_response5
				INNER JOIN tb_inddata ON tb_response5.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response5.qares".$qsn." =  '1'";

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
