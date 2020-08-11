<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-employee.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Infos Employee</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","skgambia");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM employee WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-employee.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Username</label>
                <input class="form-control" value="<?php echo $row['username'] ?>" type="text" name="name" placeholder="Full Name *">
        </div>
        <div class="form-group">
                <label>Email</label>
                <input class="form-control" value="<?php echo $row['email'] ?>" type="email" name="email" placeholder="Email *">
         </div>

         <div class="form-group">
                <label>Addresse</label>
                <input class="form-control" value="<?php echo $row['address'] ?>" type="text" name="address" placeholder="Address *">
        </div>
        <div class="form-group">
                <label>Phone</label>
                <input class="form-control" value="<?php echo $row['phone'] ?>" type="text" name="phone" placeholder="Phone Number *">
        </div>
        <div class="form-group">
                <label>Work Position</label>
                <input class="form-control" value="<?php echo $row['work'] ?>" type="text" name="work" placeholder="Work Position *">
        </div>
         <a href="register.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="update" class="btn btn-primary">Update</button>
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