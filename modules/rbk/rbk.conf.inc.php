<?php
/*
TABLE: core_robokassa

ROWS:
id
time
ip
type (1/0 : успешно/не успешно)
summa 
success_result (1 - success / 2 result)
shp_item
in_curr
culture
inv_id
inv_desc
crc1
crc2
user_tranzak

*/

global $FORM_INDEX, $FORM_ORDER, $_RBK;
$FORM_ORDER		= ' ORDER BY id ';
$FORM_INDEX		= 'id'; 									/* обязательно если где-либо используется */
$FORM_SELECT	= ''; 										/* обязательно если где-либо используется */
$FORM_FROM		= '';
$FORM_BEFORE	= '';
$FORM_WHERE		= ''; 										/* обязательно если где-либо используется */

/* 
форма оплаты товара прописывается в форме атрибут action

Реальный
https://merchant.roboxchange.com/Index.aspx

Тестовый
http://test.robokassa.ru/Index.aspx 
*/
$_RBK['robo_url'] 			= 'https://rbkmoney.ru/acceptpurchase.aspx'; // '/rbk/result_url';
$_RBK['fail_url']			= 'http://'.$_SERVER['HTTP_HOST'].'/rbk/fail_url';
$_RBK['success_url']		= 'http://'.$_SERVER['HTTP_HOST'].'/basketorders/myorders';

$_RBK['robo_core_table']	= 'grand__rbk'; 		/* таблица на сервере, должа быть, проверяйте */
$_RBK['pass_1'] 			= ''; 
$_RBK['pass_2'] 			= 'startupmilk'; 	/* пароль два заполняется в личном кабинете робокассы */

$_RBK['TITLE']				= 'РБК-Деньги'; /* заголовок модуля */
$_RBK['eshopAccount']		= 'RU924603325';
$_RBK['eshopId']			= '2037138'; 


$_RBK['inv_desc'] 		= 'Описание на странице';
$_RBK['out_summ'] 		= '100'; 					/* сумма заказа */
$_RBK['shp_item'] 		= '3'; 						/* тип товара */
$_RBK['in_curr'] 		= 'AlfaBankR'; 				/* валюта оплаты */
$_RBK['culture'] 		= 'ru'; 					/* язык интерфейса при переходе в робокассу */
$_RBK['inv_id'] 		= time(); 					/* уникальный номер операции */
$_RBK['REMOTE_ADDR'] 	= $_SERVER['REMOTE_ADDR']; 	/*  IP клиента храним */


?>