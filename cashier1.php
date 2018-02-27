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
<script src="js/argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
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
<li><a href="#">Welcome, User</a></li>
<li><a href="login.html">Logout</a></li>
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
      <li class="active">Cahier's Page - Product</li>
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
              <h3 class="panel-title">Product Overview
                
                </h3>
              <br>
            </div>

<div class="panel-body">
<form name ="form1" method="post" action="">
<div id="search">
<td><label for="filter"> Search </label> 
<input type="text" name="filter" id="filter" value=""  placeholder="Search Product..." autocomplete="off"></td>
</div>
<br>
              <table class="table table-striped table-hover" id="resultTable" class="db-table">
                
<tr>
                                      
  <th>Code</th>
  <th>Product</th>
  <th>Description</th>
  <th>Quantity</th>
  <th>Sell Price</th>
  <th>Orig Price</th>
  <th>Size</th>
  <th>Type</th>
  <th>Brand</th>
  <th style="text-align:center;">ACTION</th>   

</tr>

<?php 
include('config.php');
$sql = "SELECT * from product";
$search= "";
$search= isset ($_POST['search']) ? $_POST['search'] : '';
$search= !empty ($_POST['search']) ? $_POST['search'] : '';

$query1=mysql_query("select * from product order by ProductName asc");    

while($query2=mysql_fetch_array($query1))
{
echo "<td>".$query2['Code']."</td>";  
echo "<td>".$query2['ProductName']."</td>";
echo "<td>".$query2['Description']."</td>";
echo "<td>".$query2['Quantity']."</td>";
echo "<td>".$query2['SellingPrice']."</td>";
echo "<td>".$query2['OriginalPrice']."</td>";
echo "<td>".$query2['Size']."</td>";
echo "<td>".$query2['Type']."</td>";
echo "<td>".$query2['Brand']."</td>";

echo "<td><a href='cashier_transaction.php?ID=".$query2['ProductID']."'><button type=;button' class='btn btn-warning'> PICK</a></td><tr>";
}
?>
</tbody>
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
