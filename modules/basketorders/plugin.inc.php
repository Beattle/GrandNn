<?
/* 
incomming: $_POST['obsv']
output: $_POST['obsv'][name], email, body, 
We need to have 

// after $basketOrders->checkContacts()

*/ 

global $_CONF, $_SMS, $_BASKET;

// отправляем информацию по sms
$text = "Ваш заказ №".$data['id']." от ".date("d.m.Y",strtotime($data['ts']))." сформирован и отправлен в обработку. В ближайшее время Наш менеджер свяжется с Вами";
//$text_sms = iconv("windows-1251","UTF-8",$text);
$phone = substr(preg_replace('/\D/', '', $data['phone']),-10);
$res = $_SMS->sendSMS ( $phone , $text , $_CONF['settings']['from'] );

// add user for request
if (is_file($_CORE->SiteModDir."/user.add.inc.php")) {
	@include_once $_CORE->SiteModDir."/user.add.inc.php";
}elseif(is_file($_CORE->CoreModDir."/user.add.inc.php")){
	@include_once $_CORE->CoreModDir."/user.add.inc.php";
}

$attach = array(
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/printversion.jpg',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/footer.png',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/logo.png',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/vk.gif',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/fb.gif',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/yt.gif',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/inst.gif'
);
?>