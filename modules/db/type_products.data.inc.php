<?

$FORM_ORDER = ' ORDER BY `prior`, `name`';
$FORM_WHERE = '';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL)";


$FORM_DATA = array(
	'id' => array(
		'field_name' 	=> 'id',
		'name' 			=> 'form[id]',
		'title'			=> 'id',
		'must' 			=> 0,
		'maxlen' 		=> 20,
		'type' 			=> 'hidden',
	),
	'alias' => array(
		'field_name' 	=> 'alias',
		'name' 			=> 'form[alias]',
		'title'			=> 'alias',
		'must' 			=> 0,
		'maxlen' 		=> 20,
		'type' 			=> 'hidden',
	),
	'name' => array(
		'field_name' 	=> 'name',
		'name' 			=> 'form[name]',
		'title'			=> 'Наименование',
		'must' 			=> 1,
		'style'			=> 'width:100%',
		'maxlen' 		=> 255,
		'type' 			=> 'textbox',
		'logic'			=> 'OR',
		'search' 		=> " LIKE '%%%s%%'",
	),
	'name_one' => array(
		'field_name' 	=> 'name_one',
		'name' 			=> 'form[name_one]',
		'title'			=> 'Наименование для единицы',
		'must' 			=> 0,
		'style'			=> 'width:100%',
		'maxlen' 		=> 255,
		'type' 			=> 'textbox'
	),
	'wordform' => array(
		'field_name' 	=> 'wordform',
		'name' 			=> 'form[wordform]',
		'title'			=> 'Какого рода единица продукции?',
		'must' 			=> 0,
		'style'			=> 'width:100%',
		'maxlen' 		=> 255,
		'type' => 'select',
		'arr'	=> array( 
			0=>'Мужского рода',
			1=>'Женского рода', 
			2=>'Среднего рода',
			3=>'Множественное число'
		),
	),
	'ts' => array(
		'field_name' 	=> 'ts',
		'name' 			=> 'form[ts]',
		'title'			=> 'Дата',
		'must' 			=> 1,
		'type' 			=> 'hidden',
		'default'		=> date('Y-m-d')
	),
	'hidden' => array (
		'field_name' 	=> 'hidden',
		'name' 			=> 'form[hidden]',
		'title'			=> Main::get_lang_str('ne_publ', 'db'),
		'must' 			=> 0,
		'maxlen' 		=> 1,
		'type' 			=>'checkbox',
	),
	'prior' => array (
		'field_name' 	=> 'prior',
		'name' 			=> 'form[prior]',
		'title'			=> 'сортировка',
		'must' 			=> 0,
		'maxlen' 		=> 20,
		'type' 			=>'hidden',
	)
)
?>