<?php 
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-bank.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Infos Related Banks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-bank.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Bank Name</label>
                <input class="form-control" type="text" name="bank" placeholder="Bank full name  *">
        </div>

        <div class="form-group">
                <label>Account Number</label>
                <input class="form-control" type="text" name="numb" placeholder="Account Number*">
         </div>

         <input type="hidden" name="user-type" value="admin"></input>


        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="save_bank" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Infos Related Banks
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add a new Bank
              </button>
        </h6>
     </div>

      <div class="table-responsive">

       <?php 
           $connection = mysqli_connect("localhost","root","","skgambia");
           $query = "SELECT * FROM bank";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Bank</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
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
                            <td><?php echo $row['bank_name']; ?></td>
                            <td><?php echo $row['account_number']; ?></td>
                            <td>
                              <form action="edit_bank.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="delete_bank.php" method="post"> 
                             <input type="hidden" name="delet_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="delet_bank" class="btn btn-danger" >Delete</button>
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



