<?
$FORM_WHERE = ' ';
$FORM_ORDER	= ' ORDER BY ts DESC ';

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
	'name' => 
	array (
		'field_name' => 'name',
		'name' => 'form[name]',
		'title' => 'Название',
		'style' => 'width: 100%',
		'must' => 1,
		'maxlen' => 20,
		'type' => 'hidden'
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
	'ФИО'	=>
	array (
		'field_name' => 'fio',
		'name' => 'form[fio]',
		'title' => 'ФИО',
		'must' => 1,
		'style'	=> 'width:100%',
		'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
	),
	'phone'	=>
	array (
		'field_name' => 'phone',
		'name' => 'form[phone]',
		'title' => 'Телефон',
		'must' => 0,
		'style'	=> 'width:100%',
		'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
	),
	'mail'	=>
	array (
		'field_name' => 'mail',
		'name' => 'form[mail]',
		'title' => 'Почта',
		'must' => 1,
		'style'	=> 'width:100%',
		'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
	),
	'summa'	=> array (
		'field_name' => 'summa',
		'name' => 'form[summa]',
		'title' => 'Сумма',
		'must' => 0,
		'style'	=> 'width:100%',
		'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
	),
	'partner_cashout'	=> array (
		'field_name' => 'partner_cashout',
		'name' => 'form[partner_cashout]',
		'title' => "Способ вывода средств",
		'must' => 0,
		'maxlen' => 20,
		'type' => 'select',
		'arr'	=> array( 
				'не выбрано',
				'яндекс деньги',
				'альфа банк', 
				'сбербанк' 
		)
	),
	'cont' => 
	array (
		'field_name' => 'cont',
		'name' => 'form[cont]',
		'title' => 'Реквизиты',
		'maxlen' => '5124',
		'must' => '1',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '10',
	),
	'ts' => array (
		'field_name' => 'ts',
		'name' => 'form[ts]',
		'title' => 'Дата',
		'must' => 0,
		'size' => 15,
		'maxlen' => 255,
		'type' => 'hidden',
		'default'	=> date('Y-m-d'),
	), 
	'hidden' => array (
		'field_name' => 'hidden',
		'name' => 'form[hidden]',
		'title' => 'обработан',
		'must' => 0,
		'maxlen' => 1,
		'type' => 'hidden',
	), 
	'status' => array(
		'field_name' =>	'status',
		'name' => 'form[status]',
		'title'	=> 'Статус',
		'must' => 0,
		'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' => 'select',
		'arr'	=> array( 'Принята, обрабатывается', 'Исполнена', 'Отменена' )
	)
)
?>