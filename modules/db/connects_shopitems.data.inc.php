<?
global $_CORE;
	$FORM_FROM = "";
	$FORM_SELECT_BEFORE = '';
	$FORM_SELECT = "";
$FORM_ORDER	= ' ORDER BY ts ASC ';
$FORM_WHERE = '';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE = ' AND (hidden != 1  OR hidden IS NULL) ';

$FORM_DATA= array (
   'hidden' => 
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => 'Не показывать',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'checkbox',
  ),
	'name'	=>
  array (
    'field_name' => 'name',
    'name' => 'form[name]',
    'title' => 'Название',
    'must' => 1,
	'size' => 50,
    'maxlen' => 255,
    'type' => 'hidden',
    'default'	=> date('Y-m-d H:i:s')
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
    'title' => 'alias',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'hidden',
  ),
  'num_series' => 
  array (
    'field_name' => 'num_series',
    'name' => 'form[num_series]',
    'title' => 'связи серий номенклатур',
    'must' => '1',
    'maxlen' => '65535',
    'type' => 'textarea',
 		'style' => 'width:100%',
   'cols' => '50',
    'rows' => '3',
  ),
  'artikuls' => 
  array (
	'field_name' => 'artikuls',
	'name' => 'form[artikuls]',
	'title' => 'связи артикулов',
	'must' => '0',
	'maxlen' => '65535',
	'type' => 'textarea',
	'style' => 'width:100%',
	'cols' => '50',
	'rows' => '3',
	'readonly' => '1'
  ),
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
);

?>