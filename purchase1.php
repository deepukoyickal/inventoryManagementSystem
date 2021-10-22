<?php 
include('connection.php');
$sq="SELECT item_code,item_name,unit,stock FROM item;";
$se=mysqli_query($connection,$sq);
$id=null;
$supp="SELECT * FROM suppliers;";
	$suppli=mysqli_query($connection,$supp);
//$_POST['new']=null;
//$_POST['addnewitem']=null;
?>
<!DOCTYPE html>
<html>
<head>
	<title>purchase</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/typeahead.min.js"></script>
	<script>
     $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'pcode',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    function update()
    {
    	$( ".stock" ).load(window.location.href + " .stock" );
    	alert('success');
    }
			function sum()
		{
			var x=document.getElementById('prate').value;
			var y=document.getElementById('quantity').value;
			var sum=x*y;
			document.getElementById('sum').value=sum;
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
		}
	</script>
	<style type="text/css">
		.allinone
		{
			position: absolute;
			top: 5%;
			left: 10%;
			width: 40%;
			background-image: linear-gradient(-90deg,#0D80FB,#E7ECF2,#0D80FB );
		}
		.containeroneone
		{
			position: relative;
			top: 10%;
			width: 90%;
			padding: 10px;
			margin: 10px auto;
			background-image: linear-gradient(-90deg,#EF68D8,#D281C4,#EF68D8 );
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.boxoneone
		{
			width: 200px;
			height: 60px;
			align-content: center;
			background:#27E1CC;
			margin: 0px;
			transition: .1s;
			text-align: center;
		}
		/*.boxoneone:hover
		{
			transform: scale(1.1);
			z-index: 2;
			border-radius: 10px;
			font-weight: bolder;
			box-shadow: 2px 2px 2px #000;
		}*/
		.button
		{
		width: 200px;
			height: 25px;
			align-content: center;
			background:none;
			margin: 10px;
			transition: .1s;
			text-align: center;	

		}
		#submit,#cancel,#update
		{
			width: 100%;
			height: 30px;
			border-radius: 15px;
			border-width: 0;
			font-family: timesnewroman;
			font-weight: bold;

		}
		#submit:hover,#cancel:hover,#update:hover
		{
			transform: scale(1.1);
			z-index: 2;
			font-weight: bolder;
		}
		#submit
		{
			background-color: #08F60F;
		}
		#cancel
		{
			background-color: #FD072C;
		}
		#update
		{
			background-color: #0769FD;
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
			border width: 1px solid #CD4FB8;
			text-align: center;
			width: 90%;
			height: 40%;
		}
		.stock
		{
			position: absolute;
			left: 55%;
			top: 5%;
			width: 600px;
			height: auto;
			/*background-image: linear-gradient(-90deg,#02aab0,#00cdac );*/
			background: #C5EDEA;
		}
		#table td,#table th
		{
			text-align: center;

		}
		
		#current
		{
			background: #03FD3D; 
			font-weight: bold;
			font-size: 25px;
		}
		#se
		{
			height: 50%;
			text-align: right;
		}
		#hed
		{
			background-image: linear-gradient(-90deg,#0D80FB,#E7ECF2,#0D80FB );
			height: 40px;
		}
		#hed1
		{
			background: #2E2796;
			height: 40px;
		}
		.boxoneone input[type=text]
{
	height: 25px;
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
	</style>
</head>
<body onmousemove='sum();' >
	<?php
	echo"<div class='allinone'>
		<center><h2>Purchase Items</h2></center>
		<form method='post'>
		<div class='containeroneone'>
			
			<div class='boxoneone'>
				<label>Enter the product code</label><br/>";
				// echo "<select class='inb' name='pcode2' id='se' >";
				// //echo "<option selected=none></option>";
				// while($rows=mysqli_fetch_array($se))
				// {
				// 	echo "<option>" .$rows['item_code']." </option>";
				// }
				// echo "</select>";
				echo"<input type='text' name='pcode' class='typeahead tt-query' autocomplete='on' spellcheck='false' placeholder='Enter the item code' id='my'>";
				echo"</div>
		</div>
		<div class='block'>
			<div class='button'><input type='submit' value='Add Stock' id='submit' name='add' /></div>
			<div class='button'><input type='submit' value='Remove an item' id='submit' name='remove' /></div>
 			<div class='button'><input type='submit' value='Add a new item' id='submit' name='new' /></div>

		</div>
	</form>";
	if(isset($_POST['add']))
	{
		if($_POST['pcode']==null)
		{
			$sql="SELECT * FROM item WHERE item_code='$_POST[pcode2]';";
			// 
			echo "<script>alert('product code cannot be empty');</script>";
		}
		else
		{
			$sql="SELECT * FROM item WHERE item_code='$_POST[pcode]';";
			$id=$_POST['pcode'];
				
		$sew=mysqli_query($connection,$sql);
		
		while($re=mysqli_fetch_array($sew))
		{
			$stax="SELECT GST FROM item where item_code='$id';";
			$staxe=mysqli_query($connection,$stax);
			$sstax=mysqli_fetch_assoc($staxe);
			$tax=$sstax['GST'];
	echo"<form method='post'><div class='containeroneone'>
	<div class='boxoneone'>
	    <input type='hidden' name='day' id='day'>
	    <input type='hidden' name='id' value=".$id." >
		<label>Item Name</label><br/><input type='text' class='inb' name='pname' value=".$re['item_name']." />
	</div>
	<div class='boxoneone'>
		<label>Item Description</label><br/><input type='text' class='inb' name='pdescription' value=".$re['item_discription']." />
	</div>
	<div class='boxoneone'>
		<label>Item Category</label><br/><input type='text' class='inb' name='pcategory' value=".$re['item_category']." /></div>
		<div class='boxoneone'>
		<label>Expiry Date</label><br/><input type='date' class='inb' name='mfd' /></div>
</div>
<div class='containeroneone'>
	
	<div class='boxoneone'>
		<label>Item Unit</label><br/><input type='text' class='inb' name='punit' value=".$re['unit']." /></div>
		<div class='boxoneone'><label>Supplier Name</label><br/><input type='text' class='inb' name='sname' value=".$re['supplier_name']." />";
		echo"</div>
	<div class='boxoneone'>
		<label>Item quantity</label><br/><input type='text' class='inb' id='quantity' name='quantity' />
	</div>
	<div class='boxoneone'>
		<label>Tax(GST)%</label><br/>
		<input type='text' class='inb' value=".$tax."% >
	</div>
</div>
<div class='containeroneone'>
	<div class='boxoneone'>
		<label>MRP</label><br/><input type='text' class='inb' name='mrp' value=".$re['mrp']." />
	</div>
	<div class='boxoneone'>
		<label>Purchase Rate</label><input type='text' class='inb' name='prate' id='prate' /></div>
	<div class='boxoneone'>
		<label>Amount</label><br/><input type='text' class='inb' name='amount' id='sum' />
	</div>
</div>
	<div class='block'>
		<div class='button'><input type='submit' value='Add item' id='submit' name='additem' onclick='refresh();' /></div>
 		<div class='button'><input type='reset' value='Cancel item' id='cancel'/></div>
	</div>
</div>
</form>";
}
}
if ($_POST['pcode']==null&&isset($_POST['supplier'])) {
	//echo "success";
}
}
if(isset($_POST['remove']))
{
	if($_POST['pcode']==null)
		{
			$sql="SELECT * FROM item WHERE item_code='$_POST[pcode2]';";
			// 
			echo "<script>alert('product code cannot be empty');</script>";
		}
		else
		{
			$sql="SELECT * FROM item WHERE item_code='$_POST[pcode]';";
			$id=$_POST['pcode'];
				
		$sew=mysqli_query($connection,$sql);
		
		while($re=mysqli_fetch_array($sew))
		{ 
	echo"<form method='post'><div class='containeroneone'>
	<div class='boxoneone'>
	    <input type='hidden' name='day' id='day'>
	    <input type='hidden' name='id' value=".$id." >
		<label>Item Name</label><br/><input type='text' class='inb' name='pname' value=".$re['item_name']." />
	</div>
	<div class='boxoneone'>
		<label>Item Description</label><br/><input type='text' class='inb' name='pdescription' value=".$re['item_discription']." />
	</div>
	<div class='boxoneone'>
		<label>Item Category</label><br/><input type='text' class='inb' name='pcategory' value=".$re['item_category']." /></div>
</div>
<div class='containeroneone'>
	
	<div class='boxoneone'>
		<label>Item Unit</label><br/><input type='text' class='inb' name='punit' value=".$re['unit']." /></div>
		<div class='boxoneone'><label>Supplier Name</label><br/><input type='text' class='inb' name='sname' value=".$re['supplier_name']." />";
		echo"</div>
	<div class='boxoneone'>
		<label>Removing quantity</label><br/><input type='text' class='inb' id='quantity' name='requantity' />
	</div>
</div>
	<div class='block'>
		<div class='button'><input type='submit' value='Proceed' id='submit' name='removeitem' onclick='update();' /></div>
 		<div class='button'><input type='reset' value='Cancel' id='cancel'/></div>
	</div>
</div>
</form>";
}
}
}
if(isset($_POST['new']))
{
	$it="SELECT * FROM item ORDER BY item_code DESC LIMIT 1;";
	$ite=mysqli_query($connection,$it);
	$set=mysqli_fetch_assoc($ite);
	$icd=$set['item_code'];
	$icd=$icd+1;
	$supp="SELECT * FROM suppliers;";
	$suppli=mysqli_query($connection,$supp);
	echo"<form method='post' action='#'><div class='containeroneone'>
	<div class='boxoneone'>
	<input type='hidden' name='day' id='day'>
		<label>Item Code</label><br/><input type='text' class='inb' name='item_code' value=".$icd." readonly=''  />
	</div>
	<div class='boxoneone'>
		<label>Item Name</label><br/><input type='text' class='inb' name='item_name' />
	</div>
	<div class='boxoneone'>
		<label>Expiry Date</label><br/><input type='date' class='inb' name='mfd' /></div>
	<div class='boxoneone'>
		<label>Item Description</label><br/><input type='text' class='inb' name='description'  />
	</div>
	<div class='boxoneone'>
		<label>Item Category</label><br/>";
		$cat="SELECT DISTINCT item_category from item";
		$cate=mysqli_query($connection,$cat);
		echo "<select class='inb' name='category'>";
		while($ro=mysqli_fetch_array($cate))
			{
				echo "<option>".$ro['item_category']."</option>";
			}
			echo"</select></div>
</div>
<div class='containeroneone'>
	
	<div class='boxoneone'>
		<label>Item Unit</label><br/><select name='unit' class='inb' id='se'>
		<option>Kg</option>
		<option>Nos</option>
		<option>Mtr</option></select></div>
		<div class='boxoneone'><label>Supplier Name</label><br/>
		<select class='inb' name='supplier_name'>";
		while($rows2=mysqli_fetch_assoc($suppli)) {
			echo "<option>".$rows2['supplier_name']."</option>";
		}
		echo"</select>";
		echo"</div>";
	echo"<div class='boxoneone'>
		<label>Item quantity</label><br/><input type='text' class='inb' id='quantity' name='item_quantity' />
	</div>
	<div class='boxoneone'>
		<label>Tax(GST)%</label><br/>
	
	<select class='inb' name='tax'>
			<option>5%</option>
			<option>12%</option>
			<option>18%</option>
			<option>28%</option>
		</select>
		</div>
</div>
<div class='containeroneone'>
	<div class='boxoneone'>
		<label>MRP</label><br/><input type='text' class='inb' name='mrp' />
	</div>
	<div class='boxoneone'>
		<label>Purchase Rate</label><input type='text' class='inb' name='prate' id='prate' /></div>
	<div class='boxoneone'>
		<label>Amount</label><br/><input type='text' class='inb' name='amount' id='sum' />
	</div>
</div>
	<div class='block'>
		<div class='button'><input type='submit' value='Add item' id='submit' name='addnewitem' /></div>
 		<div class='button'><input type='reset' value='Cancel item' id='cancel'/></div>
	</div>
</div>
</form>";
}
if(isset($_POST['addnewitem'])&&isset($_POST['mfd']))
{
	$icode=$_POST['item_code'];
	$iname=$_POST['item_name'];
	$des=$_POST['description'];
	$tax=$_POST['tax'];
	$cat=$_POST['category'];
	$sname=$_POST['supplier_name'];
	$da=$_POST['day'];
	$mr=$_POST['mrp'];
	$prate=$_POST['prate'];
	$uni=$_POST['unit'];
	$qu=$_POST['item_quantity'];
	echo $qu;
	$p="SELECT * FROM item ORDER BY p_id DESC LIMIT 1;";
	$se=mysqli_query($connection,$p);
	$seq=mysqli_fetch_assoc($se);
	$pid=$seq['p_id'];
	
	$pid=$pid+1;
	$pd="SELECT * FROM purchase ORDER BY purchase_id DESC LIMIT 1;";
	$sed=mysqli_query($connection,$pd);
	$seqd=mysqli_fetch_assoc($sed);
	$pcd=$seqd['Purchase_Id'];
	$pcd=$pcd+1;
	$ins="INSERT INTO `item`( `p_id`,`item_code`, `item_name`, `item_discription`,`GST`, `item_category`,`supplier_name`, `date`, `mrp`, `rate`, `unit`, `stock`) VALUES ('$pid','$icode','$iname','$des','$tax','$cat','$sname','$da','$mr','$prate','$uni','$qu');";
	$inse=mysqli_query($connection,$ins);
	if($inse)
		echo "success";
	else
		echo "failed";
	$new="INSERT INTO `purchase` (`Purchase_Id`, `Date`, `expiry`, `Item_Code`, `Supplier_Name`, `Item_Name`, `Item_Description`, `Item_category`, `Item_Unit`, `Item_Quantity`, `MRP`, `Purchase_Rate`, `Amount`) VALUES ('$pcd','$_POST[day]','$_POST[mfd]','$_POST[item_code]','$_POST[supplier_name]','$_POST[item_name]','$_POST[description]','$_POST[category]','$_POST[unit]','$_POST[item_quantity]','$_POST[mrp]','$_POST[prate]','$_POST[amount]');";
	$newd=mysqli_query($connection,$new);
	if($inse)
		echo "<script>alert('inserted');</script>";
	else
		echo "<script>alert('couldn't insert');</script>";
}
echo"</div>";
echo"<div class='stock' >
	<table border='1' style='width: 100%;' cellpadding='3' cellspacing='3' id='table'>
		<tr>
		<th colspan=3 id='hed'>Stock details</th>
		</tr>
		<tr id='hed1'>
			<th>Item code</th>
			<th>Item name</th>
			<th>Stock</th>
		</tr>";
		$sto="SELECT * FROM item WHERE item_code!='$id';";
		$stoc="SELECT * FROM item WHERE item_code='$id';";
		$sew=mysqli_query($connection,$stoc);
		$stock=mysqli_query($connection,$sto);
		echo"<tr id='current'>";
			while ($re=mysqli_fetch_array($sew))
		    {
				echo"<td>".$re['item_code']."</td>
				<td>".$re['item_name']."</td>
				<td>".$re['stock'].$re['unit']."</td>";
			}
		echo"</tr>";
		while ($rows2=mysqli_fetch_array($stock))
		 {
			echo "<tr>
				<td>".$rows2['item_code']."</td>
				<td>".$rows2['item_name']."</td>";
				//<td>".$rows2['stock'].$rows2['unit']."</td>
				if($rows2['stock']<100)
				{
					echo"<td style='background:#FA0F36' id='stock'>".$rows2['stock'].$rows2['unit']."</td>";
					//echo "<script>changeColor();</script>";
				}
				else
				{
					echo"<td>".$rows2['stock'].$rows2['unit']."</td>";
				}
				  echo"</tr>";

		}
		
	echo"</table>";
	//echo $id;
echo"</div>";

if(isset($_POST['additem'])!=null)
{
	//echo $id;
	$pd="SELECT * FROM purchase ORDER BY purchase_id DESC LIMIT 1;";
	$sed=mysqli_query($connection,$pd);
	$seqd=mysqli_fetch_assoc($sed);
	$pcd=$seqd['Purchase_Id'];
	$pcd=$pcd+1;
	//echo $pcd;
	$up="UPDATE item SET stock=stock+'$_POST[quantity]' WHERE item_code='$_POST[id]';";
	$upd=mysqli_query($connection,$up);
	$ins="INSERT INTO `purchase` (`Purchase_Id`, `Date`, `expiry`, `Item_Code`, `Supplier_Name`, `Item_Name`, `Item_Description`, `Item_category`, `Item_Unit`, `Item_Quantity`, `MRP`, `Purchase_Rate`, `Amount`) VALUES ('$pcd','$_POST[day]','$_POST[mfd]','$_POST[id]','$_POST[sname]','$_POST[pname]','$_POST[pdescription]','$_POST[pcategory]','$_POST[punit]','$_POST[quantity]','$_POST[mrp]','$_POST[prate]','$_POST[amount]');";
	$inse=mysqli_query($connection,$ins);

	if($upd)
		echo"<script>alert('updated');</script>";
	else
		echo "<script>alert('cannot update the stock');</script>";

//header("Refresh:0");

	echo"<div class='stock' >
	<table border='1' style='width: 100%;' cellpadding='3' cellspacing='3' id='table'>
		<tr>
		<th colspan=3 id='hed'>Stock details</th>
		</tr>
		<tr id='hed1'>
			<th>Item code</th>
			<th>Item name</th>
			<th>Stock</th>
		</tr>";
		//echo $id;
		$sto="SELECT * FROM item WHERE item_code!='$id';";
		$stoc="SELECT * FROM item WHERE item_code='$id';";
		$sew=mysqli_query($connection,$stoc);
		$stock=mysqli_query($connection,$sto);
		echo"<tr id='current'>";
			while ($re=mysqli_fetch_array($sew))
		    {
				echo"<td>".$re['item_code']."</td>
				<td>".$re['item_name']."</td>
				<td>".$re['stock'].$re['unit']."</td>";
			}
		echo"</tr>";
		while ($rows2=mysqli_fetch_array($stock))
		 {
			echo "<tr>
				<td>".$rows2['item_code']."</td>
				<td>".$rows2['item_name']."</td>";
				if($rows2['stock']<100)
				{
					echo"<td style='background:#FA0F36' id='stock'>".$rows2['stock'].$rows2['unit']."</td>";
					//echo "<script>changeColor();</script>";
				}
				else
				{
					echo"<td>".$rows2['stock'].$rows2['unit']."</td>";
				}
				  echo"</tr>";

		}
		
	echo"</table>";
echo"</div>";
echo "<script>
		alert('stock added');
		</script>";
}
if(isset($_POST['removeitem']))
{

	$updb="UPDATE item SET stock=stock-'$_POST[requantity]' WHERE item_code='$_POST[id]';";
			$updbe=mysqli_query($connection,$updb);
}
?>
</body>
</html>