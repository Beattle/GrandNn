<?
/*
*   Working with balance after robokassa do
*   Вызов Success url need any action logic
*/ 
  SQL::upd((defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : '').'basket',"payed = 1","id=$shp_item",1);
  if(!empty($_SESSION['SESS_AUTH']['ALL']['prtn'])){
	  $partner = SQL::getrow("*",(defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : '').'auth_pers',"author_id=".$_SESSION['SESS_AUTH']['ALL']['prtn']);
	  $zakaz = SQL::getrow("*",(defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : '').'basket',"id=".$shp_item);
	  // сохраним для статистики 
	  $form = array();
	  $form['name'] = $_SESSION['SESS_AUTH']['ALL']['prtn'].":".$zakaz['from_auth'].":".time();
	  $form['alias'] = STR::translit($form['name']);
	  $form['bonus'] = $zakaz['summ']*$partner['partner_percent']/100;
	  $var = "alias, name, user_id, referal_id, summ, actual_percent, bonus, ts";
	  $val = "'".$form['alias']."', '".$form['name']."', ".$partner['author_id'].",". $zakaz['from_auth'].",". $zakaz['summ'].", ".$partner['partner_percent'].", ".$form['bonus'].", '".date('Y-m-d')."'";
		SQL::ins((defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : '').'partners_basket',$var,$val,0);
		
		// пополним баланс партнера
		$new_balance = $partner['balance']+$form['bonus'];
		SQL::upd((defined('DB_TABLE_PREFIX') ? DB_TABLE_PREFIX : '').'auth_pers',"balance=".$new_balance,"author_id = ".$partner['author_id'],0);

		
	}
	@mail('lyadkov@gmail.com', "ROBOKASSA PAYED #$shp_item", "Order #$shp_item has payed on ".$_SERVER['HTTP_HOST'], 'robokassa_module@'.$_SERVER['HTTP_HOST']);
?>