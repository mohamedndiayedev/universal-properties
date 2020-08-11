<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-income.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INCOME - EXPENSE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-income.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Description Item</label>
                <textarea class="form-control" type="text" name="cheese1" placeholder="enter description  *">
                </textarea>
        </div>

        <div class="form-group">
                <label>Registered Date</label>
                <input class="form-control" type="date" name="cheese2" placeholder="enter date *">
         </div>

         <div class="form-group">
                <label>Total Income (GMD)</label>
                <input class="form-control" type="number" name="cheese3" placeholder="enter income *">
         </div>
         <div class="form-group">
                <label>Total Expense (GMD)</label>
                <input class="form-control" type="number" name="cheese4" placeholder="enter expense *">
         </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="income-expensebtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Income - Expense File
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add data income & expense
              </button>
        </h6><br/> 
        <h6>
        <p><strong>Record Book - Income & Expense</strong></p>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM incomeexpense";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description Item</th>
                            <th>Registered Date</th>
                            <th>Total Income (GMD)</th>
                            <th>Total expense (GMD)</th>
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
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['income']; ?></td>
                            <td><?php echo $row['expense']; ?></td>
                            <td>
                              <form action="edit-income-expense.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modify</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-income.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_income-expense" class="btn btn-danger" >Delete</button>
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



