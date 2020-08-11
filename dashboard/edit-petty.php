<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-petty.php');
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
   $query = "SELECT * FROM petty WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-petty.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Balance (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['balance'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese2" placeholder="enter data*">
         </div>

         <div class="form-group">
                <label>Replenishment Amount (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['reple'] ?>" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" value="<?php echo $row['description'] ?>" name="cheese4" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Payment Amount (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['payment'] ?>" name="cheese5" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['total'] ?>" name="cheese6" placeholder="enter data *">
         </div>
        </div>

         <a href="petty.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatepetty" class="btn btn-primary">Update</button>
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