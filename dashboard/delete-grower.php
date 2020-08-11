<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

if(isset($_POST['delete_grower']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM grower WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['status_code'] = "Record deleted with success!";
    header('Location: grower.php');
   }else 
   {
    $_SESSION['status'] = "Record not deleted!";
    header('Location: grower.php');
   }
}
?>