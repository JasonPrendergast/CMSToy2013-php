<?php

session_start();

define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");


$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");
 
$a = $_POST['username'];
$b = $_POST['password'];
$c = $_POST['firstname'];
$d = $_POST['lastname'];
$e = $_POST['email'];

addNewUser($a,$b,$c,$d,$e);

function addNewUser($a,$b,$c,$d,$e){
   global $connection;
   $b = $connection->real_escape_string($b);
   $b = md5($b);
 
 
$a = $connection->real_escape_string($a);
$c = $connection->real_escape_string($c);
$d = $connection->real_escape_string($d);
$e = $connection->real_escape_string($e);
  if (!$connection->query("CALL sp_new_user('$a','$b','$c','$d','$e')")) {
   echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	printf("%d Row inserted.\n", $mysqli->affected_rows);
	header("location: ../work2/index.htm");
}
header("location: ../../work2/page2.htm");
}



?>