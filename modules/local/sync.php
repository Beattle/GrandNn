<?
//
// Обновление структуры таблиц всех каталогов одного типа
//

global $_KAT;

if($_CORE->IS_ADMIN){

foreach ($_KAT['FILES'] as $alias => $file) {
	if (in_array($file, array('shop.data.inc.php','shop_inc.data.inc.php', 'shop_bra.data.inc.php', 'shop_kolie.data.inc.php', 'shop_rings.data.inc.php'))) {
			$tables[] = $alias;
	}
}

// Show union for all 
//exit;
# all tables 
$tlist = SQL::tlist();
echo "Создание общего представления";

foreach ($tables as $tbl) {
	if (in_array(DB_TABLE_PREFIX.$tbl, $tlist)) {
		$sel[] = "SELECT id, alias, name, hidden, metal, bu, nalich, type_icon, artikul, price, weight, madeby, ins, doc, doc1, '$tbl' as tab  FROM ".DB_TABLE_PREFIX.$tbl;
	}
}
SQL::query("DROP VIEW `grand__view_all`;",0);
$str = "CREATE
ALGORITHM = UNDEFINED
VIEW `".DB_TABLE_PREFIX."__view_all`
AS ". implode(" union ", $sel).";";
SQL::query($str,0);
echo "<h1>Обновление завершено</h1>";
}

?>