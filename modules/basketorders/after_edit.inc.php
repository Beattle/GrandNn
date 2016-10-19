<?php
if($res !== false ){
	$attach = array(
		'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/printversion.jpg',
		'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/footer.png',
		'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/logo.png',
		'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/vk.gif',
		'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/fb.gif',
		'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/yt.gif',
	'http://'.$_SERVER['SERVER_NAME'].'/templates/def/images/inst.gif'
	);
	global $_CORE, $_SMS, $_CONF;
	if (!$_CORE->dll_load('class.lMail'))
		die ($_CORE->error_msg());
	
	if($order['status'] > 1 ){
		
		$_CORE->CURR_TPL = 'def';
		$data = $dmail = array();
		
		$cont	= '
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
			<td class="content" style="font-size: 14px;padding-left: 20px; padding-bottom: 20px;">
			<h2>Здравствуйте, '.$order['user_name'].'</h2>';
			if($order['status'] == 2){
			$cont .= 
			'<p>Ваш заказ #'.$order['alias'].' готов к отправке. Проверьте еще раз правильность введенных Вами данных.
			</p>';
			}elseif($order['status'] == 3){
				$cont .= 
			'<p>Ваш заказ #'.$order['alias'].' отправлен.
			</p>';
			}else{
				$cont .= 
			'<p>Статус Вашего заказа #'.$order['alias'].' изменен на'.$FORM_DATA['status']['arr'][$order['status']].'.
			</p>';
			}
		$cont .= 
			'
		</td></tr></table>
		';
		if($order['status'] == 2){
			$data = $basketOrders->loadOrder($order['alias']);
			ob_start();
			$basketOrders->getCont($data,"mail.");
			if ($_CORE->comm_inc('mail.contact.html', $file, 'basketorders')){
				include "$file";
			}
			$order['cont'] = ob_get_contents();
			ob_end_clean();
		$cont .= $order['cont'].'
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td class="content" style="font-size: 14px; padding-left: 20px; padding-bottom: 20px;">
						<p>
							Оплатить заказ Вы можете через <a href="http://grandnn.com/basketorders/myorders">личный кабинет</a>.<br />
							Пожалуйста, в ответном письме сообщите нам о произведенной оплате.<br />
							Как только деньги поступят на счет,Ваш заказ будет отправлен.
						</p>
					</td>
				</tr>
				</table>';
			
			if(SQL::getval('count(*)',DB_TABLE_PREFIX . 'basket',"email = '".$order['email']."'") > 1){
				$psw = SQL::getval('author_passwd',DB_TABLE_PREFIX . 'auth_pers',"author_login = '".$order['email']."'");
				$cont .= '
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
				<tr>
					<td class="content" style="font-size: 14px;padding-left: 20px; padding-bottom: 20px;">
						<p>
							Напоминаем Ваши авторизационные данные:<br />
							логин: Ваша почта<br />
							пароль: '.$psw.'
						</p>
					</td>
				</tr>
				</table>
				';
			}
		}
		$data['cont'] = $cont;
		if ($_CORE->comm_inc('mail_user.tmpl.html', $file, 'basketorders')){
				ob_start();
				include "$file";
				$dmail['body'] = ob_get_contents();
				ob_end_clean(); 
			}
		
		$dmail['name']	= 'GrandNN';
		$dmail['email']	= TO;
		$dmail['subject']	= 'Изменение статуса заказа на '.$_SERVER['HTTP_HOST'];
		$dmail['type']	= 'html';
		$dmail['mailto'] = $order['email'];
		lMail::sendhtml($dmail,$attach);
		$_CORE->CURR_TPL = 'admin';
		// отправляем информацию по sms
		$text = "Статус Вашего заказа #".$order['alias']." был изменен на ".'"'.$FORM_DATA['status']['arr'][$order['status']].'"';
		
		$text = iconv("windows-1251","UTF-8",$text);
		$phone = substr(preg_replace('/\D/', '', $order['phone']),-10);
		$res = $_SMS->sendSMS( $phone , $text , $_CONF['settings']['from'] );
		
		//////////////////////////////////////////////////////////
	}
		// вместе со статусом заказа меняем и статус товаров
		SQL::upd(DB_TABLE_PREFIX . 'basket2items', 'status = '.$order['status'], "order_alias = '".$order['alias']."'");
}
?>