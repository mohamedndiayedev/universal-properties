<?php
session_start();
$connection = mysqli_connect("localhost","root","","skgambia");

    if(isset($_POST['salarybtn'])) 
 {
   $name = $_POST['name'];
   $work = $_POST['work'];
   $dept = $_POST['department'];
   $salary = $_POST['salary'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $paid = $_POST['paid'];
   $date = $_POST['date'];

    $query = "INSERT INTO salary (name,work,department,salary,phone,email,paid,date) 
    VALUES('$name','$work','$dept','$salary','$phone','$email','$paid','$date')";
    $query_run = mysqli_query($connection,$query);
 
    if ($query_run) {
        $_SESSION['success'] = "data added with success!";
        header('Location: salary.php');
    }else {
     $_SESSION['status'] = "data not added!";
     header('Location: salary.php');
    }
 
   }

/*Code helping to delete data from the Database */

if(isset($_POST['deletesalary']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM salary WHERE id='$id' ";
   $query_run = mysqli_query($connection, $query);

   if($query_run)
   {
    $_SESSION['success'] = "data deleted with success! ";
    header('Location: salary.php');
   }else 
   {
    $_SESSION['status'] = "data not deleted!";
    header('Location: salary.php');
   }
}

   ?>