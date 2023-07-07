
<head>
<style type="text/css">
.auto-style1 {
	border: 1px solid #000000;
}
.auto-style2 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
</style>
</head>

<?php				
	include("../config2.php");
	
	$from_dt	="2017-04-07";
	$to_dt		="2017-04-08";
	
	$sql="select dt, modal, sum(if(what,qt,0)) plus, sum(if(!what,qt,0)) minus
 from (select date(post_date) dt, modal, sum(opening_stock) qt, 1 what
from soum_product_master
where date(post_date)>='$from_dt' and date(post_date)<='$to_dt'
group by date(post_date),modal

union
select date(order_date) dt,  soum_product_master.modal, sum(qty) qt, 0 what
from soum_order_master, soum_order_details, soum_product_master
where date(order_date)>='$from_dt' and date(order_date)<='$to_dt'

and soum_order_master.order_id= soum_order_details.order_id
and soum_order_details.prod_id=soum_product_master.prod_id
group by date(order_date),modal) temp 
group by date(dt),modal
order by dt,modal*1";
	$res=$db->query($sql);




	$d=0;	
	$array  = array();
	$arraydt  = array();
	$plus[] = array();
	$minus[]= array();
	
	$flag=($row=$res->fetch_assoc());
	while($flag)
	{
		$dt=$row['dt'];
		$arraydt[]=$dt;
		echo "<h2>$dt</h2>";
		while ($dt==$row['dt'])
		{
				$mili=null;
				for ($i=0;$i<sizeof($array);$i++)
				{
					if ($array[$i]==$row['modal'])
						$mili=$i;
				}
				if(is_null($mili))
				{
					$array[sizeof($array)]=$row['modal'];
					$mili=sizeof($array)-1;
				}
				
				$plus[$mili][$d]	=$row['plus'];
				$minus[$mili][$d]	=$row['minus'];
			
			//echo "sanjay".searchForId($row['modal'],$array)."verma<br>";
			//$array[sizeof($array)]=$row['modal'];
			//echo "<h4>".$row['modal']."==>".$row['plus']."/".$row['minus']."</h4>";
			
			
			$flag=($row=$res->fetch_assoc());
		}	
		$d++;
	} 
	
	
?>

<table class="auto-style2" align="center" style="width: 25%">
<tr>
	<td class='auto-style1'><strong>Model</strong></td>
<?php 	for ($mili=0;$mili<=sizeof($arraydt)-1;$mili++) {?>
	<td class="auto-style1"><strong><?=$arraydt[$mili];?></strong></td>
<?php } ?>


</tr>
<?php

	for ($mili=0;$mili<=sizeof($array)-1;$mili++)
	{
		echo "<tr>";
		echo "<td class='auto-style1'>".$array[$mili]."</td>";
		$initialnet=0;		
		
		for($d=0;$d<=1;$d++)
		{


			echo "<td class='auto-style1'>$initialnet+".(is_null($plus[$mili][$d])?0:$plus[$mili][$d])."-".(is_null($minus[$mili][$d])?0:$minus[$mili][$d]);
			$initialnet=$initialnet+$plus[$mili][$d]-$minus[$mili][$d];						
			echo "=$initialnet</td>";
		}
		echo "</tr>";

	}

?>
</table>
