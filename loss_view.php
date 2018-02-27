
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


<title>Loss Item</title>

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
          <a href="user.php" class="list-group-item ">User</a>
          <a href="employee.php" class="list-group-item ">Employee</a>
          <a href="customer.php" class="list-group-item">Customer</a>
          <a href="orderdetails.php" class="list-group-item">Customer Order Details</a>
          <a href="product.php" class="list-group-item">Product</a>
          <a href="vehicle.php" class="list-group-item">Vehicle</a>
          <a href="sales.php" class="list-group-item">Sales</a>
          <a href="supplier.php" class="list-group-item ">Supplier</a>
          <a href="loss.php" class="list-group-item active main-color-bg">Loss Item</a>
          <a href="order.php" class="list-group-item ">Order</a>
          <a href="logout.php" class="list-group-item">Logout</a>
          </div>
  
</div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Loss Overview
              <a href="loss.php" class="btn btn-primary btn-sm" style="float: right;">Add more loss item</a>
            
</h3>
<br>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                        <tr>

<?php
include('config.php');

$query1=mysql_query("select * from loss"); 

echo "<table class='table table-striped table-hover'>
  <tr>
  <th>ID</th>  
  <th>Date</th>
  <th>Code</th>
  <th>ProductName</th>
  <th>SellingPrice</th>
  <th>Quantity</th>
  </tr>";

while($query2=mysql_fetch_array($query1))
{
echo "<td>".$query2['LossID']."</td>";
echo "<td>".$query2['dates']."</td>";
echo "<td>".$query2['ProductID']."</td>";
echo "<td>".$query2['ProductName']."</td>";
echo "<td>".$query2['SellingPrice']."</td>";
echo "<td>".$query2['Quantity']."</td></tr>";
}
?>
</table> 
</div>                      
</body>
</html>