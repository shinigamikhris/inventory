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


<title>Users Item</title>

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


<?php
include('config.php');
if(isset($_GET['ID']))
{
$ID=$_GET['ID'];
if(isset($_POST['submit']))
{
$Username=$_POST['Username'];
$Password=$_POST['Password'];
$Lastname=$_POST['Lastname'];
$Firstname=$_POST['Firstname'];
$Middlename=$_POST['Middlename'];
$Email=$_POST['Email'];
$usertype=$_POST['usertype'];

$query3=mysql_query("update user set Username='$Username' , Password='$Password' , Lastname='$Lastname', Firstname='$Firstname' , Middlename='$Middlename', Email='$Email', usertype='$usertype' where admin_id='$ID'");
if($query3)
{
header('location:user.php');
}
}
$query1=mysql_query("select * from user where admin_id='$ID'");
$query2=mysql_fetch_array($query1);
?>

<center>
<form method="post" action="">
<br>
<fieldset style="width:300px;"><legend>UPDATE USER</legend>
<table>

<br>

<tr>
<td>
Username: <td><input type="text" name="Username" value="<?php echo $query2['Username']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Password: <td><input type="Password" name="Password" value="<?php echo $query2['Password']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Lastname: <td><input type="text" name="Lastname" value="<?php echo $query2['Lastname']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Firstname: <td><input type="text" name="Firstname" value="<?php echo $query2['Firstname']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Middlename: <td><input type="text" name="Middlename" value="<?php echo $query2['Middlename']; ?>" /></td>
</td>
</tr>

<tr>
<td>
Email: <td><input type="text" name="Email" value="<?php echo $query2['Email']; ?>" /></td>
</td>
</tr>

<tr><td><label>Usertype:</td></label>
<td><select name="usertype" value="<?php echo $query2['usertype']; ?>">
<option value="<?php echo $query2['usertype']; ?>"><?php echo $query2['usertype']; ?></option>
<option value="Admin">Admin</option>
<option value="User">User</option></select></td>

</table>

<br />
<input type="submit" name="submit" value="UPDATE" class="btn btn-primary"/>
<a href="user.php" class="btn btn-warning"/>CANCEL</a>
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