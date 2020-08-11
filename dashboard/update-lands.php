<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['updatelands']))
{
   $id = $_POST['edit_id'];
   $use1 = $_POST['cheese1'];
   $use2 = $_POST['cheese2'];
   $use3 = $_POST['cheese3'];
   $use4 = $_POST['cheese4'];
   $use5 = $_POST['cheese5'];
   $use6 = $_POST['cheese6'];
   $use7 = $_POST['cheese7'];
   $use8 = $_POST['cheese8'];

  

   $query = "UPDATE lands SET type='$use1', ref='$use2', loc='$use3',buyername='$use4', phone='$use5',agent='$use6',company='$use7',status='$use8'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: lands.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>