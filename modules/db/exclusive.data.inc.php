<?
global $_CORE;

$FORM_ORDER	= " ORDER BY ".DB_TABLE_PREFIX."exclusive.name ASC ";
$FORM_WHERE = '';
if (!$_CORE->IS_ADMIN)
	$FORM_WHERE = " AND (".DB_TABLE_PREFIX."exclusive.hidden != 1  OR ".DB_TABLE_PREFIX."exclusive.hidden IS NULL) ";

if($_CORE->CURR_TPL == 'def'){
	$FORM_FROM = " LEFT JOIN ".DB_TABLE_PREFIX."items ON ".DB_TABLE_PREFIX."items.num_series = ".DB_TABLE_PREFIX."exclusive.name";
	$FORM_WHERE .= " AND ".DB_TABLE_PREFIX."items.artikul != '' ";
	$FORM_WHERE .= " AND ".DB_TABLE_PREFIX."items.doc != ''";
	$FORM_ORDER	= " ORDER BY ".DB_TABLE_PREFIX."items.full_price ASC ";
}
	
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
    'title' => 'Серия номенклатуры',
    'must' => 1,
	'size' => 50,
    'maxlen' => 255,
    'type' => 'textbox'
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
  'ts'	=>
  array (
    'field_name' => 'ts',
    'name' => 'form[ts]',
    'title' => Main::get_lang_str('data', 'db'),
    'must' => 0,
	'size' => 15,
    'maxlen' => 255,
    'type' => 'hidden',
    'readonly' => 'true',
	'default'	=> date('Y-m-d')
  )
);

?>