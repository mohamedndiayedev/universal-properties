<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-layer.php');
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
   $query = "SELECT * FROM layer WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-layer.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Stock Opening Bal.</label>
                <input class="form-control" type="number" value="<?php echo $row['sob'] ?>" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>New Stock/Bag</label>
                <input class="form-control" type="number" value="<?php echo $row['nsb'] ?>" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total Stock Taken</label>
                <input class="form-control" type="number" value="<?php echo $row['tst'] ?>" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Weight (KG)</label>
                <input class="form-control" type="number" value="<?php echo $row['weight'] ?>" name="cheese5" placeholder="enter data *">
         </div>
         
         <div class="form-group">
                <label>Wholesale Price</label>
                <input class="form-control" type="number" value="<?php echo $row['who'] ?>" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Cash QTY Sold</label>
                <input class="form-control" type="number" value="<?php echo $row['cqs1'] ?>" name="cheese7" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total Value (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['tvgmd1'] ?>" name="cheese8" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Credit QTY Sold</label>
                <input class="form-control" type="number" value="<?php echo $row['cqs2'] ?>" name="cheese9" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total Value (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['tvgmd2'] ?>" name="cheese10" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Distributors Price</label>
                <input class="form-control" type="number" value="<?php echo $row['dp'] ?>" name="cheese11" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Cash QTY Sold</label>
                <input class="form-control" type="number" value="<?php echo $row['cqs3'] ?>" name="cheese12" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total Value (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['tvgmd3'] ?>" name="cheese13" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Credit QTY Sold (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['cqs4'] ?>" name="cheese14" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total Value (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['tvgmd4'] ?>" name="cheese15" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total Stock Returns</label>
                <input class="form-control" type="number" value="<?php echo $row['tsr'] ?>" name="cheese16" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Stock Closing Bal.</label>
                <input class="form-control" type="number" value="<?php echo $row['scb'] ?>" name="cheese17" placeholder="enter data *">
         </div>

        </div>

         <a href="layer.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="update_layer" class="btn btn-primary">Update</button>
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