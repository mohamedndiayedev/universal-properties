<?php

$servername="mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username="iigi5330azzahj3c";
$password="smij1gf9l7l65kwi";
$dbname="jj0m1ku5w7a37l39";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(!$conn){
  die("Connection failed: ".mysqli_connect_error());
}

?>
