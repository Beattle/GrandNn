<?

$_KAT['INDEX'][$_KAT['KUR_ALIAS']]	= 'id';
$FORM_ORDER	= '	ORDER BY id DESC ';
$FORM_WHERE = '';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL) AND cont!=''";

$FORM_DATA = array(
  'id' => 
  array	(
	'field_name' =>	'id',
	'name' => 'form[id]',
	'title'	=> 'id',
	'must' => 0,
	'maxlen' =>	20,
	'type' => 'hidden',
  ),
  'alias' => 
  array (
    'field_name' => 'alias',
    'name' => 'form[alias]',
    'title' => Main::get_lang_str('alias', 'db'),
    'must' => 0,
    'maxlen' => 20,
    'type' => 'hidden',
  ),
 'name'	=>
  array	(
	'field_name' =>	'name',
	'name' => 'form[name]',
	'title'	=> Main::get_lang_str('name_org', 'db'),
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'hidden',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
    'default' => time()
  ),
 'person'	=>
  array	(
	'field_name' =>	'person',
	'name' => 'form[person]',
	'title'	=> Main::get_lang_str('contact_person', 'db'),
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
 'email' =>
  array	(
	'field_name' =>	'email',
	'name' => 'form[email]',
	'title'	=> Main::get_lang_str('email', 'db'),
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
/* 'www'	=>
  array	(
	'field_name' =>	'www',
	'name' => 'form[www]',
	'title'	=> Main::get_lang_str('www', 'db'),
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
 'phone'	=>
  array	(
	'field_name' =>	'phone',
	'name' => 'form[phone]',
	'title'	=> Main::get_lang_str('tel', 'db'),
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),*/
  'ts'	=>
  array (
    'field_name' => 'ts',
    'name' => 'form[ts]',
    'title' => Main::get_lang_str('data', 'db'),
    'must' => 0,
	'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
    'readonly' => 'true',
	'default'	=> date('Y-m-d')
  ),

// 'dop'	=>
//  array	(
//	'field_name' =>	'dop',
//	'name' => 'form[dop]',
//	'title'	=> 'Dopolnitel'naja informacija',
//	'must' => 0,
//	'maxlen' =>	'65535',
//	'type' => 'textarea',
//	'style'	=> 'width:100%',
//	'rows' => '20',
//  ),
 'cont'	=>
  array	(
	'field_name' =>	'cont',
	'name' => 'form[cont]',
	'title'	=> 'Отзыв',
	'must' => 0,
	'maxlen' =>	'4000',
	'type' => 'textarea',
	'style'	=> 'width:100%',
	'rows' => '10',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
  'hidden'	=>
    array	(
    	'field_name' =>	'hidden',
    	'name' =>	'form[hidden]',
    	'title'	=> 'Не публиковать на сайте',
    	'must' =>	0,
    	'maxlen' =>	1,
    	'type' =>	'checkbox',
    ),
  'code'	=>
  array (
    'field_name' => 'code',
    'name' => 'form[code]',
    'title' => Main::get_lang_str('code', 'db'),
    'must' => 0,
	'style'	=> 'width:100%',
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
 'request'	=>
  array	(
	'field_name' =>	'request',
	'name' => 'form[request]',
	'title'	=> 'Ответ администратора',
	'must' => 0,
	'maxlen' =>	'5000',
	'type' => 'textarea',
	'style'	=> 'width:100%',
	'rows' => '20',
	'wysiwyg'	=> 'tinymce',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  )
);
?>