<?
$FORM_ORDER	= '  ';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE	= "AND (hidden != 1 OR hidden IS NULL)";

$FORM_DATA= array (
	'id' => array (
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
	'name' => array (
		'field_name' => 'name',
		'name' => 'form[name]',
		'title' => Main::get_lang_str('name', 'db'),
		'must' => 1,
		'style'	=> 'width:100%',
		'type' => 'textbox',
	),
	'doc' => array(
		'field_name' => 'doc',
		'name'	=> 'doc',
		'title' => Main::get_lang_str('picture', 'db'),
		'admwidth' => 200,
		'type'	=> 'photo',
		'sub_type'	=> 'photo',
		'newname_func'	=> 'get_file_name("img")',
		'path'	=> KAT::get_data_link( '/f_all_items', $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'	=> KAT::get_data_path('/f_all_items', $dir, KAT_LOOKIG_DATA_DIR),
	),
	'hidden' => array (
		'field_name' => 'hidden',
		'name' => 'form[hidden]',
		'title' => Main::get_lang_str('ne_publ', 'db'),
		'must' => 0,
		'maxlen' => 1,
		'type' => 'checkbox',
		'sub_type' => 'varchar'
	),
	'ts' => array (
		'field_name' => 'ts',
		'name' => 'form[ts]',
		'title' => Main::get_lang_str('data', 'db'),
		'must' => 1,
		'size' => 15,
		'maxlen' => 255,
		'type' => 'hidden',
		'default'	=> date('Y-m-d'),
		'sub_type' => 'varchar'
	)
)
?>