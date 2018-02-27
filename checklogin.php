<?php
ob_start();
include('config.php');
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 
// To protect MySQL injection 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM inventoryuser WHERE username='$myusername' and password='$mypassword' and usertype='Admin'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	session_start();
$_SESSION['id']=$row['admin_id'];

	header("location:home.php");
}
else {
echo "<script>
	alert('Wrong Username or Password')
	window.location='login.php'
	</script>";
}
ob_end_flush();
?>
<?php
ob_start();
include('config.php');
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 
// To protect MySQL injection 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM inventoryuser WHERE username='$myusername' and password='$mypassword' and usertype='User'";
$result=mysql_query($sql);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	session_start();
$_SESSION['id']=$row['admin_id']; 

	session_start();
	$_SESSION['logged']="true";
	header("location:cashier1.php");
}
else {
echo "<script>
	alert('Wrong Username or Password')
	window.location='login.php'
	</script>";
}
ob_end_flush();
?>
