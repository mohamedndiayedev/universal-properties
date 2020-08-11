<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-salary.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Employee File</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM salary WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-salary.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Employee Full Name</label>
                <input class="form-control" type="text" value="<?php echo $row['name'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Work Position</label>
                <input class="form-control" type="text" value="<?php echo $row['work'] ?>" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Department</label>
                <input class="form-control" type="text" value="<?php echo $row['department'] ?>" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Salary (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['salary'] ?>" name="cheese4" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="number" value="<?php echo $row['phone'] ?>" name="cheese5" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" value="<?php echo $row['email'] ?>" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Month paid</label>
                <input class="form-control" type="text" value="<?php echo $row['paid'] ?>" name="cheese7" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese8" placeholder="enter data *">
         </div>
        </div>

         <a href="salary.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatesalary" class="btn btn-primary">Update</button>
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