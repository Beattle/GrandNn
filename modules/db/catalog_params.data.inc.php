<?
$FORM_ORDER	= ' ORDER BY prior ASC, id DESC ';
$FORM_WHERE = '';

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
	'alias' => 
	array (
		'field_name' => 'alias',
		'name' => 'form[alias]',
		'title' => 'alias',
		'must' => 0,
		'maxlen' => 255,
		'type' => 'hidden',
	),
	'name'	=>
	array (
		'field_name' => 'name',
		'name' => 'form[name]',
		'title' => '������������',
		'must' => 1,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'title'	=>
	array (
		'field_name' => 'title',
		'name' => 'form[title]',
		'title' => '������������ ��� �������',
		'must' => 1,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'field' => 
	array (
		'field_name' => 'field',
		'name' => 'form[field]',
		'title' => '��� ���������',
        'must' => 1,
        'maxlen' => 20,
        'type' => 'select',
        'arr'	=> array( 
                  ''=>'',
                  'name'=>'��� ���������',
                  'bu'=>'�/� ��� �����',
                  'probe'=>'��������' ,
                  'gvstav'=>'�������',
                  'nalich'=> '�������',
                  'gprice'=> '�������� ���',
                  'new'=> '����� �����������',
                  'discount' => '�� ��������'
                ),
	),
	'prior' => 
	array (
		'field_name' => 'prior',
		'name' => 'form[prior]',
		'title' => '�������',
		'must' => '0',
		'type' => 'hidden',
		'style' => 'width:100%'
	),
);

?>