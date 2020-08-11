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
        <span aria-hidden="true"&times;</span>
        </button>
      </div>

    <form action="code-profile.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Nom complet</label>
                <input class="form-control" type="text" name="nom_admin" placeholder="Nom complet  *">
        </div>

        <div class="form-group">
                <label>Occupation</label>
                <input class="form-control" type="text" name="occup_admin" placeholder="Votre occupation *">
         </div>

         <div class="form-group">
                <label>Description Occupation</label>
                <textarea class="form-control" type="text" name="descrip_admin" placeholder="Faire une petite description *">
                </textarea>
         </div>
         <div class="form-group">
                <label>Skype Id</label>
                <input class="form-control" type="text" name="skypeid" placeholder="Donner votre Id Skype *">
         </div>
         
         <div class="form-group">
                <label>Photo  Profile Admin</label>
                <input class="form-control" type="file" name="photo_admin" placeholder="Upload photo *">
         </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" name="register_admin" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Infos Administrateur
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Ajouter Admin
              </button>
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
           $query = "SELECT * FROM profileinfos";
           $query_run = mysqli_query ($connexion, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Admin</th>
                            <th>Nom complet</th>
                            <th>Occupation</th>
                            <th>Description</th>
                            <th>Skype Id</th>
                            <th>Photo Admin</th>
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
                            <td><?php echo $row['nomadmin']; ?></td>
                            <td><?php echo $row['occupadmin']; ?></td>
                            <td><?php echo $row['descripadmin']; ?></td>
                            <td><?php echo $row['skypeid']; ?></td>
                   <td><?php echo '<img src="upload/'.$row['photoadmin'].'" alt="Photo" width="170px;" height="150px;">' ?></td>
                            <td>
                              <form action="profile-edit.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modifier</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-profile.php" method="post"> 
                             <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_admin" class="btn btn-danger" >Supprimer</button>
                              </form>
                            </td>
                    </tr>
     <?php
        }
      } else {echo "No Recors Found";
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



