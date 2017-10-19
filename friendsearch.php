<?php
session_start();
define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "contentcontrol");
define("TBL_USERS", "logintbl");
$a = $_POST['username'];
$loopcount = 0;
$disttop= 0;
if(!$_SESSION['userid']){
	header("location: ../work2/index.htm");
}
	$connection =  new mysqli(DB_SERVER, DB_USER, DB_PASS,DB_NAME) or die("fail connect");
	$a = $connection->real_escape_string($a);
	
	$query = $connection->multi_query("CALL sp_find_user_by_name('$a')");
	if ($query) {
			$result = $connection->use_result();
			
		}
		//var_dump($result);
		//var_dump($a);
	?>
	<?php 
				while($rsJobs = $result->fetch_assoc()){	
				$loopcount=$loopcount+1;
				$divname ="apdiv".$loopcount;
				if ($loopcount == 0){
				$disttop = 10;
				}else{
				$disttop =$disttop+60;
				}
			
			?>
			
             <div id="<?php echo $divname; ?>" style="top:<?php echo $disttop; ?>px;height:150px;width:400px;float:left;">
			 <a href="addfriend.php?ThisId=<?php echo $rsJobs['userid']; ?>"> <?php echo $rsJobs['username']; ?></a>
			 <p></p>
			 <font color="#FF0000" size="4"><?php echo $rsJobs['firstname']; ?><?php echo $rsJobs['surname']; ?></font></div>
			 
			 <?php
			 }
	$result ->free();
	?>