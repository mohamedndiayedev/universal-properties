<?php 
include('security-admin.php');
include('includes/header.php');
include('includes/navbar-cashflow.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Selling Process Infos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Full Name</label>
                <input class="form-control" type="text" name="name" placeholder="Full Name  *">
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
                <label>Paid Amount (dollar)</label>
                <input class="form-control" type="text" name="amount" placeholder="Paid amount in dollar *">
         </div>
         <div class="form-group">
                <label>Land Reference</label>
                <input class="form-control" type="text" name="ref" placeholder="Reference *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="date" placeholder="date *">
         </div>         <div class="form-group">
                <label>Remark</label>
                <input class="form-control" type="text" name="work" placeholder="Paid or Not Paid *">
         </div>

         <input type="hidden" name="user-type" value="admin"></input>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="saveland" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Infos Land Selling Process
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add Land Selling Process Status
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
           $connection = mysqli_connect("localhost","root","","skgambia");
           $query = "SELECT * FROM cash_flow";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Client</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Paid Amount</th>
                            <th>Land Reference</th>
                            <th>Date</th>
                            <th>Selling Status</th>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['paid_amount']; ?></td>
                            <td><?php echo $row['land_ref']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                            <td>
                              <form action="register-edit.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_btn" class="btn btn-danger" >Delete</button>
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



