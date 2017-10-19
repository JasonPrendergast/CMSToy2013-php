<?php
session_start();
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");
$loopcount = 0;

if(!$_SESSION['userid']){
	header("location: ../work2/index.htm");
}
	$holdid = $_SESSION['userid'];
	if (!(int)$holdid){
	header("location: ../work2/index.htm");
	}
	$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");
	$holdid= $connection->real_escape_string($holdid);
	$query2 = $connection->multi_query("CALL sp_get_title_by_user('$holdid')");
	
	if ($query2) {
			$result2 = $connection->use_result();
			
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
	* {
		margin: 0px;
		padding: 0px;
		}
	body {
		font-family: verdana;
		padding: 50px
		background-color: black;
		text:red;
		}
	
	h1 {
		text-align:center;
		border-bottom: 2px solid #009;
		margin-bottom: 50px;
		}
		
	/* rules for navigation menu */
	/* ================================*/
	
	ul#navmenu, ul.sub1, ul.sub2 {
		list-style-type: none;
		
		}
		
	ul#navmenu li {
		width: 125px;
		text-align: center;
		position: relative;
		float: left;
		margin-right: 4px;
		}
	ul#navmenu a {
		text-decoration: none;
		display: block;
		width: 125px;
		height: 25;
		line-height: 25px;
		background-color: #FFF;
		border: 1px solid #CCC;
		border-radius: 5px;
		}
	
	ul#navmenu .sub1 li {
		border: 1px solid green;
		}
		
	ul#navmenu .sub1 a {
		margin-top: 3px;
		}
	ul#navmenu .sub2 a {
		margin-left: 10px;
		}
		
	ul#navmenu li:hover > a {
		background-color: #CFC;
		}
		
	ul#navmenu li:hover a:hover {
		background-color: #FF0;
		}
	ul#navmenu ul.sub1 {
		display: none;
		position: absolute;
		top: 26px;
		left: 0px;
		}
	
	ul#navmenu li:hover .sub1 {
		display: block;
		}
	
	ul#navmenu .sub1 li:hover .sub2 {
		display: block;
		}
	ul#navmenu ul.sub2 {
		display: none;
		position: absolute;
		top: 0px;
		left: 126px;
		}
		
	.darrow {
		font-size: 10pt;
		position: absolute;
		top: 5px;
		right: 4px;
		}
	.rarrow {
		font-size: 10pt;
		position: absolute;
		top: 5px;
		right: 4px;
		}
		
		
		/* here my ap divs*/



body{
background-color: black;
		text:red;
}
#topDiv{
	position:absolute;
	width:1009px;
	height:1600px;
	z-index:1;
	margin-left: -400px;
	left: 50%;
	background-color: white;
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
#apDiv6 {
	position:absolute;
	width:200px;
	height:23px;
	z-index:2;
	left: 388px;
	top: 477px;
}

#apDiv5 {
	position:absolute;
	width:387px;
	height:86px;
	z-index:2;
	left: 365px;
	top: 90px;
}
#apDiv2 {
	position:absolute;
	width:171px;
	height:40px;
	z-index:2;
	left: 804px;
	top: 491px;
}
#apDiv3 {
	position:absolute;
	width:432px;
	height:276px;
	z-index:2;
	left: 304px;
	top: 493px;
}

#apDiv4 {
	position:absolute;
	width:432px;
	height:276px;
	z-index:2;
	left: 305px;
	top: 779px;
}

#apDiv6 {
	position:absolute;
	width:432px;
	height:276px;
	z-index:2;
	left: 305px;
	top: 1079px;
}
</style>
</head>

<body>
<div id="topDiv">

<div id="apDiv2">
<ul id="navmenu">
	<li><a href="#">Content by Title</a><span class="darrow">&#9660;</span>
		<ul class="sub1">
			<?php 
				while($rsJobs = $result2->fetch_assoc()){	
				if ($loopcount == 0){
				$loopcount=$loopcount+1;
				$firstcontent = $rsJobs['contentid'];
				}
			?>
			
             <li><a href="content.php?ThisId=<?php echo $rsJobs['contentid']; ?>"> <?php echo $rsJobs['contenttitle']; ?></a></li>
			 
			 <?php
	}
	$result2 ->free();
	?>		
			
		</ul>
	</li>
</ul>
</div>





<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
<script>
window.onload = function(){
$('#apDiv3').load('lastpost.php?ThisId=<?php echo $firstcontent ?>">');
$('#apDiv4').load('friendsearch.html');
$('#apDiv6').load('friendlist.php');
}
</script>

<div ID="apDiv3"></div>
<div ID="apDiv4"></div>
<div ID="apDiv6"></div>
<div ID="apDiv5">

<form action="newpost.php" method="POST">
				  <input type="text" name="contenttitle"  PLACEHOLDER="New Post Title " /><p></p>
                  <input name="content" type="text" PLACEHOLDER="New Post " /><p></p>
                  <p></p>
				  <p></p>
				  <input type="submit" name="submit" value="new post"><p></p>
				  <a href='logout.php'>Click Here to logout</a>
		  </form>
		 
 		</div>
        
        
</div>

</body>
</html>

