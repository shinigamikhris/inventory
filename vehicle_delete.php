<?php
session_start();
if($_SESSION['logged'] != 'true'){
	header('location:index.php');
}
?>

<html>
<body>
<?php
include('config.php');
if(isset($_GET['ID']))
{
$ID=$_GET['ID'];
$query1=mysql_query("delete from vehicle_items where ID='$ID'");

if($query1)
{
header('location:vehicle_items.php');
}
}
?>
</body>
</html>