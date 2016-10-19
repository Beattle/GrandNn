<?
// Для дальнейшего использования в path
$main_uri = $_SERVER['REQUEST_URI'];

if (!$_CORE->dll_load('class.DBCQ'))	die ($_CORE->error_msg());
	global $_KAT;
	$_CORE->cmd_pexec('/db/news/NOTHING');

//	$_REQUEST['form']['subj'] = 'Обсуждаем: '.$form['title'];
//	$_CORE->cmd_pexec('/db/forum/last/1');
//	print_r($_KAT['SEARCH_LAST']);
	$tm = time(); 
	$res = SQL::sel('*', $_KAT['TABLES']['forum'], "date = tid AND subj = 'Обсуждаем: ".addslashes($form['title'])."'",'',0);
	if($res->NumRows > 0){
		$res->FetchArray(0);
		$said = $res->FetchArray;
//		print_r($said);
		$rows = SQL::getval('count(*)',$_KAT['TABLES']['forum'], "tid = '".$said['tid']."' ",'',0);
	}

if (!empty($rows)){
	global $_REQUEST;
	$_REQUEST['form']['tid'] = $said['tid'];
	$comments =  cmd("/db/forum");
	if (Main::comm_inc('db_forum.list.html', $f, 'doctxt'))
    include "$f";

}else{
	if (Main::comm_inc('db_forum.form.html', $f, 'doctxt'))
    include $_CORE->ROOT."$f";
}

// Для дальнейшего использования в path
$_SERVER['REQUEST_URI'] = $main_uri;
?>