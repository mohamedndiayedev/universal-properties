<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['income-expensebtn'])) 
 {
   $deposit = $_POST['cheese1'];
   $withdrawal = $_POST['cheese2'];
   $balance = $_POST['cheese3'];
   $description = $_POST['cheese4'];

    $query = "INSERT INTO incomeexpense (description,date,income,expense) 
    VALUES('$deposit','$withdrawal','$balance','$description')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: income-expense.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: income-expense.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['delete_income-expense']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM incomeexpense WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: income-expense.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: income-expense.php');
   }
}

   ?>