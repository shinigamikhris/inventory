<button style="float: right;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> ADD PRODUCT </button>
<br>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong style="color: black;">ADDING PRODUCT</strong></h4>
      </div>
      </br>
      <div class="modal-body">

        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">


            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Code: </label>
            <div class="col-sm-7">
              <input type="text" name="Code" class="form-control" id="inputEmail3" placeholder="Code..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Product: </label>
            <div class="col-sm-7">
              <input type="text" name="ProductName" class="form-control" id="inputEmail3" placeholder="Product..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Description: </label>
            <div class="col-sm-7">
              <input type="text" name="Description" class="form-control" id="inputEmail3" placeholder="Description..." />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Quantity: </label>
            <div class="col-sm-7">
              <input type="text" name="Quantity" class="form-control" id="inputEmail3" placeholder="Quantity..." />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Sell Price: </label>
            <div class="col-sm-7">
              <input type="text" name="SellingPrice" class="form-control" id="inputEmail3" placeholder="Sell Price..." />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Orig Price: </label>
            <div class="col-sm-7">
              <input type="text" name="OriginalPrice" class="form-control" id="inputEmail3" placeholder="Orig Price..." />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Size: </label>
            <div class="col-sm-7">
              <input type="text" name="Size" class="form-control" id="inputEmail3" placeholder="Size..." />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Type: </label>
            <div class="col-sm-7">
              <input type="text" name="Type" class="form-control" id="inputEmail3" placeholder="Type..." />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Brand: </label>
            <div class="col-sm-7">
              <input type="text" name="Brand" class="form-control" id="inputEmail3" placeholder="Brand..." />
            </div>
            </div>

            <div class="form-group" align="left">
            <label for="inputPassword3" class="col-sm-3 control-label"></label>
            <div class="col-sm-7">
              <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Submit</button>
            </div>
            </div>

          </form>

<?php
if(isset($_POST['submit'])){


  $Code=$_POST['Code'];
  $ProductName=$_POST['ProductName'];
  $Description=$_POST['Description'];
  $Quantity=$_POST['Quantity'];
  $SellingPrice=$_POST['SellingPrice'];
  $OriginalPrice=$_POST['OriginalPrice'];
  $Size=$_POST['Size'];
  $Type=$_POST['Type'];
  $Brand=$_POST['Brand'];

  $query1=mysql_query("INSERT INTO product (Code,ProductName,Description,Quantity,SellingPrice,OriginalPrice,Size,Type,Brand) values('$Code','$ProductName','$Description','$Quantity','$SellingPrice','$OriginalPrice','$Size','$Type','$Brand')");

  if($query1);
  {
    echo "<script>alert('Product successfully added!'); window.location='product.php'</script>";
    
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