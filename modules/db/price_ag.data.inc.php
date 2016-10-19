<?
$FORM_ORDER	= ' ORDER BY prior, ts ASC ';
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
		'title' => 'Наименование',
		'must' => 1,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),

	'ts' => array(
		'field_name' =>	'ts',
		'name' => 'form[ts]',
		'title'	=> 'Дата',
		'must' => 1,
		'type' => 'hidden',
		'default'	=> date('Y-m-d')
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
	'proba875' => 
	array (
		'field_name' => 'proba875',
		'name' => 'form[proba875]',
		'title' => '875&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba925' => 
	array (
		'field_name' => 'proba925',
		'name' => 'form[proba925]',
		'title' => '925&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba999' => 
	array (
		'field_name' => 'proba999',
		'name' => 'form[proba999]',
		'title' => '999&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'prior' => 
	array (
		'field_name' => 'prior',
		'name' => 'form[prior]',
		'title' => 'Порядок',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
);

?>