<?php 
session_start();
$day=$_SESSION['day'];
//$_SESSION['daily_id']=0;
//$_SESSION['daily_id'];
//$_SESSION['bill']=10;
$temp=0;
$disco=0;
//$_SESSION["mydiscount"];
//$day='2019-08-22';
include('connection.php'); 
	$s="SELECT * FROM sales_and_bill ORDER BY bill_no DESC LIMIT 1";
	$se=mysqli_query($connection,$s);
	$seq=mysqli_fetch_assoc($se);
	$billno=$seq['bill_no'];
$sqlq="SELECT * FROM sales_and_bill WHERE day='$day' AND bill_no='$billno';";
	$data=mysqli_query($connection,$sqlq);
$tot="SELECT SUM(amount) AS sum FROM sales_and_bill WHERE day='$day' AND bill_no='$billno';";
$totex=mysqli_query($connection,$tot);
$totexq=mysqli_fetch_assoc($totex);
$temp=$totexq['sum'];
$temp=round($temp,2);
$d="SELECT SUM(discount) AS discount FROM sales_and_bill WHERE day='$day' AND bill_no='$billno';";
$dis=mysqli_query($connection,$d);
$disc=mysqli_fetch_assoc($dis);
$disco=$disc['discount'];
$t11="SELECT SUM(taxamount) AS tax11 FROM sales_and_bill where day='$day' AND bill_no='$billno';";
$m11="SELECT SUM(mrp) AS mrp FROM sales_and_bill where day='$day' AND bill_no='$billno';";
$mydis="SELECT discount from discount where bill_no='$billno';";
$mydisco=mysqli_query($connection,$mydis);
$mydisco1=mysqli_fetch_assoc($mydisco);
$mydiscount1=$mydisco1['discount'];
$ta11=mysqli_query($connection,$t11);
$mr11=mysqli_query($connection,$m11);
$tax11=mysqli_fetch_assoc($ta11);
$mrp11=mysqli_fetch_assoc($mr11);
$taxnet=$tax11['tax11'];
$taxnet=round($taxnet,2);
$mrpnet=$mrp11['mrp'];
$Netsum=$temp-$mydiscount1;
$Netsum=round($Netsum,3);
$disco=round($disco,2);
$temp=round($temp,2);
$cu="SELECT * FROM daily_customers;";
$cuid=mysqli_query($connection,$cu);
if(floor($Netsum)!=$Netsum)
{
	$extend=' paise';
}
else
{
	$extend=' ruppees';
}
function convert_number_to_words($Netsum) {
 $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' and ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   $number=$Netsum;
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return  $string;
}
?>
<head>
	<title>Sales</title> 
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/typeahead.min.js"></script>
	<script>
    
    // $('input.typeahead').typeahead({
    //     name: 'id',
    //     remote:'search.php?key=%QUERY',
    //     limit : 10
    // });
     $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'name',
        remote:'search2.php?key=%QUERY',
        limit : 10
    });
});
	setInterval(function(){
			$('.container').load(' .container');
			$('#boxa').load(' #boxa');
		},300);
	
		function sum()
		{
			var mrp=document.getElementById('mrp').value;
			var qu=document.getElementById('quantity').value;
			var sum=mrp*qu;
			document.getElementById('total').value=sum;
			var dc=document.getElementById('dc').value;
			alert(dc);
			//var total=document.getElementById('gross').value;
			//var total1+=document.getElementById('gross_total').value;
			//document.getElementById('gross_total').value=total1;
		}
		
 </script>
	<style type='text/css'>
		body
		{
			background: white;
		}
		h1,h2
		{
			color: white;
		}
		th
		{
			border-bottom: 1px solid black;
		}
		.alla
		{
			position: absolute;
			top: 5%;
			left: 10px;
			width: 50%;
			background-color: #2C2AA4;
		}
		.containeraa
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: #08DAFA;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.boxa
		{
			width: 200px;
			height: 65px;
			align-content: center;
			background:#2D8A71;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		/*.boxa:hover
		{
			transform: scale(1.1);
			background:#BE0FEF;
			z-index: 2;
			border-radius: 10px;
			font-weight: bolder;
			box-shadow: 2px 2px 2px #000;
		}*/
		.buttona
		{
		width: 200px;
			height: 30px;
			align-content: center;
			background:none;
			margin: 10px;
			transition: .1s;
			text-align: center;	

		}
		#submita,#updatea,#cancela
		{
			width: 100%;
			height: 30px;
			border-radius: 15px;
			border-width: 0;

		}
		#submita:hover,#updatea:hover,#go:hover,#go1:hover,#cancela:hover
		{
			transform: scale(1.1);
			z-index: 1000;
			font-weight: bolder;
		}
		#submita
		{
			background-color: #08F60F;
		}
		#cancela
		{
			background: #FB0A2B; 
		}
		#cancela1
		{
			background-color: #FD072C;
			width: 100%;
			height: 30px;
			border-width: 0;
		}
		#cancela1:hover
		{
			background: #FB0AEF;
		}
		#updatea
		{
			background-color: #0769FD;
		}
		.blocka
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
		.blockbill
		{
		position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background: none;
			display: flex;
			flex-direction: row;
			justify-content: center; 	
		}
		.inba
		{
			border width: 1px solid #CD4FB8;
			text-align: center;
			width: 90%;
			height: 55%;
		}
		#go
		{
			position: relative;
			top: 20px;
			width: 150px;
			height: 30px;
			background: #0B3FFB;
			outline: none;
			border-radius: 10px;
			border-width: 0;
		}
		#go1
		{
			position: relative;
			top: 15px;
			width: 150px;
			height: 30px;
			background: #18FB03;
			outline: none;
			border-radius: 10px;
			border-width: 0;
		}
		.contain
		{
			width: 100%;
			background-color: #734875;
			justify-content: center;
		}
		.bill
		{
			position: absolute;
			top: 0%;
			left: 105%;
			width: 90%;
			background: #20227E;
			justify-content: center;
		}
		#tblCustomers
		{
			width: 100px;
		}
		td
		{
			text-align: center;
			width: 100px;
		}

		#hed
		{
			background: #B68CBB;
			color: black;
			width: 100px;
		}
		#hed1
		{
			background: #0EE9F1;
			word-spacing: 5px;
		}
		td
		{
			background:#5BEBEB;
			padding: 5px; 
			justify-content: center;
		}
		#gross
		{
			border-width: 0;
			background: none ;
			width: 100%;
			outline: none;
			text-align: center;
			justify-content: center;
		}
		#gross1
		{
			background: #C0EFF1;
		}
		#gross11
		{
			background: #C0EFF1;
			border-top: 1px solid black;
		}
		#grt
		{
			background: #C0EFF1;
			text-align: center;
			font-size: 20px;
			font-weight: bold;
			border: none;
		}
		#words
		{
			background: #C0EFF1;
			text-align: center;
			font-size: 16px;
			font-weight: bold;
			border: none;
			width: 500px;
		}
		#grossto
		{
			background: #C0EFF1;
			text-align: left;
			background: none;
			border: none;
		}
		table
		{
			table-layout: fixed;
			width: 100%;
			text-align: center;
		}
		#d
		{
			text-align: center;
		}
		.container
		{
			width: 100%;

		}
		#submit
		{
			background: #2FD9F3;
			width: 150px;
			height: 30px;
			border: 2px solid green;
		}
		#submit:hover
		{
			transform: scale(1.1);
		}
		tr
		{
			border: none;
		}
		/*.bs-example{
	font-family: sans-serif;
	position: relative;
	margin: 50px;
}*/
/*.typeahead{*/
	/*border: 2px solid #CCCCCC;
	border-radius: 8px;*/
	/*font-size: 16px;
	height: 40%;*/
	/*line-height: 30px;
	outline: medium none;*/
	/*padding: 8px 12px;*/
	/*width: 90%;*/
	/*border width: 1px solid #CD4FB8;
			text-align: center;
			width: 90%;
			height: 40px;*/
			
/*}*/
.boxa input[type=text]
{
	height: 35px;
	border: none;
}
#my
{
	width: 100%;
	height: 35px;
	text-align: center;
	background-color: white;
	
}
.typeahead {
	background-color: white;
}
.typeahead:focus {
	border: 2px solid #0097CF;
}
.tt-query {
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
	color: #999999;
}
.tt-dropdown-menu {
	background-color: #FFFFFF;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px;
	box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
	margin-top: 12px;
	padding: 8px 0;
	width: 422px;
}
.tt-suggestion {
	font-size: 24px;
	line-height: 24px;
	padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
	background-color: #0097CF;
	color: #FFFFFF;
}
.tt-suggestion p {
	margin: 0;
}
.billbox
		{
			width: 100%;
			height: 140px;
			background: #9ADADC;
		}
		#billgst
		{
			position: relative;
			top: 5px;
			left: 5px;
			background: none;
			border: none;
			font-weight: bold;
			font-size: 14px;
		}
		#billtitle
		{
			position: relative;
			width: 40%;
			top: 5px;
			left: 30%;
			background: none;
			font-weight: bolder;
			font-size: 25px;
			text-align: center;
			border: none;
		}
		#billph
		{
			position: relative;
			width: 50%;
			top: 10px;
			left: 3%;
			background: none;
			border: none;
			font-size: 16px;
			font-weight: bold;
			text-align: center;
		}
		#billad
		{
			position: relative;
			width: 40%;
			top: 10px;
			left: 30%;
			background: none;
			border: none;
			font-size: 18px;
			font-weight: bold;
			text-align: center;
		}
		#billno
		{
			position: relative;
			width: 40%;
			top: 5px;
			left: 10px;
			background: none;
			border: none;
			font-size: 16px;
			font-weight: bold;
			text-align: center;
		}
		#billdate
		{
			position: relative;
			width: 40%;
			top: 8px;
			left: 170px;
			background: none;
			border: none;
			font-size: 16px;
			font-weight: bold;
			text-align: center;
		}
		#print
		{
			width: 100px;
			height: 30px;
			background: #02E1FA;
		}
	</style> 
</head>
<body onmousemove='sum();' > 
	<form method='post' action='#' >
<div class='alla'>
		<h1><center>Sales and Bill</center></h1>
		
		<?php 
		
		if(isset($_POST['print']))
		{
		echo"<div class='containeraa'>
			<div class='boxa'><label>Daily_customer_id:</label><br/>";
		echo "<select name='daily_customer' class='inba' id='dc'>";
		
		while ($d=mysqli_fetch_array($cuid)) 
		{
			echo "<option>".$d['customer_id']."</option>";
		}
		echo "</select></div>";	
			echo"<div class='boxa'><input type='submit' id='go1' value='Add new bill' name='addbill'></div>";
		echo"</div>";
		}
	if (isset($_POST['daily_customer'])) {
		$_SESSION['daily_id']=$_POST['daily_customer'];
	}
		?>
<div class='containeraa'>
		<div class='boxa' id="boxa"><label>bill no:</label><br/><input type='text' class='inba' name='bill_no' readonly='' value="<?php echo $billno; ?>" id="billno"/></div>
		<div class="boxa"><label>Item-code:</label><br/><input type="text" class='inba' name='id' id='my' autocomplete="off" placeholder="enter item code"></div>
		<div class='boxa'><label>Item-name:</label><br/><!-- <input type='text' class='inba' name='id' /> -->
			<input type="text" name="item_name" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Enter the item name" id="my">
		</div>
		
		<div class='boxa'><input type='submit' id='go' value='Add product'></div>
		
</div>
<?php
if(isset($_POST['id'])||isset($_POST['item_name']))
{
	
	if(isset($_POST['id']))
	{
	$sqd="SELECT * FROM item WHERE item_code='$_POST[id]';";
	}
	if($_POST['id']==null)
	{
		$sqd="SELECT * FROM item where item_name='$_POST[item_name]';";
		//echo $_POST['item_name'];
	}
	$sqde=mysqli_query($connection,$sqd);
	// $number=mysqli_num_rows($sqde);
	// if ($number==0) {
	// 	echo "<script>alert('item not found!');</script>";
	// }
	// if (mysqli_num_rows($sqde) == 0)
	//  echo "<script>alert('item not found..please check the id enterd');</script>";
	while($rows=mysqli_fetch_array($sqde)){
	echo "<form method='post' action='#' onsubmit='bill();'>";
	echo"<div class='containeraa'>

	<div class='boxa'><label>Item Code:</label><br/><input type='text' class='inba' name='icode' value=".$rows['item_code']." /></div>
	<div class='boxa'><label>discount:</label><br/><input type='text' class='inba' name='discount' value=0 /></div>
	<div class='boxa'><td><label>Item Name:</label><br/><input type='text' class='inba' name='iname' value=".$rows['item_name']." id='name' /></td></div>
	<div class='boxa'><td><label>Tax(GST)%:</label><br/><input type='text' class='inba' name='tax' value=".$rows['GST']." id='name' /></td></div>
	
</div>
<div class='containeraa'>

	<div class='boxa'><label>Item Description:</label><br/><input type='text' class='inba' name='ides' value=".$rows['item_discription']." /></div>
	<div class='boxa'><label>Item Category:</label><br/><input type='text' class='inba' name='icat' value=".$rows['item_category']."  /></div>
	<div class='boxa'><label>Item Unit:</label><br/><input type='text' class='inba'  value=".$rows['unit']." name='iunit' /></div>
	<div class='boxa'><td><label>Item Quantity:</label><br/><input type='text' class='inba' name='iqu' id=quantity /></td></div>

</div>
<div class='containeraa'>

	<div class='boxa'><label>MRP:</label><br/><input type='text' class='inba' id='mrp' name='mrp' value=".$rows['mrp']." /></div>
		<div class='boxa'><label>Amount</label><br/><input type='text'  class='inba' name='amount' id='total' /></div>
</div>
<div class='blocka'>
	<div class='buttona'><input type='submit' value='Add another' id='submita' name='add'  /></div>
 		
</div></form>";
}
if (isset($_POST['add'])) 
{ 
	// if($temp>1000&&$temp<5000&&)
	// 	{
	// 		$mydiscount=($temp*3/100)+$_POST['discount'];
	// 		echo $mydiscount;
	// 		$du="UPDATE discount SET discount='$mydiscount' where bill_no='$billno';";
	// 		$deu=mysqli_query($connection,$du);
	// 	}
	// 	if($temp>=5000)
	// 	{
	// 		$mydiscount=($temp*6/100)+$_POST['discount'];
	// 		echo $mydiscount;
	// 		$du="UPDATE discount SET discount='$mydiscount' where bill_no='$billno';";
	// 		$deu=mysqli_query($connection,$du);
	// 	}
	// $ded="SELECT rate_of_discount FROM daily_customers WHERE customer_id='$_SESSION[daily_id]';";
	// $dede=mysqli_query($connection,$ded);
	// $dedu=mysqli_fetch_assoc($dede);
	// $deduction=$dedu['rate_of_discount'];
	$sq="SELECT stock FROM item WHERE item_code='$_POST[icode]';";
	$sql=mysqli_query($connection,$sq);
	while ($rows=mysqli_fetch_assoc($sql))
{
	$st=$rows['stock'];
}
	if($_POST['iqu']>$st)
	{
		echo "<script>
		alert('stock is less than need');
		</script>";
	}
	else
	{
		$amount1=$_POST['amount'];
		$amount2=$_POST['tax'];
		$amount3=$amount1*$amount2/100;
		//$deduction2=$_POST['amount']*$deduction/100;
		$discount2=$_POST['discount'];
		$discount3=round($discount2,2);
		$_SESSION["mydiscount"]=$_SESSION["mydiscount"]+$discount2;
		
		$du="UPDATE discount SET discount_given=discount_given+'$discount2' where bill_no='$billno';";
				$deu=mysqli_query($connection,$du);
		//echo $_SESSION["mydiscount"];
	$ssi="INSERT INTO sales_and_bill(bill_no,item_code,item_name,day,item_quantity,mrp,discount,taxamount,amount,unit,customer_id) VALUES ('$billno','$_POST[icode]','$_POST[iname]','$day','$_POST[iqu]','$_POST[mrp]','$discount3','$amount3','$_POST[amount]','$_POST[iunit]','$_SESSION[daily_id]');";
	$se=mysqli_query($connection,$ssi);
	$dq="INSERT into discount(bill_no,day) values ('$billno','$day');";
	$dqe=mysqli_query($connection,$dq);
	//$du="UPDATE discount SET discount=discount+'$discount3' where bill_no='billno';";
	///$deu=mysqli_query($connection,$du);
	$de="DELETE FROM `sales_and_bill` WHERE item_code=0";

	$dex=mysqli_query($connection,$de);
	$s="SELECT * FROM sales_and_bill ORDER BY bill_no DESC LIMIT 1";
	$se=mysqli_query($connection,$s);
	$seq=mysqli_fetch_assoc($se);
	$billno=$seq['bill_no'];
	$upd="UPDATE item SET stock=stock-'$_POST[iqu]' WHERE item_code='$_POST[icode]';";
	$updt=mysqli_query($connection,$upd);
}
}
}
 if(isset($_POST['addbill'])||isset($_POST['print']))
{
	if(isset($_POST['daily_customer'])){
   	$_SESSION['daily_id']=$_POST['daily_customer'];
    $_SESSION['mydiscount']=0;
}
	$s="SELECT * FROM sales_and_bill ORDER BY bill_no DESC LIMIT 1";
	$se=mysqli_query($connection,$s);
	$seq=mysqli_fetch_assoc($se);
	$billno=$seq['bill_no'];
	$check1="SELECT item_code FROM sales_and_bill WHERE bill_no='$billno';";
	$check2=mysqli_query($connection,$check1);
	$check3=mysqli_fetch_assoc($check2);
	//echo $check3['item_code'];
	if($check3['item_code']==0)
	{
		echo "<script>alert('bill cannot be empty!!!!');</script>";
	}
	else
	{
	$billno=$billno+1;
	$ssi="INSERT INTO sales_and_bill(bill_no,customer_id) VALUES ('$billno','$_SESSION[daily_id]')";
	$ex=mysqli_query($connection,$ssi);
	if (isset($_POST['icode'])&&isset($_POST['date'])&&isset($_POST['iname'])&&isset($_POST['mrp'])&&isset($_POST['rate'])&&isset($_POST['amount'])&&isset($_POST['discount'])) 
		{
			$ssi="INSERT INTO sales_and_bill(bill_no,item_code,item_name,day,item_quantity,mrp,discount,amount,unit,customer_id) VALUES ('$billno','$_POST[icode]','$_POST[iname]','$_POST[date]','$_POST[iqu]','$_POST[mrp]','$_POST[discount]','$_POST[amount]','$_POST[iunit]','$_SESSION[daily_id]');";
	        $se=mysqli_query($connection,$ssi);
	        //echo $_POST['iunit'];
			$de="DELETE FROM `sales_and_bill` WHERE item_code=0";
			$dex=mysqli_query($connection,$de);
			$s="SELECT * FROM sales_and_bill ORDER BY bill_no DESC LIMIT 1";
			$se=mysqli_query($connection,$s);
			$seq=mysqli_fetch_assoc($se);
			$billno=$seq['bill_no'];
		// 	if(isset($_POST['print']))
		// 	{
		// 	$_SESSION['daily_id']=0;
		// }
		echo"<script>alert('collect the bill');</script>";

		}
}
}
?>
	
	<div class='bill'>
		<!-- <center><h2>Bill details</h2></center> -->
		<div class="billbox">
	<input type="text" value="GST No:43567787547" id="billgst" readonly=""><br>
	<input type="text" value="Grand Store" id="billtitle" readonly=""><br>
	<input type="text" id="billad" readonly="" value="Adimali">
	<input type="text" value="Ph:0475 45647,45648" id="billph"><br>
	<input type="text" id="billno" value="bill no:<?php echo $billno;?>" readonly="">
	<input type="text" id="billdate" value="Date:<?php echo $day;?>" readonly=""><br>
	<?php 
	if(isset($_SESSION['daily_id']))
		echo "<input type='text' id='billno' value=Customer_id:".$_SESSION['daily_id']." readonly=''>";
	else 
		echo"<input type='text' id='billno' value='Customer_id:0' readonly=''>";
	?>
	<input type="text" id="billdate" value="Payment mode: CASH" readonly="">
</div>
		<div class="container">
	<table style="width 100px;"  cellspacing="" cellpadding="5">
		<tr>
			<th id="hed">Slno</th>
			<th id="hed">Item name</th>
			<th id="hed">Quantity</th>
			<th id="hed">Tax-GST(Rs)</th>
			<th id="hed">MRP(Rs)</th>
			<th id="hed" colspan="2">Total</th>
		</tr>
		
		
		<?php
        
		$slno=1;
		while ($rows=mysqli_fetch_array($data))
		 {
		 	echo "<form action='#' method='post'>";
		 	echo "<tr>";
		 	echo "<td>" .$slno." </td>";
			echo "<td>" .$rows['item_name']. "</td>";
			echo "<td>
			<input type='text' value=" .$rows['item_quantity']."-".$rows['unit']." name='quantity' readonly='' id='gross' ></td>";
			echo "<td>" .$rows['taxamount']." </td>";
			echo "<td>" .$rows['mrp']." </td>";
			
			echo "<td>
			<input type='text' value=".$rows['amount']." id='gross' readonly='' ></td>";
			echo"<input type='hidden' value=".$rows['item_code']." name='item_code'>";
			echo"<td><input type='submit' name='removeitem' value='remove' id='cancela1'></td>";
			echo "</tr></form>";
			$slno+=1;
		}
		// if(isset($_SESSION['daily_id'])==null)
		// {
		// 	$mydiscount=0;
		// }
		if(isset($_SESSION['daily_id'])&&$_SESSION['daily_id']!=0)
		{
			//echo $_SESSION['daily_id'];
			if($temp>1000&&$temp<5000)
			{
				$mydiscount=($temp*3/100);
				//echo $mydiscount;
				$du="UPDATE discount SET discount='$mydiscount' where bill_no='$billno';";
				$deu=mysqli_query($connection,$du);
				//echo $_SESSION["mydiscount"];
			}
			elseif($temp>=5000&&$_SESSION['daily_id']!=0)
			{
				$mydiscount=$temp*6/100;
				//echo $mydiscount;
				$du="UPDATE discount SET discount='$mydiscount' where bill_no='$billno';";
				$deu=mysqli_query($connection,$du);
			}
			else
			{
				$mydiscount=0;
			}
		}
		else
		{
			$mydiscount=0;
			echo $mydiscount;
		}
		?>
		 <tr >
				<td colspan='3' id='gross11' >Total:</td>
				<td id='gross11'><input type='text' id='gross' readonly='' value="<?php echo $taxnet ?>"></td>
				<td id='gross11'><input type='text'  id='gross' readonly='' value="<?php echo $mrpnet ?>"></td>
				<td id='gross11' colspan="2"><input type='text'  id='grossto' readonly='' value="<?php echo $temp ?>"></td>
		</tr>
		<tr><td colspan="3" id="gross1">Discount:</td>
			<td id='gross1'><input type='text' id='gross' readonly='' value="<?php echo $mydiscount ?>"></td>
			<td colspan="3" id="gross1"></td>
		</tr>
		<tr>
			<td colspan="3" id="grt">Net:</td>
			<td id='grt'><input type="text" readonly="" id="grt" value="<?php echo$Netsum ?>Ruppees"></td>
			<td colspan="3" id="gross1"></td>
		</tr>
		<tr>
			<td colspan="7" id="grt"><input type="text" id="words" readonly="" value="<?php echo convert_number_to_words($Netsum).$extend." only/-";?>"></td>
		</tr>
</table>	
		<div class='blockbill'>
	    <div class='buttona'><input type='submit' value='Print bill' id='print' name='print' /></div>
</div>
</div>
</div>
<?php

if (isset($_POST['removeitem']))
		{
			$del="DELETE FROM `sales_and_bill` WHERE item_code='$_POST[item_code]';";
			$delt=mysqli_query($connection,$del);
			$updb="UPDATE item SET stock=stock+'$_POST[quantity]' WHERE item_code='$_POST[item_code]';";
			$updbe=mysqli_query($connection,$updb);
			$billno=$billno+1;
			$_POST['removeitem']=null;
		}
	// if (isset($_POST['print']))
 //    {
	// 	echo "<script>alert('please collect the bill');</script>";
	// 	$_SESSION['bill']+=1;
	// 	echo $_SESSION['bill'];
	// }
 ?>
 <script>
 	 $(document).ready(function(){
    $('input.id').id({
        name: 'id',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
 </script>
</body>
</html>