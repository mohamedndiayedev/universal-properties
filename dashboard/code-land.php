<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");
    if(isset($_POST['save_land'])) 
 {
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $amount = $_POST['amount'];
   $ref = $_POST['ref'];
   $date = $_POST['date'];
   $remark = $_POST['remark'];

    $query = "INSERT INTO cash_flow (name,phone,address,paid_amount,land_ref,date,remark) 
    VALUES('$name','$phone','$address','$amount','$ref','$date','$remark') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "Employee added with success!";
        header('Location: register-land.php');
    }else {
     $_SESSION['status'] = "Employee not added!";
     header('Location: register-land.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['delet_btn']))
{
   $id = $_POST['delet_id'];
   $query = "DELETE FROM cash_flow WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Client(e) supprimé(e) avec succès! ";
    header('Location: register-land.php');
   }else 
   {
    $_SESSION['status'] = "Client(e) non supprimé(e)!";
    header('Location: register-land.php');
   }
}

   ?>