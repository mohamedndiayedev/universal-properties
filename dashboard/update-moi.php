<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['updatemoi']))
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
   $use9 = $_POST['cheese9'];
   $use10 = $_POST['cheese10'];
   
   $query = "UPDATE moi SET date='$use1', cheque='$use2', description='$use3', expenses='$use4', cash='$use5', fib='$use6', tbl='$use7', mb='$use8', sb='$use9', gmdvalue='$use10'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: moi.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>