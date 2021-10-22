<?php
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,"project");
$sql="SELECT * FROM item";
$s=mysqli_query($connection,$sql);
if(!$s)
die("could not fetch datas");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Sales</title> 
	<script type="text/javascript">
		function myfunction()
		{
			var today=new Date();
			var year=today.getFullYear();
			var month=today.getMonth()+1;
			var day=today.getDate();
			if(month<10)
				month='0'+month;
			if(day<10)
				day='0'+day;
			var temp=year+"-"+month+"-"+day;
			document.getElementById('date').value=temp;
		}
		function myfunction2()
		{
			var x=document.getElementById('quantity').value;
			var y=document.getElementById('mrp').value;
			var temp=x*y;
			alert(temp);
			document.getElementById('sum').value=temp;

		}
	</script>
	<style type="text/css">
		body
		{
			background: #7E7B33;
		}
		.all
		{
			position: absolute;
			top: 20%;
			left: 20%;
			width: 60%;
			background-color: #734875;
		}
		.container
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #27E1CC;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.box
		{
			width: 200px;
			height: 50px;
			align-content: center;
			background:#27E1CC;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.box:hover
		{
			transform: scale(1.1);
			background:#BE0FEF;
			z-index: 2;
			border-radius: 10px;
			font-weight: bolder;
			box-shadow: 2px 2px 2px #000;
		}
		.button
		{
		width: 200px;
			height: 30px;
			align-content: center;
			background:none;
			margin: 10px;
			transition: .1s;
			text-align: center;	

		}
		#submit,#cancel,#update
		{
			width: 100%;
			height: 30px;
			border-radius: 15px;
			border-width: 0;

		}
		#submit:hover,#cancel:hover,#update:hover
		{
			transform: scale(1.1);
			z-index: 2;
			font-weight: bolder;
		}
		#submit
		{
			background-color: #08F60F;
		}
		#cancel
		{
			background-color: #FD072C;
		}
		#update
		{
			background-color: #0769FD;
		}
		.block
		{
			
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #0E6157;
			display: flex;
			flex-direction: row;
			justify-content: center; 
		}
		.inb
		{
			border width: 1px solid #CD4FB8;
			text-align: center;
			width: 90%;
			height: 40%;
		}
	</style> 
</head>
<body  onload="myfunction()" onmousemove="myfunction2()">
<div class="all">
		<h1><center>Sales and Bill</center></h1>
		<form >
<div class="container">
<?php 
    while($rows=mysqli_fetch_array($s))
    {
	echo "<div class='box'><label>Bill No:</label><br/><input type='text' class='inb' id='no' value=".$rows[id]." /></div>
    <div class='box'><label>Item Code:</label><br/><input type='text' class='inb' id='code' /></div>
	<div class='box'><label>Date</label><br/><input type='text' class='inb' id='date' /></div>
	<div class='box'><td><label>Item Name:</label><br/><input type='text' class='inb'/></td></div>
	<div class='box'><label>Item Description:</label><br/><input type='text' class='inb'/></div>";
	}
	?>
</div>
<div class="container">
	<div class="box"><label>Item Category:</label><br/><input type="text" class="inb"/></div>
	<div class="box"><label>Item Unit:</label><br/><input type="text" class="inb"/></div>
	<div class="box"><label>Item Category</label><br/><input type="text" class="inb"/></div>
	<div class="box"><td><label>Item Quantity:</label><br/><input type="text" class="inb" id="quantity" /></td></div>
</div>
<div class="container">
	<div class="box"><label>MRP:</label><br/><input type="text" class="inb" id="mrp" /></div>
	<div class="box"><label>Rate:</label><br/><input type="text" class="inb"/></div>
		<div class="box"><label>Amount</label><br/><input type="text" class="inb" id="sum" /></div>
</div>
<div class="block">
	<div class="button"><input type="button" value="submit" id="submit"/></div>
 		<div class="button"><input type="reset" value="cancel" id="cancel"/></div>
		<div class="button"><input type="button" value="update" id="update"/></div>
</div>
</form>

</div>
</body>
</html>