<?php 
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-lands.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Type of House or Land</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-lands.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Type of Product</label>
                <input class="form-control" type="text" name="type" placeholder="type  *">
        </div>

        <div class="form-group">
                <label>Reference Number</label>
                <input class="form-control" type="text" name="reference" placeholder="reference *">
         </div>

         <div class="form-group">
                <label>Location</label>
                <input class="form-control" type="text" name="location" placeholder="location *">
         </div>
         <div class="form-group">
                <label>Client Name</label>
                <input class="form-control" type="text" name="client" placeholder="client *">
         </div>

         <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="number" name="phone" placeholder="phone *">
         </div>
         <div class="form-group">
                <label>Agent</label>
                <input class="form-control" type="text" name="agent" placeholder="agent *">
         </div>
         <div class="form-group">
                <label>Company Name</label>
                <input class="form-control" type="text" name="company" placeholder="company *">
         </div>
         <div class="form-group">
                <label>Selling Status</label>
                <input class="form-control" type="text" name="status" placeholder="status *">
         </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="landbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Check availability of product
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add category of Land Product
              </button>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM lands";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Product</th>
                            <th>Type of product</th>
                            <th>Reference Number</th>
                            <th>Location</th>
                            <th>Client Name</th>
                            <th>Phone Number</th>
                            <th>Agent</th>
                            <th>Company Name</th>
                            <th>Selling Status</th>
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
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['ref']; ?></td>
                            <td><?php echo $row['loc']; ?></td>
                            <td><?php echo $row['buyername']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['agent']; ?></td>
                            <td><?php echo $row['company']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                              <form action="edit-lands.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-lands.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="deletelands" class="btn btn-danger" >Delete</button>
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



