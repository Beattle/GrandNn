<?php
if(!empty($_SESSION['SESS_AUTH']['ALL']['prtn']) && strstr($data['delivery_type'],'Бронирование')===false ){
	$partner = SQL::getrow("*",(defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : '').'auth_pers',"author_id=".$_SESSION['SESS_AUTH']['ALL']['prtn']);
	if(!empty($partner) && !empty($partner['author_login'])){
		$data['cont']	= $data['body'] = "
		Здравствуйте!<br /><br />
		Ваш реферал по партнерской программе на нашем сайте ".$_SERVER['HTTP_HOST']." <br />
		только что оформил заказ <br />
		на сумму ".$data['summ']." руб.<br />
		Как только он оплатит заказ на Ваш счет будет начислено ".(int)$partner['partner_percent']."% от суммы заказа.
		";
		$data['email'] = TO;
		$data['mailto'] = $partner['author_login'];
		$data['subj']	= 'Your referral order from '.$_SERVER['HTTP_HOST'];
		$data['name'] = (!empty($_BASKET['name_for_mail']))?$_BASKET['name_for_mail']:$_SERVER['HTTP_HOST'];
		lMail::send($data);
	}
}