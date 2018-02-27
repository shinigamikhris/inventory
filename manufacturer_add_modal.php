<button style="float: right;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> ADD MANUFACTURER </button>
<br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"  style="color: black;"><strong>ADD MANUFACTURER HERE <span class="glyphicon glyphicon-arrow-down"></span></strong></h4>
      </div>
      </br>
      <div class="modal-body">
        

        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">


            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Manufacturer: </label>
            <div class="col-sm-7">
              <input type="text" name="brand" class="form-control" id="inputEmail3" placeholder="Manufacturer name..." required />
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
$manufacturer_id=mysql_real_escape_string($_POST['manufacturer_id']);
$brand=mysql_real_escape_string($_POST['brand']);
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
        $fileDestination = 'customization/manufacturer/'.$fileNameNew;


 
 if(move_uploaded_file($fileTmpName, $fileDestination))
 {

$query1=mysql_query("INSERT INTO manufacturer values('$manufacturer_id','$brand','$fileNameNew','$fileType','$fileSize')");
echo "Error inserting Record!";
if($query1)
{
header("location:manufacturer.php");
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