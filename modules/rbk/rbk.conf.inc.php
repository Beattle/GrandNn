<?php
/*
TABLE: core_robokassa

ROWS:
id
time
ip
type (1/0 : �������/�� �������)
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
$FORM_INDEX		= 'id'; 									/* ����������� ���� ���-���� ������������ */
$FORM_SELECT	= ''; 										/* ����������� ���� ���-���� ������������ */
$FORM_FROM		= '';
$FORM_BEFORE	= '';
$FORM_WHERE		= ''; 										/* ����������� ���� ���-���� ������������ */

/* 
����� ������ ������ ������������� � ����� ������� action

��������
https://merchant.roboxchange.com/Index.aspx

��������
http://test.robokassa.ru/Index.aspx 
*/
$_RBK['robo_url'] 			= 'https://rbkmoney.ru/acceptpurchase.aspx'; // '/rbk/result_url';
$_RBK['fail_url']			= 'http://'.$_SERVER['HTTP_HOST'].'/rbk/fail_url';
$_RBK['success_url']		= 'http://'.$_SERVER['HTTP_HOST'].'/basketorders/myorders';

$_RBK['robo_core_table']	= 'grand__rbk'; 		/* ������� �� �������, ����� ����, ���������� */
$_RBK['pass_1'] 			= ''; 
$_RBK['pass_2'] 			= 'startupmilk'; 	/* ������ ��� ����������� � ������ �������� ��������� */

$_RBK['TITLE']				= '���-������'; /* ��������� ������ */
$_RBK['eshopAccount']		= 'RU924603325';
$_RBK['eshopId']			= '2037138'; 


$_RBK['inv_desc'] 		= '�������� �� ��������';
$_RBK['out_summ'] 		= '100'; 					/* ����� ������ */
$_RBK['shp_item'] 		= '3'; 						/* ��� ������ */
$_RBK['in_curr'] 		= 'AlfaBankR'; 				/* ������ ������ */
$_RBK['culture'] 		= 'ru'; 					/* ���� ���������� ��� �������� � ��������� */
$_RBK['inv_id'] 		= time(); 					/* ���������� ����� �������� */
$_RBK['REMOTE_ADDR'] 	= $_SERVER['REMOTE_ADDR']; 	/*  IP ������� ������ */


?>