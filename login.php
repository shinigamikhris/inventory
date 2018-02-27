<!doctype html>
<html>

	<head>

 	<link rel="stylesheet" type="text/css" href="css/login.css">

<title>Login</title>
	</head>

<body>

<form method="post" action="checklogin.php">

<div class="container">
<img src="images/1.png">
<form>
	<div class="form-input">
	<input type="text" name="username" placeholder="Enter Username">
</div>
<div class="form-input">

	<input type="password" name="password" placeholder="Enter Password">
	</div>
	<input type="submit" name="submit" value="LOGIN" class="btn-login">
	</input>
</form>

</form>

<?php
include('config.php');

if (isset($_POST['submit'])){

$username=$_POST['username'];
$password=$_POST['password'];

$login_query=mysql_query("select * from user where username='$username' and password='$password' and usertype='Admin'");
$count=mysql_num_rows($login_query);
$row=mysql_fetch_array($login_query);

if ($count > 0){
session_start();
$_SESSION['id']=$row['admin_id'];

echo "<script>window.location='home.php'</script>";
}else{ ?>
<div class="alert alert-danger"><h3 class="blink_text">Invalid Username and Password! Try again.</h3></div>     
<?php
}
}
?>
</body> 
</html>
