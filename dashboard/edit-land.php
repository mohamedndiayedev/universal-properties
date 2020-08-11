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
   $query = "SELECT * FROM cash_flow WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-land.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Client Name</label>
                <input class="form-control" value="<?php echo $row['name'] ?>" type="text" name="name" placeholder="Full Name *">
        </div>
        <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" value="<?php echo $row['phone'] ?>" type="text" name="phone" placeholder="Phone Number *">
         </div>

         <div class="form-group">
                <label>Addresse</label>
                <input class="form-control" value="<?php echo $row['address'] ?>" type="text" name="address" placeholder="Address *">
        </div>
        <div class="form-group">
                <label>Paid Amount (dollar)</label>
                <input class="form-control" value="<?php echo $row['paid_amount'] ?>" type="text" name="amount" placeholder="Amount in dollar *">
        </div>
        <div class="form-group">
                <label>Land Reference</label>
                <input class="form-control" value="<?php echo $row['land_ref'] ?>" type="text" name="ref" placeholder="Reference Number *">
        </div>
        <div class="form-group">
                <label>Date</label>
                <input class="form-control" value="<?php echo $row['date'] ?>" type="date" name="date" placeholder="Date *">
        </div>
        <div class="form-group">
                <label>Remark</label>
                <select  name="remark" value="<?php echo $row['remark'] ?>">
                <option style="color:black" value="null" size="3">Select one status</option>
                <option value="Paid" style="color:green">Paid</option>
                <option value="Not Paid" style="color:red">Not Paid</option>
                <option value="Paid" style="color:yellow">Pending</option>
                </select>
        </div>

         <a href="register-land.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="update_land" class="btn btn-primary">Update</button>
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