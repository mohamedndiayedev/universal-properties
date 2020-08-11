<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-brs.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Sky High Bank Reconciliation File</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM brs WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-brs.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Balance as per Cash Book (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['balance'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Add: Unrepresented Cheque<br/>Details:</label>
                <input class="form-control" type="text" value="<?php echo $row['less1'] ?>" name="cheese2" placeholder="enter data*">
                
         </div>
         <div class="form-group">
                <label>Less: Uncleared Cheque<br/>Amount: (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['less2'] ?>" name="cheese3" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Less Bank Charges<br/>Details:</label>
                <textarea class="form-control" type="text" value="<?php echo $row['less3'] ?>" name="cheese4" placeholder="enter data *">
                </textarea>
         </div>
         <div class="form-group">
                <label>Closing Balance per Reconcilition (GMD)<br/>Bank Statement</label>
                <input class="form-control" type="number" value="<?php echo $row['closing'] ?>" name="cheese5" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Comment</label>
                <input class="form-control" type="text" value="<?php echo $row['comment'] ?>" name="cheese6" placeholder="enter data *">
         </div>
        </div>

         <a href="brs.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatebrs" class="btn btn-primary">Update</button>
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