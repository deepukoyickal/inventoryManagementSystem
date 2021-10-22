<?php
$day=date('Y-m-d');
?>
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
		<center><h3>Purchase report</h3></center>
<div class="container">
	<div class="box"><label>Starting Date</label><br/><input type="date" class="inba" name="start" /></div>
	<div class="box"><label>Ending date</label><br/><input type="date" class="inba" name="end" /></div>
	<div class="box"><br/><input type="submit" class="inb" id="submit" value="Generate Report" name="purchasereport"></div>
</div>

</form>
	<?php
	include("connection.php");
	if(isset($_POST['purchasereport']))
	{
	if($_POST['start']!=null && $_POST['end']!=null && $_POST['start']!=$_POST['end'])
	{
		//echo "<div class='box1'>
		//echo"<center>";
		$start=$_POST['start'];
		$end=$_POST['end'];
		//echo "success";
		$billcount="SELECT COUNT(Item_Code) as count FROM purchase where Date between '$start' AND '$end';";
		$billcountex=mysqli_query($connection,$billcount);
		$count=mysqli_fetch_array($billcountex);
		$totalamount="SELECT SUM(amount) as temp FROM  purchase where Date between '$start' AND '$end';";
		$totalex=mysqli_query($connection,$totalamount);
		$temp=mysqli_fetch_array($totalex);
		//$totaldiscount="SELECT SUM(discount) as discount FROM  sales_and_bill where day between '$start' AND '$end';";
		//$totaldiscex=mysqli_query($connection,$totaldiscount);
		//$discount=mysqli_fetch_array($totaldiscex);
		//echo $count['count'];
		//echo "<br/>";
		//echo $temp['temp'];
		//echo "<br/>";
		//echo $discount['discount'];
		//echo "<br/>";
		$grosstotal=$temp['temp'];
		//echo $grosstotal;
		echo"<div class='containeraa'>
		<div class='boxa'><label>From</label></br><input type=date value=".$start." class='inba' readonly=''></div>
		<div class='boxa'><label>To</label></br><input type=date value=".$end." class='inba' readonly=''></div>
		<div class='boxa'><label>Number of items purchased </label><br/><input type='text' class='inba' name='icode' value=".$count['count']." readonly='' /></div>
		<div class='boxa'><td><label>Gross total</label><br/><input type='text' class='inba' name='iname' value=".$grosstotal." id='name' readonly='' /></td></div>
	
</div>";
$bill="SELECT DISTINCT Date FROM purchase where Date BETWEEN '$start' AND '$end';";
$bille=mysqli_query($connection,$bill);
//echo "//<div class='report'>";
while ($ro=mysqli_fetch_array($bille))
{
	echo "<div class='report'>";
	$date=$ro['Date'];
	//echo"<br/>";
echo "<table border='1' cellpadding='10'>";
//echo "<tr><th colspan='7'>Date:".$date."</th></tr>";
echo "<tr><th>Item_code</th>
		  <th>Item_name</th>
		  <th>Quantity</th>
		  <th>Supplier name</th>
		  <th>MRP</th>
		  <th>Rate</th>
		  <th>Amount</th>
	  </tr>";
	  	$sq="SELECT * FROM purchase where Date='$date';";
		$sql=mysqli_query($connection,$sq);
		$tot="SELECT SUM(Amount) AS sum FROM purchase WHERE Date='$date';";
		$totex=mysqli_query($connection,$tot);
		$totexq=mysqli_fetch_assoc($totex);
		$temp1=$totexq['sum'];
while ($rows=mysqli_fetch_array($sql))
{
	//echo "<tr><td colspan=4></td>".$rows['bill_no']."</tr>";
	echo "<tr><td>";
	echo $rows['Item_Code']."</td>";
	echo "<td>".$rows['Item_Name']."</td>";
	echo "<td>".$rows['Item_Quantity']." - ".$rows['Item_Unit']."</td>";
	echo "<td>".$rows['Supplier_Name']."</td>";
	echo "<td>".$rows['MRP']."</td>";
	echo "<td>".$rows['Purchase_Rate']."</td>";
	echo "<td>".$rows['Amount']."</td>";
	echo "</tr>";
}
/*$tot="SELECT SUM(amount) AS sum FROM sales_and_bill WHERE day='$day' AND bill_no='$billno';";
$totex=mysqli_query($connection,$tot);
$totexq=mysqli_fetch_assoc($totex);
$temp=$totexq['sum'];
$d="SELECT SUM(discount) AS discount FROM sales_and_bill WHERE day='$day' AND bill_no='$billno';";
$dis=mysqli_query($connection,$d);
$disc=mysqli_fetch_assoc($dis);
$disco=$disc['discount'];
$temp-=$disco;*/
echo "<tr>
		<td colspan='6'>Gross total</td>
		<td>".$temp1."</td></tr>";
echo "</table>";
//echo "<div class='inter'></div>";
echo "</div>";
}
		
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
