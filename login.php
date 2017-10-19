<?php
#ini_set('display_errors', 'On');
#error_reporting(E_ALL);

session_start();
$rowcount=0;
if(isset($_SESSION['userid']))
{
    unset($_SESSION['userid']);
	} 
$username = $_POST['username'];
$password = $_POST['password'];
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");

if($username && $password )
{

var_dump($username);
	$password = md5($password);
	$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");
	$username = $connection->real_escape_string($username);
 


if (!($res = $connection->query("CALL sp_check_user_pass('$$username','$password')"))) {
   // echo "Fetch failed: (" . $connection->errno . ") " . $connection->error;
	header("location: ../work2/index.htm");
}

$row = $res->fetch_assoc();
$dbuserid = $row['userid'];
$_SESSION['userid']=$dbuserid;	
header("location: /CMSsite/membersarea.php");
		
}else{
header("location: ../../work2/page2.htm");
}


?>