<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['tasksbtn'])) 
 {
   $type = $_POST['tasks'];
   $reference = $_POST['details'];
   $location = $_POST['department'];
   $area = $_POST['agent'];
   $date = $_POST['date'];

    $query = "INSERT INTO tasks (tasks,details,department,agent,date) 
    VALUES('$type','$reference','$location','$area','$date')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: tasks.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: tasks.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletetasks']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM tasks WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: tasks.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: tasks.php');
   }
}

   ?>