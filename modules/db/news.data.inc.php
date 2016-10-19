<?
//$FORM_SEARCH	=	array( 
//'city', 'far', 'square', 'vodo', 'energy', 'otopl', 'kanal', 'gaz', 'arenda', 'prodaja'
//);


//die('<pre>'.var_dump($_CORE).'</pre>');
global $_CORE;

// 10.07.2012 $_REQUEST['p'] = 1;

$FORM_SEARCH	=	array( 
	'name'
//'city', 'far', 'square', 'vodo', 'energy', 'otopl', 'kanal', 'gaz', 'arenda', 'prodaja'
);

$FORM_ORDER	= ' ORDER BY id DESC ';
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
    'title' => 'Название новости',
    'must' => 1,
	'size' => 50,
    'maxlen' => 255,
    'type' => 'textbox',
  ),

'date' => array(
	'field_name' =>	'date',
	'name' => 'form[date]',
	'title'	=> 'Дата',
	'must' => 1,
	'size' => 15,
	'maxlen' =>	255,
	'type' => 'textdate',
	'readonly' => 'true',
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
  'anons' => 
  array (
    'field_name' => 'anons',
    'name' => 'form[anons]',
    'title' => 'краткое описание  новости',
    'must' => '1',
    'maxlen' => '65535',
    'type' => 'textarea',
 		'style' => 'width:100%',
   'cols' => '50',
    'rows' => '3',
  ),
  'cont' => 
  array (
    'field_name' => 'cont',
    'name' => 'form[cont]',
    'title' => 'полное описание  новости',
    'must' => '1',
    'maxlen' => '65535',
    'type' => 'textarea',
		'style' => 'width:100%',
    'rows' => '30',
		'wysiwyg'	=> 'tinymce'
  ),
	 

);

?>