<?
/* 
incomming: $_POST['obsv']
output: $_POST['obsv'][name], email, body, 
We need to have 
*/
if ($_CONF['FEATURES_USED']['basketsave']) {
	$_CORE->dll_load('class.cForm');
	global $form;
	$form = $data;
	$form['alias'] = time();
	include $_CORE->CORE_ROOT."/modules/db/_coredb_basket.data.inc.php";
	$_BASKET['cForm']	= new cForm($FORM_DATA);
	list($var, $val) = $_BASKET['cForm']->GetSQL('insert');
	$res	= SQL::ins( $_BASKET['TABLE'], $var, $val, DEBUG);
}
?>