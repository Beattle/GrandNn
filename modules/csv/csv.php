 

<?php
global $_FILES, $SQL_DBCONF;
if(empty($_POST)) {include_once('csv_template.html'); }else {
$handle = fopen($_FILES['file']['tmp_name'], "r");
if($handle){
	$data = array();
	$row = 1;
	while (($data[$row] = fgetcsv($handle, 1000, "	")) !== FALSE) {
		$row++;
	}
	fclose($handle);
	$num = count($data);
	//echo'<pre>';
	///var_dump($data);
	
	$what = 'DISTINCT *' ; 
	$from = $SQL_DBCONF['name'].'.'.DB_TABLE_PREFIX.'csv'; 
	$where = '';
	$res = SQL::sel($what, $from, $where);
	if ($res->NumRows != 0) $res = SQL::truncate($SQL_DBCONF['name'].'.'.DB_TABLE_PREFIX.'csv');	
	
		for ($c=1; $c < $num; $c++) {
			if($data[$c][0] != 'Код'){
				if(count($data[$c]) == 11){
					$str = '';
					for ($f=0; $f < count($data[$c]); $f++) {
					if($f == count($data[$c])-1){ $str.="'".htmlspecialchars($data[$c][$f],ENT_QUOTES)."'";}else {$str.="'".htmlspecialchars($data[$c][$f],ENT_QUOTES)."',";}
						
					}
					$res = SQL::ins($SQL_DBCONF['name'].'.'.DB_TABLE_PREFIX.'csv', "id, name, company, number_company, original_number, about,cost, supplier, time, presence, hidden", $str);
				}
			}
		}
?> 
<script>
var tm=1
window.setTimeout("window.close()",tm)
</script>
<?}
}?>

 <?/*$fields = array("id","name","company","number_company","original_number","about","cost","supplier","time","presence"); 		
global $SQL_DBLINK, $SQL_DBCONF;
  function import_csv(
        $table, 		// Имя таблицы для импорта
        $afields,       // Массив строк - имен полей таблицы 
		$filename, 	 	// Имя CSV файла, откуда берется информация 
                    // (путь от корня web-сервера)
        $delim='\\s',  		// Разделитель полей в CSV файле
        $enclosed='"',  	// Кавычки для содержимого полей
        $escaped='\\', 	 	// Ставится перед специальными символами
        $lineend='\\r\\n',   	// Чем заканчивается строка в файле CSV
        $hasheader=TRUE){  	// Пропускать ли заголовок CSV

    if($hasheader) $ignore = "IGNORE 1 LINES ";
    else $ignore = "";
    $q_import = 
    "LOAD DATA INFILE '".
        $_SERVER['DOCUMENT_ROOT'].$filename."' INTO TABLE '".$table."' ".
    "FIELDS TERMINATED BY '".$delim."' ENCLOSED BY '".$enclosed."' ".
    "    ESCAPED BY '".$escaped."' ".
    "LINES TERMINATED BY '".$lineend."' ".
    $ignore.
    "(".implode(',', $afields).")"
    ;
	$result	= new Query( $SQL_DBLINK, $q_import );
	if( $result->ErrorQuery ) 
		{
			echo "<strong>" . $result->ErrorQuery . "<br/>" . $q_import . "<br/> </strong>";
		}
        return $result;
    }
	import_csv('kb_zipauto.'.DB_TABLE_PREFIX.'csv',$fields,'/file.txt');
	*/?>