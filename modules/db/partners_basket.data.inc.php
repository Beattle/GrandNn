<?
$FORM_ORDER	= ' ORDER BY ts DESC ';

if (!$_CORE->IS_ADMIN) {
	
} else
	$FORM_WHERE = '';

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
    'title' => '����� ������',
    'must' => 0,
    'maxlen' => 20,
    'type' => 'textbox',
	'readonly'	=> 'true'
  ),
 'name'	=>
  array	(
	'field_name' =>	'name',
	'name' => 'form[name]',
	'title'	=> 'id ��������:id ��������:����� �������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'hidden',
  ),
  'hidden'	=>
  array (
    'field_name' => 'hidden',
    'name' => 'form[hidden]',
    'title' => '�� ��������',
    'must' => 0,
    'maxlen' => 1,
    'type' => 'checkbox',
  ),
 'user_id'	=>
  array	(
	'field_name' =>	'user_id',
	'name' => 'form[user_id]',
	'title'	=> '�������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
  ),
 'referal_id'	=>
  array	(
	'field_name' =>	'referal_id',
	'name' => 'form[referal_id]',
	'title'	=> '�������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox',
  ),
  'summ'	=>
  array (
    'field_name' => 'summ',
    'name' => 'form[summ]',
    'title' => '����� �������',
    'must' => 1,
    'maxlen' => 255,
    'type' => 'textbox'
  ),
 'actual_percent'	=>
  array	(
	'field_name' =>	'actual_percent',
	'name' => 'form[actual_percent]',
	'title'	=> '������� �� ����������� �� ����� �������',
	'must' => 0,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox'
  ),
 'bonus'	=>
  array	(
	'field_name' =>	'bonus',
	'name' => 'form[bonus]',
	'title'	=> '���������� ��������',
	'must' => 1,
	'style'	=> 'width:100%',
	'maxlen' =>	255,
	'type' => 'textbox'
  ),
  'ts'	=>
  array (
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

);
?>