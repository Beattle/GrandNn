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
		'title' => '��������',
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
	'���'	=>
	array (
		'field_name' => 'fio',
		'name' => 'form[fio]',
		'title' => '���',
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
		'title' => '�������',
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
		'title' => '�����',
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
		'title' => '�������� �������',
		'maxlen' => '5124',
		'must' => '1',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '15',
		//'wysiwyg'	=> 'tinymce',
	
	),
	'doc' => 
	array(
		'field_name' => 'doc', // ������ ��������� � 'name'!!!
		'name'	=> 'doc',
		'title' => '����1',
		'type'	=> 'photo',
		'admwidth' => '300',
		'sub_type'	=> 'photo',
		'newname_func'	=> "get_file_name('doc')",
		'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc1' => 
	array(
		'field_name' => 'doc1', // ������ ��������� � 'name'!!!
		'name'			=> 'doc1',
		'title' 		=> '����2',
		'type'			=> 'photo',
		'sub_type'		=> 'photo',
		'admwidth' 		=> '300',
		'newname_func'	=> "get_file_name('doc1')",
		'path'			=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'		=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc2' => 
	array(
		'field_name' 		=> 'doc2', // ������ ��������� � 'name'!!!
		'name'				=> 'doc2',
		'title' 			=> '����3',
		'type'				=> 'photo',
		'admwidth' 			=> '300',
		'sub_type'			=> 'photo',
		'newname_func'		=> "get_file_name('doc2')",
		'path'				=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'			=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc3' => 
	array(
		'field_name' 	=> 'doc3', // ������ ��������� � 'name'!!!
		'name'			=> 'doc3',
		'title' 		=> '����4',
		'type'			=> 'photo',
		'admwidth' 		=> '300',
		'sub_type'		=> 'photo',
		'newname_func'	=> "get_file_name('doc3')",
		'path'			=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'		=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc4' => 
	array(
		'field_name' 	=> 'doc4', // ������ ��������� � 'name'!!!
		'name'			=> 'doc4',
		'title' 		=> '����5',
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
		'title' => '����',
		'must' => 0,
		'size' => 15,
		'maxlen' => 255,
		'type' => 'hidden',
		'default'	=> date('Y-m-d'),
	)
)
?>