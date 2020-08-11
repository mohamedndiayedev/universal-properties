<?php 
session_start();
include('database/dbconfig.php');
include('includes/header-cheese.php');
include('includes/navbar-evaluation.php');
include('includes/scripts.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EMPLOYEE EVALUATION FORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;></span>
        </button>
      </div>
    <form action="code-evaluation.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Employee Full Name</label>
                <input class="form-control" type="text" name="cheese1" placeholder="enter data  *">
        </div>

        <div class="form-group">
                <label>Department</label>
                <input class="form-control" type="text" name="cheese2" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="cheese3" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Task Executed</label>
                <input class="form-control" type="text" name="cheese4" placeholder="enter data *">
         </div>

         <div class="form-group">
                <label>Department Manager Name</label>
                <input class="form-control" type="text" name="cheese5" placeholder="enter data *">
         </div>
         
         <div class="form-group">
                <label>Remark for Employee</label>
                <input class="form-control" type="text" name="cheese6" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Suggestion</label>
                <input class="form-control" type="text" name="cheese7" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Task assigned</label>
                <input class="form-control" type="text" name="cheese8" placeholder="enter data *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="cheese9" placeholder="enter data *">
         </div>
         
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="evaluationbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Employee Evaluation File 
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add Evalution Form
              </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Export to Excel File
              </button>
        </h6>
 <!--        <h6>
        <p><strong>Notice: </strong></p>
        </h6> -->
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM evaluation";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-striped" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee Full Name</th>
                            <th>Employee Department</th>
                            <th>Email</th>
                            <th>Task Executed</th>
                            <th>Department Manager Name</th>
                            <th>Remark for Employee</th>
                            <th>Suggestion</th>
                            <th>Task assigned</th>
                            <th>Date</th>
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
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['edept']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['task']; ?></td>
                            <td><?php echo $row['dept']; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                            <td><?php echo $row['sug']; ?></td>
                            <td><?php echo $row['tassigned']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                              <form action="edit-evaluation.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modify</button>
                             </form>
                            </td>
                            <td>
                             <form action="delete-evaluation.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delete_evaluation" class="btn btn-danger" >Delete</button>
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



