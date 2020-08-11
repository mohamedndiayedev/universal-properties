<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editer Profile Admin</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","codou_all_db");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['id'];
   $query = "SELECT * FROM profileinfos WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="code-profile.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Nom complet</label>
                <input class="form-control" value="<?php echo $row['nomadmin'] ?>" type="text" name="edit_nom" placeholder="Nom complet *">
        </div>
        <div class="form-group">
                <label>Occupation</label>
                <input class="form-control" value="<?php echo $row['occupadmin'] ?>" type="text" name="edit_occu" placeholder="Occupation *">
         </div>

         <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" value="<?php echo $row['descripadmin'] ?>" type="text" name="edit_desc" placeholder="Description *">
                </textarea>
            </div>
            <div class="form-group">
                <label>Skype Id</label>
                <input class="form-control" value="<?php echo $row['skypeid'] ?>" type="text" name="skypeid" placeholder="Donner votre Skype Id *">
         </div>
        <div class="form-group">
                <label>Nouvelle Photo</label>
                <input class="form-control" value="<?php echo $row['photoadmin'] ?>" type="file" name="edit_pic" placeholder="Photo Admin *">
        </div>
         <a href="admin-profile.php" class="btn btn-danger">Annuler</a>
         <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
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