<?php 
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-salary.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employees Salary</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-salary.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Employee Full Name</label>
                <input class="form-control" type="text" name="name" placeholder="full name *">
        </div>

        <div class="form-group">
                <label>Work position</label>
                <input class="form-control" type="text" name="work" placeholder="work *">
         </div>

         <div class="form-group">
                <label>Department</label>
                <input class="form-control" type="text" name="department" placeholder="department *">
         </div>
         <div class="form-group">
                <label>Salary (GMD)</label>
                <input class="form-control" type="number" name="salary" placeholder="salary *">
         </div>
         <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="number" name="phone" placeholder="phone number *">
         </div>
         <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" placeholder="email *">
         </div>
         <div class="form-group">
                <label>Month Paid</label>
                <input class="form-control" type="text" name="paid" placeholder="month paid *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="date" placeholder="date *">
         </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="salarybtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Check Employee Salary
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add a new employee salary
              </button>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM salary";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Salary</th>
                            <th>Employee Full Name</th>
                            <th>Work Position</th>
                            <th>Department</th>
                            <th>Salary (GMD)</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Month Paid</th>
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
                            <td><?php echo $row['work']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['paid']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                              <form action="edit-salary.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-salary.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="deletesalary" class="btn btn-danger" >Delete</button>
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



