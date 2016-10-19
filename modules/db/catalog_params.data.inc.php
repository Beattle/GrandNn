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
		'title' => 'Наименование',
		'must' => 1,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'title'	=>
	array (
		'field_name' => 'title',
		'name' => 'form[title]',
		'title' => 'Наименование для тайтлов',
		'must' => 1,
		'size' => 50,
		'maxlen' => 255,
		'type' => 'textbox',
	),
	'field' => 
	array (
		'field_name' => 'field',
		'name' => 'form[field]',
		'title' => 'тип параметра',
        'must' => 1,
        'maxlen' => 20,
        'type' => 'select',
        'arr'	=> array( 
                  ''=>'',
                  'name'=>'тип украшения',
                  'bu'=>'б/у или новое',
                  'probe'=>'материал' ,
                  'gvstav'=>'вставка',
                  'nalich'=> 'магазин',
                  'gprice'=> 'диапазон цен',
                  'new'=> 'новое поступление',
                  'discount' => 'со скидками'
                ),
	),
	'prior' => 
	array (
		'field_name' => 'prior',
		'name' => 'form[prior]',
		'title' => 'Порядок',
		'must' => '0',
		'type' => 'hidden',
		'style' => 'width:100%'
	),
);

?>