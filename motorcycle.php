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


<title>MOTORCYCLE | MANUFACTURER</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>

<body>

<?php if (!isset($no_visible_elements) || !$no_visible_elements) {} ?>

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
<li><a href="login.php">Logout</a></li>
</ul>
</div><!--/­.nav-collapse -->
</div>
</nav>

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small> Dashboard</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">MOTORCYCLE</li>
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
          <a href="list.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-eye-close"></span> Manufacturer | Motorcycle List</a>
          <a href="product.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Product</a>
          <a href="purchase.php" class="list-group-item"><span class="glyphicon glyphicon-folder-close"></span> Purchase</a>
          <a href="vehicle_items.php" class="list-group-item"><span class="glyphicon glyphicon-file"></span> Vehicle Items</a>
          <a href="order.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> Order</a>
          <a href="order_details.php" class="list-group-item"><span class="icon-group icon-2x"></span> Customer Order Details</a>
          <a href="loss.php" class="list-group-item"><span class="glyphicon glyphicon-eye-close"></span> Loss Items</a>
          <a href="sales.php" class="list-group-item"><span class="glyphicon glyphicon-folder-open"></span> Sales</a>
          <a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-off"></span>  Logout</a>
          </div>

        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Motorcycle Overview
                <?php include('motorcycle_add_modal.php'); ?>
              </h3>
              <br>
            </div>

           <div class="panel-body">
  <br/>
  <table  class='table table-striped table-hover'>
    <thead>

  <tr>                                   
  <th>Name</th>
  <th>Description</th>
  <th>Brand</th>
  <th>Model</th>
  <th>Photo</th>
        <th style="text-align:center;">ACTION</th>                             
        </tr>
    </thead>
    <tbody>

<?php 
$query1=mysql_query("select mot.motorcycle_id,man.manufacturer_id,man.brand, mot.motorcycle_name, mot.motorcycle_description, mot.motorcycle_model, mot.file from manufacturer as man, motorcycle as mot where man.manufacturer_id=mot.manufacturer_id");    

while($query2=mysql_fetch_array($query1))
{
echo "<td>".$query2['motorcycle_name']."</td>";  
echo "<td>".$query2['motorcycle_description']."</td>";
echo "<td>".$query2['brand']."</td>";
echo "<td>".$query2['motorcycle_model']."</td>";
echo "<td><img src=customization/motorcycle/".$query2['file']." style='width:110px; height:110px' /></td>";

echo "<td><a href='motorcycle_edit.php?ID=".$query2['motorcycle_id']."'><span class='glyphicon glyphicon-cog gi-3x' aria-hidden='true'></span> </a>";
echo "<a href='motorcycle_delete.php?ID=".$query2['motorcycle_id']."' onclick='return confirmation()'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
 echo "</tr>";
}
?>
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