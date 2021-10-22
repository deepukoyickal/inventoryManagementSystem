
<!DOCTYPE html>
<html>
<head>
	<title>admin page inventory management system</title>
	<style type="text/css">
		body
		{
			padding: 0;
			margin: 0;
			background: #3C6159;
		}
		.allall
		{
			padding: 0;
			margin: 0;
		}
		.header
		{
			position: absolute;
			top: 0;
			left: 0;
			background-image: linear-gradient(-90deg,#0F7BEF,#08FDFD );
			width: 100%;
			height: 10%;
			text-align: center;
		}
		#title
		{
             background: -webkit-linear-gradient(#3A0BF7, #0F0F10);
            -webkit-background-clip: text;
  			-webkit-text-fill-color: transparent;
			font-weight: bolder;
			font-family: timesnewroman;
			position: absolute;
			left: 30%;
		}
		#admin
		{
		position: absolute;
		left: 5%;
		top: 10%;
		font-weight: 30px;
             background: -webkit-linear-gradient(#03010B, #F6460C);
            -webkit-background-clip: text;
  			-webkit-text-fill-color: transparent;
			font-weight: bolder;
			font-family: timesnewroman;	
		}
		.inter
		{
			position: absolute;
			left: 0;
			top: 10%;
			width: 100%;
			height: 1%;
			background-image: linear-gradient(90deg,#030304,#030304,#070FFB );
		}
		.menu
		{
			 background-image: linear-gradient(-90deg,#13547a,#80d0c7,#13547a );
            position: absolute;
            left: 0;
            top: 11%;
            width: 100%;
            height: 10%;
            display: flex;
            flex-direction: row;
            justify-content: center;
		}
		button
		{
			width: 110px;
                height: 60px;
                float: left;
                border: 2px solid #101010;
                outline:none;
                margin: 5px;
                cursor: pointer;
                padding: 0 10px;
                font-family: sans-serif;
                font-size: 18px;
                background-color: #F2C4F2;
                 justify-content: center;
                 border-top-left-radius: 15px;
                 border-bottom-right-radius: 15px;
                 font-family: timesnewroman;
		}
		button:hover
		{
			background: #FD0C0C;
			transform: skew(5deg);
			transform: scale(1.1);
		}
		#click1:hover
		{
			transform: scale(1.1);
			background: #04FD0C;
		}
		.sidebar
		{
			position: absolute;
			left: 0;
			top: 11%;
			width: 15%;
			height: 100%;
			background-image: linear-gradient(-90deg,#6B6EBC,#F303F7 );
			margin: 0;
		}
		.content
		{
		position: absolute;
			left: 0;
			top: 21%;
			width: 100%;
			min-height: 1000px;
			background-image: linear-gradient(-90deg,#437AF2,#183264 );
			margin: 0;	
		}
		#click
		{
			position: relative;
			left: 15px;
			top: 10px;
			padding: 14px;
			height: 20px;
			width: 140px;
			text-align: center;
			font-size: 15px;
			background:#0BF617;
			margin: 5px;
			border: 2px solid red;
			border-radius: 20px;
		}
	</style>
</head>
<body>
<div class="allall">
	<div class="header">
		<h2 id="admin">Admin page!</h2>
		<h1 id="title">INVENTORY MANAGEMENT SYSTEM</h1>
	</div>
	<div class="inter"></div>
	<div class="menu"> 
			<!-- <div id="click1"><a href="adminpage.php?page=staff">Add  Staff</a></div>
			<div id="click1"><a href="adminpage.php?page=updatestaff">Manage Staffs</a></div>
			<div id="click1"><a href="adminpage.php?page=todayssales">Today's sale</a></div>
			<div id="click1"><a href="adminpage.php?page=access">Sales Report</a></div>
			<div id="click1"><a href="adminpage.php?page=purchase1">Manage Stock</a></div>
			<div id="click1"><a href="adminpage.php?page=purchasereport">Purchase Report</a></div>
			<div id="click1"><a href="adminpage.php?page=informations">informations</a></div>
			<div id="click1"><a href="adminpage.php?page=">Settings</a></div>
			<div id="click1"><a href="logout.php">Logout</a></div>
			 -->
			 <a href="adminpage.php?page=staff"><button onclick="showPanel(0,'red')">Add staff</button></a>
            <a href="adminpage.php?page=updatestaff"><button onclick="showPanel(1,'red')">Manage Staff</button></a>
            <a href="adminpage.php?page=access"><button onclick="showPanel(3,'red')">Sales Report</button></a>
            <a href="adminpage.php?page=checkstock"><button onclick="showPanel(6,'red')">Checkstock</button></a>
            <a href="adminpage.php?page=purchase1"><button onclick="showPanel(2,'red')">Manage Stock</button></a>
            <a href="adminpage.php?page=purchasereport"><button onclick="showPanel(4,'red')">Purchase Report</button></a>
            <a href="adminpage.php?page=todayssales"><button onclick="showPanel(5,'red')">Todays Sales</button></a>
            <a href="adminpage.php?page=informations"><button onclick="showPanel(6,'red')">Info</button></a>
            <a href="adminpage.php?page=suppliers"><button onclick="showPanel(7,'red')">Suppliers</button></a>
            <a href="adminpage.php?page=dailycustomers"><button onclick="showPanel(8,'red')">Daily customers</button></a>
            <a href="adminpage.php?page=settings"><button onclick="showPanel(9,'red')">Settings</button></a>
            <a href="logout.php"><button onclick="showPanel(10,'red')">Log out</button></a>
	</div>
	<div class="content">
        <?php 
        if(isset($_GET['page']))
        {
            echo "<div>";
        $p=$_GET['page'];
        $page=$p.".php";
        if(file_exists($page))
        include($page);
        echo"</div>";
        }
        ?>
    </div>
</div>
<script src="js/mine.js"></script>

</body>
</html>