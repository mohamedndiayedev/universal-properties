<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-petty.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PETTY CASH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-petty.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Balance (GMD)</label>
                <input class="form-control" type="number" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Replenishment Amount (GMD)</label>
                <input class="form-control" type="number" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Payment Amount (GMD)</label>
                <input class="form-control" type="number" name="cheese5" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Total (GMD)</label>
                <input class="form-control" type="number" name="cheese6" placeholder="enter data *">
         </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="pettybtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Petty Cash File
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add data
              </button>
<!--               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Export to Excel File
              </button> -->
              <a href="excel.php"  class="btn btn-primary">Export file to Excel</a>
        </h6><br/> 
        <h6>
        <p><strong>PETTY CASH</strong></p>
        <p><strong>Spredsheet</strong></p>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM petty";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Balance (GMD)</th>
                            <th>Date</th>
                            <th>Replenishment Amount (GMD)</th>
                            <th>Description</th>
                            <th>Payment Amount (GMD)</th>
                            <th>Total (GMD)</th>
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
                            <td><?php echo $row['balance']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['reple']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['payment']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            <td>
                              <form action="edit-petty.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="delete-petty.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_petty" class="btn btn-danger" >Delete</button>
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



