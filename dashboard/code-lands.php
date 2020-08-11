<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['landbtn'])) 
 {
   $type = $_POST['type'];
   $reference = $_POST['reference'];
   $location = $_POST['location'];
   $client = $_POST['client'];
   $phone = $_POST['phone'];
   $agent = $_POST['agent'];
   $company = $_POST['company'];
   $status = $_POST['status'];

    $query = "INSERT INTO lands (type,ref,loc,buyername,phone,agent,company,status) 
    VALUES('$type','$reference','$location','$client','$phone','$agent','$company','$status')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: lands.php');
    }else {
     $_SESSION['status'] = "Employee not added!";
     header('Location: lands.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletelands']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM lands WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: lands.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: lands.php');
   }
}

   ?>