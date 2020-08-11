<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

if(isset($_POST['sugarbtn'])) 
{
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
   $use18 = $_POST['cheese18'];
   $use19 = $_POST['cheese19'];

    $query = "INSERT INTO sugar (date,sob,nsb,tst,bbsc,upb,rtgmd,cqs,tvgmd1,cqs1,tvgmd2,wpgmd,cqs2,tvgmd3,cqs3,tvgmd4,gpb,tsr,scb) 
    VALUES('$use1','$use2','$use3','$use4','$use5','$use6','$use7','$use8','$use9','$use10',
    '$use11','$use12','$use13','$use14','$use15','$use16','$use17','$use18','$use19') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['status_code'] = "Record added with success!";
        header('Location: sugar.php');
    }else {
     $_SESSION['status'] = "Record not added!";
     header('Location: sugar.php');
    }

}
?>