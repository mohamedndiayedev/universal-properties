<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['soldbtn'])) 
 {
   $type = $_POST['type'];
   $reference = $_POST['reference'];
   $location = $_POST['location'];
   $status = $_POST['status'];

    $query = "INSERT INTO sold (type,ref,loc,status) 
    VALUES('$type','$reference','$location','$status')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: sold.php');
    }else {
     $_SESSION['status'] = "Employee not added!";
     header('Location: sold.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletesold']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM sold WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: sold.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: sold.php');
   }
}

   ?>