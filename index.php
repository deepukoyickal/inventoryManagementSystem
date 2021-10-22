<?php
session_start();
$_SESSION["day"]='';
?>
<!DOCTYPE HTML>
<html>
<head>

	<title>Login</title>
	<script type="text/javascript">
		function myfunction()
		{
			var today=new Date();
			var year=today.getFullYear();
			var month=today.getMonth()+1;
			var day=today.getDate();
			
			if (day<10) 
				day='0'+day;
			if(month<10)
				month='0'+month;
			var temp=year+"-"+month+"-"+day;
			document.getElementById('day').value=temp;
			//alert("date");
		}
	</script>
<link rel="stylesheet" type="text/css" href="css\style.css">
</head>

<body onload="myfunction();" style="background-image: url('images/supermarket.jpg');">
	<form method="post" action="#">
	<div class="box">
		<h1>LOGIN</h1>
		<div class="img"><img src="" /></div>
		<div class="input">
	<input type="text" placeholder="Username" name="username"><img src="images/login.png" class="user">
	<input type="hidden" name="day" id="day">
		</div>
	<div class="input">
	<input type="password" placeholder="Password" name="password"><img src="images/lock.png" class="user">
	</div>
<input type="submit" value="Submit" id="submit"/>
<!-- <input type="reset" value="cancel" id="cancel"/> -->
</center> </div>
</form>
<?php
//session_start();
if(isset($_POST['username'])&&isset($_POST['password'])){
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
	{
		include('adminpage.php');
	}
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
}
	//header("Location:login.php");
?>

</body>
</html>