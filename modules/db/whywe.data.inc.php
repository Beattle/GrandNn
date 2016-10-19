<?
global $_CORE;

$FORM_ORDER	= ' ORDER BY ts ASC ';
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
	'title' => 'Название',
	'must' => 1,
	'size' => 50,
	'maxlen' => 255,
	'type' => 'textbox',
	),
	
	'ts' => array(
	'field_name' =>	'ts',
	'name' => 'form[ts]',
	'title'	=> 'Дата',
	'must' => 0,
	'size' => 15,
	'maxlen' =>	255,
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
	'doc' => array(
	'field_name' => 'doc', // должно совпадать с 'name'!!!
	'name'	=> 'doc',
	'title' => 'Иконка',
	'admwidth' => 150,
	'hardwidth' => 1000,
	'hardheight' => 1000,
	'maxsize'	=> 1000000,
	'type'	=> 'photo',
	'sub_type'	=> 'photo',
	'newname_func'	=> 'get_file_name("doc")',
	'path'	    => KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
	'abspath'	=> KAT::get_data_path( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
	)
);

?>