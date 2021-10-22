<?php
session_start();
$_SESSION["day"]=$_POST['day'];
//echo $_SESSION['day'];
$con=mysqli_connect('localhost','root','','project');
$db=mysqli_select_db($con,'project');
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * FROM users WHERE username='".$username."' AND password='".$password."' limit 1";
$re=mysqli_query($con,$sql);
	$row=mysqli_fetch_row($re);
	$user=$row[0];
	if($user=='Admin')
		//echo $_SESSION['day'];
		include('adminpage.php');
	else if($user=='Staff')
	{
		//include('intermediate.php');
		include('tabstaff.php');
		//echo $_SESSION["day"];
		//echo $_POST['day'];
	}
	else
	{
		echo "<html><head><script type=text/javascript>
			alert('user name or password are incorrect')
			</script></head></html>";
			
	}
	//header("Location:login.php");
?>
		