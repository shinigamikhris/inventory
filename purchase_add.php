<?php include 'config.php' ?>
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


<title>Users Edit</title>

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
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small> Users Edit</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">User Edit</li>
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
          <a href="user.php" class="list-group-item  active main-color-bg"><span class="glyphicon glyphicon-user"></span>  User</a>
          <a href="supllier.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Supplier</a>
          <a href="product.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Product</a>
          <a href="vehicle_items.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Vehicle Items</a>
          <a href="order.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Order</a>
          <a href="order_details.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Customer Order Details</a>
          <a href="sales.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Sales</a>
          <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-off"></span>  Logout</a>
          </div>

        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Users Edit Overview</h3>
            </div>


<center>

   <form method="POST">
<?php
    
  if(isset($_POST['calculate']))
  {

  @$quant = $_POST['quant'];

  
  @$quant = $quant;

  }
  
?>
</form>
</center>

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






<?php
include('config.php');
if(isset($_GET['ID']))
{
$ID=$_GET['ID'];
if(isset($_POST['submit']))
{
$code=$_POST['code'];
$productname=$_POST['productname'];
$quantity=$_POST['quantity'];
$sellingprice=$_POST['sellingprice'];
$originalprice=$_POST['originalprice'];
$size=$_POST['size'];
$type=$_POST['type'];
$brand=$_POST['brand'];

$query3=mysql_query("update product set code='$code' , productname='$productname' , quantity='$quantity', sellingprice='$sellingprice' , originalprice='$originalprice', size='$size', type='$type' ,brand='$brand' where product_id='$ID'");
if($query3)
{
header('location:product.php');
}
}
$query1=mysql_query("select * from product where product_id='$ID'");
$query2=mysql_fetch_array($query1);
?>

<center>
<form method="post" action="">
<br>
<fieldset style="width:300px;"><legend>UPDATE PRODUCT</legend>
<table>

<tr>
<td>
Code: <td><input type="text" name="code" value="<?php echo $query2['code']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Product: <td><input type="text" name="productname" value="<?php echo $query2['productname']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Quantity: <td><input type="text" name="quantity" value="<?php echo $query2['quantity']; ?>" disabled/></td>
</td>
</tr>

<tr>
<td>
Sell Price: <td><input type="text" name="sellingprice" value="<?php echo $query2['sellingprice']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Orig Price: <td><input type="text" name="originalprice" value="<?php echo $query2['originalprice']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Size: <td><input type="text" name="size" value="<?php echo $query2['size']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Type: <td><input type="text" name="type" value="<?php echo $query2['type']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Brand: <td><input type="text" name="brand" value="<?php echo $query2['brand']; ?>" /></td>
</td>
</tr>

</table>

<br />
<input type="submit" name="submit" value="UPDATE" class="btn btn-success"/>
<a href="product.php" class="btn btn-warning"/>CANCEL</a>
</form>
<?php
}
?>
</fieldset>
<br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- Bootstrap core JavaScript
====================­====================­========== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>