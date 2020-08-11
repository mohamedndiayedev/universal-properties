<?php 
include('security-admin.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Profile Admin </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;> </span>
        </button>
      </div>

  

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Vos Messages disponibles :
        </h6>
     </div>

  <div class="card-body">

     <!--Validation Auth-->
                            <div class="current">
                           <?php
                                if (isset($_SESSION['success']) && ($_SESSION['success']) !='') 
                                {
                                  
                                  echo '<h2 class="bg-success> '.$_SESSION['success'].' </h2>';
                                  unset($_SESSION['success']);
                               }

                                 if (isset($_SESSION['status']) && ($_SESSION['status']) !='') 
                                {
                                  
                                  echo '<h2 class="bg-danger"> '.$_SESSION['status'].' </h2>';
                                  unset($_SESSION['status']);
                                }
                            ?>

                            </div>
                            <!--End Validation Auth-->
      
  <div class="table-responsive">

<?php 
    $connexion = mysqli_connect("localhost","root","","codou_all_db");
    $query = "SELECT * FROM rendezvous";
    $query_run = mysqli_query ($connexion, $query);
?>
    <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
             <thead>
                 <tr>
                     <th>Num. Message</th>
                     <th>Nom Complet</th>
                     <th>Email</th>
                     <th>Téléphone</th>
                     <th>Message</th>
                     <th>Date Envoi</th>
                 </tr>
             </thead>

             <tbody>
                                     <?php 
 
                               if(mysqli_num_rows($query_run) > 0){
    
                                    while ($row = mysqli_fetch_assoc($query_run)) 
                               {
                              ?>
                 <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['nom']; ?></td>
                     <td><?php echo $row['email']; ?></td>
                     <td><?php echo $row['telephone']; ?></td>
                     <td><?php echo $row['message']; ?></td>
                     <td><?php echo $row['date']; ?></td>
            
                     <td>
                      <form action="rendez-vous.php" method="POST"> 
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                 <button type="submit" name="delete_msg" class="btn btn-danger" >Supprimer</button>
                       </form>
                     </td>
             </tr>
<?php
 }
} else {echo "Pas de nouveau message!";
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
