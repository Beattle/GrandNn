<?
$FORM_ORDER	= ' ORDER BY ts DESC ';
$FORM_WHERE	= '';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL)";

$FORM_DATA= array (
  'ts'	=>
  array (
    'field_name' => 'ts',
    'name' => 'form[ts]',
    'title' => Main::get_lang_str('data', 'db'),
    'must' => 1,
	'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
//    'readonly' => 'true',
		'default'	=> date('Y-m-d'),
		'sub_type' => 'varchar'
  ),
  'name'	=>
  array (
    'field_name' => 'name',
    'name' => 'form[name]',
    'title' => Main::get_lang_str('name', 'db'),
    'must' => 1,
	'style'	=> 'width:100%',
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
  'id' => 
  array (
    'field_name' => 'id',
    'name' => 'form[id]',
    'title' => 'id',
    'must' => 0,
    'maxlen' => 20,
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
  'code'	=>
  array (
    'field_name' => 'code',
    'name' => 'form[code]',
    'title' => Main::get_lang_str('code', 'db'),
    'must' => 1,
	'style'	=> 'width:100%',
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
  'link'	=>
  array (
    'field_name' => 'link',
    'name' => 'form[link]',
    'title' => 'ссылка',
    'must' => 0,
	'style'	=> 'width:100%',
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
  'textlink'	=>
  array (
    'field_name' => 'textlink',
    'name' => 'form[textlink]',
    'title' => 'текст ссылки',
    'must' => 0,
	'style'	=> 'width:100%',
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
  'hidden'	=>
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => Main::get_lang_str('ne_publ', 'db'),
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
		'sub_type' => 'varchar'
  ),
)
?>