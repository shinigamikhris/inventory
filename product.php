<?php include 'config.php' ?>
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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Com­patible" content="IE=edge">
<meta name="viewport" content="width=devic­e-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">


<title>Products</title>

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
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small> Product</small></h1>
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
          <a href="supplier.php" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> Supplier</a>
          <a href="product.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-folder-open"></span> Product</a>
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
              <h3 class="panel-title">Users Overview
                <?php include('product_add_modal.php'); ?>
              </h3>
              <br>
            </div>

            <div class="panel-body">

      <div class="panel-body">
      <form name ="form1" method="post" action="">
      <div id="search">
      <td><label for="filter"> Search </label> 
      <input type="text" name="filter" id="filter" value=""  placeholder="Search Product..." autocomplete="off"></td>
      </div>

  <br/>

  <table  class='table table-striped table-hover'>
    <thead>
        <tr>
                                      
  <th>Code</th>
  <th>Product</th>
  <th>Description</th>
  <th>Quantity</th>
  <th>S.Price</th>
  <th>O.Price</th>
  <th>Size</th>
  <th>Type</th>
  <th>Brand</th>
        <th style="text-align:center;">ACTION</th>                             
        </tr>
    </thead>
    <tbody>
<?php 

$sql = "SELECT * from product";
$search= "";
$search= isset ($_POST['search']) ? $_POST['search'] : '';
$search= !empty ($_POST['search']) ? $_POST['search'] : '';

$query1=mysql_query("select * from product order by Code");    

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

echo "<td><a href='product_edit.php?ID=".$query2['ProductID']."'><span class='glyphicon glyphicon-edit  ' aria-hidden='true'></span> </a>";
echo "<a href='product_delete.php?ID=".$query2['ProductID']."' onclick='return confirmation()'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>";
echo "<a href='purchase_add.php?ID=".$query2['ProductID']."'> <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> </a></td>";
 echo "</tr>";
}
?>
    </tbody>
  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>