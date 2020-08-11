<?php
session_start();
$connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");
    if(isset($_POST['cashcolbtn'])) 
 {
   $name = $_POST['cheese1'];
   $phone = $_POST['cheese2'];
   $address = $_POST['cheese3'];
   $amount = $_POST['cheese4'];
   $ref = $_POST['cheese5'];

    $query = "INSERT INTO cashcol (agent,phone,dollar,company,date) 
    VALUES('$name','$phone','$address','$amount','$ref') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "Employee added with success!";
        header('Location: cashcol.php');
    }else {
     $_SESSION['status'] = "Employee not added!";
     header('Location: cashcol.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['delete_cashcol']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM cashcol WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: cashcol.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: cashcol.php');
   }
}

   ?>
