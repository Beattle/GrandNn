<?php
if(!empty($_SESSION['SESS_AUTH']['ALL']['prtn']) && strstr($data['delivery_type'],'������������')===false ){
	$partner = SQL::getrow("*",(defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : '').'auth_pers',"author_id=".$_SESSION['SESS_AUTH']['ALL']['prtn']);
	if(!empty($partner) && !empty($partner['author_login'])){
		$data['cont']	= $data['body'] = "
		������������!<br /><br />
		��� ������� �� ����������� ��������� �� ����� ����� ".$_SERVER['HTTP_HOST']." <br />
		������ ��� ������� ����� <br />
		�� ����� ".$data['summ']." ���.<br />
		��� ������ �� ������� ����� �� ��� ���� ����� ��������� ".(int)$partner['partner_percent']."% �� ����� ������.
		";
		$data['email'] = TO;
		$data['mailto'] = $partner['author_login'];
		$data['subj']	= 'Your referral order from '.$_SERVER['HTTP_HOST'];
		$data['name'] = (!empty($_BASKET['name_for_mail']))?$_BASKET['name_for_mail']:$_SERVER['HTTP_HOST'];
		lMail::send($data);
	}
}