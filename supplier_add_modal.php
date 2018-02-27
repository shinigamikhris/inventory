<button style="float: right;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> ADD SUPPLIER </button>
<br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong style="color: black;">ADDING SUPPLIER</strong></h4>
      </div>
      </br>
      <div class="modal-body">
        

        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">


            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Supplier: </label>
            <div class="col-sm-7">
              <input type="text" name="Supplier" class="form-control" id="inputEmail3" placeholder="Supplier..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">S_MobileNo: </label>
            <div class="col-sm-7">
              <input type="text" name="S_MobileNo" class="form-control" id="inputEmail3" placeholder="S_MobileNo..." />
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


  $SupplierID=$_POST['SupplierID'];
  $Supplier=$_POST['Supplier'];
  $S_MobileNo=$_POST['S_MobileNo'];
 
  $query1=mysql_query("INSERT INTO supplier(SupplierID,Supplier,S_MobileNo) values('$SupplierID','$Supplier','$S_MobileNo')");
  
  if($query1);
  {
    echo "<script>alert('Supplier successfully added!'); window.location='supplier.php'</script>";
    
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