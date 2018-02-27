</SCRIPT>
<link rel="stylesheet" type="text/css" href="mystyles.css">
<?php
session_start();
if($_SESSION['logged'] != 'true'){
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Com­patible" content="IE=edge">
<meta name="viewport" content="width=devic­e-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">


<title>ORDER</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-default">
<div class="container">
<div class="navbar-header­">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Admin Strap</a>
</div>
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="home.php">Dashboard</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="#">Welcome, Admin</a></li>
<li><a href="login.html">Logout</a></li>
</ul>
</div><!--/­.nav-collapse -->
</div>
</nav>

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small>Order</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">Order</li>
    </ol>
  </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
          <a href="cashier1.php" class="list-group-item main-color-bg"><span class="glyphicon glyphicon-pencil"></span> Cashier</a>
          <a href="cashier_orderdetails.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span>  Customer Order Details</a>
          <a href="logout.php" class="list-group-item">Logout</a>
          </div>
  
</div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">ORDER Overview</h3>
            </div>

            <div class="panel-body">
              <table class="table table-striped table-hover">
                        <tr>

   <form method="POST">
 <?php
    
  if(isset($_POST['calculate']))
  {
  @$SellingPrice = $_POST['SellingPrice'];
  @$quant = $_POST['quant'];
  @$Total = $_POST['Total'];
  @$OriginalPrice = $_POST['OriginalPrice'];
  
  @$quant = $quant;
  @$Total = $SellingPrice * $quant;
  }
  
    ?>
<?php
include('config.php');

$ID = $_GET['ID'];
$query2 = "SELECT * from product where ProductID = '$ID'";

{
$ID=$_GET['ID'];
if(isset($_POST['submit']))
{

$ProductID = $_GET['ID'];
  
$query3 = "SELECT Quantity from product where ProductID = '$ID'";

$order_id=mysql_real_escape_string($_POST['order_id']);
$dates=mysql_real_escape_string($_POST['dates']);
$ProductID=mysql_real_escape_string($_POST['ProductID']);
$ProductName=mysql_real_escape_string($_POST['ProductName']);
$Code=mysql_real_escape_string($_POST['Code']);
$Description=mysql_real_escape_string($_POST['Description']);
$SellingPrice=mysql_real_escape_string($_POST['SellingPrice']);
$Size=mysql_real_escape_string($_POST['Size']);
$Type=mysql_real_escape_string($_POST['Type']);
$Brand=mysql_real_escape_string($_POST['Brand']);
$Total=mysql_real_escape_string($_POST['Total']);
$quant = $_POST['quant'];

$query2=mysql_query("update product set Quantity = Quantity - '$quant' where ProductID='$ID'");

$query3=mysql_query("insert into sales values('$order_id','$dates','$Code','$ProductName','$Description','$SellingPrice','$quant','$Total')");

if($query3)
{
header('location:cashier1.php');
}
}

$query1=mysql_query("select * from product where ProductID='$ID'");
$query2=mysql_fetch_array($query1);
?>
<center>
<form method="post" action="">
<fieldset style="width:300px;"><legend>YOU CAN ORDER HERE</legend>
<table>

<tr>
    <td> Date Today: </td>
    <td> <input type="text" name="Dates" id="txtbox" value="<?php echo "". date("Y/m/d")?>" readonly/> </td>
    </tr>

<tr>
  <td>
    Code: <td><input type="text" name="Code" value="<?php echo $query2['Code']; ?>" readonly /></td>
  </td>
</tr>


<tr>
  <td>
    Product: <td><input type="text" name="ProductName" value="<?php echo $query2['ProductName']; ?>" readonly /></td>
  </td>
</tr>

<tr>
<td>
Description: <td><input type="text" name="Description" value="<?php echo $query2['Description']; ?>" readonly /></td>
</td>
</tr>

<tr>
<td>
Price: <td><input type="text" name="SellingPrice" value="<?php echo $query2['SellingPrice']; ?>" readonly/></td>
</td>
</tr>

<tr>
<td>
Size: <td><input type="text" name="Size" value="<?php echo $query2['Size']; ?>" readonly/></td>
</td>
</tr>

<tr>
<td>
Type: <td><input type="text" name="Type" value="<?php echo $query2['Type']; ?>" readonly/></td>
</td>
</tr>

<tr>
<td>
Brand: <td><input type="text" name="Brand" value="<?php echo $query2['Brand']; ?>" readonly/></td>
</td>
</tr>

   <form method="POST">
    <td>Quantity:</td>
    <td><input type="number" id="txtbox" min="0" name="quant" placeholder="Quantity" value="<?php echo @$quant ?>"></td>
    </tr>
    <tr>
    <td>Total:</td>
    <td><input type="text" id="txtbox" name="Total" value="<?php echo @$Total ?>" readonly></td>
    <td><input type="submit" name="calculate" value="Compute" id="btncalc"></td>
    </tr> 

</table>
</center>
<br>

<center><input type="submit" name="submit" value="UPDATE" class="btn btn-success" />
<a href="cashier1.php" class="btn btn-warning">CANCEL</a></center>
</form>
<?php
}
?>
</fieldset>
</body>
</html>