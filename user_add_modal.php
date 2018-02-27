<button style="float: right;" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> ADD USER </button>
<br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong style="color: black;">ADDING USER</strong></h4>
      </div>
      </br>
      <div class="modal-body">
        

        <form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:60px;">


            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Username: </label>
            <div class="col-sm-7">
              <input type="text" name="Username" class="form-control" id="inputEmail3" placeholder="Username..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Password: </label>
            <div class="col-sm-7">
              <input type="password" name="Password" class="form-control" id="inputEmail3" placeholder="Password..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Lastname: </label>
            <div class="col-sm-7">
              <input type="text" name="Lastname" class="form-control" id="inputEmail3" placeholder="Lastname..." />
            </div>
            </div>

            <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label" style="color: black;">Firstname: </label>
            <div class="col-sm-7">
              <input type="text" name="Firstname" class="form-control" id="inputPassword3" placeholder="Firstname..." required />
            </div>
            </div>
            
            <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label" style="color: black;">Middlename: </label>
            <div class="col-sm-7">
              <input type="text" name="Middlename" class="form-control" id="inputPassword3" placeholder="Middlename..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Email: </label>
            <div class="col-sm-7">
              <input type="text" name="Email" class="form-control" id="inputEmail3" placeholder="Email..." required />
            </div>
            </div>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="color: black;">Usertype: </label>
            <div class="col-sm-7">
            <select name="usertype" id="usertype" class="form-control" required>
            <option></option>
            <option>Admin</option>
            <option>User</option>
            </select>
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


  $Username=$_POST['Username'];
  $Password=$_POST['Password'];
  $Lastname=$_POST['Lastname'];
  $Firstname=$_POST['Firstname'];
  $Middlename=$_POST['Middlename'];
  $Email=$_POST['Email'];
  $usertype=$_POST['usertype'];

  $query1=mysql_query("INSERT INTO user(Username,Password,Lastname,Firstname,Middlename,Email,usertype) values('$Username','$Password','$Lastname','$Firstname','$Middlename','$Email','$usertype')");
  
  if($query1);
  {
    echo "<script>alert('User successfully added!'); window.location='user.php'</script>";
    
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