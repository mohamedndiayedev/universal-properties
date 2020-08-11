<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-employee.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Infos Land Processing</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM bank WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update_bank.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Bank Name</label>
                <input class="form-control" value="<?php echo $row['bank_name'] ?>" type="text" name="bank" placeholder="Bank Name *">
        </div>
        <div class="form-group">
                <label>Account Number</label>
                <input class="form-control" value="<?php echo $row['account_number'] ?>" type="text" name="numb" placeholder="Account Number *">
         </div>

         <a href="bank_related.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="update_bank" class="btn btn-primary">Update</button>
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