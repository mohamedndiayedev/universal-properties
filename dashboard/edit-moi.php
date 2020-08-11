<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-moi.php');
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
   $query = "SELECT * FROM moi WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-moi.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
   
        <div class="form-group">
                <label>Incomes/Date</label>
                <input class="form-control" type="date" name="cheese1" value="<?php echo $row['date'] ?>" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Cheque #</label>
                <input class="form-control" type="text" name="cheese2" value="<?php echo $row['cheque'] ?>" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="cheese3" value="<?php echo $row['description'] ?>" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Expenses/Descrption</label>
                <input class="form-control" type="text" name="cheese4" value="<?php echo $row['expenses'] ?>" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>CASH</label>
                <input class="form-control" type="number " name="cheese5" value="<?php echo $row['cash'] ?>" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>FIB</label>
                <input class="form-control" type="number" name="cheese6" value="<?php echo $row['fib'] ?>" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>TBL</label>
                <input class="form-control" type="number" name="cheese7" value="<?php echo $row['tbl'] ?>" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>MEGA Bank</label>
                <input class="form-control" type="number" name="cheese8" value="<?php echo $row['mb'] ?>" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Sky Bank</label>
                <input class="form-control" type="number" name="cheese9" value="<?php echo $row['sb'] ?>" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>GMD VALUE</label>
                <input class="form-control" type="number" name="cheese10" value="<?php echo $row['gmdvalue'] ?>" placeholder="enter data *">
         </div>
         
        </div>
        </div>

         <a href="moi.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatemoi" class="btn btn-primary">Update</button>
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