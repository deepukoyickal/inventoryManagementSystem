<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	<script type='text/javascript'>
		function update()
		{
			var v=confirm('do you want to change password');
			document.getElementById('confirm').value=v;
		}
	</script>
	<link rel='stylesheet' type='text/css' href='css/settingsstyle.css'>
		
</head>
<body>
<div class='settings'>
	<h2><center>Change Password</center></h2>
	<form method='post'>
		<div class='containerset'>
		<div class='boxset'><input type='text' class='inbset' name='username' placeholder='User Name' required='hello' /></div>
	</div>
	<div class='containerset'>
		<div class='boxset'><input type='Password' class='inbset' name='current' placeholder='Current Password' required='' /></div>
	</div>
	<div class='containerset'>
		<div class='boxset'><input type='Password' class='inbset' name='new' placeholder='New Password' required='' /></div>
	</div>
	<div class='containerset'>
		<div class='boxset'><input type='Password' class='inbset' name='cnew' placeholder='Re-enter New Password' required='' /></div>
	</div>
	<div class='containerset'>
		<div class='boxset'>
			<input type='hidden' name='confirm' id='confirm'>
			<input type='submit' name='submit' class='buttonset' value='Change' onclick='update();' ></div>
	</div>
</form>
</div>
<?php
$connection=mysqli_connect('localhost','root','','project');
//$db=mysqli_select_db($connection,'project');
if(isset($_POST['submit'])&&isset($_POST['confirm']))
{
	if(($_POST['new']==$_POST['cnew'])&&($_POST['confirm']=='true'))
	{
		$s12="SELECT * FROM users where username='$_POST[username]' AND password='$_POST[current]';";
		$se12=mysqli_query($connection,$s12);
		$rows=mysqli_fetch_assoc($se12);
		$user=$rows['username'];
		$pass=$rows['password'];
		if(($_POST['username']==$user)&&($_POST['current']==$pass))
		{
			$sq="UPDATE users SET password='$_POST[new]' WHERE username='$_POST[username]';";
			$sqe=mysqli_query($connection,$sq);
			if($sqe)
				echo "<script>alert('password changed successfully');</script>";
		}
		else
		{
			echo "<script>alert('Wrong username or password');</script>";
		}
	}
	else
	{
		echo "failed";
	}
}
?>
</body>
</html>