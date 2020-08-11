<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['regmanager'])) 
 {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $dept = $_POST['dept'];

    $query = "INSERT INTO managers (username,email,address,phone,dept) 
    VALUES('$name','$email','$address','$phone','$dept') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "Manager added with success!";
        header('Location: managers.php');
    }else {
     $_SESSION['status'] = "Manager not added!";
     header('Location: managers.php');
    }
 
   }
/*Code helping to delete data from the Database */

if(isset($_POST['delmanager']))
{
   $id = $_POST['delet_id'];
   $query = "DELETE FROM managers WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Client(e) supprimé(e) avec succès! ";
    header('Location: managers.php');
   }else 
   {
    $_SESSION['status'] = "Client(e) non supprimé(e)!";
    header('Location: managers.php');
   }
}

   ?>