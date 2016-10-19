<?

$FORM_ORDER	= ' ORDER BY prior,id DESC ';

if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL)";
else 
	$FORM_WHERE = '';

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
 'name'	=>
  array (
    'field_name' => 'name',
    'name' => 'form[name]',
    'title' => 'Название',
    'must' => 1,
	'style' => 'width:100%',
    'maxlen' => 255,
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
 'url'	=>
  array (
    'field_name' => 'url',
    'name' => 'form[url]',
    'title' => 'ссылка (с http://...)',
    'must' => 1,
	'style' => 'width:100%',
    'maxlen' => 255,
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),

 'anons'	=>
  array (
    'field_name' => 'anons',
    'name' => 'form[anons]',
    'title' => 'Краткая информация',
    'must' => 0,
		'style' => 'width:100%',
    'maxlen' => 255,
    'type' => 'textarea',
		'rows'	=> 3,
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
 'size_anons'	=>
  array (
    'field_name' => 'size_anons',
    'name' => 'form[size_anons]',
    'title' => 'Размер шрифта краткой информации',
    'must' => 0,
	'style' => 'width:100%',
    'maxlen' => 255,
	'default' => 12,
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
 'price'	=>
  array (
    'field_name' => 'price',
    'name' => 'form[price]',
    'title' => 'Цена',
    'must' => 0,
	'style' => 'width:100%',
    'maxlen' => 255,
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
'doc' => array(
			'field_name' => 'doc', // должно совпадать с 'name'!!!
			'name'	=> 'doc',
			'title' => 'Фото (820x160)',
			'hardwidth' => 1000,
			'hardheight' => 1000,
			'type'	=> 'photo',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'get_file_name()',
			'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
			'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
  'hidden'	=>
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => 'Не публиковать',
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
  ),
 'size'	=>
  array (
    'field_name' => 'size',
    'name' => 'form[size]',
    'title' => 'Размер заголовка',
    'must' => 0,
	'style' => 'width:100%',
    'maxlen' => 255,
	'default' => 26,
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
  ),
 'prior'	=>
  array (
    'field_name' => 'prior',
    'name' => 'form[prior]',
    'title' => 'очередность',
    'must' => 0,
	'style' => 'width:100%',
    'maxlen' => 20,
    'type' => 'hidden',
  ),



)
?>