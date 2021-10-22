<?php
include('connection.php');
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