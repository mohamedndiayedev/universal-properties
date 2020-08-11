<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-session.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attendance File For Employees</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>
    <form action="code-session.php" method="POST">
        <div class="modal-body">

         <div class="form-group">
                <label>User Name</label>
                <input class="form-control" type="text" name="cheese1" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Session Type</label>
                <input class="form-control" type="text" name="cheese2" placeholder="enter data *">
         </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="sessionbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">
      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Session File 
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add Session Type
              </button>
        </h6><br/>
        <h6>
        <p><strong>Session Tracking</strong></p>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM session";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>User Name</th>
                            <th>Session Type</th>
                            <th>Modify</th>
                            <th>Delete</th>
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
                            <td><?php echo $row['user']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td>
                              <form action="edit-session.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="delete-session.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_session" class="btn btn-danger" >Delete</button>
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





