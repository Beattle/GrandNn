<?

global $_KAT;

if($_CORE->IS_ADMIN){

//
// Обновление структуры таблиц всех каталогов одного типа, и ФОРМИРОВАНИЕ массива однотипных таблиц
//

foreach ($_KAT['FILES'] as $alias => $file) {
	if (in_array($file, array('shop.data.inc.php','shop_inc.data.inc.php', 'shop_bra.data.inc.php', 'shop_kolie.data.inc.php', 'shop_rings.data.inc.php'))) {
			$tables[] = $alias;
//        $res = SQL::query('ALTER TABLE  `'.DB_TABLE_PREFIX.$alias.'` ADD  `bu` int( 1 ) NOT NULL ');
//			$res = SQL::query('ALTER TABLE  `'.DB_TABLE_PREFIX.$alias.'` ADD  `new` VARCHAR( 1 ) NOT NULL ');
//			$res = SQL::query('ALTER TABLE  `'.DB_TABLE_PREFIX.$alias.'` ADD  `doc1` VARCHAR( 255 ) NOT NULL , ADD  `doc2` VARCHAR( 255 ) NOT NULL');
			if (!$res->ErrorQuery)
				echo "Updates: $alias<br />";
			else
				echo "ERROR ($alias): ".$res->ErrorQuery."<br />";
	}
}
// exit;

//
// Объединение всех однотипных таблиц в одно представление
//

# Все существующие таблицы
$tlist = SQL::tlist();
// Для всех существующих таблиц заданного типа (каталоги магазина) создать селект товаров
foreach ($tables as $tbl) {
	if (in_array(DB_TABLE_PREFIX.$tbl, $tlist)) {
//		$sel[] = "SELECT id, alias, name, hidden, metal, bu, nalich, type_icon, artikul, price, weight, madeby, ins, doc, doc1, ts, cont, doc2, price_opt, '$tbl' as tab  FROM ".DB_TABLE_PREFIX.$tbl;
//		$sel[] = "SELECT *, '$tbl' as tab  FROM ".DB_TABLE_PREFIX.$tbl;
		$sel[] = "SELECT hidden, id, new, name, bu, alias, price, price_opt, weight, artikul, nalich, ins, madeby, metal, cont, type_icon, doc, doc1, doc2, ts, '$tbl' as tab  FROM ".DB_TABLE_PREFIX.$tbl;
	}
}

// Удаляем текущее представление
SQL::query("DROP VIEW `grand__view_all_new`;",0);

// Создаем новое представление
$str = "CREATE
ALGORITHM = UNDEFINED
VIEW `grand__view_all_new`
AS ". implode(" union ", $sel).";";
SQL::query($str,0);
echo "<hr>".$str."<hr>";
}

?>