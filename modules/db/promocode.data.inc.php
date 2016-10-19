<?
$FORM_ORDER	= ' ORDER BY date_post DESC ';
$FORM_WHERE = '';
$_KAT['promocode']['admin_search'] = array('code');
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE = ' AND (hidden != 1  OR hidden IS NULL) ';
$_KAT['promocode']['EXPORT'] = array('date_post', 'phone'); 
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
	'ip' => 
	array (
		'field_name' => 'ip',
		'name' => 'form[ip]',
		'title' => 'ip',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'discount' => 
	array (
		'field_name' => 'discount',
		'name' => 'form[discount]',
		'title' => 'Скидка',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'code' => 
	array (
		'field_name' => 'code',
		'name' => 'form[code]',
		'title' => 'промокод',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'date_post' => 
	array (
		'field_name' => 'date_post',
		'name' => 'form[date_post]',
		'title' => 'Дата и время отправки sms',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'phone' => 
	array (
		'field_name' => 'phone',
		'name' => 'form[phone]',
		'title' => 'Номер телефона',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	)
);

?>