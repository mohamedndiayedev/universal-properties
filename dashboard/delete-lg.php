<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

if(isset($_POST['delete_lg']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM lg WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['status_code'] = "Record deleted with success!";
    header('Location: lg.php');
   }else 
   {
    $_SESSION['status'] = "Record not deleted!";
    header('Location: lg.php');
   }
}
?>