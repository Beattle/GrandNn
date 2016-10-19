<?

$_KAT['INDEX'][$_KAT['KUR_ALIAS']]	= 'id';
$FORM_ORDER	= '	ORDER BY id DESC ';
$FORM_WHERE = '';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL) AND cont!=''";

$FORM_DATA = array(
  'id' => 
  array	(
	'field_name' =>	'id',
	'name' => 'form[id]',
	'title'	=> 'id',
	'must' => 0,
	'maxlen' =>	20,
	'type' => 'hidden',
  ),
  'alias' => 
  array (
    'field_name' => 'alias',
    'name' => 'form[alias]',
    'title' => Main::get_lang_str('alias', 'db'),
    'must' => 0,
    'maxlen' => 20,
    'type' => 'hidden',
  ),
 'name'	=>
  array	(
	'field_name' =>	'name',
	'name' => 'form[name]',
	'title'	=> 'Название знака зодиака',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
  'ts'	=>
  array (
    'field_name' => 'ts',
    'name' => 'form[ts]',
    'title' => Main::get_lang_str('data', 'db'),
    'must' => 0,
	'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
    'readonly' => 'true',
	'default'	=> date('Y-m-d')
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
	),
  'hidden'	=>
    array	(
    	'field_name' =>	'hidden',
    	'name' =>	'form[hidden]',
    	'title'	=> 'Не публиковать на сайте',
    	'must' =>	0,
    	'maxlen' =>	1,
    	'type' =>	'checkbox',
    ),
);
?>