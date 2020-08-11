<?php
session_start();
$connection = mysqli_connect("iwqrvsv8e5fz4uni.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","ybohxgtnw8ag3b1l","xtf6joq3n6czftrh","v1ydnphp6nxbbqix");
    if(isset($_POST['evaluationbtn'])) 
 {
   $t1 = $_POST['cheese1'];
   $t2 = $_POST['cheese2'];
   $t3 = $_POST['cheese3'];
   $t4 = $_POST['cheese4'];
   $t5 = $_POST['cheese5'];
   $t6 = $_POST['cheese6'];
   $t7 = $_POST['cheese7'];
   $t8 = $_POST['cheese8'];
   $t9 = $_POST['cheese9'];

    $query = "INSERT INTO evaluation (name,email,edept,task,dept,remark,sug,tassigned,date) 
    VALUES('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9') ";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "Evaluation added with success!";
        header('Location: evaluation.php');
    }else {
     $_SESSION['status'] = "Evaluation not added!";
     header('Location: evalution.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['delete_evaluation']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM evaluation WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: evaluation.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: evaluation.php');
   }
}

   ?>