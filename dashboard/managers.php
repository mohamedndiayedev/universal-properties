<?php 
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-manager.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Infos Manager</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code_manager.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Manager Full Name</label>
                <input class="form-control" type="text" name="name" placeholder="Manager Full Name  *">
        </div>

        <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email *">
         </div>

         <div class="form-group">
                <label>Adress</label>
                <input class="form-control" type="text" name="address" placeholder="Adress *">
         </div>
         <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="text" name="phone" placeholder="Phone Number *">
         </div>

         <div class="form-group">
                <label>Department</label>
                <input class="form-control" type="text" name="dept" placeholder="Department *">
         </div>

         <input type="hidden" name="user-type" value="admin"></input>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="regmanager" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Infos Manager
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add an Manager in the System
              </button>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM managers";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Manager</th>
                            <th>Full Name Manager</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Department</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
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
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['dept']; ?></td>
                            <td>
                              <form action="edit_manager.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code_manager.php" method="post"> 
                             <input type="hidden" name="delet_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delmanager" class="btn btn-danger" >Delete</button>
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



