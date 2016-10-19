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
	'proba375' => 
	array (
		'field_name' => 'proba375',
		'name' => 'form[proba375]',
		'title' => '375&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba500' => 
	array (
		'field_name' => 'proba500',
		'name' => 'form[proba500]',
		'title' => '500&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba585' => 
	array (
		'field_name' => 'proba585',
		'name' => 'form[proba585]',
		'title' => '583&deg;/585&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba750' => 
	array (
		'field_name' => 'proba750',
		'name' => 'form[proba750]',
		'title' => '750&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba850' => 
	array (
		'field_name' => 'proba850',
		'name' => 'form[proba850]',
		'title' => '850&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba958' => 
	array (
		'field_name' => 'proba958',
		'name' => 'form[proba958]',
		'title' => '958&deg;',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'proba900' => 
	array (
		'field_name' => 'proba900',
		'name' => 'form[proba900]',
		'title' => '900&deg; <br /> если заполнено, то выведется под таблицей',
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