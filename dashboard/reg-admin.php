<?php
/*Code helping to connect to the databse and verify credentials */
include('security-admin.php');
$conn = mysqli_connect("localhost","root","","codou_all_db");

if(isset($_POST['register_btn'])) 
{
   $username_admin = $_POST['user'];
   $email_admin = $_POST['email'];
   $address_admin = $_POST['address'];
   $phone_admin = $_POST['phone'];
   $password_admin = md5($_POST['password']);
   $confirmpwd_admin = md5($_POST['confirmpassword']);
   $usertype = $_POST['usertype'];

   if ($password_admin === $confirmpwd_admin) {
    $query = "INSERT INTO register_admin (username,email,password,address,phone,usertype) 
    VALUES('$username_admin','$email_admin','$password_admin','$address_admin','$phone_admin','$usertype') ";
    $query_run = mysqli_query($conn,$query);
 
    if ($query_run) {
        $_SESSION['succeed'] = "Admin ajouté(e) avec succès!";
        header('Location: register-admin.php');
    }else {
     $_SESSION['status'] = "Admin non ajouté(e)! Verifiez les infos.";
     header('Location: register-admin.php');
    }
 
   } else {
    $_SESSION['status'] = "Mots de passe différents!";
    header('Location: register-admin.php');
   }
}

if(isset($_POST['report'])) 
{
   $user = $_POST['name'];
   $cal = $_POST['calorie'];
   $plat = $_POST['plat'];
   $flegume = $_POST['flegume'];
   $exercice = $_POST['exp'];
   $eau = $_POST['conseau'];

    $query = "INSERT INTO tablepaginate (name,calorie,plat,flegume,exp,conseau) 
    VALUES('$user','$cal','$plat','$flegume','$exercice','$eau') ";
    $query_run = mysqli_query($conn,$query);
 
    if ($query_run) {
        $_SESSION['succeed'] = "Rapport ajouté avec succès!";
        header('Location: create-report.php');
    }else {
     $_SESSION['status'] = "Rapport non ajouté! Verifiez les infos.";
     header('Location: create-report.php');
    }
   }
   
/*Code helping to update data from the Database */


if(isset($_POST['updatebtn']))
{
   $id = $_POST['edit_id'];
   $username = $_POST['edit_username'];
   $email = $_POST['edit_email'];
   $address = $_POST['edit_address'];
   $phone = $_POST['edit_phone'];
   $password = $_POST['edit_password'];
   $usertype = $_POST['edit_usertype'];

   $query = "UPDATE register_admin SET username='$username', email='$email', address='$address', 
   phone='$phone', password='$password',usertype='$usertype' WHERE id='$id'";
   $query_run = mysqli_query($conn, $query);

   if ($query_run)
    {
       $_SESSION['success'] = "Vos infos sont mis à jour!";
        header('Location: register-admin.php');

   } else {
    $_SESSION['status'] = "Infos pas à jour!";
   }
}
/*Code helping to update report diet */
if(isset($_POST['maj_info']))
{
   $id = $_POST['editer_id'];
   $name = $_POST['name'];
   $calorie = $_POST['calorie'];
   $plat = $_POST['plat'];
   $flegume = $_POST['flegume'];
   $exp = $_POST['exp'];
   $conseau = $_POST['conseau'];

   $query = "UPDATE tablepaginate SET name='$name', calorie='$calorie', plat='$plat', 
   flegume='$flegume', exp='$exp',conseau='$conseau' WHERE ID_Client='$id'";
   $query_run = mysqli_query($conn, $query);

   if ($query_run)
    {
       $_SESSION['success'] = "Rapport mis à jour!";
        header('Location: create-report.php');

   } else {
    $_SESSION['status'] = "Rapport non mis à jour!";
   }
}
/*Code helping to delete data from the Database */

if(isset($_POST['delete_btn']))
{
   $id = $_POST['delete_id'];
   $query = "DELETE FROM register_admin WHERE id='$id' ";
   $query_run = mysqli_query($conn, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Client(e) supprimé(e) avec succès! ";
    header('Location: register-admin.php');
   }else 
   {
    $_SESSION['status'] = "Cleint(e) non supprimé(e)!";
    header('Location: register-admin.php');
   }
}
if(isset($_POST['delete_rapport']))
{
   $id = $_POST['supprimer_id'];
   $query = "DELETE FROM tablepaginate WHERE ID_Client='$id' ";
   $query_run = mysqli_query($conn, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Rapport supprimé avec succès! ";
    header('Location: create-report.php');
   }else 
   {
    $_SESSION['status'] = "Rapport non supprimé!";
    header('Location: create-report.php');
   }
}

/*Managing the lofin restrictions */

if(isset($_POST['loginbtn'])) {
  
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register_admin WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($conn, $query);

    
   if (mysqli_fetch_array($query_run))
   {
    $_SESSION['fineclient'] = $email_login;
    header('Location: index.php');
   }
   else 
   {
    $_SESSION['status'] = "Votre email ou mot de passe est invalide Coach!";
    $_SESSION['status_code'] = "error";
    header('Location: ../register-admin.php');
   }
}

?>