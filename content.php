<?php
session_start();
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");
$contentid = $_GET["ThisId"];


if(!$_SESSION['userid']){
	header("location: ../work2/index.htm");
}
	$holdid = $_SESSION['userid'];
	
	if (!(int)$holdid){
	header("location: ../work2/index.htm");
	}
	$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");
	$contentid= $connection->real_escape_string($contentid);
	$holdid= $connection->real_escape_string($holdid);
	$query = $connection->multi_query("CALL sp_get_content_by_contentid('$contentid','$holdid')");
	
	if ($query) {
			$result = $connection->use_result();
			
			while($rows = $result->fetch_assoc()){
				
				$cur_content = $rows['content'];
							
			}
			}else{
		
				header("location: ../work2/index.htm");
			}
			if(!$cur_content){
				header("location: ../work2/index.htm");
				}
			$result ->free();

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

#contentDiv{
	position:absolute;
	width:263px;
	height:137px;
	z-index:1;
	margin-left: -400px;
	left: 697px;
	background-color: black;
	top: 104px;
}
#exitDiv{
	position:absolute;
	width:139px;
	height:25px;
	z-index:1;
	margin-left: -400px;
	left: 793px;
	background-color: black;
	top: 254px;
}
#topDiv{
	position:absolute;
	width:1030px;
	height:1573px;
	z-index:1;
	margin-left: -400px;
	left: 50%;
	background-image: url(../work2/IMAGE/BOTMAN.JPG);
	background-repeat:no-repeat;
}
input {
    border: 5px solid white; 
    -webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    -moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    padding: 15px;
    background: rgba(255,255,255,0.5);
    margin: 0 0 10px 0;
}
input[type=text] {
	border: 5px solid white;
	-webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1);
	-moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1);
	box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1);
	padding: 15px;
	background: rgba(255,255,255,255);
	margin: 0 0 10px 0;
	width: 350px;
}
body {
	background-color: #000;
	text:red;
}
form{
	background-color:#000}
</style>
</head>




<body>

<div id="topDiv">
<div id="contentDiv">
			<form action="updatepost.php?ThisId=<?php echo $contentid ?>" method="POST">
				<input type="text" name="content" value="<?php echo $cur_content?>"><p></p>
				
				<input type="submit" name="submit" value="save">
				
		  </form>
 		</div>
        <div id="exitDiv"><a href='logout.php'>Click Here to logout</a></div>
		
</div>

</body>
</html>