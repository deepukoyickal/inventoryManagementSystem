<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Staff page!</title>
    <script type="text/javascript">
        function test(x)
        {
            document.getElementById(x).style.background='red';
        }
    </script>
    <style type="text/css">
      
            .all
            {
                width: 100%;
                height: 100%;
            }
            .tabContainer{
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
            .tabContainer  button{
                width: 200px;
                height: 60px;
                float: left;
                border: 2px solid #07E5FD;
                outline:none;
                margin: 5px;
                cursor: pointer;
                padding: 0 10px;
                font-family: Times-new-roman;
                font-size: 18px;
                background-color: #F506E9;
                 justify-content: center;
                 border-top-left-radius: 15px;
                 border-bottom-right-radius: 15px;
            }
            .tabContainer button:hover{
                background-color: #d7d4d4;
            }
            .content
        {
        position: absolute;
            left: 0;
            top: 21%;
            width: 100%;
            height: 100%;
           /* background-image: linear-gradient(-90deg,#0857F7,#183264 );*/
           background: #0891A6;
            margin: 0;  
        }
        .header
        {
            position: absolute;
            top: 0;
            left: 0;
            /*background-image: url(cube.jpg);*/
            background-image: linear-gradient(-90deg,#0F7BEF,#08FDFD );
            width: 100%;
            height: 10%;
            text-align: center;
        }
        #title
        {
            position: absolute;
            left: 30%;
             background: -webkit-linear-gradient(#3A0BF7, #0F0F10);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bolder;
            font-family: timesnewroman;
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
    </style>
</head>
<body style="padding: 20px">
<div class="all">
    <div class="header">
        <h2 id="admin">Staff page!</h2>
        <h1 id="title">INVENTORY MANAGEMENT SYSTEM</h1>
    </div>
    <div class="inter"></div>
<div class="tabContainer">
           
            <a href="tabstaff.php?page=salesandbill" id="b1"><button id="b1" onclick="test(id);">Sales And Bill</button></a>
        
            <a href="tabstaff.php?page=checkstock"><button id='b2' onclick="showPanel(id)">Check Stock</button></a>
        
            <a href="tabstaff.php?page=todayssales"><button id='b3' onclick="showPanel(id)">Today's sales</button></a>
        
            <a href="tabstaff.php?page=access"><button id='b4' onclick="showPanel(id)">Sales Report</button></a>
        
            <a href="tabstaff.php?page=settings"><button id='b5' onclick="showPanel(id)">Settings</button></a>
        
            <a href="logout.php"><button id='b6' onclick="showPanel(id)">Log out</button></a>
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