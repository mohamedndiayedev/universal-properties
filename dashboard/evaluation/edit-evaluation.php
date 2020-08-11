<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-evaluation.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Evaluation Form</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("iwqrvsv8e5fz4uni.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","ybohxgtnw8ag3b1l","xtf6joq3n6czftrh","v1ydnphp6nxbbqix");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM evaluation WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-evaluation.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Employee Full Name</label>
                <input class="form-control" type="text" value="<?php echo $row['name'] ?>" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Employee Department</label>
                <input class="form-control" type="text" value="<?php echo $row['edept'] ?>" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" value="<?php echo $row['email'] ?>" name="cheese3" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Task Executed</label>
                <input class="form-control" type="text" value="<?php echo $row['task'] ?>" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Department Manager Name</label>
                <input class="form-control" type="text" value="<?php echo $row['dept'] ?>" name="cheese5" placeholder="enter data *">
         </div>
         
         <div class="form-group">
                <label>Remark for Employee</label>
                <input class="form-control" type="text" value="<?php echo $row['remark'] ?>" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Suggestion</label>
                <input class="form-control" type="text" value="<?php echo $row['sug'] ?>" name="cheese7" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Task assigned</label>
                <input class="form-control" type="text" value="<?php echo $row['tassigned'] ?>" name="cheese8" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese9" placeholder="enter data *">
         </div>
        
        </div>

         <a href="evaluation.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updateevaluation" class="btn btn-primary">Update</button>
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