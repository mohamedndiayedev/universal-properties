<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-datalands.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit File</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM datalands WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-datalands.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Type of Product</label>
                <input class="form-control" type="text" value="<?php echo $row['type'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Reference Number</label>
                <input class="form-control" type="text" value="<?php echo $row['ref'] ?>" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Location</label>
                <input class="form-control" type="text" value="<?php echo $row['loc'] ?>" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Land Area</label>
                <input class="form-control" type="text" value="<?php echo $row['area'] ?>" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Company Owner</label>
                <input class="form-control" type="text" value="<?php echo $row['company'] ?>" name="cheese5" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Selling Status</label>
                <input class="form-control" type="text" value="<?php echo $row['status'] ?>" name="cheese6" placeholder="enter data *">
         </div>
        </div>

         <a href="datalands.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatedatalands" class="btn btn-primary">Update</button>
   </form>
      <?php
    }
}

?>

</div>
</div>
</div>
</div>


<?php 
  include('includes/scripts.php');
  include('includes/footer.php');
?>