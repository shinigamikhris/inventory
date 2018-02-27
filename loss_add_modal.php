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


<title>LOSS ITEM</title>

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
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small>Loss</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">Loss</li>
    </ol>
  </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
          <a href="home.php" class="list-group-item">
           <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
          </a>
          <a href="user.php" class="list-group-item"><span class="glyphicon glyphicon-user"></span>  User</a>
          <a href="supplier.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Supplier</a>
          <a href="product.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Product</a>
          <a href="vehicle_items.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Vehicle Items</a>
          <a href="order.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Order</a>
          <a href="order_details.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Customer Order Details</a>
          <a href="loss.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-folder-open"></span> Loss</a>
          <a href="sales.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Sales</a>
          <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-off"></span>  Logout</a>
          </div>
  
</div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">LOSS ITEM Overview</h3>
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

$LossID=mysql_real_escape_string($_POST['LossID']);
$dates=mysql_real_escape_string($_POST['dates']);
$ProductID=mysql_real_escape_string($_POST['ProductID']);
$ProductName=mysql_real_escape_string($_POST['ProductName']);
$SellingPrice=mysql_real_escape_string($_POST['SellingPrice']);
$quant = $_POST['quant'];

$query2=mysql_query("update product set Quantity = Quantity - '$quant' where ProductID='$ID'");

$query3=mysql_query("insert into loss values('$LossID','$dates','$ProductID','$ProductName','$SellingPrice','$quant')");

if($query3)
{
header('location:loss_view.php');
}
}

$query1=mysql_query("select * from product where ProductID='$ID'");
$query2=mysql_fetch_array($query1);
?>
<center>
<form method="post" action="">  
<fieldset style="width:300px;"><legend>LOSS ITEM</legend>
<table>
<center>
<br>
<tr>
    <td> Date Today: </td>
    <td> <input type="text" name="dates" id="txtbox" value="<?php echo "". date("Y/m/d")?>" readonly/> </td>
    </tr>

<tr>
  <td>
    Code: <td><input type="text" name="ProductID" value="<?php echo $query2['ProductID']; ?>" readonly /></td>
  </td>
</tr>


<tr>
  <td>
    Product: <td><input type="text" name="ProductName" value="<?php echo $query2['ProductName']; ?>" readonly /></td>
  </td>
</tr>

<tr>
<td>
SellingPrice: <td><input type="text" name="SellingPrice" value="<?php echo $query2['SellingPrice']; ?>" readonly /></td>
</td>
</tr>


   <form method="POST">
    <td>Quantity:</td>
    <td><input type="number" id="txtbox" min="0" name="quant" placeholder="Quantity" value="<?php echo @$quant ?>"></td>
    </tr>
    <tr>


</table>

<input type="submit" name="submit" value="UPDATE" />
</form>
<?php
}
?>
</fieldset>