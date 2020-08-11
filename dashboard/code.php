<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

if(isset($_POST['registerbtn'])) 
{
   $username = $_POST['username'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $work = $_POST['work'];

    $query = "INSERT INTO employee (username,email,address,phone,work) 
    VALUES('$username','$email','$address','$phone','$work') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "Employee added with success!";
        header('Location: register.php');
    }else {
     $_SESSION['status'] = "Employee not added!";
     header('Location: register.php');
    }

}
?>