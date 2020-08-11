<?php 
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-employee.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Infos Land Processing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-land.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Client Name</label>
                <input class="form-control" type="text" name="name" placeholder="Full Name  *">
        </div>

        <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="text" name="phone" placeholder="Phone Number*">
         </div>

         <div class="form-group">
                <label>Adress</label>
                <input class="form-control" type="text" name="address" placeholder="Address *">
         </div>
         <div class="form-group">
                <label>Paid Amount (in dollar)</label>
                <input class="form-control" type="text" name="amount" placeholder="Paid Amount *">
         </div>

         <div class="form-group">
                <label>Land Reference</label>
                <input class="form-control" type="text" name="ref" placeholder="Land reference *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="date" placeholder="Date *">
         </div>
         <div class="form-group">
                <label>Remark</label>
                <select  name="remark">
                <option style="color:black" value="null" size="3">Select one status</option>
                <option value="Paid" style="color:green">Paid</option>
                <option value="Not Paid" style="color:red">Not Paid</option>
                <option value="Paid" style="color:yellow">Pending</option>
                </select>
         </div>

         <input type="hidden" name="user-type" value="admin"></input>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="save_land" class="btn btn-primary">Save</button>
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
                  Add a land selling process
              </button>
        </h6>
     </div>

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
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Paid Amount</th>
                            <th>Land Reference</th>
                            <th>Date</th>
                            <th>Remark</th>
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
                              <form action="edit-land.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-land.php" method="post"> 
                             <input type="hidden" name="delet_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delet_btn" class="btn btn-danger" >Delete</button>
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



