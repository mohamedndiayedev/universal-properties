<?php

include('security-client.php');
$connection = mysqli_connect("localhost","root","","codou_all_db");

if(isset($_POST['rv_btn'])) 
{
   $name = $_POST['name'];
   $email = $_POST['email'];
   $telephone = $_POST['phone'];
   $message = $_POST['message'];

    $query = "INSERT INTO rendezvous(nom,email,telephone,message) 
    VALUES('$name','$email','$telephone','$message') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['status'] = "Message envoyé avec succès!";
        $_SESSION['status_code'] ="success";
        header('Location: ../index.php');
    }else {
     $_SESSION['status'] = "Message non envoyé! Verifiez les infos.";
     $_SESSION['status_code'] ="error";
     header('Location: ../index.html');
    }

}

if(isset($_POST['delete_msg']))
{
   $id = $_POST['id'];
   $query = "DELETE FROM rendezvous WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Message supprimé avec succès! ";
    header('Location: rendezvous-page.php');
   }else 
   {
    $_SESSION['status'] = "Message non supprimé!";
    header('Location: rendezvous-page.php');
   }
}

?> 