<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");


if(isset($_POST['update_grower']))
{
   $id = $_POST['edit_id'];
   $use1 = $_POST['cheese1'];
   $use2 = $_POST['cheese2'];
   $use3 = $_POST['cheese3'];
   $use4 = $_POST['cheese4'];
   $use5 = $_POST['cheese5'];
   $use6 = $_POST['cheese6'];
   $use7 = $_POST['cheese7'];
   $use8 = $_POST['cheese8'];
   $use9 = $_POST['cheese9'];
   $use10 = $_POST['cheese10'];
   $use11 = $_POST['cheese11'];
   $use12 = $_POST['cheese12'];
   $use13 = $_POST['cheese13'];
   $use14 = $_POST['cheese14'];
   $use15 = $_POST['cheese15'];
   $use16 = $_POST['cheese16'];
   $use17 = $_POST['cheese17'];
 
   $query = "UPDATE grower SET date='$use1', sob='$use2', nsb='$use3',tst='$use4', weight='$use5',who='$use6',cqs1='$use7',tvgmd1='$use8',
   cqs2='$use9',tvgmd2='$use10',dp='$use11',cqs3='$use12',tvgmd3='$use13',cqs4='$use14',tvgmd4='$use15',tsr='$use16',scb='$use17'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: grower.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>