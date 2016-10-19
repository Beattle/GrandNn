<?php
	global $_CONF, $_CORE;
	
	if(!empty($_REQUEST['partner_cashout']) && !empty($_SESSION['SESS_AUTH']['ALL']['partner'])){
		SQL::upd(DB_TABLE_PREFIX.'auth_pers',"`partner_cashout` = ".(int)$_REQUEST['partner_cashout']."", 
		"author_id = ".$_SESSION['SESS_AUTH']['ID']);
		$_SESSION['SESS_AUTH']['ALL']['partner_cashout'] = (int)$_REQUEST['partner_cashout'];
	}
	die('ok');