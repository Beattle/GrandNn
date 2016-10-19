<?
$FORM_WHERE = ' ';
$FORM_ORDER	= '  ';


$FORM_DATA= array (
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
	'ts'	=>
	array	(
		'field_name' =>	'ts',
		'name' =>	'form[ts]',
		'title'	=> 'Дата',
		'must' =>	0,
		'size' =>	15,
		'maxlen' =>	255,
		'type' =>	'hidden',
		'readonly' =>	'true',
		'default'	=> date('Y-m-d H:i')
	),
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
    'title' => 'Серия номенклатуры',
    'must' => 1,
	'size' => 50,
    'maxlen' => 255,
    'type' => 'textbox',
  ),
	'begin'	=>
  array (
    'field_name' => 'begin',
    'name' => 'form[begin]',
    'title' => 'Начало брони',
    'must' => 1,
	'size' => 50,
    'maxlen' => 255,
    'type' => 'textdate',
  ),
	'end'	=>
  array (
    'field_name' => 'end',
    'name' => 'form[end]',
    'title' => 'Конец брони',
    'must' => 1,
	'size' => 50,
    'maxlen' => 255,
    'type' => 'textdate',
  ),
	'tip'	=>
  array (
    'field_name' => 'tip',
    'name' => 'form[tip]',
    'title' => 'Тип брони',
    'must' => 1,
    'maxlen' => 255,
    'type' => 'select',
		'arr'	=> array( 
              0=>'', 
              1=>'Забронировано',
              2=>'Оформлено в рассрочку'
            ),
  ),

)
?>