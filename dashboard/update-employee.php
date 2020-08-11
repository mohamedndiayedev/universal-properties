<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['update']))
{
   $id = $_POST['edit_id'];
   $username = $_POST['name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $work = $_POST['work'];

   $query = "UPDATE employee SET username='$username', email='$email', address='$address', 
   phone='$phone', work='$work' WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['success'] = "Vos infos sont mis à jour!";
        header('Location: register.php');

   } else {
    $_SESSION['status'] = "Infos pas à jour!";
   }
}

?>