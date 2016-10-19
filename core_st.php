<?php
$START_CORE	= getmicrotime();
/**
*	core_st.php
**/
ob_start();
//error_reporting( E_ALL ^ E_NOTICE );
//error_reporting( 15);
$locale= setlocale(LC_ALL,'ru_RU.CP1251');

header("X-Engine: lCore 0.1.0 Basic, (c) 2005-2009 Andrew Lyadkov / land.CMS / NewTechnologies");
header("Accept-Charset: windows-1251");
//header("Content-type: text/html; charset=windows-1251");

define('ITEM_COPY', 'cop');
define('ITEM_CUT', 'cut');

GLOBAL $_CORE;
include "conf.phtml";
include "debug.phtml";
include "local_classes.phtml";

include $_CONF['CorePath'].'/core.lib/class.Main.php';

if (!DEBUG) {
	error_reporting( 0 );
	ini_set('display_errors','off');
}else {
	error_reporting( ALL );
	ini_set('display_errors','on');
}

$_CORE	= new Main();

// 10.07.2012 new feature with settings
if ($_CONF['FEATURES_USED']['settings']) {
	if(!empty($_REQUEST['form'])) {$hash_form = $_REQUEST['form']; unset($_REQUEST['form']);}
	cmd('/db/settings',false,true);
	if(!empty($hash_form)) {$_REQUEST['form'] = $hash_form ; unset( $hash_form );}
}
include "email.phtml";

if (!$_CORE->dll_load('class.MainSMS'))	die ( $_CORE->error_msg() );
global $_SMS;
$_SMS = new MainSMS ( $_CONF['settings']['project'] , $_CONF['settings']['key'], false, false );


//$mazilla = urldecode($_SERVER['REQUEST_URI']);
//$ie 	 = STR::utf2win(urldecode($_SERVER['REQUEST_URI']));
//$some = get_browser(null, true);
//$ie = (preg_match("|^mozilla/.\.0 (compatible; msie 6\.0.*;.*windows nt 5\.1.*).*$|i",$_SERVER['HTTP_USER_AGENT']));

if (false !== ($qpos = strpos( $_SERVER['REQUEST_URI'], '?'))) {
	$_SERVER['REQUEST_URI']	= substr($_SERVER['REQUEST_URI'], 0, $qpos);
}
$_SERVER['REQUEST_URI']	= str_replace('//','/',$_SERVER['REQUEST_URI']);

$ie	= (strstr($_SERVER['HTTP_USER_AGENT'], "MSIE"));
$url = ($ie)
	?STR::utf2win(urldecode($_SERVER['REQUEST_URI'])) // IE
	:urldecode($_SERVER['REQUEST_URI']); //firefox

	
if ($url!=$_SERVER['REQUEST_URI']) {
	$_SERVER['REQUEST_URI'] =  STR::wrong_keybord($url);
	if (!$ie) {
		header("Location: ".$_SERVER['REQUEST_URI']);
		exit;
	}
}

if ( strpos($_SERVER['REQUEST_URI'], '/db/all_items/')!== false && strpos($_SERVER['REQUEST_URI'], '/db/all_items/')!= 0 && strpos($_SERVER['REQUEST_URI'], '/empty/')===false && strpos($_SERVER['REQUEST_URI'], '/clear/')===false){
	$url = 'http://'.$_SERVER['SERVER_NAME'].str_replace('/db/all_items/','/',$_SERVER['REQUEST_URI']);
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.$url);
	exit();
}
if ( strpos($_SERVER['REQUEST_URI'], '/au/')!== false || strpos($_SERVER['REQUEST_URI'], '/ag/')!== false || strpos($_SERVER['REQUEST_URI'], '/ag_')!== false ||  strpos($_SERVER['REQUEST_URI'], '/au_')!== false ){
    $url = 'http://'.$_SERVER['SERVER_NAME'].str_replace(array('/au/','/au_585/','/au_785/','/ag/','/ag_925/'),array('/zoloto/','/zoloto_585/','/zoloto_785/','/serebro/','/serebro_925/'),$_SERVER['REQUEST_URI']);
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.$url);
	exit();
}
#
# Debug mode
#
$_CORE->set_debug( DEBUG );

#
# Module Result
#
$_CORE->PARSE_URL	= parse_url($_SERVER['REQUEST_URI']);
$_CORE->URL_PATH	= $_CORE->PARSE_URL['path'];
$_CORE->ALL_LANGS	= array( 'ru', 'en' );
if ($_CORE->URL_PATH == '/') $_CORE->URL_PATH	= '';


// В любом случае подключаем модуль и проверим админ ли.
$_CORE->IS_ADMIN = (isset($_SESSION['CORE_ADMIN']) && in_array($_SESSION['CORE_ADMIN'], array('admin','demo')));
$_CORE->IS_DEMO = (isset($_SESSION['CORE_ADMIN']) && $_SESSION['CORE_ADMIN'] == 'demo');
$_CORE->IS_ROOT = (isset($_SESSION['CORE_ROOT']) && $_SESSION['CORE_ADMIN'] == $_SESSION['CORE_ROOT']);

// Проверяем Язык вывода (СМОТРИМ ХВОСТЫ)
if (in_array( substr($_CORE->URL_PATH, -4), array( '/ru/','/en/') )){
	$_CORE->LANG 	= substr($_CORE->URL_PATH, -3,2);
	$_CORE->NOLANG_URL	= substr($_CORE->URL_PATH,0,-3);
	
}else{
	$_CORE->LANG =	'ru';
	$_CORE->NOLANG_URL	= $_CORE->URL_PATH;
}


// СМОТРИМ И ПАРСИМ ПРЕФИКСЫ
$MOD_CMD	= $_CORE->cmd_parse( $_SERVER['REQUEST_URI'] );
if ($MOD_CMD[0] == 'empty' || $MOD_CMD[0] == 'print' || $MOD_CMD[0] == 'clear' || $MOD_CMD[0] == 'def') {
	$_CORE->EMPTY_VERSION	= ($MOD_CMD[0] == 'empty');
	$_CORE->PRINT_VERSION	= ($MOD_CMD[0] == 'print');
	$_CORE->CLEAR_VERSION	= ($MOD_CMD[0] == 'clear');
	$_CORE->DEFAULT_VERSION	= ($MOD_CMD[0] == 'def');
	$_CORE->NOPRINT_URL		= $MOD_CMD[1];
	$_SERVER['REQUEST_URI']	= $MOD_CMD[1];
}
if($MOD_CMD[0] == 'landing')
	$_CORE->EMPTY_VERSION	= true;
// ПАРСИМ АЛИАСЫ
#
# FULL NAME ALIASES
#
if ($_CONF['FEATURES_USED']['aliases'] && !in_array($MOD_CMD[0], array('templates', 'imglib', 'reimg')) ) {
	$RealName = cmd('/urlalias/name'.$_SERVER['REQUEST_URI']);
	if (!empty($RealName)){
		$_SERVER['REQUEST_URI'] = $RealName;
	}
}

if (!$_CONF['FEATURES_USED']['aliases']) {
	cmd('/db/nothing');
}

/* MAIN COMMAND DO */
$MOD_CMD	= $_CORE->cmd_parse( $_SERVER['REQUEST_URI'] );

/* Определяем шаблон  ( на случай если УЖЕ админ ) */
if ($_CORE->IS_ADMIN  && @$_SESSION['ADMIN']['TPL'] != 'public') {
	$_CORE->CURR_TPL	= 'admin';
}else {
	$_CORE->CURR_TPL	= 'def';
}
/*  ---------------- */
// если ссылка на каталог и не шаблон админа то редиректим
if(substr_count($_CORE->URL_PATH,'/db/all_items') && $_CORE->CURR_TPL == 'def' && !$_CORE->EMPTY_VERSION && !$_CORE->CLEAR_VERSION){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: http://".$_SERVER['SERVER_NAME'].str_replace('/db/all_items','/catalog',$_CORE->URL_PATH).((!empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:'')));
    exit();
}





/* Tree Loading */ 
echo $_CORE->cmd_pexec( 'user/' );

//echo $_CORE->cmd_pexec( 'pagesnum/refresh' );

// Сделано для превью шаблона АДМИНИСТРАТОРОМ

if ($_CORE->PRINT_VERSION || $_CORE->DEFAULT_VERSION){
	$_CORE->IS_ADMIN = 0;
	$_CORE->CURR_TPL = 'def';
}

// для connects
$_CORE->BODY_REQUEST_URI = $_SERVER['REQUEST_URI'];

if (!in_array($_SERVER['REQUEST_URI'], array('','/','/en/') )){
	$LoadModule = ($CORE_BODY	= cmd($_SERVER['REQUEST_URI'], 'first'));
	$Template	= 'inner';
//	$Template	= 'index';
}else {
	$LoadModule = ($CORE_BODY	= $_CORE->cmd_pexec( 'index/' ));
	$Template	= 'index';
}

/* Определяем шаблон  ( на случай если только-только ) */
if ($_CORE->IS_ADMIN && @$_SESSION['ADMIN']['TPL'] != 'public') {
	$_CORE->CURR_TPL	= 'admin';
	if (!$_CORE->PRINT_VERSION && !$_CORE->CLEAR_VERSION && !$_CORE->DEFAULT_VERSION)
		$Template	= 'admin';
}else {
	$_CORE->CURR_TPL	= 'def';
}


/*  ---------------- */

if ($_CORE->LANG != 'ru' && empty($CORE_BODY)) {
	$CORE_BODY	= 'No English version for this Document';
}

$_CORE->int_done_run(INT_TREE_LOADED);

if (!empty($CORE_BODY)){
	header('Content-type: text/html; charset=windows-1251');
	if ($_CORE->LANG == 'en') {
		if (!empty($_CORE->PRINT_VERSION))
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL."/design/en.print.tpl.html");
		elseif(!empty($_CORE->CLEAR_VERSION))
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/en.clear.tpl.html');
		elseif(!empty($_CORE->EMPTY_VERSION))
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/en.empty.tpl.html');
		else
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/en'.$Template.'.tpl.html');
	}else
		if (!empty($_CORE->PRINT_VERSION))
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/print.tpl.html');
		elseif(!empty($_CORE->CLEAR_VERSION))
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/clear.tpl.html');
		elseif(!empty($_CORE->DEFAULT_VERSION))
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/inner.tpl.html');
		elseif(!empty($_CORE->EMPTY_VERSION))
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/empty.tpl.html');
		else
			include_once($_CORE->PATHTPLS.$_CORE->CURR_TPL.'/design/'.$Template.'.tpl.html');

}elseif($_SERVER['REQUEST_URI'] != '/' && !is_file($_SERVER['DOCUMENT_ROOT'].'/'.substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], '?', 0)))) {
	#
	# this means that we come from 404 so heed footer
	#
//	echo "FILE ".$_SERVER['REQUEST_URI']." not found";
	$_CORE->return404();
	include "404.html";

} else {
	echo "Empty CORE_BODY and Not home page needed.";
}

//if (in_array($_SERVER['REQUEST_URI'], array ('','/'))){
//	if (file_exists('index.php'))
//		include 'index.php';
//	elseif (file_exists('index.html'))
//		include 'index.html';
//}
$_CORE->SIZE	= ob_get_length();
if(!isset($_REQUEST['ajax']) && empty($_CORE->EMPTY_VERSION)){
	_hide_foot();
}
//ob_start();
//print_r($GLOBALS);
//$tmp = ob_get_length();
//ob_end_flush();

#
# ALIASES
#
if (!$_CORE->IS_ADMIN){
	$_CORE->int_done_run("CORE_OUTPUT_BEF");
//	echo $_CORE->error_msg();
	$cont = (is_object('URLALIAS')) ? URLALIAS::conv_buffer()	: ob_get_contents();
	ob_end_clean();
	echo $cont;
}else{
	$_CORE->int_done_run("CORE_OUTPUT_BEF");
//	echo $_CORE->error_msg();
	ob_end_flush();
}
	if (DEBUG && !isset($_REQUEST['ajax']) && empty($_CORE->EMPTY_VERSION)) {
		echo "<!--";
		print_r($_CORE->CMD_HISTORY);
		echo "-->";
	}

$_CORE->int_done_run("CORE_OUTPUT_AFT");

//header("Content-Length: ".$_CORE->SIZE);
//ob_end_flush();

function _hide_foot(){
	global $START_CORE, $_CORE;
	$STOP_CORE	= getmicrotime();
	?>
	<!--land.CMS version <?=$_CORE->ver;?> by Lyadkov Andrey :: <?=$_SERVER['REQUEST_URI']?> :: time: <?=$STOP_CORE - $START_CORE?> | Size <?=$_CORE->SIZE?> -->
<?php
}

/**
*
*/
function _core_worked(){
	global $START_CORE;
	$NOW	= getmicrotime();
	return sprintf( "%0.4f",$NOW - $START_CORE);
}

function getmicrotime(){ 
   list($usec, $sec) = explode(" ",microtime()); 
   return ((float)$usec + (float)$sec); 
}

function _core_debug( $str ){
	global $_CORE;
	echo "<HR><B>DEBUGGING VALUE:<B> >$str<<br><pre>".print_r($_CORE->log_tail_win(3))."<HR>";
}
?>
