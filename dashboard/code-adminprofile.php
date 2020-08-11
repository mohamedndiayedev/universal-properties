<?php
session_start();
$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");
    if(isset($_POST['adminprofilebtn'])) 
 {
   $name = $_POST['cheese1'];
   $phone = $_POST['cheese2'];
   $address = $_POST['cheese3'];
   $amount = $_POST['cheese4'];
   $ref = $_POST['cheese5'];

    $query = "INSERT INTO adminprofile (admin,phone,email,photo,date) 
    VALUES('$name','$phone','$address','$amount','$ref') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: adminprofile.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: adminprofile.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['delete_adminprofile']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM adminprofile WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: adminprofile.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: adminprofile.php');
   }
}

   ?>
