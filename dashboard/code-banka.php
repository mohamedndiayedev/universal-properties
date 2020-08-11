<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['bankabtn'])) 
 {
   $deposit = $_POST['cheese1'];
   $withdrawal = $_POST['cheese2'];
   $balance = $_POST['cheese3'];
   $description = $_POST['cheese4'];
   $date = $_POST['cheese5'];

    $query = "INSERT INTO banka (deposit,withdrawal,balance,description,date) 
    VALUES('$deposit','$withdrawal','$balance','$description','$date')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: banka.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: banka.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletebanka']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM banka WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: banka.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: banka.php');
   }
}

   ?>