<?php
	include "../../database/connect.class.php";
	$db = new database();
	$db->connect();
	
	$condition = $_POST['condition'];
	$conString = '';
	switch ($condition){
		case 0 : $conString = 'SELECT * FROM tb_inddata a inner join tb_location b on a.ind_id = b.ind_id WHERE a.hos_id != 0';	break;
		case 1 : $conString = 'SELECT * FROM tb_inddata a inner join tb_location b on a.ind_id = b.ind_id WHERE a.hos_id != 0 and a.dadel != \'0000-00-00\'';	break;
		case 2 : $conString = 'SELECT * FROM nb_inddate a inner join tb_location b on a.ind_id = b.ind_id WHERE a.hos_id != 0 and a.dadel != \'0000-00-00\'';	break;
		case 3 : $conString = 'SELECT * FROM nb_inddate a inner join tb_location b on a.ind_id = b.ind_id WHERE a.hos_id != 0 and a.dadel != \'0000-00-00\' and a.sov = 1';	break;
		case 4 : $conString = 'SELECT * FROM view_indicator1 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 5 : $conString = 'SELECT * FROM view_indicator2 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 6 : $conString = 'SELECT * FROM view_indicator3 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 7 : $conString = 'SELECT * FROM view_indicator4 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 8 : $conString = 'SELECT * FROM view_indicator5 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 9 : $conString = 'SELECT * FROM view_indicator6 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 10 : $conString = 'SELECT * FROM view_indicator7 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 11 : $conString = 'SELECT * FROM view_indicator8 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 12 : $conString = 'SELECT * FROM view_indicator9 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
		case 13 : $conString = 'SELECT * FROM view_indicator10 a inner join tb_location b on a.ind_id = b.ind_id ';	break;
	}

	$result = $db->select($conString,false,true);

	for($i=0;$i<count($result);$i++){
		$return[$i]["loc_id"] = $result[$i]['loc_id'];
		$return[$i]["loc_lat"] = $result[$i]['loc_lat'];
		$return[$i]["loc_lng"] = $result[$i]['loc_lng'];
		$return[$i]["ind_id"] = $result[$i]['ind_id'];
	}

	echo json_encode($return);
	$db->disconnect();

?>
