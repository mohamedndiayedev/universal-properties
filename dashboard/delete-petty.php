<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

if(isset($_POST['delete_petty']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM petty WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: petty.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: petty.php');
   }
}

?>