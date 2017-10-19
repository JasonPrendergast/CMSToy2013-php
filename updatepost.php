<?php
//updatepost

session_start();
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");
$a = $_GET["ThisId"];
$b = $_POST['content'];
$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");


if (!$a =="" and !$b ==""){
		changecontent($a,$b);
	}else{
header("location: /CMSsite/membersarea.php");
}
function changecontent( $contentid ,$content){
global $connection;
if(!$_SESSION['userid']){
	header("location: ../work2/index.htm");
}
echo $content;

$contentid = $connection->real_escape_string($contentid);
$content = $connection->real_escape_string($content);
if(!(int)$contentid){
	header("location: ../../work2/page2.htm");
}

if (!$connection->query("CALL sp_set_content_by_contentid('$contentid','$content')")) {
	header("location: /CMSsite/membersarea.php");
}else {
header("location: /CMSsite/membersarea.php");

}
}
?>