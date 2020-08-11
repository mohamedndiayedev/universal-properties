<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['datalands'])) 
 {
   $type = $_POST['type'];
   $reference = $_POST['reference'];
   $location = $_POST['location'];
   $area = $_POST['area'];
   $company = $_POST['company'];
   $status = $_POST['status'];

    $query = "INSERT INTO datalands (type,ref,loc,area,company,status) 
    VALUES('$type','$reference','$location','$area','$company','$status')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: datalands.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: datalands.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletedatalands']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM datalands WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: datalands.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: datalands.php');
   }
}

   ?>