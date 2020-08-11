/*Managing the logout session from dashboard */
<?php

session_start();

if (isset($_POST['logout_btn']))
{
     session_destroy();
     unset($_SESSION['finego']);
     header('Location: ../index');
}

?>