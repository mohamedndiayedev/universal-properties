<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['updatedatalands']))
{
   $id = $_POST['edit_id'];
   $use1 = $_POST['cheese1'];
   $use2 = $_POST['cheese2'];
   $use3 = $_POST['cheese3'];
   $use4 = $_POST['cheese4'];
   $use5 = $_POST['cheese5'];
   $use6 = $_POST['cheese6'];

   
   $query = "UPDATE datalands SET type='$use1', ref='$use2', loc='$use3',area='$use4',company='$use5',status='$use6'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: datalands.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>