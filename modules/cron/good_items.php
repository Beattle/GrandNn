#!/usr/bin/php
<?php
	$result = @file_get_contents('http://grandnn.com/empty/local/good_items');
	if(!empty($result))
	mail('denis.ulyusov.startupmilk@gmail.com', $_SERVER['SERVER_NAME'] . ' - good_items', "RESULT = ".$result);
  exit();
?>