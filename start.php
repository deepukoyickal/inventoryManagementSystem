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

<body onload="myfunction();" style="background-image: url('images/home4.jpg');">
	<form method="post" action="checkuser.php">
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
</body>
</html>