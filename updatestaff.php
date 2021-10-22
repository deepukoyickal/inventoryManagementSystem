<?php
include('connection.php');
$teach="SELECT * FROM staff_details;";
$exec1=mysqli_query($connection,$teach);

?>
<!DOCTYPE html>
<html>
<head>
	<title>update staff</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript">
		function update()
				{ 
				$( ".containeroneupdate" ).load(window.location.href + " .containeroneupdate" );
				}
	</script>
	<link rel="stylesheet" type="text/css" href="css/update.css">
</head>
<body>
<div class="allinone">
		<center><h2>Update staff details</h2></center>
<div class="containeroneupdate">
	<table border="1" cellpadding="10">
		<tr>
			<th>Id</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Type</th>
			<th>Salary</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
		while ($rows=mysqli_fetch_array($exec1)) {
			$sec="SELECT * FROM working_section";
			$sect=mysqli_query($connection,$sec);
			echo "<form method=post action='#' ><tr>
			<td><input type=text value=".$rows['staff_id']." name=staff_id id='input' readonly=''></td>";
			echo "<td><input type=text value=".$rows['staff_first']." id='input' name=first ></td>";
			echo "<td><input type=text value=".$rows['staff_last']." id='input' name=last > </td>";
			// echo "<td><input type=text value=".$rows['category']." id='input' name=type > </td>";
			echo "<td><select name='type' id='input'>";
			echo "<option>".$rows['category']."</option>";
			while ($section=mysqli_fetch_array($sect))
		    {
		    	if($section['sec_name']!=$rows['category'])
				echo"<option>".$section['sec_name']."</option>";
			}
			echo "</select></td>";
			echo "<td><input type=text value=".$rows['salary']." id='input' name=salary > </td>";
			echo "<td><input type=submit value=update  name=update id='update' onclick='update();'></td>";
			echo "<td><input type=submit value=remove  name=remove id='delete' onclick='update();'></td></tr></form>";
			//echo "<input type='hidden' name='conform' id='conform'</form>";
		}
		if(isset($_POST['update']))
		{
			$up="UPDATE staff_details SET staff_first='$_POST[first]',staff_last='$_POST[last]',category='$_POST[type]',salary='$_POST[salary]' Where staff_id='$_POST[staff_id]';";
			$upd=mysqli_query($connection,$up);
			echo "<script>update();
					alert('Updated successfully');
			 		</script>";
		}
		if(isset($_POST['remove']))
		{
			$de="DELETE FROM staff_details WHERE staff_id='$_POST[staff_id]';";
			$del=mysqli_query($connection,$de);
			echo "<script>update();
					
					alert('Removed successfully');
			 		</script>";
		}
		
		?>
	</table>
</div>
</div>
</div>
</body>
</html>