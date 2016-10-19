<?
global $_CONF, $_REIMG,$_USER;
$_USER['MODULE_NAME']	= 'user';
$_USER['PATH_MAIN']		= 'Содержание';
$_USER['PATH_NOLAST']	= false;
$_USER['Modules4Map']	= array( 'doctxt');
$_USER['NO_DOCTXT_IN_MENU'] = 'true';
$_USER['ADM_BUFFER']    = true;

if (!empty($_CONF['settings']['sitename'])) {
	$_USER['START_TITLE'] = $_CONF['settings']['sitename']; // for EMAIL OB_SVYAZ + BASKET
}else{
	$_USER['START_TITLE'] = "Сайт"; // for EMAIL OB_SVYAZ + BASKET
}
if(!empty($_REQUEST['articul'])){
  $_USER['START_TITLE'] = "Поиск по сайту: ".$_REQUEST['articul']." ";
}
$_REIMG['stretch']=true;
?>