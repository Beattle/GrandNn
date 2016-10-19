<?
$FORM_ORDER	= ' ORDER BY ts DESC ';

if (!$_CORE->IS_ADMIN) {
	
} else
	$FORM_WHERE = '';

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
    'title' => 'Номер заказа',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'textbox',
	'readonly'	=> 'true'
  ),
 'name'	=>
  array	(
	'field_name' =>	'name',
	'name' => 'form[name]',
	'title'	=> 'id партнера:id реферала:время покупки',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'hidden',
  ),
  'hidden'	=>
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => 'Не исполнен',
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
  ),
 'user_id'	=>
  array	(
	'field_name' =>	'user_id',
	'name' => 'form[user_id]',
	'title'	=> 'Партнер',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
  ),
 'url'	=>
  array	(
	'field_name' =>	'url',
	'name' => 'form[url]',
	'title'	=> 'страница на которую пришел посетитель',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
  ),
  'referer_url'	=>
  array (
    'field_name' => 'referer_url',
    'name' => 'form[referer_url]',
    'title' => 'откуда пришел посетитель',
    'must' => 0,
    'maxlen' => 255,
    'type' => 'textbox'
  ),
  'ts'	=>
  array (
    'field_name' => 'ts',
    'name' => 'form[ts]',
    'title' => Main::get_lang_str('data', 'db'),
    'must' => 1,
	'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
	'default'	=> date('Y-m-d'),
	'sub_type' => 'varchar'
  )

);
?>