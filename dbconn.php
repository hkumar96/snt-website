<?php
  $dbhost = "localhost:3036";
	$dbuser = "guest";
	$dbpass = "guest123";
	$dbname = "snt";

	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
  mysql_select_db($dbname);
?>
