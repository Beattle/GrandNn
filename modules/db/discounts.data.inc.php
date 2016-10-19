<?
$FORM_ORDER	= ' ORDER BY prior, discount, ts ASC ';
$FORM_WHERE = '';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE = ' AND (hidden != 1  OR hidden IS NULL) ';
	$arr_met = array(""=>"не выбрано","Ag" => 'Серебро', "Ag 925" => 'Серебро 925', "Au" => 'Золото', "Au 375" => 'Золото 375', "Au 583" => 'Золото 583', "Au 585" => 'Золото 585', "Au 750" => 'Золото 750', "Au 900" => 'Золото 900', "Au 986" => 'Золото 986', "Au 999" => 'Золото 999');
	$arr_ins = array('Не указана',
                  'noins'=>'Без вставок', 
                  'diamonds'=>'Бриллианты', 
                  'rhinestone'=>'Фианиты', 
                  'pearls'=>'Жемчуг', 
                  'precious'=>'Драгоценные', 
                  'semi-precious'=>'Полудрагоценные', 
                  'ornamental'=>'Поделочные'
                  );
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
		'title' => 'Наименование скидки',
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
   'bu' => 
  array (
    'field_name' => 'bu',
    'name' => 'form[bu]',
    'title' => 'Новое или Б/У ?',
		'type' => 'select',
		'arr'	=> array( '0'=>'все', '1'=>'Новое', '2'=>'Б/У'),
		'style' => 'width:100%'
  ),
	'probe' => 
	array (
		'field_name' => 'probe',
		'name' => 'form[probe]',
		'title' => 'Проба',
		'must' => '0',
		'type' => 'select',
		'arr'	=> $arr_met,
		'style' => 'width:100%'
	),
	'type_products' => 
	array (
		'field_name' => 'type_products',
		'name' => 'form[type_products]',
		'title' => 'Тип изделия',
		'must' => '0',
		'type' => 'select_from_table',
		'ex_table' => DB_TABLE_PREFIX.'type_products',
		'id_ex_table' => 'id',
		'ex_table_field' => 'name',
		'style' => 'width:100%'
	),
	'ins' => 
	array (
		'field_name' => 'ins',
		'name' => 'form[ins]',
		'title' => 'Вставка',
		'must' => '0',
		'type' => 'select',
		'arr' => $arr_ins,
		'style' => 'width:100%'
	),
	'from_price' => 
	array (
		'field_name' => 'from_price',
		'name' => 'form[from_price]',
		'title' => 'Цена от Х руб',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'to_price' => 
	array (
		'field_name' => 'to_price',
		'name' => 'form[to_price]',
		'title' => 'Цена до Х руб',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'num_series' => 
	array (
		'field_name' => 'num_series',
		'name' => 'form[num_series]',
		'title' => 'Серия номенклатуры',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'priceforone' => 
	array (
		'field_name' => 'priceforone',
		'name' => 'form[priceforone]',
		'title' => 'Новая цена за грамм',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'discount' => 
	array (
		'field_name' => 'discount',
		'name' => 'form[discount]',
		'title' => 'Размер скидки в %',
		'must' => '0',
		'type' => 'textbox',
		'style' => 'width:100%'
	),
	'prior' => array (
		'field_name' 	=> 'prior',
		'name' 			=> 'form[prior]',
		'title'			=> 'сортировка',
		'must' 			=> 0,
		'maxlen' 		=> 20,
		'type' 			=>'hidden',
		'sub_type' 		=> 'int'
	)
);

?>