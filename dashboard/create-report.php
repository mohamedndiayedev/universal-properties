<?php 
include('security-admin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Créer un rapport nutritionnel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>

    <form action="reg-admin.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Nom client</label>
                <input class="form-control" type="text" name="name" placeholder="nom complet  *">
        </div>

        <div class="form-group">
                <label>Nombre de calories</label>
                <input class="form-control" type="text" name="calorie" placeholder="calories *">
         </div>

         <div class="form-group">
                <label>Plats recommandés</label>
                <input class="form-control" type="text" name="plat" placeholder="plats diet *">
         </div>
         <div class="form-group">
                <label>Fruits et Légumes</label>
                <input class="form-control" type="text" name="flegume" placeholder="fruits & légumes *">
         </div>

         <div class="form-group">
                <label>Exercise physique</label>
                <input class="form-control" type="text" name="exp" placeholder="type d'exercise *">
         </div> 
         <div class="form-group">
                <label>Consommation d'Eau</label>
                <input class="form-control" type="text" name="conseau" placeholder="En litre *">
         </div> 

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" name="report" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Créer un rapport nutritionnel
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Ajouter rapport
              </button>
        </h6>
     </div>

  <div class="card-body">

      <div class="table-responsive">

       <?php 
           $conn = mysqli_connect("localhost","root","","codou_all_db");
           $query = "SELECT * FROM tablepaginate";
           $query_run = mysqli_query ($conn, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N* Client</th>
                            <th>Nom client</th>
                            <th>Nombre de calories</th>
                            <th>Plats recommandés</th>
                            <th>Fruits et Légumes</th>
                            <th>Exercise physique</th>
                            <th>Consommation d'Eau</th>
                        </tr>
                    </thead>

                    <tbody>
        <?php 
        
        if(mysqli_num_rows($query_run) > 0){
           
          while ($row = mysqli_fetch_assoc($query_run)) 
          {
            ?>
                        <tr>
                            <td><?php echo $row['ID_Client']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['calorie']; ?></td>
                            <td><?php echo $row['plat']; ?></td>
                            <td><?php echo $row['flegume']; ?></td>
                            <td><?php echo $row['exp']; ?></td>
                            <td><?php echo $row['conseau']; ?></td>
                            <td>
                              <form action="update-report.php" method="post">
                                <input type="hidden" name="editer_id" value="<?php echo $row['ID_Client']; ?>"> 
                                <button type="submit" name="editer" class="btn btn-success">Modifier</button>
                             </form>
                            </td>
                            <td>
                             <form action="reg-admin.php" method="post"> 
                             <input type="hidden" name="supprimer_id" value="<?php echo $row['ID_Client']; ?>"> 
                        <button type="submit" name="delete_rapport" class="btn btn-danger" >Supprimer</button>
                              </form>
                            </td>
                         </tr>
     <?php
        }
      } else {echo "Pas d'Admin disponible!";
      }
      ?>
                    </tbody>
           </table>
         </div>

     </div>
<?php 
  include('includes/scripts.php');
  include('includes/footer.php');
?>
   </div>

</div>



