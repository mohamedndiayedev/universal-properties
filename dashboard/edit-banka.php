<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-banka.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Bank Accounts File</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM banka WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-banka.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Deposits (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['deposit'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Withdrawals (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['withdrawal'] ?>" name="cheese2" placeholder="enter data*">
                
         </div>
         <div class="form-group">
                <label>Balance (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['balance'] ?>" name="cheese3" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>DESCRIPTION ( RECEIPT/ CHEQUE #)</label>
                <textarea class="form-control" type="text" value="<?php echo $row['description'] ?>" name="cheese4" placeholder="enter data *">
                </textarea>
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese5" placeholder="enter data *">
         </div>
        </div>

         <a href="banka.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatebanka" class="btn btn-primary">Update</button>
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