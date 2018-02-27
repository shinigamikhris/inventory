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

<link rel="stylesheet" type="text/css" href="tcal.css" />
<script src="./js/function.js" type="text/javascript"></script>
<script type="text/javascript" src="tcal.js"></script>


<title>Purchase</title>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

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
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small> Purchase</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">Purchase</li>
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
          <a href="purchase.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-folder-close"></span> Purchase</a>
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
              <h3 class="panel-title">Purchase Overview

              </h3>
            </div>

            <div class="panel-body">
              <table class="table table-striped table-hover">
<br /> 
<table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">
      
      <tr>
      <form action="purchase.php" method="get" ecntype="multipart/data-form">
        <td width="48%" height="37" align="right"><input type="date" name="d1" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="From Eg.2015-05-13" required /></td>

        <td width="15%" align="left"> 
        <input type="date" name="d2" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="To Eg.2015-06-13" required  /> </td>
        
        <td width="0%" align="left">
          <input type="submit" id="btnsearch" class="btn btn-info" value="Search" name="search" /></td>
        </form>
      </tr>
    
    </table></th>
  </tr>
  <br>
<?php
include('config.php');

echo "<table cellpadding='1' cellspacing='1' class='table table-striped table-hover''>
  <tr>
  <th>Purchase ID</th>
  <th>ProductName</th>
  <th>Date</th>
  <th>Quantity</th>
  <th>Supplier</th>
  </tr>";

if(isset($_GET['search'])){
      $d1 = $_GET['d1'];
      $d2 = $_GET['d2'];

$query1=mysql_query("SELECT * FROM purchase WHERE dates BETWEEN '$d1' and '$d2'");

$query1=mysql_query("select purchase.PurchaseID, purchase.ProductName, purchase.dates, purchase.Quantity,supplier.SupplierID, supplier.Supplier from purchase, supplier where purchase.SupplierID=supplier.SupplierID"); 
//$query1=mysql_query("select * from purchase");

while($query2=mysql_fetch_array($query1))
{
echo "<td>".$query2['PurchaseID']."</td>";
echo "<td>".$query2['ProductName']."</td>";
echo "<td>".$query2['dates']."</td>";
echo "<td>".$query2['Quantity']."</td>";
echo "<td>".$query2['SupplierID']."</td></tr>";
} 
}
?>
</table> 
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

