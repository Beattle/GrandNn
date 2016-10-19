<?

global $_KAT;

//if($_CORE->IS_ADMIN){

//
// Обновление структуры таблиц всех каталогов одного типа, и ФОРМИРОВАНИЕ массива однотипных таблиц
//

foreach ($_KAT['FILES'] as $alias => $file) {
	if (in_array($file, array('shop.data.inc.php','shop_inc.data.inc.php', 'shop_bra.data.inc.php', 'shop_kolie.data.inc.php', 'shop_rings.data.inc.php'))) {
			$tables[] = $alias;
//        $res = SQL::query('ALTER TABLE  `'.DB_TABLE_PREFIX.$alias.'` ADD  `bu` int( 1 ) NOT NULL ');
//			$res = SQL::query('ALTER TABLE  `'.DB_TABLE_PREFIX.$alias.'` ADD  `new` VARCHAR( 1 ) NOT NULL ');
//			$res = SQL::query('ALTER TABLE  `'.DB_TABLE_PREFIX.$alias.'` ADD  `doc1` VARCHAR( 255 ) NOT NULL , ADD  `doc2` VARCHAR( 255 ) NOT NULL');
//			if (!$res->ErrorQuery)
//				echo "Updates: $alias<br />";
//				echo '';
//			else
//				echo "ERROR ($alias): ".$res->ErrorQuery."<br />";
	}
}
// exit;

$tlist		= SQL::tlist();
$indexes	= array('', 1,2);

$from_path	= $_SERVER['DOCUMENT_ROOT'].'/data/db/';
$to_path	= $_SERVER['DOCUMENT_ROOT'].'/data/db/f_all_items/';

$count = 0;

echo count($tables)."\n";
foreach ($tables as $t) if (in_array(DB_TABLE_PREFIX.$t, $tlist)) { // по всем таблицам
	
//	if($count++ > 50) exit;

	echo "\n-------\n $t \n-------\n";
	$r = SQL::getall( '*', DB_TABLE_PREFIX.$t);
	
	if (is_array($r)) foreach ($r as $line) { // по всем записям
		foreach ($indexes as $i) { // по всем индексам картинок
			if (is_file($from_path.'f_'.$t.'/'.$line['doc'.$i])) {
				echo $line['alias'].'+'.str_replace('_', '-', str_replace('art', '', substr($line['alias'], (strpos($line['alias'], '_'))?strpos($line['alias'], '_')+1:0)))." - ".$from_path.'f_'.$t.'/'.$line['doc'.$i]."\n";
				echo $to_path . str_replace('_', '-', str_replace('art', '', substr($line['alias'], (strpos($line['alias'], '_'))?strpos($line['alias'], '_')+1:0))).".jpg\n";
				# копируем
				copy($from_path.'f_'.$t.'/'.$line['doc'.$i], $to_path . str_replace('_', '-', str_replace('art', '', substr($line['alias'], (strpos($line['alias'], '_'))?strpos($line['alias'], '_')+1:0))).".jpg");
			}
		}
	}
}

?>