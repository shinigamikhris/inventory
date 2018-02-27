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


<title>Users</title>

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
      <li class="active">Cashier</li>
    </ol>
  </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">

          <a href="cashier1.php" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span>Cashier</a>
          <a href="cashier_orderdetails.php" class="list-group-item  main-color-bg"><span class="glyphicon glyphicon-folder-open"></span> Customer Order Details</a>
          <a href="logout.php" class="list-group-item">Logout</a>
          </div>

        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Customer Overview
              
            </div>

            <div class="panel-body">
              <table class="table table-striped table-hover">
                        <tr>
                                      
  <th>ID</th>
  <th>Name</th>
  <th>Brand</th>
  <th>Model</th>
  <th>Price</th>
        <th style="text-align:center;">ACTION</th>                             
        </tr>


<?php 
$query1=mysql_query("select * from customerorderdetails");    

while($query2=mysql_fetch_array($query1))
{
echo "<td>".$query2['ID']."</td>";  
echo "<td>".$query2['Name']."</td>";
echo "<td>".$query2['Brand']."</td>";
echo "<td>".$query2['Model']."</td>";
echo "<td>".$query2['Price']."</td>";

echo "<td><a href='#.php?ID=".$query2['ID']."'><button type=;button' class='btn btn-success'>Edit</a>";
echo "<a href='#.php?ID=".$query2['ID']."' onclick='return confirmation()'><button type=;button' class='btn btn-danger'> Delete</a></td>";
 echo "</tr>";
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
      </div>
      <div class="modal-body">
       <?php
include('config.php');

if(isset($_POST['submit']))
{
$CustomerID=mysql_real_escape_string($_POST['CustomerID']);
$CustomerName=mysql_real_escape_string($_POST['CustomerName']);
$C_MobileNo=mysql_real_escape_string($_POST['C_MobileNo']);
$query1=mysql_query("insert into customer values('$CustomerID','$CustomerName','$C_MobileNo')");
echo "insert into customer values('$CustomerID','$CustomerName','$C_MobileNo')";
if($query1)
{
header('location:customer.php');
}
}
?>
<br/>

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save Changes</button>
        </div>
    </div>
  </div>
</div>


<!-- Bootstrap core JavaScript
====================­====================­========== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>