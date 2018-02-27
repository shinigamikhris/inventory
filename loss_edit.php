<html>
<body>
<link rel="stylesheet" type="text/css" href="mystyles.css">
<?php
session_start();
if($_SESSION['logged'] != 'true'){
  header('location:login.php');
}
?>

<script type="text/javascript">
function confirmation(){
	return confirm('Are you sure you want to delete the record?');
}
</script>
<br>
<br><center>
<table cellpadding='0' cellspacing='0' class='db-table table-bordered'>
<tr>
	<th><a href="users.php">User</a></th>
	<th><a href="employee.php">Employee</a></th>
	<th><a href="customer.php">Customer</a></th>
	<th><a href="product.php">Product</a></th>
	<th><a href="sales.php">Sales</a></th>
	<th><a href="supplier.php">Supplier</a></th>
	<th><a href="loss.php">Loss Item</a></th>
	<th><a href="orders.php">Order</a></th>
	<th><a href="logout.php">Log Out</a></th>
</td>
	</td>
</tr>
</table>
</center>
<hr/>
<br/>
<div>
<center>
<?php
include('config.php');
if(isset($_GET['ID']))
{
$ID=$_GET['ID'];
if(isset($_POST['submit']))
{
$LossID=$_POST['LossID'];
$dates=$_POST['dates'];
$ProductID=$_POST['ProductID'];
$ProductName=$_POST['ProductName'];
$SellingPrice=$_POST['SellingPrice'];
$Quantity=$_POST['Quantity'];

$query3=mysql_query("update loss set LossID='$LossID', dates='$dates',ProductID='$ProductID',ProductName='ProductName',SellingPrice='$SellingPrice',Quantity='$Quantity', LossID='$ID'");
if($query3)
{
header('location:loss.php');
}
}
$query1=mysql_query("select * from loss where LossID='$ID'");
$query2=mysql_fetch_array($query1);
?>

<center>
<form method="post" action="">
<fieldset style="width:300px;"><legend>UPDATE LOSS</legend>
<table>

<br>
<tr>
<tr><td><label>LossID:</td><td></label>
		<?php 
		include('config.php');
		$sql=mysql_query("SELECT * FROM loss");
		if(mysql_num_rows($sql));{
		$select= '<select name="LossID">';
		while($rs=mysql_fetch_array($sql)){
	    $select.='<option value="'.$rs['LossID'].'">'.$rs['LossID'].'</option>';
	  		}
		}
		$select.='</select>';
		echo $select;
		?>


<tr>
<td>
dates: <td><input type="date" name="dates" value="<?php echo $query2['dates']; ?>" /></td>
</td>
</tr>


<tr>
<td>
ProductID: <td><input type="text" name="ProductID" value="<?php echo $query2['ProductID']; ?>" /></td>
</td>
</tr>

<tr>
<td>
ProductName: <td><input type="text" name="ProductName" value="<?php echo $query2['ProductName']; ?>" /></td>
</td>
</tr>

<tr>
<td>
SellingPrice: <td><input type="text" name="SellingPrice" value="<?php echo $query2['SellingPrice']; ?>" /></td>
</td>
</tr>


<tr>
<td>
Quantity: <td><input type="text" name="Quantity" value="<?php echo $query2['Quantity']; ?>" /></td>
</td>
</tr>


<br />
<input type="submit" name="submit" value="UPDATE" />
</form>
<?php
}
?>
</fieldset>
</body>
</html>