<?
$_OBSV['WALL_OFF'] = false;
$_OBSV['WALL_COLOR'] = array(0xCC, 0x99, 0x33);
$_OBSV['WALL_BGCOLOR'] = array(0, 0, 0);

$_OBSV['PLUGIN'] = 'plugin';

$_OBSV['SAVE_DB'] = true;
$_OBSV['TABLE']	= DB_TABLE_PREFIX . 'obsv';


$FORM_DATA = array(
  'id' => 
  array	(
	'field_name' =>	'id',
	'name' => 'obsv[id]',
	'title'	=> 'id',
	'must' => 0,
	'maxlen' =>	20,
	'type' => 'hidden',
  ),
  'alias' => 
  array (
    'field_name' => 'alias',
    'name' => 'obsv[alias]',
    'title' => 'alias',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'hidden',
  ),
 'name'	=>
  array	(
	'field_name' =>	'name',
	'name' => 'obsv[name]',
	'title'	=> 'Наименование организации',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
/* 'person'	=>
  array	(
	'field_name' =>	'person',
	'name' => 'obsv[person]',
	'title'	=> 'Контактное лицо',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),*/
 'email'	=>
  array	(
	'field_name' =>	'email',
	'name' => 'obsv[email]',
	'title'	=> 'E-mail',
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
	'name' => 'obsv[www]',
	'title'	=> 'Ваш сайт',
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),*/
 'phone'	=>
  array	(
	'field_name' =>	'phone',
	'name' => 'obsv[phone]',
	'title'	=> 'Телефон',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
  'ts'	=>
  array (
    'field_name' => 'ts',
    'name' => 'obsv[ts]',
    'title' => 'Дата',
    'must' => 0,
	'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
    'readonly' => 'true',
	'default'	=> date('Y-m-d')
  ),
 'describe'	=>
  array	(
	'field_name' =>	'describe',
	'name' => 'obsv[describe]',
	'title'	=> 'Сообщение',
	'must' => 0,
	'maxlen' =>	'65535',
	'type' => 'textarea',
	'style'	=> 'width:100%',
	'rows' => '20',
  ),
// 'dop'	=>
//  array	(
//	'field_name' =>	'dop',
//	'name' => 'obsv[dop]',
//	'title'	=> 'Дополнительная информация',
//	'must' => 0,
//	'maxlen' =>	'65535',
//	'type' => 'textarea',
//	'style'	=> 'width:100%',
//	'rows' => '20',
//  ),
 'cont'	=>
  array	(
	'field_name' =>	'cont',
	'name' => 'obsv[cont]',
	'title'	=> 'Письмо',
	'must' => 0,
	'maxlen' =>	'65535',
	'type' => 'textarea',
	'style'	=> 'width:100%',
	'rows' => '20',
	'wysiwyg'	=> 'htmlarea3',
	'wysiwyg_path'	=> '/modules/html/',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  )
);

?>