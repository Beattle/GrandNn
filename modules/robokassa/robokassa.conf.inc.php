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

global $FORM_INDEX, $FORM_ORDER, $_ROBOKASSA;
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


//$_ROBOKASSA['robo_url'] 		= 'http://test.robokassa.ru/Index.aspx';
$_ROBOKASSA['robo_url'] 		= 'https://merchant.roboxchange.com/Index.aspx';
$_ROBOKASSA['robo_core_table'] 	= DB_TABLE_PREFIX.'robokassa'; 		/* ������� �� �������, ����� ����, ���������� */


$_ROBOKASSA['pass_1'] 			= 'grandnn123'; 		/* ������ ���� ����������� � ������ �������� ��������� */
$_ROBOKASSA['pass_2'] 			= 'grandnn321'; 	/* ������ ��� ����������� � ������ �������� ��������� */
$_ROBOKASSA['mrh_login'] 		= 'grandnn.com'; 			/* ����� �������� � ��������� */
$_ROBOKASSA['TITLE']				= '���������'; /* ��������� ������ */


$_ROBOKASSA['inv_desc'] 		= '�������� �� ��������';
$_ROBOKASSA['out_summ'] 		= '100'; 					/* ����� ������ */
$_ROBOKASSA['shp_item'] 		= '3'; 						/* ��� ������ */
$_ROBOKASSA['in_curr'] 			= ''; 				/* ������ ������ */
$_ROBOKASSA['culture'] 			= 'ru'; 					/* ���� ���������� ��� �������� � ��������� */
$_ROBOKASSA['inv_id'] 			= time(); 					/* ���������� ����� �������� */
$_ROBOKASSA['REMOTE_ADDR'] 		= $_SERVER['REMOTE_ADDR']; 	/*  IP ������� ������ */




?>