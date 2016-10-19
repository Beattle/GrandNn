<?
global $_CONF;

if (!$_CORE->IS_ADMIN)
	exit;

$FORM_WHERE = " AND author_login != 'admin' AND author_login != 'developer' ";
$FORM_ORDER = " ORDER BY author_login ";
$_KAT['auth']['EXPORT'] = array('author_login', 'author_comment', 'author_phone');
include $_SERVER['DOCUMENT_ROOT']."/modules/auth/land_data/auth_pers.dat";
$FORM_DATA = $DATA;
$_KAT[$_KAT['KUR_ALIAS']]['admin_search'] = array('author_login', 'author_comment');
foreach ($FORM_DATA as $k => $v) {
	$FORM_DATA[$k]['name'] = str_replace('auth[', 'form[', $FORM_DATA[$k]['name']);
}

$_KAT['INDEX']['auth'] = 'alias';
unset($FORM_DATA['author_passwd']);
unset($FORM_DATA['author_passwd2']);

$FORM_DATA['alias'] = array(
    'field_name' => 'alias',
    'name' => 'form[alias]',
    'title' => Main::get_lang_str('alias', 'db'),
    'must' => 0,
    'maxlen' => 20,
    'type' => 'hidden',
);
//$FORM_DATA['author_id'] = array(
//    'field_name' => 'author_id',
//    'name' => 'form[author_id]',
//    'title' => 'author_id',
//    'must' => 0,
//    'maxlen' => 20,
//    'type' => 'hidden',
//);

$FORM_DATA['hidden'] = array(
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => Main::get_lang_str('off', 'db'),
    'must' => 0,
    'maxlen' => 20,
    'type' => 'checkbox',
);
if ($_CONF['FEATURES_USED']['blogs']){
  $FORM_DATA['author_blog'] = array(
      'field_name' => 'author_blog',
      'name' => 'form[author_blog]',
      'title' => Main::get_lang_str('add_blog', 'db'),
      'must' => 0,
      'maxlen' => 20,
      'type' => 'checkbox',
  );
}
if (!empty($_CORE->_modules['partners_stat'])) {
	$FORM_DATA['partner'] = array(
			'field_name' => 'partner',
			'name' => 'form[partner]',
			'title' => Main::get_lang_str('partner', 'db'),
			'must' => 0,
			'maxlen' => 20,
			'type' => 'checkbox',
	);
	$FORM_DATA['partner_percent'] = array(
			'field_name' => 'partner_percent',
			'name' => 'form[partner_percent]',
			'title' => Main::get_lang_str('partner_percent', 'db'),
			'must' => 0,
			'maxlen' => 20,
			'type' => 'textbox',
	);
	$FORM_DATA['partner_cashout'] = array(
			'field_name' => 'partner_cashout',
			'name' => 'form[partner_cashout]',
			'title' => "Способ вывода средств",
			'must' => 0,
			'maxlen' => 20,
			'type' => 'select',
			'arr'	=> array( 
					'не выбрано',
					'яндекс деньги',
					'альфа банк', 
					'сбербанк' 
			) 
	);
}
if (!empty($_CONF['FEATURES_USED']['auth_role'])) {
	$FORM_DATA['author_role'] = array(
			'field_name' => 'author_role',
			'name' => 'form[author_role]',
			'title' => 'Открыть доступ к админке',
			'must' => 0,
			'maxlen' => 20,
			'type' => 'select',
			'arr' => array(
					'' => 'нет',
					'admin' => 'да'
			)
	);
}
//print_r($FORM_DATA);
?>