<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['sessionbtn'])) 
 {
   $name = $_POST['cheese1'];
   $phone = $_POST['cheese2'];

    $query = "INSERT INTO session (user,type) 
    VALUES('$name','$phone') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: session.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: session.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['delete_session']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM session WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: session.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: session.php');
   }
}

   ?>