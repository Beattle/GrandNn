<?
$FORM_WHERE = '';
$FORM_FROM = "";
$FORM_SELECT_BEFORE = "";
$FORM_SELECT = "";
$FORM_ORDER	= " ORDER BY id ";

$FORM_DATA= array (
   'hidden' => 
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => 'Не показывать',
    'must' => 0,
    'maxlen' => 1,
    'type' => 'hidden',
    'sub_type' => 'int'
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
	'name' => 
  array (
    'field_name' => 'name',
    'name' => 'form[name]',
    'title' => 'Серия номенклатуры',
    'must' => 1,
    'maxlen' => 150,
    'type' => 'textbox',
  ),
	'alias' => 
  array (
    'field_name' => 'alias',
    'name' => 'form[alias]',
    'title' => 'alias',
    'must' => 0,
    'maxlen' => 255,
    'type' => 'hidden',
  ),
  'noloop' => array(
	'field_name' => 'noloop',
    'name' => 'form[noloop]',
    'title' => 'Не показывать лупу',
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
    'sub_type' => 'int'
  ),
	'ts' => array(
		'field_name' =>	'ts',
		'name' => 'form[ts]',
		'title'	=> 'Дата',
		'must' => 1,
		'type' => 'hidden',
		'default'	=> date('Y-m-d H:i:s')
	),
);
?>
