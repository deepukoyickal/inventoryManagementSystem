<?php
include('connection.php');
$sql="SELECT item_code FROM item WHERE item_code NOT IN (SELECT item_code FROM sales_and_bill);";
$sqle=mysqli_query($connection,$sql);
if ($sqle) {
	echo "success";
}
else
echo "failed";
while ($rows=mysqli_fetch_array($sqle)) {
	echo $rows['item_code']."<br/>";
}
?>