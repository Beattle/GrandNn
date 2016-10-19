<?

$FORM_ORDER	=	'	ORDER	BY id desc ';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL)";


$FORM_DATA=	array	(
	'id' =>	
	array	(
		'field_name' =>	'id',
		'name' =>	'form[id]',
		'title'	=> 'id',
		'must' =>	0,
		'maxlen' =>	20,
		'type' =>	'hidden',
	),
	'alias'	=> 
	array	(
		'field_name' =>	'alias',
		'name' =>	'form[alias]',
		'title'	=> 'alias',
		'must' =>	0,
		'maxlen' =>	20,
		'type' =>	'hidden',
	),
 'name'	=>
	array	(
		'field_name' =>	'name',
		'name' =>	'form[name]',
		'title'	=> 'Название',
		'must' =>	1,
	'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' =>	'textbox',
		'logic'	=> 'OR',
		'search' =>	"	LIKE '%%%s%%'",
	),
 'sort'	=>
	array	(
		'field_name' =>	'sort',
		'name' =>	'form[sort]',
		'title'	=> 'Порядок сортировки',
		'must' =>	0,
		'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' =>	'textbox',
		'logic'	=> 'OR',
		'search' =>	"	LIKE '%%%s%%'",
	),
	'hidden'	=>
	array	(
		'field_name' =>	'hidden',
		'name' =>	'form[hidden]',
		'title'	=> Main::get_lang_str('ne_publ', 'db'),
		'must' =>	0,
		'maxlen' =>	1,
		'type' =>	'checkbox',
	),
)
?>