<?php
$connection= mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,"project");
$day2=date('Y-m-d');
$e="SELECT expiry from purchase; ";
$de="SELECT Item_Code,Item_Quantity from purchase where expiry='$day2';";
$ex=mysqli_query($connection,$de);
while ($rows=mysqli_fetch_array($ex)) {
	$code=$rows['Item_Code'];
	$sq="UPDATE item SET stock=stock-'$rows[Item_Quantity]' where item_code='$code';";
	mysqli_query($connection,$sq);
	$ins="INSERT into expired(item_code,day,quantity) VALUES ('$rows[Item_Code]','$day2','$rows[Item_Quantity]');";
	mysqli_query($connection,$ins);
}
?>