<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

if(isset($_POST['update_land']))
{
   $id = $_POST['edit_id'];
   $username = $_POST['name'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $amount = $_POST['amount'];
   $ref = $_POST['ref'];
   $date = $_POST['date'];
   $remark = $_POST['remark'];

   $query = "UPDATE cash_flow SET name='$username', phone='$phone', address='$address', 
   paid_amount='$amount', land_ref='$ref', date='$date',remark='$remark' WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['success'] = "Vos infos sont mis à jour!";
        header('Location: register-land.php');

   } else {
    $_SESSION['status'] = "Infos pas à jour!";
   }
}

?>