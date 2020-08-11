<?php
session_start();
include('database/dbconfig-client.php');



if (!$_SESSION['accesscheck'])

{
    header('Location: ../register.php');
} 





?>