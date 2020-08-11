<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-events.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Events File</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM events WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-events.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Event</label>
                <input class="form-control" type="text" value="<?php echo $row['event'] ?>" name="cheese1" placeholder="enter event  *">
        </div>

        <div class="form-group">
                <label>Details</label>
                <input class="form-control" type="text" value="<?php echo $row['details'] ?>" name="cheese2" placeholder="enter details *">
         </div>

         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese4" placeholder="enter date *">
         </div>
        </div>

         <a href="events.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updateevents" class="btn btn-primary">Update</button>
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