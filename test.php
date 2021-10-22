<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
	<input type="text" name="name" placeholder="user name"><br/>
	<input type="submit" name="submit" value="submit">

</form>
<?php
$connection=mysqli_connect("localhost","root","","test");
if (isset($_POST['name'])) {
	$sql="INSERT INTO tutorial(name) VALUES ('$_POST[name]');";
	$EX=mysqli_query($connection,$sql);
	if ($EX) {
          echo "inserted";		# code...
	}
	else
		echo "not inserted";
}
?>
</body>
</html>