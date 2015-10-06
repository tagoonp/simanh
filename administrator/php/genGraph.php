<?php
//simple, by age, by ducation
$gt = trim($_POST["gt"]);
//graph topic like admitted, delivery
$ct = trim($_POST["ct"]);
//Width size
$widthSize = trim($_POST["widthSize"]);
$hos = trim($_POST["hos"]);

//like monthly, daily
$qtype = trim($_POST["qtype"]);
$ys = trim($_POST["ys"]);
$sd = trim($_POST["sd"]);
$ed = trim($_POST["ed"]);
$ind = trim($_POST["ind"]);

require_once "../../includes/connect.class.php";

$db = new database();
$db->connect();

//Simple graph
if($gt==0){
	//Daily
	if($qtype==1){
		//Totally
		if($ys==0){
			if($gt==0){//Simple graph
				?>
            	<img src="graph/graph2.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php		
			}else if($gt==1){ //By age group
				?>
            	<img src="graph/graph5.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php	
			}
		
		}else{
		//split by hospital
			
		}
		
	}
	//Monthly
	else{
	?>
	<img src="graph/graph1.php?gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>" >
	<?php	
	}
}
//************************ Advanced graph **************************
//By age group
else if($gt==1){
	if($qtype==1){  //   << Daily
		if($ys==0){  //    << Totally
			?>
            	<img src="graph/graph5.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php
		}else{
			// Can not 
		}
	}else{ // << Monthly
		?>
            	<img src="graph/graph8.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php
	}
}
//By parity
else if($gt==2){
	if($qtype==1){  //   << Daily
		if($ys==0){  //    << Totally
		?>
            	<img src="graph/graph6.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php
		}else{
			// Can not 	
		}
	}else{ // << Monthly
		?>
            	<img src="graph/graph9.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php
	}
}
//By education
else if($gt==3){
	if($qtype==1){  //   << Daily
		if($ys==0){  //    << Totally
		?>
            	<img src="graph/graph7.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php
		}else{
			// Can not 	
		}
	}else{ // << Monthly
		?>
            	<img src="graph/graph10.php?g1id=<?php print $gt;?>&gid=<?php print $ct;?>&wz=<?php print $widthSize;?>&hos=<?php print $hos;?>&qtype=<?php print $qtype;?>&ys=<?php print $ys;?>&ind=<?php print $ind;?>&sd=<?php print $sd;?>&ed=<?php print $ed;?>" >
            <?php
	}
}

?>