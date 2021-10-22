
<!DOCTYPE HTML>
<html>
<head>
	<title>Staff</title>
	<!-- <link rel="stylesheet" type="text/css" href="css\formstyle.css"> -->
	<script type="text/javascript">
		function check()
		{
			
			var reg=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{4}[-\s\.]?[0-9]{4,6}$/;
			var first_name=document.getElementById('first').value;

			var last_name=document.getElementById('last').value;
			var date_birth=document.getElementById('dob').value;
			var gender1=document.getElementById('gender1');
			var gender2=document.getElementById('gender2');
			var join=document.getElementById('join').value;
			var category=document.getElementById('category').value;
			var house_num=document.getElementById('house_no').value;
			var house_name=document.getElementById('house_name').value;
			var street=document.getElementById('street').value;
			var pin=document.getElementById('pin').value;
			var phone_num=document.getElementById('ph').value;
			var salary=document.getElementById('salary').value;
			var pinlength=pin.length;
			var OK = reg.exec(phone_num);
			var phlength=phone_num.length;
			if(gender1.checked==false && gender2.checked==false)
			{
				alert('select a gender');
				return false;
			}
			if(pinlength>6 || pinlength<6)
			{
				alert("enter a valid pin");
				return false;
			}
			//alert(document.getElementById('std_gender').value);
			if(!OK&&phlength<10)
				{
				alert("phone number not valid");
				return false;
			    }
			if(first_name == "" || last_name == "" || date_birth == "" || house_num == "" || house_name == "" || street == "" || category == "" || salary == "")
				{
				alert("Some details are missing!");
				return false;
			    }
			if(gender1 == "" && gender2 == "")
			{
				alert("please select gender!");
				return false;
			}
			 else
			 {
			 	return true;
			 }
			


		}
	</script>
	<style type="text/css">
		.all1
		{
			position: absolute;
			top: 5%;
			left: 20%;
			width: 60%;
			background-image: linear-gradient(-90deg,#0D80FB,#4C6892,#0D80FB );
		}
		.container1
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background-image: linear-gradient(-90deg,#1C08FB,#38318B,#1C08FB);
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.container11
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background-image: linear-gradient(-90deg,#0D80FB,#E7ECF2,#0D80FB );
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.inputbox
		{
			width: 200px;
			height: 50px;
			align-content: center;
			background-image: linear-gradient(-90deg,#FB7AF5,#CD9CCA,#FB7AF5);
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.box:hover
		{
			transform: scale(1.1);
			background:#BE0FEF;
			z-index: 2;
			border-radius: 10px;
			font-weight: bolder;
			box-shadow: 2px 2px 2px #000;
		}
		#submit1
		{
			width: 90%;
			height: 30px;
			border-radius: 15px;
			border-width: 0;
			background: #2EF207;

		}
		#cancel1
		{
			width: 90%;
			height: 30px;
			border-radius: 15px;
			border-width: 0;
			background: #FB082D;

		}
		#submit1:hover,#cancel1:hover,#update1:hover
		{
			transform: scale(1.1);
			z-index: 2;
			font-weight: bolder;
		}
		.button1
		{
			position: relative;
			top: 15px;
			width: 200px;
			height: 50px;
			align-content: center;
			background:none;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		.block
		{
			
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #0E6157;
			display: flex;
			flex-direction: row;
			justify-content: center; 
		}
		.inb
		{
			border width: 1px solid blue;
			text-align: center;
			width: 90%;
			height: 40%;
		}
		input[type="text"]
		{
			border width: 1px solid blue;
		}
	</style>
</head>
<body>
	<?php 
include('connection.php');
$s="SELECT * FROM staff_details ORDER BY staff_id DESC LIMIT 1";
$se=mysqli_query($connection,$s);
$seq=mysqli_fetch_assoc($se);
$id=$seq['staff_id'];
$id=$id+1;
?>
<form method="post" onsubmit="return check();">
	<div class="all1">
		<center><h1 id="staff">Add new staff</h1></center>
<div class="container1">
	<div class="inputbox"><label>Staff Id</label><br/><input type="text" class="inb" name="staff_id" value='<?php echo $id ?>' readonly="" /></div>
	<div class="inputbox"><label>First Name</label><br/><input type="text" class="inb" id="first" name="staff_first" /></div>
	<div class="inputbox"><td><label>Last Name</label><br/><input type="text" class="inb" name="staff_last" id="last" /></td></div>
	<div class="inputbox"><label>Gender</label><br/><input type="radio" name="staff_gender" id="gender1" value="male" />Male
		<input type="radio" name="staff_gender" id="gender2" value="female" >Female</div>
	
</div>
<div class="container1">
	<div class="inputbox"><label>Date of birth</label><br/><input type="date" class="inb" name="staff_dob" id="dob" /></div>
	<div class="inputbox"><label>Joining date</label><br/><input type="date" class="inb" name="join" id="join" /></div>
	<div class="inputbox"><label>Category</label><br/><select name="category" id="category">
<option>Salesman</option>
<option>Packing Section</option>
<option>Cleaning Section</option>
<option>Billing Section</option>
</select></div>
	<div class="inputbox"><label>House No</label><br/><input type="text" class="inb" name="house_no" id="house_no" /></div>
	<div class="inputbox"><td><label>House Name</label><br/><input type="text" class="inb" name="house_name" id="house_name" /></td></div>
</div>
<div class="container1">
	<div class="inputbox"><label>Street</label><br/><input type="text" class="inb" name="street" id="street" /></div>
	<div class="inputbox"><label>District</label><br/>
		<select name="district" />
		            <option>Trivandrum</option>
					<option>Kollam</option>
					<option>Pathanamthita</option>
					<option>Alapuzha</option>
					<option>Kottayam</option>
					<option>Idukki</option>
					<option>Eranakulam</option>
					<option>Trissur</option>
					<option>Palakad</option>
					<option>Malapuram</option>
					<option>Vayanadu</option>
					<option>Kozhikod</option>
					<option>kannur</option>
					<option>Kasargod</option>
	</select>
	</div>
	<div class="inputbox"><label>Pincode</label><br/><input type="text" class="inb" name="pincode" id="pin" /></div>
	<div class="inputbox"><label>Phone</label><input type="text" class="inb" name="ph_no" id="ph" /></div>
	<div class="inputbox"><label>Salary</label><br/><input type="text" class="inb" name="salary" id="salary" /></div>
</div>
<div class="container11">
	<div class="button1"><input type="submit" value="submit" id="submit1" name="submit1" /></div>
 		<div class="button1"><input type="reset" value="cancel" id="cancel1"/></div>
</div>
</div>
<?php
include_once('connection.php');
if(isset($_POST['staff_id'])&&isset($_POST['submit1']))
{
$id=$_POST['staff_id'];
$j="INSERT INTO `staff_details` (`staff_id`, `staff_first`, `staff_last`, `staff_gender`, `staff_dob`, `join_date`, `category`, `house_no`, `house_name`, `street`, `district`, `pincode`, `salary`, `ph_no`) VALUES ('$id','$_POST[staff_first]','$_POST[staff_last]','$_POST[staff_gender]','$_POST[staff_dob]','$_POST[join]','$_POST[category]','$_POST[house_no]','$_POST[house_name]','$_POST[street]','$_POST[district]','$_POST[pincode]','$_POST[salary]','$_POST[ph_no]');";
// if (mysqli_query($connection,$j)) 
// 	echo "inserted";
// 	else
// 		echo "not inserted";
if(mysqli_query($connection,$j))
echo "<script>alert('staff added successfully');</script>";
else
echo"cannot inserted";
}
else
{
	echo "<script>alert('could'nt add staff....please check the details enterd..null id cannot taken');</script>";
}
?>

</body>
</html>