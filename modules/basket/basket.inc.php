<?php
global $_CORE,$_PROJECT, $_BASKET, $data;


if (!$_CORE->dll_load('class.lMail'))
	die ($_CORE->error_msg());
switch ($Cmd) {

	case "go":
		if (BASKET::chck_contacts()) {
		
			
			$data['cont']			= $data['body']	= BASKET::make_report();
			$data['to']				= $data['mailto'] = TO;
			$data['name']			= $_POST['BASKET_CONTACTS']['name'];
			$data['email']			= $_POST['BASKET_CONTACTS']['email'];
			$data['phone']			= $_POST['BASKET_CONTACTS']['phone'];
			$data['address'] 		= mysql_real_escape_string($_POST['BASKET_CONTACTS']['address']);
			$data['comments'] 		= mysql_real_escape_string($_POST['BASKET_CONTACTS']['comments']);
			$data['delivery_type'] 	= mysql_real_escape_string($_POST['BASKET_DELIVERY']['delivery_type']);
			
			$data['subj']			= 'Order from '.$_SERVER['HTTP_HOST'];
			$data['type']   		= 'html';
			$data['cnt']   			= $_SESSION['_BASKET_ITEMS'];
			$data['summ']   		= $_SESSION['_BASKET_SUMM'];

			// if plugin detected
			if (!empty($_BASKET['PLUGIN'])) {
				if (is_file($_CORE->SiteModDir."/".$_BASKET['PLUGIN'].".inc.php")) {
					@include_once $_CORE->SiteModDir."/".$_BASKET['PLUGIN'].".inc.php";
				}elseif(is_file($_CORE->CoreModDir."/".$_BASKET['PLUGIN'].".inc.php")){
					@include_once $_CORE->CoreModDir."/".$_BASKET['PLUGIN'].".inc.php";
				}
			}
			if (empty($attach) ) $attach = array();
			$data['body'] = '
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td class="content" style="font-size: 14px;padding-left: 20px; padding-top:10px;" >
					<h2>Новый заказ на сайте</h2>
				</td></tr></table>'.$data['cont'];
			if(!empty($data["comments"])){ 
				$data['body'] .= '
			<div style="padding-left: 20px;">
			<h2>Комментарий к заказу</h2>
			'.$data["comments"].'</div>';
			}
			$data['body'] = cmd('blocks/mailheader').$data['body'].cmd('blocks/mailfooter');
			if (!lMail::sendhtml($data,$attach)){
				$_BASKET['ERROR']	= BASKET_ERR_NOT_SEND;
			}else {
				$data['mailto'] = $_POST['BASKET_CONTACTS']['email'];
				$data['email']  = TO;
				$data['subj']	= 'Your order from '.$_SERVER['HTTP_HOST'];
				$data['name'] = (!empty($_BASKET['name_for_mail']))?$_BASKET['name_for_mail']:$_SERVER['HTTP_HOST'];
if (empty($attach) ) $attach = array();
				$data['body'] = '
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td class="content" style="font-size: 14px;padding-left: 20px; padding-top:10px;" >
						<h2>Здравствуйте, '.@$_POST['BASKET_CONTACTS']['name'].'</h2>
						<p>Благодарим Вас за заказ! В ближайшее время наш менеджер свяжется с Вами для уточнения деталей.
						</p>
					</td></tr></table>'.$data['cont'];
					if(!empty($data["comments"])){ 
						$data['body'] .= '
					<div style="padding-left: 20px;">
					<h2>Комментарий к заказу</h2>
					'.$data["comments"].'</div>';
					}
				$data['body'] = cmd('blocks/mailheader').$data['body'].cmd('blocks/mailfooter');
				lMail::sendhtml($data,$attach);
				
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
				$_BASKET['ERROR']	= BASKET_ERR_SEND;
				
				$basket_cont = $_SESSION['_BASKET_CONT'];
				
				$_SESSION['_BASKET_SUMM'] = '';
				$_SESSION['_BASKET_ITEMS'] = '';
				$_SESSION['_BASKET_NAMES'] = '';
				$_SESSION['_BASKET_CONT'] = 0;
				
			}
			
		}
		
		if ($_CONF['FEATURES_USED']['basketauth'] && $_CONF['FEATURES_USED']['basketsave']) {
			// if new then must be loggined, else go there
			$after = ($_SESSION['SESS_AUTH']['LOGIN']) ? '/db/basket' : '/auth/login';
		} else {
			$after = '/basket/view';
		}
        /*if(!empty($_BASKET['after'])) $after = $_BASKET['after'];*/
		if( $_BASKET['ERROR'] == BASKET_ERR_SEND ){
			$_BASKET['ERROR'] = "Поздравляем! Ваш заказ №".$form['alias']." от ".date("d.m.Y",strtotime($form['ts']))." сформирован и отправлен в обработку. В ближайшее время Наш менеджер свяжется с Вами";
			$str = '<script type="text/javascript">
						function rrAsyncInit() {
							try {
								rrApi.order({
									transaction: '.$form['alias'].',
									items: [
					';
					$i = 0;
			foreach ($basket_cont as $subjs => $vals) {
				$i++;
				foreach ($vals as $id => $data) {
					$data['price'] = str_replace(" ", '',$data['price']);
					$link = explode('/',$data['link']);
					$data['alias'] = array_pop($link);
					$str .= '{ id: '.$data['alias'].', qnt: '.$data['count'].', price: '.$data['price'].'}';
				}
				if(count($basket_cont) > $i) $str .= ",\n\r";
			}
			$str .= '
									]
								});
							} catch(e) {}
						}
					</script>';
			$_SESSION['_BASKET_CONFIRM'] = $str;
		}
		$_SESSION['_BASKET_ERROR'] = $_BASKET['ERROR'];
		header("Location: ".$after);
		die ();
		$Cmd = 'nothing';
	break;
	/*
	default:
			BASKET::get_cont();
        break;*/
}
?>