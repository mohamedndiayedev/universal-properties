<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['pettybtn'])) 
 {
   $balance = $_POST['cheese1'];
   $date = $_POST['cheese2'];
   $reple= $_POST['cheese3'];
   $descript = $_POST['cheese4'];
   $payment = $_POST['cheese5'];

    $query = "INSERT INTO petty (balance,date,reple,description,payment,total) 
    VALUES('$balance','$date','$reple','$descript','$payment','$total')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: petty.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: petty.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletepetty']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM petty WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: petty.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: petty.php');
   }
}

   ?>