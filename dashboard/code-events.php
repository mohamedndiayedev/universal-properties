<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['eventsbtn'])) 
 {
   $event = $_POST['event'];
   $details = $_POST['details'];
   $date = $_POST['date'];

    $query = "INSERT INTO events (event,details,date) 
    VALUES('$event','$details','$date')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: events.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: events.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deleteevents']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM events WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: events.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: events.php');
   }
}

   ?>