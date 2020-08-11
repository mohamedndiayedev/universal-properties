
<?php

$connexion = mysqli_connect("localhost","root","","codou_all_db");


if(isset($_POST['register_admin']))
{
    $nom = $_POST['nom_admin'];
    $occupation = $_POST['occup_admin'];
    $description = $_POST['descrip_admin'];
    $skype = $_POST['skypeid'];
    $imageadmin = $_POST['photo_admin'];

    $query = "INSERT INTO profileinfos (nomadmin,occupadmin,descripadmin,skypeid,photoadmin) 
    VALUES('$nom','$occupation','$description','$skype','$imageadmin')";
    $query_run = mysqli_query($connexion, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Admin infos profile  ajouté!";
        header('Location: admin-profile.php');
    }
    } else

    {
        $_SESSION['status'] = "Admin infos profile non ajouté!";
        header('Location: admin-profile.php');
    } 
    

if(isset($_POST['update_profile']))
{
   $id = $_POST['id'];
   $name = $_POST['edit_nom'];
   $occupation = $_POST['edit_occu'];
   $description = $_POST['edit_desc'];
   $skype = $_POST['skypeid'];
   $imageadmin = $_POST['edit_pic'];


   $query = "UPDATE profileinfos SET nomadmin='$name', occupadmin='$occupation', skypeid='$skype', descripadmin='$description', 
   photoadmin='$imageadmin' 
   WHERE id='$id'";

   $query_run = mysqli_query($connexion, $query);

   if ($query_run)
    {
       $_SESSION['success'] = "Vos infos sont mis à jour!";
        header('Location: admin-profile.php');

   } else {
    $_SESSION['status'] = "Admin Infos pas à jour!";
    header('Location: admin-profile.php');
   }
}

if(isset($_POST['delete_admin']))
{
   $id = $_POST['id'];
   $query = "DELETE FROM profileinfos WHERE id='$id' ";
   $query_run = mysqli_query($connexion, $query);

   if($query_run)
   {
    $_SESSION['success'] = "Profile Admin supprimé avec succès! ";
    header('Location: admin-profile.php');
   }else 
   {
    $_SESSION['status'] = "Profile Admin non supprimé!";
    header('Location: admin-profile.php');
   }
}




?>