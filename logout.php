<?php

session_start();
session_destroy();
$_SESSION = array();
header("location: ../../work2/page2.htm");

?>