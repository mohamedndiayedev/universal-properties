<?php
session_start();
$connection = mysqli_connect("iwqrvsv8e5fz4uni.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","ybohxgtnw8ag3b1l","xtf6joq3n6czftrh","v1ydnphp6nxbbqix");


if(isset($_POST['updatebrs']))
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
   
   $query = "UPDATE evalution SET name='$use1', edept='$use2', email='$use3', task='$use4', dept='$use5', remark='$use6', sug='$use7', tassigned='$use8', date='$use9'
    WHERE id='$id'";
   $query_run = mysqli_query($connection, $query);

   if ($query_run)
    {
       $_SESSION['status_code'] = "File updated with success!";
        header('Location: brs.php');

   } else {
    $_SESSION['status'] = "File not updated";
   }
}

?>