<?
include "shop.data.inc.php";

//$FORM_DATA['bra_rozn'] = array (
//    'DBname' => $_KAT[$_KAT['KUR_ALIAS']]['matrix_table']['bra_rozn'],
//    'DBnameX' => 'bra_size',
//    'DBnameY' => 'bra_ins',
//    'title' => 'Цены и наличие для розницы',
//    'type' => 'matrix',
//    'sub_type' => 'textbox'
//  );

$FORM_DATA['bra_opt'] = array (
    'DBname' => $_KAT[$_KAT['KUR_ALIAS']]['matrix_table']['bra_opt'],
    'DBnameX' => 'bra_size',
    'DBnameY' => 'bra_ins',
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
		'ex_table' => DB_TABLE_PREFIX.'bra_ins',
		'id_ex_table' => 'name',
		'ex_table_field'	=> 'name',
);

?>