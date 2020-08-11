<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-reca.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REVENUE AGAINST EXPENDITURE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-moi.php" method="POST">
        <div class="modal-body">
        
        <div class="form-group">
                <label>Incomes/Date</label>
                <input class="form-control" type="date" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Cheque #</label>
                <input class="form-control" type="text" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="cheese3" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Expenses/Descrption</label>
                <input class="form-control" type="text" name="cheese4" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>CASH</label>
                <input class="form-control" type="number " name="cheese5" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>FIB</label>
                <input class="form-control" type="number" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>TBL</label>
                <input class="form-control" type="number" name="cheese7" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>MEGA Bank</label>
                <input class="form-control" type="number" name="cheese8" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Sky Bank</label>
                <input class="form-control" type="number" name="cheese9" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>GMD VALUE</label>
                <input class="form-control" type="number" name="cheese10" placeholder="enter data *">
         </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="moibtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">REVENUE AGAINST EXPENDITURE
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add data file data
              </button>
<!--               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Export to Excel File
              </button> -->
              <a href="excel.php"  class="btn btn-primary">Export file to Excel</a>
        </h6><br/> 
        <h6>
        <p><strong>REVENUE AGAINST EXPENDITURE</strong></p>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM moi";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Incomes/Date</th>
                            <th>Cheque #</th>
                            <th>Description</th>
                            <th>Expenses/Description</th>
                            <th>CASH</th>
                            <th>FIB</th>
                            <th>TBL</th>
                            <th>Mega Bank</th>
                            <th>Sky Bank</th>
                            <th>GMD Value</th>
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
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['cheque']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['expenses']; ?></td>
                            <td><?php echo $row['cash']; ?></td>
                            <td><?php echo $row['fib']; ?></td>
                            <td><?php echo $row['tbl']; ?></td>
                            <td><?php echo $row['mb']; ?></td>
                            <td><?php echo $row['sb']; ?></td>
                            <td><?php echo $row['gmdvalue']; ?></td>
                            <td>
                              <form action="edit-moi.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-moi.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="deletereca" class="btn btn-danger" >Delete</button>
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



