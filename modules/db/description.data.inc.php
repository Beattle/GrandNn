<?
global $_CORE;

$FORM_ORDER	= ' ORDER BY name ASC ';
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
	'title' => 'Артикул',
	'must' => 1,
	'size' => 50,
	'maxlen' => 255,
	'type' => 'textbox',
	),
	
	'ts' => array(
	'field_name' =>	'ts',
	'name' => 'form[ts]',
	'title'	=> 'Дата',
	'must' => 0,
	'size' => 15,
	'maxlen' =>	255,
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
	'cont' => 
	array (
	'field_name' => 'cont',
	'name' => 'form[cont]',
	'title' => 'текст',
	'must' => '1',
	'maxlen' => '65535',
	'type' => 'textarea',
	'style' => 'width:100%',
	'rows' => '15',
	'wysiwyg'	=> 'tinymce',
	)
);

?>