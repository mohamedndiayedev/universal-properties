<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-meeting.php');
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
   $query = "SELECT * FROM meeting WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-meeting.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Subject</label>
                <input class="form-control" type="text" value="<?php echo $row['subject'] ?>" name="cheese1" placeholder="subject  *">
        </div>

        <div class="form-group">
                <label>Time</label>
                <input class="form-control" type="text" value="<?php echo $row['time'] ?>" name="cheese2" placeholder="time *">
         </div>

         <div class="form-group">
                <label>Place</label>
                <input class="form-control" type="text" value="<?php echo $row['place'] ?>" name="cheese3" placeholder="place *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese4" placeholder="date *">
         </div>
        </div>

         <a href="meeting.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="updatemeeting" class="btn btn-primary">Update</button>
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