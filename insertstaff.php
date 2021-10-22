<?php
include_once('connection.php');
$id=$_POST['staff_id'];
$j="INSERT INTO `staff_details` (`staff_id`, `staff_first`, `staff_last`, `staff_gender`, `staff_dob`, `join_date`, `category`, `house_no`, `house_name`, `street`, `district`, `pincode`, `salary`, `ph_no`) VALUES ('$id','$_POST[staff_first]','$_POST[staff_last]','$_POST[staff_gender]','$_POST[staff_dob]','$_POST[join]','$_POST[category]','$_POST[house_no]','$_POST[house_name]','$_POST[street]','$_POST[district]','$_POST[pincode]','$_POST[salary]','$_POST[ph_no]');";
if (mysqli_query($connection,$j)) 
	echo "inserted";
	else
		echo "not inserted";
?>
