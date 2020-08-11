<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editer Infos Admin</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","codou_all_db");
if(isset($_POST['editbtn'])) 
{
   $id = $_POST['id'];
   $query = "SELECT * FROM admin_infos WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="admins-code.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Nom complet</label>
                <input class="form-control" value="<?php echo $row['title'] ?>" type="text" name="title" placeholder="Editer titre *">
        </div>
        <div class="form-group">
                <label>Occupation</label>
                <input class="form-control" value="<?php echo $row['subtitle'] ?>" type="text" name="subtitle" placeholder="Votre position *">
         </div>

         <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" value="<?php echo $row['description'] ?>" type="text" name="description" placeholder="Editer Description *">
   </textarea>
            </div>
        <div class="form-group">
                <label>Image Profile</label>
                <input class="form-control" value="<?php echo $row['image'] ?>" type="file" name="image" placeholder="Upload image*">
        </div>
    
         <a href="admins.php" class="btn btn-danger">Annuler</a>
         <button type="submit" name="updateadmin" class="btn btn-primary">Update</button>
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