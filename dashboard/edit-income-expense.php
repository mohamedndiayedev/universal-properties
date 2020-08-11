<?php 
session_start();
  include('includes/header.php');
  include('includes/navbar-income.php');
?>

<div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Income Expense File</h6>
      </div>
<div class="card-body">
<?php

$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");
if(isset($_POST['edit_btn'])) 
{
   $id = $_POST['edit_id'];
   $query = "SELECT * FROM incomeexpense WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
   {

    ?>
    <form action="update-income-expense.php" method="post">
        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        <div class="form-group">
                <label>Description Item</label>
                <textarea class="form-control" type="text" value="<?php echo $row['description'] ?>" name="cheese1" placeholder="enter description  *">
                </textarea>
        </div>

        <div class="form-group">
                <label>Registered Date</label>
                <input class="form-control" type="date" value="<?php echo $row['date'] ?>" name="cheese2" placeholder="enter date *">
         </div>

         <div class="form-group">
                <label>Total Income (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['income'] ?>" name="cheese3" placeholder="enter income *">
         </div>
         <div class="form-group">
                <label>Total Expense (GMD)</label>
                <input class="form-control" type="number" value="<?php echo $row['expense'] ?>" name="cheese4" placeholder="enter expense *">
         </div>

         <a href="income-expense.php" class="btn btn-danger">Cancel</a>
         <button type="submit" name="update-income" class="btn btn-primary">Update</button>
   </form>
      <?php
    }
}

?>

</div>
</div>
</div>
</div>


<?php 
  include('includes/scripts.php');
  include('includes/footer.php');
?>
