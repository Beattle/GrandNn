<?
$FORM_WHERE = ' ';
$FORM_ORDER	= '  ';

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
		'type' => 'textbox',
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
	'schedule'	=>
	array (
		'field_name' => 'schedule',
		'name' => 'form[schedule]',
		'title' => '������� ����� ������ (��� ������)',
		'must' => 0,
		'style'	=> 'width:100%',
		'type' => 'textarea',
		'rows' => '5',
		'wysiwyg'	=> 'tinymce',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
	),
	'phone'	=>
	array (
		'field_name' => 'phone',
		'name' => 'form[phone]',
		'title' => '������� ��� ������',
		'must' => 0,
		'style'	=> 'width:100%',
		'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
	),
	'cont' => 
	array (
		'field_name' => 'cont',
		'name' => 'form[cont]',
		'title' => '�����',
		'maxlen' => '5124',
		'must' => '0',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '15',
		'wysiwyg'	=> 'tinymce',
	
	),
	'nonformat' => 
	array (
		'field_name' => 'nonformat',
		'name' => 'form[nonformat]',
		'title' => '����������������� �����<br />(��� ��� �����)',
		'maxlen' => '1024',
		'must' => '0',
		'type' => 'textarea',
		'style' => 'width:100%',
		'rows' => '4',
	),
	'code'	=>
	array (
		'field_name' => 'code',
		'name' => 'form[code]',
		'title' => '��� youtube ������ <br />(�������� v � ������)',
		'must' => 0,
		'style'	=> 'width:100%',
		'type' => 'textbox',
		'logic' => 'OR',
		'search' => " LIKE '%%%s%%'",
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
	'doc2' => 
	array(
		'field_name' => 'doc2', // ������ ��������� � 'name'!!!
		'name'	=> 'doc2',
		'title' => '����2',
		'type'	=> 'photo',
		'admwidth' => '300',
		'sub_type'	=> 'photo',
		'newname_func'	=> "get_file_name('doc2')",
		'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc3' => 
	array(
		'field_name' => 'doc3', // ������ ��������� � 'name'!!!
		'name'	=> 'doc3',
		'title' => '����3',
		'type'	=> 'photo',
		'admwidth' => '300',
		'sub_type'	=> 'photo',
		'newname_func'	=> "get_file_name('doc3')",
		'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	'doc1' => 
	array(
		'field_name' => 'doc1', // ������ ��������� � 'name'!!!
		'name'	=> 'doc1',
		'title' => '���������� ����',
		'type'	=> 'photo',
		'sub_type'	=> 'doc',
		'newname_func'	=> "get_file_name('doc1')",
		'path'	=> KAT::get_data_link( '/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR ),
		'abspath'	=> KAT::get_data_path('/f_'.$_KAT['KUR_ALIAS'], $dir, KAT_LOOKIG_DATA_DIR),
	),
	
	'doc1_title' => 
	array (
		'field_name' => 'doc1_title',
		'name' => 'form[doc1_title]',
		'title' => '�������� �����',
		'maxlen' => '255',
		'must' => '0',
		'style' => 'width:100%',
		'type' => 'textbox',
		'readonly' => 0,
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