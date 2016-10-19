<?

foreach ($_REQUEST['BASKET_CONTACTS'] as $f => $v) {
	$data['author_'.$f] = $v;
}
$data['author_login'] = $data['author_email'];
$data['author_comment'] = $data['author_name'];

if ($data['author_login'] == 'admin') exit;
$userid = SQL::getval("author_id", DB_TABLE_PREFIX . "auth_pers", "author_login = '".$_REQUEST['form']['email']."'");

if( empty($userid) ) {
	include $_CORE->ROOT."/modules/auth/land_data/auth_pers.dat";
	$data['author_passwd']	= rand(100000,999999);
	$data['author_passwd']	= ($_CONF['PWDCRYPTED']) ? crypt($data['author_passwd'],SALT) : $data['author_passwd'];
	global $auth;
	$auth = $data;
	$form		= new cForm($DATA);
	$now_time	= time();
	list($vars,$vals) = $form->GetSQL('insert');
	$max_id = SQL::getval( "MAX(author_id) as max", DB_TABLE_PREFIX.'auth_pers');
	$next_id_lost = intval($max_id) + 1;
	$ins = SQL::ins( DB_TABLE_PREFIX.'auth_pers', "$vars, author_id, created, modify".$var_add, "$vals, $next_id_lost, $now_time, $now_time".$val_add );
	
	$userid = $next_id_lost;
}

// обновим ID пользователя с таким email в таблице заказ
SQL::upd(DB_TABLE_PREFIX.'basket', " from_auth = '$userid' ", "email = '".$data['author_login']."'");

//header("Location: /db/clients");
//exit;
?>