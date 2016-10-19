<?
global $_CORE;

if (!$_CORE->dll_load('class.DBCQ'))
	die ($_CORE->error_msg());

$add = '';
SQL::col2arr($result, DB_TABLE_PREFIX.'station', 'distinct(naimenovanie)', '', "(hidden != '1' OR hidden IS NULL)  AND naimenovanie LIKE '".str_replace("'", '"',iconv( "UTF-8","CP1251",  $_REQUEST['q']))."%' $add");

if (is_array($result) && sizeof($result) > 0)
	foreach ($result as $marka) echo $marka."\n";
exit;
?>