#!/usr/bin/php
<?php
	set_time_limit(500);
	$result = file_get_contents('http://grandnn.com/empty/local/watermark?noprint=1');
	$result2 = file_get_contents('http://grandnn.com/empty/local/imgnoarticul');
	if(!empty($result))
		mail('denis.ulyusov.startupmilk@gmail.com', $_SERVER['SERVER_NAME'] . ' - watermark', "RESULT = ".$result.iconv('cp1251','utf-8',$result2));
  exit();
?>