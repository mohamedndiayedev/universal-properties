<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['update-income']))
{
   $id = $_POST['edit_id'];
   $use1 = $_POST['cheese1'];
   $use2 = $_POST['cheese2'];
   $use3 = $_POST['cheese3'];
   $use4 = $_POST['cheese4'];
   
   $query = "UPDATE incomeexpense SET description='$use1', date='$use2', income='$use3', expense='$use4'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: income-expense.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>