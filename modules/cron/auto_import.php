#!/usr/bin/php
<?php
    $result = @file_get_contents('http://grandnn.com/empty/local/auto_import');
    if(!empty($result) && strpos($result,"/home/l/landcom/com/grandnn.com/public_html/data/db/uploads/_data.csv")=== false){
        @file_get_contents('http://grandnn.com/empty/catalog/sitemap/xml');
        mail('denis.ulyusov.startupmilk@gmail.com', $_SERVER['SERVER_NAME'] . ' - auto_import', "RESULT = ".$result);
    }
  exit();
?>