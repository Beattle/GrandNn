<?
global $_KAT, $FORM_DATA;

$res = SQL::getall("*", DB_TABLE_PREFIX.'items', "discount > 0 AND doc!='' AND (hidden != 1 OR hidden IS NULL) ", " group by artikul ORDER BY RAND() limit 4", 1);
$arr = array();
if(is_array($res) && count($res)){
	foreach($res as $data){
		$arr[] = $data['alias'];
	}
	SQL::upd(DB_TABLE_PREFIX.'settings', "good_items = '".implode(',',$arr)."', good_items_time = ".(time()+3*24*3600) ."","id=1", 0);
	
	echo 'Новый список Лучшее предложение составлен';
}else{
	SQL::upd(DB_TABLE_PREFIX.'settings', "good_items_time = ".(time()+3*24*3600) ."","id=1", 0);
	
}
?>