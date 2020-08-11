<?php
include_once("xlsxwriter.class.php");
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$filename = "cornpuff_cheese.xlsx";

header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');

//Start DB Connection
$host = "localhost";
$user = "root";
$password = "";
$db = "skgambia";
$charset = "utf8";
//$dsn = "mysql:host=$host;dbName=$db;$charset";
$opt = [
    PDO::ATTR_ERRMODE                          =>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE               =>PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES                 =>false,
];
try
   {
       $pdo = new PDO("mysql:host=$host;dbName=$db;$charset", $user, $password);
   }catch(PDOException $e) {
       echo $e->getMessage();
   }
//End of the DB Connection

$sql = 'SELECT * FROM cheese ORDR BY id';
$query = $pdo->prepare($sql);
$query->execute();

print_r($query->fetchAll());

$write = new XLSXWriter();

while($row = $query->fetchAll()){
    $write->WriteSheetRow('id', $row);
}

$write->writeToStdOut();
exit(0);

?>