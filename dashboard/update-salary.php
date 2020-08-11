<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['updatesalary']))
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
 
   $query = "UPDATE salary SET name='$use1', work='$use2', department='$use3', salary='$use4', phone='$use5', email='$use6', paid='$use7', date='$use8'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: salary.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>