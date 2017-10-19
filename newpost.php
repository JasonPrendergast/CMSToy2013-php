<?php
//newpost

session_start();
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");
$a = $_POST["contenttitle"];
$b = $_POST['content'];

if (!$a =="" and !$b ==""){
		
		$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");
		changecontent($a,$b);

	}else{
header("location: /CMSsite/membersarea.php");
}

function changecontent( $contenttitle ,$content){
global $connection;
if(!$_SESSION['userid']){
	header("location: ../work2/index.htm");
}

$contenttitle = $connection->real_escape_string($contenttitle);
$content = $connection->real_escape_string($content);
$userid = $_SESSION['userid'];


if (!$connection->query("CALL sp_set_new_content('$content','$contenttitle','$userid')")) {
	header("location: /CMSsite/membersarea.php");
}else {
header("location: /CMSsite/membersarea.php");

}
}
?>


