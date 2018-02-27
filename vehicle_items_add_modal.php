<button style="float: right;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> ADD ITEMS </button>
<br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"  style="color: black;"><strong>ADD ITEM HERE <span class="glyphicon glyphicon-arrow-down"></span></strong></h4>
      </div>
      </br>
      <div class="modal-body">
        

        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">


            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Name: </label>
            <div class="col-sm-7">
              <input type="text" name="Name" class="form-control" id="inputEmail3" placeholder="Name..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Brand: </label>
            <div class="col-sm-7">
              <input type="text" name="Brand" class="form-control" id="inputEmail3" placeholder="Brand..." required />
            </div>
            </div>

        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">
            <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label" style="color: black;">Model: </label>
            <div class="col-sm-7">
              <input type="text" name="Model" class="form-control" id="inputPassword3" placeholder="Model..." required />
            </div>
            </div>
            
        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">
            <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label" style="color: black;">Description: </label>
            <div class="col-sm-7">
              <input type="text" name="Description" class="form-control" id="inputPassword3" placeholder="Description..." required />
            </div>
            </div>


            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Price: </label>
            <div class="col-sm-7">
              <input type="text" name="Price" class="form-control" id="inputEmail3" placeholder="Price..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Photo: </label>
            <div class="col-sm-7">
              <input type="file" name="file" class="form-control" required />
            </div>
            </div>


            <div class="form-group" align="left">
            <label for="inputPassword3" class="col-sm-3 control-label"></label>
            <div class="col-sm-7">
              <button type="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Submit</button>
            </div>
            </div>

          </form>

<?php
if(isset($_POST['submit']))
{
$ID=mysql_real_escape_string($_POST['ID']);
$Name=mysql_real_escape_string($_POST['Name']);
$Brand=mysql_real_escape_string($_POST['Brand']);
$Model=mysql_real_escape_string($_POST['Model']);
$Description=mysql_real_escape_string($_POST['Description']);
$Price=mysql_real_escape_string($_POST['Price']);
$file = $_FILES['file'];

//photo
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'vehicle_items/'.$fileNameNew;


 
 if(move_uploaded_file($fileTmpName, $fileDestination))
 {

$query1=mysql_query("INSERT INTO vehicle_items values('$ID','$Name','$Brand','$Model','$Description','$Price','$fileNameNew','$fileType','$fileSize')");
echo "Error inserting Record!";
if($query1)
{
header("location:vehicle_items.php");
}
}
} else {
        echo "Your file is too big!";
      }
    }else{
      echo "There was an error in uploading your file!!";
    }
    
  } else {
    echo "You cannot upload files of this type";
  }
}
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>