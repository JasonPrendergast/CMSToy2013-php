<?php

session_start();

define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");


$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");

$friendid = $_GET["ThisId"];
$holdid = $_SESSION['userid'];
(int)$holdid;


addfriend($holdid,$friendid);

function addfriend($holdid, $friendid){
   global $connection;
  // $password = md5($password);
 
 
$username = $connection->real_escape_string($username);
  if (!$connection->query("CALL sp_add_friend('$holdid','$friendid')")) {
   echo "CALL failed: (" . $connection->errno . ") " . $connection->error;
	printf("%d Row inserted.\n", $mysqli->affected_rows);
	header("location: ../work2/index.htm");
}
header("location: /CMSsite/membersarea.php");
}



?>