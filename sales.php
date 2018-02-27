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


<title>Sales</title>

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
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small> Users</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">Sales</li>
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
          <a href="supplier.php" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> Supplier</a>
          <a href="product.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Product</a>
          <a href="purchase.php" class="list-group-item"><span class="glyphicon glyphicon-folder-close"></span> Purchase</a>
          <a href="vehicle_items.php" class="list-group-item"><span class="glyphicon glyphicon-file"></span> Vehicle Items</a>
          <a href="order.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Order</a>
          <a href="order_details.php" class="list-group-item"><span class="icon-group icon-2x"></span> Customer Order Details</a>
          <a href="loss.php" class="list-group-item"><span class="glyphicon glyphicon-eye-close"></span> Loss Items</a>
          <a href="sales.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-folder-open"></span> Sales</a>
          <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-off"></span>  Logout</a>
        
          </div>

        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Sales Overview
            </div>

            <div class="panel-body">
              <table class="table table-striped table-hover">
                        <tr>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">
      
      <tr>
      <form action="salesprint.php" method="get" ecntype="multipart/data-form">
        <td width="48%" height="37" align="right"><input type="date" name="d1" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="From Eg.2015-05-13" required /></td>
        <td width="15%" align="left"> <input type="date" name="d2" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="To Eg.2015-06-13" required  /> </td>
        <td width="0%" align="left"><input type="submit" id="btnsearch" class="btn btn-info" value="Search" name="search" /></td>
        </form>
      </tr>
    
    </table></th>
  </tr>
  
  <br>

<br>

<table  class='table table-striped table-hover'>
  <thead>

    <th> <strong>Date</strong>
    <th> <strong>Code</strong>
    <th> <strong>Item</strong>
    <th> <strong>Description</strong>
    <th> <strong>Quantity Sold</strong>
    <th> <strong>SellingPrice</strong>
    <th> <strong>Total Sales</strong>
  </thead>

<center>
 <?php
require('config.php');

if(isset($_GET['search'])){
      $d1 = $_GET['d1'];
      $d2 = $_GET['d2'];

$query1=mysql_query("SELECT * FROM sales WHERE dates BETWEEN '$d1' and '$d2'"); 

while($query2=mysql_fetch_array($query1))
{

echo "<td>".$query2['dates']."</td>";
echo "<td>".$query2['ProductID']."</td>";
echo "<td>".$query2['ProductName']."</td>";
echo "<td>".$query2['Description']."</td>";
echo "<td>".$query2['Quantity']."</td>";
echo "<td>".$query2['SellingPrice']."</td>";
echo "<td>".$query2['Total']."</td></tr>";
}
}
?>
</table> 
                        <br>
                        <br>
<?php

require('config.php');

if(isset($_GET['search'])){
      $d1 = $_GET['d1'];
      $d2 = $_GET['d2'];
                            $result = mysql_query("SELECT sum(Total) FROM sales where dates BETWEEN '$d1' and '$d2'") or die(mysql_error());
                            while ($query2 = mysql_fetch_array($result)) {
                                ?>

                                <div class="pull-right">
                                    <div class="span"><div class="alert alert-danger"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount:&nbsp;<b style="color:red; font-size:18px;"><?php echo $query2['sum(Total)']; ?></b></div></div>
                                </div>
                            <?php }
                          }
                            ?>
</div>    

<!-- Bootstrap core JavaScript
====================­====================­========== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>