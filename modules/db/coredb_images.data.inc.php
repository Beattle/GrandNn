<?
global $FORM_IMPORTIMG;
$FORM_IMPORTIMG = true;
$FORM_ORDER	= '  ';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL)";

$FORM_DATA= array (
  'ts'	=>
  array (
    'field_name' => 'ts',
    'name' => 'form[ts]',
    'title' => Main::get_lang_str('data', 'db'),
    'must' => 1,
	'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
//    'readonly' => 'true',
		'default'	=> date('Y-m-d'),
		'sub_type' => 'varchar'
  ),
  'name'	=>
  array (
    'field_name' => 'name',
    'name' => 'form[name]',
    'title' => Main::get_lang_str('name', 'db'),
    'must' => 1,
	'style'	=> 'width:100%',
    'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
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
	'alias'	=> 
	array	(
		'field_name' =>	'alias',
		'name' =>	'form[alias]',
		'title'	=> Main::get_lang_str('alias', 'db'),
		'must' =>	0,
		'maxlen' =>	20,
		'type' =>	'hidden',
	),
	'doc1' => array(
			'field_name' => 'doc1',
			'name'	=> 'doc1',
			'title' => Main::get_lang_str('picture', 'db'),
			'maxwidth' => 1600,
			'maxheight' => 1200,
			'admwidth' => 300,
			'type'	=> 'photo',
			'sub_type'	=> 'photo',
			'newname_func'	=> 'get_file_name("img")',
//			'path'	=> '/modules/'.$_KAT['MODULE_NAME'].'/f_'.$_KAT['KUR_ALIAS'],
//			'abspath'	=> $_CORE->SiteModDir.'/f_'.$_KAT['KUR_ALIAS'],
			'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
			'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
  'hidden'	=>
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => Main::get_lang_str('ne_publ', 'db'),
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
		'sub_type' => 'varchar'
  ),
  'new' => 
  array (
    'field_name'=> 'new',
    'name'      => 'form[new]',
    'must'      => 0,
    'title'     => 'flag',
    'maxlen'    => 1,
	'sub_type'  => 'int',
    'type'      => 'hidden',
	'default'   => 1,
  ),
)
?>