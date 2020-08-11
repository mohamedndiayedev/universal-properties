<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
   if(isset($_POST['delet_bank']))
{
   $id = $_POST['delet_id'];
   $query = "DELETE FROM bank WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Client(e) supprimé(e) avec succès! ";
    header('Location: bank_related.php');
   }else 
   {
    $_SESSION['status'] = "Client(e) non supprimé(e)!";
    header('Location: bank_related.php');
   }
}
?>