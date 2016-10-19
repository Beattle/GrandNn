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

global $FORM_INDEX, $FORM_ORDER, $_ROBOKASSA;
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


//$_ROBOKASSA['robo_url'] 		= 'http://test.robokassa.ru/Index.aspx';
$_ROBOKASSA['robo_url'] 		= 'https://merchant.roboxchange.com/Index.aspx';
$_ROBOKASSA['robo_core_table'] 	= DB_TABLE_PREFIX.'robokassa'; 		/* таблица на сервере, должа быть, проверяйте */


$_ROBOKASSA['pass_1'] 			= 'grandnn123'; 		/* пароль один заполняется в личном кабинете робокассы */
$_ROBOKASSA['pass_2'] 			= 'grandnn321'; 	/* пароль два заполняется в личном кабинете робокассы */
$_ROBOKASSA['mrh_login'] 		= 'grandnn.com'; 			/* логин магазина в робокассе */
$_ROBOKASSA['TITLE']				= 'Робокасса'; /* заголовок модуля */


$_ROBOKASSA['inv_desc'] 		= 'Описание на странице';
$_ROBOKASSA['out_summ'] 		= '100'; 					/* сумма заказа */
$_ROBOKASSA['shp_item'] 		= '3'; 						/* тип товара */
$_ROBOKASSA['in_curr'] 			= ''; 				/* валюта оплаты */
$_ROBOKASSA['culture'] 			= 'ru'; 					/* язык интерфейса при переходе в робокассу */
$_ROBOKASSA['inv_id'] 			= time(); 					/* уникальный номер операции */
$_ROBOKASSA['REMOTE_ADDR'] 		= $_SERVER['REMOTE_ADDR']; 	/*  IP клиента храним */




?>