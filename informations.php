<html>
<head>
	<style type="text/css">
		.notification
		{
			position: absolute;
			top: 16%;
			left: 20%;
			width: 60%;
			background: #37A0A2;
			justify-content: center;
		}

		.containerinfo
		{
			position: relative;
			top: 10%;
			width: auto;
			padding: 10px;
			justify-content: center;
			background: #37A0ff;
			display: flex;
			flex-direction: row;
			background: #37A0A2;
		}
		.boxinfo
		{
			
			align-content: center;
			margin: 10px auto;
			transition: .1s;
			text-align: center;
			background:none;
		}
		table
		{
			table-layout: fixed;
			width: 100%;
			height: auto;
			text-align: center;

		}
		#tit
		{
			position: absolute
			top: 0%;
			padding-bottom: 10px;
			color: black;
		}
		.headerinfo
		{
			position: absolute;
			left: 25%;
			top: 5%;
			height: 10%;
			width: 50%;
			background: #BBE0DF;
			float: right;
			  font-size: 20px;
			  color: #08FA2C;
			  padding-left: 10px;
			  
			}
			th
			{
				background: #0BFAF6;
			}
			#d
			{
				background-color: #60DE1D;
			  /*animation: blinker 3s linear infinite;*/
			}
			#e
			{
				background-color: #E6DB69;
			  /*animation: blinker2 3s linear infinite;*/
			}
			#f
			{
				background-color: #F23A6B;
			  /*animation: blinker3 3s linear infinite;*/
			}



@keyframes blinker {
  50% {
    background-color: #03EFF3;
  }
}
@keyframes blinker2 {
  50% {
    background-color: #03EFF3;
  }
}
@keyframes blinker3 {
  50% {
    background-color: #03EFF3;
  }
}
	</style>
</head>
<body>
	<div class="headerinfo">
		<center><h1 id="tit">Notitfications</h1></center>
	</div>
<?php
//$date='2019-08-18';
include('connection.php');
//$start=$date-7;
$date=date('Y-m-d');
$days_ago = date('Y-m-d', strtotime('-3 days', strtotime($date)));
//echo $days_ago;
echo"<div class='notification'>";
$sq="SELECT DISTINCT item_code from sales_and_bill where day between '$days_ago' and '$date';";
$seq=mysqli_query($connection,$sq);
	echo "<div class='containerinfo'>";
	echo "<div class='boxinfo'>";
	echo "<table border='1' style='width:400px;' cellpadding='10'>";
	echo "<tr><th colspan='3'>Most Saled Products</th></tr>";
	echo "<tr><th colspan=3>From".$days_ago." -- ".$date."</th></tr>";
	echo "<tr><th>item_code</th>";
	echo "<th>item name</th>";
	echo "<th>Saled quantity</th></tr>";
	while ($rows=mysqli_fetch_array($seq)) 
	{

		$item_code=$rows['item_code'];
		$avg="SELECT SUM(item_quantity) as sum From sales_and_bill where day between '$days_ago' and '$date' and item_code='$item_code';";
		$avge=mysqli_query($connection,$avg);
		$avgex=mysqli_fetch_assoc($avge);
		$average=$avgex['sum'];
		if($average>=10)
        {
		$name="SELECT item_name,unit from sales_and_bill where item_code='$item_code';";
		$namx=mysqli_query($connection,$name);
		$item=mysqli_fetch_assoc($namx);
		$item_name=$item['item_name'];
		$item_unit=$item['unit'];
        
        	echo"<tr><td id='d'>".$item_code."</td>
        	<td id='d'>".$item_name."</td>
        	<td id='d'>".$average.$item_unit."</td></tr>";
        }
        
	}
	echo "</table>";
	echo "</div>";
	echo "<div class='boxinfo'>";
	$sq1="SELECT DISTINCT item_code from sales_and_bill where day between '$days_ago' and '$date';";
$seq1=mysqli_query($connection,$sq1);
$sql="SELECT item_code FROM item WHERE item_code NOT IN (SELECT item_code FROM sales_and_bill where day between '$days_ago' and '$date');";
$sqle=mysqli_query($connection,$sql);
//$not="SELECT DISTINCT item_code from sales_and_bill where day Not between '$days_ago' and '$date';";
///$notd=mysqli_query($connection,$not);
	//echo $date;
	echo "<table border='1' style='width:400px;' cellpadding='10'>";
	echo "<tr><th colspan='3'>Less Saled Products</th></tr>";
	echo "<tr><th colspan=3>From".$days_ago." -- ".$date."</th></tr>";
	echo "<tr><th>item_code</th>";
	echo "<th>item name</th>";
	echo "<th>Saled quantity</th></tr>";
	while ($rows1=mysqli_fetch_array($seq1)) 
	{

		$item_code2=$rows1['item_code'];
		$avg1="SELECT SUM(item_quantity) as sum1 From sales_and_bill where day between '$days_ago' and '$date' and item_code='$item_code2';";
		$avge1=mysqli_query($connection,$avg1);
		$avgex1=mysqli_fetch_assoc($avge1);
		$average1=$avgex1['sum1'];
		if($average1<10)
        {
		$name1="SELECT item_name,unit from sales_and_bill where item_code='$item_code2';";
		$namx1=mysqli_query($connection,$name1);
		$item1=mysqli_fetch_assoc($namx1);
		$item_name1=$item1['item_name'];
		$item_unit1=$item1['unit'];
        
        	echo"<tr><td id='e'>".$item_code2."</td>
        	<td id='e'>".$item_name1."</td>
        	<td id='e'>".$average1.$item_unit1."</td></tr>";
        }
        while ($rows2=mysqli_fetch_array($sqle))
        {
        	$item_code3=$rows2['item_code'];
        	$name1="SELECT item_name,unit from item where item_code='$item_code3';";
			$namx1=mysqli_query($connection,$name1);
			$item1=mysqli_fetch_assoc($namx1);
		$item_name1=$item1['item_name'];
		$item_unit2=$item1['unit'];
        
        	echo"<tr><td id='f'>".$item_code3."</td>
        	<td id='f'>".$item_name1."</td>
        	<td id='f'>0".$item_unit2."</td></tr>";

        }
        
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";
	echo "</div>"
?>
</body>
</html>