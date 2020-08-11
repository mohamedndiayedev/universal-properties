<?php 
  $connection = mysqli_connect("mkorvuw3sl6cu9ms.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","iigi5330azzahj3c","smij1gf9l7l65kwi","jj0m1ku5w7a37l39");

  $query01 = "SELECT id FROM tbl_expense ORDER BY id";
  $query_run01= mysqli_query($connection, $query01);

  $row01 = mysqli_num_rows($query_run01);

  $query02 = "SELECT id FROM cashcol ORDER BY id";
  $query_run02= mysqli_query($connection, $query02);

  $row02 = mysqli_num_rows($query_run02);

  $query03 = "SELECT id FROM cashcol ORDER BY id";
  $query_run03= mysqli_query($connection, $query03);

  $row03 = mysqli_num_rows($query_run03);

  $query04 = "SELECT id FROM adminprofile ORDER BY id";
  $query_run04= mysqli_query($connection, $query04);

  $row04 = mysqli_num_rows($query_run04);

  $query05 = "SELECT id FROM tbl_expense1 ORDER BY id";
  $query_run05= mysqli_query($connection, $query05);

  $row05 = mysqli_num_rows($query_run05);

  $query06 = "SELECT id FROM tbl_expense2 ORDER BY id";
  $query_run06= mysqli_query($connection, $query06);

  $row06 = mysqli_num_rows($query_run06);

  $query07 = "SELECT id FROM incomeexpense ORDER BY id";
  $query_run07= mysqli_query($connection, $query07);

  $row07 = mysqli_num_rows($query_run07);


?>




                     
            
