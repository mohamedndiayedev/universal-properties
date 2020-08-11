<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['updatesession']))
{
   $id = $_POST['edit_id'];
   $use1 = $_POST['cheese1'];
   $use2 = $_POST['cheese2'];
   
   $query = "UPDATE session SET user='$use1', type='$use2'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: session.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>