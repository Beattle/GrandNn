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
		'type' => 'hidden',
		'default'	=> date('Y-m-d H:i:s'),
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
		'must' => 1,
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
	'cont' => 
	array (
		'field_name' => 'cont',
		'name' => 'form[cont]',
		'title' => 'Описание изделия',
		'maxlen' => '5124',
		'must' => '1',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '15',
		//'wysiwyg'	=> 'tinymce',
	
	),
	'doc' => 
	array(
		'field_name' => 'doc', // должно совпадать с 'name'!!!
		'name'	=> 'doc',
		'title' => 'Фото1',
		'type'	=> 'photo',
		'admwidth' => '300',
		'sub_type'	=> 'photo',
		'newname_func'	=> "get_file_name('doc')",
		'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc1' => 
	array(
		'field_name' => 'doc1', // должно совпадать с 'name'!!!
		'name'			=> 'doc1',
		'title' 		=> 'Фото2',
		'type'			=> 'photo',
		'sub_type'		=> 'photo',
		'admwidth' 		=> '300',
		'newname_func'	=> "get_file_name('doc1')",
		'path'			=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'		=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc2' => 
	array(
		'field_name' 		=> 'doc2', // должно совпадать с 'name'!!!
		'name'				=> 'doc2',
		'title' 			=> 'Фото3',
		'type'				=> 'photo',
		'admwidth' 			=> '300',
		'sub_type'			=> 'photo',
		'newname_func'		=> "get_file_name('doc2')",
		'path'				=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'			=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc3' => 
	array(
		'field_name' 	=> 'doc3', // должно совпадать с 'name'!!!
		'name'			=> 'doc3',
		'title' 		=> 'Фото4',
		'type'			=> 'photo',
		'admwidth' 		=> '300',
		'sub_type'		=> 'photo',
		'newname_func'	=> "get_file_name('doc3')",
		'path'			=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'		=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc4' => 
	array(
		'field_name' 	=> 'doc4', // должно совпадать с 'name'!!!
		'name'			=> 'doc4',
		'title' 		=> 'Фото5',
		'type'			=> 'photo',
		'admwidth' 		=> '300',
		'sub_type'		=> 'photo',
		'newname_func'	=> "get_file_name('doc4')",
		'path'			=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'		=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'ts'	=>
	array (
		'field_name' => 'ts',
		'name' => 'form[ts]',
		'title' => 'Дата',
		'must' => 0,
		'size' => 15,
		'maxlen' => 255,
		'type' => 'hidden',
		'default'	=> date('Y-m-d'),
	)
)
?>