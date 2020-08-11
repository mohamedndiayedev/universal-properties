<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['meetingbtn'])) 
 {
   $type = $_POST['subject'];
   $reference = $_POST['time'];
   $location = $_POST['place'];
   $status = $_POST['date'];

    $query = "INSERT INTO meeting (subject,time,place,date) 
    VALUES('$type','$reference','$location','$status')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: meeting.php');
    }else {
     $_SESSION['status'] = "Employee not added!";
     header('Location: meeting.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletemeeting']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM meeting WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: meeting.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: meeting.php');
   }
}

   ?>