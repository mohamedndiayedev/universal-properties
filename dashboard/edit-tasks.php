<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-tasks.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Tasks File</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM tasks WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-tasks.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Tasks</label>
                <input class="form-control" type="text" value="<?php echo $row['tasks'] ?>" name="cheese1" placeholder="enter task  *">
        </div>

        <div class="form-group">
                <label>Details</label>
                <input class="form-control" type="text" value="<?php echo $row['details'] ?>" name="cheese2" placeholder="enter details *">
         </div>

         <div class="form-group">
                <label>Department concerned</label>
                <input class="form-control" type="text" value="<?php echo $row['department'] ?>" name="cheese3" placeholder="enter department *">
         </div>
         <div class="form-group">
                <label>Agent in charge</label>
                <input class="form-control" type="text" value="<?php echo $row['agent'] ?>" name="cheese4" placeholder="enter agent name *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese4" placeholder="enter date *">
         </div>
        </div>

         <a href="tasks.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatetasks" class="btn btn-primary">Update</button>
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