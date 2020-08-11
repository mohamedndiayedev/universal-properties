<?php 
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-events.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tracking Company's Events</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-events.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Event</label>
                <input class="form-control" type="text" name="event" placeholder="event *">
        </div>

        <div class="form-group">
                <label>Details</label>
                <input class="form-control" type="text" name="details" placeholder="specify details*">
         </div>

         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="date" placeholder="date *">
         </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="eventsbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Check Company's Events
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add a new event
              </button>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM events";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Event</th>
                            <th>Specify Event's Name</th>
                            <th>Provide Details</th>
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
                            <td><?php echo $row['event']; ?></td>
                            <td><?php echo $row['details']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                              <form action="edit-events.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-events.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="deleteevents" class="btn btn-danger" >Delete</button>
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



