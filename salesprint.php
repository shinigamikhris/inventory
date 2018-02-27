<html>
<?php
include('config.php');

?>
<head>
<title>
POS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="js/tcal.css" />
<script type="text/javascript" src="js/tcal.js"></script>
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


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
</head>
<?php
function createRandomPassword() {
  $chars = "003232303232023232023456789";
  srand((double)microtime()*1000000);
  $i = 0;
  $pass = '' ;
  while ($i <= 7) {

    $num = rand() % 33;

    $tmp = substr($chars, $num, 1);

    $pass = $pass . $tmp;

    $i++;

  }
  return $pass;
}
$finalcode='RS-'.createRandomPassword();
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


<title>Print</title>

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
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Bitz4Bikes <small>PRINTING PAGE</small></h1>
      </div>
      <div class="col-md-2">
 
      </div>
    </div>    

  </div>

</header>

<section id="breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="active">PRINTING PAGE</li>
    </ol>
  </div>
  </section>

          </div>

     </div>

<body>
<center>
<div class="container-fluid">
      <div class="row-fluid">
  <div class="span2">
    </center>    

<div style="margin-top: -19px; margin-bottom: 21px;" style="float: left;">
<a  href="sales.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button class="btn btn-warning btn-sm" style="float: right;"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div>
<form action="sales.php" method="get">

</strong>
</form>

<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">

<h1> BITZ4BIKES SALES </h1>

Sales Report from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
  <thead>
    <tr>
      <th width="13%"> Date </th>
      <th width="13%"> Code </th>
      <th width="20%">Item </th>
      <th width="18%"> Quantity Sold</th>
      <th width="13%"> SellingPrice </th>
      <th width="13%"> Total </th>
    </tr>
  </thead>
  <tbody>
    
      <?php
        include('database.php');
        $d1=$_GET['d1'];
        $d2=$_GET['d2'];
        $result = $db->prepare("SELECT * FROM sales WHERE dates BETWEEN :a AND :b ORDER by order_id");
        $result->bindParam(':a', $d1);
        $result->bindParam(':b', $d2);
        $result->execute();
        for($i=0; $row = $result->fetch(); $i++){
      ?>
      <tr class="record">
      <td><?php echo $row['dates']; ?></td>
      <td><?php echo $row['ProductID']; ?></td>
      <td><?php echo $row['ProductName']; ?></td>
      <td><?php echo $row['Quantity']; ?></td>
      <td><?php echo $row['SellingPrice']; ?></td>
      <td><?php
      $dsdsd=$row['Total'];
      echo formatMoney($dsdsd, true);
      ?></td>

      <?php
        }
      ?>
    
  </tbody>
  <thead>
    <tr>
      <th colspan="5" style="border-top:1px solid #999999"> Total: </th>
      <th colspan="1" style="border-top:1px solid #999999"> 
      <?php
        function formatMoney($number, $fractional=false) {
          if ($fractional) {
            $number = sprintf('%.2f', $number);
          }
          while (true) {
            $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
            if ($replaced != $number) {
              $number = $replaced;
            } else {
              break;
            }
          }
          return $number;
        }
        $d1=$_GET['d1'];
        $d2=$_GET['d2'];
        $results = $db->prepare("SELECT sum(Total) FROM sales WHERE dates BETWEEN :a AND :b");
        $results->bindParam(':a', $d1);
        $results->bindParam(':b', $d2);
        $results->execute();
        for($i=0; $rows = $results->fetch(); $i++){
        $dsdsd=$rows['sum(Total)'];
        echo formatMoney($dsdsd, true);
        }
        ?>
      </th>


    
        </th>
    </tr>
  </thead>
</table>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</body>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
      {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>

</html>