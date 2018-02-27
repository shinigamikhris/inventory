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


<title>Product</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/application.js" type="text/javascript" charset="utf-8"></script> 
<script src="./js/function.js" type="text/javascript"></script>

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
<li><a href="logout.php">Logout</a></li>
</ul>
</div><!--/­.nav-collapse -->
</div>
</nav>

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small> Products</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">Product</li>
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
          <a href="product.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-folder-open"></span> Product</a>
          <a href="product.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-folder-open"></span> Product</a>
          <a href="vehicle_items.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Vehicle Items</a>
          <a href="order.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Order</a>
          <a href="order_details.php" class="list-group-item"><span class="glyphicon glyphicon-stats"></span> Customer Order Details</a>
          <a href="loss.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Loss</a>
          <a href="sales.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Sales</a>
          <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-off"></span>  Logout</a>
          </div>

        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              
              
            </div>


<div class="panel-body">
<form name ="form1" method="post" action="">
 <?php
    
  if(isset($_POST['calculate']))
  {

  @$quant = $_POST['quant'];

  
  @$quant = $quant;

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

$PurchaseID=mysql_real_escape_string($_POST['PurchaseID']);
$dates=mysql_real_escape_string($_POST['dates']);
$ProductID=mysql_real_escape_string($_POST['ProductID']);
$ProductName=mysql_real_escape_string($_POST['ProductName']);
$SupplierID=mysql_real_escape_string($_POST['SupplierID']);
$quant = $_POST['quant'];

$query2=mysql_query("update product set Quantity = Quantity + '$quant' where ProductID='$ID'");

$query3=mysql_query("insert into purchase values('$PurchaseID','$ProductName','$dates','$quant','$SupplierID')");

if($query3)
{
header('location:purchase.php');
}
}

$query1=mysql_query("select * from product where ProductID='$ID'");
$query2=mysql_fetch_array($query1);
?>

<center>

<fieldset style="width:300px;"><legend>ADD</legend>
<table>

<br>

<tr>
<td>
Product: <td><input type="text" name="ProductName" value="<?php echo $query2['ProductName']; ?>" readonly/></td>
</td>
</tr>

<tr>
    <td> Date Today: </td>
    <td> <input type="text" name="dates" id="txtbox" value="<?php echo "". date("Y/m/d")?>" readonly/> </td>
    </tr>


   <form method="POST">
    <td>Quantity:</td>
    <td><input type="number" min="1" id="txtbox" name="quant" placeholder="Quantity" value="<?php echo @$quant ?>"></td>
    </tr>

<tr><td><label>Supplier:</td><td></label>
    <?php 
    include('config.php');
    $sql=mysql_query("SELECT * FROM supplier");
    if(mysql_num_rows($sql));{
    $select= '<select name="SupplierID">';
    while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['SupplierID'].'">'.$rs['Supplier'].'</option>';

    
        }
    }
    $select.='</select>';
    echo $select;
    ?>


</table>

<br />
<input type="submit" name="submit" value="UPDATE" class="btn btn-warning" />
</form></button>
<?php
}
?>
</fieldset>



<!-- Bootstrap core JavaScript
====================­====================­========== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>