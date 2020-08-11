<?php 
session_start();
include('database/dbconfig.php');
include('includes/header.php');
include('includes/navbar-meeting.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tracking Meetings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"&times;</span>
        </button>
      </div>


    <form action="code-meeting.php" method="POST">
        <div class="modal-body">

        <div class="form-group">
                <label>Subject</label>
                <input class="form-control" type="text" name="subject" placeholder="subject of the meeting  *">
        </div>

        <div class="form-group">
                <label>Time</label>
                <input class="form-control" type="text" name="time" placeholder="time *">
         </div>

         <div class="form-group">
                <label>Place</label>
                <input class="form-control" type="text" name="place" placeholder="place *">
         </div>
         <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="date" placeholder="status *">
         </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="meetingbtn" class="btn btn-primary">Save</button>
        </div>
    </form>

    </div>
   </div>
</div>

      <div class="container-fluid">

      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Check Meetings
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                  Add a new meeting
              </button>
        </h6>
     </div>
      <div class="table-responsive">

       <?php 
           $query = "SELECT * FROM meeting";
           $query_run = mysqli_query ($connection, $query);
       ?>
           <table class="table table-bordered" id="dataTable" while="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>mId Meeting</th>
                            <th>Subject of meeting</th>
                            <th>Time</th>
                            <th>Place</th>
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
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['place']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                              <form action="edit-meeting.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
                                <button type="submit" name="edit_btn" class="btn btn-success">Modidy</button>
                             </form>
                            </td>
                            <td>
                             <form action="code-meeting.php" method="post"> 
                             <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>"> 
                        <button type="submit" name="deletemeeting" class="btn btn-danger" >Delete</button>
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



