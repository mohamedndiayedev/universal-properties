<?php
session_start();
$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");

if(isset($_POST['delete_cashcol']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM cashcol WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['status_code'] = "Record deleted with success!";
    header('Location: cashcol.php');
   }else 
   {
    $_SESSION['status'] = "Record not deleted!";
    header('Location: cashcol.php');
   }
}
?>
