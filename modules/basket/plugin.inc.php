<?
/* 
incomming: $_POST['obsv']
output: $_POST['obsv'][name], email, body, 
We need to have 
*/ 

global $_CONF, $_SMS, $_BASKET;
if ($_CONF['FEATURES_USED']['basketsave']) {
	$_CORE->dll_load('class.cForm');
	global $form;
	$data['city']	= mysql_real_escape_string($_POST['BASKET_CONTACTS']['city']);
	$form = $data;
	$form['alias'] = time();
	$form['ts'] = date("Y-m-d");
	$form['hidden'] = 1;
	$form['user_name'] = $form['name'];
	$form['name'] = time();
	include $_SERVER['DOCUMENT_ROOT']."/modules/db/coredb_basket.data.inc.php";
	$_BASKET['cForm']	= new cForm($FORM_DATA);
	list($var, $val) = $_BASKET['cForm']->GetSQL('insert');
	
	$res	= SQL::ins( $_BASKET['TABLE'], $var, $val, 0);
	if ($res->Result){ 
		// отправляем информацию по sms
		$text = "Ваш заказ №".$form['alias']." от ".date("d.m.Y",strtotime($form['ts']))." сформирован и отправлен в обработку. В ближайшее время Наш менеджер свяжется с Вами";
		//$text_sms = iconv("windows-1251","UTF-8",$text);
		$phone = substr(preg_replace('/\D/', '', $form['phone']),-10);
		//$res = $_SMS->sendSMS ( $phone , $text , $_CONF['settings']['from'] );
		
		if($_BASKET['save_purchasing']){
			// сохраняем данные о покупках в отдельную таблицу
			BASKET::save_purchasing($form['alias']);
		}
		// add user for request
		if ($_CONF['FEATURES_USED']['basketauth']) {
			if (is_file($_CORE->SiteModDir."/user.add.inc.php")) {
				@include_once $_CORE->SiteModDir."/user.add.inc.php";
			}elseif(is_file($_CORE->CoreModDir."/user.add.inc.php")){
				@include_once $_CORE->CoreModDir."/user.add.inc.php";
			}
		}
	}
}
$attach = array(
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/footer.png',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/logo.png',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/vk.gif',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/fb.gif',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/yt.gif'
);
?>