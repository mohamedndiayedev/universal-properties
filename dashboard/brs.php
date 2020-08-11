<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-brf.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SKY HIGH BANK RECONCILIATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-brs.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Balance as per Cash Book (GMD)</label>
                <input class="form-control" type="number" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Add: Unrepresented Cheque<br/>Details:</label>
                <textarea class="form-control" type="text" name="cheese2" placeholder="enter data *">
                </textarea>
         </div>

         <div class="form-group">
                <label>Less: Uncleared Cheque<br/>Amount: (GMD)</label>
                <input class="form-control" type="number" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Less Bank Charges<br/>Details:</label>
                <textarea class="form-control" type="text" name="cheese4" placeholder="enter data *">
                </textarea>
         </div>
         <div class="form-group">
                <label>Closing Balance per Reconcilition (GMD)<br/>Bank Statement</label>
                <input class="form-control" type="number " name="cheese5" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Comment</label>
                <textarea class="form-control" type="text" name="cheese6" placeholder="enter data *">
                </textarea>
         </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="brsbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">FIB Bank Reconciliation File
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add data bank 
              </button>
<!--               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Export to Excel File
              </button> -->
              <a href="excel.php"  class="btn btn-primary">Export file to Excel</a>
        </h6><br/> 
        <h6>
        <p><strong>AFRI OIL & GAS</strong></p>
        <p><strong>Cash Book Extracts</strong></p>
        <p><strong>Sky High Bank Reconciliation Statement</strong></p>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM brs";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cash Book Balance (GMD):</th>
                            <th>Add: Unrepresented Cheque<br/>Details:</th>
                            <th>Less: Uncleared Cheque<br/>Details (GMD):</th>
                            <th>Less Bank Charges:</th>
                            <th>Closing Balance per Reconcilition (GMD)<br/>Bank Statement:</th>
                            <th>Comment:</th>
                            <th>Modify</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                    <p>The difference was due to the bank charges not recorded in a cash book</p>
        <?php 
        
        if(mysqli_num_rows($query_run) > 0){
           
          while ($row = mysqli_fetch_assoc($query_run)) 
          {
            ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['balance']; ?></td>
                            <td><?php echo $row['less1']; ?></td>
                            <td><?php echo $row['less2']; ?></td>
                            <td><?php echo $row['less3']; ?></td>
                            <td><?php echo $row['closing']; ?></td>
                            <td><?php echo $row['comment']; ?></td>
                            <td>
                              <form action="edit-brs.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-brs.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="deletebrs" class="btn btn-danger" >Delete</button>
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
     <h6>
        <p><strong>Prepared by:...................</strong></p>
        <p><strong>Approved by:...................</strong></p>
        </h6>
<?php 
  include('includes/scripts.php');
  include('includes/footer.php');
?>
   </div>

</div>



