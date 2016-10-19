<?

global $FORM_ORDER; 

$FORM_ORDER	=	' ORDER BY date_time DESC	';
$FORM_WHERE	= " ";


$FORM_DATA=	array	(
	'id' =>	
	array	(
		'field_name' =>	'id',
		'name' =>	'form[id]',
		'title'	=> 'id',
		'must' =>	0,
		'maxlen' =>	20,
		'type' =>	'hidden',
	),
	'alias'	=> 
	array	(
		'field_name' =>	'alias',
		'name' =>	'form[alias]',
		'title'	=> 'alias',
		'must' =>	0,
		'maxlen' =>	20,
		'type' =>	'hidden',
	),
 'ts'	=>
	array	(
		'field_name' =>	'ts',
		'name' =>	'form[ts]',
		'title'	=> '���� �����',
		'must' =>	1,
		'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' =>	'textbox',
		'logic'	=> 'OR',
		'readonly' => '1',
		'search' =>	"	LIKE '%%%s%%'",
	),

 'good'	=>
	array	(
		'field_name' =>	'good',
		'name' =>	'form[good]',
		'title'	=> '�������',
		'must' =>	1,
		'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' =>	'textbox',
		'logic'	=> 'OR',
		'readonly' => '1',
		'search' =>	"	LIKE '%%%s%%'",
	),
 'bad'	=>
	array	(
		'field_name' =>	'bad',
		'name' =>	'form[bad]',
		'title'	=> '���������',
		'must' =>	1,
		'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' =>	'textbox',
		'logic'	=> 'OR',
		'readonly' => '1',
		'search' =>	"	LIKE '%%%s%%'",
	),
 'date_time'	=>
	array	(
		'field_name' =>	'date_time',
		'name' =>	'form[date_time]',
		'title'	=> '�����',
		'must' =>	1,
		'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' =>	'textbox',
		'logic'	=> 'OR',
		'readonly' => '1',
		'search' =>	"	LIKE '%%%s%%'",
	),
 'images'	=>
	array	(
		'field_name' =>	'images',
		'name' =>	'form[images]',
		'title'	=> '��������',
		'must' =>	1,
		'style'	=> 'width:100%',
		'maxlen' =>	255,
		'type' =>	'textbox',
		'logic'	=> 'OR',
		'readonly' => '1',
		'search' =>	"	LIKE '%%%s%%'",
	),
 'res'	=>
	array	(
		'field_name' =>	'res',
		'name' =>	'form[res]',
		'title'	=> '������� � ������',
		'must' =>	1,
		'style'	=> 'width:100%',
		'maxlen' =>	3000,
		'type' =>	'textarea',
		'logic'	=> 'OR',
		'rows'	=> '4',
		'readonly' => '1',
		'search' =>	"	LIKE '%%%s%%'",
	),
	 'res_no_art'	=>
	array	(
		'field_name' =>	'res_no_art',
		'name' =>	'form[res_no_art]',
		'title'	=> '�����, ��������� ��� ������� ��� � ����',
		'must' =>	1,
		'style'	=> 'width:100%',
		'maxlen' =>	3000,
		'type' =>	'textarea',
		'logic'	=> 'OR',
		'rows'	=> '4',
		'readonly' => '1',
		'search' =>	"	LIKE '%%%s%%'",
	),

)
?>