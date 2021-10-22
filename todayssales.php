
<html>
<head>
	<style type="text/css">
		.report
		{
			position: relative;
			padding: 10px;
			margin: 10px auto;
			background: #D7DAC9;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		table
		{
			table-layout: fixed;
			width: 80%;
			text-align: center;
		}
		td,th
		{
			text-align: center;
			width: auto;
		}
		th
		{
			background: #888D37;
		}
		.reportall
		{
			position: absolute;
			top: 5%;
			width: 100%;
			height: auto;
			background: green;
		}
		.head
		{
			height: 70px;
			width: 300px;
			background: #8EA7A8;
			justify-content: center;
			margin: 10px;
			flex: column;
		}
		#num
		{
			height: 30px;
			text-align: center;
		}
		label
		{
			font-size: 18px;
		}
		#submit
		{
			width: 200px;
			height: 30px;
			position: relative;
			top: 20px;
			background: #23F20B;
			border: 2px solid #0B3AF2;
			font-weight: bold;
		}
		#submit:hover
		{
			transform: scale(1.1);
		}
		#gross11
		{
			background: #C0EFF1;
			border-top: 1px solid black;
		}
		#gross1
		{
			background: #C0EFF1;
		}
	</style>
</head>
<body>
	
<?php
$day=date('Y-m-d');
//$day='2019-08-31';
include('connection.php');
$bill="SELECT DISTINCT bill_no FROM sales_and_bill where day='$day';";
$bille=mysqli_query($connection,$bill);
$nu=mysqli_fetch_assoc($bille);
$num="SELECT COUNT(DISTINCT bill_no) as count FROM sales_and_bill where day='$day';";
$nume=mysqli_query($connection,$num);
$num1=mysqli_fetch_assoc($nume);
$num11=$num1['count'];
$sum="SELECT SUM(amount) as sum from sales_and_bill where day='$day';";
$sume=mysqli_query($connection,$sum);
$sum1=mysqli_fetch_assoc($sume);
$sum11=$sum1['sum'];
$sum11=round($sum11,2);
		$totaldiscount="SELECT SUM(discount) as discount from discount where day='$day';";
		$totaldiscount1="SELECT SUM(discount_given) as discount_given from discount where day='$day';";
		$totaldiscex=mysqli_query($connection,$totaldiscount);
		$totaldiscex2=mysqli_query($connection,$totaldiscount1);
		$discount=mysqli_fetch_array($totaldiscex);
		$discount2=mysqli_fetch_array($totaldiscex2);
		$discount1=$discount['discount'];
		$discount2=$discount2['discount_given'];
		$discount3=$discount2+$discount1;
//$dis="SELECT SUM(discount) as dis from sales_and_bill where day='$day';";
//$dise=mysqli_query($connection,$dis);
// $dis1=mysqli_fetch_assoc($dise);
// $dis11=$dis1['dis'];
$dis11=round($discount3,2);
//echo "//<div class='report'>";
	if($nu['bill_no']==0)
		{
			echo "<script>alert('no sales has done today');</script>";
		}
	else
		{
			echo "<div class='reportall'>";
			echo "<center><h1>Todays sales</h1></center>";
			echo "<div class='report'>";
			echo "<br/><div class='head'><center><label>total bills: </label><br/><input type=text id='num' value=".$num11."></center></div>";
			echo "<br/><div class='head'><center><label>total amount(in Rupees) </label><br/><input type=text id='num' value=". $sum11."></center></div>";
			echo "<br/><div class='head'><center><label>total discount(in Rupees) </label><br/><input type=text id='num' value=". $dis11."></center></div>";
			echo "<form method='post'>";
			echo "<div class='head'><center><input type='submit' value='Get deatailed report' name='report' id='submit' ></center></div>";
			echo "</form>";
			echo "</div>";
			if(isset($_POST['report']))
			{
				$billl="SELECT DISTINCT bill_no FROM sales_and_bill WHERE day='$day';";
				$billl1=mysqli_query($connection,$billl);
				while ($ro=mysqli_fetch_array($billl1))
				{
					
					echo "<div class='report'>";
					$billno=$ro['bill_no'];
				echo "<table cellpadding='10'>";
				echo "<tr><th colspan='4'>Bill_number:".$billno."</th></tr>";
				echo "<tr><th>item_code</th>
						  <th>item_name</th>
						  <th>quantity</th>
						  <th>amount</th>
					  </tr>";
					  $sq12="SELECT * FROM sales_and_bill where day='$day' AND bill_no='$billno';";
					$sql123=mysqli_query($connection,$sq12);
				while ($rows=mysqli_fetch_array($sql123))
				{
					//echo "<tr><td colspan=4></td>".$rows['bill_no']."</tr>";
					echo "<tr><td>";
					echo $rows['item_code']."</td>";
					echo "<td>".$rows['item_name']."</td>";
					echo "<td>".$rows['item_quantity']." - ".$rows['unit']."</td>";
					// echo "<td>".$rows['discount']."</td>";
					echo "<td>".$rows['amount']."</td>";
					echo "</tr>";
				}
				$tot="SELECT SUM(amount) AS sum FROM sales_and_bill WHERE day='$day' AND bill_no='$billno';";
				$totex=mysqli_query($connection,$tot);
				$totexq=mysqli_fetch_assoc($totex);
				$temp=$totexq['sum'];
				$d="SELECT SUM(discount) AS discount FROM discount WHERE day='$day' AND bill_no='$billno';";
				$d1="SELECT SUM(discount_given) AS discount_given FROM discount WHERE day='$day' AND bill_no='$billno';";
				$dis=mysqli_query($connection,$d);
				$dis1=mysqli_query($connection,$d1);
				$disc=mysqli_fetch_assoc($dis);
				$disc1=mysqli_fetch_assoc($dis1);
				$disco=$disc['discount'];
				$disco1=$disc1['discount_given'];
				
				//$temp-=$disco;
				$disco3=$disco1+$disco;
				$Net=$temp-$disco3;
				$Net=round($Net,2);
				$disco3=round($disco3,2);
				$temp=round($temp,2);

				echo "<tr>
						<td colspan='3'>Total</td>
						
						<td>".$temp."</td></tr>";
				echo "<tr>
						<td colspan='4' id='gross11'>Discount :".$disco3."</td>";
				echo" </tr>";
				echo "<tr>";
				echo "<td colspan='4' id='gross1'>Net :".$Net."</td>";
				echo "</table>";
				//echo "<div class='inter'></div>";
				echo "</div>";
}
}
}
?>
</div>
</body>
</html>
