<?
if(empty($_SESSION['SESS_AUTH']['ID']) && empty($_GET['hash']))
	header('location: http://'.$_SERVER['SERVER_NAME'].'/');
$_KAT['INDEX'][$_KAT['KUR_ALIAS']]	= 'id';

$FORM_ORDER	= ' ORDER BY ts DESC ';

if (!$_CORE->IS_ADMIN) {
	$FORM_WHERE = " AND email = '".$_SESSION['SESS_AUTH']['LOGIN']."'";
} else{
	$FORM_WHERE = '';
}
$FORM_DATA = array(
  'hidden'	=>
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => '�� ��������',
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
  ),
  'payed'	=>
  array (
    'field_name' => 'payed',
    'name' => 'form[payed]',
    'title' => '��������',
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
  ),
	
	'id' => 
  array	(
	'field_name' =>	'id',
	'name' => 'form[id]',
	'title'	=> '����� ������',
	'must' => 0,
    'maxlen' => 20,
    'readonly'	=> 'true',
    'type' => 'textbox',
  ),
  'alias' => 
  array (
    'field_name' => 'alias',
    'name' => 'form[alias]',
    'title' => '������ ����� ������',
    'must' => 0,
	'maxlen' =>	20,
    'readonly'	=> 'true',
    'type' => 'textbox',
  ),
 'name'	=>
  array	(
	'field_name' =>	'name',
	'name' => 'form[name]',
	'title'	=> '����������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'hidden',
  ),
 'user_name'	=>
  array	(
	'field_name' =>	'user_name',
	'name' => 'form[user_name]',
	'title'	=> '����������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
/* 'person'	=>
  array	(
	'field_name' =>	'person',
	'name' => 'form[person]',
	'title'	=> '���������� ����',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),*/
 'email'	=>
  array	(
	'field_name' =>	'email',
	'name' => 'form[email]',
	'title'	=> 'E-mail',
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
/* 'www'	=>
  array	(
	'field_name' =>	'www',
	'name' => 'form[www]',
	'title'	=> '��� ����',
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),*/
 'phone'	=>
  array	(
	'field_name' =>	'phone',
	'name' => 'form[phone]',
	'title'	=> '�������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
 'delivery_type'	=>
  array	(
	'field_name' =>	'delivery_type',
	'name' => 'form[delivery_type]',
	'title'	=> '������ ��������',
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
 'city'	=>
  array	(
	'field_name' =>	'city',
	'name' => 'form[city]',
	'title'	=> '�����',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
 'address'	=>
  array	(
	'field_name' =>	'address',
	'name' => 'form[address]',
	'title'	=> '�����',
	'must' => 0,
	'maxlen' =>	'65535',
	'type' => 'textarea',
	'style'	=> 'width:100%',
	'rows' => '10',
  ),
 'cnt'	=>
  array	(
	'field_name' =>	'cnt',
	'name' => 'form[cnt]',
	'title'	=> '����������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
 'summ'	=>
  array	(
	'field_name' =>	'summ',
	'name' => 'form[summ]',
	'title'	=> '�� �����',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),
 'status'	=>
  array	(
	'field_name' =>	'status',
	'name' => 'form[status]',
	'title'	=> '������',
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'select',
	'logic'	=> 'OR',
	'arr'	=> array( '������, ��������������', '������������','����� � ��������' , '���������', '�������' ), 
	'search' =>	" LIKE '%%%s%%'",
  ),
   'delivery_summ'	=>
  array	(
	'field_name' =>	'delivery_summ',
	'name' => 'form[delivery_summ]',
	'title'	=> '����� ��������',
	'must' => 0,
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
    'title' => '����',
    'must' => 0,
		'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
    'readonly' => 'true',
		'default'	=> date('Y-m-d')
  ),
 'comments'	=>
  array	(
	'field_name' =>	'comments',
	'name' => 'form[comments]',
	'title'	=> '����������� �� ���������',
	'must' => 0,
	'maxlen' =>	'65535',
	'type' => 'textarea',
	'style'	=> 'width:100%',
	'rows' => '10',
  ),
// 'dop'	=>
//  array	(
//	'field_name' =>	'dop',
//	'name' => 'form[dop]',
//	'title'	=> '�������������� ����������',
//	'must' => 0,
//	'maxlen' =>	'65535',
//	'type' => 'textarea',
//	'style'	=> 'width:100%',
//	'rows' => '20',
//  ),
 'cont'	=>
  array	(
	'field_name' =>	'cont',
	'name' => 'form[cont]',
	'title'	=> '�����',
	'must' => 0,
	'maxlen' =>	'65535',
	'type' => 'textarea',
	'style'	=> 'width:100%',
	'rows' => '20',
	'wysiwyg'	=> 'htmlarea3',
	'wysiwyg_path'	=> '/modules/html/',
	'logic'	=> 'OR',
	'search' =>	" LIKE '%%%s%%'",
  ),


	'from_auth'	=>
	array	(
		'field_name' =>	'from_auth',
		'name' =>	'form[from_auth]',
		'title'	=> '�� ����',
		'must' =>	1,
		'size' =>	50,
		'maxlen' =>	255,
		'type' =>	'hidden',
		'sub_type' =>	'bigint',	// ����� ������	�� ������	�	�������	UNIQUE
		'default'	=> $_SESSION['SESS_AUTH']['ID'],
  ),
	'doc' => array(
			'field_name' => 'doc',
			'name'	=> 'form[doc]',
			'title' => Main::get_lang_str('picture', 'db'),
			'maxwidth' => 1600,
			'maxheight' => 1200,
			'admwidth' => 300,
			'type'	=> 'photo',
			'sub_type'	=> 'photo',
	),
 'printversion'	=>
  array	(
	'field_name' =>	'printversion',
	'name' => 'form[printversion]',
	'title'	=> '��� ��� ������ ����� ������ ������',
	'must' => 0,
	'maxlen' =>	255,
	'type' => 'hidden',
  )


);
?>