<?php
$strSQL = "SELECT * FROM tb_hospital WHERE status = 1";
$resultHospital = $db->select($strSQL,false,true);
?>
<table class="table">
  <thead>
    <tr>
      <th rowspan="2">
        Maternal compositions and intensive procedures
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
          <th style="text-align:center;" class="col_<?php print $value['hos_id'];?>">
            <?php
              $val = calculateTotal_N($db, $value['hos_id'], 2, 11);
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
        1. Blood composition transfusion
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculateBCT($db, $value['hos_id']); ?>
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
            <?php calculateMB($db, $value['hos_id']); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        3. Organ failure
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculatePE($db, $value['hos_id']); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        4. Hysterectomy
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculateOS($db, $value['hos_id']); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        5. Intubation
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculateOF($db, $value['hos_id']); ?>
          </td>
          <?php
        }
      }
      ?>
    </tr>

    <tr>
      <td style="text-align: left;">
        6. Cardiopulmonary resuscitation
      </td>
      <?php
      if($resultHospital){
        foreach($resultHospital as $value){
          ?>
          <td class="col_<?php print $value['hos_id'];?>">
            <?php calculateMD($db, $value['hos_id']); ?>
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

	$strSQL = "SELECT count(tb_inddata.ind_id) as a FROM tb_indicator1 inner join tb_inddata on tb_indicator1.ind_id=tb_inddata.ind_id where tb_indicator1.ind1_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['a'];
	}

	return intval($total);
}

function calculateBCT($db, $hos){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

	if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) FROM tb_indicator1 inner join tb_inddata on tb_indicator1.ind_id=tb_inddata.ind_id where tb_indicator1.ind1_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['count(tb_inddata.ind_id)'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) AS a
				FROM tb_response1
				INNER JOIN tb_inddata ON tb_response1.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response1.qares28 =  '1'";
	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		if($total!=0){
      if($resultP1[0]['a']==0){
        print "<font color=#ccc>0 (0)</font>";
      }else{
        print $resultP1[0]['a']." (".round(($resultP1[0]['a']/$total)*100,2).")";
      }
		}else{
			print "<font color=#ccc>0 (0)</font>";
		}
	}else{
		print "<font color=#ccc>0 (0)</font>";
	}
}

// ----------------------------------------------------
function calculateMB($db, $hos){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

  if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) FROM tb_indicator1 inner join tb_inddata on tb_indicator1.ind_id=tb_inddata.ind_id where tb_indicator1.ind1_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['count(tb_inddata.ind_id)'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) as a
				FROM tb_response1
				INNER JOIN tb_inddata ON tb_response1.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response1.qares29 =  '1'";
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
?>
<?php
function calculatePE($db, $hos){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

  if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) FROM tb_indicator1 inner join tb_inddata on tb_indicator1.ind_id=tb_inddata.ind_id where tb_indicator1.ind1_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['count(tb_inddata.ind_id)'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) as a
				FROM tb_response1
				INNER JOIN tb_inddata ON tb_response1.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response1.qares30=  '1'";
	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		if($total!=0){
			// print round(($resultP1[0]['a']/$total)*100,2);\
      if($resultP1[0]['a']==0){
        print "<font color=#ccc>0 (0)</font>";
      }else{
        print $resultP1[0]['a']." (".round(($resultP1[0]['a']/$total)*100,2).")";
      }
		}else{
			print "<font color=#ccc>0 (0)</font>";
		}
	}else{
		print "<font color=#ccc>0 (0)</font>";
	}
}
?>

<?php
function calculateOS($db, $hos){
	$sd = "2013-07-01";
	$ed = date('Y-m-d');

  if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) FROM tb_indicator1 inner join tb_inddata on tb_indicator1.ind_id=tb_inddata.ind_id where tb_indicator1.ind1_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['count(tb_inddata.ind_id)'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) as a
				FROM tb_response1
				INNER JOIN tb_inddata ON tb_response1.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response1.qares31 =  '1'";
	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		if($total!=0){
			// print round(($resultP1[0]['a']/$total)*100,2);
      if($resultP1[0]['a']==0){
        print "<font color=#ccc>0 (0)</font>";
      }else{
        print $resultP1[0]['a']." (".round(($resultP1[0]['a']/$total)*100,2).")";
      }
		}else{
			print "<font color=#ccc>0 (0)</font>";
		}
	}else{
		print "<font color=#ccc>0 (0)</font>";
	}
}
?>

<?php
function calculateOF($db, $hos){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

  if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) FROM tb_indicator1 inner join tb_inddata on tb_indicator1.ind_id=tb_inddata.ind_id where tb_indicator1.ind1_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['count(tb_inddata.ind_id)'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) as a
				FROM tb_response1
				INNER JOIN tb_inddata ON tb_response1.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response1.qares32 =  '1'";
	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		if($total!=0){
			// print round(($resultP1[0]['a']/$total)*100,2);
      if($resultP1[0]['a']==0){
        print "<font color=#ccc>0 (0)</font>";
      }else{
        print $resultP1[0]['a']." (".round(($resultP1[0]['a']/$total)*100,2).")";
      }
		}else{
			print "<font color=#ccc>0 (0)</font>";
		}
	}else{
		print "<font color=#ccc>0 (0)</font>";
	}
}
?>

<?php
function calculateMD($db, $hos){

	$sd = "2013-07-01";
	$ed = date('Y-m-d');

  if(isset($_GET['start']))
		$sd = $_GET['start'];

	if(isset($_GET['end']))
		$ed = $_GET['end'];

	$strSQL = "SELECT count(tb_inddata.ind_id) FROM tb_indicator1 inner join tb_inddata on tb_indicator1.ind_id=tb_inddata.ind_id where tb_indicator1.ind1_datediag between '" .$sd. "' and '".$ed."' and tb_inddata.hos_id = '".$hos."'";
	$resultTotal = $db->select($strSQL,false,true);
	$total = 0;
	if($resultTotal){
		$total = $resultTotal[0]['count(tb_inddata.ind_id)'];
	}

	$strSQL = "SELECT COUNT( tb_inddata.ind_id ) as a
				FROM tb_response1
				INNER JOIN tb_inddata ON tb_response1.ind_id = tb_inddata.ind_id
				WHERE tb_inddata.hos_id =  '".$hos."'
				AND tb_inddata.dadel
				BETWEEN  '".$sd."'
				AND  '".$ed."'
				AND tb_response1.qares33 =  '1'";
	$resultP1 = $db->select($strSQL,false,true);
	if($resultP1){
		if($total!=0){
			// print round(($resultP1[0]['a']/$total)*100,2);
      if($resultP1[0]['a']==0){
        print "<font color=#ccc>0 (0)</font>";
      }else{
        print $resultP1[0]['a']." (".round(($resultP1[0]['a']/$total)*100,2).")";
      }
		}else{
			print "<font color=#ccc>0 (0)</font>";
		}
	}else{
		print "<font color=#ccc>0 (0)</font>";
	}
}
?>
