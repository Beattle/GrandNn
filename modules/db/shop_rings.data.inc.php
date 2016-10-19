<?
include "shop.data.inc.php";

//$FORM_DATA['ring_rozn'] = array (
//    'DBname' => $_KAT[$_KAT['KUR_ALIAS']]['matrix_table']['ring_rozn'],
//    'DBnameX' => 'ring_size',
//    'DBnameY' => 'ring_ins',
//    'title' => 'Цены и наличие для розницы',
//    'type' => 'matrix',
//    'sub_type' => 'textbox'
//  );

$FORM_DATA['ring_opt'] = array (
    'DBname' => $_KAT[$_KAT['KUR_ALIAS']]['matrix_table']['ring_opt'],
    'DBnameX' => 'ring_size',
    'DBnameY' => 'ring_ins',
    'title' => 'Возможности для опта',
    'type' => 'matrix',
    'sub_type' => 'checkbox'
  );

$FORM_DATA['ins'] = array (
    'field_name' => 'ins',
    'name' => 'form[ins]',
    'title' => 'Вставка',
    'must' => 0,
		'type' =>	'select_from_table',
		'logic'	=> 'OR',
		'search' =>	"	LIKE '%%%s%%'",
		'ex_table' => DB_TABLE_PREFIX.'ring_ins',
		'id_ex_table' => 'name',
		'ex_table_field'	=> 'name',
);
?>