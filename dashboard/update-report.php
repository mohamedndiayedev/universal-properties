<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editer le rapport</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("localhost","root","","codou_all_db");
if(isset($_POST['editer'])) 
{
   $id = $_POST['editer_id'];
   $query = "SELECT * FROM tablepaginate WHERE ID_Client='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="reg-admin.php" method="post">
        <input type="hidden" name="editer_id" value="<?php echo $row['ID_Client'] ?>">
        <div class="form-group">
                <label>Nom complet</label>
                <input class="form-control" value="<?php echo $row['name'] ?>" type="text" name="name" placeholder="Nom complet *">
        </div>
        <div class="form-group">
                <label>Nombre de calories</label>
                <input class="form-control" value="<?php echo $row['calorie'] ?>" type="text" name="calorie" placeholder="Nombre de calories *">
         </div>

         <div class="form-group">
                <label>Plats diététiques</label>
                <input class="form-control" value="<?php echo $row['plat'] ?>" type="text" name="plat" placeholder="Plats *">
        </div>
        <div class="form-group">
                <label>Fruits & Légumes</label>
                <input class="form-control" value="<?php echo $row['flegume'] ?>" type="text" name="flegume" placeholder="Fruits & Légumes *">
        </div>
        <div class="form-group">
                <label>Exercice Physique</label>
                <input class="form-control" value="<?php echo $row['exp'] ?>" type="text" name="exp" placeholder="Type d'exercice *">
        </div>
        <div class="form-group">
                <label>Consomation d'Eau</label>
                <input class="form-control" value="<?php echo $row['conseau'] ?>" type="text" name="conseau" placeholder="Quantité d'Eau *">
        </div>

         <a href="create-report.php" class="btn btn-danger">Annuler</a>
         <button type="submit" name="maj_info" class="btn btn-primary">Update</button>
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