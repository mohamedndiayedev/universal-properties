<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['moibtn'])) 
 {
   $date = $_POST['cheese1'];
   $cheque = $_POST['cheese2'];
   $description = $_POST['cheese3'];
   $expenses = $_POST['cheese4'];
   $cash = $_POST['cheese5'];
   $fib = $_POST['cheese6'];
   $tbl = $_POST['cheese7'];
   $mb = $_POST['cheese8'];
   $sb  = $_POST['cheese9'];
   $gmdvalue = $_POST['cheese10'];

    $query = "INSERT INTO moi (date,cheque,description,expenses,cash,fib,tbl,mb,sb,gmdvalue) 
    VALUES('$date','$cheque','$description','$expenses','$cash','$fib','$tbl','$mb','$sb','$gmdvalue')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: moi.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: moi.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletereca']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM moi WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: moi.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: moi.php');
   }
}

   ?>