<?
include "shop.data.inc.php";

//$FORM_DATA['shop_rozn'] = array (
//    'DBname' => $_KAT[$_KAT['KUR_ALIAS']]['matrix_table']['shop_rozn'],
//    'DBnameX' => 'shop_size',
//    'DBnameY' => 'shop_ins',
//    'title' => '���� � ������� ��� �������',
//    'type' => 'matrix',
//    'sub_type' => 'textbox'
//  );

$FORM_DATA['shop_opt'] = array (
    'DBname' => $_KAT[$_KAT['KUR_ALIAS']]['matrix_table']['shop_opt'],
    'DBnameX' => 'shop_size',
    'DBnameY' => 'shop_ins',
    'title' => '����������� ��� ����',
    'type' => 'matrix',
    'sub_type' => 'checkbox'
  );

$FORM_DATA['ins'] = array (
    'field_name' => 'ins',
    'name' => 'form[ins]',
    'title' => '�������',
    'must' => 0,
		'type' =>	'select_from_table',
		'options' => array(
				'order' => 'name',
				'desc'	=> '',
				'offset' => '',
				'limit' => '',
				),
		'logic'	=> 'OR',
		'search' =>	"	LIKE '%%%s%%'",
		'ex_table' => DB_TABLE_PREFIX.'shop_ins',
		'id_ex_table' => 'name',
		'ex_table_field'	=> 'name',
);

?>