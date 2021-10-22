<?php
include('connection.php');
$su="SELECT * FROM suppliers;";
$sup=mysqli_query($connection,$su);
$s="SELECT * FROM suppliers ORDER BY supplier_id DESC LIMIT 1";
	$se=mysqli_query($connection,$s);
	$seq=mysqli_fetch_assoc($se);
	$sid=$seq['supplier_id'];
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
			//alert('hai');
			var v=confirm('are you sure?');
			document.getElementById(x).value=v;
		}
		function test1(y)
		{
			$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
			var k=confirm('do you really want to delete?');
			document.getElementById(y).value=k;
			//alert('hai');
			//$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
		}
		function update()
		{
			alert('updated');
				//$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
			//document.getElementById("content").innerHTML = "content";
				//$('#content').html('#content');
				
		}
	</script>
	<link rel="stylesheet" type="text/css" href="css/update.css">
</head>
<body>
<div class="allinone">
		<center><h2>Supplier details</h2></center>
<div class="containeroneupdate" id="content">
	<table><tr><form method='post' action='#'>
			<td colspan='5'><input type='submit' value='add a new supplier' name='supplier' id='supplier'></td></form>
		</tr></table>
	<table border="1" cellpadding="10">
		<tr>
			<th>Supplier_Id</th>
			<th>Supplier_name</th>
			<th>Ph_no</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
		while ($rows=mysqli_fetch_array($sup)) {
			echo "<form method='post' action='#' >
			<tr><td><input type=text value=".$rows['supplier_id']." name='sid' id='input' readonly=''></td>";
			echo "<td><input type=text value=".$rows['supplier_name']." id='input' name='sname' ></td>";
			echo "<td><input type=text value=".$rows['ph_no']." id='input' name='sph' > </td>";
			echo "<input type='hidden' name='conform' id=".$rows['supplier_id'].">";
			//echo "<input type='hidden' name='conform1' id=".$rows['supplier_id'].">";
			echo "<td><input type=submit value=update  name=update id=".$rows['supplier_id']." onclick='return test(id);' class=up ></td>";
	echo "<td><input type=submit value=remove  name=remove id=".$rows['supplier_id']." class=re ></td></tr>
			</form>";
		}
		echo "</table>
            </div></div>";
		if(isset($_POST['update'])&&($_POST['conform']=='true'))
		{	
			$up="UPDATE suppliers SET supplier_name='$_POST[sname]',ph_no='$_POST[sph]' Where supplier_id='$_POST[sid]';";
			$upd=mysqli_query($connection,$up);
			//header('Location: '.$_SERVER['REQUEST_URI']);
			//refresh();
			
		}
		if(isset($_POST['remove'])&&isset($_POST['sid']))
		{
			$id=$_POST['sname'];
			echo $id;
			//$up="UPDATE suppliers SET supplier_name='',ph_no='',supplier_id='' Where supplier_id='$_POST[sid]';";
			$up="DELETE FROM suppliers WHERE supplier_name='$id' LIMIT 1;";
			$del=mysqli_query($connection,$up);
			if(!$del)
			echo "deleted";
		//$_POST['sid']='';
		}
		
		if(isset($_POST['supplier']))
		{
			echo "<div class='addsupplier'>";
			echo "<center><h3>Add a new supplier</h3></center>";
			echo "<form method='post'>
				<div class='box'><label>Supplier id:</label><br/><input type='text' class='inb' name='sid' readonly='' value=".$sid." /></div>
				<div class='box'><label>Supplier name:</label><br/><input type='text' class='inb' name='sname' /></div>
				<div class='box'><label>Contact Number:</label><br/><input type='text' class='inb' name='sph' /></div>
				<div class='box'><br/><input type='submit' class='inb' id='submit' value='Add supplier' name='purchasereport'></div>
						";
						echo "</form>";
						echo "</div>";
		}
		if(isset($_POST['sname'])&&isset($_POST['sid'])&&isset($_POST['sph'])){
			if($_POST['sname']==null)
			{
				echo "<script>alert('supplier name cannot be empty');</script>";
			}
			else
			{
			$ne="INSERT INTO suppliers(supplier_id,supplier_name,ph_no) VALUES ('$_POST[sid]','$_POST[sname]','$_POST[sph]');";
			$new=mysqli_query($connection,$ne);
			// if($new)
			// {
			// 	echo "<script>alert('added to the list');
			// 	update();</script>";
			// }
		}
		}
		exit();
		?>
	

</body>
</html>