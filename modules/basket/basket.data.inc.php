<?
//$FORM_SEARCH	=	array( 
//'city', 'far', 'square', 'vodo', 'energy', 'otopl', 'kanal', 'gaz', 'arenda', 'prodaja'
//);
//$FORM_ORDER	= ' ORDER BY ts DESC ';

$FORM_DATA_ITEM= array (
  'subj'	=>
  array (
    'field_name' => 'subj',
    'name' => 'BASKET[subj]',
	'title' => '������������',
    'must' => 1,
    'maxlen' => 255,
    'type' => 'hidden',
  ),
  'desc'	=>
  array (
    'field_name' => 'desc',
    'name' => 'BASKET[desc]',
		'title' => '��������',
    'must' => 0,
    'maxlen' => 255,
    'type' => 'hidden',
  ),
  'link'	=>
  array (
    'field_name' => 'link',
    'name' => 'BASKET[link]',
	'title' => '������',
    'must' => 1,
    'maxlen' => 255,
    'type' => 'hidden',
  ),
	'artikul'	=>
  array (
    'field_name' => 'artikul',
    'name' => 'BASKET[artikul]',
		'title' => '�������',
    'must' => 0,
    'maxlen' => 10,
    'type' => 'hidden',
  ),
  'price'	=>
  array (
    'field_name' => 'price',
    'name' => 'BASKET[price]',
	'title' => '����',
    'must' => 1,
    'maxlen' => 10,
    'type' => 'hidden',
  ),
  'discount'	=>
  array (
    'field_name' => 'discount',
    'name' => 'BASKET[discount]',
	'title' => '������',
    'must' => 0,
    'maxlen' => 10,
    'type' => 'hidden',
  ),
  'price_lost'	=>
  array (
    'field_name' => 'price_lost',
    'name' => 'BASKET[price_lost]',
	'title' => '���� ��� ������',
    'must' => 0,
    'maxlen' => 10,
    'type' => 'hidden',
  ),
  'count'	=>
  array (
    'field_name' => 'count',
    'name' => 'BASKET[count]',
	'title' => '����������',
    'must' => 0,
    'maxlen' => 10,
    'type' => 'hidden',
  ),
	'doc' => array(
			'field_name' => 'doc',
			'name'	=> 'BASKET[doc]',
			'title' => Main::get_lang_str('picture', 'db'),
			'maxwidth' => 1600,
			'maxheight' => 1200,
			'admwidth' => 300,
			'type'	=> 'photo',
			'sub_type'	=> 'photo',
	)
  
  );
?>