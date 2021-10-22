<?php
include('connection.php');
$su="SELECT * FROM daily_customers;";
$sup=mysqli_query($connection,$su);
$s="SELECT * FROM daily_customers ORDER BY customer_id DESC LIMIT 1";
	$se=mysqli_query($connection,$s);
	$seq=mysqli_fetch_assoc($se);
	$sid=$seq['customer_id'];
	$sid+=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>suppliers</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript">
		function test(x)
		{
			$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
			var v=confirm('are you sure?');
			document.getElementById(x).value=v;
		}
		function test1(y)
		{
			$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
			var k=confirm('do you really want to delete?');
			document.getElementById(y).value=k;
			//$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
		}
		function update()
		{
				$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
				
		}
	</script>
	<link rel="stylesheet" type="text/css" href="css/update.css">
</head>
<body>
<div class="allinone">
		<center><h2>Daily customers</h2></center>
<div class="containeroneupdate">
	<table><tr><form method='post' action=''>
			<td colspan='5'><input type='submit' value='add a new daily_customer' name='supplier' id='supplier'></td></form>
		</tr></table>
	<table border="1" cellpadding="10">
		<tr>
			<th>Customer_Id</th>
			<th>Customer_name</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
		while ($rows=mysqli_fetch_array($sup)) {
			echo "<form method='post' >
			<tr><td><input type=text value=".$rows['customer_id']." name='sid' id='input' readonly=''></td>";
			echo "<td><input type=text value=".$rows['customer_name']." id='input' name='sname' ></td>";
			//echo "<td><input type=text value=".$rows['rate_of_discount']." id='input' name='sph' > </td>";
			echo "<input type='hidden' name='conform' id=".$rows['customer_id'].">";
			//echo "<input type='hidden' name='conform1' id=".$rows['supplier_id'].">";
			echo "<td><input type=submit value=update  name=update id=".$rows['customer_id']." onclick='return test(id);' class=up ></td>";
	echo "<td><input type=submit value=remove  name=remove id=".$rows['customer_id']." onclick='return test1(id);' class=re ></td></tr>
			</form>";
		}
		echo "</table>
            </div></div>";
		if(isset($_POST['update'])&&($_POST['conform']=='true'))
		{	
			$up="UPDATE daily_customers SET customer_name='$_POST[sname]' Where customer_id='$_POST[sid]';";
			$upd=mysqli_query($connection,$up);
			echo "<script>update();</script>";
			
		}
		if(isset($_POST['remove'])&&($_POST['conform']=='true'))
		{
			$de="DELETE FROM daily_customers WHERE customer_id='$_POST[sid]';";
			$del=mysqli_query($connection,$de);
			echo "<script>update();</script>";
		}
		
		if(isset($_POST['supplier']))
		{
			echo "<div class='addsupplier'>";
			echo "<center><h3>Add a new daily customer</h3></center>";
			echo "<form method='post'>
				<div class='box'><label>Customer id:</label><br/><input type='text' class='inb' name='sid' readonly='' value=".$sid." /></div>
				<div class='box'><label>Customer name:</label><br/><input type='text' class='inb' name='sname' /></div>
								<div class='box'><br/><input type='submit' class='inb' id='submit' value='Add customer' name='addcustomer'></div>
						";
						echo "</form>";
						echo "</div>";
		}
		if(isset($_POST['sname'])&&isset($_POST['sid'])&&isset($_POST['addcustomer'])){
			if($_POST['sname']==null)
			{
				echo "<script>alert('customer name cannot be empty');</script>";
			}
			else
			{
			$ne="INSERT INTO daily_customers(customer_id,customer_name) VALUES ('$_POST[sid]','$_POST[sname]');";
			$new=mysqli_query($connection,$ne);
			if($new)
			{
				echo "<script>alert('added to the list');
				update();</script>";
			}
		}
		}
		?>
	

</body>
</html>