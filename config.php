
<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="inventory"; // Database name 
$tbl_name="inventoryuser"; // Table name 
// Connect to server and select databse.
$db_link=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
// Define $myusername and $mypassword 
?>