<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['attendancebtn'])) 
 {
   $name = $_POST['cheese1'];
   $phone = $_POST['cheese2'];
   $address = $_POST['cheese3'];
   $amount = $_POST['cheese4'];
   $ref = $_POST['cheese5'];
   $r6 = $_POST['cheese6'];

    $query = "INSERT INTO attendance (admin,phone,email,work,status,date) 
    VALUES('$name','$phone','$address','$amount','$ref','$r6') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: attendance.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: attendance.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['delete_attendance']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM attendance WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: attendance.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: attendance.php');
   }
}

   ?>