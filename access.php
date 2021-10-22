<?php
//$day=$_SESSION['day'];
?>*/
<html>
<head>
	<style type="text/css">
		.report
		{
			position: relative;
			padding: 10px;
			margin: 10px auto;
			background: #BABC8A;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		table
		{
			table-layout: fixed;
			width: 100%;
			text-align: center;
		}
		td,th
		{
			text-align: center;
			width: auto;
		}
		th
		{
			background: #059D54;
			height: 30px;
			font-size: 20px;
		}
		td
		{
			background: #AAF2AE; 
		}
		.reportall
		{
			position: absolute;
			top: 5%;
			width: auto;
			height: auto;
			background: green;
		}
		.all11
		{
			position: absolute;
			top: 5%;
			left: 20%;
			width: 60%;
			height: auto;
			background-color: #DD9BE4;
		}
		.container
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 5px;
			margin: 10px auto;
			background: #AC44F7;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.box
		{
			width: 200px;
			height: 70px;
			font-size: 20px;
			align-content: center;
			background:#AC44F7;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.containeraa
		{
			position: relative;
			width: 90%;
			height: auto;
			padding: 10px;
			margin: 10px auto;
			background: #7BD4A9;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.boxa
		{
			width: 200px;
			height: 70px;
			align-content: center;
			background:#B2A272;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.box1
		{
			height: 300px;
		}
		.inba
		{
			border width: 1px solid #CD4FB8;
			text-align: center;
			width: 90%;
			height: 40%;
			font-size: 18px;
		}
		#submit
		{
			height: 50%;
			background: #0CDCF7;
			border-radius: 5px;
			outline: none;
			border-width: 0;
			padding: 5px;
			font-size: 16px;
			font-weight: bold;
			font-family: timesnewroman;
		}
		#submit:hover
		{
			transform: scale(1.1);
			background:#7E898A; 
		}
	</style>
</head>
<body>
	<form method="post" action="#">
	<div class="all11">
		<center><h3>Sales report</h3></center>
<div class="container">
	<div class="box"><label>Starting Date</label><br/><input type="date" class="inba" name="start" /></div>
	<div class="box"><label>Ending date</label><br/><input type="date" class="inba" name="end" /></div>
	<div class="box"><br/><input type="submit" class="inb" id="submit" value="Generate Report" name="salesreport"></div>
</div>

</form>
	<?php
	include("connection.php");
	if(isset($_POST['salesreport']))
	{
	if($_POST['start']!=null && $_POST['end']!=null && $_POST['start']!=$_POST['end'])
	{
		//echo "<div class='box1'>
		//echo"<center>";
		$start=$_POST['start'];
		$end=$_POST['end'];
		//echo "success";
		$billcount="SELECT COUNT(DISTINCT bill_no ) as count FROM sales_and_bill where day between '$start' AND '$end';";
		$billcountex=mysqli_query($connection,$billcount);
		$count=mysqli_fetch_array($billcountex);
		$totalamount="SELECT SUM(amount) as temp FROM  sales_and_bill where day between '$start' AND '$end';";
		$totalex=mysqli_query($connection,$totalamount);
		$temp=mysqli_fetch_array($totalex);
		//$totaldiscount="SELECT SUM(discount) as discount FROM  sales_and_bill where day between '$start' AND '$end';";
		$totaldiscount="SELECT SUM(discount) as discount from discount where day between '$start' AND '$end';";
		$totaldiscount1="SELECT SUM(discount_given) as discount_given from discount where day between '$start' AND '$end';";
		$totaldiscex=mysqli_query($connection,$totaldiscount);
		$totaldiscex2=mysqli_query($connection,$totaldiscount1);
		$discount=mysqli_fetch_array($totaldiscex);
		$discount2=mysqli_fetch_array($totaldiscex2);
		$discount1=$discount['discount'];
		$discount2=$discount2['discount_given'];
		$discount3=$discount2+$discount1;
		$discount3=round($discount3,2);
		$temp1=$temp['temp'];
		$temp1=round($temp1,2);
		$grosstotal=$temp['temp']-$discount3;
		$grosstotal=round($grosstotal,2);
		
		//echo $grosstotal;
		echo "<div class=containeraa>
		<div class='boxa'><label>From</label></br><input type=date value=".$start." class='inba' readonly=''></div>
		<div class='boxa'><label>To</label></br><input type=date value=".$end." class='inba' readonly=''></div>";
		echo "</div>";
		echo"<div class='containeraa'>

	<div class='boxa'><label>Total sales</label><br/><input type='text' class='inba' name='icode' value=".$count['count']." readonly='' /></div>
	<div class='boxa'><label>Total Amount(RS)</label><br/><input type='text' class='inba' name='discount' value=".$temp1." readonly='' /></div>
	<div class='boxa'><td><label>Total discount allowed(RS)</label><br/><input type='text' class='inba' name='iname' value=".$discount3." id='name' readonly='' /></td></div>
	<div class='boxa'><td><label>Gross total(RS)</label><br/><input type='text' class='inba' name='iname' value=".$grosstotal." id='name' readonly='' /></td></div>
	
</div>";
		echo "<div class='containeraa'>";
		echo "<table border='1' cellpadding='5'>
			<tr>
			<th>Item_code</th>
			<th>Item_name</th>
			<th>Total_sales</th>
			<th>Unit</th>
			</tr>";
	$bill="SELECT DISTINCT item_code FROM sales_and_bill where day between'$start' AND '$end';";
	$bille=mysqli_query($connection,$bill);
//echo "//<div class='report'>";
while ($ro=mysqli_fetch_array($bille))
{
	$item_code=$ro['item_code'];
	
    $sq="SELECT DISTINCT item_name,unit FROM sales_and_bill where day between'$start' AND '$end' AND item_code='$item_code';";
	$sql=mysqli_query($connection,$sq);
	$qu="SELECT SUM(item_quantity) as quantity FROM sales_and_bill where  day between'$start' AND '$end' AND item_code='$item_code';";
	$que=mysqli_query($connection,$qu);
	$quantity=mysqli_fetch_assoc($que);
	//echo $item_code."<br/>";
	while ($rows=mysqli_fetch_array($sql))
	{
	//echo "<tr><td colspan=4></td>".$rows['bill_no']."</tr>";
	echo "<tr><td>";
	echo $item_code."</td>";
	echo "<td>".$rows['item_name']."</td>";
	echo "<td>".$quantity['quantity']."</td>";
	echo "<td>".$rows['unit']."</td>";
	echo "</tr>";
	}
	}
	echo" </table>";
}
	else
	{
		echo "<script>alert('enter valid date interval')</script>";
	}
}
	?>
</div>
</div>
</body>
</html>
