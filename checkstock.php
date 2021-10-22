<?php 
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>check stock</title>
	<script type="text/javascript">
		var flag = true;
function changeColor () {
    if(flag==true){
        document.getElementById("stock").style.background="red";
        flag=false;
    }
    else if (flag==false){
    document.getElementById("stock").style.background="blue";
    flag = true;
    }
}
setInterval("changeColor()", timeinmillisec);
	</script>
	<style type='text/css'>
		body
		{
			background: #7E7B33;
		}
		.alla
		{
			position: absolute;
			top: 5%;
			left: 20%;
			width: 60%;
			background-color: #734875;
			justify-content: center;
		}
		.containeraa
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #C9C1C1;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.boxa
		{
			width: 200px;
			height: 60px;
			align-content: center;
			/*background:#B2A272;*/
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.stock
		{
			position: relative;
			left: : 5%;
			width: 100%;
			height: auto;
			background-image: linear-gradient(-90deg,#02aab0,#00cdac );
		}
		#sel
		{
			width: 200px;
			height: 30px;
			position: relative;
			left: 5px;
		}
		#go1
		{
			position: relative;
			top: 15px;
			width: 150px;
			height: 30px;
			background: #18FB03;
			outline: none;
			border-radius: 10px;
			border-width: 0;
		}
		select {
				padding-left: 80px;
  				text-align: center;
 			    text-align-last: center;
				}
		td
		{
			text-align: center;
		}
		#hed
		{
			background: #325D9D;
			color: black;
			width: 100px;
			height: 30px;
			font-size: 25px;
		}
		#hed1
		{
			background: #6874F1;
			word-spacing: 5px;
		}
	</style>
</head>
<body>
<div class='alla'>
		<h1><center>Check Stock</center></h1>
		<form method='post' action='#' >
<div class='containeraa'>
		<div class='boxa' id="boxa">
		<label>Select category</label><br/>
			<?php
				echo"<select name='item_category' id='sel'>";
				echo "<option>select category</option>";
				$sq="SELECT DISTINCT item_category FROM item;";
				$sql=mysqli_query($connection,$sq);
				while ($rows=mysqli_fetch_assoc($sql))
					{
						echo "<option>".$rows['item_category']."</option>";
					}
				echo"<option>all</option>";
				echo"</select>";
			?></div>
		
		<div class='boxa'><input type='submit' id='go1' value='checkstock' name='checkstock'></div>
</div>
</form>

<?php 
if (isset($_POST['checkstock'])) {
	if($_POST['item_category']=='all')
	{
		$sto="SELECT * FROM item where stock < 100;";
		$stock=mysqli_query($connection,$sto);
		$sto1="SELECT * FROM item where stock > 100;";
		$stock1=mysqli_query($connection,$sto1);
	}
	else
	{
		$sto="SELECT * FROM item WHERE item_category='$_POST[item_category]' AND stock < 100;";
		$stock=mysqli_query($connection,$sto);
		$sto1="SELECT * FROM item WHERE item_category='$_POST[item_category]' AND stock > 100;";
		$stock1=mysqli_query($connection,$sto1);
	}
	echo"<div class='stock' >
	<table border='1' style='width: 100%;' cellpadding='7'  id='table'>
		<tr>
		<th colspan=3 id='hed'>Stock details of ".$_POST['item_category']." items</th>
		</tr>
		<tr >
			<th id='hed1'>Item code</th>
			<th id='hed1'>Item name</th>
			<th id='hed1'>Stock</th>
		</tr>";
		while ($rows2=mysqli_fetch_array($stock))
		 {
			echo "<tr>
				<td>".$rows2['item_code']."</td>
				<td>".$rows2['item_name']."</td>";
				if($rows2['stock']<100)
				{
					echo"<td style='background:#F7545E' id='stock'>".$rows2['stock'].$rows2['unit']."</td>";
					//echo "<script>changeColor();</script>";
				}
				else
				{
					echo"<td>".$rows2['stock'].$rows2['unit']."</td>";
				}

				  echo"</tr>";
		 }
		 while($rows3=mysqli_fetch_array($stock1))
		 {
		 	echo "<tr>
				<td>".$rows3['item_code']."</td>
				<td>".$rows3['item_name']."</td>";
				echo"<td>".$rows3['stock'].$rows3['unit']."</td>";
				echo"</tr>";
		 }
		
	echo"</table>";
echo"</div>";
}
?>
</div>
</body>
</html>