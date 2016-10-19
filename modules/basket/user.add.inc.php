<? 
foreach ($_POST['BASKET_CONTACTS'] as $f => $v) {
	$data['author_'.$f] = $v;
}
$data['author_login'] = $data['author_email'];
$data['author_comment'] = $data['author_name'];

if ($data['author_login'] == 'admin') exit;

$userid = SQL::getval("author_id", DB_TABLE_PREFIX . "auth_pers", "author_login = '".$data['author_login']."'");

if( empty($userid) ) {
	include $_CORE->ROOT."/modules/auth/land_data/auth_pers.dat";
	$data['author_passwd']	= rand(100000,999999);
	$data['author_passwd']	= ($_CONF['PWDCRYPTED']) ? crypt($data['author_passwd'],SALT) : $data['author_passwd'];
	if(!empty($_CONF['MAIL_ACT'])){
		//генерация кода
		$am=mt_rand(5,7);
		$eng='qwertyuiopasdfghjklzxcvbnm';
		$num='1234567890';
		$full_text=$eng.$num;
		$e=strlen($full_text)-1;
		$p='';
		for($n=0;$n!=$am;$n++){
			$p.=substr($full_text,mt_rand(0,$e),1);
		} 
		$code	= $p;
	}
	global $auth;
	$auth = $data;
	$aform		= new cForm($DATA);
	$now_time	= time();
	list($vars,$vals) = $aform->GetSQL('insert');
	$var_add = $val_add = "";
	$max_id = SQL::getval( "MAX(author_id) as max", DB_TABLE_PREFIX.'auth_pers');
	$next_id_lost = intval($max_id) + 1;
	if(!empty($_SESSION['SESS_AUTH']['ALL']['prtn'])){
		$var_add .= ",prtn";
		$val_add .= ",".$_SESSION['SESS_AUTH']['ALL']['prtn'];
	}
	if( !empty($code) ){
		
		$acc = 1;
		$ins = SQL::ins( DB_TABLE_PREFIX.'auth_pers', "$vars, code, accept, author_id, created, modify".$var_add, " $vals, '$code',$acc,'$next_id_lost', $now_time, $now_time".$val_add );
		
	}else{
		$ins = SQL::ins( DB_TABLE_PREFIX.'auth_pers', "$vars, author_id, created, modify".$var_add, "$vals, $next_id_lost, $now_time, $now_time".$val_add );
	}
	$userid = $next_id_lost;
	if (in_array('auth', $_CONF['USED_MODULES'])) {
		SQL::upd( TAB_AUTH_PERS, ' alias = author_id ', '' , '', DEBUG );
	}
	$dmail = array();
	
	$dmail['body']	= "Здравствуйте, ".$auth['author_comment']."! <br />
	Регистрация на сайте ".$_SERVER["HTTP_HOST"]." прошла успешно.<br>";
	
	if(!empty($_CONF['MAIL_ACT'])){ 
		$dmail['body'] .='<br> Внимание!!! Необходимо подтвердить почту, для этого пройдите по этой ссылке <a href="http://'.$_SERVER["HTTP_HOST"].'/auth/accept?code='.$code.'&nom='.$userid.'" target=_blank>'.$_SERVER["HTTP_HOST"].'/auth/accept?code='.$code.'&nom='.$userid.'</a><br><br>';
	}
	$dmail['body'] .="Ваш логин - ".$auth['author_login']."<br>
	Пароль - ".$auth['author_passwd'].". Пароль можно изменить в своем профиле.<br />
	Также, после авторизации на сайте, Вам будет доступна информация о статусе Вашего заказа.";
	$dmail['name']	= 'GrandNN';
	$dmail['email']	= TO;
	$dmail['subject']	= 'Registration info '.$_SERVER['HTTP_HOST'];
	$dmail['type']	= 'html';
	$dmail['mailto'] = $_POST['BASKET_CONTACTS']['email'];
	// lMail::send($dmail);
	global $_SMS, $_CONF;
	// отправляем информацию по sms
	$text = "Вы зарегистрировались на grandnn.com. Ваш логин: ".$auth['author_login']." пароль: ".$auth['author_passwd'];
	
	$text = iconv("windows-1251","UTF-8",$text);
	$phone = substr(preg_replace('/\D/', '', $auth['author_phone']),-10);
	//$res = $_SMS->sendSMS( $phone , $text , $_CONF['settings']['from'] );
	
	// Залогиним, тут аккуратно, логиним только новых, что бы не дать доступ к существующим
	$_SESSION['SESS_AUTH']['ID']		= $userid;
	$_SESSION['SESS_AUTH']['LOGIN']		= $data['author_login'];
	$_SESSION['SESS_AUTH']['NAME']		= $data['author_comment'];
	$_SESSION['SESS_AUTH']['ALL'] = SQL::getrow("*", DB_TABLE_PREFIX . "auth_pers", "author_id = '".$userid."'");
	print_r($_SESSION);exit;
}

if(!empty($_SESSION['SESS_AUTH']['ID']) && $_SESSION['SESS_AUTH']['ID'] == $userid ){
	$arrset = array();
	if(empty($_SESSION['SESS_AUTH']['ALL']['author_phone']) && !empty($data['author_phone'])){
		$arrset[] = "author_phone = '".$data['author_phone']."'";
	}
	if(empty($_SESSION['SESS_AUTH']['ALL']['author_city']) && !empty($data['author_city'])){
		$arrset[] = "author_city = '".$data['author_city']."'";
	}
	if(empty($_SESSION['SESS_AUTH']['ALL']['author_address']) && !empty($data['author_address'])){
		$arrset[] = "author_address = '".$data['author_address']."'";
	}
	if(count($arrset)){
		SQL::upd(DB_TABLE_PREFIX.'auth_pers', implode(',',$arrset), "author_id = '".$userid."'");
		$_SESSION['SESS_AUTH']['ALL']['author_phone'] 	= $data['author_phone'];
		$_SESSION['SESS_AUTH']['ALL']['author_city'] 	= $data['author_city'];
	}
}

// обновим ID пользователя с таким email в таблице заказ
SQL::upd(DB_TABLE_PREFIX.'basket', " from_auth = '$userid' ", "email = '".$data['author_login']."'");

//header("Location: /db/clients");
//exit;
?>